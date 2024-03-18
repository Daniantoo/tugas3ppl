@extends('layout.template')
@section('content')

<!-- START FORM -->
<form action='{{url('Contact')}}' method='post'>
@csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('Contact')}}' class="btn btn-secondary">Kembali</a>
        <div class="mb-3 row">
            <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='first_name' id="first_name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='last_name' id="last_name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='phone' id="phone">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='email' id="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
    <!-- AKHIR FORM -->    
@endsection
