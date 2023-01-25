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

<section class="sec-1" id="vehicle_registration">
    <div class="container-1151">
        <div class="row">
            <div class="sec-1-txt col-lg-6">
                <h2>Sell your car the
                    with <span>Motorific</span></h2>
                <p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>
            
            </div>
            <div class="sec-1-img col-lg-6">
                <img src="{{ URL::asset('frontend/seller/assets/image/sec-1-vector.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!-- SECTION-2 -->
    <div class="container-1151">
             <div class="how-work">
            <h3>How to sell a car with Motorfic </h3>
        </div>
        <div class="overview-sections">
        <div class="overview-section">
        <div class="overview-section__icon">
        <svg class="inline-icon inline-icon--medium inline-icon__outline inline-icon__outline--black" viewBox="0 0 24 24">
        <path d="M20 10L19.1977 2.77914C19.0851 1.76627 18.229 1 17.2099 1H6.79009C5.77099 1 4.91486 1.76627 4.80232 2.77914L4 10M20 10H4M20 10L21 11L21.4142 11.4142C21.7893 11.7893 22 12.298 22 12.8284V19H2V12.8284C2 12.298 2.21071 11.7893 2.58579 11.4142L4 10M21 19V23H17V19M7 19V23H3V19H7Z" vector-effect="non-scaling-stroke"></path>
        <path d="M6 14H8" vector-effect="non-scaling-stroke"></path>
        <path d="M16 14H18" vector-effect="non-scaling-stroke"></path>
        
        </svg>
        
        
        </div>
        <h3 class="overview-section__heading">
        1.
        Tell us about your car
        
        </h3>
        <p class="overview-section__content">
        Add some basic details about your car and start receiving free car valuations within minutes – there are no hidden fees or costs.
        
        </p>
        </div>
        <div class="overview-section">
        <div class="overview-section__icon">
        <svg class="inline-icon inline-icon--medium inline-icon__outline inline-icon__outline--black" viewBox="0 0 24 24">
        <path d="M14 11L17 14" vector-effect="non-scaling-stroke"></path>
        <path d="M11 14L14 17" vector-effect="non-scaling-stroke"></path>
        <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10ZM8 10V23M14 23L23 14L11 2H2V11L14 23Z" vector-effect="non-scaling-stroke"></path>
        
        </svg>
        
        
        </div>
        <h3 class="overview-section__heading">
        2.
        3,000+ trusted dealers will compete to buy your car
        
        </h3>
        <p class="overview-section__content">
        Our nationwide network of dealers will make their best offers in our auctions.
        
        </p>
        </div>
        <div class="overview-section">
        <div class="overview-section__icon">
        <svg class="inline-icon inline-icon--medium inline-icon__outline inline-icon__outline--black" viewBox="0 0 24 24">
        <path d="M6 6V5C6 3.3 7.3 2 9 2H15C16.7 2 18 3.3 18 5V6M13.5 16H2V6H23V16H20M20 16C20 19.9 16.9 23 13 23C9.1 23 6 19.9 6 16M20 16V9C18.3 9 17 10.3 17 12V14C14.8 14 13 15.8 13 18" vector-effect="non-scaling-stroke"></path>
        <path d="M11 13C12.1046 13 13 12.1046 13 11C13 9.89543 12.1046 9 11 9C9.89543 9 9 9.89543 9 11C9 12.1046 9.89543 13 11 13Z" vector-effect="non-scaling-stroke"></path>
        
        </svg>
        
        
        </div>
        <h3 class="overview-section__heading">
        3.
        Easy payment and free collection
        
        </h3>
        <p class="overview-section__content">
        Once the auction is up your car will be sold to the winning dealer. They’ll collect it at a time that suits and pay you right away!
        
        </p>
        </div>
        
        </div>
        </div>
<section class="sec-2">
    <div class="container-1151">

    

            <!-- BOX-1 -->
      

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


        </div>
</section>

<!-- SECTION-3 -->
    <div class="container-1151">
        <div class="car-selling__benefits">
       
         <div class="how-work">
            <h3>   Why sell your used car with carwow</h3>
        </div>
        <ul class="list-icon car-selling__benefits-list">
        <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
        <h4 class="car-selling__benefits-list-item-title">
        We check thousands of dealers
        </h4>
        <p class="car-selling__benefits-list-item-desc">
        We save you the bother of hunting around for the best price to sell your old car
        </p>
        </li>
        <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
        <h4 class="car-selling__benefits-list-item-title">
        Dealers compete to buy your car
        </h4>
        <p class="car-selling__benefits-list-item-desc">
        We make the process of selling a car to a dealer easier. Any buyers who are interested in bidding will offer you their best price
        </p>
        </li>
        <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
        <h4 class="car-selling__benefits-list-item-title">
        You will sell your car online for free
        </h4>
        <p class="car-selling__benefits-list-item-desc">
        No fees. No hidden costs. All the money from the sale is yours to spend how you want
        </p>
        </li>
        <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
        <h4 class="car-selling__benefits-list-item-title">
        Avoid the hassle of the private sale
        </h4>
        <p class="car-selling__benefits-list-item-desc">
        Skip the struggle of selling a vehicle privately. You may also get more for it than if you were to try part exchange
        </p>
        </li>
        <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
        <h4 class="car-selling__benefits-list-item-title">
        Sell your car for what it's really worth
        </h4>
        <p class="car-selling__benefits-list-item-desc">
        Get a realistic valuation of your car's worth, not an automated price to be chipped down later
        </p>
        </li>
        <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
        <h4 class="car-selling__benefits-list-item-title">
        Sell your car fast and get paid the same day
        </h4>
        <p class="car-selling__benefits-list-item-desc">
        The chosen dealer will contact you to make payment and arrange free home collection
        </p>
        </li>
        <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
        <h4 class="car-selling__benefits-list-item-title">
        Buy and sell your car in one place
        </h4>
        <p class="car-selling__benefits-list-item-desc">
        We can also help you find your next car to buy, without the hassle or haggle
        </p>
        </li>
        <li class="list-icon__item list-icon__item--check car-selling__benefits-list-item">
        <h4 class="car-selling__benefits-list-item-title">
        Outstanding finance cars accepted
        </h4>
        <p class="car-selling__benefits-list-item-desc">
        We can help you sell your car even if it has outstanding finance to settle
        </p>
        </li>
        </ul>
        </div>
    </div>
    

@endsection
@push('child-scripts')
<script type="text/javascript">

</script>
@endpush
