@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('penjualanDetail/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (@session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" id="barang_id" name="barang_id" required>
                                <option value="">- Semua -</option>
                                @foreach ($barang as $item)
                                    <option value="{{ $item->barang_id }}">{{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Barang</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualanDetail">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal Penjualan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var datapenjualanDetail = $('#table_penjualanDetail').DataTable({
                // serverSide: true, jika ingin menggunakan server side processing
                serverSide: true,
                ajax: {
                    "url": "{{ url('penjualanDetail/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (d) {
                        d.barang_id = $('#barang_id').val();
                        d.penjualan_id = $('#penjualan_id').val()
                    }
                },
                columns: [{
                    // nomor urut dari laravel datatable addIndexColumn()
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "penjualan.tanggal_penjualan",
                    className: "",
                    // orderable: true, jika ingin kolom ini bisa diurutkan
                    orderable: false,
                    // searchable: true, jika ingin kolom ini bisa dicari
                    searchable: false
                }, {
                    // mengambil data level hasil dari ORM berelasi
                    data: "barang.nama_barang",
                    className: "",
                    orderable: false,
                    searchable: false
                },{
                    data: "jumlah_barang",
                    className: "",
                    orderable: true,
                    searchable: true
                }, {
                    data: "harga_barang",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }]
            });

            $('#barang_id').on('change', function(){
                console.log('Filter changed')
                datapenjualanDetail.ajax.reload();
            });
            $('#penjualan_id').on('change', function(){
                console.log('Filter changed')
                datapenjualanDetail.ajax.reload();
            });

        });
    </script>
@endpush
