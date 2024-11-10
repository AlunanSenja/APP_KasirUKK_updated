@extends('layouts.app')
@section('content')
    <main class="flex-shrink-0">
        <d class="container">
            <div class="card" style="margin-top 100px;">
                <div class="card-header">
                    <h5>Detail Produk</h5>
                </div>
                <div class="card-body">
                    @php
                        $total_harga = 0;
                    @endphp
                   <div class="row mb-0 p-2">
                     <table class="table table-bordered">
                        <thead>
                            <th>Produk</th>
                            <th width="150">Jumlah</th>
                            <th width="150">Harga Satuan</th>
                            <th width="150">Subtotal</th>
                        </thead>
                        <tbody>
                            @forelse ($detail as $dt)
                                <tr>
                                    <td>{{ $dt->nama_produk }}</td>
                                    <td>{{ $dt->jumlah_produk }}</td>
                                    <td class="text-end">{{ number_format($dt->harga)}}</td>
                                    <td class="text-end">{{ number_format($dt->subtotal) }}</td>
                                </tr>
                                @php
                                    $total_harga += $dt->subtotal;
                                @endphp
                            @empty
                                <td colspan="5">Data detail masih kosong</td>
                            @endforelse
                        </tbody>
                        
                      </table>
                   </div>
                </div>
            </div>
        </div>

        
            <div class="card" style="margin-top: 10px;">
                <div class="card-header">
                    <h5>Simpan Penjualan</h5>
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

                   <form action="{{route('penjualan.store')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="produk_id" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                  
                    <div class="col-sm-10">
                        <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                            <option value="">--PILIH PELANGGAN--</option>
                            @foreach ($pelanggan as $dp)
                            <option value="{{$dp->id }}">{{ $dp->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col sm-10">
                        <input type="number" readonly class="form-control" id="total_harga" name="total_harga" value="{{ old('total_harga', round($total_harga))}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">tanggal_penjualan</label>
                        <div class="col sm-10">
                        <input type="date"  class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" value="{{ old('tanggal_penjualan')}}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <a href="{{ route('detail.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        
    </main>
@endsection
