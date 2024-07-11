@extends('layouts.auth')
@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index.html"><img src="{{ asset('/') }}assets/compiled/svg/logo.svg" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Sign Up</h1>
                <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                <form action="{{route('auth_register')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" name="name" id="name" class="form-control form-control-xl {{ $errors->first('name') != null ? 'is-invalid' : '' }}" value="{{old('name')}}" placeholder="Name">
                        @if ($errors->first('name') != null)
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                        @endif
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl {{ $errors->first('username') != null ? 'is-invalid' : '' }}" name="username" id="username" value="{{old('username')}}" placeholder="Username">
                        @if ($errors->first('username') != null)
                        <div class="invalid-feedback">
                            {{$errors->first('username')}}
                        </div>
                        @endif
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl {{ $errors->first('email') != null ? 'is-invalid' : '' }}" name="email" value="{{old('email')}}" id="email" placeholder="Email">
                        @if ($errors->first('email') != null)
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl {{ $errors->first('password') != null ? 'is-invalid' : '' }}" name="password" id="password" placeholder="Password">
                        @if ($errors->first('password') != null)
                        <div class="invalid-feedback">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl {{ $errors->first('password_confirmation') != null ? 'is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                        @if ($errors->first('password_confirmation') != null)
                        <div class="invalid-feedback">
                            {{$errors->first('password_confirmation')}}
                        </div>
                        @endif
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Already have an account? <a href="{{route('login')}}" class="font-bold">Log
                            in</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>
@endsection
