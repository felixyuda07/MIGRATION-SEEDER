<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_barang')->insert([
            ['nama_barang' => 'Laptop', 'kategori_id' => 1],
            ['nama_barang' => 'Meja', 'kategori_id' => 2],
            ['nama_barang' => 'Kemeja', 'kategori_id' => 3],
            ['nama_barang' => 'Minuman Soda', 'kategori_id' => 4],
            ['nama_barang' => 'Pulpen', 'kategori_id' => 5],
            ['nama_barang' => 'Smartphone', 'kategori_id' => 1],
            ['nama_barang' => 'Kursi', 'kategori_id' => 2],
            ['nama_barang' => 'Celana', 'kategori_id' => 3],
            ['nama_barang' => 'Snack', 'kategori_id' => 4],
            ['nama_barang' => 'Buku Tulis', 'kategori_id' => 5],
        ]);
    }
}
