@extends('layouts.registration')

@section('content')
    <!-- START -->
    <div class="mb-3 pb-3 text-center">
        <h4 class="fw-normal">Sign Up</h4>
    </div>
    <form action="{{route('register')}}" method="post" class="form-custom mt-3">
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        @csrf
        <div class="mb-3">
            <input type="email" name="email" class="form-control" id="email"
                   placeholder="Enter email" value="{{old('email')}}">

        </div>
        <div class="mb-3">
            <input type="text" name="name" class="form-control" id="username"
                   placeholder="Enter full name" value="{{old('name')}}">
        </div>
        <div class="form-password mb-3 auth-pass-inputgroup">
            <div class="position-relative">
                <input type="password" name="password" class="form-control" id="password-input"
                       placeholder="Enter password" value="{{old('email')}}">
                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0 shadow-none"
                        id="password-addon">
                    <i class="mdi mdi-eye-outline f-16 text-muted"></i>
                </button>
            </div>
        </div>

        <div class="form-password mb-3 auth-pass-inputgroup">
            <div class="position-relative">
                <input type="password" name="password_confirmation" class="form-control"
                       id="password-input"
                       placeholder="Re-Enter password" value="{{old('email')}}">
                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0 shadow-none"
                        id="password-addon">
                    <i class="mdi mdi-eye-outline f-16 text-muted"></i>
                </button>
            </div>
        </div>

        <div class="form-check">
            <input required class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label f-15" for="flexCheckDefault"
                   style="color: black;">
                I agree to all the term and condition.
            </label>
        </div>

        <div {{--class="text-center mt-3"--}}>
            <button class="btn btn-sm btn-success w-100 rounded-pill"
                    type="submit">Register
            </button>
        </div>
        <hr>
        <div class="mt-3 text-center">
            <p class="mb-0 text-muted">Already have an account ?<a href="{{url('/login')}}"
                                                                   class="text-success fw-bold text-decoraton-underline ms-1">
                    Sign in
                </a></p>
        </div>
        <div class="mt-3 text-center">
            <p class="mb-0" style="font-weight: bolder;">OR Sign-up With</p>
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
