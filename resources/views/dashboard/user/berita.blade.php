@extends('dashboard.user.layouts.user-dash-layout')
@section('title','Berita')
@section('content')
<br>
<div class="container-fluid">
	<div class="px-lg-5">
		<div class="row">
			<!-- Gallery item -->
			 @foreach($berita as $data)
			 <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="bg-white rounded shadow-sm"><img src="{{url('foto_berita/'.$data->foto_berita)}}" alt=""class="img-fluid card-img-top" width="100%">
          <div class="p-4">
            <h5> <a href="#" class="text-dark">{{$data->judul}}</a></h5>
            <div class="d-flex align-items-center justify-content-between px-4 py-2 mt-4">
               <a href="/user/detailberita/{{ $data->id_berita}}" class="badge badge-warning px-4 rounded-pill font-weight-normal"><i class="fa fa-eye"></i> Read More</a>
            </div>
          </div>
        </div>
      </div>
       @endforeach
   </div>
</div>
</div>


@endsection