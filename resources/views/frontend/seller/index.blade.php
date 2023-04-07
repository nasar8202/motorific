@extends('frontend.seller.layouts.app')
@section('title', 'Sell your car  with the Motorific')
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

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .head-btns a {
    text-decoration: none;
}

@keyframes spin {
	from {
		transform: rotate(0deg);
	}
	to {
		transform: rotate(360deg);
	}
}

/* Spinner */
.spinner {
	--spinner-color: black;

	aspect-ratio: 1/1;
	border-radius: 50%;

	animation-name: spin;
	animation-iteration-count: infinite;
	animation-timing-function: linear;
}
.spinner--dotted {
	width: 28px;
	border: 5px dotted var(--spinner-color);

	animation-duration: 5s;
}
.spinner-container {
    margin: 0 0;
    margin-left: -60px;
    width: 100%;
    max-width: 100%;
    min-height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: -40px;
}
@media(max-width:767px){
    .spinner-container {
    margin: 0 0;
    margin-left: -5px;
    width: 100%;
    max-width: 100%;
    min-height: 30px;
    display: flex;
    justify-content: end;
    align-items: center;
    margin-top: -35px;
}
.spinner--dotted {
	width: 25px;
	border: 5px dotted var(--spinner-color);

	animation-duration: 5s;
}
}
    </style>
    <header class="header-light">
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
                    {{-- <a href="#">
                        <li>Help</li>
                    </a> --}}
                    @auth

                    @endauth

                    @guest
                        <div class="dropdown">
                            <span>More</span>
                            <div class="dropdown-content">

                                <a href="{{ route('dealer.newDashboard')  }}" target="_blank">For Dealers</a>

                            </div>
                        </div>
                    @endguest
                </ul>
            </div>

            <div class="head-btns  justify-content-between">
                @guest
                   <button><a href="{{ route('myLogin') }}"> Sign In</a></button>
                    @if (Route::has('register'))
                       <button><a href="{{ route('registration') }}"> Sign Up</a></button>
                    @endif
                @else
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


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

                @endguest

                <button><a href="{{ url("/get-in-touch") }}"> Contact Us</a></button>
                <!--<button onclick="window.location='{{ url("/get-in-touch") }}'">Contact Us</button>-->
            </div>
            <!--<div class="head-btns  justify-content-between">-->
            <!--    <button><a href="{{ route('myLogin') }}">Sign In</a></button>-->
            <!--    @if (Route::has('register'))-->
            <!--    <button><a href="{{ route('registration') }}">Sign Up</a></button>-->
            <!--    @endif-->
            <!--    <button><a href="{{ url("/get-in-touch") }}">Contact Us</a></button>-->
            <!--</div>-->
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
                            <li> <a href="{{ route('dealer.newDashboard')  }}" target="_blank">For Dealers</a>

                            </li>
                        @endguest
                    </ul>
                </div>
        </div>
            </div>
        </div>
    </header>
    
    

    <!-- SECTION-1 -->

    <section class="sec-1 seller-main-banner banner-sec seller-main" id="vehicle_registration">
        <div class="container-1151">
            <div class="row banner-content">
                <div class="sec-1-txt col-md-6">
                    <h2 class="banner-title">Sell your car with  <span>Motorific</span></h2>
                        
                    <!--<p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>-->
                    <p class=banner-desc>Get the highest possible sale price for your vehicle with minimal effort. thousands verified dealers await to give you the best offer!</p>
                    <form class="millage_area" method="get" action="{{ route('photoUpload') }}">

                        <span class="text text-success mt-4 found">Enter Mileage <i class="fa-solid fa-check"></i></span>

                        <br>
                        <input type="number" name="millage" placeholder="Enter Millage" required>
                        <input type="hidden" name="registeration" class="registeration" value="">
                        <button type="submit" class="btn-submit"><span>Continue</span></button>

                    </form>
                    <div class="check_area">

                        <input type="text" name="registeration" id="registeration" placeholder="Enter REG"
                            value="{{ old('registeration') }}" style="text-transform: uppercase" required>
                        <span class="text-danger show_error"></span>
                        <button type="button" id="check_registeration" class="btn-prim"><a href="javascript:void(0)">Value Your Car</a></button>
                        <div class="spinner-container">
                        <span class="spinner spinner--dotted sfirst"></span>
                        </div>
                    </div>
                    @if ($errors->has('millage'))
                        <span class="text-danger">{{ $errors->first('millage') }}</span>
                    @endif
                </div>
                <div class="sec-1-img col-md-6">
                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-1-vector.png') }}" alt="">
                </div>
            </div>
            <ol class="tagLines">
                <li>Get the best deals for your wheels with Motorific </li>
                <li>Unlock the true value of your car with Motorific</li>
                <li>Sell your car hassle-free and fast with Motorific</li>
                <li>maximise  your car's value with Motorific</li>
            </ol>
        </div>
    </section>
    
    <!--<section class="" id="vehicle_registration_details"></section>-->
    
    <!---->
    <!-- Career Modal Form -->
{{-- <div class="modal fade cookies-modal" id="cokies" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="cokies-content">
            <img src="{{ URL::asset('frontend/seller/assets/image/cooky.png') }}" alt="">
            
            <p>We use cookies to improve your website expereince</p>
            <div class="cookies-btn">
              <center>  <button type="button" data-bs-dismiss="modal" aria-label="Close">Accept All cookies</button>
              </center>
            </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

    <!---->
    <!-- SECTION-2 -->
    
    

    @include('frontend.seller.partials.how-work')


    <!-- SECTION-3 -->

    <section class="sec-3 mt-4 mb-5 who-sec">
        <div class="container-1151">
            <div class="row">
                <div class="who-content">
                        <div class="sec-3-txt col-lg-6 whoContent">
                        <h2 class="sec-heading text-white">Who We Are</h2>
                        <p>We are Motorific - a team of car enthusiasts. We are on a mission to revolutionize the whole car sale process. Motorific offers you the UK’s biggest platform where you can sell your car from the comfort of your home. We connect you with over thousands verified dealers nationwide and present you with the highest bid for your car.</p>
                        <p>The winning dealer will even collect your car for free, and you get paid within 24 hours. The Motorific way of selling your car is quick, reliable, easy, and completely online. On top of it, the platform is 100% free.</p>
                        
                        <div class="btns-wraper">
                            <button class="mx-0 btn-prim"><a href="#vehicle_registration">VALUE YOUR CAR</a></button>
                            <button class="btn-prim"><a href="{{route('GetInTouchSellerForm')}}">GET IN TOUCH</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </div>
    </section>

    <!-- SECTION-4 -->

    <section class="sec-4 ycp-sec">
        <div class="container-1151">
            <div class="row">
                <div class="col-lg-6 my-auto">
                    <div class="sec-4-txt ">
                        <!--<h4>This is the way.</h4>-->
                        <!--<h4>This is the</h4>-->
                        <!--<h4>motorific.</h4>-->
                        <h2 class="sec-heading">Your Car. Your Price - with Motorific</h2>
                        <p>With over thousands dealers eager to purchase your car, Motorific ensure you get for your car.</p>
                        <div class="sec-1-txt">
                            <button class="btn-prim"><a href="#vehicle_registration">VALUE YOUR
                                    CAR</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mx-auto">
                    <div class="d-flex sec-6-box">
                        <div class="sec-4-box-sec-1">
                            <div class="sec-4-box mb-3">
                                <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img.png') }}" alt="">
                                <h4>Instant Valuation</h4>
                                <p>As soon as you enter registration number, our algorithms provide accurate car value using latest market data. </p>
                            </div>

                            <div class="sec-4-box">
                                <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img2.png') }}" alt="">
                                <!--<h4>Get your highest price</h4>-->
                                <h4>Pick the highest bidder</h4>
                                <p>With thousands of car dealers offering their prices, we only present you the highest bidders. </p>
                            </div>
                        </div>

                        <div class="sec-4-box-sec-2">
                            <div class="sec-4-box mb-3">
                                <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img3.png') }}" alt="">
                                <h4>Free Home Collection</h4>
                                <p>With Motorific, you can sell your car in 24 hours. Your vehicle is picked up from your doorstep by a dealership, and they promptly transfer the full payment on the day.</p>
                            </div>

                            <div class="sec-4-box">
                                <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img4.png') }}" alt="">
                                <!--<h4>Oh, and it’s 100% free</h4>-->
                                <h4>We Charge Nothing/Motorific Is Free</h4>
                                <p>When you sell your car through us, the dealers pay the fee - not you! This means you can enjoy a completely free selling experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION-5 -->

    <section class="sec-5 wsy-sec">
        <div class="container-1600">
            <div class="sec-5-txt">
                <div class="container-1151">
                    <h2 class="sec-heading text-white">Why Sell Your <br> Used Car With Motorofic? </h2>
                    <div class="row sec-5-txt-sub">
                        <div class="col-lg-6 col-md-6">
                            <div class="sec-5-inner-txt mt-4">
                                <h4>Verified Dealers</h4>
                                <p>Motorific brings thousands of verified dealers on single platform from across the country. To ensure transparency, out team performs a stern scrutiny to ensure seamless user experience for all stakeholders.</p>
                            </div>

                            <div class="sec-5-inner-txt mt-4">
                                <h4>Simple & Straightforward Process</h4>
                                <p>The whole process of selling your used car is simple, transparent, and straightforward. You do the whole process through your phone. From creating car profile to receiving bids, you can get a sale agreed in as little as 24 hours.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="sec-5-inner-txt mt-4">
                                <h4>Free Collection</h4>
                                <p>Once you seal the deal with highest bidder, they will collect your car from your home, free of charge! From profiling to selling, you do the whole process from comfort of your home.</p>
                            </div>

                            <div class="sec-5-inner-txt mt-4">
                                <h4>Fast & Full Payments</h4>
                                <p>Motorific ensures that you receive payments promptly and fastly. You will receive full payment from the dealer as we charge you nothing!</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION-6 -->

    @include('frontend.seller.partials.testimonials')

<!--Subscribe Sec-->
@include('frontend.seller.partials.subscribe')
    
@endsection
@push('child-scripts')
    <script type="text/javascript">
        function addSubscriber() {
            var subscriber_email = $("#subscriber_email").val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//   return regex.test(email);
            if(subscriber_email == '' || subscriber_email == null){
                alert('email field is required')
                return false;
            }
            else if(regex.test(subscriber_email) == false)
            {
                alert('invalid email format');
                return false;
            }
            $.ajax({
                type:"post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('addSubscriberEmail') }}',
                data: {
                    subscriber_email,
                    subscriber_email
                },
                success: function(response) {
                    if(response == "exists"){
                        alert("This Email Already Subscribed!");
                    }else if(response == "inserted"){
                        window.location.href = "{{ route('subscribeEmail')}}";
                        //alert("Congrats You Have Subscribe Successfully!");
                    }
                },
                error:function(){
                    alert('error')
                }
            });
          }
        $('.millage_area').hide();
        $('.show_error').hide();
        $('.sfirst').hide();
        $('.sSecond').hide();

        $('.millage_area1').hide();
        $('.show_error1').hide();
        // $('.found').hide();
        $("#check_registeration1").on("click",function(e){
            $('.sSecond').show();
            var registeration = $("#registeration1").val();
       
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
                   

                    if (response && !response.errors) {
                        $('.show_error1').hide();
                        $('.check_area1').hide();
                        $('.millage_area1').show();
                        $('.found1').show();
                        $('.registeration1').val(registeration);
                        $('.sSecond').hide();
                    }
                    
                    else {
                        $('.show_error1').show();
                        $('.show_error1').text('Record Not Found')
                        $('.sSecond').hide();



                    }
                }
        });
    });
        $("#check_registeration").on("click", function(e) {
            $('.sfirst').show();
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
                        $('.sfirst').hide();
                    }
                    
                    else {
                        $('.show_error').show();
                        $('.show_error').text('Record Not Found')
                        $('.sfirst').hide();



                    }
                }

            });
        });
    </script>
@endpush


