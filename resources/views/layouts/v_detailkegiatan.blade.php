@extends('layouts.frontend')
@section('title','Detail Kegiatan')
@section('content')

<div class="col-sm-6">
	<div id="map" style="width: 100%; height: 400px;"></div>
</div>
<div class="col-sm-6">
	<img src="{{url('foto_kegiatan/'.$kegiatan->foto_kegiatan)}}" width="100%" height="100%">
</div>

<div class="col-sm-12">
	<br><br>
	<div class="container">
		<table id="userTable" class="display responsive nowrap" style="width:100%">
        <tr>
          <td>Nama Kegiatan</td>
          <td>:</td>
          <td>{{$kegiatan->nama_kegiatan}}</td>
        </tr>
         <tr>
          <td>Kecamatan</td>
          <td>:</td>
          <td>{{$kegiatan->kecamatan}}</td>
        </tr>
         <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>{{$kegiatan->alamat}}</td>
        </tr>
         <tr>
          <td>Posisi Koordinat</td>
          <td>:</td>
          <td>{{$kegiatan->posisi}}</td>
        </tr>
        <tr>
          <td>Keterangan Kegiatan</td>
          <td>:</td>
          <td><textarea name="alamat" rows="7" class="form-control">{{$kegiatan->ket}}</textarea></td>
        </tr>
        <tr>
          <td>Jumlah Anggota</td>
          <td>:</td>
          <td>{{$kegiatan->jml_anggota}}</td>
        </tr>
        <tr>
          <td>Waktu Kegiatan</td>
          <td>:</td>
          <td>{{date('d F Y', strtotime($kegiatan->waktu))}}</td>
        </tr>
        <tr>
          <td>Tanggal Diposting</td>
          <td>:</td>
          <td>{{date('d F Y', strtotime($kegiatan->created_at))}}</td>
        </tr>
	</table>
	<br>
	</div>
</div>
<script>
	var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

	var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


	var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

	var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});

	var map = L.map('map', {
		center: [{{$kegiatan->posisi}}],
		zoom: 15,
		layers: [peta1],
	});
	var baseMaps = {
		"Grayscale": peta1,
		"Satellite": peta2,
		"Streets": peta3,
		"Dark": peta4,
	};
	L.marker([<?=$kegiatan->posisi ?>]).addTo(map);
	</script>
@endsection