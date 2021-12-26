@extends('dashboard.admin.layouts.admin-dash-layout')
@section('title','Tambah Data Berita')
@section('content')
<div class="col-md-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h3 class="card-title">Tambah Data Berita</h3>

			<div class="card-tools">
				<a href="/admin/berita" class="btn btn-primary btn-sm btn-flat"> <i class="fas fa-left"></i> Kembali</a>
			</div>
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<form action="/admin/insertBerita" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Judul Berita</label>
							<input type="text" class="form-control" name="judul" value="{{old('judul')}}">
							<div class="text-danger">
								@error('judul')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Foto Berita</label>
							<input type="file" class="form-control" name="foto_berita" value="{{old('foto_berita')}}">
							<div class="text-danger">
								@error('foto_berita')
								{{ $message }}
								@enderror
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<label for="">Isi Berita</label>
						<textarea name="isi" rows="10" class="form-control">{{old('isi')}}</textarea>
						<div class="text-danger">
								@error('isi')
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
@endsection

