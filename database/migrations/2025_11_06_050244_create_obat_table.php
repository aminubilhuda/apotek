<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->increments('id_obat');
            $table->string('kode_obat', 50)->unique();
            $table->string('nama_obat', 100);
            $table->string('jenis_obat', 50)->nullable();
            $table->string('kategori', 50)->nullable();
            $table->string('satuan', 20)->nullable();
            $table->integer('stok')->default(0);
            $table->decimal('harga_beli', 12, 2)->default(0);
            $table->decimal('harga_jual', 12, 2)->default(0);
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->unsignedInteger('id_supplier')->nullable();
            $table->timestamps();

            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
