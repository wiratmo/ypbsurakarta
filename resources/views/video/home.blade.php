@extends('layouts.head')
@section('content')
<div class="row">
	@foreach($videos as $v)
	<div class="col-md-4">
		<h4>{{$v->name}}<small> {{$v->user_id}}</small></h4>
		<a href="{{url('/unit-pendukung/batieksolo-tv/'.str_slug($v->name))}}">
			<img src="https://i.ytimg.com/vi/{{$v->youtube_id}}/sddefault.jpg" class="img img-responsive">
		</a>
	</div>
	@endforeach
</div>
	{{$videos->links()}}
@endsection