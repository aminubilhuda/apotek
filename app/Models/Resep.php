<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';
    protected $primaryKey = 'id_resep';
    protected $fillable = ['id_dokter', 'id_pelanggan', 'tanggal_resep', 'catatan'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function detailResep()
    {
        return $this->hasMany(DetailResep::class, 'id_resep', 'id_resep');
    }
}