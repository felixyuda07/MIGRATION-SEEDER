<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KategoriController extends Controller
{
    public function index(){
        // $data = [
        //     'kategori_kode'=>'SNK',
        //     'kategori_nama'=>'Snack/Makanan RIngan',
        //     'created_at'=>now()
        // ];
        // DB::table('m_kategori')->insert($data);

        // return 'data behasil ditambah';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'update data berhasil, jumlah data yang terupdate'  . $row . ' baris';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'delete data berhasil, jumlah data yang terhapus'  . $row . ' baris';
        $breadcrumb = (object)[
            'title' => 'Kategori Barang',
            'list'  => ['Home', 'Level']
        ];

        $activeMenu = 'kategori';

        $data = DB::select('select * from m_kategori');

        return view('Kategori', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'data'=>$data]);
        
    }
}
