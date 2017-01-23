<body class="navbar-fixed sidebar-nav fixed-nav">
    <header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">☰</button>
            <a class="navbar-brand" href="#"></a>
            <ul class="nav navbar-nav left-navbar">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">☰</a>
                </li>

                <li class="nav-item px-1">
                    <a class="nav-link" href="/">Dashboard</a>
                </li>
               
            </ul>
            <ul class="nav navbar-nav float-xs-right ">
               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">

                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </div>
                </li>
                <li class="nav-item">

                </li>

            </ul>
        </div>
    </header>
