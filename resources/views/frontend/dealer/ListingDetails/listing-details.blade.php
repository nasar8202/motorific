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

<section class="advert-details-sec section">
    <div class="container-1151">
        <div class="row">

            <!-- BOX-1 -->
            <div class="col-lg-6 col-md-6">

                <div class="advert-details-form d-none">
                    <form action="">
                        <h2 class="headingqa-2 f-40">Advert details</h2>
                        <div class="details-field-main">
                            <p class="label-main-text f-20"> Listing type </p>
                            <div>
                                <ul class='list-unstyled d-flex gap-4 mb-0'>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="listing_type" id="online_auction"  />
                                            <label class="dflex-gap10" for="online_auction"> 
                                                <span class="radio-circle"></span>
                                                <span>Online auction</span> 
                                            </label>
                                        </div>
                                    </li>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="listing_type" id="buy_now_only" />
                                            <label class="dflex-gap10" for="buy_now_only"> 
                                                <span class="radio-circle"></span>
                                                <span>Buy now only</span> 
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="details-field-main">
                            <label class="label-main-text f-20"> Stand in value </label>
                            <input class="inp-qa" type="text" placeholder="0" type="number" >
                        </div>

                        <div class="details-field-main mb-0">
                            <p class="label-main-text f-20"> VAT </p>
                            <div>
                                <ul class='list-unstyled d-flex gap-4 mb-0'>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="vat_field" id="plus_vat" />
                                            <label class="dflex-gap10" for="plus_vat"> 
                                                <span class="radio-circle"></span>
                                                <span>Final Price plus VAT</span> 
                                            </label>
                                        </div>
                                    </li>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="vat_field" id="no_vat" />
                                            <label class="dflex-gap10" for="no_vat"> 
                                                <span class="radio-circle"></span>
                                                <span>Final Price plus VAT</span> 
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="details-field-main confirmation-div">
                            <div class="custom-checkbox d-flex my-4">
                                <input class="hide-inp" type="checkbox" id="confirm_tac" />
                                <label class="dflex-gap10 align-items-start" for="confirm_tac"> 
                                    <span class="checkbox-square f-15">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>
                                        I confirm that all information on this advert is truthfully
                                        represented, and adheres to Dealer Auction T&C’s.
                                    </span> 
                                </label>
                            </div>
                        </div>

                        <div>
                            <button class="btn-qa1 f-25 w-100">
                                Publish advert
                            </button>
                        </div>

                        <div class="bt-btns-main d-flex">
                            <button class="btn-trans f-18 d-flex align-items-center gap-2">
                                <i class="fa-solid fa-arrow-left-long"></i>
                                <span>Go Back</span>
                            </button>
                            <button class="btn-trans f-18">
                                Save for Now
                            </button>
                        </div>
                    </form>
                </div>

                <div class="advert-details-form">
                    <form action="">
                        <h2 class="headingqa-2 f-40 mb-2">Vehicle Media</h2>
                        <h3 class="headingqa-3 f-20 c-gray mb-20">Vehicle Photos</h3>
                        
                    </form>
                </div>

            </div>

            <!-- BOX-2 -->
            <div class="col-lg-6 col-md-6">
                <div class="description-box graybox">
                    <div class="item-img">
                        <img src="{{ URL::asset('frontend/dealers/assets/image/car1.png')}}" alt="">
                    </div>
                    <div>
                        <h3 class="item-descp f-18">
                            Citroen Dispatch 1.6 Blue HDi 1000
                            Enterprise M Panel  Van 6dr Diesel
                            Manual MWB Euro 6 (s/s)
                        </h3>
                        <ul class="item-features">
                            <li> LC18KKJ </li>
                            <li> 2018(18) </li>
                            <li> Panel Van </li>
                            <li> 59.000 miles </li>
                            <li> Manual </li>
                            <li> V5 available </li>
                            <li> FInal Price Plus VAT </li>
                        </ul>
                        <p class="novalid-txt f-14">NO Valid MOT</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-end mt-4">
                    <button class="btn-qa1 f-16 btn-border-sm">Save Advert</button>
                    <button class="btn-qa1 f-16 btn-filled-sm">Publish Advert</button>
                </div>
            </div>

        </div>

    </div>
</section>



<!-- PHOTO-UPLOAD-SECTION -->
<section class="sec-7">
    <div class="sec-7-bg-img sec-1-txt">
        <div class="container-1151">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="sec-7-box">
                        <h4>What are you waiting for?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore</p>
                        <input class="mb-3" type="text" placeholder="Enter REG">
                        <!-- <button>Value Your Car</button> -->
                        <button class="btn-qa1 f-25">
                            Value Your Car
                        </button>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="sec-7-box">
                        <h4>Newsletter</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore</p>
                        <input class="mb-3" type="text">
                        <!-- <button>SUBSCRIBE</button> -->
                        <button class="btn-qa1 f-25">
                            SUBSCRIBE
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    @endsection


