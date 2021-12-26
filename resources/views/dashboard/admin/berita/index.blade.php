@extends('dashboard.admin.layouts.admin-dash-layout')
@section('title','List Berita')
@section('content')
<br><br>
<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">List Berita</h3>

      <div class="card-tools">
        <a href="/admin/addBerita" class="btn btn-primary btn-sm btn-flat"> <i class="fas fa-plus"></i> Tambah Data Berita</a>
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
          <th>Judul Berita</th>
          <th>Isi</th>
          <th>Foto Berita</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach ($berita as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->judul}}</td>
           <td>{{$data->isi}}</td>
          <td><img src="{{url('foto_berita/'.$data->foto_berita)}}" alt="" width="100" height="100"></td>
          <td>
            <a href="/admin/editBerita/{{ $data->id_berita}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
            <button type="button" class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{$data->id_berita}}"><i class="fa fa-trash"></i>
            </button>
            <!-- <a href="/admin/hapuskegiatan/{{ $data->id_berita}}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></a> -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
  @foreach($berita as $data)

        
    <!-- Modal Delete kegiatan -->
    <div class="modal fade" id="delete{{$data->id_berita}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$data->judul}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus Berita
                    <b>{{$data->judul}}</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="/admin/hapusBerita/{{ $data->id_berita}}" class="btn btn-primary">Yes Delete!</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- /.card -->
</div>

@endsection