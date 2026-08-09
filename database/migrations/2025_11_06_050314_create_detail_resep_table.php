<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailResepTable extends Migration
{
    public function up()
    {
        Schema::create('detail_resep', function (Blueprint $table) {
            $table->increments('id_detail_resep');
            $table->unsignedInteger('id_resep');
            $table->unsignedInteger('id_obat');
            $table->integer('jumlah')->default(1);
            $table->string('dosis', 100)->nullable();
            $table->timestamps();

            $table->foreign('id_resep')->references('id_resep')->on('resep')->onDelete('cascade');
            $table->foreign('id_obat')->references('id_obat')->on('obat')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_resep');
    }
}
