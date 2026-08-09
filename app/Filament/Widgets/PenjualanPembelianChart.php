<?php

namespace App\Filament\Widgets;

use App\Models\Pembelian;
use App\Models\TransaksiPenjualan;
use Filament\Widgets\LineChartWidget;
use Illuminate\Support\Carbon;

class PenjualanPembelianChart extends LineChartWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $mulai = now()->subMonths(11)->startOfMonth();
        $labels = [];

        for ($i = 0; $i < 12; $i++) {
            $labels[] = $mulai->copy()->addMonths($i)->translatedFormat('M');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Penjualan',
                    'data' => $this->totals(TransaksiPenjualan::query(), 'tanggal_transaksi', $mulai),
                    'backgroundColor' => 'rgba(16, 185, 129, 0.12)',
                    'borderColor' => 'rgb(16, 185, 129)',
                    'tension' => 0.35,
                    'fill' => true,
                ],
                [
                    'label' => 'Pembelian',
                    'data' => $this->totals(Pembelian::query(), 'tanggal_pembelian', $mulai),
                    'backgroundColor' => 'rgba(100, 116, 139, 0.12)',
                    'borderColor' => 'rgb(100, 116, 139)',
                    'tension' => 0.35,
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    private function totals($query, string $kolom, Carbon $mulai): array
    {
        $totals = [];

        for ($i = 0; $i < 12; $i++) {
            $awal = $mulai->copy()->addMonths($i);
            $akhir = $awal->copy()->addMonth();
            $totals[] = (float) (clone $query)
                ->where($kolom, '>=', $awal)
                ->where($kolom, '<', $akhir)
                ->sum('total_harga');
        }

        return $totals;
    }

    public function getHeading(): string
    {
        return 'Penjualan vs Pembelian — 12 Bulan Terakhir';
    }

    public function getDescription(): string
    {
        return 'Total penerimaan & pengeluaran per bulan (Rp)';
    }
}
