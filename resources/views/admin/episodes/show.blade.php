@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" href="{{asset('backend/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/prismjs/themes/prism.css')}}">
@endpush

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{$episode->event->title}} Episode: {{$episode->episode_number}}</h4>

                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">

                    <a style="" href="{{url('/admin/events/'.$episode->event->id)}}"
                       class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="corner-up-left"></i>
                        Back
                    </a>

                    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#edit">
                        <i class="btn-icon-prepend" data-feather="edit"></i>
                        Edit
                    </button>
                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#delete">
                        <i class="btn-icon-prepend" data-feather="delete"></i>
                        Delete
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Episode: {{$episode->episode_number}}</h6>
                            @if($errors->any())
                                @include('errors')
                            @endif
                            @if (session('message'))
                                <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                                    <strong>Message
                                        ! </strong> {{session('message')}}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card text-black bg-default">
                                <div class="card-header">
                                    SOUNDZCmr
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                        <div class="card rounded">
                                            <div class="card-body">
                                                <iframe style="width: 100%; height: 300px"
                                                        src="https://www.youtube.com/embed/{{substr($episode->link,17)}}"
                                                        title="{{asset($episode->title)}}" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen>

                                                </iframe>
                                            </div>
                                        </div>

                                    </div>
                                    <hr/>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="card rounded">
                                            <div class="card-body">
                                                <h6 class="card-title">Add Participant To This Episode</h6>
                                                <form method="post"
                                                      action="{{url('/admin/'.$episode->id.'/store_contestants')}}">
                                                    @csrf
                                                    @if($event_participants)
                                                        @foreach($event_participants as $event_participant)
                                                            <div
                                                                class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                                <div class="d-flex align-items-center hover-pointer">
                                                                    <img class="img-xs rounded-circle"
                                                                         src="{{asset($event_participant->image)}}"
                                                                         alt="">
                                                                    <div class="ms-2">
                                                                        <p>{{$event_participant->name}}</p>
                                                                        <p class="tx-11 text-muted">{{$event_participant->participant_id}}</p>
                                                                    </div>
                                                                </div>

                                                                <button class="btn btn-icon">
                                                                    <label class="d-block" for="chk-ani">
                                                                        <input name="event_participant_id[]"
                                                                               value="{{$event_participant->id}}"
                                                                               class="checkbox_animated" id="chk-ani"
                                                                               type="checkbox">
                                                                        Choose
                                                                    </label>
                                                                    <i data-feather="user-plus" data-bs-toggle="tooltip"
                                                                       title="Connect"></i>
                                                                </button>
                                                            </div>

                                                        @endforeach
                                                    @endif

                                                    <input type="hidden" name="episode_id" value="{{$episode->id}}">
                                                    <input class="btn btn-primary" type="submit" name="submit"
                                                           value="Add seletced participant">
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="card rounded">
                                            <div class="card-body">
                                                <h6 class="card-title">Votes</h6>
                                                <table id="dataTableExample" class="col-g-12 col-md-12 table">
                                                    <thead>
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <th>Participant ID</th>
                                                        <th>Votes</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($episode->episode_participants as $episode_participant)
                                                        <tr>
                                                            <td>{{$episode_participant->event_participant->name}}</td>
                                                            <td>{{$episode_participant->event_participant->participant_id}}</td>
                                                            <td>
                                                                <small class="opacity-50 text-nowrap">
                                                                    <span class="badge bg-primary rounded-pill">
                                                                        {{$vote_count = \App\Models\EpisodeParticipantVote::where('episode_id', $episode->id)->
                                                                                where('episode_participant_id', $episode_participant->id)->
                                                                                where('vote', 1)->count()}}
                                                                    </span>
                                                                </small>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>


                                {{--   <form method="post" action="{{url('/admin/'.$episode->id.'/store_contestants')}}">
                                       @csrf
                                       <div class="row">
                                           @if($event_participants)
                                               @foreach($event_participants as $event_participant)
                                                   <div style="padding-bottom: 10px" class="col-md-4">
                                                       <div class="card">
                                                           <label class="d-block" for="chk-ani">
                                                               <input name="event_participant_id[]"
                                                                      value="{{$event_participant->id}}"
                                                                      class="checkbox_animated" id="chk-ani"
                                                                      type="checkbox">
                                                               Choose {{$event_participant->name}}
                                                           </label>
                                                           <img src="{{asset($event_participant->image)}}"
                                                                class="card-img-top"
                                                                alt="...">
                                                           <div class="card-body">
                                                               <h5 class="card-title">{{$event_participant->name}}</h5>
                                                               <p class="card-text mb-3">Some quick example text to build
                                                                   on
                                                                   the
                                                                   card title and make up the bulk of the card's
                                                                   content.</p>
                                                               <a href="#"
                                                                  class="btn btn-primary">{{$event_participant->participant_id}}</a>
                                                           </div>
                                                       </div>
                                                   </div>
                                               @endforeach
                                           @endif
                                       </div>

                                       <input type="hidden" name="episode_id" value="{{$episode->id}}">
                                       <input class="btn btn-primary" type="submit" name="submit"
                                              value="Add seletced participant">
                                   </form>--}}


                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        @stop

        @push('scripts')
            <script src="{{asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
            <script src="{{asset('backend/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
            <script src="{{asset('backend/js/data-table.js')}}"></script>


            <script src="{{asset('backend/vendors/prismjs/prism.js')}}"></script>
            <script src="{{asset('backend/vendors/clipboard/clipboard.min.js')}}"></script>

    @endpush

