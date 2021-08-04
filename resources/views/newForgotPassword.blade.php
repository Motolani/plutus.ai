@extends('layouts.index')

@section('center')
<div class="register-user ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 pt-5">
                <h3>Reset Password</h3><br>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <form action="{{ route('password.email') }}" method="POST" class="register-form" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email Address">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary form-control mt-3">
                        {{ __('Send Password Reset Link') }}
                    </button>

                </form>
                <div class="login-password-reset pt-3">
                    <p>
                        New to Plutus.ai? 
                        <a href="{{route('new.register')}}">Register</a>
                        or 
                        <a href="{{route('new.login')}}">Login </a>    
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection