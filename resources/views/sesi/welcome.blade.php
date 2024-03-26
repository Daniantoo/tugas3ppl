@extends('layout.template')

@section('content')
    <div class="w-50 text-center border rounded px-3 py-3 mx-auto">
        <h1>Selamat Datang</h1>
        <p>Silahkan Login atau Register untuk masuk</p>
        <a href="/sesi" class="btn btn-primary btn-lg">Login</a>
        <a href="/sesi/register" class="btn btn-primary btn-lg">Register</a>
    </div>
@endsection