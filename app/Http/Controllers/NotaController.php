<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function cetak(TransaksiPenjualan $transaksi)
    {
        // Eager load relationships to avoid N+1 query problems
        $transaksi->load('pelanggan', 'user', 'detailTransaksi.obat');
        $pengaturan = Pengaturan::pluck('value', 'key');

        return view('nota.transaksi', compact('transaksi', 'pengaturan'));
    }
}