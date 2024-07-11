@extends('layouts.auth')
@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index.html"><img src="{{asset('/')}}assets/compiled/svg/logo.svg" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
                @if (session()->has('eror'))
                    <div class="alert alert-danger">
                        {{session('eror')}}
                    </div>
                @endif
                @if (session()->has('sukses'))
                <div class="alert alert-success">
                    {{session('sukses')}}
                </div>
            @endif
                <form action="{{route('auth')}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl {{ $errors->first('email') != null ? 'is-invalid' : '' }}" value="{{old('email')}}" name="email" id="email" placeholder="Email">
                        @if ($errors->first('email') != null)
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
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
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" name="remember-me" id="remember-me">
                        <label class="form-check-label text-gray-600" for="remember-me">
                            Remember me
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Don't have an account? <a href="{{route('register')}}" class="font-bold">Sign
                            up</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>
@endsection
