@extends('layouts.app')

@section('content')
 <main class="flex-shrink-0">
    <div class="container">
       <div class="card" style="margin-top: 100px;">
         <div class="card-header">
            <h5>Data User</h5>
         </div>

            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                {{ session('error') }}
               </div>
               @endif
             <table class="table table-bordered">
             <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Level</th>
              </thead>
              <tbody>
                @forelse ($user as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->level }}</td>
                        <td class="text-center text-nowrap">
                            <form onsubmit="return confirm('hapus data user?')" action="{{ route('user.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('user.show', $data->id)}}" class="btn btn-primary btn-sm">Detail</a>
                                <a href="{{ route('user.edit', $data->id)}}" class="btn btn-warning btn-sm">Edit</a>
    
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
                <a href="{{ route('user.create')}}" class="btn btn-primary">Add Your user Account Right Here, Blud!</a>
            </div>
     </div>
    </div>
 </main>
@endsection