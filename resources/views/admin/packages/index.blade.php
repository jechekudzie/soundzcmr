@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" href="{{asset('backend/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/prismjs/themes/prism.css')}}">
@endpush

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="d-flex justify-content-between align-packages-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Plans Items</h4>

                </div>
                <div class="d-flex align-packages-center flex-wrap text-nowrap">

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
                            <h3 class="text-center mb-3 mt-4">Choose a plan</h3>
                            <p class="text-muted text-center mb-4 pb-2">Choose the features you need to enjoy
                                streaming on SOUNDZCmr. Easily upgrade as your needs grows.</p>
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
                                    @foreach($packages as $package)
                                        <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="text-center mt-3 mb-4">{{$package->name}}</h4>
                                                    <i data-feather="award"
                                                       class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                                    <h1 class="text-center">${{$package->price}}</h1>
                                                    <p class="text-muted text-center mb-4 fw-light">per
                                                        {{$package->duration}} month(s)</p>
                                                    <h5 class="text-primary text-center
                                                    mb-4">{{$package->duration_days}} days</h5>
                                                   {{-- <table class="mx-auto">
                                                        <tr>
                                                            <td><i data-feather="check"
                                                                   class="icon-md text-primary me-2"></i></td>
                                                            <td><p>Accounting dashboard</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i data-feather="check"
                                                                   class="icon-md text-primary me-2"></i></td>
                                                            <td><p>Invoicing</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i data-feather="check"
                                                                   class="icon-md text-primary me-2"></i></td>
                                                            <td><p>Online payments</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i data-feather="x"
                                                                   class="icon-md text-danger me-2"></i>
                                                            </td>
                                                            <td><p class="text-muted">Branded website</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i data-feather="x"
                                                                   class="icon-md text-danger me-2"></i>
                                                            </td>
                                                            <td><p class="text-muted">Dedicated account manager</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i data-feather="x"
                                                                   class="icon-md text-danger me-2"></i>
                                                            </td>
                                                            <td><p class="text-muted">Premium apps</p></td>
                                                        </tr>
                                                    </table>--}}
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary mt-4">Start {{$package->name}}

                                                        </button>
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
                        <form method="post" enctype="multipart/form-data" action="{{url('/admin/packages')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Add new </h6>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Name</label>
                                                <input name="name" type="text" class="form-control" id="colFormLabel">
                                            </div>


                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Price</label>
                                                <input name="price" type="number" step="any" class="form-control"
                                                       id="colFormLabel">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="colFormLabel" class="form-label">Duration in months</label>
                                                <input name="duration" type="number" class="form-control"
                                                       id="colFormLabel">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="list-group">
                                        @foreach($items as $item)
                                            <label class="list-group-item">
                                                <input class="form-check-input me-1" name="items[]" type="checkbox"
                                                       value="{{$item->id}}">
                                                {{$item->name}}
                                            </label>
                                        @endforeach

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


    <script src="{{asset('backend/vendors/prismjs/prism.js')}}"></script>
    <script src="{{asset('backend/vendors/clipboard/clipboard.min.js')}}"></script>

@endpush

