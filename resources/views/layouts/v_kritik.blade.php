@extends('layouts.frontend')
@section('content')
<div class="container">
	 @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{session('pesan')}}
    </div>
    @endif
	<form action="/insertKritik" method="POST">
		@csrf
		<div class="form-group">
			<label>Pesan</label>
			<textarea name="pesan" class="form-control" rows="3">{{old('pesan')}}</textarea>
			<div class="text-danger">
				@error('pesan')
				{{ $message }}
				@enderror
			</div>
		</div>
		<div class="form-group">
			<button class="btn btn-success">Kirim !</button>
		</div>
	</div>
</div>
</div>
</div>
</form>
@endsection