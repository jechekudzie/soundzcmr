@extends('layouts.website')

@section('content')

    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row row--grid">
                <!-- breadcrumb -->
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Profile</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->

                <!-- title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h1>Profile</h1>
                    </div>
                </div>
                <!-- end title -->
            </div>

            <div class="row row--grid">
                <div class="col-12">
                    @if (session('message'))
                        <div style="color: #FAB516;" class="alert alert-success alert-rounded col-md-6"><i
                                class="fa fa-check-circle"></i> {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="profile">
                        <div class="profile__user">
                            <div class="profile__avatar">
                                <img src="img/avatar.svg" alt="">
                            </div>
                            <div class="profile__meta">
                                <h3>{{$user->name}}</h3>
                                <span>User ID: 11104</span>
                            </div>
                        </div>

                        <!-- tabs nav -->
                        <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                   aria-controls="tab-1"
                                   aria-selected="true">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                                   aria-selected="false">Subscriptions</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
                                   aria-selected="false">Pricing plan</a>
                            </li>

                        </ul>
                        <!-- end tabs nav -->

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                              this.closest('form').submit();">
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <button class="profile__logout" type="button">
                                        <span>Sign out</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"/>
                                        </svg>
                                    </button>
                                @endif
                            </a>
                        </form>
                    </div>

                    <!-- content tabs -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                            <div class="row row--grid">
                                <div class="col-12 col-lg-6 col-xl-3">
                                    <div class="stats">
                                        <span>Current Plan : @if($current_plan == null) {{'No active subscription'}} <a
                                                href="{{url('/select_plan')}}"
                                                class="open-modal">Choose plan</a> @else{{$current_plan->package->name}} </span>
                                        <p><b>Price: {{$current_plan->package->price}}</b></p>
                                        <p><b>Expiry: {{date('Y-m-d', strtotime($current_plan->expiry_date))}}</b></p>
                                        @endif

                                    </div>
                                </div>

                            </div>

                            <div class="row row--grid">
                                <!-- details form -->
                                <div class="col-12 col-lg-6">
                                    <form action="#" class="sign__form sign__form--profile">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="sign__title">Profile details</h4>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="username">Name</label>
                                                    <input id="username" type="text" name="name"
                                                           value="{{$user->name}}" class="sign__input">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="email">Email</label>
                                                    <input id="email" type="text" name="email" value="{{$user->email}}"
                                                           class="sign__input"
                                                           placeholder="email@email.com">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="lastname">Phone Number</label>
                                                    <input id="lastname" type="text" name="phone_number"
                                                           value="{{$user->phone_number}}" class="sign__input"
                                                           placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="select">Choose Role</label>
                                                    <select name="role_id" id="select" class="sign__select">
                                                        <option value="0">Option</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button class="sign__btn" type="button">Save & update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end details form -->

                                <!-- password form -->
                                <div class="col-12 col-lg-6">
                                    <form action="#" class="sign__form sign__form--profile">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="sign__title">Change password</h4>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="oldpass">Old password</label>
                                                    <input id="oldpass" type="password" name="oldpass"
                                                           class="sign__input">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="newpass">New password</label>
                                                    <input id="newpass" type="password" name="newpass"
                                                           class="sign__input">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="confirmpass">Confirm new
                                                        password</label>
                                                    <input id="confirmpass" type="password" name="confirmpass"
                                                           class="sign__input">
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button class="sign__btn" type="button">Change</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end password form -->
                            </div>


                        </div>

                        <div class="tab-pane fade" id="tab-2" role="tabpanel">
                            <div class="row row--grid">
                                <div class="col-12">
                                    <div class="dashbox">
                                        <div class="dashbox__table-wrap">
                                            <div class="dashbox__table-scroll">
                                                <table class="main__table">
                                                    <thead>
                                                    <tr>

                                                        <th><a href="#">Plan</a></th>
                                                        <th><a href="#">Condition</a></th>
                                                        <th><a href="#">Price</a></th>
                                                        <th><a href="#">Currency</a></th>
                                                        <th><a href="#">Paid</a></th>
                                                        <th><a href="#">Payment Method</a></th>
                                                        <th><a href="#">Reference</a></th>
                                                        <th><a href="#">Payment Status</a></th>
                                                        <th><a href="#">Active</a></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($user->subscriptions as $subscription)
                                                        <tr>

                                                            <td>
                                                                <div class="main__table-text"><a href="#">{{$subscription->package->name}}</a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text main__table-text--price">
                                                                    @if($subscription->has_ads == 0)
                                                                        {{'Right to all content except paid premiums'}}
                                                                    @else
                                                                        {{'Ads and Limited content'}}

                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text main__table-text--price">
                                                                    {{$subscription->package_price}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text main__table-text--price">
                                                                    {{$subscription->currency}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text main__table-text--price">
                                                                    {{$subscription->amount_paid}}
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="main__table-text main__table-text--price">
                                                                    {{$subscription->payment_type}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text main__table-text--price">
                                                                    {{$subscription->reference}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="main__table-text">{{$subscription->status}}</div>
                                                            </td>

                                                            <td>
                                                                <div class="main__table-text main__table-text--price">
                                                                    @if($subscription->is_active == 0)
                                                                    {{'Expired'}}
                                                                    @else
                                                                        {{'Active'}}
                                                                    @endif
                                                                </div>
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

                        <div class="tab-pane fade" id="tab-3" role="tabpanel">
                            <div class="row row--grid">
                                @foreach($plans as $plan)
                                    <div class="col-12 col-md-6 col-lg-4 order-md-2 order-lg-1">
                                        <div class="plan plan--white">
                                            <h3 class="plan__title">{{$plan->name}}</h3>
                                            <span class="plan__price">${{$plan->price}}<span> /{{$plan->duration}} month(s)</span></span>

                                            <a href="{{url('/checkout/'.$plan->id)}}" class="plan__btn" type="button">Select
                                                plan</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        >
                    </div>
                    <!-- end content tabs -->
                </div>
            </div>
        </div>
    </main>
    <!-- end main content -->



@stop
