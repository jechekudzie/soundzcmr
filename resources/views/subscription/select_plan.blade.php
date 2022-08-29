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
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">{{$plan->name}}</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">USD$ {{$plan->price}}<small
                                        class="text-muted fw-light"></small>
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Duration {{$plan->duration}} month(s)</li>
                                    <li>Expires in {{$plan->duration_days}} days(s)</li>
                                </ul>
                                <a href="{{url('/checkout/'.$plan->id)}}" class="w-100 btn btn-lg btn-primary">Get started</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
    </main>
    <!-- end main content -->



@stop
