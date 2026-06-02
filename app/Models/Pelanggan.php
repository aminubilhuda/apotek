<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $fillable = ['nama_pelanggan', 'alamat', 'no_telp', 'jenis_kelamin', 'tanggal_lahir'];

    public function transaksiPenjualan()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_pelanggan', 'id_pelanggan');
    }
}