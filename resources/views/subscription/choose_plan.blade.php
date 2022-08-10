@extends('layouts.site')

@section('content')
    <div class="container py-3">
        <main>
            <nav
                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/profile')}}">Profile</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Choose Plan</li>
                </ol>
            </nav>
            <div class="col-12">
                <div class="main__title">
                    <h2>Choose Your Plan</h2>
                    <p>To continue browsing and streaming, please choose your below</p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                @if (session('message'))
                    <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                        <strong>Message
                            ! </strong> {{session('message')}}
                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                @endif


                @foreach($plans as $plan)
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">{{$plan->name}}</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">FCFA {{$plan->price}}<small
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

        </main>
    </div>
@stop
