@extends('layouts.app')

@section('content')
 <main class="flex-shrink-0">
   <div class="container">
    <div class="card" style="margin-top: 100px">
      <div class="card-header">
        <h5> DASHBOARD {{ Auth::user()->level === 'admin' ? 'Administrator':'Kasir'}}</h5>
      </div>
      <div class="card-body">
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        Selamat Datang, {{ Auth::user()->name }} <br>
        Anda Login Sebagai {{ Auth::user()->level}}

        <form action="{{ route('auth.logout') }}" method="POST" class="d-flex" role="search">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">LOGOUT</button>
        </form>
    </div>
   </div>
 </main>
@endsection