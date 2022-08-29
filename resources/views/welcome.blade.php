@extends('layouts.site')

@section('content')

    <main style="margin-top: 10px">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true"
                        aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="bd-placeholder-img" width="100%" height="100%"
                         src="{{asset('/website/banner1.png')}}"
                         aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"/>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1></h1>

                            <a style="margin-top: 15%;" target="_blank" class="btn btn-sm btn-danger"
                               href="https://soundzcmr.com/en/cameroon-talent-show">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="bd-placeholder-img" width="100%" height="100%"
                         src="{{asset('/website/banner2.png')}}"
                         aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"/>

                    <div class="container">
                        <div class="carousel-caption">
                            {{--  <h1>Another example headline.</h1>--}}
                            {{-- <p>Some representative placeholder content for the second slide of the carousel.</p>--}}
                            <a style="margin-top: 15%;" target="_blank" class="btn btn-sm btn-danger"
                               href="https://soundzcmr.com/en/about-us">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="bd-placeholder-img" width="100%" height="100%"
                         src="{{asset('/website/banner3.png')}}"
                         aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"/>

                    <div class="container">
                        <div class="carousel-caption text-end">
                            {{-- <h1>One more for good measure.</h1>--}}
                            <a style="margin-top: 15%;" target="_blank" class="btn btn-sm btn-danger"
                               href="https://soundzcmr.com/en/about-us">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section style="margin-top: 5rem;" class="text-center container">
            <div class="row">
                @foreach($events as $event)
                    <div style="margin-bottom: 20px;" class="col-md-4 col-lg-4">

                        <div class="card text-bg-dark">
                            @if($event->episodes)
                                @if($event->episodes->count()>=1)
                                    <img class="card-img" src="{{'website/cts-01.jpeg'}}">
                                    {{--<iframe class="card-img" style="width: 100%; height: 300px"
                                            src="https://www.youtube.com/embed/{{substr($event->episodes->first()->link,17)}}"
                                            title="{{asset($event->title)}}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>--}}
                                @endif
                            @else
                                <iframe class="card-img" style="width: 100%; height: 300px"
                                        src="https://www.youtube.com/embed/"
                                        title="{{asset($event->title)}}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$event->title}}</h5>
                                <p style="text-align: justify"
                                   class="card-text">{!! substr($event->description,0,70) !!}....</p>
                            </div>
                            <div class="" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <strong class="me-auto">{{$event->location}}</strong>
                                    <small>{{date('d F Y',strtotime($event->date))}}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                            aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    <a href="{{url('/events/'.$event->id)}}" class="btn btn-success btn-block">Watch Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                @endforeach
            </div>
            <br/>
            <hr/>
        </section>

        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{asset('mail.png')}}" alt="" width="300">
            <h1 class="display-5 fw-bold">Coming Soon</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">SOUNDZCmr bring you the best audio streaming soon.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <audio controls autoplay>
                        <source src="horse.ogg" type="audio/ogg">
                        <source src="horse.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>

                </div>
            </div>
        </div>

    </main>

@stop

