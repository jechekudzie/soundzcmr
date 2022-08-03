<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SOUNDZ cmr</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="Themesdesign"/>

    <link rel="shortcut icon" style="width: 200px;" href="{{asset('mail.png')}}">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('registration/css/bootstrap.min.css')}}" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('/registration/css/materialdesignicons.min.css')}}"/>

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('registration/css/style.css')}}"/>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

</head>

<body>
<div style="
    position: absolute;
    width: 250px;
    top: 0;
    left: 0%;
    padding: 20px;
">

   {{-- <img style="width: 200px;" src="{{asset('mail.png')}}">--}}
</div>
<div style="background: url('{{asset('bg.png')}}') no-repeat center center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    " class="account-pages">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-5 col-lg-5">
                <div class="auth-box">
                    <div class="auth-content">
                        <div style="margin: auto;width: 50%;">
                            <img style="width: 200px;" src="{{asset('mail.png')}}">
                        </div>
                        @yield('content')

                    </div><!-- auth content -->
                </div>
                <!-- end authbox -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- END -->

<!-- bootstrap -->
<script src="{{asset('registration/js/bootstrap.bundle.min.js')}}"></script>
<!-- CUSTOM JS -->
<script src="{{asset('registration/js/app.js')}}"></script>
</body>

</html>
