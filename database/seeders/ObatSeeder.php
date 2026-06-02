<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        $obatList = [
            [
                'kode_obat' => 'PCT001',
                'nama_obat' => 'Paracetamol',
                'jenis_obat' => 'Tablet',
                'kategori' => 'Analgesik',
                'satuan' => 'Strip',
                'stok' => 100,
                'harga_beli' => 5000,
                'harga_jual' => 7500,
                'tanggal_kadaluarsa' => '2026-12-31',
                'id_supplier' => 1,
            ],
            [
                'kode_obat' => 'AMX001',
                'nama_obat' => 'Amoxicillin',
                'jenis_obat' => 'Kapsul',
                'kategori' => 'Antibiotik',
                'satuan' => 'Strip',
                'stok' => 75,
                'harga_beli' => 15000,
                'harga_jual' => 20000,
                'tanggal_kadaluarsa' => '2026-11-30',
                'id_supplier' => 2,
            ],
            [
                'kode_obat' => 'CTM001',
                'nama_obat' => 'Cetirizine',
                'jenis_obat' => 'Tablet',
                'kategori' => 'Antihistamin',
                'satuan' => 'Strip',
                'stok' => 50,
                'harga_beli' => 8000,
                'harga_jual' => 12000,
                'tanggal_kadaluarsa' => '2026-10-31',
                'id_supplier' => 3,
            ],
            [
                'kode_obat' => 'OMZ001',
                'nama_obat' => 'Omeprazole',
                'jenis_obat' => 'Kapsul',
                'kategori' => 'Antasida',
                'satuan' => 'Strip',
                'stok' => 60,
                'harga_beli' => 12000,
                'harga_jual' => 18000,
                'tanggal_kadaluarsa' => '2026-09-30',
                'id_supplier' => 4,
            ],
            [
                'kode_obat' => 'VTC001',
                'nama_obat' => 'Vitamin C',
                'jenis_obat' => 'Tablet',
                'kategori' => 'Vitamin',
                'satuan' => 'Botol',
                'stok' => 40,
                'harga_beli' => 25000,
                'harga_jual' => 35000,
                'tanggal_kadaluarsa' => '2026-08-31',
                'id_supplier' => 5,
            ],
        ];

        foreach ($obatList as $obat) {
            Obat::create($obat);
        }
    }
}