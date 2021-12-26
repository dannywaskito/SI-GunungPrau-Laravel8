@extends('dashboard.user.layouts.user-dash-layout')
@section('title','Contact Us')
@section('content')

<br>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			Contact Us <br>
			<small>Jika Ada Pertanyaan Seputar Pendakian dan Penyewaan Barang, Silahkan Hubungi Kontak di bawah ini: </small>
			@foreach($contact as $data)
		</div>
		<div class="card-body">
			<h5 class="card-title">{{$data->email}}</h5>
			<p class="card-text">{{$data->notelp}}</p>
			@endforeach
		</div>
	</div>
</div>

@endsection