@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" href="{{asset('backend/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/prismjs/themes/prism.css')}}">
@endpush

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="d-flex justify-content-between align-artists-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Artists</h4>

                </div>
                <div class="d-flex align-artists-center flex-wrap text-nowrap">

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
                            <h3 class="text-center mb-3 mt-4">Artists</h3>

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
                                    @foreach($artists as $artist)

                                        <div class="col-md-3">
                                            <div class="card">
                                                <img style="width: 100%;" src="{{asset($artist->image)}}"
                                                     class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$artist->name}}</h5>
                                                    <p class="card-text">{{$artist->bio}}</p>
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
                        <form method="post" enctype="multipart/form-data" action="{{url('/admin/artists')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Add new </h6>

                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Artist name</label>
                                                <input name="name" type="text" class="form-control" id="colFormLabel">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Record Label</label>
                                                <input name="record" type="text" class="form-control"
                                                       id="colFormLabel">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">image</label>
                                                <input name="image" type="file" class="form-control"
                                                       id="colFormLabel">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Contact</label>
                                                <input name="contact" type="text" class="form-control"
                                                       id="colFormLabel">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="colFormLabel" class="form-label">Bio</label>
                                                <textarea name="bio" class="form-control"
                                                          id="colFormLabel"></textarea>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
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

