@extends('layouts.frontend')
@section('content')

<div class="col-md-12">
	<table id="userTable" class="display responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th width="60px">No</th>
          <th>Nama Kegiatan</th>
          <th>Foto Kegiatan</th>
          <th>Kecamatan</th>
          <th class="text-center">Waktu</th>
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
          <td><img src="{{url('foto_kegiatan/'.$data->foto_kegiatan)}}" alt="" width="100%" height="100%"></td>
          <td>{{$data->kecamatan}}</td>
          <td>{{date('d F Y', strtotime($data->waktu))}}</td>
          <td>{{date('d F Y', strtotime($data->created_at))}}</td>
          <td>
            <a href="/detailkegiatan/{{ $data->id_kegiatan}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-eye"></i> Detail Kegiatan</a>
            <!-- <a href="/admin/hapuskegiatan/{{ $data->id_kegiatan}}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></a> -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
    

@endsection