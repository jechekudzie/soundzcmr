@extends('layouts.registration')

@section('content')
    <!-- START -->

    <div class="auth-content">
        <div class="mb-4 pb-4 text-center">
            <h4 class="fw-normal">Recover password to <span class="fw-bold">SOUNDZcmr</span></h4>
            <p class="text-muted mb-0">Reset-Password with SOUNDZcmr.</p>
        </div>
        <div class="alert alert-success text-center rounded-pill mb-4" role="alert">
            Instructions to reset will be sent to your registered email.
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <form method="POST" action="{{ route('password.email') }}" class="form-custom mt-3">
            @csrf
            <div class="mb-3">
                <input type="text" name="email" class="form-control" id="username"
                       placeholder="Enter e-mail">

            </div>
            <div class="text-center mt-6">
                <button class="btn btn-sm btn-success w-100 rounded-pill" type="submit">
                    {{ __(' Send Reset Link') }}</button>

            </div>

        </form>

        <hr/>
        <div class="mt-3 text-center">
            <p class="mb-0" style="font-weight: bolder;">OR if you have just remembered your
                password <i class="fa-solid fa-face-smile success"></i>
            </p>
            <a href="{{url('/login')}}" class="btn btn-sm btn-success w-100 rounded-pill">
                Log in
            </a>
        </div>
        <!-- end form -->
    </div><!-- auth content -->

@stop
