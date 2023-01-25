@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
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
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
padding: 12px 16px;
z-index: 1;
}

.dropdown:hover .dropdown-content {
display: block;
}
</style>
<header>
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
<<<<<<< HEAD
                <a href="{{ route('reviews') }}">
=======
                <a href="Review.blade.php">
>>>>>>> 175cabb6cfb1aaf0cc21da8a7dc348196b054612
                    <li>Reviews</li>
                </a>
                <a href="#">
                    <li>Help</li>
                </a>

                <div class="dropdown">
                    <span>More</span>
                    <div class="dropdown-content">
                   <a href="{{ route('DealerLogin') }}">For Dealers</a>
                   <a href="{{ route('sellMyCar') }}">Sell My Car</a>
                    </div>
                </div>
            </ul>
        </div>

        <div class="head-btns  justify-content-between">
            @guest
            <button><a href="{{ route('myLogin') }}">Sign In</a></button>
            @if (Route::has('register'))
            <button><a href="{{ route('registration') }}">Sign Up</a></button>
            @endif
            @else

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

            @endguest

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

<!-- SECTION-1 -->

<section class="sec-1" id="vehicle_registration">
    <div class="container-1151">
        <div class="row">
            <div class="sec-1-txt col-lg-6">
                <h2>Sell your car the
                    with <span>Motorific</span></h2>
                <p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>
                <form class="millage_area" method="get" action="{{route('photoUpload')}}" >
                    <span class="text text-success mt-4 found" >Vehicle Is Found <i class="fa-solid fa-check"></i></span>
                    <br>
                    <input type="text" name="millage"  placeholder="Enter Millage" >
                    <input type="hidden" name="registeration" class="registeration" value="">
                    <button type="submit" >Continue</button>

                </form>
                <div class="check_area">

                    <input type="text" name="registeration" id="registeration"  placeholder="Enter REG">
                    <span class="text-danger show_error"></span>
                    <button type="button" id="check_registeration" >Value Your Car</button>
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
<section class="sec-1" id="vehicle_registration_details"></section>
<!-- SECTION-2 -->

<section class="sec-2">
    <div class="container-1151">
        <div class="sec-2-txt pb-4">
            <h2>Just sold the <span>Motorific</span> way</h2>
            <p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>
        </div>
        <div class="row">

            <!-- BOX-1 -->
            <div class="col-lg-4 col-md-6">
                <div class="box">
                    <h4>Sold by Sydney</h4>
                    <div class="box-img">
                        <img src="{{ URL::asset('frontend/seller/assets/image/box-1.png') }}" alt="">
                    </div>
                    <h5>Mercedes C180 KOMP Avantgarde...,</h5>
                    <div class="d-flex justify-content-between">
                        <p>Sold for £1,400</p>
                        <h5>a day ago</h5>
                    </div>
                </div>
            </div>

            <!-- BOX-2 -->
            <div class="col-lg-4 col-md-6">
                <div class="box">
                    <h4>Sold by Sydney</h4>
                    <div class="box-img">
                        <img src="{{ URL::asset('frontend/seller/assets/image/box-2.png') }}" alt="">
                    </div>
                    <h5>Mercedes C180 KOMP. Avantgarde…,</h5>
                    <div class="d-flex justify-content-between">
                        <p>Sold for £1,400</p>
                        <h5>a day ago</h5>
                    </div>
                </div>
            </div>

            <!-- BOX-3 -->
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="box">
                    <h4>Sold by Sydney</h4>
                    <div class="box-img">
                        <img src="{{ URL::asset('frontend/seller/assets/image/box-3.png') }}" alt="">
                    </div>
                    <h5>Mercedes C180 KOMP. Avantgarde…,</h5>
                    <div class="d-flex justify-content-between">
                        <p>Sold for £1,400</p>
                        <h5>a day ago</h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="how-work">
            <h3>How it works</h3>
        </div>
        <div class="row">
            <div class="howitwork-main col-lg-3 col-md-3">
                <div class="step-nmbr">
                    <h5>1</h5>
                </div>
                <div class="how-work-img">
                    <img src="{{ URL::asset('frontend/seller/assets/image/car.png') }}" alt="">
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
                    <img src="{{ URL::asset('frontend/seller/assets/image/megaphone.png') }}" alt="">
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
                    <img src="{{ URL::asset('frontend/seller/assets/image/price.png') }}" alt="">
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
                    <img src="{{ URL::asset('frontend/seller/assets/image/sale.png') }}" alt="">
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
</section>

<!-- SECTION-3 -->

<section class="sec-3 mt-4 mb-5">
    <div class="container-1151">
        <div class="row">
            <div class="sec-3-txt col-lg-6">
                <h4>Who We Are</h4>
                <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</h6>
                <p>Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                    facilisis.</p>
                <button>VALUE YOUR CAR</button>
                <button>GET IN TOUCH</button>
            </div>
            <div class="col-lg-6">

            </div>
        </div>
    </div>
</section>

<!-- SECTION-4 -->

<section class="sec-4">
    <div class="container-1151">
        <div class="row">
            <div class="col-lg-6 my-auto">
                <div class="sec-4-txt ">
                    <h4>This is the way.</h4>
                    <h4>This is the</h4>
                    <h4>motorific.</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    <div class="sec-1-txt">
                        <button>VALUE YOUR CAR</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mx-auto">
                <div class="d-flex sec-6-box">
                    <div class="sec-4-box-sec-1">
                        <div class="sec-4-box mb-3">
                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img.png') }}" alt="">
                            <h4>Instant Valution</h4>
                            <p>Get a quick glance of your store’s graph-based reports. The Citylytic dashboard is
                                designed
                                to be easy to understand.</p>
                        </div>

                        <div class="sec-4-box">
                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img2.png') }}" alt="">
                            <h4>Get your highest price</h4>
                            <p>Get a quick glance of your store’s graph-based reports. The Citylytic dashboard is
                                designed to be easy to understand. </p>
                        </div>
                    </div>

                    <div class="sec-4-box-sec-2">
                        <div class="sec-4-box mb-3">
                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img3.png') }}" alt="">
                            <h4>Free home collection</h4>
                            <p>Get a quick glance of your store’s graph-based reports. The Citylytic dashboard is
                                designed to be easy to understand.</p>
                        </div>

                        <div class="sec-4-box">
                            <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img4.png') }}" alt="">
                            <h4>Oh, and it’s 100% free</h4>
                            <p>See a graphical visualization of the location of your sales. Zoom into the map and
                                view your store’s top trending sales by region, state or city. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION-5 -->

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

<!-- SECTION-6 -->

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
                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp.png') }}" alt="">
                    <div>
                        <h5>Mark,Homestay</h5>
                        <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">
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
                    <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp2.png') }}" alt="">
                    <div>
                        <h5>Mark,Homestay</h5>
                        <img src="{{ URL::asset('frontend/seller/assets/image/review.png') }}" alt="">
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
        $('.millage_area').hide();
        $('.show_error').hide();
        // $('.found').hide();
    $("#check_registeration").on("click", function(e) {
        var registeration = $("#registeration").val();
           e.preventDefault(); // prevent the form submission

           $.ajax({
               type: "get",
               dataType: 'JSON',
               url: '{{ route('testlocation') }}',
               data: {registeration,registeration},

               success: function(response) {
                console.log(response);

                if(response.success == 'true'){
                    $('.show_error').hide();
                    $('.check_area').hide();
                    $('.millage_area').show();
                    $('.found').show();
                    $('.registeration').val(registeration);
                }
                // else if(response == 0){

                //     $('.show_error').show();
                //     $('.show_error').text('First You Login')
                //     setTimeout(function(){
                //     window.location.href = "{{ route('registration')}}";
                // },1000);
                // }
                else{
                    $('.show_error').show();
                    $('.show_error').text('Record Not Found')
                }
            }

           });
       });
</script>
@endpush
