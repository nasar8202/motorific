@extends('frontend.seller.layouts.app')
@section('title', 'Car Buying Sites')
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
                            <li> <a href="{{ route('dealer.newDashboard') }}" target="_blank">For Dealers</a>

                            </li>
                        @endguest
                    </ul>
                </div>
        </div>
            </div>
        </div>
    </header>

    <!-- SECTION-1 -->

    <section class="sec-1" id="vehicle_registration">
        <div class="container-1151">
            <div class="row">
                <div class="sec-1-txt col-lg-6">
                    <h2 class="fs-small"><h2>Sell your car 
                        with  <span>Motorific</span></h2></h2>
                        
                    <!--<p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>-->
                    <p>Motorific’s car value tracker uses live market data to offer you free car valuation. It also allows you to track ongoing value to sell at the time that produces maximum profits. </p>
                    <form class="millage_area" method="get" action="{{ route('photoUpload') }}">

                        <span class="text text-success mt-4 found">Enter Mileage <i class="fa-solid fa-check"></i></span>

                        <br>
                        <input type="number" name="millage" placeholder="Enter Millage" required>
                        <input type="hidden" name="registeration" class="registeration" value="">
                        <button type="submit">Continue</button>

                    </form>
                    <div class="check_area">

                        <input type="text" name="registeration" id="registeration" placeholder="Enter REG"
                            value="{{ old('registeration') }}">
                        <span class="text-danger show_error"></span>
                        <button type="button" id="check_registeration">Value My Car</button>
                    </div>
                    @if ($errors->has('millage'))
                        <span class="text-danger">{{ $errors->first('millage') }}</span>
                    @endif
                </div>
                <div class="sec-1-img col-lg-6">
                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-1-vector.png') }}" alt="">
                </div>
            </div>
            <ol class="tagLines value-car">
                <li><strong>Value:</strong>  Enter registration & mileage to get instant car valuation.  </li>
                <li><strong>Track:</strong>  Car prices are vulnerable to fluctuation & our tracker lets you know the exact price of your car via monthly alerts.</li>
                <li><strong>Sell:</strong>  Sell your car at a time that produces maximum profits.</li>
            </ol>
        </div>
    </section>
    <!--<section class="" id="vehicle_registration_details"></section>-->
    <!-- SECTION-2 -->

    <section class="sec-2">
        <div class="container-1151">
            <!--<div class="sec-2-txt pb-4">-->
            <!--    <h2>Just sold the <span>Motorific</span> way</h2>-->
            <!--    <p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>-->
            <!--</div>-->
            <!--<div class="row">-->

                
            <!--    <div class="col-lg-4 col-md-6">-->
            <!--        <div class="box">-->
            <!--            <h4>Sold by Sydney</h4>-->
            <!--            <div class="box-img">-->
            <!--                <img src="{{ URL::asset('frontend/seller/assets/image/box-1.png') }}" alt="">-->
            <!--            </div>-->
            <!--            <h5>Mercedes C180 KOMP Avantgarde...,</h5>-->
            <!--            <div class="d-flex justify-content-between">-->
            <!--                <p>Sold for £1,400</p>-->
            <!--                <h5>a day ago</h5>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->

                
            <!--    <div class="col-lg-4 col-md-6">-->
            <!--        <div class="box">-->
            <!--            <h4>Sold by Sydney</h4>-->
            <!--            <div class="box-img">-->
            <!--                <img src="{{ URL::asset('frontend/seller/assets/image/box-2.png') }}" alt="">-->
            <!--            </div>-->
            <!--            <h5>Mercedes C180 KOMP. Avantgarde…,</h5>-->
            <!--            <div class="d-flex justify-content-between">-->
            <!--                <p>Sold for £1,400</p>-->
            <!--                <h5>a day ago</h5>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->

                 
            <!--    <div class="col-lg-4 col-md-6 mx-auto">-->
            <!--        <div class="box">-->
            <!--            <h4>Sold by Sydney</h4>-->
            <!--            <div class="box-img">-->
            <!--                <img src="{{ URL::asset('frontend/seller/assets/image/box-3.png') }}" alt="">-->
            <!--            </div>-->
            <!--            <h5>Mercedes C180 KOMP. Avantgarde…,</h5>-->
            <!--            <div class="d-flex justify-content-between">-->
            <!--                <p>Sold for £1,400</p>-->
            <!--                <h5>a day ago</h5>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->

            <!--</div>-->

            
            <div class="row">
                <div class="col-12">
                    <div class="how-work">
                        <h3>How it works</h3>
                    </div>
                </div>
                <div class="howitwork-main col-lg-3 col-md-3">
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

                <div class="howitwork-main col-lg-3 col-md-3">
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

                <div class="howitwork-main col-lg-3 col-md-3">
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

                <div class="howitwork-main col-lg-3 col-md-3">
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
                <button ><a href="{{route('GetInTouchSellerForm')}}">GET IN TOUCH</a></button>
                
            </div>
        </div>
    </section>


    <!-- SECTION-3 -->

    <section class="sec-3 mt-4 mb-5">
        <div class="container-1151">
            <div class="row">
                <div class="sec-3-txt col-lg-6">
                    <h5 class="text-white fw-bold">Get Exact & Real Time Valuations Only On Motorific</h5>
                   <p>Motorific combines its live market data tool with sales statistics to provide a real-time and exact valuation of your car. It takes into car’s make, mileage, and model.</p>
                    <h5 class="text-white fw-bold mt-2">Value History</h5>
                    <p>The whole idea of creating a car value tracker is to help you decide on the best time to sell to get maximum value for your car. The all-new exciting feature lets you price trends across the whole year as well as visualize the rate of depreciation. </p>
                    <h5 class="text-white fw-bold mt-2">Monthly Car Value Alerts</h5>
                    <p>You get instant valuation but if you think now is not the right time to sell my car, you can get monthly car value alerts to pinpoint the best price.  </p>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </div>
    </section>

    <!-- SECTION-4 -->

    <!--<section class="sec-4">-->
    <!--    <div class="container-1151">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-6 my-auto">-->
    <!--                <div class="sec-4-txt ">-->
                        <!--<h4>This is the way.</h4>-->
                        <!--<h4>This is the</h4>-->
                        <!--<h4>motorific.</h4>-->
    <!--                    <h4>Your Car. Your Price - with Motorific</h4>-->
    <!--                    <p>Motorific brings transparency so that you get the highest bid for your car. With over 5000+ dealers eager to bid for your car, we ensure you sell your car for its authentic worth. </p>-->
    <!--                    <div class="sec-1-txt">-->
    <!--                        <a href="#vehicle_registration" style="text-decoration: none"><button>VALUE YOUR-->
    <!--                                CAR</button></a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-6 mx-auto">-->
    <!--                <div class="d-flex sec-6-box">-->
    <!--                    <div class="sec-4-box-sec-1">-->
    <!--                        <div class="sec-4-box mb-3">-->
    <!--                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img.png') }}" alt="">-->
    <!--                            <h4>Instant Valuation</h4>-->
    <!--                            <p>As soon as you enter registration number, our algorithms provide accurate car value using latest market data. </p>-->
    <!--                        </div>-->

    <!--                        <div class="sec-4-box">-->
    <!--                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img2.png') }}" alt="">-->
                                <!--<h4>Get your highest price</h4>-->
    <!--                            <h4>Pick the highest bidder</h4>-->
    <!--                            <p>With thousands of car dealers offering their prices, we only present you the highest bidders. </p>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="sec-4-box-sec-2">-->
    <!--                        <div class="sec-4-box mb-3">-->
    <!--                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img3.png') }}" alt="">-->
    <!--                            <h4>Free Home Collection</h4>-->
    <!--                            <p>Motorific lets you sale your car within 24 hours. Dealerships collect your car right from your doorstep and we transfer full payment promptly. </p>-->
    <!--                        </div>-->

    <!--                        <div class="sec-4-box">-->
    <!--                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img4.png') }}" alt="">-->
                                <!--<h4>Oh, and it’s 100% free</h4>-->
    <!--                            <h4>We Charge Nothing/Motorific Is Free</h4>-->
    <!--                            <p>When you sell your car through us, the dealers pay the fee - not you! This means you can enjoy a completely free selling experience.</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- SECTION-5 -->

    <section class="sec-5">
        <div class="container-1600">
            <div class="sec-5-txt">
                <div class="container-1151">
                    <h5>What factors can influence <br> your car value negatively?</h5>
                    <div class="fct-text">
                        <div class="fct-cont">
                            <p>
                              1)<strong> Age:</strong>  The 1st and the most important factor that influences your car’s value negatively is its age. Experts say that car prices plummet considerably three years after their registration. In the first year, the decrease in car value is more than in any other year. After that, car value does depreciate but at a slower pace.
                            </p>
                        </div>
                        <div class="fct-cont">
                            <p>
                              2)<strong> Mileage:</strong>  The higher the mileage, the less will be car’s value. Why? Because your car’s mileage reflects how much your car has gone through wear and tear over all these years. 
                            </p>
                        </div>
                        <div class="fct-cont">
                            <p>
                              3)<strong> Service History:</strong>  If your list your car for sale with incomplete or missing service records, it will negatively impact your car’s value. Why? Because significant gaps in service history will create doubts in dealers’ minds as they will presume the worst. All of this will only result in lower bids.  
                            </p>
                        </div>
                        <div class="fct-cont">
                            <p>
                              4)<strong> Market Demand:</strong>  While factors like mileage, age, and service history are in your hands, preferences like market demand aren’t. Factors like environmental regulations, economic conditions, or rise in eco-system for electric vehicles. Likewise, the release of upgraded versions of existing models, changes in tax regimes, and decrease in production due to external factors can influence the value of your car positively or negatively.  
                            </p>
                        </div>
                        <div class="fct-cont">
                            <p>
                              5)<strong> More than one owner:</strong>  Another factor that negatively impacts your car’s value is more than one owner. The more the owners, the less will be the cost. Why? Because the number of owners reflects the condition and age of your car.  
                            </p>
                        </div>
                        <div class="fct-cont">
                            <p>
                              6)<strong> Accident History:</strong>  Used cars with one owner since registration are generally preferred by professional buyers as they tend to hold more value compared to cars with multiple owners. The number of previous owners of a car can often indicate its age and overall condition.  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION-6 -->

    <section class="sec-6">
        <div class="container-1151">
            <div class="sec-6-heading">
                <!--<h5>Our happy customers</h5>-->
                <h5>Hear From Our Satisfied Customers</h5>
                <!--<p>Rated Excellent <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i-->
                <!--        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> by-->
                <!--    5,000+ Users</p>-->
                <p>Rated  <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> by 35000+ Customers </p>
            </div>
            <div class="sec-6-boxes d-flex">
                <div class="sec-6-main-box col-lg-4 col-md-6">
                    <p style="font-style:italic;">I was a little hesitant to sell my car online, but Motorific made the process incredibly easy and stress-free. Their platform connects car sellers with verified dealers, which gave me peace of mind knowing that I was dealing with reputable buyers. The whole process was seamless - I entered registration number and created my car and within hours, I had multiple offers from interested dealers. I was able to compare the offers and choose the one that worked best for me. The team at Motorific was also very helpful and responsive throughout the process, answering any questions I had and providing updates on the status of my listing. I highly recommend Motorific to anyone looking to sell their car - it's a great way to get a fair price without the hassle of dealing with private buyers.</p>
                    <div class="sec-6-box-pfp d-flex align-items-center">
                        <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp.png') }}" alt="">
                        <div>
                            <h5>Mark,Homestay</h5>
                            <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="sec-6-main-box col-lg-4 col-md-6">
                    <p style="font-style:italic;">From my experience, I can vouch that Motorific is the best way to sell used car! I tried selling my car through traditional methods and it turned out to be a big headache. But then a friend of mine recommended Motorific. As soon as I created profile, I was able to get multiple offers from verified dealers instantly. The whole process was seamless, prompt and hassle-free. What I appreciates the most about Motorific is the transparency of the platform, and the fact that I could compare offers and choose the one that worked best for me. Thanks to Motorific, I got the best value for my MG HS!</p>
                    <div class="sec-6-box-pfp d-flex align-items-center">
                        <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp2.png') }}" alt="">
                        <div>
                            <h5>Mark,Homestay</h5>
                            <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="sec-6-main-box col-lg-4 col-md-6 mx-auto">
                    <p style=""font-style: italic;">Sold my Peugeot e-208 through Motorific - it was easy, fast, and stress-free! I got a great price for my car and was able to complete the transaction quickly. Highly recommend Motorific for anyone looking to sell their car fastly!</p>
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

    <!-- SECTION-7 -->

    <section class="sec-7">
        <div class="sec-7-bg-img sec-1-txt">
            <div class="container-1151">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="sec-7-box">
                            <h4>What are you waiting for?</h4>
                            <p>Bid to traditional used car selling methods and join strong community of thousands happy customers!</p>
                            <form class="millage_area1" method="get" action="{{ route('photoUpload') }}">

                                <span class="text mt-4 found1" style="color: white">Enter Mileage <i class="fa-solid fa-check"></i></span>
        
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
                            <input class="mb-3" type="text" name="subscriber_email" placeholder="email" id="subscriber_email" >
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
                    console.log(response.registrationNumber);

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
