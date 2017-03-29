@extends('layouts.head')
@section('content')
		<div class="row">
			<div class="col-md-9">
				@foreach($articles as $a)
				<div class="article">
					<div class="row" class="article-content">
						<center>
						<h4 style="text-transform: uppercase;"><b>{{$a->title}}</b></h4> 
						<p class="content-standar">posted by <b>{{$a->user->name}}</b> at <i class="fa fa-date"><b>{{$a->created_at->diffForHumans()}}</b></i> in <span class="tag-article">@foreach($a->categories as $c)
								<a href="{{url('/category/'.$c->slug)}}"><i class="fa fa-folder"></i> {{$c->name}} </a> 
							@endforeach
							</span>
							</p>
							</center>
						<div class="tag-article">
							tag:
							<p class="content-standar">
							@foreach($a->tags as $t)
								<a href="{{url('/tag/'.$t->slug)}}"><i class="fa fa-tags"></i>{{$t->name}}</a>
							@endforeach
							 </p>
							</div>
						
						<a style="color: black" href="{{url('/blog/'.$a->slug)}}"><p> {{($a->description)}}</p></a>
					</div>
				</div>
				@endforeach
			</div>
			<div class="col-md-3 kiri" >
				<div class="left-category">
                        <h4 id="label">Kategori</h4><br>
                        <div class="cat">
                        	<ul class="category">
					@foreach($category as $c)
						<a class="content-standar" href="{{url('/category/'.$c->slug)}}"><li><i class="fa fa-folder"></i> {{$c->name}} </li></a>
					@endforeach
					</ul>
                        </div>
                </div>

				<div class="left-category">
                        <h4 id="label">Archive</h4><br>
                        <div class="cat">
                        	<ul class="category">
                        	@foreach($archived as $a)
                        		<a class="content-standar" href="/blog?month={{$a->month}}&year={{$a->year}}"><li>{{$a->month.' '.$a->year}} <span class="badge">{{$a->count}}</span></li></a>
                        	@endforeach
                        	</ul>
                        </div>
                </div>
			</div>
		</div>
@endsection