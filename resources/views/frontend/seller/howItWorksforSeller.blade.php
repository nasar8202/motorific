@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
@section('headerClass','')
@section('headerUlClass','')
@section('logoMain','frontend/seller/assets/image/logo.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4')
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
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
padding: 12px 16px;
z-index: 1;
}
.head-btns a {
    text-decoration: none;
}
.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<header class="header-light">
    <div class="container-1600 d-flex justify-content-between pt-4" >
        <div class="logo-navlinks d-flex align-items-center">
            <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo.png') }}" alt=""></a>
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
                {{-- <a href="#">
                    <li>Help</li>
                </a> --}}

                @auth

                @endauth

                @guest
                <div class="dropdown">
                    <span>More</span>
                    <div class="dropdown-content">

                    <a href="{{ route('dealer.newDashboard') }}" target="_blank">For Dealers</a>

                    </div>
                </div>
                @endguest
            </ul>
        </div>

        <div class="head-btns  justify-content-between">
            @guest
           <button class="btn-prim"><a href="{{ route('myLogin') }}">  Sign In</a></button>
            @if (Route::has('register'))
            <button class="btn-prim"><a href="{{ route('registration') }}"> Sign Up</a></button>
            @endif
            @else
                    @if(Auth::check())
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    
                    
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('acceptedVehicles')}}">My Account</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        
                        
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        
                    </div>
                    @endif

            @endguest

            <button class="btn-prim"><a href="{{ url("/get-in-touch") }}">Contact Us</a></button>
            <!--<button onclick="window.location='{{ url("/get-in-touch") }}'">Contact Us</button>-->
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
                    {{-- <li>
                        <a href="#">Help</a>
                    </li> --}}
                        <li>
                            <a onclick="window.location='{{ url("/get-in-touch") }}'">Contact Us</a>
                        </li>
                    @guest
                    <li><a href="{{ route('myLogin') }}">Sign In</a></li>
                    
                        <li><a href="{{ route('registration') }}">Sign Up</a></li>
                        @endguest
                    @if(Auth::check())
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
                @endif
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

<section class="sec-1 seller-main-banner banner-sec hwWork" id="vehicle_registration">
    <div class="container-1151">
        <div class="row banner-content">
            <div class="sec-1-txt col-md-6">
                
                <h2 class="banner-title mw-100"> Drive Away With A Great Deal - Sell Your Car With Motorific</h2>
                
                <p class="banner-desc">thousands verified dealers bid to give you the best price for your car. </p>
                {{-- <h2>Sell your car
                    with <span>Motorific</span></h2>
                <p class="banner-desc">Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p> --}}
                <form class="millage_area" method="get" action="{{ route('photoUpload') }}">

                    <span class="text text-success mt-4 found">Enter Mileage <i class="fa-solid fa-check"></i></span>

                    <br>
                    <input type="number" name="millage" placeholder="Enter Millage" required>
                    <input type="hidden" name="registeration" class="registeration" value="">
                    <button type="submit"class="btn-prim"><span>Continue</span></button>

                </form>
                <div class="check_area">

                    <input type="text" name="registeration" id="registeration" placeholder="Enter REG"
                        value="{{ old('registeration') }}" style="text-transform: uppercase">
                    <span class="text-danger show_error"></span>
                    <button type="button" id="check_registeration" class="btn-prim"><a href="javascript:void(0);">Value Your Car</a></button>
                </div>
                @if ($errors->has('millage'))
                    <span class="text-danger">{{ $errors->first('millage') }}</span>
                @endif
            </div>
            <div class="sec-1-img col-md-6">
                <img src="{{ URL::asset('frontend/seller/assets/image/sec-1-vector.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!-- SECTION-2 -->
<section class="how-work hts-sec">
    <div class="container-1151">
        <h2 class="sec-heading">How To Sell My Car With Motorific </h2>
        <div class="overview-sections">
            <div class="overview-section">
                <div class="overview-section__icon">
                    <svg class="inline-icon inline-icon--medium inline-icon__outline inline-icon__outline--black"
                        viewBox="0 0 24 24">
                        <path
                            d="M20 10L19.1977 2.77914C19.0851 1.76627 18.229 1 17.2099 1H6.79009C5.77099 1 4.91486 1.76627 4.80232 2.77914L4 10M20 10H4M20 10L21 11L21.4142 11.4142C21.7893 11.7893 22 12.298 22 12.8284V19H2V12.8284C2 12.298 2.21071 11.7893 2.58579 11.4142L4 10M21 19V23H17V19M7 19V23H3V19H7Z"
                            vector-effect="non-scaling-stroke"></path>
                        <path d="M6 14H8" vector-effect="non-scaling-stroke"></path>
                        <path d="M16 14H18" vector-effect="non-scaling-stroke"></path>

                    </svg>


                </div>
                <h3 class="overview-section__heading">
                    1.
                    Profile Your Car:

                </h3>
                <p class="overview-section__content">
                    You enter a registration number to get instant car valuation. You make an awesome car profile through
                    your mobile.
                </p>
            </div>
            <div class="overview-section">
                <div class="overview-section__icon">
                    <svg class="inline-icon inline-icon--medium inline-icon__outline inline-icon__outline--black"
                        viewBox="0 0 24 24">
                        <path d="M14 11L17 14" vector-effect="non-scaling-stroke"></path>
                        <path d="M11 14L14 17" vector-effect="non-scaling-stroke"></path>
                        <path
                            d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10ZM8 10V23M14 23L23 14L11 2H2V11L14 23Z"
                            vector-effect="non-scaling-stroke"></path>

                    </svg>


                </div>
                <h3 class="overview-section__heading">
                    2.
                    thousands Verified Dealers Make Offers:

                </h3>
                <p class="overview-section__content">
                    thousands verified dealers make attractive offers on your listing. We connect you with the one offering
                    the highest price.
                </p>
            </div>
            <div class="overview-section">
                <div class="overview-section__icon">
                    <svg class="inline-icon inline-icon--medium inline-icon__outline inline-icon__outline--black"
                        viewBox="0 0 24 24">
                        <path
                            d="M6 6V5C6 3.3 7.3 2 9 2H15C16.7 2 18 3.3 18 5V6M13.5 16H2V6H23V16H20M20 16C20 19.9 16.9 23 13 23C9.1 23 6 19.9 6 16M20 16V9C18.3 9 17 10.3 17 12V14C14.8 14 13 15.8 13 18"
                            vector-effect="non-scaling-stroke"></path>
                        <path
                            d="M11 13C12.1046 13 13 12.1046 13 11C13 9.89543 12.1046 9 11 9C9.89543 9 9 9.89543 9 11C9 12.1046 9.89543 13 11 13Z"
                            vector-effect="non-scaling-stroke"></path>

                    </svg>


                </div>
                <h3 class="overview-section__heading">
                    3.
                    You Get Paid in Full:

                </h3>
                <p class="overview-section__content">
                    You approve the offer. The dealer collects your car for free and you get paid in full within 24 hours.
                </p>
            </div>

        </div>
    </div>
</section>
        @include('frontend.seller.partials.how-work')

<!-- SECTION-3 -->
<section class="car-selling__benefits car-benefit">
    <div class="container-1151">

        <div class="how-work">
            <h2 class="sec-heading">Why Sell Your Used Car With Motorific?</h2>
        </div>
        <ul class="list-icon car-selling__benefits-list">
            <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                <h4 class="car-selling__benefits-list-item-title">
                    Get The Highest Price For Your Car
                </h4>
                <p class="car-selling__benefits-list-item-desc">
                    Here at Motorific, thousands of verified dealers bid against your listings and we connect you only
                    with the one offering the highest price.
                </p>
            </li>
            <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                <h4 class="car-selling__benefits-list-item-title">
                    Get Paid In Full
                </h4>
                <p class="car-selling__benefits-list-item-desc">
                    Motorific lets you keep the full price of the car. We do not charge a fee to car owners.
                </p>
            </li>
            <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                <h4 class="car-selling__benefits-list-item-title">
                    Get Paid Within 24 Hours
                </h4>
                <p class="car-selling__benefits-list-item-desc">
                    93% of car owners have received payments on the same day.
                </p>
            </li>
            <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                <h4 class="car-selling__benefits-list-item-title">
                    thousands verified dealers
                </h4>
                <p class="car-selling__benefits-list-item-desc">
                    Motorific is accompanied by thousands dealers. You don’t need to spend time hunting for the best
                    prices.
                </p>
            </li>
            <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                <h4 class="car-selling__benefits-list-item-title">
                    Cars on Finance Accepted
                </h4>
                <p class="car-selling__benefits-list-item-desc">
                    Motorific can assist you in selling your car even if it has outstanding finance to pay off.
                </p>
            </li>
            <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                <h4 class="car-selling__benefits-list-item-title">
                    Instant Car Valuation
                </h4>
                <p class="car-selling__benefits-list-item-desc">
                    You enter a car registration number and we offer instant valuation using live market data
                    technology.
                </p>
            </li>
            <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                <h4 class="car-selling__benefits-list-item-title">
                    Free Collection
                </h4>
                <p class="car-selling__benefits-list-item-desc">
                    Once you accept an offer from a dealer, he picks your car from your home for free.
                </p>
            </li>
            <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                <h4 class="car-selling__benefits-list-item-title">
                    One-Stop-Shop For Buying & Selling Cars
                </h4>
                <p class="car-selling__benefits-list-item-desc">
                    We are your one stop shop for selling your used cars. Over hundreds of car owners make listing here
                    daily hassle free.
                </p>
            </li>
        </ul>
    </div>
</section>
<section class="car-ft-sec">
    <div class="container-1151">
        <div class="car-selling__benefits">
    
            <div class="how-work">
                <h2 class="sec-heading"> Free, Trusted, & Efficient Way To Sell Your Used Car Online </h2>
            </div>
            <ul class="list-icon car-selling__benefits-list">
                <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                    <h4 class="car-selling__benefits-list-item-title">
                        Free:
                    </h4>
                    <p class="car-selling__benefits-list-item-desc">
                        We charge nothing to car owners. You list your car & get paid in full.
                    </p>
                    <p class="car-selling__benefits-list-item-desc">
                        we get our finders fees from dealers.
                    </p>
                </li>
    
                <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                    <h4 class="car-selling__benefits-list-item-title">
                        Convenient:
                    </h4>
                    <p class="car-selling__benefits-list-item-desc">
                        Being home to thousands verified dealers, it’s never more easy to sell your car online.
                    </p>
                </li>
                <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
                    <h4 class="car-selling__benefits-list-item-title">
                        Trusted:
                    </h4>
                    <p class="car-selling__benefits-list-item-desc">
                        Over hundreds people have sold their used cars with Motorific. We enjoy 4.5+ star ratings on
                        TrustPilot & GoogleReview
                    </p>
                </li>
            </ul>
        </div>
    </div>
</section>
    

@endsection
@push('child-scripts')
<script type="text/javascript">
$('.millage_area').hide();
        $('.show_error').hide();

 $("#check_registeration").on("click", function(e) {
            var registeration = $("#registeration").val();
            e.preventDefault(); // prevent the form submission

            $.ajax({
                type: "post",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('testlocation') }}',
                data: {
                    registeration,
                    registeration
                },

                success: function(response) {
                    console.log(response.registrationNumber);

                    if (response && !response.errors) {
                        $('.show_error').hide();
                        $('.check_area').hide();
                        $('.millage_area').show();
                        $('.found').show();
                        $('.registeration').val(registeration);
                    }
                    
                    else {
                        $('.show_error').show();
                        $('.show_error').text('Record Not Found')



                    }
                }

            });
        });
</script>
@endpush
