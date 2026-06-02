<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengaturan')->insert([
            [
                'key' => 'nama_aplikasi',
                'value' => 'Apotek Anda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'alamat_toko',
                'value' => 'Jl. Sehat Selalu No. 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'no_telepon',
                'value' => '08123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
