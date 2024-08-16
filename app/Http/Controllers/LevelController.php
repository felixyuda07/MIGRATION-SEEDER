<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Level User',
            'list'  => ['Home', 'level']
        ];

        $page = (object)[
            'title' => 'Daftar Level Pengguna'
        ];

        $activeMenu = 'level';


        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $level = LevelModel::select('level_id', 'level_kode', 'level_nama');
        
        return DataTables::of($level)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/level/' .  $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Level',
            'list'  => ['Home', 'Level', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah level baru'
        ];

        $activeMenu = 'level';


        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di table m_user kolom usernmae
            'level_kode' => 'required|string|min:2|unique:m_level,level_kode',
            'level_nama'     =>  'required|string|max:100' //nama haruus diisi, berupa string, dan maksimal 100 karakter
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama'  => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data user berhasil disimpan');
    }
    public function show(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Level',
            'list'  => ['Home', 'Level', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail level'
        ];

        $activeMenu = 'level';


        return view('level.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level'=>$level, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){
        $level = LevelModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Level',
            'list'  => ['Home', 'Level', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Level'
        ];

        $activeMenu = 'level';


        return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level'=>$level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id){

        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di table m_user kolom usernmae
            'level_kode' => 'required|string|min:2|unique:m_level,level_kode',
            'level_nama'     =>  'required|string|max:100' // level_id harus diisi dan berupa angka
        ]);

        LevelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama'  => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id){
        $check = LevelModel::find($id);
        if (!$check){
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }

        try{
            LevelModel::destroy($id); //hapus data level

            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/level')-with('error', 'Data use gagal dihapus karena masih terdapat tabel lain yang terkait deng data ini');
        }
    }
}


