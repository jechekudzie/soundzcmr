@extends('layouts.website')

@section('content')
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <!-- slider -->
            <section class="row">
                <div class="col-12">
                    <div class="hero owl-carousel" id="hero">
                        <div class="hero__slide" data-bg="{{asset('website/banner.jpg')}}">
                            <h1 class="hero__title"></h1>
                            <p class="hero__text">
                                </p>
                            {{--<div class="hero__btns">
                                <a href="#" class="hero__btn hero__btn--green">Buy now</a>
                                <a href="#" class="hero__btn">Learn more</a>
                            </div>--}}
                        </div>

                        <div class="hero__slide" data-bg="{{asset('website/banner1.jpg')}}">
                            <h2 class="hero__title"></h2>
                            <p class="hero__text"></p>
                            {{--<div class="hero__btns">
                                <a href="#" class="hero__btn hero__btn--green">Learn more</a>
                                <a href="http://www.youtube.com/watch?v=0O2aH4XLbto"
                                   class="hero__btn hero__btn--video open-video">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M16,10.27,11,7.38A2,2,0,0,0,8,9.11v5.78a2,2,0,0,0,1,1.73,2,2,0,0,0,2,0l5-2.89a2,2,0,0,0,0-3.46ZM15,12l-5,2.89V9.11L15,12ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z"/>
                                    </svg>
                                    Watch video</a>
                            </div>--}}
                        </div>


                    </div>

                    <button class="main__nav main__nav--hero main__nav--prev" data-nav="#hero" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/>
                        </svg>
                    </button>
                    <button class="main__nav main__nav--hero main__nav--next" data-nav="#hero" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/>
                        </svg>
                    </button>
                </div>
            </section>
            <!-- end slider -->

            <!-- events -->
            <section class="row row--grid">
                <!-- title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Upcoming Events</h2>

                        <a href="#" class="main__link">See all
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/>
                            </svg>
                        </a>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                </div>
                <!-- end title -->

                <div class="col-12">
                    <div class="main__carousel-wrap">
                        <div class="main__carousel main__carousel--events owl-carousel" id="events">
                            @foreach($events as $event)
                                <div class="">
                                    @if($event->episodes)
                                        @if($event->episodes->count()>=1)
                                            <div class="container1">
                                                <iframe class="responsive-iframe"
                                                        src="https://www.youtube.com/embed/{{substr($event->episodes->first()->link,17)}}"
                                                        title="{{asset($event->title)}}" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                            </div>

                                        @endif
                                    @else
                                        <iframe style="width: 100%; height: 300px"
                                                src="https://www.youtube.com/embed/"
                                                title="{{asset($event->title)}}" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    @endif
                                    <span class="event__date">{{$event->date}}</span>
                                    <span class="event__time">7:00 pm</span>
                                    <h3 class="event__title"><a href="#">{{$event->artist}}</a></h3>
                                    <p class="event__address">{{$event->location}}</p>

                                </div>
                            @endforeach
                        </div>

                        <button class="main__nav main__nav--prev" data-nav="#events" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/>
                            </svg>
                        </button>
                        <button class="main__nav main__nav--next" data-nav="#events" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
            <!-- end events -->

            <!-- articts -->
            <section class="row row--grid">
                <!-- title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Artists</h2>

                        <a href="#" class="main__link">See all
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- end title -->

                <div class="col-12">
                    <div class="main__carousel-wrap">
                        <div class="main__carousel main__carousel--artists owl-carousel" id="artists">
                            <a href="artist.html" class="artist">
                                <div class="artist__cover">
                                    <img src="{{asset('website/artist/artist.png')}}" alt="">
                                </div>
                                {{--<h3 class="artist__title">Christ Brown</h3>--}}
                            </a>

                            <a href="artist.html" class="artist">
                                <div class="artist__cover">
                                    <img src="{{asset('website/artist/artist1.png')}}" alt="">
                                </div>
                                {{--<h3 class="artist__title">Christ Brown</h3>--}}
                            </a>

                            <a href="artist.html" class="artist">
                                <div class="artist__cover">
                                    <img src="{{asset('website/artist/artist2.png')}}" alt="">
                                </div>
                                {{--<h3 class="artist__title">Christ Brown</h3>--}}
                            </a>

                            <a href="artist.html" class="artist">
                                <div class="artist__cover">
                                    <img src="{{asset('website/artist/artist3.png')}}" alt="">
                                </div>
                                {{--<h3 class="artist__title">Christ Brown</h3>--}}
                            </a>

                            <a href="artist.html" class="artist">
                                <div class="artist__cover">
                                    <img src="{{asset('website/artist/artist4.png')}}" alt="">
                                </div>
                                {{--<h3 class="artist__title">Christ Brown</h3>--}}
                            </a>

                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <button class="main__nav main__nav--prev" data-nav="#artists" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/>
                            </svg>
                        </button>
                        <button class="main__nav main__nav--next" data-nav="#artists" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
            <!-- end articts -->


        </div>
    </main>
    <!-- end main content -->


@stop
