@extends('frontend.seller.layouts.app')
@section('title', 'Seller Profile')
@section('section')
@section('headerClass','header-career transparent-header')
@section('headerUlClass','navlinks-w')
@section('logoMain','frontend/seller/assets/image/logo-w.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between')
{{-- @section('headerClass','')
@section('headerUlClass','navlinks')
@section('logoMain','frontend/seller/assets/image/logo.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4') --}}
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        div#first {
            display: flex;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    {{-- <header>
        <div class="container-1600 d-flex justify-content-between pt-4">
            <div class="logo-navlinks d-flex align-items-center">
                <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}"
                        alt=""></a>
                <ul class="navlinks mb-0 align-items-center">
                    <a href="{{ route('sellMyCar') }}">
                        <li>Sell My Car</li>
                    </a>
                    <a href="#">
                        <li>How It Works</li>
                    </a>
                    <a href="{{ route('howItWorksforSeller') }}">
                        <li>How It Works</li>
                    </a>
                    <a href="{{ route('reviews') }}">
                        <li>Reviews</li>
                    </a>

                    @auth

                    @endauth

                    @guest
                        <div class="dropdown">
                            <span>More</span>
                            <div class="dropdown-content">

                                <a href="{{ route('dealer.newDashboard') }}" target="_blank">For Dealers</a>


                                <a href="{{ route('sellMyCar') }}">Sell My Car</a>
                            </div>
                        </div>
                    @endguest
                </ul>
            </div>

            <div class="head-btns  justify-content-between">
                @guest
                <div class="dropdown">
                    <span>More</span>
                    <div class="dropdown-content">

                    <a href="{{ route('dealer.newDashboard') }}" target="_blank">For Dealers</a>


                   <a href="{{ route('sellMyCar') }}">Sell My Car</a>
                    </div>
                </div>
                @endguest
            </ul>
        </div>

        <div class="head-btns  justify-content-between">
            @guest
            <button><a href="{{ route('myLogin') }}">Sign In</a></button>
            @if (Route::has('register'))
            <button><a href="{{ route('registration') }}">Sign Up</a></button>
            @endif
            @else

                    <a style="color: black" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">My Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>



                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>

                @endguest

                <button onclick="window.location='{{ url("/get-in-touch") }}'">Contact Us</button>
            </div>
            <div class="menu">
                <div class="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="navi">
                    <ul>
                        <li class="logoMob">
                            <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}"
                            alt=""></a>
                        </li>
                        <li><a href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                        <li>
                            <a href="{{ route('howItWorksforSeller') }}">How It Works</a>
                        </li>
                        <li>
                            <a href="{{ route('reviews') }}">Reviews</a>
                        </li>
                       
                            <li>
                            <a onclick="window.location='{{ url("/get-in-touch") }}'">Contact Us</a>
                        </li>
                        <button id="navbarDropdown" class="nav-link dropdown-toggle userPro-btn" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </button>


                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('acceptedVehicles') }}">My Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                        @guest
                            <li> <a href="{{ route('dealer.newDashboard') }}" target="_blank">For Dealers</a>
                            </li>
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </div>
    </header> --}}

    <!-- SECTION-1 -->
    <section class="sec-2 productPageTn">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3 productsFiltersCol">
                    <div class="productsFilters">
                        @include('frontend.seller.partials.myAccountSidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">

                    <div class="row">
                        <h4>Your Account Details</h4>
                        <br>
                        <form method="POST" action="{{ route('updateMyProfile', $currentUser->id) }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Full Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $currentUser->name }}" placeholder="Full Name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Post Code</label>
                                <input type="number" name="post_code" class="form-control"
                                    value="{{ $currentUser->post_code }}" placeholder="7500,7200,etc">
                                @if ($errors->has('post_code'))
                                    <span class="text-danger">{{ $errors->first('post_code') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Phone Number</label>
                                <input type="number" name="phone_number" class="form-control"
                                    value="{{ $currentUser->phone_number }}" placeholder="+44 01548544">
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Email address </label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $currentUser->email }}" id="inputCity" placeholder="abc@gmail.com">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>


                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <!-- BOX-1 -->

                    </div>
                    <br>
                    <div class="row">
                        <h4>Update Your Password</h4>
                        <br>
                        <form method="POST" action="{{ route('updateMyPassword', $currentUser->id) }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Current Password *</label>
                                    <input type="text" name="current_pass" class="form-control"
                                        placeholder="Enter Your Old Password">
                                    @if ($errors->has('current_pass'))
                                        <span class="text-danger">{{ $errors->first('current_pass') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputAddress">New Password *</label>
                                <input type="text" name="new_pass" class="form-control"
                                    placeholder="Enter New Password">
                                @if ($errors->has('new_pass'))
                                    <span class="text-danger">{{ $errors->first('new_pass') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Confirm New Password *</label>
                                <input type="text" name="confirm_pass" class="form-control"
                                    placeholder="Confirm New Password">
                                @if ($errors->has('confirm_pass'))
                                    <span class="text-danger">{{ $errors->first('confirm_pass') }}</span>
                                @endif
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <!-- BOX-1 -->

                    </div>

                </div>
            </div>
        </div>
    </section>





@endsection
@push('child-scripts')
    <script type="text/javascript">
        $("#myform").on("submit", function(e) {
            e.preventDefault(); // prevent the form submission

            $.ajax({
                type: "post",
                dataType: 'JSON',
                url: '{{ route('users') }}',
                data: $('#myform').serialize(), // serialize all form inputs
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    if (response.success == 'success') {
                        $("#vehicle_registration_details").html(
                            '<div class="container-1151"><div class="row"><div class="sec-1-txt col-lg-6"><h2>' +
                            response.users.name + ' <span>Motorific</span></h2><p>' + response.users
                            .email +
                            '</p><form id="myForm">@csrf Confirm mileage<input type="text" id="id" name="vehicle_registration_no" value="111" placeholder="Enter REG"><button id="submitid" type="submit" >Continue</button></form></div><div class="sec-1-img col-lg-6"><img src="{{ URL::asset('frontend/seller/assets/image/sec-1-vector.png') }}" alt=""></div><div id="title"></div></div></div>'
                            );
                        $("#vehicle_registration").hide();
                        window.history.pushState({
                            "html": "abcdefg"
                        }, "", "mileage");
                    } else {
                        console.log("some thing wrong")
                    }
                },
                error: function(data) {
                    console.log(data)
                }
            });
        });
    </script>
@endpush
