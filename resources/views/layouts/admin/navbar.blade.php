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
                        <img src="/img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        <span class="">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">

                        <div class="dropdown-header text-xs-center">
                            <strong>Account</strong>
                        </div>

                        <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="tag tag-info">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="tag tag-success">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="tag tag-danger">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="tag tag-warning">42</span></a>

                        <div class="dropdown-header text-xs-center">
                            <strong>Settings</strong>
                        </div>

                        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
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
