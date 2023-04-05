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
                    {{-- <a href="#">
                        <li>Help</li>
                    </a> --}}
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
                        {{-- <li>
                            <a href="#">Help</a>
                        </li> --}}
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
                {{-- <div class="my-auto">
                <img src="{{ URL::asset('frontend/seller/assets/image/bmw.png')}}" alt="">
                </div>
                <div class="">
                <h3>GJ65 YUA</h3>
                <p class="p-0">Volkswagen Golf R DSG</p>
                </div> --}}
            </div>
        </div>
    </section>
    
<!--Forgott Password Section-->

<!--<section class="userform-sec forgott">-->
<!--    <div class="container-1151">-->
<!--        <div class="form-box">-->
<!--            <h2>Enter Your Email To Get Your Password</h2>-->
<!--            <form method="POST" action="{{ route('forgotPass') }}">-->
<!--            @csrf-->
<!--                <div class="form-group">-->
<!--                    <label>Email Address</label>-->
<!--                    <input type="email" placeholder="" name="email" class="@error('email') is-invalid @enderror form-control" name="email" value="{{ old('email') }}">-->
<!--                    @error('email')-->
<!--                        <span class="invalid-feedback" role="alert">-->
<!--                            <strong>{{ $message }}</strong>-->
<!--                        </span>-->
<!--                    @enderror-->
<!--                </div>-->
<!--                <div class="form-group form-btn">-->
<!--                    <button>Reset Password</button>-->
<!--                    <a href="{{route('myLogin')}}" class="fw-bold">Login</a>-->
<!--                </div>-->
<!--            </form>-->
            
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!--Forgott Password Section End-->

    <!-- REGISTRATION-FORM -->
    <div class="registration-form forgott-form">
        <div class="reg-form-heading">
            <h3>Enter Your Email To Get Your Password</h3>
            {{-- <p>It will take 60 seconds</p> --}}
        </div>

        <div class="container-700">
            <div class="form-main text-center">
                <form method="POST" action="{{ route('forgotPass') }}">
                    @csrf
                    <div class="inputBox">

                        <input type="email" placeholder="E-mail Address" name="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div>
                        <button type="submit " class="m-0"> Send Password Reset Link</button>
                    </div>
                </form>
                <a href="{{route('myLogin')}}" class="login-link">Login</a>
            </div>
        </div>
    </div>


@endsection
@push('child-scripts')
<script  type="text/javascript">
    $(document).ready(function() {
        
        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');
        });
    });
    </script>
@endpush