<?php

namespace App\Models;

use App\Models\Concerns\ScopedByUser;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use ScopedByUser;

    protected $table = 'supplier';

    protected $primaryKey = 'id_supplier';

    protected $fillable = ['nama_supplier', 'alamat', 'no_telp', 'email', 'id_user'];

    public function obat()
    {
        return $this->hasMany(Obat::class, 'id_supplier', 'id_supplier');
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'id_supplier', 'id_supplier');
    }
}
