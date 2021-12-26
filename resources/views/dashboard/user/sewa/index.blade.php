@extends('dashboard.user.layouts.user-dash-layout')
@section('title','Form Pengajuan Peminjaman Barang')
@section('content')
<div class="container">
    <br>
    <a href="/user/addSewa" class="btn btn-primary">Pengajuan Peminjaman Barang</a>
    <br><br>
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{session('pesan')}}
    </div>
    @endif
    <table id="userTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>

             <th>No</th>
             <th>Nama</th>
             <th>No KTP</th>
             <th>Sleeping Bag</th>
             <th>Tenda</th>
             <th>Matras</th>
             <th>Nesting</th>
             <th>Kompor</th>
         </tr>
     </thead>
     <tbody>
        <?php $no=1; ?>
        @foreach($sewa as $data)
        @if ($data->user->id == Auth::user()->id)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->user->name}}</td>
            <td>{{$data->no_ktp}}</td>
            <td>{{$data->sleeping_bag}} Buah</td>
            <td>{{$data->tenda}} Buah</td>
            <td>{{$data->matras}} Buah</td>
            <td>{{$data->nesting}} Buah</td>
            <td>{{$data->kompor}} Buah</td>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection