@extends('layouts.app')

@section('content')
 <main class="flex-shrink-0">
    <div class="container">
       <div class="card" style="margin-top: 100px;">
         <div class="card-header">
            <h5>Data Pelanggan</h5>
         </div>

            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                {{ session('error') }}
               </div>
               @endif
             <table class="table table-bordered">
             <thead>
                <th>Nama Pelanggan</th>
                <th width="250">Alamat</th>
                <th width="150">Nomor Telepon</th>
                <th width="150">Aksi</th>
              </thead>
              <tbody>
                @forelse ($pelanggan as $dt)
                    <tr>
                        <td>{{ $dt->nama_pelanggan }}</td>
                        <td>{{ $dt->alamat }}</td>
                        <td class="text-center">{{ $dt->nomor_telepon }}</td>
                        <td class="text-center text-nowrap">
                            <form onsubmit="return confirm('hapus data pelanggan ini?')" action="{{ route('pelanggan.destroy', $dt->id) }}" method="POST">
                                <a href="{{ route('pelanggan.show', $dt->id)}}" class="btn btn-primary btn-sm">Detail</a>
                                <a href="{{ route('pelanggan.edit', $dt->id)}}" class="btn btn-warning btn-sm">Edit</a>
    
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="8"> customer data still empty</td>
                @endforelse
              </tbody>
              </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('pelanggan.create')}}" class="btn btn-primary">Add customer Right Here, Blud!</a>
            </div>
     </div>
    </div>
 </main>
@endsection