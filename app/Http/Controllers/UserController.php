<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $breadcrumb = (object)[
            'title' => 'Data User',
            'list'  => ['Home', 'User']
        ];

        $activeMenu = 'user';

        $data = DB::select('select * from m_user');

        return view('User', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'data'=>$data]);
       
    }

}