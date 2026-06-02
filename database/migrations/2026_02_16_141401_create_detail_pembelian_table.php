<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_pembelian');
            $table->unsignedInteger('id_obat');
            $table->integer('jumlah');
            $table->decimal('harga_beli', 12, 2);
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();

            $table->foreign('id_pembelian')->references('id_pembelian')->on('pembelian')->cascadeOnDelete();
            $table->foreign('id_obat')->references('id_obat')->on('obat')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian');
    }
};
