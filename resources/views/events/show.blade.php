@extends('layouts.site')

@section('content')
    <main style="margin-top: -50px">

        <div class="container my-5">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/events')}}">Events</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$event->title}}</li>
                </ol>
            </nav>
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                    <h1 class="display-4 fw-bold lh-1">{{$event->title}}</h1>
                    <p class="lead">{!! $event->description !!}</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">{{$event->location}}</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">{{date('d F M',strtotime($event->date))}}</button>
                    </div>
                </div>
                <div class="col-lg-4 {{--offset-lg-1 p-0--}} overflow-hidden shadow-lg">
                    <iframe class="bd-placeholder-img" width="100%" height="300" aria-hidden="true"
                            preserveAspectRatio="xMidYMid slice" focusable="false"
                            src="https://www.youtube.com/embed/{{substr($event->episodes->first()->link,17)}}"
                            title="{{asset($event->episodes->first()->title)}}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </main>

    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Event Episodes</h2>
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @foreach($event->episodes as $episode)
                <div class="" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Episode: {{$episode->episode_number}}</strong>
                        {{--<small>11 mins ago</small>--}}
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">

                        <iframe class="bd-placeholder-img" width="100%" height="300px;" aria-hidden="true"
                                preserveAspectRatio="xMidYMid slice" focusable="false"
                                src="https://www.youtube.com/embed/{{substr($episode->link,17)}}"
                                title="{{asset($episode->title)}}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>

                    <div style="padding: 10px;" class="mt-2 pt-2 border-top">


{{--
                        <a class="btn btn-primary me-2" href="{{url('/event_episode/'.$episode->id)}}" target="_blank" role="button">Like <i class="fas fa-thumbs-up"></i></a>
--}}
                        <a class="btn btn-danger me-2" href="{{url('/event_episode/'.$episode->id)}}" role="button">Vote <i class="fas fa-vote-yea" aria-hidden="true"></i></a>
                        <a class="btn btn-success me-2" href="{{url('/event_episode/'.$episode->id)}}" role="button">Details  <i  class="fas fa-eye" aria-hidden="true"></i></a>



                    </div>
                </div>

            @endforeach
        </div>
    </div>


@stop
