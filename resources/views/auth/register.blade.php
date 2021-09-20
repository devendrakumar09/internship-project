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
    <div class="card">
        <form method="POST" action="{{ route('register') }}">
        @csrf
            <div class="p-3 border-bottom d-flex align-items-center justify-content-center">
                <h2 class="font-weight-bolder py-4">Register </h2>
            </div>
            <div class="p-3 px-4 py-4 border-bottom"> 
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name" />            
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form mt-4"> 
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                
                </div>

                <div class="form mt-2"> 
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form mt-2"> 
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn text-white btn-block continue">{{ __('Register') }}</button>
            </div>
            <div class="p-3 d-flex flex-row justify-content-center align-items-center member"> <span>Not a member? </span> <a href="#" class="text-decoration-none ml-2">SIGNUP</a> </div>
        </form>    
    </div>
</div>
@endsection
