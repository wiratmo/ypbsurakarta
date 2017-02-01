    <div class="navtop">
        <div class="left-navtop">
            
        </div>
        <div class="right-navtop" >
            <div class="col-sm-9 col-md-9 cari">
                <form class="navbar-form cari" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
            <i class="fa fa-instagram sosmed" aria-hidden="true"></i>
            <i class="fa fa-facebook sosmed" aria-hidden="true"></i>
            <a href="tel://027192012" id="hitam"><i class="fa fa-phone sosmed" aria-hidden="true"> </i></a>
        </div>
    </div>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"></a>
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
                                    <li class="page-scroll"><a href="{{$l->website}}">{{$l->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle page-scroll" data-toggle="dropdown" href="#">Unit Pendukung</a>
                            <ul class="dropdown-menu">
                              <li class="page-scroll"><a href="{{url('/unit-pendukung/radio-streaming')}}">Radio Streaming</a></li>
                              <li class="page-scroll"><a href="{{url('/unit-pendukung/tv-streaming')}}">TV Streaming</a></li>
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
    <div>
        <img src="http://placehold.it/1500x300" class="img img-responsive">
    </div>