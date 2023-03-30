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
                        <li><a href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">Help</a></li>
                            <li>
                            <a onclick="window.location='{{ url("/get-in-touch") }}'">Contact Us</a>
                        </li>
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
            <h3>Reset Password</h3>
            {{-- <p>It will take 60 seconds</p> --}}
        </div>
        <div class="container-700">
            <div class="form-main text-center">
                <div>


                            <form action="{{ route('reset.password.post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div>

                                        <input type="text" id="email_address" placeholder="E-mail" value="{{ $email }}"  name="email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif

                                </div>

                                <br>
                                <div>

                                        <input type="password" id="password" placeholder="password"  name="password" required autofocus>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif

                                </div>

                                <br>
                                <div>

                                        <input type="password" id="password-confirm" placeholder="confirm password"  name="password_confirmation" required autofocus>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif

                                </div>

                                <br>
                                <div >
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>

                    <br>

                    <br>
                            </form>


            </div>
        </div>
    </div>


@endsection
