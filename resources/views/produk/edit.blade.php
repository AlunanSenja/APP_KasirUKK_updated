@extends('layouts.app')

@section('content')
<main class="flex-shrink-10">
   <div class="container">
      <div class="card" style="margin-top: 100px;">
        <div class="card-header">
            <h5>Edit Data Produk</h5>
        </div>
        
        <div class="card-body">
            @if ($errors->all())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('produk.update', $produk->id)}}" method="POST">
                @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="nama_produk" class="col-sm-2 col-form-lable">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_produk" value="{{old ('nama_produk', $produk->nama_produk)}}" class="form-control" id="nama_produk">
                </div>
             </div>

             <div class="row mb-3">
                <label for="harga" class="col-sm-2 col-form-lable">Harga Satuan</label>
                <div class="col-sm-10">
                    <input type="number" name="harga" value="{{old ('harga', $produk->harga)}}" class="form-control" id="harga">
                </div>
             </div>

             <div class="row mb-3">
                <label for="stok" class="col-sm-2 col-form-lable">Stok</label>
                <div class="col-sm-10">
                    <input type="number" name="stok" value="{{old ('stok', $produk->stok)}}" class="form-control" id="stok">
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
</main>
@endsection