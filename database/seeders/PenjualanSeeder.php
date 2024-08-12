<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('t_penjualan')->insert([
                'tanggal_penjualan' => now()->subDays(10 - $i),
                'total_harga' => rand(100000, 1000000),
            ]);
        }
    }
}
