<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianTable extends Migration
{
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->increments('id_pembelian');
            $table->date('tanggal_pembelian')->nullable();
            $table->unsignedInteger('id_supplier')->nullable();
            $table->decimal('total_harga', 12, 2)->default(0);
            $table->unsignedInteger('id_user')->nullable();
            $table->timestamps();

            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onDelete('set null');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
}
