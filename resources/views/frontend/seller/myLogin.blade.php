@extends('frontend.seller.layouts.app')
@section('title','Sell Login')
@section('section')
<style>
.dropdown > span{
    position: relative;
    display: inline-block;
    color:white;
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

.dropdown:hover .dropdown-content {
display: block;
}
    </style>
    <!-- HEADER -->
    <header>
        <div class="container-1600 d-flex justify-content-between pt-4">
            <div class="logo-navlinks d-flex align-items-center">
                <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo-w.png')}}" alt=""></a>
                <ul class="navlinks navlinks-w mb-0 align-items-center">
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
                <button><a href="{{ route('myLogin') }}">Sign In</a></button>
                @if (Route::has('register'))
                <button><a href="{{ route('registration') }}">Sign Up</a></button>
                @endif
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
                        @guest
                            <li> <a href="{{ route('dealer.newDashboard') }}" target="_blank">For Dealers</a>

                            </li>
                        @endguest

                    </div>
                        
                    </ul>
                </div>
            </div>
        </div>
    </header>
      <!-- PHOTO-UPLOAD-SECTION-1 -->
      <section class="photo-up-sec-1 reg-page-sec1">
        <div class="container-1151">
            <div class="d-flex">
                <div class="my-auto">
                {{-- <img src="{{ URL::asset('frontend/seller/assets/image/bmw.png')}}" alt=""> --}}
                </div>
                <div class="">
                <h3>Login</h3>
                {{-- <p>Volkswagen Golf R DSG</p> --}}
                </div>
            </div>
        </div>
    </section>

<!--Login Form Section-->


<div class="registration-form sellerForm">
    <div class="reg-form-heading">
        <h3>Login</h3>
        <p>It will take 60 seconds</p> 
    </div>

    <div class="container-700">
        <div class="form-main text-center ">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-inputs">

                    <input type="email" placeholder="E-mail Address" required name="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="password" placeholder="password" required name="password" class="@error('password') is-invalid @enderror" name="password" value="">
                    <input type="hidden" name="type" value="seller">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong> 
                        </span>
                    @enderror
                </div>

                <span class="new-user">If You Are New User. <a style="text-decoration: none;" href="{{route('registration')}}"> Register</a></span>
                
                <div class="mt-2">
                    <button>CONTINUE</button>
                </div>
            </form>
             
            <a class="forgott-link" href="{{route('forgotPassPage')}}">Forgot Your Password ?</a>
        </div>
    </div>
 </div>

{{-- <section class="userform-sec login">
    <div class="container-1151">
        <div class="form-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" placeholder="E-mail Address" required name="email" class="@error('email') is-invalid @enderror  form-control" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="password" required name="password" class="@error('password') is-invalid @enderror form-control" name="password" value="">
                    <input type="hidden" name="type" value="seller">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group form-btn">
                    <button>Continue</button>
                    <a href="{{route('forgotPassPage')}}">Forgot Your Password ?</a>
                </div>
            </form>
            <div class="formLink"><span>If You Are New User. <a style="text-decoration: none;" href="{{route('registration')}}"> Register</a></span></div>
            
        </div>
    </div>
</section> --}}
<!--Login Form Section End-->



    <!-- REGISTRATION-FORM -->
    <!--<div class="registration-form">-->
    <!--    <div class="reg-form-heading">-->
    <!--        <h3>Login</h3>-->
    <!--        {{-- <p>It will take 60 seconds</p> --}}-->
    <!--    </div>-->

    <!--    <div class="container-700">-->
    <!--        <div class="form-main text-center">-->
    <!--            <form method="POST" action="{{ route('login') }}">-->
    <!--                @csrf-->
    <!--                <div>-->

    <!--                    <input type="email" placeholder="E-mail Address" required name="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">-->
    <!--                    @error('email')-->
    <!--                        <span class="invalid-feedback" role="alert">-->
    <!--                            <strong>{{ $message }}</strong>-->
    <!--                        </span>-->
    <!--                    @enderror-->
    <!--                    <input type="password" placeholder="password" required name="password" class="@error('password') is-invalid @enderror" name="password" value="">-->
    <!--                    <input type="hidden" name="type" value="seller">-->
    <!--                    @error('password')-->
    <!--                        <span class="invalid-feedback" role="alert">-->
    <!--                            <strong>{{ $message }}</strong>-->
    <!--                        </span>-->
    <!--                    @enderror-->
    <!--                </div>-->

    <!--                <span>If You Are New User. <a style="text-decoration: none;" href="{{route('registration')}}"> Register</a></span>-->
    <!--                <br>-->
    <!--                <div class="mt-2">-->
    <!--                    <button>CONTINUE</button>-->
    <!--                </div>-->
    <!--            </form>-->
                
    <!--            <a style="text-decoration: none;" href="{{route('forgotPassPage')}}">Forgot Your Password ?</a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- SECTION-3 -->

    <!--<section class="sec-3 mt-4 mb-5">-->
    <!--    <div class="container-1151">-->
    <!--        <div class="row">-->
    <!--            <div class="sec-3-txt col-lg-6">-->
    <!--                <h4>Who We Are</h4>-->
                    <!--<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut-->
                    <!--    labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</h6>-->
    <!--                <p>We are Motorific - a team of car enthusiasts. We are on a mission to revolutionize the whole car sale process. Motorific offers you the UK’s biggest platform where you can sell your car from the comfort of your home. We connect you with over thousands verified dealers nationwide and present you with the highest bid for your car.</p>-->
    <!--                <p>The winning dealer will even collect your car for free, and you get paid within 24 hours. The Motorific way of selling your car is quick, reliable, easy, and completely online. On top of it, the platform is 100% free.</p>-->
    <!--                <a href="#vehicle_registration"><button>VALUE YOUR CAR</button></a>-->
    <!--                <button>GET IN TOUCH</button>-->
    <!--            </div>-->
    <!--            <div class="col-lg-6">-->

    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

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
    <!--                    <p>Motorific brings transparency so that you get the highest bid for your car. With over thousands dealers eager to bid for your car, we ensure you sell your car for its authentic worth. </p>-->
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

    <!--<section class="sec-5">-->
    <!--    <div class="container-1600">-->
    <!--        <div class="sec-5-txt">-->
    <!--            <div class="container-1151">-->
    <!--                <h5>Why Sell Your <br> Used Car With Motorofic? </h5>-->
    <!--                <div class="row sec-5-txt-sub">-->
    <!--                    <div class="col-lg-6 col-md-6">-->
    <!--                        <div class="sec-5-inner-txt mt-4">-->
    <!--                            <h4>Verified Dealers</h4>-->
    <!--                            <p>Motorific brings thousands of verified dealers on single platform from across the country. To ensure transparency, out team performs a stern scrutiny to ensure seamless user experience for all stakeholders.</p>-->
    <!--                        </div>-->

    <!--                        <div class="sec-5-inner-txt mt-4">-->
    <!--                            <h4>Simple & Straightforward Process</h4>-->
    <!--                            <p>The whole process of selling your used car is simple, transparent, and straightforward. You do the whole process through your phone. From creating car profile to receiving bids, you can get a sale agreed in as little as 24 hours.</p>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="col-lg-6 col-md-6">-->
    <!--                        <div class="sec-5-inner-txt mt-4">-->
    <!--                            <h4>Free Collection</h4>-->
    <!--                            <p>Once you seal the deal with highest bidder, they will collect your car from your home, free of charge! From profiling to selling, you do the whole process from comfort of your home.</p>-->
    <!--                        </div>-->

    <!--                        <div class="sec-5-inner-txt mt-4">-->
    <!--                            <h4>Fast & Full Payments</h4>-->
    <!--                            <p>Motorific ensures that you receive payments promptly and fastly. You will receive full payment from the dealer as we charge you nothing!</p>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- SECTION-6 -->

    <!--<section class="sec-6">-->
    <!--    <div class="container-1151">-->
    <!--        <div class="sec-6-heading">-->
                <!--<h5>Our happy customers</h5>-->
    <!--            <h5>Hear From Our Satisfied Customers</h5>-->
                <!--<p>Rated Excellent <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i-->
                <!--        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> by-->
                <!--    5,000+ Users</p>-->
    <!--            <p>Rated  <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i-->
    <!--                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> by 3thousands Customers </p>-->
    <!--        </div>-->
    <!--        <div class="sec-6-boxes d-flex">-->
    <!--            <div class="sec-6-main-box col-lg-4 col-md-6">-->
    <!--                <p style="font-style:italic;">I was a little hesitant to sell my car online, but Motorific made the process incredibly easy and stress-free. Their platform connects car sellers with verified dealers, which gave me peace of mind knowing that I was dealing with reputable buyers. The whole process was seamless - I entered registration number and created my car and within hours, I had multiple offers from interested dealers. I was able to compare the offers and choose the one that worked best for me. The team at Motorific was also very helpful and responsive throughout the process, answering any questions I had and providing updates on the status of my listing. I highly recommend Motorific to anyone looking to sell their car - it's a great way to get a fair price without the hassle of dealing with private buyers.</p>-->
    <!--                <div class="sec-6-box-pfp d-flex align-items-center">-->
    <!--                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp.png') }}" alt="">-->
    <!--                    <div>-->
    <!--                        <h5>Mark,Homestay</h5>-->
    <!--                        <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="sec-6-main-box col-lg-4 col-md-6">-->
    <!--                <p style="font-style:italic;">From my experience, I can vouch that Motorific is the best way to sell used car! I tried selling my car through traditional methods and it turned out to be a big headache. But then a friend of mine recommended Motorific. As soon as I created profile, I was able to get multiple offers from verified dealers instantly. The whole process was seamless, prompt and hassle-free. What I appreciates the most about Motorific is the transparency of the platform, and the fact that I could compare offers and choose the one that worked best for me. Thanks to Motorific, I got the best value for my MG HS!</p>-->
    <!--                <div class="sec-6-box-pfp d-flex align-items-center">-->
    <!--                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp2.png') }}" alt="">-->
    <!--                    <div>-->
    <!--                        <h5>Mark,Homestay</h5>-->
    <!--                        <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="sec-6-main-box col-lg-4 col-md-6 mx-auto">-->
    <!--                <p style=""font-style: italic;">Sold my Peugeot e-208 through Motorific - it was easy, fast, and stress-free! I got a great price for my car and was able to complete the transaction quickly. Highly recommend Motorific for anyone looking to sell their car fastly!</p>-->
    <!--                <div class="sec-6-box-pfp d-flex align-items-center">-->
    <!--                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp3.png') }}" alt="">-->
    <!--                    <div>-->
    <!--                        <h5>Mark,Homestay</h5>-->
    <!--                        <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- SECTION-7 -->

    <!--<section class="sec-7">-->
    <!--    <div class="sec-7-bg-img sec-1-txt">-->
    <!--        <div class="container-1151">-->
    <!--            <div class="row">-->
    <!--                <div class="col-lg-6 col-md-6">-->
    <!--                    <div class="sec-7-box">-->
    <!--                        <h4>What are you waiting for?</h4>-->
    <!--                        <p>Bid to traditional used car selling methods and join strong community of thousands happy customers!</p>-->
    <!--                        <form class="millage_area1" method="get" action="{{ route('photoUpload') }}">-->

    <!--                            <span class="text mt-4 found1" style="color: white">Enter Mileage <i class="fa-solid fa-check"></i></span>-->
        
    <!--                            <br>-->
    <!--                            <input type="number" name="millage" placeholder="Enter Millage" required>-->
    <!--                            <input type="hidden" name="registeration" class="registeration1" value="">-->
    <!--                            <button type="submit">Continue</button>-->
        
    <!--                        </form>-->
    <!--                        <div class="check_area1">-->

    <!--                            <input type="text" name="registeration1" id="registeration1" placeholder="Enter REG"-->
    <!--                                value="{{ old('registeration') }}">-->
    <!--                            <span class="text-danger show_error1"></span>-->
    <!--                            <button type="button" id="check_registeration1">Value Your Car</button>-->
    <!--                        </div>-->
    <!--                        @if ($errors->has('millage'))-->
    <!--                            <span class="text-danger">{{ $errors->first('millage') }}</span>-->
    <!--                        @endif-->
                            
                            
    <!--                    </div>-->
    <!--                </div>-->

    <!--                <div class="col-lg-6 col-md-6">-->
    <!--                    <div class="sec-7-box">-->
    <!--                        <h4>Newsletter</h4>-->
    <!--                        <p>Subscribe to our newsletter and stay on top of industry news. </p>-->
    <!--                        <input class="mb-3" type="text" name="subscriber_email" placeholder="email" id="subscriber_email" >-->
    <!--                        <button onclick="addSubscriber()">SUBSCRIBE</button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
@endsection
@push('child-scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        
        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');
        });
    });
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
