@extends('layouts.head')
@section('content')
<nav class="navbar navbar-default" style="background: black;">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
    	
    </ul>
  </div>
</nav>
<h2>Live Streaming</h2>
<div class="row">
	<div class="col-md-8">
		    <iframe width="100%" height="500px" src="https://www.youtube.com/embed/aG4m-OZCSHg?feature=oembed&amp;wmode=opaque&amp;rel=0&amp;showinfo=0&amp;modestbranding=0" frameborder="0" allowfullscreen=""></iframe>
	</div>
	<div class="col-md-4">
		
	</div>
</div>
<h3>Last Videos</h3>
<div class="row">
	@foreach($videos as $v)
	<div class="col-md-4">
		<div class="video">
			<h4>{{title_case($v->name)}}</h4>
			<a href="{{url('/unit-pendukung/batieksolo-tv/'.str_slug($v->name))}}">
				<img src="https://i.ytimg.com/vi/{{$v->youtube_id}}/sddefault.jpg" class="img img-responsive">
			</a>
			<div class="video-info">
				<ul style="list-style-type: none; display: flex;">
					<li style="padding: 3px">
						<i class="fa fa-user"> {{$v->user->name}}</i>
					</li>
					<li style="padding: 3px">
						<i class="fa fa-eye">{{$v->viewCount}}</i>
					</li>
					<li style="padding: 3px">
						<i class="fa fa-thumbs-o-up">{{$v->likeCount}}</i>
					</li>
				</ul>
			</div>
			{{str_limit($v->description,40)}}
		</div>
	</div>
	@endforeach
</div>
	<center>{{$videos->links()}}</center>
@endsection