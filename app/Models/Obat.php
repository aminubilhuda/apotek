<?php

namespace App\Models;

use App\Models\Concerns\ScopedByUser;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use ScopedByUser;

    protected $table = 'obat';

    protected $primaryKey = 'id_obat';

    protected $fillable = [
        'kode_obat', 'nama_obat', 'jenis_obat', 'kategori',
        'satuan', 'stok', 'harga_beli', 'harga_jual',
        'tanggal_kadaluarsa', 'id_supplier', 'id_user',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_obat', 'id_obat');
    }

    public function detailResep()
    {
        return $this->hasMany(DetailResep::class, 'id_obat', 'id_obat');
    }

    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class, 'id_obat', 'id_obat');
    }

    public function kartuStok()
    {
        return $this->hasMany(KartuStok::class, 'id_obat', 'id_obat');
    }
}
