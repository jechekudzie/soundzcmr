@extends('layouts.registration')

@section('content')

    <div class="mb-3 pb-3 text-center">
        <h4 class="fw-normal">Welcome to SOUNDZCmr</h4>
    </div>
    <form action="{{route('login')}}" method="post" class="form-custom mt-3">
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        @if (session('message'))
            <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button class="btn-close" type="button" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        @endif

        @csrf
        <div class="mb-3">
            <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
        </div>

        <div class="form-password mb-3 auth-pass-inputgroup">
            <div class="position-relative">
                <input type="password" name="password" class="form-control" id="password-input"
                       placeholder="Enter password">
                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0
                                        shadow-none" id="password-addon">
                    <i class="mdi mdi-eye-outline f-16 text-muted"></i>
                </button>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-6">
                <div class="form-checkbox">
                    <input type="checkbox" class="form-check-input me-1 shadow-none" id="customControlInline">
                    <label style="color: black;" class="form-label f-15 fw-medium" for="customControlInline">Remember
                        me</label>
                </div>
            </div><!-- end col -->
            @if (Route::has('password.request'))
                <div class="col-sm-6 text-end">
                    <a style="color: black;" href="{{route('password.request')}}" class="f-15 fw-medium"><i
                            class="mdi  mdi-lock"></i>Forgot password?</a>
                </div>
        @endif
        <!-- end col -->
        </div><!-- end row -->

        <div class="text-center mt-3">
            <button class="btn btn-sm btn-success w-100 rounded-pill" type="submit">Log In</button>
        </div>
        <hr>
        <div class="mt-3 text-center">
            <p class="mb-0" style="color: black;">Don't have an account ?
                <a href="{{url('/register')}}" class="text-success fw-bold text-decoraton-underline ms-1">
                    Sign up
                </a></p>
        </div>
        <div class="mt-3 text-center">
            <p class="mb-0" style="font-weight: bolder;">OR Log-in With</p>
        </div>
    </form>
    <!-- end -->
    <div class="row justify-content-center align-items-center">
        <div class="col-4">
            <div class="client-images my-3 my-md-0">
                <a href="{{url('/login/facebook')}}" class="btn btn-sm btn-primary rounded-pill"><i
                        class="fab
                                        fa-facebook-f"></i></a>
            </div>
        </div>
        <!-- end col -->
        <div class="col-4">
            <div class="client-images my-3 my-md-0">
                <a href="{{url('/login/google')}}" class="btn btn-sm btn-warning  rounded-pill"><i
                        class="fa-brands fa-google"></i></a>

            </div>
        </div>
        <div class="col-4">
            <div class="client-images my-3 my-md-0">
                <a href="{{url('/login/apple')}}" class="btn btn-sm btn-dark  rounded-pill"><i
                        class="fa-brands
                                        fa-apple"></i></a>

            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@stop
