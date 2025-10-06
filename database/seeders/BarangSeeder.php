<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Barang::create([
            'nama_barang' => 'Laptop Gaming',
            'kategori_id' => 1,
            'stok' => 5,
            'harga' => 15000000,
            'gambar' => 'barang/laptop.jpg'
        ]);

        \App\Models\Barang::create([
            'nama_barang' => 'Mouse Wireless',
            'kategori_id' => 1,
            'stok' => 20,
            'harga' => 150000,
            'gambar' => null
        ]);
    }
}
