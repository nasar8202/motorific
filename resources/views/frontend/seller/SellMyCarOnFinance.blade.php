@extends('frontend.seller.layouts.app')
@section('title', 'Selling My Car On Finance Is Easy Now')
@section('keyword', 'sell my car on finance, selling my car on finance')
@section('description', 'You can sell my car on finance on Motorific that offers a stressfree, fast and secure way to sell car online.')
@section('section')
@section('headerClass','header-light')
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
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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


    <!-- SECTION-1 -->

    <section class="sec-1 seller-main-banner banner-sec seller-main" id="vehicle_registration">
        <div class="container-1151">
            <div class="row banner-content">
                <div class="sec-1-txt col-lg-6">
                    <h2>Sell My Car On Finance </h2>
                    <p class="banner-desc">Motorific can assist you in locating the best potential option to meet your needs by guiding you through the complexity of how to sell my car on finance. Our thousands of verified dealers can clear your finance on winning the bid. You’ll receive the maximum profits while selling my car on finance. </p>
                    <!--<p class="banner-desc">Our thousands verified dealers can clear your finance on winning the bid. You’ll receive the maximum profits. </p>-->
                    <form class="millage_area" method="get" action="{{ route('photoUpload') }}">

                        <span class="text text-success mt-4 found">Enter Mileage <i class="fa-solid fa-check"></i></span>

                        <br>
                        <input type="number" name="millage" placeholder="Enter Millage" required>
                        <input type="hidden" name="registeration" class="registeration" value="">
                        <button type="submit" class="btn-submit"><span>
                            Continue
                        </span></button>

                    </form>
                    <div class="check_area">

                        <input type="text" name="registeration" id="registeration" placeholder="Enter REG"
                            value="{{ old('registeration') }}" style="text-transform: uppercase">
                        <span class="text-danger show_error"></span>
                        <button type="button" id="check_registeration" class="btn-prim"><a href="javascript:void(0);">Value Your Car </a></button>
                    </div>
                    @if ($errors->has('millage'))
                        <span class="text-danger">{{ $errors->first('millage') }}</span>
                    @endif
                </div>
                <div class="sec-1-img col-lg-6">
                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-1-vector.png') }}" alt="">
                </div>
            </div>
            
        </div>
    </section>
    <!--<section class="" id="vehicle_registration_details"></section>-->
    <!-- SECTION-2 -->

    <section class="sec-2 py-5 how-sec value-sec">
        <div class="container-1151">
           
            <div class="row">
                <div class="howitwork-main col-lg-3 col-md-6">
                    
                    <h4>Instant Valuation:</h4>
                    <p> Our live-market-data-powered technology provides an accurate estimate of your car’s value. 
                    </p>
                </div>

                <div class="howitwork-main col-lg-3 col-md-6">
                    
                    <h4>Get Your Highest Price:</h4>
                    <p>We alert dealers every time a new listing comes up. They compete to give you the best price for your used car. We connect you with the dealer offering the highest </p>
                </div>

                <div class="howitwork-main col-lg-3 col-md-6">
                    
                    <h4>Free Home Collection: </h4>
                    <p>Once you accept the bid, a verified dealer will collect your car from your home for free. You get paid in full. </p>
                </div>

                <div class="howitwork-main col-lg-3 col-md-6">
                    
                    <h4>Motorific Is Free: </h4>
                    <p> We don’t charge used car owners any fee. We collect fees from verified dealers. </p>
                </div>
            </div>
        </div>
    </section>


    <!-- SECTION-3 -->

    <section class="sec-3 mt-4 mb-5 who-sec fin">
        <div class="container-1151">
            <div class="row">
                <div class="sec-3-txt col-lg-6">
                    <h2 class="sec-heading text-white">Fast, Efficient, & Advanced Way of Selling My Car on Finance 
                    </h2>
                    <p>Motorific is home to thousands of verified dealers who compete daily to get the best cars for stock acquisition. At Motorific you can get instant value for your car and meet the dealers that are willing to pay the best possible prices. 
                    </p>
                    
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
    <!--                            <p>Motorific’s car valuation technology is powered by live market data and it provides you with an exact estimate of your car’s value. -->
    <!--                            </p>-->
    <!--                        </div>-->

    <!--                        <div class="sec-4-box">-->
    <!--                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img2.png') }}" alt="">-->
                                <!--<h4>Get your highest price</h4>-->
    <!--                            <h4>Get Maximum Value for Electric Car</h4>-->
    <!--                            <p>Soon after you post an ad, thousands verified dealers start making attracting bids. We connect you with the one who is willing to pay the most. </p>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="sec-4-box-sec-2">-->
    <!--                        <div class="sec-4-box mb-3">-->
    <!--                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img3.png') }}" alt="">-->
    <!--                            <h4>Free Home Collection</h4>-->
    <!--                            <p>The winning bidder collects your car from your home for free.  </p>-->
    <!--                        </div>-->

    <!--                        <div class="sec-4-box">-->
    <!--                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img4.png') }}" alt="">-->
                                <!--<h4>Oh, and it’s 100% free</h4>-->
    <!--                            <h4>Get Paid in Full For Your Electric Vehicle-->
    <!--                            </h4>-->
    <!--                            <p>You receive full payment for your electric car within 24 hours. We charge a small fee to the winning bidder. </p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- SECTION-5 -->

    <section class="sec-5 wsy-sec">
        <div class="container-1600">
            <div class="sec-5-txt bst-price-sec">
                <div class="container-1151">
                    <h2 class="sec-heading text-white">Over 250,000 Owners Have Got The Best <br> Price For Their Cars. </h2>
                    <h6>How Motorific Works To Sell Cars On Finance</h6>
                    <div class="fct-text">
                        <div class="fct-cont">
                            <p>
                              1)<strong> Profile Your Car:</strong>  You profile your car by simply entering the car’s registration number. Our system provides instant car valuation using live market data and statistics.
                            </p>
                        </div>
                        <div class="fct-cont">
                            <p>
                              2)<strong> We Alert Dealers:</strong>  As soon as your listing completes, Motorific sends notifications to thousands verified dealers who compete with the highest bids.
                            </p>
                        </div>
                        <div class="fct-cont">
                            <p>
                              3)<strong> Get Maximum Value For Your Car:</strong>  Motorific connects with the dealer who has placed the highest bid. You approve the bid and the dealer collects the car from your home for free. 
                            </p>
                        </div>
                        <div class="fct-cont">
                            <p>
                              4)<strong> Get Paid In Full:</strong>  You get paid in full within 24 hours of the sale. 90% of car owners have received their payments on the same day. 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!--Finance Section-->
    <section class="finance-sec">
        <div class="container-1151">
            <div class="row">
                <div class="col-md-6">
                    <div class="fin-content">
                        <h3>Sell My Car On Finance Through Motorific</h3>
                        <p>As per the latest stats, 85% of people buy cars through some sort of finance agreement. With flexible payment plans, it becomes easy for people to pay for cars and own a vehicle. However, complexities arise when car owners go to sell their cars on finance. However, Motorific has a solution for you as we can help you sell your car on finance.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fin-content">
                        <h3>Can You Sell Your 1st Car On Finance?</h3>
                        <p>With Motorific, you always can. Our verified dealers have bought cars that came with outstanding finance. However, to sell my car on finance, all you need to do is to settle the outstanding balance. This act of settling balance is called the settlement figure. Then, you will submit proof of payment clearance and you are all set to sell your car.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--End-->
    
    
    <!--Sell Car Sec-->
    <section class="sell-car-sec">
        <div class="container-1151">
            <h2 class="sec-heading">How to sell my financed car through Motorific?</h2>
            <p>If you have bought a car on finance, then you should know it already that you are not the legal owner of the car. The ownership will be only transferred to you when you have submitted all payments to your lender. This whole complex concept of ownership gives birth to the ambiguity that you can’t sell your car on finance until all your outstanding payments are cleared. Fortunately, that’s not the case.</p>
            <ul>
                <li>You can voluntarily terminate your finance agreement provided that you have paid 50% or more of the agreed amount.</li>
                <li>You will then clear the remaining balance that you owe. </li>
                <li>Likewise, you will pay any outstanding fees or interests.</li>
                <li>When considering purchasing a new car, it could be worthwhile to have a conversation with your lender. They may offer the option to take back your current car and initiate a new agreement, which could provide you with personalized rates as an existing customer.</li>
            </ul>
        </div>
    </section>
    
    <!--End-->
    

    <!-- SECTION-7 -->
    
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
