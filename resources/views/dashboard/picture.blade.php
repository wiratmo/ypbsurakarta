@extends('layouts.head')
@section('content')
	<div class="row">
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

@endsection