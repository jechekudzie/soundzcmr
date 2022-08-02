@extends('layouts.site')

@section('content')
    <main style="margin-top: -100px">
        <div class="container my-5">
            <div class="px-4 pt-5 my-5 text-center border-bottom">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/events/'.$episode->event->id)}}">{{$episode->event->title}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Episode {{$episode->episode_number}}</li>
                    </ol>
                </nav>
                <h1 class="display- fw-bold">Episode: {{$episode->episode_number}}</h1>
                <div class="col-lg-6 mx-auto">
                </div>
                <div class="overflow-hidden" style="max-height: 70vh;">
                    <div class="container px-5">
                        <iframe style="width:100%;height: 400px;" class="bd-placeholder-img"  aria-hidden="true"
                                preserveAspectRatio="xMidYMid slice" focusable="false"
                                src="https://www.youtube.com/embed/{{substr($episode->link,17)}}"
                                title="{{asset($episode->title)}}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        @livewire('vote', ['episode' => $episode])
    </main>
@stop
