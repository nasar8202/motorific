@extends('frontend.seller.layouts.app')
@section('title','Photo Upload | Motorific')
@section('section')
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
        <img src="{{ URL::asset('frontend/seller/assets/image/ford.png')}}" alt="">
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

<!-- PHOTO-UPLOAD-SECTION-1 -->
<section class="photo-up-sec-2">
    <div class="container-1151">
        <div class="photo-up-sec-2-heading text-center">
            <h3>Complete your profile steps to get your vehicle for sale</h3>
        </div>

        <div class="photo-up-sec-2-box-main">
            <div class="photo-up-sec-2-box">
                <div class="photo-up-sec-2-box-txt">
                    <h4>Personal Information</h4>
                    <div class="photo-up-sec-2-box-personal-information">
                        <p>Wasif</p>
                        <p>sureshbca@gmail.com</p>
                        <p>07735 772 373</p>
                    </div>
                    <div class="prf-complete d-flex align-items-center">
                        <div>
                            <img src="{{ URL::asset('frontend/seller/assets/image/check-gr.png')}}" alt="">
                        </div>
                        <h3> Complete</h3>
                    </div>
                </div>
                <div class="photo-up-sec-2-box-btn clr-prp my-auto">
                    <button onclick="myFunction3()">EDIT</button>
                </div>
            </div>

            <div class="personal-info-main" id="myDIV3">
                <div class="personal-info-heading">
                    <h3>Personal Information</h3>
                    <p>Here’s the contact information you’ve given us. Please make sure it’s correct so we can keep you up to date.</p>
                </div>

                <div class="personal-info-form">
                    <form>
                        <div>
                            <h4>Full Name</h4>
                            <input type="text" placeholder="Enter Name">
                        </div>
                        <div>
                            <h4>Email</h4>
                            <input type="email" placeholder="Enter E-mail">
                        </div>
                        <div>
                            <h4>Phone Number</h4>
                            <input type="number" placeholder="Enter Phone">
                        </div>
                    </form>
                </div>

                <div class="personal-info-form-btn photo-up-sec-2-box-btn clr-s-gr text-center">
                    <button>CONFIRM</button>
                </div>
            </div>
        </div>

        <div class="photo-up-sec-2-box-main">
            <div class="photo-up-sec-2-box">
                <div class="photo-up-sec-2-box-txt">
                    <h4>Vehicle Information</h4>
                    <div class="photo-up-sec-2-box-personal-information">
                        <p>Features, equipment & ownership</p>
                    </div>
                    <div class="prf-complete d-flex align-items-center">
                        <div>
                            <img src="{{ URL::asset('frontend/seller/assets/image/load.png')}}" alt="">
                        </div>
                        <h3>15% Complete</h3>
                    </div>
                </div>
                <div class="photo-up-sec-2-box-btn clr-s-gr my-auto">
                    <button onclick="myFunction2()">CONTINUE</button>
                </div>
            </div>

            <div class="photo-up-sec-2" id="myDIV2">
                <div class="photo-up-sec-2-vehicle-information">
                    <h3>Locking wheel nut</h3>
                    <p>Do you have the locking wheel nut?</p>
                    <div class="row photo-up-sec-2-vi-row-ay">
                        <div class="col-lg-6 my-auto">
                            <div class="photo-up-sec-2-vi-btns">
                                    <div class="photo-up-sec-2-vi-btn">
                                        <p>Locking wheel nut included</p>
                                    </div>
                                    <div class="photo-up-sec-2-vi-btn">
                                        <p>Locking wheel nut included</p>
                                    </div>
                                    <div class="photo-up-sec-2-vi-btn">
                                        <p>Locking wheel nut included</p>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="info-box">
                                <p>The locking wheel nut is a metal part usually located near the tool pack, either in the spare wheel or its compartment.</p>
                                <div class="info-box-image">
                                    <img src="{{ URL::asset('frontend/seller/assets/image/nut.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="photo-up-sec-2-vi-btm-btns d-flex justify-content-between">
                        <div class="photo-up-sec-2-vi-btns">
                            <div class="photo-up-sec-2-box-btn clr-prp my-auto">
                                <button>SAVE AND EXIT</button>
                            </div>
                        </div>
                        <div class="photo-up-sec-2-vi-bnch-btns">
                            <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                <button>PREVIOUS</button>
                                <button>NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="photo-up-sec-2-box-main">
            <div class="photo-up-sec-2-box">
                <div class="photo-up-sec-2-box-txt">
                    <h4>Photos</h4>
                    <div class="photo-up-sec-2-box-personal-information">
                        <p>The final step is to add photos of your vehicle.</p>
                    </div>
                </div>
                <div class="photo-up-sec-2-box-btn clr-s-dis my-auto">
                    <button onclick="myFunction()">START</button>
                </div>
            </div>

            <div class="main-add-photos" id="myDIV">
                <form>
                    <div class="add-photos-inner row">
                        <div class="add-photos-box1 col-lg-6">
                            <div class="add-photos-numbering">
                                <h3>1</h3>
                            </div>
                            <img src="{{ URL::asset('frontend/seller/assets/image/add-p-front.png')}}" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="add-photos-box1">
                                <div class="add-photos-numbering">
                                    <h3>2</h3>
                                </div>
                                <img src="{{ URL::asset('frontend/seller/assets/image/add-p-back.png')}}" alt="">>
                            </div>
                            <div class="add-photos-box1">
                                <div class="add-photos-numbering">
                                    <h3>3</h3>
                                </div>
                                <img src="{{ URL::asset('frontend/seller/assets/image/add-p-corner.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="add-p-bottom-row row">
                        <div class="col-lg-4">
                            <div class="add-photos-box1">
                                <div class="add-photos-numbering">
                                    <h3>4</h3>
                                </div>
                                <img src="{{ URL::asset('frontend/seller/assets/image/add-p-back-corner.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="add-photos-box1">
                                <div class="add-photos-numbering">
                                    <h3>5</h3>
                                </div>
                                <img src="{{ URL::asset('frontend/seller/assets/image/add-p-interior.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="add-photos-box1">
                                <div class="add-photos-numbering">
                                    <h3>6</h3>
                                </div>
                                <img src="{{ URL::asset('frontend/seller/assets/image/add-p-dashboard.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="photo-up-sec-2-btn photo-up-sec-2-box-btn text-center clr-s-gr">
                        <button>CONTINUE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- PHOTO-UPLOAD-SECTION-2 -->
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
