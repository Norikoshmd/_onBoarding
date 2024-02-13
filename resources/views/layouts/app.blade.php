<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name') }} <i class="fa-brands fa-centos fa-lg"></i> 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            {{-- need to unable user acccess --}}
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif

                        @else
                            @if(Auth::user()->role_id == 1)
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('hr.register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                            @endif
                    
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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

        <main class="py-3">
            <div class="container p-3">
                <div class="row justify-content-center">
                    {{-- user side bar --}}
                    @auth
                        @if (Auth::user()->role_id == 2)
                            <div class="col-1">
                                    <div class="list-group">
                                        <a href="{{route('index')}}" class="list-group-item {{ request()->is('index') ? 'active' : '' }}">
                                            <i class="fa-solid fa-pen-to-square"></i>&nbsp; Documents to Submit
                                        </a>
                                        <a href="{{ route('show') }}" class="list-group-item {{ request()->is('show') ? 'active' : '' }}">
                                            <i class="fa-solid fa-circle-check"></i>&nbsp; Documents Submitted
                                        </a>
                                    </div>
                            </div>
                       

                         {{-- Recruiter side bar --}}
                        @elseif (Auth::user()->role_id == 3)
                            <div class="col-md-1">
                                <div class="list-group text-center">
                                    <a href="{{ route('recruiter.index')}}" class="list-group-item {{ request()->is('recruiter/index') ? 'active' : '' }}">
                                        <i class="fa-solid fa-list fa-2x"></i> &nbsp;
                                    </a>
                                    <a href="{{ route('recruiter.create')}}" class="list-group-item {{ request()->is('recruiter/create') ? 'active' : '' }}">
                                        <i class="fa-solid fa-user-plus fa-2x"></i>&nbsp;
                                    </a>
                                </div> 
                            </div>


                        {{-- HR side bar --}}
                        @elseif (Auth::user()->role_id == 1)
                                <div class="col-1">
                                    <div class="list-group">
                                        <a href="{{ route('hr.index')}}" class="py-3 text-center list-group-item {{ request()->is('hr/index') ? 'active' : '' }}">
                                            <i class="fa-solid fa-bell fa-2x"></i>
                                        </a>

                                        <a href="{{ route('hr.employee')}}" class="py-3 text-center list-group-item {{ request()->is('hr/employee') ? 'active' : '' }}">
                                            <i class="fa-regular fa-user fa-2x"></i>

                                        </a>
                                        <a href="{{ route('hr.show')}}" class="py-3 text-center list-group-item {{ request()->is('hr/show') ? 'active' : '' }}">
                                            <i class="fa-solid fa-clipboard-list fa-2x"></i>
                                        </a>

                                        <a href="{{ route('hr.showSubmitted')}}" class="py-3 text-center list-group-item {{ request()->is('hr/submitted') ? 'active' : '' }}">
                                            &nbsp;<i class="fa-solid fa-file-circle-exclamation fa-2x"></i>
                                        </a>

                                        <a href="#" class="py-3 text-center list-group-item {{ request()->is('hr/requested') ? 'active' : '' }}">
                                            <i class="fa-solid fa-clipboard-check fa-2x"></i>
                                        </a>

                                        <a href="{{ route('hr.taskPost')}}" class="py-3 text-center list-group-item {{ request()->is('hr/taskPost') ? 'active' : '' }}">
                                            <i class="fa-solid fa-file-import fa-2x"></i>
                                        </a>

                                    </div>
                                </div>
                        @endif
                    @endauth

                    <div class="col-11">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
