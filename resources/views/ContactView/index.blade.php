@extends('layout.template')
        <!-- START DATA -->
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{url('Contact')}}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
      <a href='{{url('Contact/create')}}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">First Name</th>
                <th class="col-md-4">Last Name</th>
                <th class="col-md-2">Phone</th>
                <th class="col-md-2">Email</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->first_name}}</td>
                <td>{{$item->last_name}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <a href='{{url('Contact/'.$item->id.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan delete data?')" class="d-inline" action="{{url('Contact/'.$item->id)}}" method="post">
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
        