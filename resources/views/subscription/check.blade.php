@extends('layouts.site')

@section('content')
    <div class="container py-3">
        <main>
            <nav
                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/select_plan')}}">Choose
                            Plan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$package->name}}</li>
                </ol>
            </nav>
            <div class="py-5 text-center">
                <h2>Checkout</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <span class="badge bg-primary rounded-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Subscription plan</h6>
                                <small class="text-muted">{{$package->name}}</small>
                            </div>
                            <span class="text-muted">FCFA {{$package->price}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (FCFA)</span>
                            <strong>{{$package->price}}</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing information</h4>
                    @if($errors->any())
                        @include('errors')
                    @endif
                    @if (session('message'))
                        <div
                            style="color: white" class="alert alert-success alert-rounded col-md-6"><i
                                class="fa fa-check-circle"></i> {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <form class="needs-validation" action="{{ route('pay') }}" method="post"
                          enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Full name</label>
                                <input type="text" name="name" class="form-control" id="firstName" placeholder=""
                                       value="{{$user->name}}" required>
                                <div class="invalid-feedback">
                                    Valid full name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <label for="address" class="form-label">Mobile number</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="enter valid  phone including country code"
                                       required>
                                <div class="invalid-feedback">
                                    Please enter your mobile number.
                                </div>
                            </div>

                            <input type="hidden" name="package_id" value="{{$package->id}}">
                            <input type="hidden" name="package_price" value="{{$package->price}}">

                        </div>

                        <hr class="my-4">


                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@stop
