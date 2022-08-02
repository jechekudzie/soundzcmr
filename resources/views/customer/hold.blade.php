@extends('layouts.site')
@push('head')

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@section('content')

    <main>
        <div class="container my-5">
            <nav
                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Choose Plan</li>
                </ol>
            </nav>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                            type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                            type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane"
                            type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>
                        Disabled
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                     tabindex="0">...
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                     tabindex="0">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Plan</th>
                            <th>Condition</th>
                            <th>Paid</th>
                            <th>Payment Method</th>
                            <th>Reference</th>
                            <th>Payment Status</th>
                            <th>Active</th>
                        </thead>
                        <tbody>
                        @foreach($user->subscriptions as $subscription)
                            <tr>
                                <td>{{$subscription->package->name}}</td>
                                <td>
                                    @if($subscription->has_ads == 0)
                                        {{'Right to all content except paid premiums'}}
                                    @else
                                        {{'Ads and Limited content'}}

                                    @endif
                                </td>
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
                        <tfoot>
                        <th>Plan</a></th>
                        <th>Condition</a></th>
                        <th>Paid</a></th>
                        <th>Payment Method</a></th>
                        <th>Reference</a></th>
                        <th>Payment Status</a></th>
                        <th>Active</a></th>
                        </tfoot>
                        </tbody>

                    </table>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                     tabindex="0">...
                </div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
                     tabindex="0">...
                </div>
            </div>
        </div>
    </main>

@stop

@push('scripts')

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
