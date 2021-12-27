@extends('dashboard.admin.layouts.admin-dash-layout')
@section('title','List Barang Penyewaan')
@section('content')
<br><br>
<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">List Barang Penyewaan</h3>

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
          <th>No Ktp</th>
          <th>Sleeping Bag</th>
          <th>Tenda</th>
          <th>Matras</th>
          <th>Nesting</th>
          <th>Kompor</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach ($penyewaan as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->user->name}}</td>
           <td>{{$data->no_ktp}}</td>
          <td>{{$data->sleeping_bag}}</td>
          <td>{{$data->tenda}}</td>
          <td>{{$data->matras}}</td>
          <td>{{$data->nesting}}</td>
          <td>{{$data->kompor}}</td>
          <td>
            <!-- <a href="/admin/editPenyewaan/{{ $data->id_penyewaan}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a> -->
            <button type="button" class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{$data->id_penyewaan}}"><i class="fa fa-trash"></i>
            </button>
            <!-- <a href="/admin/hapuskegiatan/{{ $data->id_pendakian}}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></a> -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@foreach($penyewaan as $data)


<!-- Modal Delete kegiatan -->
<div class="modal fade" id="delete{{$data->id_penyewaan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$data->user->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus Data Penyewaan Milik
        <b>{{$data->user->name}}</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="/admin/hapusSewa/{{ $data->id_penyewaan}}" class="btn btn-primary">Yes Delete!</a>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- /.card -->
</div>

@endsection