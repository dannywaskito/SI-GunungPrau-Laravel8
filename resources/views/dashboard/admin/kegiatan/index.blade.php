@extends('dashboard.admin.layouts.admin-dash-layout')
@section('title','List Kegiatan')
@section('content')
<br><br>
<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Kegiatan IMAPALA UHAMKA</h3>

      <div class="card-tools">
        <a href="/admin/addKegiatan" class="btn btn-primary btn-sm btn-flat"> <i class="fas fa-plus"></i> Tambah Data Kegiatan</a>
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
          <th>Nama Kegiatan</th>
          <th>Foto Kegiatan</th>
          <th>Kecamatan</th>
          <th>Alamat</th>
          <th>Posisi</th>
          <th>Keterangan</th>
          <th>Jumlah Anggota</th>
          <th>Waktu</th>
          <th>Tanggal Posting</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach ($kegiatan as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->nama_kegiatan}}</td>
          <td><img src="{{url('foto_kegiatan/'.$data->foto_kegiatan)}}" alt="" width="100" height="100"></td>
          <td>{{$data->kecamatan}}</td>
          <td>{{$data->alamat}}</td>
          <td>{{$data->posisi}}</td>
          <td>{{$data->ket}}</td>
          <td>{{$data->jml_anggota}}</td>
          <td>{{date('d F Y', strtotime($data->waktu))}}</td>
          <td>{{date('d F Y', strtotime($data->created_at))}}</td>
          <td>
            <a href="/admin/editKegiatan/{{ $data->id_kegiatan}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
            <button type="button" class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{$data->id_kegiatan}}"><i class="fa fa-trash"></i>
            </button>
            <!-- <a href="/admin/hapuskegiatan/{{ $data->id_kegiatan}}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></a> -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
  @foreach($kegiatan as $data)

        
    <!-- Modal Delete kegiatan -->
    <div class="modal fade" id="delete{{$data->id_kegiatan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$data->nama_kegiatan}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus kegiatan
                    <b>{{$data->nama_kegiatan}}</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="/admin/hapuskegiatan/{{ $data->id_kegiatan}}" class="btn btn-primary">Yes Delete!</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- /.card -->
</div>

@endsection