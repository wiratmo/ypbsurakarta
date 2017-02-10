@extends('layouts.head')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				@foreach($articles as $a)
				<div class="article">
					
					<div class="row">
						<center><h2><b>{{$a->title}}<b></h2></center>
							@foreach($profile as $p)
							<img src="{{url('/storage/image'.$p->photo_profile)}}" class="img img-responsive img-circle img-profile">
							@endforeach
								<b>{{$a->user->name}}</b>
							<br>
							<i class="fa fa-date"><b> {{$a->created_at->diffForHumans()}}</b></i> in <b> Tag : </b>
						@foreach($a->tags as $t)
							<a href="{{url('/tag/'.$t->slug)}}"><button class="btn btn-xs btn-tag btn-warning">{{$t->title}}</button></a> 
						@endforeach
						<br>
						<h4>{!!$a->content!!}</h4>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection