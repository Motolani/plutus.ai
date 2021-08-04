@extends('layouts.index')

@section('center')
<div class="login-user ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 pt-5">
                <h3>Welcome Back!</h3><br>
                <form action="{{ route('login') }}" method="post" class="login-form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                        <div class="login-mail-input">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email Address" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">{{ __('Password') }}</label>
                        <div class="login-input-pwd">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link form-text pwd-forgot-text" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </div>
                    <button type="submit" class="btn btn-primary form-control mt-3">
                        {{ __('Login') }}
                    </button>
                </form>
                <div class="login-password-reset pt-3">
                    <p>
                        New to Plutus.ai? 
                        <a href="{{route('new.register')}}">Register</a>
                    </p>
                </div>
                <hr> 
            </div>
        </div>
    </div>
</div>
@endsection