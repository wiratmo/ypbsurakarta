@extends('layouts.admin.head')
@section('content')
<center>
	<a href="{{url('admin/sekolah/baru')}}"><button class="btn btn-md btn-success">Tambah</button></a>
</center>
<hr>
<div class="row">
@foreach($schools as $s)
	<div class="col-sm-6 col-md-4">
		<div class="card">
			<div class="card-header">
				{{$s->name}}
				<div style="float:right;">
					<a href="{{url('/admin/sekolah/'.$s->id)}}"><button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a>
					<form action="{{url('/admin/sekolah/delete')}}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="hidden" name="id" value="{{$s->id}}">
						<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
					</form>
				</div>
			</div>
			<div class="card-block">
				<img src="{{url('storage/image/logo/'.$s->logo)}}" class="img img-responsive">
				<a href="{{$s->website}}">{{$s->website}}</a>
				<div>
					{{$s->description}}
				</div>
			</div>
		</div>
	</div>
@endforeach
</div>
@endsection