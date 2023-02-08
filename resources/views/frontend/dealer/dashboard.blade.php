    @extends('frontend.dealer.layouts.app')
    @section('title','Sell your car the with Motorific')
    @section('section')
    

   <!--Banner  Section-->
    
   <section class="banner-sec dealer">
    <div class="container-1170">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="banner-content">
                    <h1 class="sec-heading fs-50">Buy smart. Buy direct <br> from private sellers.</h1>
                    <p class="sec-desc">Find your best offer from over 5,000 dealers and sell <br> for up to £1,000* more. It’s that easy.</p>
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
                    <h2 class="sec-heaing fs-50">100s vehicles for sale</h2>
                    <p class="sec-desc">Find your best offer from over 5,000 dealers and sell <br> for up to £1,000* more. It’s that easy.</p>
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
    <section class="products-sec sec-padding">
        <div class="container-1170">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="sec-heaing fs-50 ">
                        Live sale ends in: <span class="time-txt">6h 48m</span>
                    </h2>
                    <p  class="sec-desc">
                    Find your best offer from over 5,000 dealers and sell <br> for up to £1,000* more. It’s that easy.
                    </p>
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
    </section>

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
                        <a href="#" class="prim-btn secnd">Get In Touch</a>
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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hw-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/icon3.png') }}" alt="">
                                </div>
                                <div class="icon-content">
                                    <h3>Bid easily online</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hw-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/icon4.png') }}" alt="">
                                </div>
                                <div class="icon-content">
                                    <h3>We close the sale for you</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </p>
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
                            <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false">
                            <span class="hw-ac-img"><img src="{{ URL::asset('frontend/dealers/assets/image/images/hw-icon2.png') }}" alt=""></span> Browse exclusive stock
                            </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#hwAccordians">
                            <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <span class="hw-ac-img"><img src="{{ URL::asset('frontend/dealers/assets/image/images/hw-icon3.png') }}" alt=""></span> Bid easily online
                            </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#hwAccordians">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-headingFour" aria-expanded="false" aria-controls="flush-collapseThree">
                            <span class="hw-ac-img"><img src="{{ URL::asset('frontend/dealers/assets/image/images/hw-icon4.png') }}" alt=""></span> We close the sale for you
                            </button>
                            </h2>
                            <div id="flush-headingFour" class="accordion-collapse collapse" data-bs-parent="#hwAccordians">
                                <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
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
                                <p>All cars are direct from private owners, exclusively available for our dealers to bid on and buy in our daily online sales.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="service-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/s-icon2.png') }}" alt=""></div>
                                <h3>Market-leading profiles</h3>
                                <p>All cars are direct from private owners, exclusively available for our dealers to bid on and buy in our daily online sales.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="service-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/s-icon3.png') }}" alt=""></div>
                                <h3>The right price</h3>
                                <p>All cars are direct from private owners, exclusively available for our dealers to bid on and buy in our daily online sales.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="service-box">
                                <div class="icon-box">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/s-icon4.png') }}" alt=""></div>
                                <h3>100% online purchasing</h3>
                                <p>All cars are direct from private owners, exclusively available for our dealers to bid on and buy in our daily online sales.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Testimoniaol Section -->
    <section class="testimonails-sec">
        <div class="container-1170">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="sec-heading fs-50">Our happy customers</h2>
                    <h3 class="user-ratings">Rated Excellent
                         <span class="sars-icons">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                         </span> 
                         by 5,000+ Users</h3>
                </div>
                <div class="col-12">
                    <div class="row testi-wraper">
                        <div class="col-12">
                            <div class="testi-box">
                                <p class="user-comment">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,containing Lorem Ipsum passages, and more recently with desktop
                                </p>
                                <div class="user-profile">
                                    <div class="img">
                                        <img src="{{ URL::asset('frontend/dealers/assets/image/images/pro1.png') }}" alt="">
                                    </div>
                                    <div class="user-name">
                                        <h4>Mark, Homestay </h4>
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
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,containing Lorem Ipsum passages, and more recently with desktop
                                </p>
                                <div class="user-profile">
                                    <div class="img">
                                        <img src="{{ URL::asset('frontend/dealers/assets/image/images/pro2.png') }}" alt="">
                                    </div>
                                    <div class="user-name">
                                        <h4>Mark, Homestay </h4>
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
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,containing Lorem Ipsum passages, and more recently with desktop
                                </p>
                                <div class="user-profile">
                                    <div class="img">
                                        <img src="{{ URL::asset('frontend/dealers/assets/image/images/pro3.png') }}" alt="">
                                    </div>
                                    <div class="user-name">
                                        <h4>Mark, Homestay </h4>
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
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,containing Lorem Ipsum passages, and more recently with desktop
                                </p>
                                <div class="user-profile">
                                    <div class="img">
                                        <img src="{{ URL::asset('frontend/dealers/assets/image/images/pro2.png') }}" alt="">
                                    </div>
                                    <div class="user-name">
                                        <h4>Mark, Homestay </h4>
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
    </section>

    <!-- ENd -->

    <!-- Stock Cta Section -->
    <section class="stock-cta">
        <div class="container-1170">
            <h2>Motorific</h2>
            <h3>Supercharge your stock acquisition <br> and buy direct with Motorway</h3>
            <a href="{{ route('dealer.dashboard') }}" class="prim-btn">Browse Vechicles</a>
        </div>
    </section>

    <!-- End -->






    @endsection


