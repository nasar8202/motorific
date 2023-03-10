@extends('frontend.seller.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')

<header class="thnkPage">
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
                    <li><a href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                    <a href="{{ route('howItWorksforSeller') }}">
                        <li>How It Works</li>
                    </a>
                    <a href="{{ route('reviews') }}">
                        <li>Reviews</li>
                    </a>
                    <li><a href="#">Help</a></li>
                    @guest
                        <li> <a href="{{ route('dealer.newDashboard') }}">For Dealers</a>

                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>


<section class="thanks">
    <div class="container-1151">
        <div class="thnk-content">
            <span class="icon"><i class="fas fa-check-circle"></i></span>
            <h2>Thank You For Choosing Us</h2>
            <h6>Your Vehicle Has Been Submited. Wait For Admin Approvel</h6>
            <p>Our pricing specialists are now working on getting the best price tailored to your vehicle.
                If you have any additional information regarding your vehicle e.g. optional extras which could help our team to create your unique offer,
                please call us on <a href="tel:07888185014"><i class="fa-solid fa-phone"></i> 07888185014.</a>
                <br>
                <a href="{{route('acceptedVehicles')}}">Check My Vehicle</a>
                You wil receive your tailored offer shortly via text or email.
                <br>
            </p>
        </div>
    </div>
</section>
    
@endsection
@push('child-scripts')
<script type="text/javascript">

</script>
@endpush
