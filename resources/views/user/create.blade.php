@extends('layouts.app')

@section('content')
          
<main class="">
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="card" style="margin-top: 100px;">
                <div class="card-header">
                    <h1>Data User</h1>
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

                    <form action="{{ route ('user.store')}}" method="POST">
                        @csrf
                     <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-lable">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-lable">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="name">
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-lable">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username">
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-lable">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password">
                        </div>
                     </div>

                     <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-select" id="level" name="level" required>
                            <option value="">--pilih--</option>
                            <option value="admin">Administrator</option>
                            <option value="petugas">Petugas</option>
                        </select>
                     </div>
                
                     <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                     </form>
                     <a href="{{ route ('user.index')}}" class="btn btn-warning">Kembali</a>
                     </div>
                </div>
            </div>
        </div>
    </header>
</main>
@endsection