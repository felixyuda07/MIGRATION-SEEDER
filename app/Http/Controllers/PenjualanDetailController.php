<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class PenjualanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $breadcrumb = (object)[
            'title' => 'Data Transaksi Penjualan',
            'list'  => ['Home', 'Penjualan Detail']
        ];

        $page = (object)[
            'title' => 'Daftar Detail Transaksi'
        ];

        $barang = BarangModel::all(); //ambil data level untuk ditampilkan di form
        $penjualan = PenjualanModel::all(); //ambil data level untuk ditampilkan di form
        $activeMenu = 'penjualanDetail';


        return view('penjualanDetail.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'penjualan' => $penjualan, 'activeMenu' => $activeMenu]);
    }

    // Ambil data penjualanDetail dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $penjual = PenjualanDetailModel::select('penjualan_detail_id', 'jumlah_barang', 'harga_barang', 'barang_id', 'penjualan_id')
            ->with('penjualan', 'barang');

        if ($request->barang_id){
            $penjual->where('barang_id', $request->barang_id);
        } 
        
        if ($request->penjualan_id){
            $penjual->where('penjualan_id', $request->penjualan_id);
        }
        
        return DataTables::of($penjual)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjual) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/penjualanDetail/' . $penjual->penjualan_detail_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/penjulanDetail/' . $penjual->penjualan_detail_id . '/edit') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualandetail/' . $penjual->penjualan_detail_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Penjualan',
            'list'  => ['Home', 'Penjualan Detail', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Daftar Detail Penjualan yang terdaftar dalam sistem'
        ];

        $barang = BarangModel::all(); //ambil data level untuk ditampilkan di form
        $penjualan = PenjualanModel::all();
        $activeMenu = 'penjualanDetail';


        return view('penjualanDetail.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'penjualan' => $penjualan, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        dd($request->all());

        $request->validate([
            // penjualanDetailname harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di table m_penjualanDetail kolom penjualanDetailnmae
            'jumlah_barang' => 'required|integer|',
            'harga_barang'  => 'required|numeric|between:0,999999.99', 
            // 'penjualan_id' => 'required|date',
            'barang_id' => 'required|integer'
        ]);

        PenjualanDetailModel::create([
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang'  => $request->harga_barang,
            // 'penjualan_id' => $request->penjualan_id,
            'barang_id' => $request->barang_id
        ]);

        return redirect('/penjualanDetail')->with('success', 'Data Penjualan berhasil disimpan');
    }

    public function show(string $id)
    {

        $penjualanDetail = PenjualanDetailModel::with('barang', 'penjualan')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail penjualanDetail',
            'list'  => ['Home', 'Penjualan Detail', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Penjualan'
        ];

        $activeMenu = 'penjualanDetail';


        return view('penjualanDetail.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualanDetail' => $penjualanDetail,'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){
        $penjualanDetail = PenjualanDetailModel::find($id);
        $barang = BarangModel::all();
        $penjualan = PenjualanModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Detail Penjualan',
            'list'  => ['Home', 'Penjualan Detail', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit DEtail Penjualan'
        ];

        $activeMenu = 'penjualanDetail';


        return view('penjualanDetail.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualanDetail' => $penjualanDetail, 'barang' => $barang, 'penjualan' => $penjualan, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id){

        $request->validate([
            // penjualanDetailname harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di table m_penjualanDetail kolom penjualanDetailnmae
            'jumlah_barang' => 'required|integer|',
            'harga_barang'  => 'required|numeric|between:0,999999.99', 
            'penjualan_id' => 'required|date',
            'barang_id' => 'required|integer' // level_id harus diisi dan berupa angka
        ]);

        PenjualanDetailModel::find($id)->update([
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang'  => $request->harga_barang,
            'penjualan_id' => $request->penjualan_id,
            'barang_id' => $request->barang_id
        ]);

        return redirect('/penjualanDetail')->with('success', 'Data penjualanDetail berhasil diubah');
    }

    public function destroy(string $id){
        $check = PenjualanDetailModel::find($id);
        if (!$check){
            return redirect('/penjualanDetail')->with('error', 'Data penjualanDetail tidak ditemukan');
        }

        try{
            PenjualanDetailModel::destroy($id); //hapus data level

            return redirect('/penjualanDetail')->with('success', 'Data penjualanDetail berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/penjualanDetail')-with('error', 'Data use gagal dihapus karena masih terdapat tabel lain yang terkait deng data ini');
        }
    }
}
