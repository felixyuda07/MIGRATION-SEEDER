<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Data Barang',
            'list'  => ['Home', 'Barang']
        ];

        $activeMenu = 'barang';

        $data = DB::select('select * from m_barang');

        return view('Barang', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'data'=>$data]);
    }
}