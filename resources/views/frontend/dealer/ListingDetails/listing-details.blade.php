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
                    <form action="">
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
                            <input class="inp-qa f-20" type="text" placeholder="0" type="number" >
                        </div>

                        <div class="details-field-main mb-0">
                            <p class="label-main-text f-20"> VAT </p>
                            <div>
                                <ul class='list-unstyled d-flex gap-4 mb-0'>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="vat_field" id="plus_vat" value="Final Price plus VAT" />
                                            <label class="dflex-gap10" for="plus_vat"> 
                                                <span class="radio-circle"></span>
                                                <span>Final Price plus VAT</span> 
                                            </label>
                                        </div>
                                    </li>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="vat_field" id="no_vat"  value="Final Price plus VAT" />
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
                            <button type="button" class="btn-qa1 f-25 w-100">
                                Publish advert
                            </button>
                        </div>

                        <div class="bt-btns-main d-flex">
                            <button type="button" class="btn-trans">
                                <i class="fa-solid fa-arrow-left-long"></i>
                                <span>Go Back</span>
                            </button>
                            <button type="button" class="btn-trans step1-btn-save">
                                Save for Now
                            </button>
                        </div>
                    </form>
                </div>

                <div class="advert-details-form step2">
                    <form action="">

                        <h2 class="headingqa-2 f-40 mb-2">Vehicle Media</h2>
                        <h3 class="headingqa-3 f-20 c-gray mb-20">Vehicle Photos</h3>
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
                        </p>

                        <div class="mt-40">
                            <p class="gallery-top-text mb-10 f-18">Exterior</p>
                            <div class="gallery-upload-main">
                                <label for="gallery_upload_1" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_1" id="gallery_upload_1" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img1.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_2" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_2" id="gallery_upload_2" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img2.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_3" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_3" id="gallery_upload_3" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img3.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_4" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_4" id="gallery_upload_4" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img4.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_5" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_5" id="gallery_upload_5" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img5.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_6" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_6" id="gallery_upload_6" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img6.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_7" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_7" id="gallery_upload_7" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img7.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_8" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_8" id="gallery_upload_8" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img8.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_9" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_9" id="gallery_upload_9" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img9.png')}}" alt="car image" >
                                </label>
                            </div>
                        </div>

                        <div class="mt-40">
                            <p class="gallery-top-text mb-10 f-18">Interior</p>
                            <div class="gallery-upload-main">
                                <label for="gallery_upload_10" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_10" id="gallery_upload_10" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img10.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_11" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_11" id="gallery_upload_11" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img11.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_12" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_12" id="gallery_upload_12" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img12.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_13" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_13" id="gallery_upload_13" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img13.png')}}" alt="car image" >
                                </label>
                                <label for="gallery_upload_14" class="custom-gallery-upload">
                                    <input type="file" name="gallery_upload_14" id="gallery_upload_14" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/gallery-img14.png')}}" alt="car image" >
                                </label>
                            </div>
                        </div>

                        <div class="mt-40">
                            <label for="condition_damage1" class="label-main-text f-20"> Condition / Damage </label>
                            <textarea class="textarea-qa" name="condition_damage1" id="condition_damage1" cols="30" rows="10"></textarea>
                        </div>

                        <div class="mt-40">
                            <label for="condition_damage2" class="label-main-text f-20"> Condition / Damage </label>
                            <div class="video-box-main">

                                <div class="upload-img-box sm-graybox upload-video-box">
                                    <p class="f-18 c-dull-gray mb-0">Paste URL</p>
                                    <input class="inp-qa inp-round" type="text">
                                </div>

                                <div class="upload-img-box sm-graybox upload-video-box">
                                    <p class="f-18 c-dull-gray mb-0">Upload or Drag</p>
                                    <label for="upload_video1" class="custom-upload-image">
                                        <input type="file" name="upload_image" id="upload_video1" class="hide-inp">
                                        <span class="add-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/add-icon.png')}}" alt="Add" class="img-fluid">
                                        </span>
                                    </label>
                                </div>
                                
                            </div>
                        </div>

                        <div class="vehicle-condition-main mt-40">
                            <h2 class="headingqa-2 f-40">Vehicle Condition</h2>

                            <div class="details-field-main">
                                <p class="label-main-text f-20"> Do you have existing condition report? </p>
                                <ul class="list-unstyled d-flex gap-4 mb-0">
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="condition_report" id="condition_report_yes" value="yes" >
                                            <label class="dflex-gap10" for="condition_report_yes"> 
                                                <span class="radio-circle"></span>
                                                <span>Yes</span> 
                                            </label>
                                        </div>
                                    </li>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="condition_report" id="condition_report_no" value="no">
                                            <label class="dflex-gap10" for="condition_report_no"> 
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
                                            <input class="hide-inp" type="radio" name="any_damage" id="any_damage_yes" value="yes">
                                            <label class="dflex-gap10" for="any_damage_yes"> 
                                                <span class="radio-circle"></span>
                                                <span>Yes</span> 
                                            </label>
                                        </div>
                                    </li>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="any_damage" id="any_damage_no" value="no">
                                            <label class="dflex-gap10" for="any_damage_no"> 
                                                <span class="radio-circle"></span>
                                                <span>No</span> 
                                            </label>
                                        </div>
                                    </li>
                                </ul>

                                <p class="purple-box">
                                    Drag the damaged icons below on the affected areas of the vehicle.
                                </p>
                            </div>

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
                            </div>

                            <div class="mt-40">
                                <label for="condition_damage" class="label-main-text f-20"> Advert description </label>
                                <textarea class="textarea-qa" name="condition_damage" id="condition_damage" cols="30" rows="10"></textarea>
                                <p class="dflexBt f-18 mt-1">
                                    <span class="c-blue">Need help?</span>
                                    <span class="c-gray">1500 characters left</span>
                                </p>
                            </div>

                            <div class="mt-40">
                                <label for="condition_damage" class="label-main-text f-20"> Attention Grabber </label>
                                <textarea class="textarea-qa textarea-qa-sm" name="condition_damage" id="condition_damage" cols="30" rows="10"></textarea>
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
                                                <input type="number" value="0"> 
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
                                                <input type="number" value="0"> 
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
                                        <label for="" class="d-block">Offside Rear</label>
                                        <div class="counter-with-unit">
                                            <div class="counter-inp">
                                                <input type="number" value="0"> 
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
                                                <input type="number" value="0"> 
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

                            <div class="mt-40">
                                <button type="button" class="btn-qa1 f-25 w-100">
                                    Continue to Vehicle Details
                                </button>
                            </div>
                            <div class="bt-btns-main d-flex">
                                <button type="button" class="btn-trans step2-back-btn">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <span>Go Back</span>
                                </button>
                                <button type="button" class="btn-trans step2-btn-save">
                                    Save for Now
                                </button>
                            </div>
                            
                        </div>

                    </form>
                </div>

                <div class="advert-details-form step3">
                    <form action="">

                        <h2 class="headingqa-2 f-40 mb-2">Vehicle Media</h2>
                        <h3 class="headingqa-3 f-20 c-gray mb-20">Vehicle Photos</h3>
                        <div class="upload-img-box graybox">
                            <label for="upload_image1_step3" class="custom-upload-image">
                                <input type="file" name="upload_image1_step3" id="upload_image1_step3"  class="hide-inp">
                                <span class="add-img">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/add-icon.png')}}" alt="Add" class="img-fluid">
                                </span>
                            </label>
                            <p class="f-18 c-gray mb-0">Upload Photos or drag & drop here</p>
                            <button type="button" class="btn-qa1 f-16 btn-filled-sm">Show Photo guides</button>
                        </div>
                        <div class="progressbar mt-10"> 
                            <span></span> 
                        </div>
                        <p class="progress-count f-18 c-gray mt-10"> 0/150 </p>
                        <p class="purple-box">
                            Please add at least one image.
                        </p>

                        <div class="mt-40">
                            <label for="condition_damage" class="label-main-text f-20"> Add a Video </label>
                            <div class="video-box-main">

                                <div class="upload-img-box sm-graybox upload-video-box">
                                    <p class="f-18 c-dull-gray mb-0">Paste URL</p>
                                    <input class="inp-qa inp-round" type="text">
                                </div>

                                <div class="upload-img-box sm-graybox upload-video-box">
                                    <p class="f-18 c-dull-gray mb-0">Upload or Drag</p>
                                    <label for="upload_video1_step3" class="custom-upload-image">
                                        <input type="file" name="upload_video1_step3" id="upload_video1_step3" class="hide-inp">
                                        <span class="add-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/add-icon.png')}}" alt="Add" class="img-fluid">
                                        </span>
                                    </label>
                                </div>
                                
                            </div>
                        </div>

                        <div class="vehicle-condition-main mt-40">
                            <h2 class="headingqa-2 f-40">Vehicle Condition</h2>

                            <div class="details-field-main">
                                <p class="label-main-text f-20"> Do you have existing condition report? </p>
                                <ul class="list-unstyled d-flex gap-4 mb-0">
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="condition_report_step3" id="condition_report_step3_yes" value="yes" >
                                            <label class="dflex-gap10" for="condition_report_step3_yes"> 
                                                <span class="radio-circle"></span>
                                                <span>Yes</span> 
                                            </label>
                                        </div>
                                    </li>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="condition_report_step3" id="condition_report_step3_no" value="no">
                                            <label class="dflex-gap10" for="condition_report_step3_no"> 
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
                                            <input class="hide-inp" type="radio" name="any_damage_step3" id="any_damage_step3_yes" value="yes">
                                            <label class="dflex-gap10" for="any_damage_step3_yes"> 
                                                <span class="radio-circle"></span>
                                                <span>Yes</span> 
                                            </label>
                                        </div>
                                    </li>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="any_damage_step3" id="any_damage_step3_no" value="no">
                                            <label class="dflex-gap10" for="any_damage_step3_no"> 
                                                <span class="radio-circle"></span>
                                                <span>No</span> 
                                            </label>
                                        </div>
                                    </li>
                                </ul>

                                <p class="purple-box">
                                    Drag the damaged icons below on the affected areas of the vehicle.
                                </p>
                            </div>

                            <div class="ext-int-tab dflexBt align-items-center">
                                <div class="w-48">
                                    <img src="{{ URL::asset('frontend/dealers/assets/image/interior-img.png')}}" alt="car image" class="img-fluid" >
                                </div>
                                <div class="w-48">
                                    <ul class="nav nav-pills mb-3 justify-content-between" id="pills-tab" role="tablist">
                                        <li role="presentation">
                                            <button 
                                                class="tabs-btn" 
                                                id="pills-exterior-step3-tab" 
                                                data-bs-toggle="pill" 
                                                data-bs-target="#pills-exterior-step3" 
                                                type="button" 
                                                role="tab" 
                                                aria-controls="pills-exterior-step3" 
                                                aria-selected="true">
                                                Exterior
                                            </button>
                                        </li>
                                        <li role="presentation">
                                            <button 
                                                class="tabs-btn active" 
                                                id="pills-interior-step3-tab" 
                                                data-bs-toggle="pill" 
                                                data-bs-target="#pills-interior-step3" 
                                                type="button" 
                                                role="tab" 
                                                aria-controls="pills-interior-step3" 
                                                aria-selected="false">
                                                Interior
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">

                                        <div class="tab-pane fade show active" id="pills-exterior-step3" role="tabpanel" aria-labelledby="pills-exterior-step3-tab">

                                            <div class="txt-chkboxs-main d-flex flex-wrap">
                                                <label class="txt-chkbox-custom" for="exterior_step3_b">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_b" id="exterior_step3_b" value="B" >
                                                    <span class="f-14">B</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_bd">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_bd" id="exterior_step3_bd" value="BD" >
                                                    <span class="f-14">BD</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_c">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_c" id="exterior_step3_c" value="C" >
                                                    <span class="f-14">C</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_cr">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_cr" id="exterior_step3_cr" value="CR" >
                                                    <span class="f-14">CR</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_d">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_d" id="exterior_step3_d" value="d" >
                                                    <span class="f-14">d</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_dl">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_dl" id="exterior_step3_dl" value="DL" >
                                                    <span class="f-14">DL</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_f">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_f" id="exterior_step3_f" value="f" >
                                                    <span class="f-14">F</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_mc">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_mc" id="exterior_step3_mc" value="mc" >
                                                    <span class="f-14">MC</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_oc">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_oc" id="exterior_step3_oc" value="oc" >
                                                    <span class="f-14">OC</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_pr">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_pr" id="exterior_step3_pr" value="pr" >
                                                    <span class="f-14">PR</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_r">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_r" id="exterior_step3_r" value="r" >
                                                    <span class="f-14">R</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_sc">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_sc" id="exterior_step3_sc" value="sc" >
                                                    <span class="f-14">sc</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_s">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_s" id="exterior_step3_s" value="s" >
                                                    <span class="f-14">s</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_sl">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_sl" id="exterior_step3_sl" value="sl" >
                                                    <span class="f-14">sl</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_ws">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_ws" id="exterior_step3_ws" value="ws" >
                                                    <span class="f-14">ws</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="exterior_step3_o">
                                                    <input class="hide-inp" type="checkbox" name="exterior_step3_o" id="exterior_step3_o" value="o" >
                                                    <span class="f-14">o</span>
                                                </label>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="pills-interior-step3" role="tabpanel" aria-labelledby="pills-interior-step3-tab">

                                            <div class="txt-chkboxs-main d-flex flex-wrap">
                                                <label class="txt-chkbox-custom" for="interior_step3_b">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_b" id="interior_step3_b" value="B" >
                                                    <span class="f-14">B</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_bd">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_bd" id="interior_step3_bd" value="BD" >
                                                    <span class="f-14">BD</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_c">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_c" id="interior_step3_c" value="C" >
                                                    <span class="f-14">C</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_cr">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_cr" id="interior_step3_cr" value="CR" >
                                                    <span class="f-14">CR</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_d">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_d" id="interior_step3_d" value="d" >
                                                    <span class="f-14">d</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_dl">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_dl" id="interior_step3_dl" value="DL" >
                                                    <span class="f-14">DL</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_f">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_f" id="interior_step3_f" value="f" >
                                                    <span class="f-14">F</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_mc">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_mc" id="interior_step3_mc" value="mc" >
                                                    <span class="f-14">MC</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_oc">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_oc" id="interior_step3_oc" value="oc" >
                                                    <span class="f-14">OC</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_pr">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_pr" id="interior_step3_pr" value="pr" >
                                                    <span class="f-14">PR</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_r">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_r" id="interior_step3_r" value="r" >
                                                    <span class="f-14">R</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_sc">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_sc" id="interior_step3_sc" value="sc" >
                                                    <span class="f-14">sc</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_s">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_s" id="interior_step3_s" value="s" >
                                                    <span class="f-14">s</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_sl">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_sl" id="interior_step3_sl" value="sl" >
                                                    <span class="f-14">sl</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_ws">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_ws" id="interior_step3_ws" value="ws" >
                                                    <span class="f-14">ws</span>
                                                </label>
                                                <label class="txt-chkbox-custom" for="interior_step3_o">
                                                    <input class="hide-inp" type="checkbox" name="interior_step3_o" id="interior_step3_o" value="o" >
                                                    <span class="f-14">o</span>
                                                </label>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="mt-40">
                                <label for="condition_damage1_step3" class="label-main-text f-20"> Advert description </label>
                                <textarea class="textarea-qa" name="condition_damage1_step3" id="condition_damage1_step3" cols="30" rows="10"></textarea>
                                <p class="dflexBt f-18 mt-1">
                                    <span class="c-blue">Need help?</span>
                                    <span class="c-gray">1500 characters left</span>
                                </p>
                            </div>

                            <div class="mt-40">
                                <label for="condition_damage2_step3" class="label-main-text f-20"> Attention Grabber </label>
                                <textarea class="textarea-qa textarea-qa-sm" name="condition_damage2_step3" id="condition_damage2_step3" cols="30" rows="10"></textarea>
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
                                                <input type="number" value="0"> 
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
                                                <input type="number" value="0"> 
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
                                        <label for="" class="d-block">Offside Rear</label>
                                        <div class="counter-with-unit">
                                            <div class="counter-inp">
                                                <input type="number" value="0"> 
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
                                                <input type="number" value="0"> 
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

                            <div class="mt-40">
                                <button type="button" class="btn-qa1 f-25 w-100">
                                    Continue to Vehicle Details
                                </button>
                            </div>
                            <div class="bt-btns-main d-flex">
                                <button type="button" class="btn-trans step3-back-btn">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <span>Go Back</span>
                                </button>
                                <button type="button" class="btn-trans step3-btn-save">
                                    Save for Now
                                </button>
                            </div>
                            
                        </div>

                    </form>
                </div>

                <div class="advert-details-form step4">
                    <form action="">

                        <h2 class="headingqa-2 f-40 ">Vehicle History</h2>

                        <div>
                            <p class="label-main-text f-20"> Keys </p>

                            <ul class="list-unstyled d-flex gap-4">
                                <li class="radio-option-box min-width-170">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="keys_step4" id="two_keys" value="2+ keys">
                                        <label class="dflex-gap10" for="two_keys"> 
                                            <span class="radio-circle"></span>
                                            <span>2+ keys</span> 
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box min-width-170">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="keys_step4" id="one_keys" value="1 key">
                                        <label class="dflex-gap10" for="one_keys"> 
                                            <span class="radio-circle"></span>
                                            <span>1 key</span> 
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-40">
                            <label class="label-main-text f-20" for="previous_owners"> Previous Owners </label>
                            <input class="inp-qa f-20" type="text" placeholder="0" id="previous_owners">
                        </div>

                        <div class="mt-40">
                            <p class="label-main-text f-20"> Service History </p>
                            <ul class="d-flex flex-wrap gap-4">
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="service_history" id="full_history" value="Full history">
                                        <label class="dflex-gap10" for="full_history"> 
                                            <span class="radio-circle"></span>
                                            <span>Full history</span> 
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="service_history" id="full_frnachise_history" value="Full franchise history">
                                        <label class="dflex-gap10" for="full_frnachise_history"> 
                                            <span class="radio-circle"></span>
                                            <span>Full franchise history</span> 
                                        </label>
                                    </div>
                                </li>
    
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="service_history" id="partial_history" value="Partial history">
                                        <label class="dflex-gap10" for="partial_history"> 
                                            <span class="radio-circle"></span>
                                            <span>Partial history</span> 
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="service_history" id="no_history" value="No history">
                                        <label class="dflex-gap10" for="no_history"> 
                                            <span class="radio-circle"></span>
                                            <span>No history</span> 
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-40">
                            <div class="history-list-head">
                                <label for="date_step4"> Date </label>
                                <label for="millage_step4"> Mileage </label>
                                <label for="dealership_step4"> Dealership </label>
                                <label for="comment_step4"> Comment </label>
                            </div>
                            <div id="history_fields_list" class="history-fields-list">
                                <div class="history-fields-main d-flex align-items-center">
                                    <div class="history-fields">
                                        <input type="date" id="date_step4">
                                        <input type="text" id="millage_step4" placeholder="Dealership name" >
                                        <input type="text" id="dealership_step4">
                                        <input type="text" id="comment_step4">
                                    </div>
                                    <button type="button" class="btn-icon" > <i class="fa-solid fa-trash-can"></i> </button>
                                </div>
                            </div>
                            <button type="button" class="btn-qa1 f-16 btn-grish" id="add_more_history_btn">Add more history</button>

                        </div>
                        
                        <div class="mt-40">
                            <label class="label-main-text f-20" for="mileage_step4"> Mileage </label>
                            <input class="inp-qa f-20" type="text" placeholder="0" id="mileage_step4">
                        </div>
                        
                        <div class="mt-40">
                            <p class="label-main-text f-20"> V5 Status </p>
                            <ul class="list-unstyled d-flex gap-4">
                                <li class="radio-option-box min-width-170">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="v5_status" id="v5_present" value="Present">
                                        <label class="dflex-gap10" for="v5_present"> 
                                            <span class="radio-circle"></span>
                                            <span>Present</span> 
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box min-width-170">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="v5_status" id="v5_not_present" value="Not Present">
                                        <label class="dflex-gap10" for="v5_not_present"> 
                                            <span class="radio-circle"></span>
                                            <span>Not Present</span> 
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="mt-40">
                            <p class="label-main-text f-20"> Origin </p>
                            <ul class="list-unstyled d-flex gap-4">
                                <li class="radio-option-box min-width-170">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="origin_step4" id="origin_uk" value="UK Vehicle">
                                        <label class="dflex-gap10" for="origin_uk"> 
                                            <span class="radio-circle"></span>
                                            <span>UK Vehicle</span> 
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box min-width-170">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="origin_step4" id="origin_import" value="Import">
                                        <label class="dflex-gap10" for="origin_import"> 
                                            <span class="radio-circle"></span>
                                            <span>Import</span> 
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        
                        <div class="purple-box dflex-gap10">
                            <span class="error-icon">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/error-icon.png')}}" alt="Add" class="img-fluid">
                            </span>
                            <span class="f-reg">
                                This spec has been automaticaly generated from 3rd party
                                sources. Please note that it is your responsiblity to
                                amend any  incorrect spec.
                            </span>
                        </div>
                        
                        <div class="mt-40">
                            <label class="label-main-text f-20" for="search_spec_step4"> Search for spec </label>
                            <input class="inp-qa f-20" type="text" placeholder="Type a spec item..." id="search_spec_step4">
                        </div>

                        <!-- <div class="mt-40">
                            <label class="label-main-text f-20 dflexBt" for="interiorSelect_step4"> 
                                <span>Interior  (2 Selected)</span>	 
                                <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span> 
                            </label>
                            <select name="interiorSelect_step4" id="interiorSelect_step4">
                                <option value="Air Conditioning">
                                    Air Conditioning
                                </option>
                                <option value="Twin Sliding Side Doors - Not Electric">
                                    Twin Sliding Side Doors - Not Electric
                                </option>
                            </select>
                            
                        </div> -->

                        <div class="mt-40">
                            <label class="multi-select-qa" for="interiorSelect_step4">
                                <p class="multiselect-label label-main-text f-20 dflexBt"> 
                                    <span>Interior <span> </span> </span> 
                                    <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span> 
                                </p>
                                <select class="interiorSelect-step4  form-control multi-select-step4" id="interiorSelect_step4" multiple="multiple">
                                    <option value="Air Conditioning">
                                        Air Conditioning
                                    </option>
                                    <option value="Twin Sliding Side Doors - Not Electric">
                                        Twin Sliding Side Doors - Not Electric
                                    </option>
                                </select>
                            </label>
                        </div>


                        <div class="mt-10">
                            <label class="multi-select-qa" for="exteriorSelect_step4">
                                <p class="multiselect-label label-main-text f-20 dflexBt"> 
                                    <span>Exterior <span> </span> </span> 
                                    <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span> 
                                </p>
                                <select class="exteriorSelect-step4  form-control multi-select-step4" id="exteriorSelect_step4" multiple="multiple">
                                    <option value="Acoustic Laminated Windscreen">
                                        Acoustic Laminated Windscreen
                                    </option>
                                    <option value="Front Windows Tinted to 30 Percent Opacity">
                                        Front Windows Tinted to 30 Percent Opacity
                                    </option>
                                </select>
                            </label>
                        </div>


                        <div class="mt-10">
                            <label class="multi-select-qa" for="audioSelect_step4">
                                <p class="multiselect-label label-main-text f-20 dflexBt"> 
                                    <span>Audio and Communications  <span>  </span> </span> 
                                    <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span> 
                                </p>
                                <select class="audioSelect-step4  form-control multi-select-step4" id="audioSelect_step4" multiple="multiple">
                                    <option value="Air Conditioning">
                                        Air Conditioning
                                    </option>
                                    <option value="Twin Sliding Side Doors - Not Electric">
                                        Twin Sliding Side Doors - Not Electric
                                    </option>
                                </select>
                            </label>
                        </div>


                        <div class="mt-10">
                            <label class="multi-select-qa" for="driverAssistanceSelect_step4">
                                <p class="multiselect-label label-main-text f-20 dflexBt"> 
                                    <span>Drivers Assistance  <span>  </span> </span> 
                                    <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span> 
                                </p>
                                <select class="driverAssistanceSelect-step4  form-control multi-select-step4" id="driverAssistanceSelect_step4" multiple="multiple">
                                    <option value="Cruise Control with Programmable Speed Limiter">
                                        Cruise Control with Programmable Speed Limiter
                                    </option>
                                    <option value="Rear Parking Sensors">
                                        Rear Parking Sensors
                                    </option>
                                </select>
                            </label>
                        </div>


                        <ul class="step4-checklist">
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_1_step4">
                                <label class="dflex-gap10" for="checklist_1_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Battery Charge Warning
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_2_step4">
                                <label class="dflex-gap10" for="checklist_2_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Cruise Control with Programmable Speed Limiter
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_3_step4">
                                <label class="dflex-gap10" for="checklist_3_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Distance to Next Service Indicator
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_4_step4">
                                <label class="dflex-gap10" for="checklist_4_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Door Open Warning
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_5_step4">
                                <label class="dflex-gap10" for="checklist_5_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Oil Level Indicator
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_6_step4">
                                <label class="dflex-gap10" for="checklist_6_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Park Assist - 180 Degree
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_7_step4">
                                <label class="dflex-gap10" for="checklist_7_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Rear Parking Sensors
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_8_step4">
                                <label class="dflex-gap10" for="checklist_8_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Rev Counter
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_9_step4">
                                <label class="dflex-gap10" for="checklist_9_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Speedometer with Digital Odometer and Digital Trip Recorder
                                    </span> 
                                </label>
                            </li>


                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_10_step4">
                                <label class="dflex-gap10" for="checklist_10_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Trip Computer
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_11_step4">
                                <label class="dflex-gap10" for="checklist_11_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Tyre Pressure Monitor
                                    </span> 
                                </label>
                            </li>
                            <li class="custom-checkbox d-flex">
                                <input class="hide-inp" type="checkbox" id="checklist_12_step4">
                                <label class="dflex-gap10" for="checklist_12_step4"> 
                                    <span class="checkbox-square f-20">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span class="f-18">
                                        Water Temperature and Fuel Gauges
                                    </span> 
                                </label>
                            </li>
                        </ul>


                        <div class="mt-40">
                            <label class="multi-select-qa" for="illuminationSelect_step4">
                                <p class="multiselect-label label-main-text f-20 dflexBt"> 
                                    <span>Illumination  <span>  </span> </span> 
                                    <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span> 
                                </p>
                                <select class="illuminationSelect-step4  form-control multi-select-step4" id="illuminationSelect_step4" multiple="multiple">
                                    <option value="Headlights with Integrated Daytime Running Lights - DRLs">
                                        Headlights with Integrated Daytime Running Lights - DRLs
                                    </option>
                                    <option value="Rear Parking Sensors">
                                        Rear Parking Sensors
                                    </option>
                                </select>
                            </label>
                        </div>

                        <div class="mt-10">
                            <label class="multi-select-qa" for="performanceSelect_step4">
                                <p class="multiselect-label label-main-text f-20 dflexBt"> 
                                    <span>Performance  <span>  </span> </span> 
                                    <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span> 
                                </p>
                                <select class="performanceSelect-step4  form-control multi-select-step4" id="performanceSelect_step4" multiple="multiple">
                                    <option value="Headlights with Integrated Daytime Running Lights - DRLs">
                                        Headlights with Integrated Daytime Running Lights - DRLs
                                    </option>
                                    <option value="Rear Parking Sensors">
                                        Rear Parking Sensors
                                    </option>
                                </select>
                            </label>
                        </div>

                        <div class="mt-10">
                            <label class="multi-select-qa" for="safetySelect_step4">
                                <p class="multiselect-label label-main-text f-20 dflexBt"> 
                                    <span>Safety and Security  <span>  </span> </span> 
                                    <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span> 
                                </p>
                                <select class="safetySelect-step4  form-control multi-select-step4" id="safetySelect_step4" multiple="multiple">
                                    <option value="Alarm">
                                        Alarm
                                    </option>
                                    <option value="Electronic Stability Control with Hill Assist">
                                        Electronic Stability Control with Hill Assist
                                    </option>
                                </select>
                            </label>
                        </div>
                        

                        <button type="button" class="btn-qa1 f-25 w-100 mt-40"> Continue to Listing Details </button>
                        <div class="vehicle-condition-main mt-10">

                            <div class="bt-btns-main d-flex">
                                <button type="button" class="btn-trans step4-back-btn">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <span>Go Back</span>
                                </button>
                                <button type="button" class="btn-trans step4-btn-save">
                                    Save for Now
                                </button>
                            </div>
                            
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
                <div class="d-flex gap-2 justify-content-end mt-4">
                    <button type="button" class="btn-qa1 f-16 btn-border-sm">Save Advert</button>
                    <button type="button" class="btn-qa1 f-16 btn-filled-sm">Publish Advert</button>
                </div>
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


