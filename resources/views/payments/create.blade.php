@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" href="{{asset('/backend/datatables.net-bs5/dataTables.bootstrap5.css')}}">
@endpush

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Payments</h4>
                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">

                    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        Add new
                    </button>
                    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                        button
                    </button>
                </div>
            </div>

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">HOME</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Payments</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Data Table</h6>
                            <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Plan</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th>Method</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>Plan</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th>Method</th>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- partial:../../partials/_footer.html -->
        <footer class="footer border-top">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between py-3 small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
            </div>
        </footer>
        <!-- partial -->

    </div>
@stop

@push('scripts')
    <script src="{{asset('/backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/backend/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('/backend/js/data-table.js')}}"></script>

@endpush

