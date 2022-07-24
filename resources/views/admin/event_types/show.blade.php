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
                    <h4 class="mb-3 mb-md-0">Event Type</h4>

                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">

                    <a style="" href="{{url('/admin/event_types')}}"
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
                            <h6 class="card-title">{{$event_type->name}}</h6>
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
                                    <h5 class="card-title">{{$event_type->name}}</h5>
                                    <p class="card-text">{{$event_type->description}}</p>
                                </div>
                            </div>
                            <hr/>


                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$event_type->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="btn-close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="{{url('/admin/event_types/'
                        .$event_type->id)
                        }}">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Edit {{$event_type->name}}</h6>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">service name</label>
                                            <input name="name" type="text" value="{{$event_type->name}}"
                                                   class="form-control" id="colFormLabel">
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">Description</label>
                                            <textarea name="description" class="form-control"
                                                      id="colFormLabel">{{$event_type->description}}</textarea>
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
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$event_type->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="btn-close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="{{url('/admin/event_types/' .$event_type->id)}}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Delete {{$event_type->name}} ? </h6>

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

@endpush

