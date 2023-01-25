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
                <a href="{{ route('reviews') }}">
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

<section class="sec-1" id="vehicle_registration_details"></section>
<!-- SECTION-2 -->

<section class="sec-2">
    <div class="container-1151">

        <div class="row">

            <!-- BOX-1 -->
            <div class="col-lg-12 col-md-12">
                <div class="box">
                    <h4>How it works</h4>

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

        </div>
    </div>
</section>

<!-- SECTION-3 -->




@endsection
@push('child-scripts')
<script type="text/javascript">

</script>
@endpush
