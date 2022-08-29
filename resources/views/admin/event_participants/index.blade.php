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
                    <h4 class="mb-3 mb-md-0">Event Participants</h4>

                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">

                    <a style="" href="{{url('/admin/events/'.$event->id)}}"
                       class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="corner-up-left"></i>
                        Back
                    </a>


                    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#add_participant">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        Add Contestant
                    </button>


                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{$event->title}}</h6>
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
                            <hr/>
                            <form method="post" action="{{url('/admin/'.$event->id.'/contestant')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Add new Contestant </h6>

                                            <div class="row">

                                                <div class="col-md-6 mb-3">
                                                    <label for="colFormLabel" class="form-label">Full name</label>
                                                    <input name="name" type="text" class="form-control"
                                                           id="colFormLabel">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="colFormLabel" class="form-label">Contestant ID</label>
                                                    <input name="participant_id" type="text" class="form-control"
                                                           id="colFormLabel">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="colFormLabel" class="form-label">Profile</label>
                                                    <input type="file" name="image" class="form-control"
                                                           id="colFormLabel">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            <hr/>

                            <div class="row">
                                @if($event->event_participants)
                                    @foreach($event->event_participants as $event_participant)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                                <div class="d-flex align-items-center hover-pointer">
                                                    <img class="img-xs rounded-circle"
                                                         src="{{asset($event_participant->image)}}"
                                                         alt="">
                                                    <div class="ms-2">
                                                        <p>{{$event_participant->name}}</p>
                                                        <p class="tx-11 text-muted">{{$event_participant->participant_id}}</p>
                                                    </div>
                                                </div>
                                                <a href="{{url('/admin/'.$event_participant->id.'/contestant/edit')}}" class="btn btn-icon">
                                                   <i data-feather="edit" data-bs-toggle="tooltip" title="Connect"></i>
                                                </a>

                                                <a href="{{url('/admin/'.$event_participant->id.'/contestant/show')}}" class="btn btn-icon">
                                                    <i data-feather="trash" data-bs-toggle="tooltip" title="Connect"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

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

