@extends('layouts.frontend')
@section('content')



<div id="map" style="width: 100%; height: 400px;"></div>

<div class="container">
	<div class="col-sm-12">
	<div class="text-center">
		<h3>Data Kegiatan {{$title}}</h3>
	</div>
	    <table id="userTable" class="display responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th width="60px">No</th>
          <th>Nama Kegiatan</th>
          <th>Waktu Pelaksaan</th>
          <th>Tanggal Posting</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach ($kegiatan as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->nama_kegiatan}}</td>
          <td>{{date('d F Y', strtotime($data->waktu))}}</td>
          <td>{{date('d F Y', strtotime($data->created_at))}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
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

	var data{{$kec->id_kecamatan}} = L.layerGroup();
	
	var map = L.map('map', {
		center: [-6.196089733168616, 106.7723254288071],
		zoom: 9,
		layers: [peta1, 
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
@foreach($kegiatan as $data)
L.marker([<?=$data->posisi ?>])
.addTo(map).bindPopup(
		'<table><tr><th>Nama Kegiatan<td>{{$data->nama_kegiatan}}</tr></td><tr><th>Waktu Kegiatan<td>{{date('d F Y', strtotime($data->waktu))}}</tr></td><tr><th>Tanggal Posting Kegiatan<td>{{date('d F Y', strtotime($data->created_at))}}</tr></td></th></table><a href="/detailkegiatan/{{$data->id_kegiatan}}" class="btn btn-sm btn-default">Info Detail</a>');
@endforeach
</script>
@endsection