@extends('layouts.index')

@section('center')
<div class="starter-page">
    <div class="container">
        <div class="row justify-content-center user-profile-row">

            {{-- user profile card --}}
            <div class="col-md-4">
                <div class="card user-profile-card">
                    <div class="card-header text-center">
                        <a href="">
                            <img src="{{ Auth::user()->avatar }}" class="user-profile-avatar" alt="avatar">
                        </a>
                        <div class="user-profile-identity">
                            <h1 class="user-profile-name">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h1>
                            <p class="user-profile-role">Employee</p>
                        </div>
                    </div>
                    <div class="card-body ">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item ">
                                <span class="profilecard-key1">
                                    Searches made
                                <span class="profilecard-key1 float-right text-danger">
                                    20
                                </span>
                            </li>
                            <li class="list-group-item ">
                                <span class="profilecard-key1">
                                    Searches remaining
                                </span>
                                <span class="profilecard-key1 float-right text-success">
                                    5
                                </span>
                            </li>
                            <li class="list-group-item " >
                                <span class="profilecard-key1">
                                    Key
                                </span>
                                <span class="profilecard-key1 float-right">
                                    Value
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-outline-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-lg"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            {{-- profile card end --}}
            
            {{-- user dashboard panel --}}
            <div class="col-md-8">
                <div class="user-profile-nav">
                    {{-- user nav links --}}
                    <div class="profile-nav">
                        <ul class="user-nav ml-auto mb-2 mb-lg-0" id="profileTab" >
                            <li class="nav-item">
                                <span class="nav-link tab active"  data-tab-target="#user_info">
                                    <i class="far fa-user-circle"> </i>
                                    User Info 
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link tab" data-tab-target="#settings">
                                    <i class="fas fa-tools"> </i>
                                    Settings
                                </span>
                            </li>
                        </ul>

                        {{-- NavTab Content --}}
                        <div class="container user-nav-content">
                            {{-- User Details --}}
                            <div id="user_info" data-tab-content class="active">
                                <form action="{{route('update.employeeprofile')}}" method="POST" class="g-3">
                                    @csrf 

                                    @if(session('success'))
                                        <div class="alert alert-success mt-4" role="alert">
                                            {{session('success')}}
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger mt-4" role="alert">
                                            {{session('error')}}
                                        </div>
                                    @endif

                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="name" class="form-label">{{ __('Firstname') }}</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="lastname" class="form-label">{{ __('Lastname') }}</label>
                                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ Auth::user()->lastname }}" required autocomplete="lastname" autofocus>
                                                @error('lastname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                                                <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ Auth::user()->phone_number }}" required autocomplete="phone_number" autofocus>
                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email}}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="city" class="form-label">{{ __('City') }}</label>
                                                <input id="city" type="tel" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ Auth::user()->city }}" required autocomplete="city" autofocus>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="state_county" class="form-label">{{ __('State/County') }}</label>
                                                <input id="state_county" type="text" class="form-control @error('state_county') is-invalid @enderror" name="state_county" value="{{ Auth::user()->state_county}}" required autocomplete="state_county" autofocus>
                                                @error('state_county')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="postcode" class="form-label">{{ __('Postcode') }}</label>
                                                <input id="postcode" type="tel" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ Auth::user()->postcode }}" required autocomplete="postcode" autofocus>
                                                @error('postcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="country" class="form-label">{{ __('Country') }}</label>
                                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ Auth::user()->country }}" required autocomplete="country" autofocus>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div><hr>
                                        <div class="col-4 pt-4 pb-5">
                                            <button type="submit" class="btn btn-primary form-control ml-3 update-info-btn">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            


                            {{-- SETTINGS--}}
                            <div id="settings" data-tab-content>
                                {{-- Update Password --}}
                                <form action="{{ route('update.employeepassword') }}" method="POST" class="g-3">
                                    @csrf 
                                    @if(session('success'))
                                        <div class="alert alert-success mt-4" role="alert">
                                            {{session('success')}}
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger mt-4" role="alert">
                                            {{session('error')}}
                                        </div>
                                    @endif
                                    <h1 class="pt-3 ml-3 ">Change Password</h1>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="email" class="form-label">{{ __('User Email') }}</label>
                                                <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled>
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="old-password" class="form-label">{{ __('Current Password') }}</label>
                                                <input id="old-password" type="password" class="form-control @error('old-password') is-invalid @enderror" name="old-password" placeholder="Enter new old password" required autofocus>
                                                @error('old-password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>      
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="password" class="form-label">{{ __('New Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter new password" required autofocus>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="confirm-password" class="form-label">{{ __('Confirm New Password') }}</label>
                                                <input id="confirm-password" type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="password_confirmation" placeholder="Enter new password again" required autofocus>
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>                        
                                    </div>
                                    <div class="col-sm-4 pt-4 pb-3">
                                        <button type="submit" class="btn btn-primary">    Update Password    </button>
                                    </div>
                                </form> <hr>

                                {{-- Upload Avatar --}}
                                <form action="{{ route('upload.employeeavatar') }}" method="POST" class="g-3" enctype="multipart/form-data">
                                    @csrf
                                    <h1 class="pt-3 ml-3 ">Change Profile Picture</h1>
                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <div class="form-outline mr-3 ml-3">
                                                <label for="avatar" class="form-label"></label>
                                                <input class="form-control avatar-upload @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" autofocus>
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>   
                                        <div class="col-sm-4 pt-4 pb-3">
                                            <button type="submit" value="upload" class="btn btn-primary">    Upload Picture    </button>
                                        </div>   
                                    </div>
                                </form> <hr>

                                {{-- Notification settings --}}
                                <div class="notification_preferrences pt-3 ml-4 mb-5">
                                    
                                    <h1>Notification Preferrences</h1>
                                    <p>Viverra nulla interdum ac aliquam enim amet non, nunc. Eget dignissim suspendisse eget dictum id neque.</p>
                                    <form action="#" method="POST" class="g-3">
                                        @csrf
                                        <div class="row">  
                                            <div class="col-sm-2"> 
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="col-sm-10 mt-1">
                                                <p>Monthly Statement</p>
                                            </div>
                                            <div class="col-2">
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="col-sm-10 mt-1">
                                                <p>Feedback notification</p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection