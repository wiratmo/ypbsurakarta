@extends('layouts.head')
@section('content')
	@foreach($foundation as $f)
	<div class="row">
		<div class="col-md-9">
			<div>
				  <section id="hot-news">
                    <div id="berita-yayasan">
                        <i id="arrow-yayasan"></i>
                        Berita Yayasan
                    </div>
                    <div class="run">
                    <marquee behavior="scroll" direction="left" id="runtext">
                        @foreach($foundation_article as $fa)
                            <a href="{{url('/'.$fa->slug)}}" id="run">{{$fa->title}}</a> | 
                        @endforeach
                    </marquee>
                    </div>
                    </section> 
			</div>
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">beranda</a></li>
				  <li class="active"><a href="{{url('/profil')}}">profil</a></li>
				</ol>
			<div class="content-profil">
				<div class="addthis_inline_share_toolbox_ojx9"></div>
				<center><h2>Profil Yayasan Batik Surakarta</h2></center>
				<br>
				<img src="{{url('storage/image/logo/'.$f->founder_image)}}" class="img img-responsive">
				<br>
				{!!$f->profil!!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="bagian-new">
				<h4 id="label">Berita Terbaru</h4><hr>
                        <div class="content-berita-terbaru">
				<ul>
					@foreach($new_article as $na)
						<li>{{$na->title}}</li>
					@endforeach
				</ul>
				</div>
			</div>
		</div>
	</div>
	@endforeach
@endsection