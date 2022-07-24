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
                    <h4 class="mb-3 mb-md-0">SERVICES</h4>

                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">

                    <a style="" href="{{url('/admin/services')}}"
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
                            <h6 class="card-title">{{$service->name}}</h6>
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
                                    iTAP Media
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$service->name}}</h5>
                                    <p class="card-text">{{$service->description}}</p>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <h5>Cover Image</h5>
                                    <hr/>
                                    <div class="card">
                                        <img width="500" src="{{asset($service->cover_image)}}"
                                             class="img-fluid"
                                             alt="...">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <h5>Banner Image</h5>
                                    <hr/>
                                    <div class="card">
                                        <img width="500" src="{{asset($service->cover_image)}}"
                                             class="img-fluid" alt="...">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <h5>{{$service->name}}</h5>
                                    <hr/>
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    #1 Categories
                                                    <span class="badge bg-danger rounded-pill">
                                                            {{$service->service_categories->count()}}
                                                    </span>
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>This is the first item's accordion body.</strong> It is
                                                    shown by default, until the collapse plugin adds the appropriate
                                                    classes that we use to style each element. These classes control the
                                                    overall appearance, as well as the showing and hiding via CSS
                                                    transitions. You can modify any of this with custom CSS or
                                                    overriding our default variables. It's also worth noting that just
                                                    about any HTML can go within the <code>.accordion-body</code>,
                                                    though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                    #2 Essentials <span class="badge bg-danger rounded-pill">
                                                        {{$service->service_essentials->count()}}</span>
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                 aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>This is the second item's accordion body.</strong> It is
                                                    hidden by default, until the collapse plugin adds the appropriate
                                                    classes that we use to style each element. These classes control the
                                                    overall appearance, as well as the showing and hiding via CSS
                                                    transitions. You can modify any of this with custom CSS or
                                                    overriding our default variables. It's also worth noting that just
                                                    about any HTML can go within the <code>.accordion-body</code>,
                                                    though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                    #3 Accessories <span class="badge bg-danger rounded-pill">
                                                        {{$service->service_accessories->count()}}</span>
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                 aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>This is the third item's accordion body.</strong> It is
                                                    hidden by default, until the collapse plugin adds the appropriate
                                                    classes that we use to style each element. These classes control the
                                                    overall appearance, as well as the showing and hiding via CSS
                                                    transitions. You can modify any of this with custom CSS or
                                                    overriding our default variables. It's also worth noting that just
                                                    about any HTML can go within the <code>.accordion-body</code>,
                                                    though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                    #4 Ecosystems <span class="badge bg-danger rounded-pill">
                                                        {{$service->service_ecosystems->count()}}</span>
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                 aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>This is the third item's accordion body.</strong> It is
                                                    hidden by default, until the collapse plugin adds the appropriate
                                                    classes that we use to style each element. These classes control the
                                                    overall appearance, as well as the showing and hiding via CSS
                                                    transitions. You can modify any of this with custom CSS or
                                                    overriding our default variables. It's also worth noting that just
                                                    about any HTML can go within the <code>.accordion-body</code>,
                                                    though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--<ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="">
                                                Categories ({{$service->service_categories->count()}})
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                Essentials ({{$service->service_essentials->count()}})
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                Accessories ({{$service->service_accessories->count()}})
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="">
                                                Ecosystems ({{$service->service_ecosystems->count()}})
                                            </a>
                                        </li>
                                    </ul>--}}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$service->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="btn-close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="{{url('/admin/services/'.$service->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Edit {{$service->name}}</h6>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">service name</label>
                                            <input name="name" type="text" value="{{$service->name}}"
                                                   class="form-control" id="colFormLabel">
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">cover image</label>
                                            <input name="cover_image" type="file" class="form-control"
                                                   id="colFormLabel">
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">cover image</label>
                                            <input name="banner_image" type="file" class="form-control"
                                                   id="colFormLabel">
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">Description</label>
                                            <textarea name="description" class="form-control"
                                                      id="colFormLabel">{{$service->description}}</textarea>
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
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$service->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="btn-close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="{{url('/admin/services/'.$service->id)}}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Delete {{$service->name}} ? </h6>

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

