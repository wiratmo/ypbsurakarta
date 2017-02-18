@extends('layouts.head')
@section('content')
	<div class="row">
		<div class="col-md-3" style="background: white; padding: 10px">
			@foreach($picturecategories as $pc)
				<ul style="list-style: none">
					<li>
						<a href="{{url('/galeri/cat/'.$pc->slug)}}" style="text-transform: lowercase;">{{$pc->name}}</a>
					</li>
				</ul>
			@endforeach
		</div>
		<div class="col-md-9">
			@foreach($pictures as $p)
				<a href="{{url('/galeri/'.$p->id)}}">
		                <div class="col-md-3 col-xs-6">
		            <div class="thumbnail">
		                    <img src="{{url('storage/image/medium/'.$p->location)}}" alt="{{$p->description}}" class="">
		                    <h4>{{$p->name}}</h4>
		                        <span>
		                            <i class="fa fa-clock">{{$p->created_at->diffForHumans()}}</i>
		                        </span>
		                </div>
		            </div>
				</a>
				@endforeach
				<center>
					{{$pictures->links()}}
				</center>
		</div>
	</div>

@endsection