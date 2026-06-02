<?php

namespace App\Observers;

use App\Models\DetailPembelian;
use App\Models\KartuStok;
use App\Models\Obat;

class DetailPembelianObserver
{
    /**
     * Handle the DetailPembelian "created" event.
     */
    public function created(DetailPembelian $detailPembelian): void
    {
        $obat = Obat::find($detailPembelian->id_obat);
        if ($obat) {
            $stokAwal = $obat->stok;
            $obat->stok += $detailPembelian->jumlah;
            $obat->save();

            KartuStok::create([
                'id_obat' => $obat->id_obat,
                'jenis' => 'masuk',
                'jumlah' => $detailPembelian->jumlah,
                'stok_awal' => $stokAwal,
                'stok_akhir' => $obat->stok,
                'referensi_id' => $detailPembelian->id_pembelian,
                'referensi_type' => \App\Models\Pembelian::class,
                'keterangan' => 'Pembelian #' . $detailPembelian->id_pembelian,
                'user_id' => auth()->id(),
            ]);
        }
    }

    /**
     * Handle the DetailPembelian "updated" event.
     */
    public function updated(DetailPembelian $detailPembelian): void
    {
        // Jika jumlah berubah, sesuaikan stok
        if ($detailPembelian->isDirty('jumlah')) {
            $selisih = $detailPembelian->jumlah - $detailPembelian->getOriginal('jumlah');
            $obat = Obat::find($detailPembelian->id_obat);
            
            if ($obat) {
                $stokAwal = $obat->stok;
                $obat->stok += $selisih;
                $obat->save();

                $jenis = $selisih > 0 ? 'masuk' : 'keluar';
                
                KartuStok::create([
                    'id_obat' => $obat->id_obat,
                    'jenis' => $jenis,
                    'jumlah' => abs($selisih),
                    'stok_awal' => $stokAwal,
                    'stok_akhir' => $obat->stok,
                    'referensi_id' => $detailPembelian->id_pembelian,
                    'referensi_type' => \App\Models\Pembelian::class,
                    'keterangan' => 'Koreksi Pembelian #' . $detailPembelian->id_pembelian,
                    'user_id' => auth()->id(),
                ]);
            }
        }
    }

    /**
     * Handle the DetailPembelian "deleted" event.
     */
    public function deleted(DetailPembelian $detailPembelian): void
    {
        $obat = Obat::find($detailPembelian->id_obat);
        if ($obat) {
            $stokAwal = $obat->stok;
            $obat->stok -= $detailPembelian->jumlah;
            $obat->save();

            KartuStok::create([
                'id_obat' => $obat->id_obat,
                'jenis' => 'keluar', // Koreksi stok karena dihapus (dianggap batal beli/keluar)
                'jumlah' => $detailPembelian->jumlah,
                'stok_awal' => $stokAwal,
                'stok_akhir' => $obat->stok,
                'referensi_id' => $detailPembelian->id_pembelian,
                'referensi_type' => \App\Models\Pembelian::class,
                'keterangan' => 'Hapus Detail Pembelian #' . $detailPembelian->id_pembelian,
                'user_id' => auth()->id(),
            ]);
        }
    }
}
