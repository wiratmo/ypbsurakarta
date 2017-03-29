@extends('layouts.head')
@section('content')
	<div class="row">
		<div class="col-md-3 right-bar" style="background: white; padding: 10px">
		<h4 id="label">Kategori</h4><br>
		<div class="cat">
                        	<ul class="category">
			@foreach($picturecategories as $pc)
					<li>
						<a class ="content-standar" href="{{url('/galeri/cat/'.$pc->slug)}}" style="text-transform: lowercase;"><i class="fa fa-folder"></i> {{$pc->name}}</a>
					</li>
			@endforeach
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			@foreach($pictures as $p)
				<a href="{{url('/galeri/'.$p->id)}}">
		                <div class="col-md-3 col-xs-6">
		            <div class="thumbnail" style="height: 210px">
		                    <img src="{{url('storage/image/medium/'.$p->location)}}" alt="{{$p->description}}" class="image-hover">
		                    <p class="des-image">{{str_limit($p->name)}}<p>
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