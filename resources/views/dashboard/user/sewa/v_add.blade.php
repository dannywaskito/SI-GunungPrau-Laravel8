@extends('dashboard.user.layouts.user-dash-layout')
@section('title', 'Form Data Pengajuan Pendakian')
@section('content')
<div class="container">
 <form action="/user/insertSewa" method="POST">
  @csrf
  <div class="content">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label>No KTP</label>
          <input class="form-control" type="text" name="no_ktp" value="{{old('no_ktp')}}">
          <div class="text-danger">
            @error('no_ktp')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Sleeping Bag</label>
          <input class="form-control" type="number" name="sleeping_bag" value="{{old('sleeping_bag')}}"> Buah
          <div class="text-danger">
            @error('sleeping_bag')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Tenda</label>
          <input class="form-control" type="number" name="tenda" value="{{old('tenda')}}"> Buah
          <div class="text-danger">
            @error('tenda')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Matras</label>
          <input class="form-control" type="number" name="matras" value="{{old('matras')}}"> Buah
          <div class="text-danger">
            @error('matras')
            {{ $message }}
            @enderror
          </div>
        </div>
         <div class="form-group">
          <label>Nesting</label>
          <input class="form-control" type="number" name="nesting" value="{{old('nesting')}}"> Buah
          <div class="text-danger">
            @error('nesting')
            {{ $message }}
            @enderror
          </div>
        </div>
          <div class="form-group">
          <label>Kompor</label>
          <input class="form-control" type="number" name="kompor" value="{{old('kompor')}}"> Buah
          <div class="text-danger">
            @error('kompor')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-success">Kirim</button>
          <a href="/user/sewa" class="btn btn-primary">Batal</a>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection