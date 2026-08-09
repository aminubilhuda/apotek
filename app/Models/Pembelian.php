<?php

namespace App\Models;

use App\Models\Concerns\ScopedByUser;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use ScopedByUser;

    protected $table = 'pembelian';

    protected $primaryKey = 'id_pembelian';

    protected $fillable = ['tanggal_pembelian', 'id_supplier', 'total_harga', 'id_user'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user', 'id');
    }

    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class, 'id_pembelian', 'id_pembelian');
    }
}
