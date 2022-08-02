@extends('layouts.website')

@section('content')
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row row--grid">
                <!-- breadcrumb -->
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb__item"><a href="{{url('/event/'.$episode->event->id)}}">Events</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">{{$episode->event->title}}</li>
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
            <!-- slider -->
            <section class="row">
                <div class="col-12">
                    <div class="hero owl-carousel" id="hero">
                        <iframe style="width: 100%; height: 400px"
                                src="https://www.youtube.com/embed/{{substr($episode->link,17)}}?controls=showinfo=0&amp;showinfo=0"
                                frameborder="0"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; picture-in-picture"
                                allowfullscreen>
                        </iframe>
                        <div class="hero__slide" data-bg="img/home/slide2.jpg">
                            <h1 class="hero__title">{{$episode->event->title}}</h1>
                            <p class="hero__text">{!! $episode->event->description !!}</p>

                        </div>
                    </div>

                </div>
            </section>
            <!-- end slider -->

            <div class="row row--grid">
                <div class="col-12 col-xl-10">
                    <div class="article">
                        <!-- article content -->
                        <div class="article__content">
                            <div class="article__meta">
                                <h4>{{$episode->event->title}}</h4>
                                <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom"
                                   class="article__place open-map">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M20.46,9.63A8.5,8.5,0,0,0,7.3,3.36,8.56,8.56,0,0,0,3.54,9.63,8.46,8.46,0,0,0,6,16.46l5.3,5.31a1,1,0,0,0,1.42,0L18,16.46A8.46,8.46,0,0,0,20.46,9.63ZM16.6,15.05,12,19.65l-4.6-4.6A6.49,6.49,0,0,1,5.53,9.83,6.57,6.57,0,0,1,8.42,5a6.47,6.47,0,0,1,7.16,0,6.57,6.57,0,0,1,2.89,4.81A6.49,6.49,0,0,1,16.6,15.05ZM12,6a4.5,4.5,0,1,0,4.5,4.5A4.51,4.51,0,0,0,12,6Zm0,7a2.5,2.5,0,1,1,2.5-2.5A2.5,2.5,0,0,1,12,13Z"/>
                                    </svg>
                                    {{$episode->event->location}}
                                </a>

                                <span class="article__date"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path
                                            d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20ZM14.09814,9.63379,13,10.26807V7a1,1,0,0,0-2,0v5a1.00025,1.00025,0,0,0,1.5.86621l2.59814-1.5a1.00016,1.00016,0,1,0-1-1.73242Z"/></svg> {{date('d F Y'),strtotime($episode->event->date)}}</span>
                            </div>
                        </div>
                        <!-- end article content -->

                        <!-- share -->

                        <!-- end share -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card text-black bg-default">
                                <div style="color: white;font-size: 20px;" class="card-header">
                                    Episode Participant {{$episode->link}}
                                </div>
                            </div>
                            <hr/>

                            @livewire('vote', ['episode' => $episode])
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </main>
    <!-- end main content -->

@stop
