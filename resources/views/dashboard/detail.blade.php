@extends('layouts.head')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				@foreach($articles as $a)
				<div class="article">
					<div class="row">
						<div class="col-md-8 col-xs-8">
							@foreach($profile as $p)
							<img src="{{url('/storage/image'.$p->photo_profile)}}" class="img img-responsive img-circle img-profile">
							@endforeach
								{{$a->user->name}}
							<br>
							<i class="fa fa-date">{{$a->created_at->diffForHumans()}}</i>
						</div>
						<div class="col-md-4 col-xs-4">
							<i class="fa fa-comment">{{count($a->comment)}}</i>
							<div class="addthis_inline_share_toolbox_0aos"></div>
						</div>
					</div>
					<div class="tag-article">
						@foreach($a->tags as $t)
							<a href="{{url('/tag/'.$t->slug)}}"><button class="btn btn-sm">{{$t->title}}</button></a> 
						@endforeach
					</div>
					<div class="row">
						<h1>{{$a->title}}</h1>
						<h4>{!!$a->content!!}</h4>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection