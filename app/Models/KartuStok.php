<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuStok extends Model
{
    protected $table = 'kartu_stok';
    protected $guarded = ['id'];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Helper untuk load referensi (polymorphic manual)
    public function getReferensiAttribute()
    {
        if ($this->referensi_type && $this->referensi_id) {
            return $this->referensi_type::find($this->referensi_id);
        }
        return null;
    }
}
