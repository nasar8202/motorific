@extends('frontend.seller.layouts.app')
@section('title','About Us')
@section('section')
@section('headerClass','transparent-header')
@section('headerUlClass','navlinks-w')
@section('logoMain','frontend/seller/assets/image/logo-w.png')
@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4')



    <section class="inner-banner about">
        <div class="container-1151">
            <div class="banner-inner-cont">
                <h1>About Us</h1>
                <p>
                    Motorway started in 2017 with a vision to build a better car market for everyone, harnessing the power of technology to deliver an amazing experience.
                </p>
                <p>
                    We help everyone to quickly and easily sell their car for the best price from the comfort of home, using only a phone.
                </p>
            </div>
        </div>
    </section>
    
    <section class="about-sec2">
        <div class="container-1151">
            <div class="row align-items-center abt-cont-wraper1">
                <div class=col-md-6>
                    <div class="about-content">
                        <p>
                            With our network of more than 5,000 professional car dealers directly bidding on vehicles, we enable our customers to sell their cars in as little as 24 hours – whilst supporting our car dealer partners to acquire the best possible used car stock, 100% online.<br> <br>

                                This is the way to sell your car. This is the Motorway.
                        </p>
                    </div>
                </div>
                <div class=col-md-6>
                    <div class="about-img-box">
                        <img src="{{ URL::asset('frontend/seller/assets/image/abt-img.webp') }}">
                    </div>
                </div>
            </div>
            <div class="row align-items-center abt-cont-wraper2">
                <div class=col-md-6>
                    <div class="about-img-box">
                        <img src="{{ URL::asset('frontend/seller/assets/image/abt2-img.webp') }}">
                    </div>
                </div>
                <div class=col-md-6>
                    <div class="about-content">
                        <p>
                            With our network of more than 5,000 professional car dealers directly bidding on vehicles, we enable our customers to sell their cars in as little as 24 hours – whilst supporting our car dealer partners to acquire the best possible used car stock, 100% online.<br> <br>

                                This is the way to sell your car. This is the Motorway.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="team-sec">
        <div class="container-1151">
            <h2 class="sec-title">Our team</h2>
            <p class="sec-desc">Motorway is a team of over 400 people located across our two offices - London and Brighton, as well as remotely around the world. Our team includes world-class talent in engineering, product design, operations, customer service, sales and marketing.
            </p>
            <div class="team-main">
                <h3 class="sec-title">Executive team</h3>
                <div class="team-wraper">
                    <div class="team-box">
                        <div class="team-img">
                            <img src="{{ URL::asset('frontend/seller/assets/image/img1.jpg') }}">
                            
                        </div>
                        <h4 class="t-name">Tom Leathes</h4>
                        <p class="t-designation">Co-founder & CEO</p>
                    </div>
                    <div class="team-box">
                        <div class="team-img">
                            <img src="{{ URL::asset('frontend/seller/assets/image/img2.jpg') }}">
                            
                        </div>
                        <h4 class="t-name">Harry Jones</h4>
                        <p class="t-designation">Co-founder & CPO</p>
                    </div>
                    <div class="team-box">
                        <div class="team-img">
                            <img src="{{ URL::asset('frontend/seller/assets/image/img3.jpg') }}">
                            
                        </div>
                        <h4 class="t-name">James Wilson</h4>
                        <p class="t-designation">COO</p>
                    </div>
                    <div class="team-box">
                        <div class="team-img">
                            <img src="{{ URL::asset('frontend/seller/assets/image/img4.jpg') }}">
                            
                        </div>
                        <h4 class="t-name">Lloyd Page</h4>
                        <p class="t-designation">CMO</p>
                    </div>
                    <div class="team-box">
                        <div class="team-img">
                            <img src="{{ URL::asset('frontend/seller/assets/image/img5.jpg') }}">
                            
                        </div>
                        <h4 class="t-name">Alex Buttle</h4>
                        <p class="t-designation">Co-founder & VP Growth</p>
                    </div>
                    <div class="team-box">
                        <div class="team-img">
                            <img src="{{ URL::asset('frontend/seller/assets/image/img6.jpg') }}">
                            
                        </div>
                        <h4 class="t-name">Jen Craddock</h4>
                        <p class="t-designation">VP People</p>
                    </div>
                    <div class="team-box">
                        <div class="team-img">
                            <img src="{{ URL::asset('frontend/seller/assets/image/img7.jpg') }}">
                            
                        </div>
                        <h4 class="t-name">Asif Ghulamali</h4>
                        <p class="t-designation">VP Finance</p>
                    </div>
                    <div class="team-box">
                        <div class="team-img">
                            <img src="{{ URL::asset('frontend/seller/assets/image/img8.jpg') }}">
                            
                        </div>
                        <h4 class="t-name">Matt Sleeman</h4>
                        <p class="t-designation">VP Engineering</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="career-sec-cta">
         <div class="container-1151">
             <div class="career-content">
                 <h2 class="sec-title">Careers</h2>
                 <p class="sec-desc">We are always looking for talented, driven individuals to join the team. You can read more about working at Motorway and our open positions on our careers page.
                 </p>
                 <a href="/careers" class="globel-btn career-btn">Find out more</a>
             </div>
         </div>
    </section>
    
    <section class="invest-sec">
         <div class="container-1151">
             <div class="invest-content">
                 <h2 class="sec-title">Investors</h2>
                 <p class="sec-desc">Motorway is backed by some of the world’s leading technology and marketplace investors.
                 </p>
                 <div class="invest-logos">
                     <a href="#">
                         <img src="{{ URL::asset('frontend/seller/assets/image/logo1.webp') }}" class="logo">
                     </a>
                     <a href="#">
                         <img src="{{ URL::asset('frontend/seller/assets/image/logo2.webp') }}" class="logo">
                     </a>
                     <a href="#">
                         <img src="{{ URL::asset('frontend/seller/assets/image/logo3.webp') }}" class="logo">
                     </a>
                     <a href="#">
                         <img src="{{ URL::asset('frontend/seller/assets/image/logo4.webp') }}" class="logo">
                     </a>
                     <a href="#">
                         <img src="{{ URL::asset('frontend/seller/assets/image/logo5.webp') }}" class="logo">
                     </a>
                 </div>
             </div>
         </div>
    </section>
    
    <section class="sellCar-sec">
         <div class="container-1151">
             <div class="invest-content">
                 <h2 class="sec-title">Sell your car the Motorway way</h2>
                 <form class="sell-form">
                     <div class="form-group">
                         <input type="text" class="form-control" placeholder="Enter Your Reg">
                         <button type="submit" class="globel-btn">Value your car</button>
                     </div>
                 </form>
                 </div>
             </div>
         </div>
    </section>

@endsection
@push('child-scripts')
@endpush
