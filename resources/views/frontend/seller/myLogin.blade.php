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
                    <a href="#">
                        <li>How It Works</li>
                    </a>
                    <a href="{{ route('howItWorksforSeller') }}">
                        <li>How It Works</li>
                    </a>
                    <a href="{{ route('reviews') }}">
                        <li>Reviews</li>
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
                        <li><a href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">Help</a></li>
                            @guest
                          <li>  <a href="{{ route('DealerLogin') }}">For Dealers</a>
                          
                        </li>
                        @endguest
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
                <img src="{{ URL::asset('frontend/seller/assets/image/bmw.png')}}" alt="">
                </div>
                <div class="">
                <h3>GJ65 YUA</h3>
                <p>Volkswagen Golf R DSG</p>
                </div>
            </div>
        </div>
    </section>

    <!-- REGISTRATION-FORM -->
    <div class="registration-form">
        <div class="reg-form-heading">
            <h3>Login</h3>
            {{-- <p>It will take 60 seconds</p> --}}
        </div>

        <div class="container-700">
            <div class="form-main text-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>

                        <input type="email" placeholder="E-mail Address" name="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="password" placeholder="password" name="password" class="@error('password') is-invalid @enderror" name="password" value="">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <br>
                    <div>
                        <button>CONTINUE</button>
                    </div>
                </form>
                <a href="{{route('forgotPassPage')}}">Forgot Your Password ?</a>
            </div>
        </div>
    </div>
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
                                <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img.png')}}" alt="">
                                <h4>Instant Valution</h4>
                                <p>Get a quick glance of your store’s graph-based reports. The Citylytic dashboard is
                                    designed
                                    to be easy to understand.</p>
                            </div>

                            <div class="sec-4-box">
                                <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img2.png')}}" alt="">
                                <h4>Get your highest price</h4>
                                <p>Get a quick glance of your store’s graph-based reports. The Citylytic dashboard is
                                    designed to be easy to understand. </p>
                            </div>
                        </div>

                        <div class="sec-4-box-sec-2">
                            <div class="sec-4-box mb-3">
                                <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img3.png')}}" alt="">
                                <h4>Free home collection</h4>
                                <p>Get a quick glance of your store’s graph-based reports. The Citylytic dashboard is
                                    designed to be easy to understand.</p>
                            </div>

                            <div class="sec-4-box">
                                <img src="{{ URL::asset('frontend/seller/assets/image/sec-4img4.png')}}" alt="">
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
                        <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp.png')}}" alt="">
                        <div>
                            <h5>Mark,Homestay</h5>
                            <img src="{{ URL::asset('frontend/seller/assets/image/review.png')}}" alt="">
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
                        <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp2.png')}}" alt="">
                        <div>
                            <h5>Mark,Homestay</h5>
                            <img src="{{ URL::asset('frontend/seller/assets/image/review.png')}}" alt="">
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
                        <img src="{{ URL::asset('frontend/seller/assets/image/sec-5pfp3.png')}}" alt="">
                        <div>
                            <h5>Mark,Homestay</h5>
                            <img src="{{ URL::asset('frontend/seller/assets/image/review.png')}}" alt="">
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
