<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/Bootstrap/css/bootstrap.min.css') }}">

    <!-- Main Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link href="{{ asset('assets/FontAwesome/css/all.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Custom CSS -->
    @yield('custom_css')

    <!-- Custom Script -->
    @yield('custom_js')

    <!-- Title -->
    @yield('custom_title')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header mt-3">
                <h3><i class="fas fa-play mr-3"></i><b>ShortMovie</b></h3>
                <strong><i class="fas fa-play"></i></strong>
            </div>

            <ul class="list-unstyled components">
                <li class="section-part">
                    <a href="#">
                        <span>MENU</span>
                    </a>
                </li>
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="/">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-compass"></i>
                        <span>Discover</span>
                    </a>
                </li>

                <!-- Category -->
                <li class="section-part mt-3">
                    <a href="#" id="sidebarCollapse">
                        <i class="fas fa-th-large"></i>
                        <span>GENRE</span>
                    </a>
                </li>
                <li class="{{ Request::is('category/Horror') ? 'active' : '' }}">
                    <a href="/category/Horror"><span>Horror</span></a>
                </li>
                <li class="{{ Request::is('category/Comedy') ? 'active' : '' }}">
                    <a href="/category/Comedy"><span>Comedy</span></a>
                </li>
                <li class="{{ Request::is('category/Animation') ? 'active' : '' }}">
                    <a href="/category/Animation"><span>Animation</span></a>
                </li>
                <li class="{{ Request::is('category/Drama') ? 'active' : '' }}">
                    <a href="/category/Drama"><span>Drama</span></a>
                </li>
                <li class="{{ Request::is('category/Sci-Fi') ? 'active' : '' }}">
                    <a href="/category/Sci-Fi"><span>Sci-Fi</span></a>
                </li>

                <!-- General -->
                <li class="section-part mt-3">
                    <a href="#">
                        <span>General</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg">
                <form class="form-inline" method="POST" action="/search">
                @csrf
                    <input class="form-control mr-sm-2 searchbar" name="search" type="search" placeholder="&#xF002; &nbsp; Search" aria-label="Search">
                </form>
            </nav>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
   

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('custom_js_bottom')
</body>
</html>