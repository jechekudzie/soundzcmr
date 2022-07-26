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
                    <h4 class="mb-3 mb-md-0">Users</h4>

                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">

                    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#create_service">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        Add new
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">SOUNDZCmr</h6>
                            <div class="table-responsive">
                                <!-- Session Status -->
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
                                <table id="dataTableExample" class="col-g-12 col-md-12 table">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>User role</th>
                                        <th>Phone number</th>
                                        <th>Address</th>
                                        <th>Subscriptions and Payments</th>
                                        <th>Registration</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>@if($user->roles()){{$user->getRoleNames()->first()}}@endif</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>
                                                Subscriptions @if($user->subscriptions)
                                                    ({{$user->subscriptions->count()}})@endif
                                            </td>
                                            <td>{{$user->provider}}</td>

                                            <td>
                                                <a href="{{url('admin/users/'.$user->id.'/edit')}}">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{url('admin/users/'.$user->id)}}">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                            <h5 class="modal-title" id="exampleModalCenterTitle">Users</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="btn-close"></button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="{{url('/admin/users')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Add new </h6>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">Name</label>
                                            <input name="name" type="text" class="form-control" value="{{old('name')}}" id="colFormLabel">
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" value="{{old('email')}}" id="colFormLabel">
                                        </div>

                                        <div class=" col-md-6 mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">
                                                Role</label>
                                            <select name="user_role" class="form-select"
                                                    id="exampleFormControlSelect1">
                                                <option selected disabled>Select User Role</option>

                                                    @foreach($roles as $role)
                                                        <option
                                                            value="{{$role->name}}">{{$role->name}}</option>
                                                    @endforeach

                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control"  id="colFormLabel">
                                        </div>

                                        <div class="mb-3">
                                            <label for="colFormLabel" class="form-label">Confirm Password</label>
                                            <input name="password_confirmation" type="password" class="form-control" id="colFormLabel">
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


    <script src="{{asset('backend/vendors/prismjs/prism.js')}}"></script>
    <script src="{{asset('backend/vendors/clipboard/clipboard.min.js')}}"></script>

@endpush

