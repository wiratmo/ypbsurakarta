@extends('layouts.head')
@section('content')
		<div class="row">
			<div class="col-md-8">
				@foreach($articles as $a)
				<div class="article">
					<div class="row" class="article-content">
						<center>
						<h2><b>{{$a->title}}</b></h2> 
						posted by <b>{{$a->user->name}}</b> at <i class="fa fa-date"><b>{{$a->created_at->diffForHumans()}}</b></i> in <span class="tag-article"> @foreach($a->categories as $c)
								<a href="{{url('/category/'.$c->slug)}}">#{{$c->name}} </a> 
							@endforeach
							</span>
							</center>
						<div class="tag-article">
							<b>tag</b> :
							@foreach($a->tags as $t)
								<a href="{{url('/tag/'.$t->slug)}}"><button class="btn btn-xs btn-tag btn-warning">{{$t->name}}</button></a> 
							@endforeach
							</div>
						
						<a style="color: black" href="{{url($a->slug)}}"><h4> {{($a->description)}}</h4></a>
						<b>Komentar</b> <a href="{{url($a->slug.'/#comment')}}"><i class="fa fa-comment"> {{count($a->comment)}}</i></a>
					</div>
				</div>
				@endforeach
				{{ $articles->links() }}
			</div>
			<div class="col-md-4 kiri" >
				<div class="left-category">
                        <h4 id="label">Kategori</h4><br>
                        <div class="cat">
                        	<ul class="category">
					@foreach($category as $c)
						<a href="{{url('/category/'.$c->slug)}}"><li>{{$c->name}}</li></a>
					@endforeach
					</ul>
                        </div>
                </div>

				<div class="left-category">
                        <h4 id="label">Archive</h4><br>
                        <div class="cat">
                        	<ul class="category">
                        		<li>as</li>
                        		<li>as</li>
                        		<li>as</li>
                        		<li>as</li>
                        	</ul>
                        </div>
                </div>
			</div>
		</div>
@endsection