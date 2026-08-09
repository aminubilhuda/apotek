<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokterTable extends Migration
{
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->increments('id_dokter');
            $table->string('nama_dokter', 100);
            $table->string('no_str', 50)->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokter');
    }
}
