@extends('layouts.app')
@section('css')
<style>
.Auth-container .card {
    width: 500px;
    border: none
}

.Auth-container .form-control {
    border: 2px solid #bdc1d2;
    font-size: 13px;
    height: 48px
}

.Auth-container .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #f7bfd9;
    outline: 0;
    box-shadow: none
}

.Auth-container .form {
    position: relative;
    margin-bottom: 25px
}

.Auth-container .form a {
    position: absolute;
    right: 8px;
    bottom: 10px;
    color: #6ca0d6;
    font-size: 13px;
    text-decoration: none;
    z-index: 10;
    background-color: #fff;
    padding: 5px
}

.Auth-container .continue {
    height: 48px;
    font-size: 13px;
    background-color: #e91e63;
    border: none
}

.Auth-container .line-text {
    color: #cecece
}

.Auth-container .line {
    background-color: #eeeff6;
    width: 166px;
    height: 2px
}

.Auth-container .member a {
    color: #e91e63;
    font-size: 14px
}

.Auth-container .member span {
    font-size: 13px;
    font-weight: 400;
    color: #6ca0d6
}

.Auth-container .facebook-button {
    background-color: #39559f
}

.Auth-container .facebook-button:hover {
    background-color: #39559f
}

.Auth-container .facebook:focus {
    color: #fff;
    background-color: #4285f4;
    border-color: #4285f4;
    box-shadow: none
}

.Auth-container .google-button {
    background-color: #4285f4
}

.Auth-container .google-button:hover {
    background-color: #4285f4
}
</style>
@endsection
@section('content')
<div class="container d-flex justify-content-center align-items-center Auth-container">
    <div class="card shadow">
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="p-3 border-bottom d-flex align-items-center justify-content-center py-5">
                <h2 class="font-weight-bolder">Login </h2>
            </div>        
            <div class="p-3 px-4 py-4 border-bottom">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email/Username">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form mt-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"> 
                    @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif 

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                <button type="submit" class="btn btn-block text-white continue">{{ __('Login') }}</button>
                <div class="d-flex justify-content-center align-items-center mt-3 mb-3"> <span class="line"></span> <small class="px-2 line-text">OR</small> <span class="line"></span> </div> <button class="btn btn-danger btn-block continue facebook-button d-flex justify-content-start align-items-center"> <i class="fa fa-facebook ml-2"></i> <span class="ml-5 px-4">Continue with facebook</span> </button> <button class="btn btn-danger btn-block continue google-button d-flex justify-content-start align-items-center"> <i class="fa fa-google ml-2"></i> <span class="ml-5 px-4">Continue with Google</span> </button>
            </div>
            <div class="p-3 d-flex flex-row justify-content-center align-items-center member"> <span>Not a member? </span> <a href="#" class="text-decoration-none ml-2">SIGNUP</a> </div>
        </form>
    </div>
</div>
@endsection
