@extends('dashboard.admin.layouts.admin-dash-layout')
@section('title','List Pendaki')
@section('content')
<br><br>
<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">List Pendaki</h3>

      <div class="card-tools">
        <!-- <a href="/admin/addKegiatan" class="btn btn-primary btn-sm btn-flat"> <i class="fas fa-plus"></i> Tambah Data Berita</a> -->
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
          <th width="60px">No</th>
          <th>Nama Ketua</th>
          <th>Tanggal Pendakian</th>
          <th>Akhir Pendakian</th>
          <th>NIK Ketua</th>
          <th>Jenis Kelamin</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Handphone</th>
          <th>Telp Rumah</th>
          <th>Pekerjaan</th>
           <th>List Anggota</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach ($pendaki as $data)
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
          <td>
         <!--    <a href="/admin/editPendaki/{{ $data->id_pendakian}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a> -->
            <button type="button" class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{$data->id_pendakian}}"><i class="fa fa-trash"></i>
            </button>
           <!--  <a href="/admin/hapusPendaki/{{ $data->id_pendakian}}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></a> -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@foreach($pendaki as $data)


<!-- Modal Delete kegiatan -->
<div class="modal fade" id="delete{{$data->id_pendakian}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$data->judul}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin Menghapus Data Dengan Nama Ketua
        <b>{{$data->user->name}}</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="/admin/hapusPendaki/{{ $data->id_pendakian}}" class="btn btn-primary">Yes Delete!</a>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- /.card -->
</div>

@endsection