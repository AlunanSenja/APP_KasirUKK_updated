@extends('layouts.app')

@section('content')
    <main class="flex-shirnk-0">
        <div class="container">
           <div class="card" style="margin-top: 100px;">
            <div class="card-header">
                <h5>Stok Produk</h5>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Nama Produk</th>
                        <th width="200">Harga Satuan</th>
                        <th width="120">Stok Awal</th>
                        <th width="120">Terjual</th>
                        <th width="120">Stok Akhir</th>
                        {{-- <th width="180">Aksi</th> --}}
                    </thead>

                    <tbody>
                        @forelse ($stok as $dt)
                            <tr>
                                <td>{{ $dt->nama_produk}}</td>
                                <td class="text-end">{{number_format($dt->harga)}}</td>
                                <td class="text-end">{{number_format($dt->stok)}}</td>
                                <td class="text-end">{{number_format($dt->terjual)}}</td>
                                <td class="text-end">{{number_format($dt->stok - $dt->terjual)}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">data still empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
           </div>
        </div>
    </main>
@endsection