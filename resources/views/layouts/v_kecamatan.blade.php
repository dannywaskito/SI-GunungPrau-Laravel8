@extends('layouts.frontend')
@section('content')



<div id="map" style="width: 100%; height: 400px;"></div>

<div class="col-sm-12">
	<div class="text-center">
		<h3>Data Kegiatan</h3>
	</div>
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
        </tr>
        @endforeach
      </tbody>
    </table>
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

	var data{{$kec->id_kecamatan}} = L.layerGroup();
	
	var map = L.map('map', {
		center: [-6.196089733168616, 106.7723254288071],
		zoom: 9,
		layers: [peta2, 
		data{{$kec->id_kecamatan}},
]
	});
	var baseMaps = {
		"Grayscale": peta1,
		"Satellite": peta2,
		"Streets": peta3,
		"Dark": peta4,
	};
	var overlayer = {
		"{{$kec->kecamatan}}" : data{{$kec->id_kecamatan}},
	}
	L.control.layers(baseMaps, overlayer).addTo(map);

	var kec = L.geoJson(<?=$kec->geojson ?>,{
		style:{
			color:'white',
			fillColor: '{{$kec->warna}}',
			fillOpacity:1.0,
		}
	}).addTo(data{{$kec->id_kecamatan}}).bindPopup("{{$kec->kecamatan}}");

	map.fitBounds(kec.getBounds());

</script>
@endsection