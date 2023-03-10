@extends('frontend.seller.layouts.app')
@section('title','Get In Touch')
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

                    <a href="{{ route('dealer.newDashboard') }}">For Dealers</a>


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

                    </div>
                    @guest
                    <li><a href="{{ route('myLogin') }}">Sign In</a></li>
                    
                        <li><a href="{{ route('registration') }}">Sign Up</a></li>
                        @endguest
                        @guest
                            <li> <a href="{{ route('dealer.newDashboard') }}">For Dealers</a>

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
                {{-- <img src="{{ URL::asset('frontend/seller/assets/image/bmw.png')}}" alt=""> --}}
                </div>
                <div class="">
                <h3>Get In Touch</h3>
                {{-- <p>Volkswagen Golf R DSG</p> --}}
                </div>
            </div>
        </div>
    </section>
    <div>
        <div class="row form-main text-center mt-4">
                <h1>Get In Touch</h1>
                <div class="col-6">
                    <h2>DON'T BE SHY</h2>
                    <span class="text-center">Feel free to get in touch with me. <br/>I am always open to discussing new projects, <br/>creative ideas or opportunities to be part of your visions.</span>
                    <br/><br/>
                    <p>Mail me
                        info@motorific.co.uk</p>  
                        <br/><br/>
                    <p>Call me
                        +44 7593 839364</p>   
                </div>
                <div class="col-6">
                    <form method="POST" action="{{ route('getIntouchPost') }}">
                        @csrf
                        <div>
                            <div class="mt-40">
                                
                                <input type="hidden" placeholder="getintouchfromsellerform" name="getintouchfromsellerform" value="getintouchfromsellerform" >
                            
                            </div>
                            <div class="mt-40">
                                <label for="condition_damage" class="label-main-text f-20"> Name </label>
                            <input type="name" placeholder="enter name here" name="name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            
                            </div>
                            <div class="mt-40">
                                <label for="condition_damage" class="label-main-text f-20"> Email </label>
                            <input type="email" placeholder="E-mail Address" name="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            </div>
                            <br>
                            <div class="mt-40">
                                <label for="condition_damage" class="label-main-text f-20"> Description </label>
                            <textarea cols="40" rows="10" name="description" placeholder="Please enter discription here"></textarea>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        
                        <br>
                        <div class="mt-2">
                            <button>Submit</button>
                        </div>
                    </form>
                </div>
            
        </div>
        
    </div>
 
    <!-- SECTION-3 -->

    <section class="sec-3 mt-4 mb-5">
        <div class="container-1151">
            <div class="row">
                <div class="sec-3-txt col-lg-6">
                    <h4>Who We Are</h4>
                    
                    <p>We are Motorific - a team of car enthusiasts. We are on a mission to revolutionize the whole car sale process. Motorific offers you the UK’s biggest platform where you can sell your car from the comfort of your home. We connect you with over 5000+ verified dealers nationwide and present you with the highest bid for your car. 

                        The winning dealer will even collect your car for free, and you get paid within 24 hours. The cherry on the top? You get paid in full as we do not charge anything from used car owners; only the dealers have to pay a small fee. The Motorific way of selling your car is quick, reliable, easy, and completely online. On top of it, the platform is 100% free. 
                        
                        </p>
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
