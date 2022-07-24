@extends('layouts.registration')

@section('content')

    <div class="auth-content">
        <div class="mb-3 pb-3 text-center">
            <h4 class="fw-normal">Forgot password to <span class="fw-bold">SOUNDZcmr</span></h4>
        </div>

        <form method="POST" action="{{ route('password.update') }}" class="form-custom mt-3">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            @csrf
            <div class="mb-3">
                <input type="email" name="email" value="{{old('email',$request->email)}}"
                       class="form-control"
                       id="username">
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" id="username"
                       placeholder="New Password">

            </div>

            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control"
                       id="userpassword"
                       placeholder="Confirm New Password">
            </div>

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">


            <div class="text-center mt-3">
                <button class="btn btn-sm btn-success w-100 rounded-pill" type="submit">Reset
                    Password
                </button>
            </div>
            <hr>
            <div class="mt-3 text-center">
                <p class="mb-0 text-muted">Remember It ?<a href="{{url('/login')}}"
                                                           class="text-success fw-bold text-decoraton-underline ms-1">
                        Sign in
                    </a></p>
            </div>
        </form>
        <!-- end form -->
    </div>

@stop
