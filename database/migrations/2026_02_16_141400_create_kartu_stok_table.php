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
        Schema::create('kartu_stok', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_obat');
            $table->enum('jenis', ['masuk', 'keluar', 'penyesuaian']);
            $table->integer('jumlah');
            $table->integer('stok_awal');
            $table->integer('stok_akhir');
            $table->unsignedBigInteger('referensi_id')->nullable(); // ID Transaksi / Pembelian
            $table->string('referensi_type')->nullable(); // Model Class
            $table->text('keterangan')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('id_obat')->references('id_obat')->on('obat')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_stok');
    }
};
