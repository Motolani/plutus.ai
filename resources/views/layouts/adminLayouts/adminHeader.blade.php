<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Plutus.ai</title>


    {{-- Font Awesome --}}
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"> <!--load all styles -->

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/myscript.js') }}" defer></script>
    {{-- HighChart Script --}}
    {{-- <script src="{{ asset('js/highchart.js') }}" defer></script> --}}


    </head>
    <body class="hold-transition sidebar-mini">
        {{-- Enterprise user Panel --}}
        @if(Auth::user()->role == 2)
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            
                {{-- <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
                </form> --}}
                <ul class="navbar-nav ml-auto">
                    <!-- search Menu -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('title.search')}}">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>
                    <!-- saved searches Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="far fa-heart"></i>
                        </a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
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
            </nav>
            <!-- /.navbar -->
            
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{route('landingPage')}}" class="brand-link">
                    <img src="{{asset('storage/images/plutus.png')}}" alt="AdminLTE Logo" class="brand-image"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light pl-3">Enterprise</span>
                </a>
            
                <!-- Sidebar -->
                <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            @if(Auth::user()->role == 2)
                                <a href="{{ route('enterprise.dashboard') }}" class="dashboard-username-icon">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a> 
                            @elseif(Auth::user()->role == 1)
                                <a href="{{ route('admin.dashboard') }}" class="dashboard-username-icon">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a> 
                            @endif
                        </div>
                    </div>
                
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item my-side-nav active">
                                <a href="{{route('enterprise.dashboard')}}" class="nav-link side-nav-link">
                                    <i class="fas fa-chart-pie pr-3 pb-3"> </i>
                                    <p>
                                        Overview
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{route('enterprise.employees')}}" class="nav-link side-nav-link">
                                    <i class="fas fa-users pr-3 pb-3"></i>
                                    <p>
                                        Employees
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{route('enterprise.usersSearches')}}" class="nav-link side-nav-link">
                                    <i class="fas fa-search pr-3 pb-3"></i>
                                    <p>
                                        Searches
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('enterprise.billing')}}" class="nav-link side-nav-link">                               
                                    <i class="fas fa-credit-card pr-3 pb-3"></i>
                                    <p>
                                        Billing
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('enterprise.settings')}}" class="nav-link side-nav-link">                               
                                    <i class="fas fa-cogs pr-3 pb-3"></i>
                                    <p>
                                        Settings
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
        @elseif(Auth::user()->role == 1)
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            
                {{-- <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
                </form> --}}
                <ul class="navbar-nav ml-auto">
                    <!-- search Menu -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('title.search')}}">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>
                    <!-- saved searches Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="far fa-heart"></i>
                        </a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
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
            </nav>
            <!-- /.navbar -->
            
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{route('landingPage')}}" class="brand-link">
                    <img src="{{asset('storage/images/plutus.png')}}" alt="AdminLTE Logo" class="brand-image"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light pl-3">Admin</span>
                </a>
            
                <!-- Sidebar -->
                <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <a href="">
                                    <img src="{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
                                </a>
                            </div>
                        <div class="info">
                            @if(Auth::user()->role == 2)
                                <a href="{{ route('enterprise.dashboard') }}" class="dashboard-username-icon">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a> 
                            @elseif(Auth::user()->role == 1)
                                <a href="{{ route('admin.dashboard') }}" class="dashboard-username-icon">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a> 
                            @endif
                        </div>
                    </div>
                
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item my-side-nav active">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link side-nav-link">
                                    <i class="fas fa-chart-pie pr-3 pb-3"> </i>
                                    <p>
                                        Overview
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('admin.enterpriseUsers') }}" class="nav-link side-nav-link">
                                    <i class="fas fa-users pr-3 pb-3"></i>
                                    <p>
                                        Enterprises
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('admin.employeeUsers') }}" class="nav-link side-nav-link">
                                    <i class="fas fa-users pr-3 pb-3"></i>
                                    <p>
                                        Employees
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('admin.freelancerUsers') }}" class="nav-link side-nav-link">
                                    <i class="fas fa-briefcase pr-3 pb-3"></i>
                                    <p>
                                        Freelancers
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('admin.starterUsers') }}" class="nav-link side-nav-link">
                                    <i class="fas fa-user pr-3 pb-3"></i>
                                    <p>
                                        Starters
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('admin.usersSearches') }}" class="nav-link side-nav-link">
                                    <i class="fas fa-search pr-3 pb-3"></i>
                                    <p>
                                        Searches
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('admin.subscriptions') }}" class="nav-link side-nav-link">                               
                                    <i class="fas fa-file-invoice-dollar pr-3 pb-3"></i> 
                                    <p>
                                        Subscriptions
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('admin.plans') }}" class="nav-link side-nav-link">                               
                                    <i class="fas fa-credit-card pr-3 pb-3"></i>
                                    <p>
                                        Plans
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                            {{-- <li class="nav-item my-side-nav">
                                <a href="{{ route('admin.counties') }}" class="nav-link side-nav-link">                               
                                    <i class="fas fa-city pr-3 pb-3"></i>
                                    <p>
                                        Counties
                                    </p>
                                </a>
                            </li> --}}
                            <li class="nav-item my-side-nav">
                                <a href="{{ route('admin.feedbacks') }}" class="nav-link side-nav-link">                               
                                    <i class="fas fa-comments pr-3 pb-3"></i>
                                    <p>
                                        Feedbacks
                                        {{-- <span class="right badge badge-danger"></span> --}}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
        @endif

        {{-- Admin User Panel --}}
        