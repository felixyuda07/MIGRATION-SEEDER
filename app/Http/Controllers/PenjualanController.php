<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Transaksi Penjualan',
            'list'  => ['Home', 'Transakasi']
        ];

        $activeMenu = 'penjualan';

        $data = DB::select('select * from t_penjualan');

        return view('penjualan', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'data'=>$data]);
    }

}
