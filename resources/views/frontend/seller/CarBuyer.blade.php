@extends('frontend.seller.layouts.app')
@section('title', 'Sell My Car Today- Motorific')
@section('keyword', 'sell my car today, sell your car today')
@section('description', 'Sell your car today with Motorific where we provide a complete guide and assist you in selling your car.')
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
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

    <!-- SECTION-1 -->

    <section class="sec-1 seller-main-banner banner-sec seller-main" id="vehicle_registration">
        <div class="container-1151">
            <div class="row banner-content">
                <div class="sec-1-txt col-lg-6">
                    <h2 class="fs-small"><h2>Sell your car 
                        with  <span>Motorific</span></h2></h2>
                        
                    <!--<p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>-->
                    <p class="banner-desc">Using our straightforward platform, you can quickly sell your car today. We only need a few bits of information to quickly assess your automobile, and we'll get back to you. Motorific is the quickest platform to sell my car today online. </p>
                    <!--<p class="banner-desc">Motorific’s car value tracker uses live market data to offer you free car valuation. It also allows you to track ongoing value to sell at the time that produces maximum profits. </p>-->
                    <form class="millage_area" method="get" action="{{ route('photoUpload') }}">

                        <span class="text text-success mt-4 found">Enter Mileage <i class="fa-solid fa-check"></i></span>

                        <br>
                        <input type="number" name="millage" placeholder="Enter Millage" required>
                        <input type="hidden" name="registeration" class="registeration" value="">
                        <button type="submit" class="btn-submit"><span>Continue</span></button>

                    </form>
                    <div class="check_area">

                        <input type="text" name="registeration" id="registeration" placeholder="Enter REG"
                            value="{{ old('registeration') }}" style="text-transform: uppercase">
                        <span class="text-danger show_error"></span>
                        <button type="button" id="check_registeration" class="btn-prim"><a href="javascript:void(0);">Value My Car </a></button>
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
        </div>
    </section>

    <section class="sec-2 how-sec">
        <div class="container-1151">
            <div class="row">
                <div class="col-12">
                    <div class="how-work">
                        <h2 class="sec-heading">How it works</h2>
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
                    <p>Sell your car today and receive full payment within 24 hours as we charge nothing. Welcome to the Motorific Way!
                    </p>
                </div>
            </div>
            <!--<div class="sec-2-btns text-center">-->
            <!--    <a href="#vehicle_registration"><button>VALUE YOUR CAR</button></a>-->
            <!--    <button class="green-btn"><a href="{{route('GetInTouchSellerForm')}}">GET IN TOUCH</a></button>-->
            <!--</div>-->
            <div class="sec-2-btns text-center btns-wraper">
                <button class="btn-prim btn-second"><a href="#vehicle_registration">VALUE YOUR CAR</a></button>
                <button class="btn-prim "><a href="{{route('GetInTouchSellerForm')}}">GET IN TOUCH</a></button>
            </div>
        </div>
    </section>   
    
    <!-- SECTION-3 -->

    <section class="sec-3 mt-4 mb-5 who-sec">
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

    

    <!-- SECTION-5 -->

    <section class="sec-5 wsy-sec pt-3">
        <div class="container-1600">
            <div class="sec-5-txt">
                <div class="container-1151">
                    <h2 class="sec-heading text-white">What factors can influence <br> your car value negatively?</h2>
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

    @include('frontend.seller.partials.testimonials')
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
