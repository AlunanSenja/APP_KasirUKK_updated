@extends('layouts.app')

@section('content')
    
<main class="flex-srink-0">
    <div class="container">
        <div class="card" style="margin-top: 100px;">
            <div class="card-header">
                <h5>Detail Produk</h5>
            </div>

            <div class="card-body">
              <div class="row">
                    <label class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                  <b> {{ $produk->nama_produk }} </b>
                </div>
              </div>
            </div>

            <div class="card-body">
                <div class="row">
                      <label class="col-sm-2 col-form-label">Harga Satuan</label>
                  <div class="col-sm-10">
                    <b> {{ $produk->harga }} </b>
                  </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                      <label class="col-sm-2 col-form-label">Stok</label>
                  <div class="col-sm-10">
                    <b> {{ $produk->stok }} </b>
                  </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route ('produk.index')}}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
</main>
@endsection