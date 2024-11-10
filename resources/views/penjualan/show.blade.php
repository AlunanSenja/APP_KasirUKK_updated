@extends('layouts.app')

@section('content')
    
<main class="flex-shrink-8">
    <div class="container">
        <div class="card" style="margin-top: 100px;">
            <div class="card-header">
                <h5>Detail Produk</h5>
            </div>
            <div class="card-body">
                @php
                              $total_harga = 0;  
                @endphp
                <div class="row mb-0 ps-3 pe-3">
                    <table class="table table-boardered">
                        <thead>
                            <th>Produk</th>
                            <th width="150">Jumlah</th>
                            <th width="150">Harga Satuan</th>
                            <th width="150">Total</th>
                        </thead>
                        <tbody>
                            @forelse ($detail as $dt)
                                <tr>
                                    <td>{{ $dt->nama_produk }}</td>
                                    <td>{{ $dt->jumlah_produk }}</td>
                                    <td class="text-end">{{ number_format($dt->harga) }}</td>
                                    <td class="text-end">{{ number_format($dt->subtotal) }}</td>
                                </tr>
                                @php
                                  $total_harga += $dt->subtotal;  
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="5">Detail Barang Masih Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('penjualan.index')}}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@endsection