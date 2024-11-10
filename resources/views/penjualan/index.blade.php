@extends('layouts.app')

@section('content')
 <main class="flex-shrink-0">
    <div class="container">
       <div class="card" style="margin-top: 100px;">
         <div class="card-header">
            <h5>Data Penjualan</h5>
         </div>

            <div class="card-body">
             <table class="table table-bordered">
             <thead>
                <th width="150">Tanggal</th>
                <th>Nama Pelanggan</th>
                <th width="250">Total Harga</th>
                <th width="150">Aksi</th>
              </thead>
              <tbody>
                @forelse ($penjualan as $dt)
                    <tr>
                        <td>{{ $dt->tanggal_penjualan }}</td>
                        <td>{{ $dt->nama_pelanggan }}</td>
                        <td class="text-end">{{ number_format($dt->total_harga) }}</td>

                        <td class="text-center text-nowrap">
                            <form onsubmit="return confirm('hapus data penjualan ini?')" action="{{ route('penjualan.destroy', $dt->id) }}" method="POST">
                                <a href="{{ route('penjualan.show', $dt->id)}}" class="btn btn-primary btn-sm">Detail Produk</a>
                                {{-- <a href="{{ route('penjualan.edit', $dt->id)}}" class="btn btn-warning btn-sm">Edit</a>
     --}}
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="8">data masih Kosong</td>
                @endforelse
              </tbody>
              </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('detail.index')}}" class="btn btn-primary">Penjualan baru</a>
            </div>
     </div>
    </div>
 </main>
@endsection