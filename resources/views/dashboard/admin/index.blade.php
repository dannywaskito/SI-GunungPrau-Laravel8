@extends('dashboard.admin.layouts.admin-dash-layout')
@section('title','Dashboard Admin')
@section('content')


<div class="container">
    <div class="jumbotron jumbotron-fluid ml-2">
      <div class="container">
        <h4 class="display-4">Aplikasi Rekam Jejak Dokumentasi Kegiatan IMAPALA UHAMKA</h4>
        <p class="lead">Selamat Datang, <b>{{ Auth::user()->name }}</b></p>
    </div>
</div>
</div>

@endsection