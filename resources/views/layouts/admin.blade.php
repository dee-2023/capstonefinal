<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>
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
    
    
    <link rel="stylesheet" href="{{ asset('css/admin.css')}}" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

  <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm navi">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin') }}">
                    <img style="height:80px; margin:0;" src="../img/logo.jpg" alt="...">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bookings') }}">{{ __('Bookings') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blogs') }}">{{ __('Blogs') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">{{ __('Users') }}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('packages') }}">{{ __('Packages') }}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('categories') }}">{{ __('Categories') }}</a>
                    </li>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                      <li class="nav-item text-white">
                        Hi, {{ Auth::user()->name }} | 
                      </li>
                      <li class="nav-item"><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                        </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                      </form></li>
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
</div>


</body>
</html>





