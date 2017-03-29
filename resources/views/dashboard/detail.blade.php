@extends('layouts.head')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				@foreach($articles as $a)
				<div class="article">
					
					<div class="row">
						<center><h3><b>{{$a->title}}<b></h3></center>
							@foreach($profile as $p)
							<img src="{{url('/storage/image'.$p->photo_profile)}}" class="img img-responsive img-circle img-profile">
							@endforeach
								<span class="content-standar">{{$a->user->name}}</span>
							<br>
							<i class="fa fa-date"><span class="content-standar"> {{$a->created_at->diffForHumans()}}</span></i>
						@foreach($a->tags as $t)
							<a href="{{url('/tag/'.$t->slug)}}" class="content-standar"><i class="fa fa-tags"></i>{{$t->name}}</a> 
						@endforeach
						<br>
						<div class="main-article">
							{!!$a->content!!}
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection