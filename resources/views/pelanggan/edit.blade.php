@extends('layouts.app')

@section('content')
<main class="flex-shrink-10">
   <div class="container">
      <div class="card" style="margin-top: 100px;">
        <div class="card-header">
            <h5>Edit Data Pelanggan</h5>
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

            <form action="{{ route('pelanggan.update', $pelanggan->id)}}" method="POST">
                @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="nama_pelanggan" class="col-sm-2 col-form-lable">Nama Pelanggan</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_pelanggan" value="{{old ('nama_pelanggan', $pelanggan->nama_pelanggan)}}" class="form-control" id="nama_pelanggan">
                </div>
             </div>

             <div class="row mb-3">
                <label for="alamat" class="col-sm-2 col-form-lable">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" value="{{old ('alamat', $pelanggan->alamat)}}" class="form-control" id="alamat">
                </div>
             </div>

             <div class="row mb-3">
                <label for="nomor_telepon" class="col-sm-2 col-form-lable">Nomor Telepon</label>
                <div class="col-sm-10">
                    <input type="text" name="nomor_telepon" value="{{old ('nomor_telepon', $pelanggan->nomor_telepon)}}" class="form-control" id="nomor_telepon">
                </div>
             </div>

             </div>
             <div class="card-footer">
             <button type="submit" class="btn btn-primary">Update</button>
             </form>
               <a href="{{ route ('pelanggan.index')}}" class="btn btn-warning">Kembali</a>
               </div>
        </div>
      </div>
   </div>
</main>
@endsection