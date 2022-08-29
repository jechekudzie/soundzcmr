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
                    <h4 class="mb-3 mb-md-0">Event Episodes</h4>

                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">

                    <a style="" href="{{url('/admin/events')}}"
                       class="btn btn-primary btn-icon-text me-2 mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="corner-up-left"></i>
                        Back
                    </a>

                    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#edit">
                        <i class="btn-icon-prepend" data-feather="edit"></i>
                        Edit
                    </button>

                    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#add_eppisode">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        Add Episode
                    </button>

                    <a href="{{url('/admin/'.$event->id.'/contestant')}}"
                       class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        Add Contestant
                    </a>

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
                            <div class="card text-black bg-default">
                                <div class="card-header">
                                    SOUNDZCmr
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$event->title}}</h5>
                                    <p class="card-text">{!! $event->description!!}</p>
                                </div>
                            </div>
                            <hr/>

                            <div class="row">

                                @if($event->episodes)
                                    @foreach($event->episodes as $episode)
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="card rounded">
                                                <div class="card-header">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-2">
                                                                <p style="font-weight: bold;font-size: 20px;">
                                                                    Episode: {{$episode->episode_number}}</p>
                                                                <p class="tx-11 text-muted">{{date('d F M',strtotime($event->date))}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <iframe style="width: 100%; height: 300px"
                                                            src="https://www.youtube.com/embed/{{substr($episode->link,17)}}"
                                                            title="{{asset($episode->title)}}" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="d-flex post-actions">
                                                        {{-- <a href="javascript:;"
                                                            class="d-flex align-items-center text-muted me-4">
                                                             <i class="icon-md" data-feather="message-square"></i>
                                                             <p class="d-none d-md-block ms-2">Comment</p>
                                                         </a>--}}
                                                        <a href="{{url('/admin/'.$episode->id.'/contestants')}}"
                                                           class="d-flex align-items-center text-muted">
                                                            <i class="icon-md" data-feather="users"></i>
                                                            <p class="d-none d-md-block ms-2">Episode Participants</p>
                                                        </a>

                                                        <a style="margin: 10px;" href="{{url('/admin/'.$episode->id.'/episode/edit')}}"
                                                           class="d-flex align-items-center text-muted">
                                                            <i class="icon-md" data-feather="edit"></i>
                                                            <p class="d-none d-md-block ms-2"> Edit</p>

                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="add_eppisode" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add episode</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="btn-close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data"
                              action="{{url('/admin/'.$event->id.'/episodes')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Add new </h6>

                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Episode number</label>
                                                <input name="episode_number" type="number" step="any"
                                                       class="form-control" id="colFormLabel">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Youtube Url</label>
                                                <input name="link" type="text" class="form-control" id="colFormLabel">
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

            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$event->title}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="btn-close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="{{url('/admin/events/'.$event->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Edit {{$event->title}}</h6>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">title</label>
                                            <input name="title" type="text" value="{{$event->title}}"
                                                   class="form-control" id="colFormLabel">
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label"> location</label>
                                            <input name="location" type="text" value="{{$event->location}}"
                                                   class="form-control" id="colFormLabel">
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">date</label>
                                            <input name="date" type="text" value="{{$event->date}}"
                                                   class="form-control" id="datepicker">
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">Description</label>
                                            <textarea name="description" class="form-control"
                                                      id="editor">{!! $event->description !!}</textarea>
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

            <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$event->title}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="btn-close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data"
                              action="{{url('/admin/events/'.$event->id)  }}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Delete {{$event->title}} ? </h6>

                                        <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container"
                                             class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1"
                                             role="dialog" aria-live="assertive" aria-modal="true"
                                             style="display: grid;">

                                            <img class="swal2-image" style="display: none;">
                                            <h2 class="swal2-title" id="swal2-title" style="display: block;">Are you
                                                sure you want to delete the item?</h2>
                                            <div class="swal2-html-container" id="swal2-html-container"
                                                 style="display: block;">You won't be able to revert this!
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Yes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

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

