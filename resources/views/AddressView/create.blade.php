@extends('layout.template')
@section('content')

<!-- START FORM -->
<form action='{{url('Address')}}' method='post'>
@csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('Address')}}' class="btn btn-secondary">Kembali</a>
        <div class="mb-3 row">
            <label for="street" class="col-sm-2 col-form-label">Street</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='street' id="street">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="city" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='city' id="city">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="province" class="col-sm-2 col-form-label">Province</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='province' id="province">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="country" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='country' id="country">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="postal_code" class="col-sm-2 col-form-label">Postal Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='postal_code' id="postal_code">
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
