@extends('dashboard.user.layouts.user-dash-layout')
@section('title', 'Form Data Pengajuan Pendakian')
@section('content')
<div class="container">
 <form action="/user/insertData" method="POST">
  @csrf
  <div class="content">
    <div class="row">
      <div class="col-sm-6">
       <div class="form-group">
        <label>Tanggal Pendakian</label>
        <input class="form-control" type="date" name="tgl_pendakian" value="{{old('tgl_pendakian')}}">
        <div class="text-danger">
          @error('tgl_pendakian')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label>Akhir Pendakian</label>
        <input class="form-control" type="date" name="akhir_pendakian" value="{{old('akhir_pendakian')}}">
        <div class="text-danger">
          @error('akhir_pendakian')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label>Nik Ketua</label>
        <input class="form-control" type="text" name="nik_ketua" value="{{old('nik_ketua')}}">
        <div class="text-danger">
          @error('nik_ketua')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
         <option value="">== Pilih ==</option>
         <option value="Laki-Laki">Laki - Laki</option>
         <option value="Perempuan">Perempuan</option>
       </select>
       <div class="text-danger">
        @error('jenis_kelamin')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="form-group">
      <label>Tanggal Lahir</label>
      <input class="form-control" type="date" name="tgl_lahir" value="{{old('tgl_lahir')}}">
      <div class="text-danger">
        @error('tgl_lahir')
        {{ $message }}
        @enderror
      </div>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="3">{{old('alamat')}}</textarea>
        <div class="text-danger">
          @error('alamat')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label>Handphone</label>
        <input class="form-control" type="text" name="handphone" value="{{old('handphone')}}">
        <div class="text-danger">
          @error('handphone')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label>Telp Rumah</label>
        <input class="form-control" type="text" name="telp_rumah" value="{{old('telp_rumah')}}">
        <div class="text-danger">
          @error('telp_rumah')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label>Pekerjaan</label>
        <input class="form-control" type="text" name="pekerjaan" value="{{old('pekerjaan')}}">
        <div class="text-danger">
          @error('pekerjaan')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label>List Anggota Pendaki</label>
        <textarea name="anggota_pendaki" class="form-control" rows="3">{{old('anggota_pendaki')}}</textarea>
        <div class="text-danger">
          @error('anggota_pendaki')
          {{ $message }}
          @enderror
        </div>
      </div>
    <div class="form-group">
      <button class="btn btn-success">Kirim</button>
      <a href="/user/daftar" class="btn btn-primary">Batal</a>
    </div>
  </div>
</div>
</div>
</div>
</form>
@endsection