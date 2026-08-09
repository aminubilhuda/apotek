<?php

namespace App\Models;

use App\Models\Concerns\ScopedByUser;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use ScopedByUser;

    protected $table = 'pelanggan';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = ['nama_pelanggan', 'alamat', 'no_telp', 'jenis_kelamin', 'tanggal_lahir', 'id_user'];

    public function transaksiPenjualan()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_pelanggan', 'id_pelanggan');
    }
}
