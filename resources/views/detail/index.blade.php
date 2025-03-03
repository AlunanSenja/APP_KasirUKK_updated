@extends('layouts.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card" style="margin-top: 100px;">
                <div class="card-header">
                    <h5>Pilih Barang</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Produk</th>
                            <th width="150">Jumlah</th>
                            <th width="150">Harga Satuan</th>
                            <th width="150">Subtotal</th>
                            <th width="120">aksi</th>
                        </thead>
                        <tbody>
                            @forelse ( $detail as $dt )
                                <tr>
                                    <td>{{ $dt->nama_produk }}</td>
                                    <td>{{ $dt->jumlah_produk }}</td>
                                    <td>{{ number_format($dt->harga) }}</td>
                                    <td>{{ number_format($dt->subtotal) }}</td>
                                    <td class="text-center text-nowarp">
                                        <form onsubmit="return confirm('hapus data pelanggan?')" action="{{ route('detail.destroy', $dt->id) }}" method="post">
                                            {{-- <a href="{{ route('detail.edit', $dt->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5">detail masih kosong</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('detail.create') }}" class="btn btn-primary">Tambah Produk</a>
                    <a href="{{ route('penjualan.create') }}" class="btn btn-danger">Proses Penjualan</a>
                    <a href="{{ route('penjualan.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </main>
@endsection
