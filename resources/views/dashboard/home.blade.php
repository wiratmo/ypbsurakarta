@extends('layouts.head')
@section('content')
        <div class="row">
            <div class="col-md-12" >
                <div class="col-md-9">
                    <div class="row">
                       <section id="hot-news">
                        <div id="left">
                            <i id="arrow"></i>
                            Berita Terbaru
                        </div>
                        <div class="run">
                        <marquee behavior="scroll" direction="left" id="runtext">
                            @foreach($new_article as $na)
                                <a href="{{url('/'.$na->slug)}}" id="run">{{$na->title}}</a> | 
                            @endforeach
                        </marquee>
                        </div>
                        </section> 
                    </div>
                    <div class="row">
                        <section id="home">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner" role="listbox">
                              @foreach($slider as $n => $s)
                                @if($n == '1')
                                    <div class="item active">
                                @else
                                    <div class="item">
                                @endif
                                  <img src="{{url('storage/image/'.$s->location)}}" alt="{{$s->title}}" class="img img-responsive">
                                   <div class="carousel-caption">
                                    <h3>{{$s->title}}</h3>
                                    <p>{{$s->description}}</p>
                                  </div>
                                </div>
                              @endforeach
                              </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="new-news">
                        <h4 id="label">Agenda YPB</h4><hr>
                        <div class="agenda">
                            @foreach($agenda as $a)
                                <div id="agenda">
                                    <div class="tgl"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$a->implementation}}</div>
                                    <div class="agd">{{$a->name}}</div>
                                    <div class="agd">{{$a->description}}</div>
                                </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @foreach($fondation as $f)
    <a href="{{url('/profil')}}">
    <section id="yayasan">
        <div class="container">
            <div class="row">
                <div class="col-md-12">                
                    <div class="visi-misi">
                        <h3 class="w7 centered green">Moto Yayasan</h3>
                        {!! $f->motto !!}
                        <div class="visi ">
                        <h3 class="w7 green">Visi</h3>
                        {!! $f->visions !!}
                    </div>
                    <div class="misi">
                        <h3 class="w7 centered green">Misi</h3>
                        {!! $f->missions !!}
                    </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    </a>
    @endforeach
    <section id="layanan" class="layanan">
        <div class="container">
                    @foreach($school as $key => $s)
                        @if($key % 2 === 0 )
                        <div class="row">
                        @endif
                        <div class="col-md-6">
                                <a href="{{$s->website}}" target="_blank">
                                    <div class="skh">
                                        <div class="col-md-3 col-xs-3">
                                            <img src="{{url('storage/image/logo/'.$s->logo)}}" class="img img-responsive" alt="{{$s->description}}">
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <h4 class="nskh">{{$s->name}}</h4>
                                            <h5>Visi</h5>
                                            {!!$s->visions!!}
                                            <h5>Misi</h5>
                                            {!!$s->missions!!}
                                        </div>
                                    </div>
                                </a>
                        <hr>
                        </div>
                        @if($key % 2 === 1 )
                        </div>
                        @endif
                    @endforeach
        </div>
    </section>
    <section id="berita-galeri">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-6 berita">
                            @foreach ($most_view_article as $ma)
                            <div class="bagian">
                                <div class="col-xs-12">
                                    <div class="title">{{$ma->title}}</div>
                                    <span class="tgl usr"> <i class="fa fa-clock-o"></i> {{$ma->created_at->diffForHumans()}} </span>
                                    <span class="usr"> <i class="fa fa-users"></i> {{$ma->user->name}} </span>
                                <p>{{str_limit($ma->description, 100)}}<a href="{{url($ma->slug)}}">Baca Selengkapnya</a></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6 foto">
                            <div class="row">
                                @foreach($picture as $p)
                                    <div class="col-md-6 col-xs-6 galeri">
                                        <img src="{{url('storage/image/'.$p->location)}}" class="img img-responsive" alt="{{$p->description}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
