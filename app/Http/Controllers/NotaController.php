<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\TransaksiPenjualan;

class NotaController extends Controller
{
    public function cetak(TransaksiPenjualan $transaksi)
    {
        $user = auth()->user();

        abort_if($user === null, 401);

        if (! $user->isAdmin() && $transaksi->id_user !== $user->id) {
            abort(403);
        }

        // Eager load relationships to avoid N+1 query problems
        $transaksi->load('pelanggan', 'user', 'detailTransaksi.obat');

        $pengaturan = Pengaturan::withoutGlobalScope('userScope')
            ->where('id_user', $transaksi->id_user)
            ->pluck('value', 'key');

        return view('nota.transaksi', compact('transaksi', 'pengaturan'));
    }
}
