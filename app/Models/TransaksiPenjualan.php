<?php

namespace App\Models;

use App\Models\Concerns\ScopedByUser;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use ScopedByUser;

    protected $table = 'transaksi_penjualan';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['tanggal_transaksi', 'id_pelanggan', 'total_harga', 'metode_pembayaran', 'id_user'];

    protected $casts = [
        'tanggal_transaksi' => 'datetime',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id_transaksi');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user', 'id');
    }
}
