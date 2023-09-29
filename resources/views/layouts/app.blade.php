<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Capstone') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://kit.fontawesome.com/db948196a7.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

  <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navi">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img style="height:80px; margin:0;" src="../img/logo.jpg" alt="...">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item h5">
                            <a class="nav-link" href="{{ route('welcome') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item h5">
                            <a class="nav-link" href="{{ route('packages') }}">{{ __('Packages') }}</a>
                        </li>
                        <li class="nav-item h5">
                            <a class="nav-link" href="{{ route('blogpost') }}">{{ __('Blogs') }}</a>
                        </li>
                        <li class="nav-item h5">
                            <a class="nav-link" href="{{ url('contact') }}">{{ __('Contact') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }} </a>
                                </li>
                                
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">| {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('home') }}"
                                        >
                                         {{ __('Dashboard') }}
                                     </a></li>
                                     <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                                    
                                    
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

 
  <div class="content">
    @if (session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
    @endif
  @yield('content')
</div>
<footer class="footer">
  <div className="container">
    <div className="footer-content">
      <p className="copyright">
        WD74P-Capstone Copyright &copy; {{ date('Y') }}. All rights reserved.
      </p>
      <div className="social-media-icons">
        <a href="https://www.facebook.com/" class="icon" target="_blank">
          <i class="fab fa-facebook"></i>
        </a>
        <a href="#" class="icon">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="icon">
          <i class="fab fa-instagram"></i>
        </a>
     
      </div>
    </div>
  </div>
</footer>

</body>
</html>