@extends('layouts.website')

@section('content')

    <main class="main">
        <div class="container-fluid">
            <div class="row row--grid">
                <!-- breadcrumb -->
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Events</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->

                <!-- title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h1>Events</h1>
                    </div>
                </div>
                <!-- end title -->
            </div>

            <div class="row row--grid">
                <div class="col-12">
                    <div class="main__filter">
                        <form action="#" class="main__filter-search">
                            <input type="text" placeholder="Date, place, etc.">
                            <button type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/>
                                </svg>
                            </button>
                        </form>


                        <div class="slider-radio">
                            <input type="radio" name="grade" id="past"><label for="past">Past</label>
                            <input type="radio" name="grade" id="free"><label for="free">Free</label>
                        </div>
                    </div>

                    <div class="row row--grid">
                        @foreach($events as $event)
                            <div class="col-12 col-md-6 col-xl-4">
                                @if($event->episodes)
                                    <div class="event" data-bg="">
                                        @if($event->episodes->count()>=1)
                                            <iframe style="width: 100%;"
                                                    src="https://www.youtube.com/embed/{{substr($event->episodes->first()->link,17)}}?controls=0"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; picture-in-picture"
                                                    allowfullscreen>
                                            </iframe>
                                        @else
                                            <iframe style="width: 100%;"
                                                    src="https://www.youtube.com/embed/"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                            </iframe>
                                        @endif
                                        <span class="event__date">
                                                    <a href="{{url('/events/'.$event->id)}}">{{date('F M Y'),strtotime($event->date)}}</a></span>
                                        {{-- <span class="event__time">8:00 pm</span>--}}
                                        <h3 class="event__title"><a
                                                href="{{url('/events/'.$event->id)}}">{{$event->title}}</a></h3>
                                        <p class="event__address">{{$event->location}}</p>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </main>

@stop
