    @extends('frontend.dealer.layouts.app')
    @section('title','Sell My Car Online - Motorific')
    @section('keyword', 'sell car online, sell my car online')
    @section('description', 'At Motorific we understand the challenges of selling your car. We provide rapid, simple, and hassle-free services where you can sell your car online.')
    @section('section')
    

   <!--Banner  Section-->
    
   <section class="banner-sec dealer">
    <div class="container-1170">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="banner-content">
                    <!--<h1 class="sec-heading fs-50">Buy smart. Buy direct <br> from private sellers.</h1>-->
                    <!--<p class="sec-desc">Find your best offer from over 5,000 dealers and sell <br> for up to £1,000* more. It’s that easy.</p>-->
                    <h1 class="sec-heading fs-50">Get In Driver’s Seat of Your Business</h1>
                    <p class="sec-desc">Use Motorific to increase your profits because it is the quickest way to sell car
                    online. You can sell your car on our simple platform in a matter of minutes. Just
                    give us a few pieces of basic information about your car, and we'll give you a
                    prompt valuation.</p>
                    <a href="{{ route('dealer.dashboard') }}" class="prim-btn">Browse Vechicles</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="banner-img">
                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/img01.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
   </section>
   
   <!--End-->


   <!-- Brands Section -->
    <section class="brands-sec">
        <div class="container-1170">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <!--<h2 class="sec-heaing fs-50">100s vehicles for sale</h2>-->
                    <!--<p class="sec-desc">Find your best offer from over 5,000 dealers and sell <br> for up to £1,000* more. It’s that easy.</p>-->
                    <h2 class="sec-heaing fs-50">Join Motorific & Connect With thousands Car Buyers & Sellers</h2>
                    <p class="sec-desc">Gain exclusive access to thousands of high-intent car buyers & best stock in the UK through our industry-specific platform.</p>
                </div>
                <div class="col-md-4">
                    <div class="btn-wraper">
                        <a href="{{ route('dealer.dashboard') }}" class="prim-btn">Browse Vechicles</a>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="brands-slider">
                        <div class="brand">
                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/b1.png') }}" alt="">
                        </div>
                        <div class="brand">
                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/b2.png') }}" alt="">
                        </div>
                        <div class="brand">
                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/b3.png') }}" alt="">
                        </div>
                        <div class="brand">
                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/b4.png') }}" alt="">
                        </div>
                        <div class="brand">
                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/b5.png') }}" alt="">
                        </div>
                        <div class="brand">
                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/b6.png') }}" alt="">
                        </div>
                        <div class="brand">
                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/b7.png') }}" alt="">
                        </div>
                        <div class="brand">
                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/b1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- End -->

    <!-- Products Section -->
    {{-- <section class="products-sec sec-padding">
        <div class="container-1170">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="sec-heaing fs-50 ">
                        Live sale ends in: <span class="time-txt">6h 48m</span>
                    </h2>
                    <!--<p  class="sec-desc">Find your best offer from over 5,000 dealers and sell <br> for up to £1,000* more. It’s that easy.</p>-->
                    <p  class="sec-desc">Shift your sales into high gear. Effortlessly browse and purchase cars from vast inventory. Our experts daily verify all new listings.</p>
                </div>
                <div class="col-12 ">
                    <div class="procuts-wraper">
                        <div class="row products-slide">
                            <div class="col-lg-4 col-sm-6">
                                <a href="{{ route('dealer.dashboard') }}" class="product-main">
                                    <div class="product-card">
                                        <div class="produc-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/car1.png') }}" alt="">
                                        </div>
                                        <div class="p-content">
                                            <h3 class="p-title">Fiat 500 Sport</h3>
                                            <ul class="p-spec">
                                                <li>2020</li>
                                                <li>10,550 miles</li>
                                                <li>Petrol</li>
                                                <li>Manual</li>
                                            </ul>
                                            <div class="p-cate-list">
                                                <span class="p-code gold">MX20 XGU</span>
                                                <span class="p-location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                161 Mi away
                                                </span>
                                            </div>
                                            <h5 class="p-price">Reserve price: <span >£9,240</span></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a href="{{ route('dealer.dashboard') }}" class="product-main">
                                    <div class="product-card">
                                        <div class="produc-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/car2.png') }}" alt="">
                                        </div>
                                        <div class="p-content">
                                            <h3 class="p-title">Fiat 500 Sport</h3>
                                            <ul class="p-spec">
                                                <li>2020</li>
                                                <li>10,550 miles</li>
                                                <li>Petrol</li>
                                                <li>Manual</li>
                                            </ul>
                                            <div class="p-cate-list">
                                                <span class="p-code gold">MX20 XGU</span>
                                                <span class="p-location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                161 Mi away
                                                </span>
                                            </div>
                                            <h5 class="p-price">Reserve price: <span >£9,240</span></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a href="{{ route('dealer.dashboard') }}" class="product-main">
                                    <div class="product-card">
                                        <div class="produc-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/car3.png') }}" alt="">
                                        </div>
                                        <div class="p-content">
                                            <h3 class="p-title">Fiat 500 Sport</h3>
                                            <ul class="p-spec">
                                                <li>2020</li>
                                                <li>10,550 miles</li>
                                                <li>Petrol</li>
                                                <li>Manual</li>
                                            </ul>
                                            <div class="p-cate-list">
                                                <span class="p-code gold">MX20 XGU</span>
                                                <span class="p-location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                161 Mi away
                                                </span>
                                            </div>
                                            <h5 class="p-price">Reserve price: <span >£9,240</span></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a href="{{ route('dealer.dashboard') }}" class="product-main">
                                    <div class="product-card">
                                        <div class="produc-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/car2.png') }}" alt="">
                                        </div>
                                        <div class="p-content">
                                            <h3 class="p-title">Fiat 500 Sport</h3>
                                            <ul class="p-spec">
                                                <li>2020</li>
                                                <li>10,550 miles</li>
                                                <li>Petrol</li>
                                                <li>Manual</li>
                                            </ul>
                                            <div class="p-cate-list">
                                                <span class="p-code gold">MX20 XGU</span>
                                                <span class="p-location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                161 Mi away
                                                </span>
                                            </div>
                                            <h5 class="p-price">Reserve price: <span >£9,240</span></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a href="{{ route('dealer.dashboard') }}" class="product-main">
                                    <div class="product-card">
                                        <div class="produc-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/images/car1.png') }}" alt="">
                                        </div>
                                        <div class="p-content">
                                            <h3 class="p-title">Fiat 500 Sport</h3>
                                            <ul class="p-spec">
                                                <li>2020</li>
                                                <li>10,550 miles</li>
                                                <li>Petrol</li>
                                                <li>Manual</li>
                                            </ul>
                                            <div class="p-cate-list">
                                                <span class="p-code gold">MX20 XGU</span>
                                                <span class="p-location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                161 Mi away
                                                </span>
                                            </div>
                                            <h5 class="p-price">Reserve price: <span >£9,240</span></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- End -->


    <!-- How it Works -->
    <section class="hw-sec">
        <div class="container-1170">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h2 class="sec-heading fs-50">How it works</h2>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="btn-wraper">
                        <a href="{{ route('dealer.dashboard') }}" class="prim-btn">Browse Vechicles</a>
                        <a href="#"  onclick="window.location='{{ url("/get-in-touch") }}'" class="prim-btn secnd">Get In Touch</a>
                    </div>
                </div>
                <div class="col-12 d-md-block d-none">
                    <div class="row hw-wraper">
                        <div class="col-lg-3 col-md-6">
                            <div class="hw-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/icon1.png') }}" alt="">
                                </div>
                                <div class="icon-content">
                                    <h3>Join Motorific for free</h3>
                                    <p>Get yourself registered as a dealer for free & leverage the platform for stock acquisition and instant car sales. Only pay for the leads you receive!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hw-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/icon2.png') }}" alt="">
                                </div>
                                <div class="icon-content">
                                    <h3>Browse exclusive stock</h3>
                                    <p>Elevate your inventory with Motorific’s dealer-only stock & get your hands on the most sought-after cars.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hw-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/icon3.png') }}" alt="">
                                </div>
                                <div class="icon-content">
                                    <!--<h3>Bid easily online</h3>-->
                                    <h3>Bid Online</h3>
                                    <p>Post ads for free, reach out to thousands of high-intent car buyers and get the best possible prices for your stock.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hw-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/icon4.png') }}" alt="">
                                </div>
                                <div class="icon-content">
                                    <!--<h3>We close the sale for you</h3>-->
                                    <h3>We Close Sale For You</h3>
                                    <p>You pick the highest bid for your car and we close the sale for you like a pro!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12  d-md-none d-block">
                    <!-- Accordian Mobile -->
                    <div class="accordion accordion-flush hw-accordian" id="hwAccordians">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false">
                            <span class="hw-ac-img"><img src="{{ URL::asset('frontend/dealers/assets/image/images/hw-icon1.png') }}" alt=""></span> Join Motorific for free
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#hwAccordians">
                            <div class="accordion-body">Get yourself registered as a dealer for free & leverage the platform for stock acquisition and instant car sales. Only pay for the leads you receive!</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false">
                            <span class="hw-ac-img"><img src="{{ URL::asset('frontend/dealers/assets/image/images/hw-icon2.png') }}" alt=""></span> Browse exclusive stock
                            </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#hwAccordians">
                            <div class="accordion-body">Elevate your inventory with Motorific’s dealer-only stock & get your hands on the most sought-after cars.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <span class="hw-ac-img"><img src="{{ URL::asset('frontend/dealers/assets/image/images/hw-icon3.png') }}" alt=""></span> Bid Online
                            </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#hwAccordians">
                                <div class="accordion-body">Post ads for free, reach out to millions of high-intent car buyers and get the best possible prices for your stock.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                            <span class="hw-ac-img"><img src="{{ URL::asset('frontend/dealers/assets/image/images/hw-icon4.png') }}" alt=""></span> We Close Sale For You
                            </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#hwAccordians">
                                <div class="accordion-body">You pick the highest bid for your car and we close the sale for you like a pro!
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End -->
                </div>
            </div>

        </div>
    </section>

    <!-- End -->

    <!-- Services Section -->
    <section class="services-sec">
        <div class="container-1170">
            <div class="row g-0 align-items-center">
                <div class="col-lg-5">
                </div>
                <div class="col-lg-7">
                    <div class="row service-wraper">
                        <div class="col-sm-6">
                            <div class="service-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/s-icon1.png') }}" alt="">
                                </div>
                                <h3>The best stock every day</h3>
                                <p>Hundreds of private car owners list their used cars every month on Motorific Register for free to get exclusive access to high-demand cars and elevate your stock.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="service-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/s-icon2.png') }}" alt=""></div>
                                <h3>Market-leading Profiles</h3>
                                <p>The used cars are listed directly by private owners. All listings are verified and approved by our experts.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="service-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/s-icon3.png') }}" alt=""></div>
                                <h3>The Right Price</h3>
                                <p>Get more out of every sale by paying the price that suits your dealership's needs and budget.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="service-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/s-icon4.png') }}" alt=""></div>
                                <h3>100% Online Purchase</h3>
                                <p>Browse, bid, buy, and sell cars entirely online, from the comfort of your dealership.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Testimoniaol Section -->
    <!-- <section class="testimonails-sec">
        <div class="container-1170">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="sec-heading fs-50">Dealers Success Stories</h2>
                    <h3 class="user-ratings">Real stories from real customers. Rated 5-star 
                         <span class="sars-icons">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                         </span> 
                         by over 1000 dealers.</h3>
                </div>
                <div class="col-12">
                    <div class="row testi-wraper">
                    <div class="col-12">
                            <div class="testi-box">
                                <p class="user-comment">
                                From start to finish, the experience with Motorific.co.uk was top-notch. The website is incredibly user-friendly and easy to navigate, making it simple to search for the make and model of the car you want to buy. The team behind this website is truly knowledgeable and experienced, and they provide you with all the information you need to make an informed decision about which car to choose.<br><br> What impressed me the most, however, was the efficient and streamlined process of selling my old car. The process was simple and stress-free, and most importantly, the team at Motorific.co.uk gave me a fair price for my car. I was able to sell my car quickly and easily, without any hassle or headache. <br><br> All in all, I highly recommend Motorific.co.uk for anyone looking to buy or sell a car. Whether you're in the market for a new set of wheels or looking

                                </p>
                                <div class="user-profile">
                                    <div class="img">
                                        <img src="{{ URL::asset('frontend/dealers/assets/image/images/pro2.png') }}" alt="">
                                    </div>
                                    <div class="user-name">
                                        <h4>Arish Ukani </h4>
                                        <div class="rated-stars">            
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="testi-box">
                                <p class="user-comment">
                                    Motorific sold my Audi A5. Great service, easy process, excellent outcome. Very professional, I'm a happy customer.
                                </p>
                                <div class="user-profile">
                                    <div class="img">
                                        <img src="{{ URL::asset('frontend/dealers/assets/image/images/pro1.png') }}" alt="">
                                    </div>
                                    <div class="user-name">
                                        <h4>Mrs Kumar</h4>
                                        <div class="rated-stars">            
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-12">
                            <div class="testi-box">
                                <p class="user-comment">
                                Very professional and dedicated Team with Best Customer Services experience.
                                Recommend to everyone
                                </p>
                                <div class="user-profile">
                                    <div class="img">
                                        <img src="{{ URL::asset('frontend/dealers/assets/image/images/pro3.png') }}" alt="">
                                    </div>
                                    <div class="user-name">
                                        <h4>Very professional and dedicated Team… </h4>
                                        <div class="rated-stars">            
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- ENd -->

    <!-- Stock Cta Section -->
    <section class="stock-cta">
        <div class="container-1170">
            <h2>Motorific</h2>
            <p>Supercharge your inventory acquisition and purchase direct with Motorific. connecting sellers direct with Dealers </p>
            <a href="{{ route('dealer.dashboard') }}" class="prim-btn">Browse Vechicles</a>
        </div>
    </section>

    <!-- End -->






    @endsection


