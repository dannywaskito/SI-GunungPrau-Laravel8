@extends('dashboard.user.layouts.user-dash-layout')
@section('title','Form Pendaftaran')
@section('content')
<div class="container">
    <br>
    <a href="/user/addData" class="btn btn-primary">Pengajuan Pendakian</a>
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
             <th>Tanggal Pendakian</th>
             <th>Akhir Pendakian</th>
             <th>NIK Ketua</th>
             <th>Jenis Kelamin</th>
             <th>Tanggal Lahir</th>
             <th>Alamat</th>
             <th>Handphone</th>
             <th>Telp Rumah</th>
             <th>Pekerjaan</th>
             <th>Anggota Pendaki</th>
         </tr>
     </thead>
     <tbody>
        <?php $no=1; ?>
        @foreach($pendakian as $data)
        @if ($data->user->id == Auth::user()->id)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->user->name}}</td>
            <td>{{$data->tgl_pendakian}}</td>
            <td>{{$data->akhir_pendakian}}</td>
            <td>{{$data->nik_ketua}}</td>
            <td>{{$data->jenis_kelamin}}</td>
            <td>{{$data->tgl_lahir}}</td>
            <td>{{$data->alamat}}</td>
            <td>{{$data->handphone}}</td>
            <td>{{$data->telp_rumah}}</td>
            <td>{{$data->pekerjaan}}</td>
            <td>{{$data->anggota_pendaki}}</td>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection