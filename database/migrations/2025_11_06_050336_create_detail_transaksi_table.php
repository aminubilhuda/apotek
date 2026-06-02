<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->unsignedInteger('id_transaksi');
            $table->unsignedInteger('id_obat');
            $table->integer('jumlah')->default(1);
            $table->decimal('harga_satuan', 12, 2)->default(0);
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi_penjualan')->onDelete('cascade');
            $table->foreign('id_obat')->references('id_obat')->on('obat')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
}