<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['obat', 'pelanggan', 'dokter', 'supplier', 'resep'] as $table) {
            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->foreignId('id_user')->nullable();
                $blueprint->foreign('id_user')->references('id')->on('users')->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        foreach (['obat', 'pelanggan', 'dokter', 'supplier', 'resep'] as $table) {
            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->dropForeign(['id_user']);
                $blueprint->dropColumn('id_user');
            });
        }
    }
};
