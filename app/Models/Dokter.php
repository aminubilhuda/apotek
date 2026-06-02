<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable = ['nama_dokter', 'no_str', 'no_telp', 'alamat'];

    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_dokter', 'id_dokter');
    }
}