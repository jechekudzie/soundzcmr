@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" href="{{asset('backend/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/prismjs/themes/prism.css')}}">
@endpush

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="d-flex justify-content-between align-events-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Events</h4>

                </div>
                <div class="d-flex align-events-center flex-wrap text-nowrap">

                    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#create_service">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        Add new
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center mb-3 mt-4">Events</h3>

                            <div class="container">
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
                                <div class="row">
                                    @foreach($events as $event)
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="card rounded">
                                                <div class="card-header">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-2">
                                                                <p style="font-weight: bold;font-size: 20px;">{{$event->title}}</p>
                                                                <p class="tx-11 text-muted">{{date('d F M',strtotime($event->date))}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button class="btn p-0" type="button"
                                                                    id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">Episodes:
                                                                <i class="icon-lg pb-3px"
                                                                   data-feather="more-horizontal"></i>
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                 aria-labelledby="dropdownMenuButton2">
                                                                @if($event->episodes)
                                                                    @foreach($event->episodes as $episode)
                                                                        <a class="dropdown-item d-flex align-items-center"
                                                                           href="{{url('/admin/'.$episode->id.'/contestants')}}"><i
                                                                                data-feather="meh"
                                                                                class="icon-sm me-2"></i>
                                                                            <span
                                                                                class="">Episode: {{$episode->episode_number}}</span></a>
                                                                    @endforeach
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">

                                                    @if($event->episodes)
                                                        <iframe style="width: 100%; height: 300px"
                                                                src="https://www.youtube.com/embed/{{substr($event->episodes->first()->link,17)}}"
                                                                title="{{asset($episode->title)}}" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen>

                                                        </iframe>
                                                    @endif

                                                </div>
                                                <p class="mb-3 tx-14">{!! substr($event->description,0,50) !!}
                                                    ...</p>
                                                <div class="card-footer">
                                                    <div class="d-flex post-actions">
                                                        <a href="javascript:;"
                                                           class="d-flex align-items-center text-muted me-4">
                                                            <i class="icon-md" data-feather="heart"></i>
                                                            <p class="d-none d-md-block ms-2">Like</p>
                                                        </a>
                                                        <a href="javascript:;"
                                                           class="d-flex align-items-center text-muted me-4">
                                                            <i class="icon-md" data-feather="message-square"></i>
                                                            <p class="d-none d-md-block ms-2">Comment</p>
                                                        </a>
                                                        <a href="{{url('/admin/events/'.$event->id)}}"
                                                           class="d-flex align-items-center text-muted">
                                                            <i class="icon-md" data-feather="eye"></i>
                                                            <p class="d-none d-md-block ms-2">View</p>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="create_service" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Subscription plans</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="btn-close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="{{url('/admin/events')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Add new </h6>

                                        <div class="row">
                                            <div class=" col-md-6 mb-3">
                                                <label for="exampleFormControlSelect1" class="form-label">Event
                                                    type</label>
                                                <select name="event_type_id" class="form-select"
                                                        id="exampleFormControlSelect1">
                                                    <option selected disabled>Select event type</option>
                                                    @if($event_types)
                                                        @foreach($event_types as $event_type)
                                                            <option
                                                                value="{{$event_type->id}}">{{$event_type->name}}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                            <div class=" col-md-6 mb-3">
                                                <label for="exampleFormControlSelect1" class="form-label">
                                                    Ticketing Type</label>
                                                <select name="ticket_type_id" class="form-select"
                                                        id="exampleFormControlSelect1">
                                                    <option selected disabled>Select event type</option>
                                                    @if($ticket_types)
                                                        @foreach($ticket_types as $ticket_type)
                                                            <option
                                                                value="{{$ticket_type->id}}">{{$ticket_type->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Event title</label>
                                                <input name="title" type="text" class="form-control" id="colFormLabel">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Date</label>
                                                <input name="date" type="text" class="form-control"
                                                       id="datepicker">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Location</label>
                                                <input name="location" type="text" class="form-control"
                                                       id="colFormLabel">
                                            </div>


                                            <div class="col-md-12 mb-3">
                                                <label for="colFormLabel" class="form-label">Event Description</label>
                                                <textarea name="description" class="form-control"
                                                          id="editor" rows="20"></textarea>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>

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

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script src="{{asset('backend/vendors/prismjs/prism.js')}}"></script>
    <script src="{{asset('backend/vendors/clipboard/clipboard.min.js')}}"></script>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>

@endpush

