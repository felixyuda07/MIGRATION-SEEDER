<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KategoriController extends Controller
{
    public function index(){
        $data = [
            'kategori_kode'=>'SNK',
            'level_nama'=>'Snack/Makanan RIngan',
            'created_at'=>now()
        ];
        DB::table('m_kategori')->insert($data);

        return 'data behasil ditambah';

        
    }
}
