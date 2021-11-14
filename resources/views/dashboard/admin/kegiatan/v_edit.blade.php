@extends('dashboard.admin.layouts.admin-dash-layout')
@section('title','Ubah Data Kegiatan')
@section('content')
<div class="col-md-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h3 class="card-title">Ubah Data Kegiatan</h3>

			<div class="card-tools">
				<a href="/admin/kegiatan" class="btn btn-primary btn-sm btn-flat"> <i class="fas fa-left"></i> Kembali</a>
			</div>
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<form action="/admin/updateKegiatan/{{$kegiatan->id_kegiatan}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Nama Kegiatan</label>
							<input type="text" class="form-control" name="nama_kegiatan" value="{{$kegiatan->nama_kegiatan}}">
							<div class="text-danger">
								@error('nama_kegiatan')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Foto Kegiatan</label>
							<input type="file" class="form-control" name="foto_kegiatan" value="{{old('foto_kegiatan')}}">
							<div class="text-danger">
								@error('foto_kegiatan')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Kecamatan</label>
							<select class="form-control" name="id_kecamatan">
								<option value="{{$kegiatan->id_kecamatan}}">{{$kegiatan->kecamatan}}</option>
								@foreach ($kecamatan as $data)
								<option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>
								@endforeach
							</select>
							<div class="text-danger">
								@error('id_kecamatan')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Posisi</label>
							<input type="text" class="form-control" name="posisi" value="{{$kegiatan->posisi}}" id="posisi" readonly>
							<div class="text-danger">
								@error('posisi')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<label for="">Lokasi Kegiatan</label>
						<div id="map" style="width: 100%; height: 400px;"></div>
					</div>
					<div class="col-sm-12">
						<label for="">Keterangan Kegiatan</label>
						<textarea name="ket" rows="5" class="form-control">{{$kegiatan->ket}}</textarea>
						<div class="text-danger">
							@error('ket')
							{{ $message }}
							@enderror
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Waktu Kegiatan</label>
							<input type="date" class="form-control" name="waktu" value="{{$kegiatan->waktu}}">
							<div class="text-danger">
								@error('waktu')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Jumlah Anggota</label>
							<input type="text" class="form-control" name="jml_anggota" value="{{$kegiatan->jml_anggota}}">
							<div class="text-danger">
								@error('jml_anggota')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<label for="">Alamat</label>
						<textarea name="alamat" rows="7" class="form-control">{{$kegiatan->alamat}}</textarea>
						<div class="text-danger">
							@error('alamat')
							{{ $message }}
							@enderror
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-info">Simpan</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
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
		zoom: 9,
		layers: [peta1],
	});
	var baseMaps = {
		"Grayscale": peta1,
		"Satellite": peta2,
		"Streets": peta3,
		"Dark": peta4,
	};
	L.control.layers(baseMaps).addTo(map);
	// Ambil Titik Koordinat

	var curLocation = [{{$kegiatan->posisi}}];
	map.attributionControl.setPrefix(false);
	var marker = new L.marker(curLocation,{
		draggable : 'true',
	});
	map.addLayer(marker);
	marker.on('dragend',function(event){
		var position = marker.getLatLng();
		marker.setLatLng(position,{
			draggable : 'true',
		}).bindPopup(position).update();
		$("#posisi").val(position.lat + "," + position.lng).keyup();
	});
	// Ambil Titik Koordinat dengan Klik
	var posisi = document.querySelector("[name=posisi]");
	map.on("click",function(event){
		var lat = event.latlng.lat;
		var lng = event.latlng.lng;

		if(!marker)
		{
			marker = L.marker(event.latlng).addTo(map);
		}else{
			marker .setLatLng(event.latlng);
		}
		posisi.value = lat + "," + lng;
	});

</script>
@endsection

