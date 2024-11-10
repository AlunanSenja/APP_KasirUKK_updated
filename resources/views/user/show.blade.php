@extends('layouts.app')

@section('content')
    
<main class="flex-srink-0">
    <div class="container">
        <div class="card" style="margin-top: 100px;">
            <div class="card-header">
                <h5>Detail User</h5>
            </div>

            <div class="card-body">
              <div class="row">
                    <label class="col-sm-2 col-form-label">Nama User</label>
                <div class="col-sm-10">
                  <b> {{ $user->name }} </b>
                </div>
              </div>
            </div>

            <div class="card-body">
                <div class="row">
                      <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <b> {{ $user->email }} </b>
                  </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                      <label class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <b> {{ $user->username }} </b>
                  </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                      <label class="col-sm-2 col-form-label">Level</label>
                  <div class="col-sm-10">
                    <b> {{ $user->level }} </b>
                  </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route ('user.index')}}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
</main>
@endsection