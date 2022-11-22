@extends('frontend.dealer.layouts.app')
    @section('title','Sell your car the with Motorific')
    @section('section')
    <!-- form css -->
    <style>

    </style>

    <!-- MultiStep Form -->
<br>
<br>
<br>
<br>
<br>

<section class="create-advert-sec section">
    <div class="container-1151">
        <div class="row">
            <!-- BOX-1 -->
            <div class="col-lg-7 col-md-7">
                <div class="graybox">
                    <h2 class="headingqa-2 f-50">Create Advert for <span class="d-block">which Vehicle?</span> </h2>
                    <div class="details-field-main">
                        <label class="label-main-text f-18"> What is your vehicle registration or VIN number? </label>
                        <input class="inp-qa inp-round" type="text" type="number" >
                    </div>
                    <div class="details-field-main">
                        <label class="label-main-text f-18"> What is the mileage? </label>
                        <input class="inp-qa inp-round" type="text" type="number" >
                    </div>
                    <button class="btn-qa1 f-16 btn-filled-sm c-dull-green">Find Vehicle</button>
                </div>

            </div>
            <!-- BOX-2 -->
            <div class="col-lg-5 col-md-5">
                
            </div>
        </div>

    </div>

    <div class="car-img">
        <img src="{{ URL::asset('frontend/dealers/assets/image/car2.png')}}" class="img-fluid" alt="">
    </div>

</section>


<!-- NEWSLETTER SECTION -->
<section class="newsletter-sec" style="background-image: url({{ URL::asset('frontend/dealers/assets/image/newsletter-bg.png')}})">
    <div>
        <div class="container-1200">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="newsletter-box">
                        <h4>What are you waiting for?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore</p>
                        <input class="inp-qa f-20" type="text" placeholder="Enter REG" >
                        <button type="button" class="btn-mts f-25">
                            Value Your Car
                        </button>
                    </div>
                </div>

                <div class="col-lg-6 col-md-8">
                    <div class="newsletter-box">
                        <h4>Newsletter</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore</p>
                        <input class="inp-qa f-20" type="text" placeholder="Enter REG">
                        <button type="button" class="btn-mts f-25">
                            SUBSCRIBE
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @endsection


