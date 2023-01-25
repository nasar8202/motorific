@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<style>
    .dropdown {
position: relative;
display: inline-block;
color:white
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
                <a href="#">
                    <li>How It Works</li>
                </a>
                <a href="#">
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

                    <a href="{{ route('DealerLogin') }}">For Dealers</a>


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
            <button>Contact Us</button>
        </div>
        <div class="menu">
            <div class="toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="navi">
                <ul>
                    <li><a  href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Reviews</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
 <!-- PHOTO-UPLOAD-SECTION-1 -->
 <section class="photo-up-sec-1">
    <div class="container-1151">
        <img src="{{ URL::asset('frontend/seller/assets/image/ford.png') }}" alt="">
        <h3>GJ65 YUA</h3>
        <p>Volkswagen Golf R DSG</p>
        <div class="chart">
            <ul>
                <li>2015</li>
                <li>43,000 miles</li>
                <li>Grey</li>
                <li>Hatchback</li>
                <li>Petrol</li>
            </ul>
        </div>
    </div>
</section>
  <!-- VALUATION -->
  <div class="valuation-main-sec">
    <div class="container-1151">
        <div class="valuation-main-box">
            <div class="car-value-txt">
                <h5>Valid for 5 days, 17 hours and 44 mins</h5>
                <h4>Your estimated sale price</h4>
            </div>
            <div class="car-value">
                <h2>£17,025*</h2>
            </div>
            <h6>Based on 64,717 offers for Volkswagen vehicles from 2,420 dealers on Motorway. </h6>
        </div>

        <div class="valuation-feature-main">
            <div class="valuation-feature">
                <img {{ URL::asset('frontend/seller/assets/image/v-home.png') }} alt="">
                <h4>Free home collection</h4>
            </div>
            <div class="valuation-feature">
                <img {{ URL::asset('frontend/seller/assets/image/v-euro.png') }} alt="">
                <h4>Fast payment</h4>
            </div>
            <div class="valuation-feature">
                <img {{ URL::asset('frontend/seller/assets/image/v-card.png') }} alt="">
                <h4>No fees to pay, ever</h4>
            </div>
        </div>

        <div class="valuation-btn">
            <button onclick="window.location.href='https://webprojectmockup.com/custom/motorific/public/photo-upload'">CONTINUE</button>
        </div>
    </div>
</div>

<!-- -->
<div class="container-1151">
    <div class="how-work">
        <h3>How it works</h3>
    </div>
    <div class="row">
        <div class="howitwork-main col-lg-3 col-md-3">
            <div class="step-nmbr">
                <h5>1</h5>
            </div>
            <div class="how-work-img">
                <img {{ URL::asset('frontend/seller/assets/image/car.png') }} alt="">
                <div class="line-sec-2">
                </div>
            </div>
            <h4>Profile your car</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
        </div>

        <div class="howitwork-main col-lg-3 col-md-3">
            <div class="step-nmbr">
                <h5>2</h5>
            </div>
            <div class="how-work-img d-flex align-items-center">
                <img {{ URL::asset('frontend/seller/assets/image/megaphone.png') }} alt="">
                <div class="line-sec-2">
                </div>
            </div>
            <h4>Profile your car</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
        </div>

        <div class="howitwork-main col-lg-3 col-md-3">
            <div class="step-nmbr">
                <h5>3</h5>
            </div>
            <div class="how-work-img">
                <img {{ URL::asset('frontend/seller/assets/image/price.png') }} alt="">
                <div class="line-sec-2">
                </div>
            </div>
            <h4>Profile your car</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
        </div>

        <div class="howitwork-main col-lg-3 col-md-3">
            <div class="step-nmbr">
                <h5>4</h5>
            </div>
            <div class="how-work-img">
                <img {{ URL::asset('frontend/seller/assets/image/sale.png') }} alt="">
            </div>
            <h4>Profile your car</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
        </div>
    </div>
    <div class="sec-2-btns text-center">
        <button>VALUE YOUR CAR</button>
        <button>GET IN TOUCH</button>
    </div>
</div>

<!--  -->
<section class="sec-5">
    <div class="container-1600">
        <div class="sec-5-txt">
            <div class="container-1151">
                <h5>Why Sell your</h5>
                <h5>used car with motorific</h5>
                <div class="row sec-5-txt-sub">
                    <div class="col-lg-6 col-md-6">
                        <div class="sec-5-inner-txt mt-4">
                            <h4>We check thoursands of dealers</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                commodo
                                viverra maecenas accumsan lacus vel facilisis.</p>
                        </div>

                        <div class="sec-5-inner-txt mt-4">
                            <h4>We check thoursands of dealers</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                commodo
                                viverra maecenas accumsan lacus vel facilisis.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="sec-5-inner-txt mt-4">
                            <h4>We check thoursands of dealers</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                commodo
                                viverra maecenas accumsan lacus vel facilisis.</p>
                        </div>

                        <div class="sec-5-inner-txt mt-4">
                            <h4>We check thoursands of dealers</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                commodo
                                viverra maecenas accumsan lacus vel facilisis.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!--  -->
<section class="sec-6">
    <div class="container-1151">
        <div class="sec-6-heading">
            <h5>Our happy customers</h5>
            <p>Rated Excellent <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> by
                5,000+ Users</p>
        </div>
        <div class="sec-6-boxes d-flex">
            <div class="sec-6-main-box col-lg-4 col-md-6">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting,containing Lorem Ipsum passages, and more recently
                    with desktop</p>
                <div class="sec-6-box-pfp d-flex align-items-center">
                    <img {{ URL::asset('frontend/seller/assets/image/sec-5pfp.png') }} alt="">
                    <div>
                        <h5>Mark,Homestay</h5>
                        <img {{ URL::asset('frontend/seller/assets/image/review.png') }} alt="">
                    </div>
                </div>
            </div>
            <div class="sec-6-main-box col-lg-4 col-md-6">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting,containing Lorem Ipsum passages, and more recently
                    with desktop</p>
                <div class="sec-6-box-pfp d-flex align-items-center">
                    <img {{ URL::asset('frontend/seller/assets/image/sec-5pfp2.png') }} alt="">
                    <div>
                        <h5>Mark,Homestay</h5>
                        <img {{ URL::asset('frontend/seller/assets/image/review.png') }} alt="">
                    </div>
                </div>
            </div>
            <div class="sec-6-main-box col-lg-4 col-md-6 mx-auto">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting,containing Lorem Ipsum passages, and more recently
                    with desktop</p>
                <div class="sec-6-box-pfp d-flex align-items-center">
                    <img {{ URL::asset('frontend/seller/assets/image/sec-5pfp3.png') }} alt="">
                    <div>
                        <h5>Mark,Homestay</h5>
                        <img {{ URL::asset('frontend/seller/assets/image/review.png') }} alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--  -->
<section class="sec-7">
    <div class="sec-7-bg-img sec-1-txt">
        <div class="container-1151">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="sec-7-box">
                        <h4>What are you waiting for?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore</p>
                        <input class="mb-3" type="text" placeholder="Enter REG">
                        <button>Value Your Car</button>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="sec-7-box">
                        <h4>Newsletter</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore</p>
                        <input class="mb-3" type="text">
                        <button>SUBSCRIBE</button>
                    </div>
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

                if(response.success=='success')
                {
                     $("#vehicle_registration_details").html('<div class="container-1151"><div class="row"><div class="sec-1-txt col-lg-6"><h2>'+response.users.name+' <span>Motorific</span></h2><p>'+response.users.email+'</p><form id="myForm">@csrf Confirm mileage<input type="text" id="id" name="vehicle_registration_no" value="111" placeholder="Enter REG"><button id="submitid" type="submit" >Continue</button></form></div><div class="sec-1-img col-lg-6"><img  alt=""></div><div id="title"></div></div></div>');
                     $("#vehicle_registration").hide();
                }else{
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
