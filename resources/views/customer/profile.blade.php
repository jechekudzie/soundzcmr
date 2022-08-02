@extends('layouts.site')
@push('head')
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@section('content')

    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                     class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{$user->name}}</h4>
                                    <p class="text-secondary mb-1">{{$user->email}}</p>
                                    <p class="text-muted font-size-sm">@if($user->roles()){{$user->roles->first()->name}}@endif
                                    <p>
                                        <button class="btn btn-primary">Follow</button>
                                        <a href="{{url('/select_plan')}}" class="btn btn-outline-primary">Subscribe or
                                            upgrade</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->email}}
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Registration type</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->provider}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->phone_number}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank"
                                       href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Plan</th>
                                    <th>Paid</th>
                                    <th>Payment Method</th>
                                    <th>Reference</th>
                                    <th>Payment Status</th>
                                    <th>Active</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->subscriptions as $subscription)
                                    <tr>
                                        <td>{{$subscription->package->name}}</td>
                                        <td> {{$subscription->amount_paid}}</td>
                                        <td> {{$subscription->payment_type}}</td>
                                        <td>{{$subscription->reference}}</td>
                                        <td>{{$subscription->status}}</td>
                                        <td>@if($subscription->is_active == 0)
                                                {{'Expired'}}
                                            @else
                                                {{'Active'}}
                                            @endif
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
    </div>
@stop

@push('scripts')


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
