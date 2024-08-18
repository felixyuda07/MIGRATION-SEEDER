<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $breadcrumb = (object)[
            'title' => 'Data stok',
            'list'  => ['Home', 'stok']
        ];

        $page = (object)[
            'title' => 'Daftar stok yang terdaftar dalam sistem'
        ];

        $barang = barangModel::all(); //ambil data barang untuk ditampilkan di form
        $activeMenu = 'stok';


        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'activeMenu' => $activeMenu]);
    }

    // Ambil data stok dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $stoks = StokModel::select('stok_id','jumlah_stok', 'barang_id')
            ->with('barang');

        if ($request->barang_id){
            $stoks->where('barang_id', $request->barang_id);
        }
        
        return DataTables::of($stoks)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah stok',
            'list'  => ['Home', 'stok', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Daftar stok yang terdaftar dalam sistem'
        ];

        $barang = barangModel::all(); //ambil data barang untuk ditampilkan di form
        $activeMenu = 'stok';


        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_stok' => 'required|int',
            'barang_id' => 'required|integer' // barang_id harus diisi dan berupa angka
        ]);

        StokModel::create([
            'jumlah_stok' => $request->jumlah_stok,
            'barang_id' => $request->barang_id
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil disimpan');
    }

    public function show(string $id)
    {

        $stok = stokModel::with('barang')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail stok',
            'list'  => ['Home', 'stok', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail stok'
        ];

        $activeMenu = 'stok';


        return view('stok.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok,'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){
        $stok = stokModel::find($id);
        $barang = barangModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit stok',
            'list'  => ['Home', 'stok', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit stok'
        ];

        $activeMenu = 'stok';


        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'barang' => $barang, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id){

        $request->validate([
            'jumlah_stok' => 'required|int',
            'barang_id' => 'required|integer'
        ]);

        stokModel::find($id)->update([
            'jumlah_stok' => $request->jumlah_stok,
            'barang_id' => $request->barang_id
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil diubah');
    }

    public function destroy(string $id){
        $check = stokModel::find($id);
        if (!$check){
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        try{
            stokModel::destroy($id); //hapus data barang

            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/stok')-with('error', 'Data use gagal dihapus karena masih terdapat tabel lain yang terkait deng data ini');
        }
    }
}
