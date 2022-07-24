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
                        <li class="breadcrumb__item breadcrumb__item--active">Cart</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->

                <!-- title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h1>Cart</h1>
                    </div>
                </div>
                <!-- end title -->
            </div>

            <div class="row row--grid">
                <div class="col-12 col-lg-8">
                    <!-- cart -->
                    <div class="cart">
                        <div class="cart__table-wrap">
                            <div class="cart__table-scroll">
                                <table class="cart__table">
                                    <thead>
                                    <tr>
                                        <th>Plan</th>
                                        <th>Duration</th>
                                        <th>Amount</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>

                                        <td>{{$package->name}}</td>
                                        <td>{{$package->duration}} month(s)</td>

                                        <td><span class="cart__price">{{$package->price}}</span></td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="cart__info">
                            <div class="cart__total">
                                <p>Total:</p>
                                <span>{{$package->price}}</span>
                            </div>


                            <div class="cart__systems">
                                <i class="pf pf-visa"></i>
                                <i class="pf pf-mastercard"></i>
                                <i class="pf pf-paypal"></i>
                            </div>
                        </div>
                    </div>
                    <!-- end cart -->
                </div>

                <div class="col-12 col-lg-4">
                    <!-- checkout -->
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
                    <form action="{{ route('pay') }}" method="post"
                          class="sign__form sign__form--cart">
                        @csrf
                        <h4 class="sign__title">Checkout</h4>
                        <div class="sign__group">
                            <input type="text" name="name" class="sign__input" required value="{{$user->name}}"
                                   placeholder="Enter name">
                        </div>

                        <div class="sign__group">
                            <input type="text" name="email" class="sign__input" required value="{{$user->email}}"
                                   placeholder="Enter email address">
                        </div>

                        <div class="sign__group">
                            <input type="text" name="phone_number" class="sign__input" required value="0774685884"
                                   placeholder="Enter Phone Number">
                        </div>

                        <input type="hidden" name="package_id" value="{{$package->id}}">
                        <input type="hidden" name="package_price" value="{{$package->price}}">

                        <div class="sign__group sign__group--row">
                            <label class="sign__label">Payment methods:</label>

                            <ul class="sign__radio">
                                <li>
                                    <input id="type1" type="radio" name="type">
                                    <label for="type1">Visa</label>
                                </li>
                                <li>
                                    <input id="type2" type="radio" name="type">
                                    <label for="type2">Mastercard</label>
                                </li>
                                <li>
                                    <input id="type3" type="radio" name="type">
                                    <label for="type3">Paypal</label>
                                </li>
                            </ul>
                        </div>

                        <button type="submit" class="sign__btn">Complete</button>
                    </form>
                    <!-- end checkout -->
                </div>
            </div>

            <!-- partners -->
            <div class="row">
                <div class="col-12">
                    <div class="partners owl-carousel">
                        <a href="#" class="partners__img">
                            <img src="img/partners/3docean-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/activeden-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/audiojungle-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/codecanyon-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/photodune-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/themeforest-light-background.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- end partners -->
        </div>
    </main>
    <!-- end main content -->


@stop
