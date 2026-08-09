<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class KartuStok extends Model
{
    protected $table = 'kartu_stok';

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::addGlobalScope('userScope', function (Builder $builder) {
            $user = Auth::user();

            if ($user === null || $user->isAdmin()) {
                return;
            }

            $builder->whereHas('obat', fn (Builder $query) => $query->where('id_user', $user->id));
        });
    }

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
