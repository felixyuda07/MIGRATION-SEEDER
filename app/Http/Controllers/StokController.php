<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Stok Barang',
            'list'  => ['Home', 'Stok']
        ];

        $activeMenu = 'stok';

        $data = DB::select('select * from t_stok');

        return view('stok', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'data'=>$data]);
    }

    
}
