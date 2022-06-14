@extends('layouts.main')
@section('content')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<main class="form-signin m-auto p-3 mb-5">
    <h1 class="h3 mb-3 font-color-default mb-5 mt-3 text-center">Halaman Register User</h1>
    <form action="/register" method="POST">
      @csrf
      <div class="form-floating mb-3">
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" autofocus required value="{{ old('name') }}">
        <label for="name">Nama</label>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="Username" required value="{{ old('username') }}">
        <label for="floatingInput">Username</label>
        @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        @error('password')
            <div class="invalid-feedback">
                    {{ $message }}
        </div>
        @enderror
      </div>
      <button class="w-100 btn btn-lg btn-second mt-5 mb-5" type="submit">Daftar</button>
    </form>
  </main>
@endsection