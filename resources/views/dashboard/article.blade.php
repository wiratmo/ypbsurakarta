@extends('layouts.head')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				@foreach($articles as $a)
				<div class="article">
					<div class="row">
						<div class="col-md-8 col-xs-8">
								{{$a->user->name}}
							<br>
							<i class="fa fa-date">{{$a->created_at}}</i>
							<div class="tag-article">
							@foreach($a->tags as $t)
								<a href="{{url('/tag/'.$t->slug)}}"><button class="btn btn-sm">{{$t->title}}</button></a> 
							@endforeach
							</div>
						</div>
						<div class="col-md-4 col-xs-4">
							<a href="{{url($a->slug.'/#comment')}}"><i class="fa fa-comment">{{count($a->comment)}}</i></a>
						</div>
					</div>
					<div class="row" class="article-content">
						<a href="{{url($a->slug)}}"><h1>{{$a->title}}</h1>
						<h4> {!!str_limit($a->content,500)!!}</h4></a>
					</div>
				</div>
				<hr>
				@endforeach
				{{ $articles->links() }}
			</div>
			<div class="col-md-4">
				<div class="left-category">
                        <h4 id="label">Agenda Yayasan</h4><hr>
                        <div class="cat">
                        	<ul class="category">
					@foreach($category as $c)
						<a href="{{url('/category/'.$c->slug)}}"><li>{{$c->name}}</li></a>
					@endforeach
					</ul>
                        </div>
                </div>
			</div>
		</div>
	</div>
@endsection