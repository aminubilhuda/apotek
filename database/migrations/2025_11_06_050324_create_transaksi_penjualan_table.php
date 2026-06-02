<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPenjualanTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->dateTime('tanggal_transaksi')->useCurrent();
            $table->unsignedInteger('id_pelanggan')->nullable();
            $table->decimal('total_harga', 12, 2)->default(0);
            $table->enum('metode_pembayaran', ['Tunai', 'Transfer', 'QRIS'])->default('Tunai');
            $table->unsignedInteger('id_user')->nullable();
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('set null');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_penjualan');
    }
}