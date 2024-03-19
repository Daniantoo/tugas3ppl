@extends('layout.template')
<!-- START DATA -->
@section('content')

  
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{url('Address')}}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
      <a href='{{url('Address/create')}}' class="btn btn-primary">+ Tambah Data Address</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Street</th>
                <th class="col-md-4">City</th>
                <th class="col-md-2">Province</th>
                <th class="col-md-2">Country</th>
                <th class="col-md-2">Postal Code</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->street}}</td>
                <td>{{$item->city}}</td>
                <td>{{$item->province}}</td>
                <td>{{$item->country}}</td>
                <td>{{$item->postal_code}}</td>
                <td>
                    <a href='{{url('Address/'.$item->id.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan delete data?')" class="d-inline" action="{{url('Address/'.$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>    
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
   
</div>
<!-- AKHIR DATA -->
@endsection
