<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'nama_supplier' => 'PT Kimia Farma',
                'no_telp' => '021-4567890',
                'email' => 'info@kimiafarma.co.id',
                'alamat' => 'Jl. Veteran No. 9, Jakarta',
            ],
            [
                'nama_supplier' => 'PT Kalbe Farma',
                'no_telp' => '021-5678901',
                'email' => 'contact@kalbefarma.com',
                'alamat' => 'Jl. Jenderal Sudirman Kav. 71, Jakarta',
            ],
            [
                'nama_supplier' => 'PT Sanbe Farma',
                'no_telp' => '022-7654321',
                'email' => 'info@sanbefarma.co.id',
                'alamat' => 'Jl. Industri No. 12, Bandung',
            ],
            [
                'nama_supplier' => 'PT Dexa Medica',
                'no_telp' => '021-8901234',
                'email' => 'contact@dexamedica.com',
                'alamat' => 'Jl. Gatot Subroto Kav. 35-36, Jakarta',
            ],
            [
                'nama_supplier' => 'PT Bintang Toedjoe',
                'no_telp' => '021-7890123',
                'email' => 'info@bintangtoedjoe.com',
                'alamat' => 'Jl. Raya Bogor Km. 28, Jakarta Timur',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
