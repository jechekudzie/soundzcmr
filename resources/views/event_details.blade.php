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
                        <li class="breadcrumb__item"><a href="{{url('/events')}}">Events</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">{{$event->title}}</li>
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
                        @if($event->episodes)
                            @if($event->episodes->count()>=1)
                                <iframe style="width: 100%; height: 400px"
                                        src="https://www.youtube.com/embed/{{substr($event->episodes->first()->link,17)}}?controls=showinfo=0&amp;showinfo=0"
                                        frameborder="0"
                                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; picture-in-picture"
                                        allowfullscreen>
                                </iframe>

                            @endif
                        @endif

                        <div class="hero__slide" data-bg="img/home/slide2.jpg">
                            <h1 class="hero__title">{{$event->title}}</h1>
                            <p class="hero__text">{!! $event->description !!}</p>

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
                                <h4>{{$event->title}}</h4>
                                <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom"
                                   class="article__place open-map">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M20.46,9.63A8.5,8.5,0,0,0,7.3,3.36,8.56,8.56,0,0,0,3.54,9.63,8.46,8.46,0,0,0,6,16.46l5.3,5.31a1,1,0,0,0,1.42,0L18,16.46A8.46,8.46,0,0,0,20.46,9.63ZM16.6,15.05,12,19.65l-4.6-4.6A6.49,6.49,0,0,1,5.53,9.83,6.57,6.57,0,0,1,8.42,5a6.47,6.47,0,0,1,7.16,0,6.57,6.57,0,0,1,2.89,4.81A6.49,6.49,0,0,1,16.6,15.05ZM12,6a4.5,4.5,0,1,0,4.5,4.5A4.51,4.51,0,0,0,12,6Zm0,7a2.5,2.5,0,1,1,2.5-2.5A2.5,2.5,0,0,1,12,13Z"/>
                                    </svg>
                                    {{$event->location}}
                                </a>

                                  <span class="article__date"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path
                                              d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20ZM14.09814,9.63379,13,10.26807V7a1,1,0,0,0-2,0v5a1.00025,1.00025,0,0,0,1.5.86621l2.59814-1.5a1.00016,1.00016,0,1,0-1-1.73242Z"/></svg> {{date('d F Y'),strtotime($event->date)}}</span>
                              </div>

                              <p>{!! $event->description !!}</p>
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
                                   Episodes
                                </div>
                            </div>
                            <hr/>

                            <div class="row">
                                @if($event->episodes)
                                    @foreach($event->episodes as $episode)
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <iframe style="width: 100%; height: 370px"
                                                    src="https://www.youtube.com/embed/{{substr($episode->link,17)}}?controls=showinfo=0&amp;showinfo=0"
                                                    title="{{asset($episode->title)}}" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            <hr/>
                                            <a class="sign__btn" href="{{url('/episode_details/'.$episode->id)}}">Episode details</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>

              <!-- events -->
             {{-- <section class="row row--grid">
                  <!-- title -->
                  <div class="col-12">
                      <div class="main__title">
                          <h2>Other Events</h2>

                          <a href="events.html" class="main__link">See all
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
                          <div class="main__carousel main__carousel--events owl-carousel" id="events">

                              <div class="event" data-bg="img/events/event1.jpg">
                                  <a href="#modal-ticket" class="event__ticket open-modal">
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path
                                              d="M9,10a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V11A1,1,0,0,0,9,10Zm12,1a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H3A1,1,0,0,0,2,6v4a1,1,0,0,0,1,1,1,1,0,0,1,0,2,1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1,1,1,0,0,1,0-2ZM20,9.18a3,3,0,0,0,0,5.64V17H10a1,1,0,0,0-2,0H4V14.82A3,3,0,0,0,4,9.18V7H8a1,1,0,0,0,2,0H20Z"/>
                                      </svg>
                                      Buy ticket</a>
                                  <span class="event__date">{{date('F M Y'),strtotime($event->date)}}</span>
                                --}}{{--<span class="event__time">8:00 pm</span>--}}{{--
                                <h3 class="event__title"><a href="event.html">{{$event->title}}</a></h3>
                                <p class="event__address">{{$event->localtion}}</p>
                            </div>

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
            </section>--}}
            <!-- end events -->
        </div>
    </main>
    <!-- end main content -->

@stop
