<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="iTAP Media">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SOUNDZcmr</title>
    <link rel="shortcut icon" style="width: 200px;" href="{{asset('mail.png')}}">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('site/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('site/headers.css')}}" rel="stylesheet">
    <link href="{{asset('site/carousel.css')}}" rel="stylesheet">
    <link href="{{asset('site/product.css')}}" rel="stylesheet">
    <link href="{{asset('site/features.css')}}" rel="stylesheet">
{{--
    <link href="{{asset('site/pricing.css')}}" rel="stylesheet">
--}}
@stack('head')

<!-- Datepicker -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/date-picker.css')}}">
    @livewireStyles
</head>
<body style="margin-top: -140px;">
<div class="skippy visually-hidden-focusable overflow-hidden">
    <div class="container-xl">
        <a class="d-inline-flex p-2 m-1" href="#content">Skip to main content</a>
    </div>
</div>

<header class="navbar navbar-expand-md navbar-dark bd-navbar">
    <nav class="container-xxl flex-wrap flex-md-nowrap" aria-label="Main navigation">
        <a href="{{url('/dashboard')}}"
           class="d-flex align-items-center {{--mb-2--}} mb-lg-0 text-dark text-decoration-none">
            <img src="{{asset('')}}" class="bi me-2" width="400" height="" role="img"
                 aria-label="Bootstrap">
            {{--<svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>--}}
        </a>

        <button class="navbar-toggler collapsed bg-danger" type="button" data-bs-toggle="collapse"
                data-bs-target="#bdNavbar"
                aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
            </svg>
        </button>

        <div class="navbar-collapse collapse" id="bdNavbar" style="">
            <ul class="nav nav-pills col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                {{-- <li class="nav-item"><a href="#" class="nav-link text-dark active">Home</a></li>--}}
                <li class="nav-item"><a href="{{url('/events')}}" class="nav-link text-dark active">Events</a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link text-dark">Artists</a></li>
                <li style="list-style: none" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        @if(\Illuminate\Support\Facades\Auth::user()){{\Illuminate\Support\Facades\Auth::user()->name}}@endif
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{url('/profile')}}">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a style="font-size: 15px" class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    @if(\Illuminate\Support\Facades\Auth::user())
                                        Log out
                                    @endif
                                </a>
                            </form>

                        </li>
                    </ul>
                </li>


            </ul>
            <hr class="d-md-none text-white-50">
            <div class="navbar-nav flex-row flex-wrap ms-md-auto">
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-light" placeholder="Search..."
                           aria-label="Search">
                </form>

            </div>
            <hr class="d-md-none text-white-50">
        </div>
    </nav>
    <hr style="color: red;" class="my-4">
</header>

@yield('content')

<!-- FOOTER -->
<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Events</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Subscription plans</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">© {{date('Y')}} SOUNDZcmr</p>
    </footer>
</div>

<script src="{{asset('site/dist/js/bootstrap.bundle.min.js')}}"></script>


<!-- Plugins JS start-->
<script src="{{asset('datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('datepicker/date-picker/datepicker.custom.js')}}"></script>
<!-- Plugins JS Ends-->
@livewireScripts
@stack('scripts')

</body>
</html>
