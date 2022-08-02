@extends('layouts.website')

@section('content')

    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row row--grid">
                <!-- breadcrumb -->
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Pricing plans</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->

            </div>

            <div class="row row--grid">
                <!-- title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Select Your Plan</h2>
                        <p>To continue browsing and streaming, please choose your below</p>
                    </div>
                </div>
                <!-- end title -->
                @foreach($plans as $plan)
                    <div class="col-12 col-md-6 col-lg-4 order-md-2 order-lg-1">
                        <div class="plan plan--white">
                            <h3 class="plan__title">{{$plan->name}}</h3>
                            <span class="plan__price">CHF{{$plan->price}}<span> /{{$plan->duration}} month(s)</span></span>

                            <a href="{{url('/checkout/'.$plan->id)}}" class="plan__btn" type="button">Select plan</a>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
    </main>
    <!-- end main content -->



@stop
