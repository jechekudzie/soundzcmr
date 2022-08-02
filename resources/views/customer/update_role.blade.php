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
                    <li class="breadcrumb-item active" aria-current="page">User Role</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <div class="container col-xl-10 col-xxl-8 px-4 py-5">
                <div class="row align-items-center g-lg-5 py-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-4 fw-bold lh-1 mb-3">SOUNDZcmr</h1>
                        <p style="font-size: 10px;" class="col-lg-10 fs-4">
                            Hi, {{$user->name}}, Welcome To SoundzCmr

                            Your World Of Music awaits!

                            We’re so glad you’re here! You are now part of a growing community of africans creating, collaborating, and connecting across the globe via soundzcmr.
                            Whether you’ve joined to as an artist or just to listen to Africa' leading music , we’ve got something for you.
                            Let’s go!</p>
                    </div>
                    <div class="col-md-10 mx-auto col-lg-6">
                        <form method="post" action="{{url('/store_role')}}"
                              class="p-4 p-md-5 border rounded-3 bg-light">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput"
                                       value="{{$user->email}}">
                                <label for="floatingInput">Email address</label>
                            </div>
                            @foreach($roles as $role)
                                <div class="checkbox mb-3">
                                    <label>
                                        <input type="radio" name="user_role" value="{{$role->name}}"> {{$role->name}}
                                    </label>
                                </div>
                            @endforeach
                            <button class="w-100 btn btn-lg btn-primary btn-sm" type="submit">Update Account Type</button>
                            <hr class="my-4">
                            <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                        </form>
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
