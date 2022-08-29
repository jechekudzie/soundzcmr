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
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
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
                                        {{-- <button class="btn btn-primary">Follow</button>--}}
                                        <a href="{{url('/select_plan')}}" class="btn btn-outline-success">Subscribe or
                                            upgrade</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>message! </strong> {{ Session::get('message')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name </h6>
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
                                    @if($user->nationality) {{$user->nationality->code}} @endif{{$user->phone_number}}
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Country</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <p>
                                        @if($user->nationality) {{$user->nationality->name}} @endif
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->address}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">Edit Profile
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
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
                                    <th>Receipt</th>
                                    <th>Active</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->subscriptions as $subscription)
                                    <tr>
                                        <td>{{$subscription->package->name}}</td>
                                        <td> {{number_format($subscription->amount_paid,2)}}</td>
                                        <td> {{$subscription->payment_type}}</td>
                                        <td>{{$subscription->reference}}</td>
                                        <td>{{$subscription->status}}</td>
                                        <td>@if($subscription->status == 'succeeded')
                                                <a href="{{$subscription->flutterwave_reference}}" target="_blank">Receipt</a>
                                            @else
                                                {{$subscriptions->flutterwave_reference}}
                                            @endif
                                        </td>
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
    <!-- Vertically centered modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{url('/profile/update/'.$user->id)}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control"
                                           id="recipient-name">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="text" name="email" disabled value="{{$user->email}}"
                                           class="form-control"
                                           id="recipient-name">
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Country:</label>
                                    <select class="form-select" name="nationality_id"
                                            aria-label="Default select example">
                                        <option value="">Select</option>
                                        @foreach($countries as $country)
                                            <option
                                                value="{{$country->id}}" @if($country->id == $user->nationality_id){{'selected'}}@endif>{{$country->name}}
                                                ({{$country->code}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Mobile Number:</label>
                                    <input type="text" name="phone_number" value="{{$user->phone_number}}"
                                           class="form-control"
                                           id="recipient-name">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Physical Address:</label>
                                <textarea class="form-control" name="physical_address"
                                          id="message-text">{{$user->address}}</textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  <!-- Vertically centered scrollable modal -->


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
