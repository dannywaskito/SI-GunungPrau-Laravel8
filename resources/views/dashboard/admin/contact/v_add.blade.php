@extends('dashboard.admin.layouts.admin-dash-layout')
@section('title', 'Form Contact Admin')
@section('content')
<div class="container">
 <form action="/admin/insertContact" method="POST">
  @csrf
  <div class="content">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label>E-Mail</label>
          <input class="form-control" type="email" name="email" value="{{old('email')}}">
          <div class="text-danger">
            @error('email')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Nomor Telp</label>
          <input class="form-control" type="number" name="notelp" value="{{old('notelp')}}">
          <div class="text-danger">
            @error('notelp')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-success">Simpan</button>
          <a href="/admin/contact" class="btn btn-primary">Batal</a>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection