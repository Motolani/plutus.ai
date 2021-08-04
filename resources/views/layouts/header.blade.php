<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Plutus.ai</title>
    
    <!-- Favicon  -->
    {{-- <link rel="icon" href="{{asset('storage/img/core-img/favicon.ico')}}"> --}}

    {{-- Font Awesome --}}
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"> <!--load all styles -->

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/myscript.js') }}" defer></script>

</head> 

<body>
    <header class="header" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                {{-- logo --}}
                <a class="navbar-brand logo" href="{{route('landingPage')}}"><img src="{{asset('storage/images/plutus.png')}}" alt="Logo"> </a>
                {{-- mobile toggle --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- Guest links --}}
                @guest
                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('landingPage')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Why Us?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                        </ul>
                        {{-- login button --}}
                        <ul class="navbar-nav ml-auto">
                            <a href="{{route('new.login')}}" class="btn btn-primary header-login-btn">Login</a>
                        </ul>
                    </div>
                @else
                    {{-- auth user --}}
                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('title.search')}}">
                                    <i class="fas fa-search "></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="far fa-heart"></i>
                                </a>
                            </li>
                        </ul>
                        {{-- login button --}}
                        <ul class="navbar-nav ml-auto">
                            <li>
                                <div class="dashboard-userprofile mt-2">
                                    <img class="nav-avatar mr-2" src="{{ Auth::user()->avatar }}" alt="avatar" width="40px">
                                    {{-- Usersname as a link to re-route to dashboard if Logged in --}}
                                    @if (Auth::user()->role == 4)
                                        <a href="{{ route('starter.dashboard') }}" class="dashboard-username-icon">{{ Auth::user()->name }}</a>
                                    @elseif(Auth::user()->role == 3)
                                        <a href="{{ route('freelancer.dashboard') }}" class="dashboard-username-icon">{{ Auth::user()->name }}</a> 
                                    @elseif(Auth::user()->role == 2)
                                        <a href="{{ route('enterprise.dashboard') }}" class="dashboard-username-icon">{{ Auth::user()->name }}</a> 
                                    @elseif(Auth::user()->role == 1)
                                        <a href="{{ route('admin.dashboard') }}" class="dashboard-username-icon">{{ Auth::user()->name }}</a> 
                                    @elseif(Auth::user()->role == 5)
                                        <a href="{{ route('employee.dashboard') }}" class="dashboard-username-icon">{{ Auth::user()->name }}</a>     
                                    @endif
                                    
                                </div>
                            </li>
                            <li class="logout-btn nav-item pt-1">
                                <a class="nav-link header-logout-btn" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt btn-outline-danger fa-lg"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>      
                        </ul>
                    </div>
                @endguest
            </div>
        </nav>
    </header>
