<?php

namespace App\Filament\Widgets;

use App\Models\DetailTransaksi;
use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Resep;
use App\Models\TransaksiPenjualan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected int|array|null $columns = 4;

    protected function getStats(): array
    {
        $omzet = TransaksiPenjualan::query()->sum('total_harga');
        $jumlahTransaksi = TransaksiPenjualan::query()->count();
        $transaksiBulanIni = TransaksiPenjualan::query()
            ->whereMonth('tanggal_transaksi', now()->month)
            ->whereYear('tanggal_transaksi', now()->year)
            ->count();
        $pengeluaran = Pembelian::query()->sum('total_harga');

        $detailTransaksi = DetailTransaksi::query()
            ->with('obat')
            ->whereHas('transaksi')
            ->whereHas('obat')
            ->get();
        $modal = $detailTransaksi->sum(
            fn (DetailTransaksi $detail): float => (float) $detail->jumlah * (float) $detail->obat->harga_beli,
        );
        $laba = max(0, (float) $omzet - $modal);

        $nilaiPersediaan = Obat::query()->get()->sum(
            fn (Obat $obat): float => (float) $obat->stok * (float) $obat->harga_beli,
        );
        $stokMenipis = Obat::query()->where('stok', '<', 5)->count();
        $kadaluarsa = Obat::query()
            ->whereNotNull('tanggal_kadaluarsa')
            ->where('tanggal_kadaluarsa', '<=', now()->addDays(30)->toDateString())
            ->count();
        $totalPelanggan = Pelanggan::query()->count();
        $totalResep = Resep::query()->count();

        $omzetTrend = $this->monthTotals(TransaksiPenjualan::query(), 'tanggal_transaksi', now()->subMonths(11));
        $labaTrend = [];
        $pembelianTrend = $this->monthTotals(Pembelian::query(), 'tanggal_pembelian', now()->subMonths(11));

        foreach ($omzetTrend as $i => $total) {
            $labaTrend[] = max(0, (float) $total - (float) $pembelianTrend[$i]);
        }

        return [
            Stat::make('Omzet Penjualan', $this->rupiah($omzet))
                ->description($jumlahTransaksi.' transaksi tercatat')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->icon('heroicon-m-banknotes')
                ->color('success')
                ->chart($omzetTrend),
            Stat::make('Transaksi Bulan Ini', $transaksiBulanIni)
                ->description(now()->translatedFormat('F Y'))
                ->icon('heroicon-m-shopping-cart')
                ->color('info'),
            Stat::make('Estimasi Laba Kotor', $this->rupiah($laba))
                ->description('Selisih penjualan & modal (harga beli)')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->descriptionColor('primary')
                ->icon('heroicon-m-chart-bar')
                ->color('primary')
                ->chart($labaTrend),
            Stat::make('Pengeluaran Pembelian', $this->rupiah($pengeluaran))
                ->description(Pembelian::query()->count().' pembelian')
                ->icon('heroicon-m-truck')
                ->color('zinc'),
            Stat::make('Nilai Persediaan', $this->rupiah($nilaiPersediaan))
                ->description(Obat::query()->count().' jenis obat, '.Obat::query()->sum('stok').' unit')
                ->icon('heroicon-m-cube')
                ->color('violet'),
            Stat::make('Stok Menipis', $stokMenipis)
                ->description('Stok di bawah 5 unit — segera restock')
                ->icon('heroicon-m-exclamation-triangle')
                ->color('warning'),
            Stat::make('Kadaluarsa Dekat', $kadaluarsa)
                ->description('Dalam 30 hari ke depan')
                ->icon('heroicon-m-clock')
                ->color('danger'),
            Stat::make('Pelanggan', $totalPelanggan)
                ->description($totalResep.' resep terdaftar')
                ->descriptionIcon('heroicon-m-document-text')
                ->icon('heroicon-m-users')
                ->color('emerald'),
        ];
    }

    private function monthTotals($query, string $kolom, Carbon $start): array
    {
        $totals = [];

        for ($i = 0; $i < 12; $i++) {
            $awal = $start->copy()->addMonths($i);
            $akhir = $awal->copy()->addMonth();
            $totals[] = (float) (clone $query)
                ->where($kolom, '>=', $awal)
                ->where($kolom, '<', $akhir)
                ->sum('total_harga');
        }

        return $totals;
    }

    private function rupiah(float|int $nilai): string
    {
        return 'Rp'.number_format($nilai, 0, ',', '.');
    }
}
