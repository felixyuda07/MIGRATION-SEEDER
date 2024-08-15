@extends('layouts.template')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Transaksi Penjualan</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <table id="example2"class="table table-bordered table-hover dataTable dtr-inline
        collapsed" aria-describedby="example2_info">
            <tr>
                <th> ID </th>
                <th> Tanggal Penjualan </th>
                <th> Total Harga </th>
            </tr>
    
            @foreach ($data as $d)
            <tr>
                <td> {{ $d->penjualan_id }}</td>
                <td> {{ $d->tanggal_penjualan }}</td>
                <td> {{ $d->total_harga }}</td>
            </tr>
                
            @endforeach
        </table>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="example2_info"
            role="status" aria-live="polite">Showing 1 to 5 of 10 entries</div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers"
            id="example2_paginate"></div>
            <ul class="pagination">
                <li class="paginate_button page-item previous disabled" 
                id="example2_previous"><a href="#" aria-controls="example2"
                data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                <li class="paginate_button page-item active">
                    <a href="#" aria-controls="example2" data-dt-idx="1"
                    tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item">
                    <a href="#" aria-controls="example2" data-dt-idx="2"
                    tabindex="0" class="page-link">2</a>
                </li>
                <li class="paginate_button page-item">
                    <a href="#" aria-controls="example2" data-dt-idx="3"
                    tabindex="0" class="page-link">3</a>
                </li>
                <li class="paginate_button page-item next" id="example_next">
                    <a href="#" aria-controls="example2" data-dt-idx="4"
                    tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
