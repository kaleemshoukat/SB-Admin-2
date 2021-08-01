@extends('layouts.admin-login-layout')
@section('title', 'Login')
@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                @if(session()->has('error'))
                                    <div class="alert alert-danger text-center">
                                        {{ session()->get('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if(session()->has('message'))
                                    <div class="alert alert-success text-center">
                                        {{ session()->get('message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form action="{{route('admin.loginSubmit')}}" method="post" id="login_form" class="user" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-user" placeholder="Enter Email Address...">
                                        @error('email')
                                        <label class="error">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        @error('password')
                                        <label class="error">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                    <a href="javascript:void(0)" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('admin.forgotPassword')}}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="javascript:void(0)">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
