<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark shadow-sm" style="background-color: #131313;">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item float-right">
                                    <a class="nav-link login-link" href="{{ route('login') }}"><img class="login-icon" src="{{ asset('img/login.png') }}"/>{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                @if(Auth::user()->role == "model")
                                    <span class="badge rounded-pill login-link" style="background-color: #e625a4;">Model account</span>
                                @endif
                                @if(Auth::user()->role == "admin")
                                    <span class="badge rounded-pill login-link" style="background-color: #e625a4;">Admin account</span>
                                @endif
                                @if(Auth::user()->role == "partner")
                                    <span class="badge rounded-pill login-link" style="background-color: #e625a4;">Partner account</span>
                                @endif
                                <a id="navbarDropdown" class="nav-link dropdown-toggle login-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role == "model")
                                        <a class="dropdown-item login-link" href="{{ route('dashboard', 'orders') }}"
                                        onclick="">
                                            {{ __('Dashboard') }}
                                        </a>
                                    @elseif(Auth::user()->role == "admin")
                                    <a class="dropdown-item login-link" href="{{ route('adminPanel', 'orders') }}"
                                        onclick="">
                                            {{ __('Dashboard') }}
                                        </a>
                                    @elseif(Auth::user()->role == "user" or Auth::user()->role == "partner")
                                        <a class="dropdown-item login-link" href="{{ route('user_dashboard', 'orders') }}"
                                        onclick="">
                                            {{ __('Dashboard') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item login-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 mb-5">
            @yield('content')
        </main>
    </div>
</body>
</html>
