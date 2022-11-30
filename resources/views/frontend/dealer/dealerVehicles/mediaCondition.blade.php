@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>

</style>

<!-- MultiStep Form -->
<br>

<section class="advert-details-sec section">
<div class="container-1200">
    <div class="row">

        <!-- BOX-1 -->
        <div class="col-lg-6 col-md-8">

            <div class="advert-details-form step1 show">
                <form action="{{ route('dealer.mediaConditionPost') }}" method="POST">
                    @csrf
                    <h2 class="headingqa-2 f-40">Advert details</h2>
                    <div class="details-field-main">
                        <p class="label-main-text f-20"> Listing type </p>
                        <div>
                            <ul class='list-unstyled d-flex gap-4 mb-0'>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="listing_type" id="online_auction" value="Online auction"  />
                                        <label class="dflex-gap10" for="online_auction">
                                            <span class="radio-circle"></span>
                                            <span>Online auction</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="listing_type" id="buy_now_only" value="Buy now only"  />
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
                        <input class="inp-qa f-20" type="text" placeholder="0" name="stand_in_value" >
                    </div>

                    <div class="details-field-main mb-0">
                        <p class="label-main-text f-20"> VAT </p>
                        <div>
                            <ul class='list-unstyled d-flex gap-4 mb-0'>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="vat" id="plus_vat" value="Final Price plus VAT" />
                                        <label class="dflex-gap10" for="plus_vat">
                                            <span class="radio-circle"></span>
                                            <span>Final Price plus VAT</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="vat" id="no_vat"  value="Final Price plus VAT" />
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
                            <input class="hide-inp" type="checkbox" name="confirm"  id="confirm_tac" />
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

                    {{-- <div>
                        <button type="button" class="btn-qa1 f-25 w-100">
                            Publish advert
                        </button>
                    </div> --}}

                    <div class="bt-btns-main d-flex">
                        <button type="button" class="btn-trans">
                            <i class="fa-solid fa-arrow-left-long"></i>
                            <a href="{{ route('dealer.addVehicleToSellFromDealer') }}" class="btn btn-danger pull-right">Previous</a>
                        </button>

                        <button type="submit" class="btn-trans step1-btn-save">
                           Save for Now

                        </button>
                    </div>
                </form>
            </div>


        </div>

        <!-- BOX-2 -->
        <div class="col-lg-6 col-md-8">
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
            {{-- <div class="d-flex gap-2 justify-content-end mt-4">
                <button type="button" class="btn-qa1 f-16 btn-border-sm">Save Advert</button>
                <button type="button" class="btn-qa1 f-16 btn-filled-sm">Publish Advert</button>
            </div> --}}
        </div>

    </div>

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

