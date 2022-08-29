@extends('layouts.registration')

@section('content')

    <div class="auth-content">
        <form>
            <div class="mb-3 pb-2">
                <div class="avatar-md mx-auto">
                                        <span class="avatar-title text-success bg-soft-success rounded-circle">
                                            <i class="mdi mdi-email display-6"></i>
                                        </span>
                </div>
            </div>

            <div class="text-center">
                <h4>Verify Your Email</h4>
                <p style="color: black;">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}

                </p>
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
            </div>
            <hr/>

            <div class="mt-3 text-center">
                <p class="mb-0">I did not receive an email.
                </p>
            </div>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-sm btn-success w-100 rounded-pill">Re-Send
                        email
                    </button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <p class="mb-0"> Or Simply Log Out
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-sm btn-success w-100 rounded-pill">
                        {{ __('Log Out') }}
                    </button>
                </div>

            </form>
            <hr>

        </form><!-- end form -->
    </div>
@stop
