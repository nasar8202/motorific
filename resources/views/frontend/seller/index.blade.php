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

                                <a href="{{ route('dealer.newDashboard')  }}" target="_blank">For Dealers</a>


                                <a href="{{ route('sellMyCar') }}">Sell My Car</a>
                            </div>
                        </div>
                    @endguest
                </ul>
            </div>

            <div class="head-btns  justify-content-between">
                @guest
                   <a href="{{ route('myLogin') }}"> <button>Sign In</button></a>
                    @if (Route::has('register'))
                       <a href="{{ route('registration') }}"> <button>Sign Up</button></a>
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

    <section class="sec-1 seller-main-banner" id="vehicle_registration">
        <div class="container-1151">
            <div class="row banner-content">
                <div class="sec-1-txt col-md-6">
                    <h2>Sell your car 
                        with  <span>Motorific</span></h2>
                        
                    <!--<p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>-->
                    <p>Get the highest possible sale price for your vehicle with minimal effort. thousands verified dealers await to give you the best offer!</p>
                    <form class="millage_area" method="get" action="{{ route('photoUpload') }}">

                        <span class="text text-success mt-4 found">Enter Mileage <i class="fa-solid fa-check"></i></span>

                        <br>
                        <input type="number" name="millage" placeholder="Enter Millage" required>
                        <input type="hidden" name="registeration" class="registeration" value="">
                        <button type="submit">Continue</button>

                    </form>
                    <div class="check_area">

                        <input type="text" name="registeration" id="registeration" placeholder="Enter REG"
                            value="{{ old('registeration') }}" style="text-transform: uppercase">
                        <span class="text-danger show_error"></span>
                        <button type="button" id="check_registeration">Value Your Car</button>
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
    
    

    <section class="sec-2 how-sec">
        <div class="container-1151">
            <div class="row">
                <div class="col-12">
                    <div class="how-work">
                        <h3>How it works</h3>
                    </div>
                </div>
                <div class="howitwork-main col-lg-3 col-md-6">
                    <div class="step-nmbr">
                        <h5>1</h5>
                    </div>
                    <div class="how-work-img">
                        <img src="{{ URL::asset('frontend/seller/assets/image/car.png') }}" alt="">
                        <div class="line-sec-2">
                        </div>
                    </div>
                    <h4>Profile Your Car</h4>
                    <p>Discover your car's true value. Enter reg for an instant valuation. Create a car profile on mobile. maximise  profits.</p>
                </div>

                <div class="howitwork-main col-lg-3  col-md-6">
                    <div class="step-nmbr">
                        <h5>2</h5>
                    </div>
                    <div class="how-work-img d-flex align-items-center">
                        <img src="{{ URL::asset('frontend/seller/assets/image/megaphone.png') }}" alt="">
                        <div class="line-sec-2">
                        </div>
                    </div>
                    <h4>Motorific Alerts Dealers</h4>
                    <p>Our online sale invites over thousands car dealers across the UK to present their top bids for your car.</p>
                </div>

                <div class="howitwork-main col-lg-3  col-md-6">
                    <div class="step-nmbr">
                        <h5>3</h5>
                    </div>
                    <div class="how-work-img">
                        <img src="{{ URL::asset('frontend/seller/assets/image/price.png') }}" alt="">
                        <div class="line-sec-2">
                        </div>
                    </div>
                    <h4>Pick Highest Bid</h4>
                    <p>You pick the dealer who pays the most or makes the highest bid. </p>
                </div>

                <div class="howitwork-main col-lg-3  col-md-6">
                    <div class="step-nmbr">
                        <h5>4</h5>
                    </div>
                    <div class="how-work-img">
                        <img src="{{ URL::asset('frontend/seller/assets/image/sale.png') }}" alt="">
                    </div>
                    <h4>Free Home Collection</h4>
                    <p>Sell your car and receive full payment within 24 hours as we charge nothing. Welcome to the Motorific way!</p>
                </div>
            </div>
            <div class="sec-2-btns text-center">
                <a href="#vehicle_registration"><button>VALUE YOUR CAR</button></a>
                <button class="green-btn"><a href="{{route('GetInTouchSellerForm')}}">GET IN TOUCH</a></button>
                
            </div>
        </div>
    </section>


    <!-- SECTION-3 -->

    <section class="sec-3 mt-4 mb-5 who-sec">
        <div class="container-1151">
            <div class="row">
                <div class="who-content">
                        <div class="sec-3-txt col-lg-6">
                        <h4>Who We Are</h4>
                        <!--<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut-->
                        <!--    labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</h6>-->
                        <p>We are Motorific - a team of car enthusiasts. We are on a mission to revolutionize the whole car sale process. Motorific offers you the UK’s biggest platform where you can sell your car from the comfort of your home. We connect you with over thousands verified dealers nationwide and present you with the highest bid for your car.</p>
                        <p>The winning dealer will even collect your car for free, and you get paid within 24 hours. The Motorific way of selling your car is quick, reliable, easy, and completely online. On top of it, the platform is 100% free.</p>
                        <a href="#vehicle_registration"><button class="mx-0">VALUE YOUR CAR</button></a>
                        <button><a href="{{route('GetInTouchSellerForm')}}" style="text-decoration: none;background-color:#e3e3f0;color:#7977a2">GET IN TOUCH</a></button>
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
                        <h4>Your Car. Your Price - with Motorific</h4>
                        <p>With over thousands dealers eager to purchase your car, Motorific ensure you get for your car.</p>
                        <div class="sec-1-txt">
                            <a href="#vehicle_registration" style="text-decoration: none"><button>VALUE YOUR
                                    CAR</button></a>
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
                    <h5>Why Sell Your <br> Used Car With Motorofic? </h5>
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

    <section class="sec-6 testi-sec">
    <div class="container-1151">
        <div class="sec-6-heading">
            <h5>Hear From Our Satisfied Customers</h5>
            <p>Rated <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> by our Customers </p>
        </div>
        <div class="row testiSlider ">
            <div class="sec-6-main-box col-lg-4 col-md-6">
                <p style="font-style:italic;">I was a little hesitant to sell my car online, but Motorific made the
                    process incredibly easy and stress-free. Their platform connects car sellers with verified dealers,
                    which gave me peace of mind knowing that I was dealing with reputable buyers. The whole process was
                    seamless - I entered registration number and created my car and within hours, I had multiple offers
                    from interested dealers. I was able to compare the offers and choose the one that worked best for
                    me. The team at Motorific was also very helpful and responsive throughout the process, answering any
                    questions I had and providing updates on the status of my listing. I highly recommend Motorific to
                    anyone looking to sell their car - it's a great way to get a fair price without the hassle of
                    dealing with private buyers.</p>
                <div class="sec-6-box-pfp d-flex align-items-center">
                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp.png') }}" alt="">
                    <div>
                        <h5>Mark,Homestay</h5>
                        <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="sec-6-main-box col-lg-4 col-md-6">
                <p style="font-style:italic;">From my experience, I can vouch that Motorific is the best way to sell
                    used car! I tried selling my car through traditional methods and it turned out to be a big headache.
                    But then a friend of mine recommended Motorific. As soon as I created profile, I was able to get
                    multiple offers from verified dealers instantly. The whole process was seamless, prompt and
                    hassle-free. What I appreciates the most about Motorific is the transparency of the platform, and
                    the fact that I could compare offers and choose the one that worked best for me. Thanks to
                    Motorific, I got the best value for my MG HS!</p>
                <div class="sec-6-box-pfp d-flex align-items-center">
                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp2.png') }}" alt="">
                    <div>
                        <h5>Mark,Homestay</h5>
                        <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="sec-6-main-box col-lg-4 col-md-6">
                 <p style="font-style:italic;">Sold my Peugeot e-208 through Motorific - it was easy, fast, and
                    stress-free! I got a great price for my car and was able to complete the transaction quickly. Highly
                    recommend Motorific for anyone looking to sell their car fastly!</p>
                <div class="sec-6-box-pfp d-flex align-items-center">
                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp3.png') }}" alt="">
                        <div>
                            <h5>Mark,Homestay</h5>
                            <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">
                        </div>
                </div>
            </div>
            
         </div>
    </div>
</section>



    <section class="sec-7">
    <div class="sec-7-bg-img sec-1-txt">
        <div class="container-1151">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="sec-7-box">
                        <h4>What are you waiting for?</h4>
                        <p>Bid to traditional used car selling methods and join strong community of thousands happy
                            customers!</p>
                        <form class="millage_area1" method="get" action="{{ route('photoUpload') }}">

                            <span class="text mt-4 found1" style="color: white">Enter Mileage <i
                                    class="fa-solid fa-check"></i></span>

                            <br>
                            <input type="number" name="millage" placeholder="Enter Millage" required>
                            <input type="hidden" name="registeration" class="registeration1" value="">
                            <button type="submit">Continue</button>

                        </form>
                        <div class="check_area1">

                            <input type="text" name="registeration1" id="registeration1" placeholder="Enter REG"
                                value="{{ old('registeration') }}">
                            <span class="text-danger show_error1"></span>
                            <button type="button" id="check_registeration1">Value Your Car</button>
                        </div>
                        @if ($errors->has('millage'))
                        <span class="text-danger">{{ $errors->first('millage') }}</span>
                        @endif


                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="sec-7-box">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and stay on top of industry news. </p>
                        <input class="mb-3" type="text" placeholder="email" name="subscriber_email"
                            id="subscriber_email">
                        <button onclick="addSubscriber()">SUBSCRIBE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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

        $('.millage_area1').hide();
        $('.show_error1').hide();
        // $('.found').hide();
        $("#check_registeration1").on("click",function(e){
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
                    }
                    
                    else {
                        $('.show_error1').show();
                        $('.show_error1').text('Record Not Found')



                    }
                }
        });
    });
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


