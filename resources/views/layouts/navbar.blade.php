    <center>
    <div class="picnav" style="background: url({{url('/storage/image/slider/header.png')}}) ; min-height: 250px; background-repeat:no-repeat;background-size:contain;background-position:center; width: 100%;">
        
    </div>
    </center>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="#page-top"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="{{url('/')}}">Beranda</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/profil')}}">Profil</a>
                        </li>
                       <li class="dropdown">
                            <a class="dropdown-toggle page-scroll" data-toggle="dropdown" href="#">Unit Pendidikan</a>
                            <ul class="dropdown-menu">
                                @foreach($links as $l)
                                    <li class="page-scroll"><a href="{{$l->website}}" target="_blank">{{$l->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle page-scroll" data-toggle="dropdown" href="#">Unit Pendukung</a>
                            <ul class="dropdown-menu">
                              <li class="page-scroll"><a href="{{url('/unit-pendukung/radio-streaming')}}">Radio Streaming</a></li>
                              <li class="page-scroll"><a href="http://127.0.0.1:8000/" target="_blank">TV Streaming</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/blog')}}">Berita</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/galeri')}}">Galeri</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/agenda')}}">Agenda</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/galeri')}}">Kontak</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
