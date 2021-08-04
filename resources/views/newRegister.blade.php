@extends('layouts.index')

@section('center')
<div class="register-user ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-8 offset-2 pt-5">
                <h3>Start Your Journey</h3><br>
                <form action="{{ route('register') }}" method="POST" class="register-form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label">{{ __('Firstname') }}</label>
                        <div class="name-register-input">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Your Firstname" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="lastname" class="form-label">{{ __('Lastname') }}</label>
                        <div class="name-register-input">
                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" placeholder="Enter Your Lastname" autofocus>
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                        <div class="email-register-input">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email Address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <div class="pwd-register-input">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Your Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your Password">
                        @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="subscription-role" class="form-label">{{ __('Subsctiption Plan') }}</label>
                        <select name="role"  id="subscription-role" class="form-select form-control @error('role') is-invalid @enderror" aria-label="Default select example" required>
                            <option value="1">Admin</option>
                            <option value="4">Starter</option>
                            <option value="3">Freelancer</option>
                            <option value="2">Enterprise</option>
                        </select>
                        @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary form-control mt-3">
                        {{ __('Register') }}
                    </button>
                </form>
                <div class="login-password-reset pt-3">
                    <p>
                        Already on Plutus.ai? 
                        <a href="{{route('new.login')}}">Login</a>
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection