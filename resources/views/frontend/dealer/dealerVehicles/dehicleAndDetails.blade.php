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

            <form action="{{ route('dealer.vehicleListing') }}" method="POST">
                @csrf
                    <h2 class="headingqa-2 f-40 mb-2">Vehicle Media</h2>
                    {{-- <h3 class="headingqa-3 f-20 c-gray mb-20">Vehicle Photos</h3>
                    <div class="upload-img-box graybox">
                        <label for="upload_image1" class="custom-upload-image">
                            <input type="file" name="upload_image" id="upload_image1"  class="hide-inp">
                            <span class="add-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/add-icon.png')}}" alt="Add" class="img-fluid">
                            </span>
                        </label>
                        <p class="f-18 c-gray mb-0">Upload Photos or drag & drop here</p>
                        <button type="button" class="btn-qa1 f-16 btn-border-sm mt-0" >Hide Photo guides</button>
                    </div>
                    <div class="progressbar mt-10">
                        <span></span>
                    </div>
                    <p class="progress-count f-18 c-gray mt-10"> 0/150 </p>
                    <p class="purple-box">
                        Kindly <span class="f-bold">drag</span> your vehicle photos to the relevant sections.
                    </p> --}}

                    <div class="mt-40">
                        <p class="gallery-top-text mb-10 f-18">Exterior</p>
                        <div class="gallery-upload-main">
                            <label for="image_1" class="custom-gallery-upload">
                                <input type="file" name="image_1" id="image_1" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img1.png')}}" alt="car image" >
                            </label>
                            <label for="image_2" class="custom-gallery-upload">
                                <input type="file" name="image_2" id="image_2" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img2.png')}}" alt="car image" >
                            </label>
                            <label for="image_3" class="custom-gallery-upload">
                                <input type="file" name="image_3" id="image_3" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img3.png')}}" alt="car image" >
                            </label>
                            <label for="image_4" class="custom-gallery-upload">
                                <input type="file" name="image_4" id="image_4" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img4.png')}}" alt="car image" >
                            </label>
                            <label for="image_5" class="custom-gallery-upload">
                                <input type="file" name="image_5" id="image_5" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img5.png')}}" alt="car image" >
                            </label>
                            <label for="image_6" class="custom-gallery-upload">
                                <input type="file" name="image_6" id="image_6" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img6.png')}}" alt="car image" >
                            </label>
                            <label for="image_7" class="custom-gallery-upload">
                                <input type="file" name="image_7" id="image_7" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img7.png')}}" alt="car image" >
                            </label>
                            <label for="image_8" class="custom-gallery-upload">
                                <input type="file" name="image_8" id="image_8" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img8.png')}}" alt="car image" >
                            </label>
                            <label for="image_9" class="custom-gallery-upload">
                                <input type="file" name="image_9" id="image_9" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img9.png')}}" alt="car image" >
                            </label>
                        </div>
                    </div>

                    <div class="mt-40">
                        <p class="gallery-top-text mb-10 f-18">Interior</p>
                        <div class="gallery-upload-main">
                            <label for="interior_image_1" class="custom-gallery-upload">
                                <input type="file" name="interior_image_1" id="interior_image_1" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img10.png')}}" alt="car image" >
                            </label>
                            <label for="interior_image_2" class="custom-gallery-upload">
                                <input type="file" name="interior_image_2" id="interior_image_2" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img11.png')}}" alt="car image" >
                            </label>
                            <label for="interior_image_3" class="custom-gallery-upload">
                                <input type="file" name="interior_image_3" id="interior_image_3" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img12.png')}}" alt="car image" >
                            </label>
                            <label for="interior_image_4" class="custom-gallery-upload">
                                <input type="file" name="interior_image_4" id="interior_image_4" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img13.png')}}" alt="car image" >
                            </label>
                            <label for="interior_image_5" class="custom-gallery-upload">
                                <input type="file" name="interior_image_5" id="interior_image_5" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img14.png')}}" alt="car image" >
                            </label>
                        </div>
                    </div>

                    <div class="mt-40">
                        <label for="condition_damage" class="label-main-text f-20"> Condition / Damage </label>
                        <textarea class="textarea-qa" name="condition_damage" id="condition_damage" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mt-40">
                        <label for="condition_damage_url" class="label-main-text f-20"> Condition / Damage </label>
                        <div class="video-box-main">

                            <div class="upload-img-box sm-graybox upload-video-box">
                                <p class="f-18 c-dull-gray mb-0">Paste URL</p>
                                <input class="inp-qa inp-round" name="condition_damage_url" type="text">
                            </div>

                            {{-- <div class="upload-img-box sm-graybox upload-video-box">
                                <p class="f-18 c-dull-gray mb-0">Upload or Drag</p>
                                <label for="upload_video1" class="custom-upload-image">
                                    <input type="file" name="upload_image" id="upload_video1" class="hide-inp">
                                    <span class="add-img">
                                        <img src="{{ URL::asset('frontend/dealers/assets/image/add-icon.png')}}" alt="Add" class="img-fluid">
                                    </span>
                                </label>
                            </div> --}}

                        </div>
                    </div>

                    <div class="vehicle-condition-main mt-40">
                        <h2 class="headingqa-2 f-40">Vehicle Condition</h2>

                        <div class="details-field-main">
                            <p class="label-main-text f-20"> Do you have existing condition report? </p>
                            <ul class="list-unstyled d-flex gap-4 mb-0">
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="existing_condition_report" id="existing_condition_report_yes" value="yes" >
                                        <label class="dflex-gap10" for="existing_condition_report_yes">
                                            <span class="radio-circle"></span>
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="existing_condition_report" id="existing_condition_report_no" value="no">
                                        <label class="dflex-gap10" for="existing_condition_report_no">
                                            <span class="radio-circle"></span>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>

                            <p class="label-main-text f-20"> Is there any damage on your vehicle? </p>
                            <ul class="list-unstyled d-flex gap-4 mb-0">
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="any_damage_checked" id="any_damage_checked_yes" value="yes">
                                        <label class="dflex-gap10" for="any_damage_checked_yes">
                                            <span class="radio-circle"></span>
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="any_damage_checked" id="any_damage_checked_no" value="no">
                                        <label class="dflex-gap10" for="any_damage_checked_no">
                                            <span class="radio-circle"></span>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>

                            {{-- <p class="purple-box">
                                Drag the damaged icons below on the affected areas of the vehicle.
                            </p> --}}
                        </div>
{{--
                        <div class="ext-int-tab dflexBt align-items-center">
                            <div class="w-48">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/cars-vertical.png')}}" alt="car image" class="img-fluid" >
                            </div>
                            <div class="w-48">
                                <ul class="nav nav-pills mb-3 justify-content-between" id="pills-tab" role="tablist">
                                    <li role="presentation">
                                        <button
                                            class="tabs-btn active"
                                            id="pills-exterior-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#pills-exterior"
                                            type="button"
                                            role="tab"
                                            aria-controls="pills-exterior"
                                            aria-selected="true">
                                            Exterior
                                        </button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="tabs-btn"
                                            id="pills-interior-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#pills-interior"
                                            type="button"
                                            role="tab"
                                            aria-controls="pills-interior"
                                            aria-selected="false">
                                            Interior
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-exterior" role="tabpanel" aria-labelledby="pills-exterior-tab">

                                        <div class="txt-chkboxs-main d-flex flex-wrap">
                                            <label class="txt-chkbox-custom" for="exterior_b">
                                                <input class="hide-inp" type="checkbox" name="exterior_b" id="exterior_b" value="B" >
                                                <span class="f-14">B</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_bd">
                                                <input class="hide-inp" type="checkbox" name="exterior_bd" id="exterior_bd" value="BD" >
                                                <span class="f-14">BD</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_c">
                                                <input class="hide-inp" type="checkbox" name="exterior_c" id="exterior_c" value="C" >
                                                <span class="f-14">C</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_cr">
                                                <input class="hide-inp" type="checkbox" name="exterior_cr" id="exterior_cr" value="CR" >
                                                <span class="f-14">CR</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_d">
                                                <input class="hide-inp" type="checkbox" name="exterior_d" id="exterior_d" value="d" >
                                                <span class="f-14">d</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_dl">
                                                <input class="hide-inp" type="checkbox" name="exterior_dl" id="exterior_dl" value="DL" >
                                                <span class="f-14">DL</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_f">
                                                <input class="hide-inp" type="checkbox" name="exterior_f" id="exterior_f" value="f" >
                                                <span class="f-14">F</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_mc">
                                                <input class="hide-inp" type="checkbox" name="exterior_mc" id="exterior_mc" value="mc" >
                                                <span class="f-14">MC</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_oc">
                                                <input class="hide-inp" type="checkbox" name="exterior_oc" id="exterior_oc" value="oc" >
                                                <span class="f-14">OC</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_pr">
                                                <input class="hide-inp" type="checkbox" name="exterior_pr" id="exterior_pr" value="pr" >
                                                <span class="f-14">PR</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_r">
                                                <input class="hide-inp" type="checkbox" name="exterior_r" id="exterior_r" value="r" >
                                                <span class="f-14">R</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_sc">
                                                <input class="hide-inp" type="checkbox" name="exterior_sc" id="exterior_sc" value="sc" >
                                                <span class="f-14">sc</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_s">
                                                <input class="hide-inp" type="checkbox" name="exterior_s" id="exterior_s" value="s" >
                                                <span class="f-14">s</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_sl">
                                                <input class="hide-inp" type="checkbox" name="exterior_sl" id="exterior_sl" value="sl" >
                                                <span class="f-14">sl</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_ws">
                                                <input class="hide-inp" type="checkbox" name="exterior_ws" id="exterior_ws" value="ws" >
                                                <span class="f-14">ws</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_o">
                                                <input class="hide-inp" type="checkbox" name="exterior_o" id="exterior_o" value="o" >
                                                <span class="f-14">o</span>
                                            </label>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="pills-interior" role="tabpanel" aria-labelledby="pills-interior-tab">

                                        <div class="txt-chkboxs-main d-flex flex-wrap">
                                            <label class="txt-chkbox-custom" for="interior_b">
                                                <input class="hide-inp" type="checkbox" name="interior_b" id="interior_b" value="B" >
                                                <span class="f-14">B</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_bd">
                                                <input class="hide-inp" type="checkbox" name="interior_bd" id="interior_bd" value="BD" >
                                                <span class="f-14">BD</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_c">
                                                <input class="hide-inp" type="checkbox" name="interior_c" id="interior_c" value="C" >
                                                <span class="f-14">C</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_cr">
                                                <input class="hide-inp" type="checkbox" name="interior_cr" id="interior_cr" value="CR" >
                                                <span class="f-14">CR</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_d">
                                                <input class="hide-inp" type="checkbox" name="interior_d" id="interior_d" value="d" >
                                                <span class="f-14">d</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_dl">
                                                <input class="hide-inp" type="checkbox" name="interior_dl" id="interior_dl" value="DL" >
                                                <span class="f-14">DL</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_f">
                                                <input class="hide-inp" type="checkbox" name="interior_f" id="interior_f" value="f" >
                                                <span class="f-14">F</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_mc">
                                                <input class="hide-inp" type="checkbox" name="interior_mc" id="interior_mc" value="mc" >
                                                <span class="f-14">MC</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_oc">
                                                <input class="hide-inp" type="checkbox" name="interior_oc" id="interior_oc" value="oc" >
                                                <span class="f-14">OC</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_pr">
                                                <input class="hide-inp" type="checkbox" name="interior_pr" id="interior_pr" value="pr" >
                                                <span class="f-14">PR</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_r">
                                                <input class="hide-inp" type="checkbox" name="interior_r" id="interior_r" value="r" >
                                                <span class="f-14">R</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_sc">
                                                <input class="hide-inp" type="checkbox" name="interior_sc" id="interior_sc" value="sc" >
                                                <span class="f-14">sc</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_s">
                                                <input class="hide-inp" type="checkbox" name="interior_s" id="interior_s" value="s" >
                                                <span class="f-14">s</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_sl">
                                                <input class="hide-inp" type="checkbox" name="interior_sl" id="interior_sl" value="sl" >
                                                <span class="f-14">sl</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_ws">
                                                <input class="hide-inp" type="checkbox" name="interior_ws" id="interior_ws" value="ws" >
                                                <span class="f-14">ws</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_o">
                                                <input class="hide-inp" type="checkbox" name="interior_o" id="interior_o" value="o" >
                                                <span class="f-14">o</span>
                                            </label>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="mt-40">
                            <label for="advert_description" class="label-main-text f-20"> Advert description </label>
                            <textarea class="textarea-qa" name="advert_description" id="advert_description" cols="30" rows="10"></textarea>
                            <p class="dflexBt f-18 mt-1">
                                <span class="c-blue">Need help?</span>
                                <span class="c-gray">1500 characters left</span>
                            </p>
                        </div>

                        <div class="mt-40">
                            <label for="attention_grabber" class="label-main-text f-20"> Attention Grabber </label>
                            <textarea class="textarea-qa textarea-qa-sm" name="attention_grabber" id="attention_grabber" cols="30" rows="10"></textarea>
                            <p class="f-18 c-gray text-right mt-1">
                                30 characters left
                            </p>
                        </div>

                        <div class="mt-40">
                            <h2 class="headingqa-4 f-40">Tyre tread depths</h2>
                            <div class="d-flex gap-40">
                                <div class="counter-main">
                                    <label for="" class="d-block">Nearside Front</label>
                                    <div class="counter-with-unit">
                                        <div class="counter-inp">
                                            <input type="number" name="nearside_front" value="0">
                                            <span class="count">0</span>
                                            <span class="unit">mm</span>
                                        </div>
                                        <div class="counter-btns">
                                            <button type="button" onclick="increment(this)" > <i class="fa-solid fa-angle-up"></i> </button>
                                            <button type="button" onclick="decrement(this)" > <i class="fa-solid fa-angle-down"></i> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="counter-main">
                                    <label for="" class="d-block">Nearside Rear</label>
                                    <div class="counter-with-unit">
                                        <div class="counter-inp">
                                            <input type="number" name="nearside_rear" value="0">
                                            <span class="count">0</span>
                                            <span class="unit">mm</span>
                                        </div>
                                        <div class="counter-btns">
                                            <button type="button" onclick="increment(this)" > <i class="fa-solid fa-angle-up"></i> </button>
                                            <button type="button" onclick="decrement(this)" > <i class="fa-solid fa-angle-down"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-40">
                                <div class="counter-main">
                                    <label for="" class="d-block">Offside Front</label>
                                    <div class="counter-with-unit">
                                        <div class="counter-inp">
                                            <input type="number" name="offside_front" value="0">
                                            <span class="count">0</span>
                                            <span class="unit">mm</span>
                                        </div>
                                        <div class="counter-btns">
                                            <button type="button" onclick="increment(this)" > <i class="fa-solid fa-angle-up"></i> </button>
                                            <button type="button" onclick="decrement(this)" > <i class="fa-solid fa-angle-down"></i> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="counter-main">
                                    <label for="" class="d-block">Offside Rear</label>
                                    <div class="counter-with-unit">
                                        <div class="counter-inp">
                                            <input type="number" name="offside_rear" value="0">
                                            <span class="count">0</span>
                                            <span class="unit">mm</span>
                                        </div>
                                        <div class="counter-btns">
                                            <button type="button" onclick="increment(this)" > <i class="fa-solid fa-angle-up"></i> </button>
                                            <button type="button" onclick="decrement(this)" > <i class="fa-solid fa-angle-down"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="mt-40">
                            <button type="button" class="btn-qa1 f-25 w-100">
                                Continue to Vehicle Details
                            </button>
                        </div> --}}
                        <div class="bt-btns-main d-flex">
                            <button type="button" class="btn-trans step2-back-btn">
                                <i class="fa-solid fa-arrow-left-long"></i>
                                <span>Go Back</span>
                            </button>
                            <button type="submit" class="btn-trans step2-btn-save">
                                Save for Now
                            </button>
                        </div>

                    </div>

                </form>


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


