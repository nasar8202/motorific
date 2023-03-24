@extends('frontend.seller.layouts.app')
@section('title', 'Sell your car the with Motorific')
@section('section')

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
    <header>
        <div class="container-1600 d-flex justify-content-between pt-4">
            <div class="logo-navlinks d-flex align-items-center">
                <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}"
                        alt=""></a>
                <ul class="navlinks mb-0 align-items-center">
                    <a href="{{ route('sellMyCar') }}">
                        <li>Sell My Car</li>
                    </a>
                    <a href="{{ route('howItWorksforSeller') }}">
                        <li>How It Works</li>
                    </a>
                    <a href="{{ route('reviews') }}">
                        <li>Reviews</li>
                    </a>
                    <a href="#">
                        <li>Help</li>
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
                    <button><a href="{{ route('myLogin') }}">Sign In</a></button>
                    @if (Route::has('register'))
                        <button><a href="{{ route('registration') }}">Sign Up</a></button>
                    @endif
                @else
                    <a style="color: black" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                            <a href="#">Help</a>
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
    </header>

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
                        {{-- <h4>Your Vehicles</h4> --}}
                        <br>
                        <div class="col-lg-12 col-md-12">
                            {{-- <div class="form-group">
                            <label for="usr">Search Purchases Vehcle:</label>
                            <input type="text" placeholder="Search in Complete" class="form-control" id="usr">
                            <br>
                        </div> --}}
                            <br>
                            {{-- <div class="row">
                                @forelse ($allVehicles as $allVehicle)
                                    <div class="col-sm-4 vec-box p-0"><img
                                            src="{{ asset('/vehicles/vehicles_images/' . $allVehicle->VehicleImage->front) }}"
                                            width="300px" height="200px"></div>
                                    <div class="col-sm-8 vec-box p-0">
                                        <h1 style="font-size: 20px">
                                            <span>{{ $allVehicle->vehicle_registartion_number }}</span></h1>
                                        <p>{{ $allVehicle->vehicle_name }}</p>
                                        <div class=" justify-content-between align-items-center d-flex">
                                            <span>Price: {{ $allVehicle->vehicle_price }}</span>
                                            <span
                                                style="padding-left: 60px;">{{ $allVehicle->created_at->format('m/d/Y') }}</span>
                                            @if ($allVehicle->all_auction == null)
                                                <a href="{{ route('bidsOnVehicles', $allVehicle->id) }}"
                                                    class="btn btn-primary ">Bids On My Vehicle</span></a>
                                            @else
                                                <a href="{{ route('ordersOnVehicles', $allVehicle->id) }}"
                                                    class="btn btn-primary ">Orders On My Vehicle</span></a>
                                            @endif
                                            @if ($allVehicle->status == 0)
                                                <span class="alert alert-danger ">Not Accepeted</span>
                                            @elseif($allVehicle->status == 2)
                                                <span class="alert alert-success ">Deactivated</span>
                                            @else
                                                <span class="alert alert-success ">Accepeted</span>
                                            @endif
                                        </div>
                                        {{-- <a href="{{route('marksAsSoldVehicles',$allVehicle->id)}}" class="badge badge-success "> Mark As Sold ?
                           </a> --}}
                                    {{-- </div> --}}

                                {{-- @empty --}}
                                    {{-- <div class="col-sm-12">No Purchases Vehicle Found!</div> --}}
                                {{-- @endforelse --}}

                            {{-- </div> --}} 
                        </div>
                        <!-- BOX-1 -->

                    </div>
                    <div class="vpLists">
                        <h4>Your Vehicles</h4>
                        @forelse ($allVehicles as $allVehicle)
                        <div class="row g-0 vp-box">
                            <div class="col-sm-4">
                                <div class="vp-img">
                                    <img src="{{ asset('/vehicles/vehicles_images/' . $allVehicle->VehicleImage->front) }}"
>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="vp-content">
                                    <h3 class="vp-code">{{ $allVehicle->vehicle_registartion_number }}</h3>
                                    <h4 class="vp-code">{{ $allVehicle->vehicle_name }}</h3>
                                    <div class="vp-spec-box">
                                        <p><strong> Price:</strong> £{{ $allVehicle->vehicle_price }}</p>
                                        <p> <strong>Date:</strong> {{ $allVehicle->created_at->format('m/d/Y') }}</p>
                                    </div>
                                    <div class="vp-btns">
                                        @if ($allVehicle->all_auction == null)
                                        <a href="{{ route('bidsOnVehicles', $allVehicle->id) }}">Bids On My Vehicle</a>
                                        @else
                                        <a href="{{ route('ordersOnVehicles', $allVehicle->id) }}">Orders On My Vehicle</a>
                                        @endif
                                        @if ($allVehicle->status == 0)
                                        <a href="javascript:void(0)" class="accepted">Pending</a>
                                        @elseif($allVehicle->status == 2)
                                        <a href="javascript:void(0)" class="accepted">Deactivated</a>
                                        @else
                                        <a href="javascript:void(0)" class="accepted">Accepted</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-sm-12">No Purchases Vehicle Found!</div>
                    @endforelse
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
