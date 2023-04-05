@extends('frontend.seller.layouts.app')
@section('title','Help')
@section('section')

<!-- HEADER -->
    <header class="transparent-header">
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
                    <span>MORE</span>
                    <div class="dropdown-content">

                    <a href="{{ route('dealer.newDashboard') }}" target="_blank">For Dealers</a>

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
    
    <section class="inner-banner help">
        <div class="container-1151">
            <div class="banner-inner-cont">
                <h1>Welcome to the Motorway <br> help centre</h1>
            </div>
        </div>
    </section>
    
    <section class="help-acc-sec">
        <div class="container-1151">
            <h2 class="sec-title">Selling with Motorway</h2>
            <div class="accordion" id="help-accordion">
              <div class="accordion-item">
                <h2 class="accordion-header" >
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#helpacc1" aria-expanded="true" aria-controls="collapseOne">
                    What is Motorway?
                  </button>
                </h2>
                <div id="helpacc1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#help-accordion">
                  <div class="accordion-body">
                      <p>
                          Every day, Motorway helps hundreds of people to sell their vehicles quickly and easily, by finding them the dealer that’ll pay the most for it.
                      </p>
                        
                        <p>
                            We don’t make you choose between price and convenience - you can have both, with no extra effort. It’s also 100% free to sell with us, and we’ll guide you through the process to get a great result.
                        </p>
                        
                        <p>
                            We work with more than 5,000 verified dealers nationwide and use our smart technology to connect you with the right buyer in a few simple steps. By removing the middlemen and moving the process online, we help everyone get a better deal - quickly, safely, and without leaving home. 
                        </p>
                        
                        <p>
                            Based on your valuation and the vehicle details you share with us, we'll help you to create a professional online profile, establish a realistic reserve price and then share details about your vehicle with thousands of verified dealers across our nationwide network in an online daily sale.
                        </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" >
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpacc2" aria-expanded="false" aria-controls="collapseTwo">
                    Is it complicated to sell through Motorway?
                  </button>
                </h2>
                <div id="helpacc2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#help-accordion">
                  <div class="accordion-body">
                    <p>
                        No. To sell a vehicle with Motorway, all you need to do is enter your reg, provide the details and photos requested, accept your highest offer from our verified dealer network, then arrange free collection with the dealer at a time suitable for you. Motorway handles everything else for you.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpacc3" aria-expanded="false" aria-controls="collapseThree">
                    How do you find my highest offer?
                  </button>
                </h2>
                <div id="helpacc3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#help-accordion">
                  <div class="accordion-body">
                    <p>
                        We find your highest offer by allowing the 5,000+ verified dealers in our network to compete to buy your car in a daily sale. Dealers will have the opportunity to view your vehicle description and photos, and can submit a bid for your car.  
                    </p>
                    <p>
                        Dealers will see your reserve price and it will tell them the price you’re happy to accept for your car; however, your reserve price is only a guide. As dealers bid against each other to buy your car, you may receive far more than this amount. Our daily sales are highly competitive, with dealers nationwide competing to give you the best price, it’s therefore little wonder that more than 50% of cars that go for sale at the reserve price on Motorway achieve more than expected!
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" >
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpacc4" aria-expanded="false" aria-controls="collapseThree">
                   What are the fees to sell my vehicle through Motorway?
                  </button>
                </h2>
                <div id="helpacc4" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#help-accordion">
                  <div class="accordion-body">
                    <p>
                        Selling your vehicle with Motorway is completely free. There are no fees. Dealers pay to buy and collect your vehicle, meaning you don't have to pay a penny.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" >
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpacc5" aria-expanded="false" aria-controls="collapseThree">
                   How is my vehicle presented to your dealer network?
                  </button>
                </h2>
                <div id="helpacc5" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#help-accordion">
                  <div class="accordion-body">
                    <p>
                         When you complete your online profile, you will be asked to include info about your vehicle, including any damage. You also need to provide photos that our network of dealers will see that will inform their highest offer. Our profiles are designed to appeal directly to our dealers, showcasing your vehicle in the best way during the daily sale.
                    </p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
    
    <section class="career-sec-cta contact-cta">
         <div class="container-1151">
             <div class="career-content">
                 <h2 class="sec-title">Have more questions?</h2>
                 <p class="sec-desc">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam
                 </p>
                 <a href="#" class="globel-btn career-btn">Contact us</a>
             </div>
         </div>
    </section>


 
    

@endsection
@push('child-scripts')
@endpush
