    <div class="sidebar">

        <nav class="sidebar-nav">
            <ul class="nav">
                @if(Auth::user()->role == 1)
                    @include('layouts.admin.contributor_navbar')
                
                @elseif(Auth::user()->role == 2)
                    @include('layouts.admin.admin_navbar')
                
                @endif
            </ul>
        </nav>
    </div>
    <main class="main">
            <div class="container-fluid">
                <div class="animated fadeIn">