@extends('dashboard.admin.layouts.admin-dash-layout')
@section('title','Edit Data Kecamatan')
@section('content')
<div class="col-md-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h3 class="card-title">Edit Data Kecamatan</h3>

			<div class="card-tools">
				<a href="/admin/kecamatan" class="btn btn-primary btn-sm btn-flat"> <i class="fas fa-left"></i> Kembali</a>
			</div>
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<form action="/admin/updateKecamatan/{{$kecamatan->id_kecamatan}}" method="POST">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Kecamatan</label>
							<input type="text" class="form-control" name="kecamatan" value="{{$kecamatan->kecamatan}}">
							<div class="text-danger">
								@error('kecamatan')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Warna</label>

							<div class="input-group my-colorpicker2">
								<input type="text" class="form-control" value="{{$kecamatan->warna}}" name="warna">
								

								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-square"></i></span>
								</div>
							</div>
							<!-- /.input group -->
							<div class="text-danger">
								@error('warna')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<label for="">GeoJson</label>
						<textarea name="geojson" rows="10" class="form-control">{{$kecamatan->geojson}}</textarea>
						<div class="text-danger">
								@error('geojson')
								{{ $message }}
								@enderror
							</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-info">Ubah</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
@endsection

