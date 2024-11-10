@extends('layouts.app')

@section('content')
    
<main class="flex-srink-0">
    <div class="container">
        <div class="card" style="margin-top: 100px;">
            <div class="card-header">
                <h5>Detail Pelanggan</h5>
            </div>

            <div class="card-body">
              <div class="row">
                    <label class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-10">
                  <b> {{ $pelanggan->nama_pelanggan }} </b>
                </div>
              </div>
             

           
                <div class="row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <b> {{ $pelanggan->alamat }} </b>
                  </div>
                </div>
          

           
                <div class="row">
                      <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <b> {{ $pelanggan->nomor_telepon }} </b>
                  </div>
                </div>
            </div>

            <div class="card-footer">
                <a href="{{route ('pelanggan.index')}}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
</main>
@endsection