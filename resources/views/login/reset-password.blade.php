@extends('layouts.admin-login-layout')
@section('title', 'Forgot Password')
@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">Please enter below credentials to reset your password!</p>
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
                                <form action="{{route('admin.resetPasswordSubmit')}}" method="post" id="password_reset_form" class="user" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Enter New Password...">
                                        @error('password')
                                        <label class="error">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" class="form-control form-control-user" placeholder="Enter New Password Confirmation...">
                                        @error('confirm_password')
                                        <label class="error">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="javascript:void(0)">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('admin.login')}}">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
