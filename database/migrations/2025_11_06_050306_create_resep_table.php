<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepTable extends Migration
{
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->increments('id_resep');
            $table->unsignedInteger('id_dokter')->nullable();
            $table->unsignedInteger('id_pelanggan')->nullable();
            $table->date('tanggal_resep')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onDelete('set null');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('resep');
    }
}
