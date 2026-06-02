<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_transaksi', 'id_obat', 'jumlah', 'harga_satuan', 'subtotal'];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiPenjualan::class, 'id_transaksi', 'id_transaksi');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}