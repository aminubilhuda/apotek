<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $fillable = ['nama_supplier', 'alamat', 'no_telp', 'email'];

    public function obat()
    {
        return $this->hasMany(Obat::class, 'id_supplier', 'id_supplier');
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'id_supplier', 'id_supplier');
    }
}