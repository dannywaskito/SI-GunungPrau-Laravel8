@extends('dashboard.user.layouts.user-dash-layout')
@section('title','Detail Berita')
@section('content')
<br>
<div class="col-sm-6">
  <img src="{{url('foto_berita/'.$berita->foto_berita)}}" width="100%" height="100%">
  <h2>{{$berita->judul}}</h2>
  <p>{{$berita->isi}}</p>
</div>


@endsection