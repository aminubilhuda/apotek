<?php

namespace App\Observers;

use App\Models\DetailTransaksi;
use App\Models\KartuStok;
use App\Models\Obat;

class DetailTransaksiObserver
{
    /**
     * Handle the DetailTransaksi "created" event.
     */
    public function created(DetailTransaksi $detailTransaksi): void
    {
        $obat = Obat::find($detailTransaksi->id_obat);
        if ($obat) {
            $stokAwal = $obat->stok;
            $obat->stok -= $detailTransaksi->jumlah;
            $obat->save();

            KartuStok::create([
                'id_obat' => $obat->id_obat,
                'jenis' => 'keluar',
                'jumlah' => $detailTransaksi->jumlah,
                'stok_awal' => $stokAwal,
                'stok_akhir' => $obat->stok,
                'referensi_id' => $detailTransaksi->id_transaksi,
                'referensi_type' => \App\Models\TransaksiPenjualan::class,
                'keterangan' => 'Penjualan #' . $detailTransaksi->id_transaksi,
                'user_id' => auth()->id(),
            ]);
        }
    }

    /**
     * Handle the DetailTransaksi "updated" event.
     */
    public function updated(DetailTransaksi $detailTransaksi): void
    {
        if ($detailTransaksi->isDirty('jumlah')) {
            $selisih = $detailTransaksi->jumlah - $detailTransaksi->getOriginal('jumlah');
            $obat = Obat::find($detailTransaksi->id_obat);
            
            if ($obat) {
                $stokAwal = $obat->stok;
                // Jika jumlah bertambah, stok berkurang. Jika jumlah berkurang, stok bertambah.
                $obat->stok -= $selisih;
                $obat->save();

                $jenis = $selisih > 0 ? 'keluar' : 'masuk';
                
                KartuStok::create([
                    'id_obat' => $obat->id_obat,
                    'jenis' => $jenis,
                    'jumlah' => abs($selisih),
                    'stok_awal' => $stokAwal,
                    'stok_akhir' => $obat->stok,
                    'referensi_id' => $detailTransaksi->id_transaksi,
                    'referensi_type' => \App\Models\TransaksiPenjualan::class,
                    'keterangan' => 'Koreksi Penjualan #' . $detailTransaksi->id_transaksi,
                    'user_id' => auth()->id(),
                ]);
            }
        }
    }

    /**
     * Handle the DetailTransaksi "deleted" event.
     */
    public function deleted(DetailTransaksi $detailTransaksi): void
    {
        $obat = Obat::find($detailTransaksi->id_obat);
        if ($obat) {
            $stokAwal = $obat->stok;
            $obat->stok += $detailTransaksi->jumlah;
            $obat->save();

            KartuStok::create([
                'id_obat' => $obat->id_obat,
                'jenis' => 'masuk', // Barang kembali (void)
                'jumlah' => $detailTransaksi->jumlah,
                'stok_awal' => $stokAwal,
                'stok_akhir' => $obat->stok,
                'referensi_id' => $detailTransaksi->id_transaksi,
                'referensi_type' => \App\Models\TransaksiPenjualan::class,
                'keterangan' => 'Void/Hapus Penjualan #' . $detailTransaksi->id_transaksi,
                'user_id' => auth()->id(),
            ]);
        }
    }
}
