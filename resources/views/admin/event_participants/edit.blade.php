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
                    <h4 class="mb-3 mb-md-0">Event participant {{$eventParticipant->name}}</h4>

                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">

                    <a style="" href="{{url('/admin/events/'.$eventParticipant->event->id)}}"
                       class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="corner-up-left"></i>
                        Back
                    </a>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{$eventParticipant->event->name}}</h6>
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
                                <div class="card-body">
                                    <h5 class="card-title">{{$eventParticipant->event->name}}</h5>
                                    <p class="card-text">{{ $eventParticipant->participant_id}}</p>
                                </div>
                            </div>
                            <hr/>

                            <div class="row">
                                <form method="post" enctype="multipart/form-data" action="{{url('/admin/'.$eventParticipant->id.'/contestant/update')}}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">Edit {{ $eventParticipant->participant_id}}</h6>
                                                <div class="row">

                                                    <div class="col-md-6 mb-3">
                                                        <label for="colFormLabel" class="form-label">Full name</label>
                                                        <input name="name" value="{{ $eventParticipant->name}}" type="text" class="form-control"
                                                               id="colFormLabel">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="colFormLabel" class="form-label">Contestant ID</label>
                                                        <input name="participant_id" value="{{ $eventParticipant->participant_id}}" type="text" class="form-control"
                                                               id="colFormLabel">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="colFormLabel" class="form-label">Upload New Profile</label>
                                                        <input type="file" name="image" class="form-control"
                                                               id="colFormLabel">
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


        </div>

    </div>

@stop

@push('scripts')
    <script src="{{asset('backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('backend/js/data-table.js')}}"></script>


    <script src="{{asset('backend/vendors/prismjs/prism.js')}}"></script>
    <script src="{{asset('backend/vendors/clipboard/clipboard.min.js')}}"></script>



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

