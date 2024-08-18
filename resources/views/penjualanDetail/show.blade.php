@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($penjualanDetail)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $penjualanDetail->penjualanDetail_id }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Penjualan</th>
                        <td>{{ $penjualanDetail->penjualan->tanggal_penjualan }}</td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td>{{ $penjualanDetail->barang->nama_barang}}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Barang</th>
                        <td>{{ $penjualanDetail->jumlah_barang }}</td>
                    </tr>
                    <tr>
                        <th>Harga Barang</th>
                        <td>{{ $penjualanDetail->harga_barang }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('penjualanDetail') }}" class="btn btn-sm btn-default mt2">Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
