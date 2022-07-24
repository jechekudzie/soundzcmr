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

              {{--  <livewire:update-role />
--}}
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

                <div class="col-12 col-md-6 col-lg-4 order-md-2 order-lg-1">
                    <div class="plan plan--white">
                        <h3 class="plan__title">Free</h3>
                        <span class="plan__price">$0<span> /month</span></span>

                        <ul class="plan__list">
                            <li class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/>
                                </svg>
                                Volna Originals
                            </li>
                            <li class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/>
                                </svg>
                                Switch plans or cancel anytime
                            </li>
                            <li class="red">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/>
                                </svg>
                                Stream 65+ top Live
                            </li>
                            <li class="red">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/>
                                </svg>
                                Music channels
                            </li>
                        </ul>
                        <button class="plan__btn" type="button">Select plan</button>
                    </div>
                </div>

                <div class="col-12 col-lg-4 order-md-1 order-lg-2">
                    <div class="plan plan--white">
                        <h3 class="plan__title">Starter</h3>
                        <span class="plan__price">$14.99<span> /month</span></span>
                        <ul class="plan__list">
                            <li class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/>
                                </svg>
                                Volna Originals
                            </li>
                            <li class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/>
                                </svg>
                                Switch plans or cancel anytime
                            </li>
                            <li class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/>
                                </svg>
                                Stream 65+ top Live
                            </li>
                            <li class="red">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/>
                                </svg>
                                Music channels
                            </li>
                        </ul>
                        <button class="plan__btn" type="button">Select plan</button>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 order-md-3 order-lg-3">
                    <div class="plan plan--white">
                        <h3 class="plan__title">Premium</h3>
                        <span class="plan__price">$39.99<span> /month</span></span>
                        <ul class="plan__list">
                            <li class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/>
                                </svg>
                                Volna Originals
                            </li>
                            <li class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/>
                                </svg>
                                Switch plans or cancel anytime
                            </li>
                            <li class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/>
                                </svg>
                                Stream 65+ top Live
                            </li>
                            <li class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.71,7.21a1,1,0,0,0-1.42,0L9.84,14.67,6.71,11.53A1,1,0,1,0,5.29,13l3.84,3.84a1,1,0,0,0,1.42,0l8.16-8.16A1,1,0,0,0,18.71,7.21Z"/>
                                </svg>
                                Music channels
                            </li>
                        </ul>
                        <button class="plan__btn" type="button">Select plan</button>
                    </div>
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
