<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('website/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('widthwebsite/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/paymentfont.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/slider-radio.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/plyr.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/main.css')}}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="icon/favicon-32x32.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>SOUNDZcmr</title>

    <style type="text/css">
        .container1 {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
        }

        /* Then style the iframe to fit in the container div with full height and width */
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

    </style>
    @livewireStyles
</head>
<body>
<!-- header -->
<header class="header">
    <div class="header__content">
        <div class="header__logo">
            <a href="{{url('/')}}">
                <img style="width: 400px;" src="{{asset('website/soundz logos-11.png')}}" alt="">
            </a>
        </div>

        {{-- <nav class="header__nav">
             <a href="profile.html">Profile</a>
             <a href="about.html">About</a>
             <a href="contacts.html">Contacts</a>
         </nav>--}}

        <form action="#" class="header__search">
            <input type="text" placeholder="Artist, track or podcast">
            <button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/>
                </svg>
            </button>
            <button type="button" class="close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/>
                </svg>
            </button>
        </form>


        <button class="header__btn" type="button">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
<!-- end header -->

<!-- sidebar -->
<div class="sidebar">
    <!-- sidebar logo -->
    <div  class="sidebar__logo">
        <img  style="width: 400px;"  src="{{asset('website/soundz logos-11.png')}}" alt="">
    </div>
    <!-- end sidebar logo -->

    <!-- sidebar nav -->
    <ul class="sidebar__nav">
        <li class="sidebar__nav-item">
            <a href="{{url('/dashboard')}}" class="sidebar__nav-link sidebar__nav-link--active">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"></path>
                </svg>
                <span>Home</span></a>
        </li>
        <li class="sidebar__nav-item">
            <a href="{{url('/events')}}" class="sidebar__nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M12,19a1,1,0,1,0-1-1A1,1,0,0,0,12,19Zm5,0a1,1,0,1,0-1-1A1,1,0,0,0,17,19Zm0-4a1,1,0,1,0-1-1A1,1,0,0,0,17,15Zm-5,0a1,1,0,1,0-1-1A1,1,0,0,0,12,15ZM19,3H18V2a1,1,0,0,0-2,0V3H8V2A1,1,0,0,0,6,2V3H5A3,3,0,0,0,2,6V20a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V6A3,3,0,0,0,19,3Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H20ZM20,9H4V6A1,1,0,0,1,5,5H6V6A1,1,0,0,0,8,6V5h8V6a1,1,0,0,0,2,0V5h1a1,1,0,0,1,1,1ZM7,15a1,1,0,1,0-1-1A1,1,0,0,0,7,15Zm0,4a1,1,0,1,0-1-1A1,1,0,0,0,7,19Z"/>
                </svg>
                <span>Events</span></a>
        </li>
       {{-- <li class="sidebar__nav-item">
            <a href="artists.html" class="sidebar__nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"/>
                </svg>
                <span>Artists</span></a>
        </li>--}}


        <!-- collapse -->
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu1" role="button"
               aria-expanded="false" aria-controls="collapseMenu1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M19,5.5H12.72l-.32-1a3,3,0,0,0-2.84-2H5a3,3,0,0,0-3,3v13a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V8.5A3,3,0,0,0,19,5.5Zm1,13a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5.5a1,1,0,0,1,1-1H9.56a1,1,0,0,1,.95.68l.54,1.64A1,1,0,0,0,12,7.5h7a1,1,0,0,1,1,1Z"/>
                </svg>
                <span>Profile</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z"/>
                </svg>
            </a>

            <div class="collapse" id="collapseMenu1">
                <ul class="sidebar__menu sidebar__menu--scroll">
                    <li><a href="{{url('/profile')}}">My Account</a></li>
                    <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                              this.closest('form').submit();">
                                    @if(\Illuminate\Support\Facades\Auth::user())
                                        <button class="profile__logout" type="button">
                                            <span>Sign out</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"/>
                                            </svg>
                                        </button>
                                    @endif
                                </a>
                            </form>


                    </li>


                </ul>
            </div>
        </li>
        <!-- end collapse -->

        <li>
            <a href="#" class="sidebar__nav-link">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                              this.closest('form').submit();">
                        @if(\Illuminate\Support\Facades\Auth::user())
                            Log OUT
                        @endif
                    </a>
                </form>
            </a>

        </li>
    </ul>
    <!-- end sidebar nav -->
</div>
<!-- end sidebar -->


<button class="player__btn" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path
            d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z"/>
    </svg>
    Player
</button>
<!-- end player -->

<!-- main content -->
@yield('content')
<!-- end main content -->

<!-- footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-4 order-4 order-md-1 order-lg-4 order-xl-1">
                <div  class="footer__logo">
                    <img src="{{asset('website/soundz logos-13.png')}}" alt="">
                </div>
                <p class="footer__tagline"><br>.</p>
                <div class="footer__links">
                    <a href="mailto:support@soundzcmr.co.za">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm-.41,2-5.88,5.88a1,1,0,0,1-1.42,0L5.41,6ZM20,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V7.41l5.88,5.88a3,3,0,0,0,4.24,0L20,7.41Z"/>
                        </svg>
                        support@soundzcmr.co.za</a>
                    <a href="tel:82345678900">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M19.44,13c-.22,0-.45-.07-.67-.12a9.44,9.44,0,0,1-1.31-.39,2,2,0,0,0-2.48,1l-.22.45a12.18,12.18,0,0,1-2.66-2,12.18,12.18,0,0,1-2-2.66L10.52,9a2,2,0,0,0,1-2.48,10.33,10.33,0,0,1-.39-1.31c-.05-.22-.09-.45-.12-.68a3,3,0,0,0-3-2.49h-3a3,3,0,0,0-3,3.41A19,19,0,0,0,18.53,21.91l.38,0a3,3,0,0,0,2-.76,3,3,0,0,0,1-2.25v-3A3,3,0,0,0,19.44,13Zm.5,6a1,1,0,0,1-.34.75,1.05,1.05,0,0,1-.82.25A17,17,0,0,1,4.07,5.22a1.09,1.09,0,0,1,.25-.82,1,1,0,0,1,.75-.34h3a1,1,0,0,1,1,.79q.06.41.15.81a11.12,11.12,0,0,0,.46,1.55l-1.4.65a1,1,0,0,0-.49,1.33,14.49,14.49,0,0,0,7,7,1,1,0,0,0,.76,0,1,1,0,0,0,.57-.52l.62-1.4a13.69,13.69,0,0,0,1.58.46q.4.09.81.15a1,1,0,0,1,.79,1Z"/>
                        </svg>
                        8 234 567-89-00</a>
                </div>
            </div>

            <div
                class="col-6 col-md-4 col-lg-3 col-xl-2 order-1 order-md-2 order-lg-1 order-xl-2 offset-md-2 offset-lg-0">
                <h6 class="footer__title">The SOUNDZCmr</h6>
                <div class="footer__nav">
                    <a href="about.html">About</a>
                    <a href="profile.html">My profile</a>
                    <a href="pricing.html">Pricing plans</a>
                    <a href="contacts.html">Contacts</a>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-6 col-xl-4 order-3 order-lg-2 order-md-3 order-xl-3">
                <div class="row">
                    <div class="col-12">
                        <h6 class="footer__title">Browse</h6>
                    </div>

                    <div class="col-6">
                        <div class="footer__nav">
                            <a href="artists.html">Artists</a>
                            <a href="releases.html">Releases</a>
                            <a href="events.html">Events</a>
                            <a href="podcasts.html">Podcasts</a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="footer__nav">
                            <a href="news.html">News</a>
                            <a href="store.html">Store</a>
                            <a href="#">Music</a>
                            <a href="#">Video</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-lg-3 order-md-4 order-xl-4">
                <h6 class="footer__title">Help</h6>
                <div class="footer__nav">
                    <a href="#">Account & Billing</a>
                    <a href="#">Plans & Pricing</a>
                    <a href="#">Supported devices</a>
                    <a href="#">Accessibility</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="footer__content">
                    <div class="footer__social">
                        <a href="#" target="_blank">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 15C0 6.71573 6.71573 0 15 0C23.2843 0 30 6.71573 30 15C30 23.2843 23.2843 30 15 30C6.71573 30 0 23.2843 0 15Z"
                                    fill="#3B5998"/>
                                <path
                                    d="M16.5634 23.8197V15.6589H18.8161L19.1147 12.8466H16.5634L16.5672 11.4391C16.5672 10.7056 16.6369 10.3126 17.6904 10.3126H19.0987V7.5H16.8457C14.1394 7.5 13.1869 8.86425 13.1869 11.1585V12.8469H11.4999V15.6592H13.1869V23.8197H16.5634Z"
                                    fill="white"/>
                            </svg>
                        </a>
                        <a href="#" target="_blank">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 15C0 6.71573 6.71573 0 15 0C23.2843 0 30 6.71573 30 15C30 23.2843 23.2843 30 15 30C6.71573 30 0 23.2843 0 15Z"
                                    fill="#55ACEE"/>
                                <path
                                    d="M14.5508 12.1922L14.5822 12.7112L14.0576 12.6477C12.148 12.404 10.4798 11.5778 9.06334 10.1902L8.37085 9.50169L8.19248 10.0101C7.81477 11.1435 8.05609 12.3405 8.843 13.1455C9.26269 13.5904 9.16826 13.654 8.4443 13.3891C8.19248 13.3044 7.97215 13.2408 7.95116 13.2726C7.87772 13.3468 8.12953 14.3107 8.32888 14.692C8.60168 15.2217 9.15777 15.7407 9.76631 16.0479L10.2804 16.2915L9.67188 16.3021C9.08432 16.3021 9.06334 16.3127 9.12629 16.5351C9.33613 17.2236 10.165 17.9545 11.0883 18.2723L11.7388 18.4947L11.1723 18.8337C10.3329 19.321 9.34663 19.5964 8.36036 19.6175C7.88821 19.6281 7.5 19.6705 7.5 19.7023C7.5 19.8082 8.78005 20.4014 9.52499 20.6344C11.7598 21.3229 14.4144 21.0264 16.4079 19.8506C17.8243 19.0138 19.2408 17.3507 19.9018 15.7407C20.2585 14.8827 20.6152 13.315 20.6152 12.5629C20.6152 12.0757 20.6467 12.0121 21.2343 11.4295C21.5805 11.0906 21.9058 10.7198 21.9687 10.6139C22.0737 10.4126 22.0632 10.4126 21.5281 10.5927C20.6362 10.9105 20.5103 10.8681 20.951 10.3915C21.2762 10.0525 21.6645 9.43813 21.6645 9.25806C21.6645 9.22628 21.5071 9.27924 21.3287 9.37458C21.1398 9.4805 20.7202 9.63939 20.4054 9.73472L19.8388 9.91479L19.3247 9.56524C19.0414 9.37458 18.6427 9.16273 18.4329 9.09917C17.8978 8.95087 17.0794 8.97206 16.5967 9.14154C15.2852 9.6182 14.4563 10.8469 14.5508 12.1922Z"
                                    fill="white"/>
                            </svg>
                        </a>

                        <a href="#" target="_blank">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 15C0 6.71573 6.71573 0 15 0C23.2843 0 30 6.71573 30 15C30 23.2843 23.2843 30 15 30C6.71573 30 0 23.2843 0 15Z"
                                    fill="#FF0000"/>
                                <path
                                    d="M22.6656 11.2958C22.4816 10.5889 21.9395 10.0322 21.251 9.84333C20.0034 9.5 15 9.5 15 9.5C15 9.5 9.99664 9.5 8.74891 9.84333C8.06045 10.0322 7.51827 10.5889 7.33427 11.2958C7 12.5769 7 15.25 7 15.25C7 15.25 7 17.923 7.33427 19.2042C7.51827 19.9111 8.06045 20.4678 8.74891 20.6568C9.99664 21 15 21 15 21C15 21 20.0034 21 21.251 20.6568C21.9395 20.4678 22.4816 19.9111 22.6656 19.2042C23 17.923 23 15.25 23 15.25C23 15.25 23 12.5769 22.6656 11.2958"
                                    fill="white"/>
                                <path d="M13.5 18V13L17.5 15.5001L13.5 18Z" fill="#FF0000"/>
                            </svg>
                        </a>
                    </div>
                    <small class="footer__copyright">© SOUNDZCmr, {{date('Y')}}. Created by <a
                            href="https://icecreamdigital.co.zw"
                            target="_blank">Icecream Digital</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

<!-- modal ticket -->
<form action="#" id="modal-ticket" class="zoom-anim-dialog mfp-hide modal modal--form">
    <button class="modal__close" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
                d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/>
        </svg>
    </button>

    <h4 class="sign__title">To buy tickets</h4>

    <div class="sign__group sign__group--row">
        <label class="sign__label">Your balance:</label>
        <span class="sign__value">$90.99</span>
    </div>

    <div class="sign__group sign__group--row">
        <label class="sign__label" for="value">Choose ticket:</label>
        <select class="sign__select" name="value" id="value">
            <option value="50">Regular - $49</option>
            <option value="100">VIP Light - $99</option>
            <option value="200">VIP - $169</option>
        </select>

        <span class="sign__text sign__text--small">You can spend money from your account on the renewal of the connected packages, or on the purchase of goods on our website.</span>
    </div>

    <button class="sign__btn" type="button">Buy</button>
</form>
<!-- end modal ticket -->

<!-- JS -->
<script src="{{asset('website/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('website/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('website/js/smooth-scrollbar.js')}}"></script>
<script src="{{asset('website/js/select2.min.js')}}"></script>
<script src="{{asset('website/js/slider-radio.js')}}"></script>
<script src="{{asset('website/js/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('website/js/plyr.min.js')}}"></script>
<script src="{{asset('website/js/main.js')}}"></script>

@livewireScripts
</body>

</html>
