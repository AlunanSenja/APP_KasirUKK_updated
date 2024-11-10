@extends('layouts.app')

@section('content')
 <main class="flex-shrink-0">
    <div class="container">
       <div class="card" style="margin-top: 100px;">
         <div class="card-header">
            <h5>Data produk</h5>
         </div>

            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                {{ session('error') }}
               </div>
               @endif
             <table class="table table-bordered">
             <thead>
                <th>Nama Produk</th>
                <th>Harga Satuan</th>
                <th>Stok</th>
        
              </thead>
              <tbody>
                @forelse ($produk as $data)
                    <tr>
                        <td>{{ $data->nama_produk }}</td>
                        <td>{{ $data->harga }}</td>
                        <td>{{ $data->stok }}</td>
                        <td class="text-center text-nowrap">
                            <form onsubmit="return confirm('hapus data user?')" action="{{ route('produk.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('produk.show', $data->id)}}" class="btn btn-primary btn-sm">Detail</a>
                                <a href="{{ route('produk.edit', $data->id)}}" class="btn btn-warning btn-sm">Edit</a>
    
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="8">doesn't have any data yet</td>
                @endforelse
              </tbody>
              </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('produk.create')}}" class="btn btn-primary">Add Your Data Right Here, Blud!</a>
            </div>
     </div>
    </div>
 </main>
@endsection