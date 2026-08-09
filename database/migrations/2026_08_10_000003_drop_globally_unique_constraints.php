<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('obat', function (Blueprint $table) {
            $table->dropUnique(['kode_obat']);
        });

        Schema::table('pengaturan', function (Blueprint $table) {
            $table->dropUnique(['key']);
        });
    }

    public function down(): void
    {
        Schema::table('obat', function (Blueprint $table) {
            $table->string('kode_obat', 50)->unique()->change();
        });

        Schema::table('pengaturan', function (Blueprint $table) {
            $table->string('key')->unique()->change();
        });
    }
};
