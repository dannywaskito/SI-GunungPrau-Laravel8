@extends('layouts.frontend')
@section('content')

<div class="container-fluid">
	<div class="px-lg-5">
		<div class="row">
			<!-- Gallery item -->
			 @foreach($kegiatan as $data)
			 <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="bg-white rounded shadow-sm"><img src="{{url('foto_kegiatan/'.$data->foto_kegiatan)}}" alt=""class="img-fluid card-img-top" width="100%">
          <div class="p-4">
            <h5> <a href="#" class="text-dark">{{$data->nama_kegiatan}}</a></h5>
            <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            <div class="d-flex align-items-center justify-content-between px-4 py-2 mt-4">
               <a href="/detailkegiatan/{{ $data->id_kegiatan}}" class="badge badge-warning px-4 rounded-pill font-weight-normal"><i class="fa fa-eye"></i> Detail Kegiatan</a>
            </div>
          </div>
        </div>
      </div>
       @endforeach
			<!-- <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="bg-white rounded shadow-sm"><img src="https://bootstrapious.com/i/snippets/sn-gallery/img-2.jpg" alt="" class="img-fluid card-img-top">
          <div class="p-4">
            <h5> <a href="#" class="text-dark">Blorange</a></h5>
            <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
              <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">PNG</span></p>
              <div class="badge badge-primary px-3 rounded-pill font-weight-normal">Trend</div>
            </div>
          </div>

        </div>
      </div>
		</div>
	</div> -->

	@endsection