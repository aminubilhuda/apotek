<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $dokterList = [
            [
                'nama_dokter' => 'dr. Ahmad Susanto',
                'no_str' => '3512345678901',
                'no_telp' => '081234567890',
                'alamat' => 'Jl. Pahlawan No. 10, Jakarta Selatan',
            ],
            [
                'nama_dokter' => 'dr. Sarah Wijaya',
                'no_str' => '3512345678902',
                'no_telp' => '081234567891',
                'alamat' => 'Jl. Menteng Raya No. 25, Jakarta Pusat',
            ],
            [
                'nama_dokter' => 'dr. Budi Santoso',
                'no_str' => '3512345678903',
                'no_telp' => '081234567892',
                'alamat' => 'Jl. Sudirman No. 45, Jakarta Selatan',
            ],
            [
                'nama_dokter' => 'dr. Dewi Lestari',
                'no_str' => '3512345678904',
                'no_telp' => '081234567893',
                'alamat' => 'Jl. Thamrin No. 30, Jakarta Pusat',
            ],
            [
                'nama_dokter' => 'dr. Rudi Hermawan',
                'no_str' => '3512345678905',
                'no_telp' => '081234567894',
                'alamat' => 'Jl. Gatot Subroto No. 15, Jakarta Selatan',
            ],
        ];

        foreach ($dokterList as $dokter) {
            Dokter::create($dokter);
        }
    }
}
