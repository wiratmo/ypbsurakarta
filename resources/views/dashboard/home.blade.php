@extends('layouts.head')
@section('content')
    <div class="container">
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
                        <h4 id="label">Agenda Yayasan</h4><hr>
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
    </div>
    @foreach($fondation as $f)
    <section id="yayasan" style="background: url('{{url('storage/image/'.$f->founder_image)}}'); background-size: cover;">
        <div class="container">
            <div class="moto">
                {{$f->motto}}
            </div>
        </div>
    </section>

    <section id="visi-misi">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="visi">
                        <h3>Visi</h3>
                        {{$f->visions}}
                    </div>
                    <div class="misi">
                        <h3>Misi</h3>
                        {{$f->missions}}
                    </div>
                </div>
            </div> 
        </div>
    </section>
    @endforeach

    <section id="layanan" class="layanan">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    @foreach($school as $s)
                        <div class="col-md-6">
                            <div class="row">
                                <a href="{{$s->website}}">
                                    <div class="skh">
                                        <div class="col-md-3 col-xs-3">
                                            <img src="{{url('storage/image/'.$s->logo)}}" class="img img-responsive" alt="{{$s->description}}">
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <h4 class="nskh">{{$s->name}}</h4>
                                            {{$s->description}}
                                            <h5>Visi</h5>
                                            {{$s->visions}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
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
                                    <h4>{{$ma->title}}</h4>
                                    <div class="tgl"><i class="fa fa-clock-o"></i>{{$ma->created_at}}</div>
                                <p>{{$ma->content}}<a href="{{url($ma->slug)}}">Baca Selengkapnya</a></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6 foto">
                            <div class="row">
                                @foreach($picture as $p)
                                    <div class="col-md-6 col-xs-6 galeri">
                                        <img src="{{url('storage/image'.$p->location)}}" class="img img-responsive" alt="{{$p->description}}">
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