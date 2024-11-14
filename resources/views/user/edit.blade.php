@extends('layouts.app')

@section('content')
<main class="flex-shrink-10">
   <div class="container">
      <div class="card" style="margin-top: 100px;">
        <div class="card-header">
            <h5>Edit Data User</h5>
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

            <form action="{{ route('user.update', $user->id)}}" method="POST">
                @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-lable">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="{{old ('nama', $user->nama)}}" class="form-control" id="name">
                </div>
             </div>

             <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-lable">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" value="{{old ('email', $user->email)}}" class="form-control" id="name">
                </div>
             </div>

             <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-lable">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" value="{{old ('username', $user->username)}}" class="form-control" id="username">
                </div>
             </div>

             <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-lable">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" value="{{old ('password', $user->password)}}" class="form-control" id="password">
                </div>
             </div>

             <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-lable">Level</label>
                <div class="col-sm-10">
                    <select name="level" class="form-control">
                    <option value="">--CHOOSE YA!--</option>
                    <option value="admin" {{ ($user->level === 'admin') ? 'selected' : ''}}>Administrator</option>
                    <option value="kasir" {{ ($user->level === 'petugas') ? 'selected' : ''}}>Petugas</option>
                    </select>
                </div>
             </div>
             <div class="card-footer">
             <button type="submit" class="btn btn-primary">Update</button>
             </form>
               <a href="{{ route ('user.index')}}" class="btn btn-warning">Kembali</a>
               </div>
        </div>
      </div>
   </div>
</main>
@endsection