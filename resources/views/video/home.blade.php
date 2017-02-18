@extends('layouts.video.head')
@section('content')
<div class="row">
	<div class="col-md-8 lastvideo">
	<h3><center><b style="color: red">Live </b> Streaming</center></h3>
		    <iframe width="100%" height="500px" src="https://www.youtube.com/embed/aG4m-OZCSHg?feature=oembed&amp;wmode=opaque&amp;rel=0&amp;showinfo=0&amp;modestbranding=0" frameborder="0" allowfullscreen=""></iframe>
	</div>
	<h3><center><b style="color: red">Last </b> Videos</center></h3>
	<div class="col-md-4 sidebar-video">
		@foreach($videos as $v)
	<div class="col-md-12">
		<div class="video">
			<a href="{{url(str_slug($v->name))}}">
			<div class="col-md-6">
				<img src="https://i.ytimg.com/vi/{{$v->youtube_id}}/sddefault.jpg" class="img img-responsive">
			</div>
			<div class="col-md-6">
				<p>{{title_case($v->name)}}</p>
			</div>				
			</a>
		</div>
	</div>
	@endforeach	
	<center>{{$videos->links()}}</center>
	</div>
</div>

@endsection