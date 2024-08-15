<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(){
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) value(?, ?, ?)', 
        // ['CUS', 'Pelanggan', now()]);

        // return 'insert data baru berhasil';
    
        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', 
        // ['Customer', 'CUS']);

        // return 'update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil, Jumlah data yang dihapus: ' . $row . ' baris';
     
    
        $breadcrumb = (object)[
            'title' => 'Level Pengguna',
            'list'  => ['Home', 'Level']
        ];

        $activeMenu = 'level';

        $data = DB::select('select * from m_level');

        return view('Level', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'data'=>$data]);
    
    
    }
    
}
