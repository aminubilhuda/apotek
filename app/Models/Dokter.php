<?php

namespace App\Models;

use App\Models\Concerns\ScopedByUser;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use ScopedByUser;

    protected $table = 'dokter';

    protected $primaryKey = 'id_dokter';

    protected $fillable = ['nama_dokter', 'no_str', 'no_telp', 'alamat', 'id_user'];

    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_dokter', 'id_dokter');
    }
}
