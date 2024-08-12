<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,	
                'kategori_kode'	=> 'KT001',
                'level_nama' => 'Elektronik'
            ],

            [
                'kategori_id' => 2,	
                'kategori_kode'	=> 'KT002',
                'level_nama' => 'Perabotan'
            ],

            [
                'kategori_id' => 3,	
                'kategori_kode'	=> 'KT003',
                'level_nama' => 'Pakaian'
            ],

            [
                'kategori_id' => 4,	
                'kategori_kode'	=> 'KT004',
                'level_nama' => 'Makanan dan Minuman'
            ],

            [
                'kategori_id' => 5,	
                'kategori_kode'	=> 'KT005',
                'level_nama' => 'Alat Tulis'
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
