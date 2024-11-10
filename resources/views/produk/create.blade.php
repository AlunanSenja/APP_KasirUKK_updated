@extends('layouts.app')

@section('content')
          
<main class="">
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="card" style="margin-top: 100px;">
                <div class="card-header">
                    <h1>Tambah Produk</h1>
                </div>

                <div class="card-body">
                    @if ($errors->all())
                 <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                 </div>                        
                    @endif

                    <form action="{{ route ('produk.store')}}" method="POST">
                        @csrf
                     <div class="row mb-3">
                        <label for="nama_produk" class="col-sm-2 col-form-lable">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" class="form-control" id="nama_produk">
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-lable">Harga Satuan</label>
                        <div class="col-sm-10">
                            <input type="number" name="harga" value="{{ old('harga') }}" class="form-control" id="harga">
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-lable">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" name="stok" value="{{ old('stok') }}" class="form-control" id="stok">
                        </div>
                     </div>
                
                     <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                     </form>
                     <a href="{{ route ('produk.index')}}" class="btn btn-warning">Kembali</a>
                     </div>
                </div>
            </div>
        </div>
    </header>
</main>
@endsection