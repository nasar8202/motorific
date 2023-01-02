@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>
/*custom font*/







</style>

<!-- MultiStep Form -->
<br>

<section class="advert-details-sec section">
<div class="container-1200">
    <div class="row">

        <!-- BOX-1 -->
        <div class="col-lg-6 col-md-8">

            <form action="{{ route('dealer.vehicleAndDetailsPost') }}"  method="POST" enctype="multipart/form-data">
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
                                <input type="file" name="image_1[]" id="image_1" multiple class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img1.png')}}" alt="car image" >

                            </label>

                            {{-- <label for="image_2" class="custom-gallery-upload">
                                <input type="file" name="image_2" id="image_2" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img2.png')}}" alt="car image" >
                            </label>
                            <label for="image_3" class="custom-gallery-upload">
                                <input type="file" name="image_3" id="image_3" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img3.png')}}" alt="car image" >
                            </label>
                            <label for="image_4" class="custom-gallery-upload">
                                <input type="file" name="image_4" id="image_4" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img4.png')}}" alt="car image" >
                            </label>
                            <label for="image_5" class="custom-gallery-upload">
                                <input type="file" name="image_5" id="image_5" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img5.png')}}" alt="car image" >
                            </label>
                            <label for="image_6" class="custom-gallery-upload">
                                <input type="file" name="image_6" id="image_6" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img6.png')}}" alt="car image" >
                            </label>
                            <label for="image_7" class="custom-gallery-upload">
                                <input type="file" name="image_7" id="image_7" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img7.png')}}" alt="car image" >
                            </label>
                            <label for="image_8" class="custom-gallery-upload">
                                <input type="file" name="image_8" id="image_8" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img8.png')}}" alt="car image" >
                            </label>
                            <label for="image_9" class="custom-gallery-upload">
                                <input type="file" name="image_9" id="image_9" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img9.png')}}" alt="car image" >
                            </label> --}}
                            @if ($errors->has('image_1'))
                            <span class="text-danger">{{ $errors->first('image_1') }}</span>
                            @endif
                            {{-- @if ($errors->has('image_2'))
                            <span class="text-danger">{{ $errors->first('image_2') }}</span>
                            @endif
                            @if ($errors->has('image_3'))
                            <span class="text-danger">{{ $errors->first('image_3') }}</span>
                            @endif
                            @if ($errors->has('image_4'))
                            <span class="text-danger">{{ $errors->first('image_4') }}</span>
                            @endif
                            @if ($errors->has('image_5'))
                            <span class="text-danger">{{ $errors->first('image_5') }}</span>
                            @endif
                            @if ($errors->has('image_6'))
                            <span class="text-danger">{{ $errors->first('image_6') }}</span>
                            @endif
                            @if ($errors->has('image_7'))
                            <span class="text-danger">{{ $errors->first('image_7') }}</span>
                            @endif
                            @if ($errors->has('image_8'))
                            <span class="text-danger">{{ $errors->first('image_8') }}</span>
                            @endif
                            @if ($errors->has('image_9'))
                            <span class="text-danger">{{ $errors->first('image_9') }}</span>
                            @endif --}}
                        </div>

                    </div>

                    <div class="mt-40">
                        <p class="gallery-top-text mb-10 f-18">Interior</p>
                        <div class="gallery-upload-main">
                            <label for="interior_image_1" class="custom-gallery-upload">
                                <input type="file" name="interior_image_1[]" multiple id="interior_image_1" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img10.png')}}" alt="car image" >
                            </label>
                            {{-- <label for="interior_image_2" class="custom-gallery-upload">
                                <input type="file" name="interior_image_2" id="interior_image_2" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img11.png')}}" alt="car image" >
                            </label>
                            <label for="interior_image_3" class="custom-gallery-upload">
                                <input type="file" name="interior_image_3" id="interior_image_3" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img12.png')}}" alt="car image" >
                            </label>
                            <label for="interior_image_4" class="custom-gallery-upload">
                                <input type="file" name="interior_image_4" id="interior_image_4" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img13.png')}}" alt="car image" >
                            </label>
                            <label for="interior_image_5" class="custom-gallery-upload">
                                <input type="file" name="interior_image_5" id="interior_image_5" class="hide-inp" onchange="getFileName(this)">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img14.png')}}" alt="car image" >
                            </label> --}}
                            @if ($errors->has('interior_image_1'))
                            <span class="text-danger">{{ $errors->first('interior_image_1') }}</span>
                            @endif
                            {{-- @if ($errors->has('interior_image_2'))
                            <span class="text-danger">{{ $errors->first('interior_image_2') }}</span>
                            @endif
                            @if ($errors->has('interior_image_3'))
                            <span class="text-danger">{{ $errors->first('interior_image_3') }}</span>
                            @endif
                            @if ($errors->has('interior_image_4'))
                            <span class="text-danger">{{ $errors->first('interior_image_4') }}</span>
                            @endif
                            @if ($errors->has('interior_image_5'))
                            <span class="text-danger">{{ $errors->first('interior_image_5') }}</span>
                            @endif --}}


                        </div>

                    </div>

                    <div class="mt-40">
                        <label for="condition_damage" class="label-main-text f-20"> Condition / Damage </label>
                        <textarea class="textarea-qa" name="condition_damage" id="condition_damage" cols="30" rows="10" >{{ request()->session()->get('condition_damage') }}</textarea>
                    </div>
                    @if ($errors->has('condition_damage'))
                    <span class="text-danger">{{ $errors->first('condition_damage') }}</span>
                    @endif
                    <div class="mt-40">
                        <label for="condition_damage_url" class="label-main-text f-20"> Condition / Damage </label>
                        <div class="video-box-main">

                            <div class="upload-img-box sm-graybox upload-video-box">
                                <p class="f-18 c-dull-gray mb-0">Paste URL</p>
                                <input class="inp-qa inp-round" name="condition_damage_url" type="text" value="{{ request()->session()->get('condition_damage_url') }}">
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
                    @if ($errors->has('condition_damage_url'))
                    <span class="text-danger">{{ $errors->first('condition_damage_url') }}</span>
                    @endif
                    <div class="vehicle-condition-main mt-40">
                        <h2 class="headingqa-2 f-40">Vehicle Condition</h2>

                        <div class="details-field-main">
                            <p class="label-main-text f-20"> Do you have existing condition report? </p>
                            <ul class="list-unstyled d-flex gap-4 mb-0">
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="existing_condition_report" id="existing_condition_report_yes" value="1"  @if(request()->session()->get('existing_condition_report') == '1') checked @endif >
                                        <label class="dflex-gap10" for="existing_condition_report_yes">
                                            <span class="radio-circle"></span>
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="existing_condition_report" id="existing_condition_report_no" value="0" @if(request()->session()->get('existing_condition_report') == '0') checked @endif>
                                        <label class="dflex-gap10" for="existing_condition_report_no">
                                            <span class="radio-circle"></span>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            @if ($errors->has('existing_condition_report'))
                            <span class="text-danger">{{ $errors->first('existing_condition_report') }}</span>
                            @endif
                            <p class="label-main-text f-20"> Is there any damage on your vehicle? </p>
                            <ul class="list-unstyled d-flex gap-4 mb-0">
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="any_damage_checked" id="any_damage_checked_yes" value="1" @if(request()->session()->get('any_damage_checked') == '1') checked @endif>
                                        <label class="dflex-gap10" for="any_damage_checked_yes">
                                            <span class="radio-circle"></span>
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="radio-option-box">
                                    <div class="custom-radio-box d-flex">
                                        <input class="hide-inp" type="radio" name="any_damage_checked" id="any_damage_checked_no" value="0" @if(request()->session()->get('any_damage_checked') == '0') checked @endif>
                                        <label class="dflex-gap10" for="any_damage_checked_no">
                                            <span class="radio-circle"></span>
                                            <span>No</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            @if ($errors->has('any_damage_checked'))
                            <span class="text-danger">{{ $errors->first('any_damage_checked') }}</span>
                            @endif
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
                                                <input class="hide-inp" type="radio" name="exterior_b" id="exterior_b" value="B" >
                                                <span class="f-14">B</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_bd">
                                                <input class="hide-inp" type="radio" name="exterior_bd" id="exterior_bd" value="BD" >
                                                <span class="f-14">BD</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_c">
                                                <input class="hide-inp" type="radio" name="exterior_c" id="exterior_c" value="C" >
                                                <span class="f-14">C</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_cr">
                                                <input class="hide-inp" type="radio" name="exterior_cr" id="exterior_cr" value="CR" >
                                                <span class="f-14">CR</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_d">
                                                <input class="hide-inp" type="radio" name="exterior_d" id="exterior_d" value="d" >
                                                <span class="f-14">d</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_dl">
                                                <input class="hide-inp" type="radio" name="exterior_dl" id="exterior_dl" value="DL" >
                                                <span class="f-14">DL</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_f">
                                                <input class="hide-inp" type="radio" name="exterior_f" id="exterior_f" value="f" >
                                                <span class="f-14">F</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_mc">
                                                <input class="hide-inp" type="radio" name="exterior_mc" id="exterior_mc" value="mc" >
                                                <span class="f-14">MC</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_oc">
                                                <input class="hide-inp" type="radio" name="exterior_oc" id="exterior_oc" value="oc" >
                                                <span class="f-14">OC</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_pr">
                                                <input class="hide-inp" type="radio" name="exterior_pr" id="exterior_pr" value="pr" >
                                                <span class="f-14">PR</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_r">
                                                <input class="hide-inp" type="radio" name="exterior_r" id="exterior_r" value="r" >
                                                <span class="f-14">R</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_sc">
                                                <input class="hide-inp" type="radio" name="exterior_sc" id="exterior_sc" value="sc" >
                                                <span class="f-14">sc</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_s">
                                                <input class="hide-inp" type="radio" name="exterior_s" id="exterior_s" value="s" >
                                                <span class="f-14">s</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_sl">
                                                <input class="hide-inp" type="radio" name="exterior_sl" id="exterior_sl" value="sl" >
                                                <span class="f-14">sl</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_ws">
                                                <input class="hide-inp" type="radio" name="exterior_ws" id="exterior_ws" value="ws" >
                                                <span class="f-14">ws</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="exterior_o">
                                                <input class="hide-inp" type="radio" name="exterior_o" id="exterior_o" value="o" >
                                                <span class="f-14">o</span>
                                            </label>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="pills-interior" role="tabpanel" aria-labelledby="pills-interior-tab">

                                        <div class="txt-chkboxs-main d-flex flex-wrap">
                                            <label class="txt-chkbox-custom" for="interior_b">
                                                <input class="hide-inp" type="radio" name="interior_b" id="interior_b" value="B" >
                                                <span class="f-14">B</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_bd">
                                                <input class="hide-inp" type="radio" name="interior_bd" id="interior_bd" value="BD" >
                                                <span class="f-14">BD</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_c">
                                                <input class="hide-inp" type="radio" name="interior_c" id="interior_c" value="C" >
                                                <span class="f-14">C</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_cr">
                                                <input class="hide-inp" type="radio" name="interior_cr" id="interior_cr" value="CR" >
                                                <span class="f-14">CR</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_d">
                                                <input class="hide-inp" type="radio" name="interior_d" id="interior_d" value="d" >
                                                <span class="f-14">d</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_dl">
                                                <input class="hide-inp" type="radio" name="interior_dl" id="interior_dl" value="DL" >
                                                <span class="f-14">DL</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_f">
                                                <input class="hide-inp" type="radio" name="interior_f" id="interior_f" value="f" >
                                                <span class="f-14">F</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_mc">
                                                <input class="hide-inp" type="radio" name="interior_mc" id="interior_mc" value="mc" >
                                                <span class="f-14">MC</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_oc">
                                                <input class="hide-inp" type="radio" name="interior_oc" id="interior_oc" value="oc" >
                                                <span class="f-14">OC</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_pr">
                                                <input class="hide-inp" type="radio" name="interior_pr" id="interior_pr" value="pr" >
                                                <span class="f-14">PR</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_r">
                                                <input class="hide-inp" type="radio" name="interior_r" id="interior_r" value="r" >
                                                <span class="f-14">R</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_sc">
                                                <input class="hide-inp" type="radio" name="interior_sc" id="interior_sc" value="sc" >
                                                <span class="f-14">sc</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_s">
                                                <input class="hide-inp" type="radio" name="interior_s" id="interior_s" value="s" >
                                                <span class="f-14">s</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_sl">
                                                <input class="hide-inp" type="radio" name="interior_sl" id="interior_sl" value="sl" >
                                                <span class="f-14">sl</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_ws">
                                                <input class="hide-inp" type="radio" name="interior_ws" id="interior_ws" value="ws" >
                                                <span class="f-14">ws</span>
                                            </label>
                                            <label class="txt-chkbox-custom" for="interior_o">
                                                <input class="hide-inp" type="radio" name="interior_o" id="interior_o" value="o" >
                                                <span class="f-14">o</span>
                                            </label>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="mt-40">
                            <label for="advert_description" class="label-main-text f-20"> Advert description </label>
                            <textarea class="textarea-qa" name="advert_description" id="advert_description" cols="30" rows="10">{{ request()->session()->get('advert_description') }}</textarea>
                            <p class="dflexBt f-18 mt-1">
                                <span class="c-blue">Need help?</span>
                                <span class="c-gray">1500 characters left</span>
                            </p>
                        </div>
                        @if ($errors->has('advert_description'))
                        <span class="text-danger">{{ $errors->first('advert_description') }}</span>
                        @endif
                        <div class="mt-40">
                            <label for="attention_grabber" class="label-main-text f-20"> Attention Grabber </label>
                            <textarea class="textarea-qa textarea-qa-sm" name="attention_grabber" id="attention_grabber" cols="30" rows="10">{{ request()->session()->get('attention_grabber') }}</textarea>
                            <p class="f-18 c-gray text-right mt-1">
                                30 characters left
                            </p>
                        </div>
                        @if ($errors->has('attention_grabber'))
                        <span class="text-danger">{{ $errors->first('attention_grabber') }}</span>
                        @endif
                        <div class="mt-40">
                            <h2 class="headingqa-4 f-40">Tyre tread depths</h2>
                           
                                <p class="gallery-top-text mb-10 f-18">Interior</p>
                                <div class="gallery-upload-main">
                                    <label for="tyre_image" class="custom-gallery-upload">
                                        <input type="file" name="tyre_image[]" multiple id="tyre_image" class="hide-inp" onchange="getFileName(this)">
                                        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img10.png')}}" alt="car image" >
                                    </label>
                                    {{-- <label for="interior_image_2" class="custom-gallery-upload">
                                        <input type="file" name="interior_image_2" id="interior_image_2" class="hide-inp" onchange="getFileName(this)">
                                        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img11.png')}}" alt="car image" >
                                    </label>
                                    <label for="interior_image_3" class="custom-gallery-upload">
                                        <input type="file" name="interior_image_3" id="interior_image_3" class="hide-inp" onchange="getFileName(this)">
                                        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img12.png')}}" alt="car image" >
                                    </label>
                                    <label for="interior_image_4" class="custom-gallery-upload">
                                        <input type="file" name="interior_image_4" id="interior_image_4" class="hide-inp" onchange="getFileName(this)">
                                        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img13.png')}}" alt="car image" >
                                    </label>
                                    <label for="interior_image_5" class="custom-gallery-upload">
                                        <input type="file" name="interior_image_5" id="interior_image_5" class="hide-inp" onchange="getFileName(this)">
                                        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img14.png')}}" alt="car image" >
                                    </label> --}}
                                    {{-- @if ($errors->has('interior_image_1'))
                                    <span class="text-danger">{{ $errors->first('interior_image_1') }}</span>
                                    @endif --}}
                                    {{-- @if ($errors->has('interior_image_2'))
                                    <span class="text-danger">{{ $errors->first('interior_image_2') }}</span>
                                    @endif
                                    @if ($errors->has('interior_image_3'))
                                    <span class="text-danger">{{ $errors->first('interior_image_3') }}</span>
                                    @endif
                                    @if ($errors->has('interior_image_4'))
                                    <span class="text-danger">{{ $errors->first('interior_image_4') }}</span>
                                    @endif
                                    @if ($errors->has('interior_image_5'))
                                    <span class="text-danger">{{ $errors->first('interior_image_5') }}</span>
                                    @endif --}}
        
        
                                </div>
        
                            <div class="d-flex gap-40">
                                <div class="counter-main">
                                    <label for="" class="d-block">Nearside Front</label>
                                    <div class="counter-with-unit">
                                        <div class="counter-inp">
                                            <input type="number" name="nearside_front" value="{{ request()->session()->get('nearside_front') }}">
                                            <span class="count">@if(request()->session()->get('nearside_front')) {{request()->session()->get('nearside_front')}} @else 0 @endif</span>
                                            <span class="unit">mm</span>
                                        </div>
                                        <div class="counter-btns">
                                            <button type="button" onclick="increment(this)" > <i class="fa-solid fa-angle-up"></i> </button>
                                            <button type="button" onclick="decrement(this)" > <i class="fa-solid fa-angle-down"></i> </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('nearside_front'))
                                    <span class="text-danger">{{ $errors->first('nearside_front') }}</span>
                                    @endif
                                </div>

                                <div class="counter-main">
                                    <label for="" class="d-block">Nearside Rear</label>
                                    <div class="counter-with-unit">
                                        <div class="counter-inp">
                                            <input type="number" name="nearside_rear"  value="{{ request()->session()->get('nearside_rear') }}">
                                            <span class="count">@if(request()->session()->get('nearside_rear')) {{request()->session()->get('nearside_rear')}} @else 0 @endif</span>
                                            <span class="unit">mm</span>
                                        </div>
                                        <div class="counter-btns">
                                            <button type="button" onclick="increment(this)" > <i class="fa-solid fa-angle-up"></i> </button>
                                            <button type="button" onclick="decrement(this)" > <i class="fa-solid fa-angle-down"></i> </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('nearside_rear'))
                                    <span class="text-danger">{{ $errors->first('nearside_rear') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="d-flex gap-40">
                                <div class="counter-main">
                                    <label for="" class="d-block">Offside Front</label>
                                    <div class="counter-with-unit">
                                        <div class="counter-inp">
                                            <input type="number" name="offside_front" value="{{ request()->session()->get('offside_front') }}" >
                                            <span class="count">@if(request()->session()->get('offside_front')) {{request()->session()->get('offside_front')}} @else 0 @endif</span>
                                            <span class="unit">mm</span>
                                        </div>
                                        <div class="counter-btns">
                                            <button type="button" onclick="increment(this)" > <i class="fa-solid fa-angle-up"></i> </button>
                                            <button type="button" onclick="decrement(this)" > <i class="fa-solid fa-angle-down"></i> </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('offside_front'))
                                    <span class="text-danger">{{ $errors->first('offside_front') }}</span>
                                    @endif
                                </div>

                                <div class="counter-main">
                                    <label for="" class="d-block">Offside Rear</label>
                                    <div class="counter-with-unit">
                                        <div class="counter-inp">
                                            <input type="number" name="offside_rear" value="{{ request()->session()->get('offside_rear') }}">
                                            <span class="count">@if(request()->session()->get('offside_rear')) {{request()->session()->get('offside_rear')}} @else 0 @endif</span>
                                            <span class="unit">mm</span>
                                        </div>
                                        <div class="counter-btns">
                                            <button type="button" onclick="increment(this)" > <i class="fa-solid fa-angle-up"></i> </button>
                                            <button type="button" onclick="decrement(this)" > <i class="fa-solid fa-angle-down"></i> </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('offside_rear'))
                                        <span class="text-danger">{{ $errors->first('offside_rear') }}</span>
                                    @endif
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
                                <span><a href="{{route('dealer.vehicleListing')}}">Go Back</a></span>
                            </button>
                            {{-- <button type="submit" class="btn-trans step2-btn-save">
                                Save for Now
                            </button> --}}
                        </div>

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
                      
                        {{ request()->session()->get('vehicle_name') }}
                    </h3>
                    <ul class="item-features">
                        <li> {{ request()->session()->get('vehicle_registartion_number') }}</li>
                        <li> {{ request()->session()->get('vehicle_year') }}</li>
                        <li>{{ request()->session()->get('vehicle_color') }}</li>
                        <li> {{ request()->session()->get('vehicle_body') }}</li>
                        <li>{{ request()->session()->get('vehicle_mileage') }}</li>
                        <li> {{ request()->session()->get('vehicle_transmission') }}</li>
                      
                    </ul>
                </div>
            </div>
            <div class="d-flex gap-2 justify-content-end mt-4">
                {{-- <button type="button" class="btn-qa1 f-16 btn-border-sm">Save Advert</button> --}}
                <button type="submit" class="btn-qa1 f-16 btn-filled-sm">Publish Advert</button>
            </div>

    </div>

    </div>

</div>
</section>
    <span>Do you have any damage on this vehicle</span><br>
    <input class="" type="radio" name="damage_any" id="any_damage_checked_yes" value="yes" @if(request()->session()->get('any_damage_checked') == '1') checked @endif>
    <label class="dflex-gap10" for="any_damage_checked_yes">
        <span class="radio-circle"></span>
        <span>Yes</span>
    </label> 
    <input class="" type="radio" name="damage_any" id="any_damage_checked_yes" value="no" @if(request()->session()->get('any_damage_checked') == '1') checked @endif>
    <label class="dflex-gap10" for="any_damage_checked_yes">
        <span class="radio-circle"></span>
        <span>No</span>
    </label>                            
<section class="step-form-sec">
    
    <div class="container-1200">
        <!--interior -->
        
        <div class="step-main-wrap">
            <!--<div id="svg_wrap"></div>-->
            <h1 class="step-main-head">Interior Information</h1>
            <section class="step-wrapper">
                
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Dashboard</h2>
                            <ul class="parts-content">
                            <li>
                                <label>
                                    <input type="radio" class="step-list-check" name="dashboard" value="Stained" hidden>
                                    <span>Stained (ST)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="step-list-check" name="dashboard" value="Torn/Ripped" hidden>
                                    <span>Torn / Ripped (T)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="step-list-check" name="dashboard" value="Warn" hidden>
                                    <span>Warn (W)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="step-list-check" name="dashboard" value="Dirty" hidden>
                                    <span>Dirty (D)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="step-list-check" name="dashboard" value="Broken/Damage"  hidden>
                                    <span>Broken / Damage (BD)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" class="step-list-check" name="dashboard" value="Bumt" hidden>
                                    <span>Bumt (B)</span>
                                </label>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/dashboard.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
    
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Passenger Side Interior</h2>
                            <ul class="parts-content">
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_side_interior" value="Stained" hidden>
                                        <span>Stained (ST)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_side_interior" value="Torn/Ripped" hidden>
                                        <span>Torn / Ripped (T)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_side_interior" value="Warn" hidden>
                                        <span>Warn (W)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_side_interior" value="Dirty" hidden>
                                        <span>Dirty (D)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_side_interior" value="Broken/Damage"  hidden>
                                        <span>Broken / Damage (BD)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_side_interior" value="Bumt" hidden>
                                        <span>Bumt (B)</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/passenger-side.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    
                </section>
    
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Driver Side Interior</h2>
                            <ul class="parts-content">
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_side_interior" value="Stained" hidden>
                                        <span>Stained (ST)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_side_interior" value="Torn/Ripped" hidden>
                                        <span>Torn / Ripped (T)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_side_interior" value="Warn" hidden>
                                        <span>Warn (W)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_side_interior" value="Dirty" hidden>
                                        <span>Dirty (D)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_side_interior" value="Broken/Damage"  hidden>
                                        <span>Broken / Damage (BD)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_side_interior" value="Bumt" hidden>
                                        <span>Bumt (B)</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/driver-side.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
    
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Floor</h2>
                            <ul class="parts-content">
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="floor" value="Stained" hidden>
                                        <span>Stained (ST)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="floor" value="Torn/Ripped" hidden>
                                        <span>Torn / Ripped (T)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="floor" value="Warn" hidden>
                                        <span>Warn (W)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="floor" value="Dirty" hidden>
                                        <span>Dirty (D)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="floor" value="Broken/Damage"  hidden>
                                        <span>Broken / Damage (BD)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="floor" value="Bumt" hidden>
                                        <span>Bumt (B)</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/floor.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
    
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Ceiling</h2>
                            <ul class="parts-content">
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="ceiling" value="Stained" hidden>
                                        <span>Stained (ST)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="ceiling" value="Torn/Ripped" hidden>
                                        <span>Torn / Ripped (T)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="ceiling" value="Warn" hidden>
                                        <span>Warn (W)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="ceiling" value="Dirty" hidden>
                                        <span>Dirty (D)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="ceiling" value="Broken/Damage"  hidden>
                                        <span>Broken / Damage (BD)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="ceiling" value="Bumt" hidden>
                                        <span>Bumt (B)</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/ceiling.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Boot</h2>
                            <ul class="parts-content">
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="boot" value="Stained" hidden>
                                        <span>Stained (ST)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="boot" value="Torn/Ripped" hidden>
                                        <span>Torn / Ripped (T)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="boot" value="Warn" hidden>
                                        <span>Warn (W)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="boot" value="Dirty" hidden>
                                        <span>Dirty (D)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="boot" value="Broken/Damage"  hidden>
                                        <span>Broken / Damage (BD)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="boot" value="Bumt" hidden>
                                        <span>Bumt (B)</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/boot.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Rear Windscreen</h2>
                            <ul class="parts-content">
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_windscreen" value="Stained" hidden>
                                        <span>Stained (ST)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_windscreen" value="Torn/Ripped" hidden>
                                        <span>Torn / Ripped (T)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_windscreen" value="Warn" hidden>
                                        <span>Warn (W)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_windscreen" value="Dirty" hidden>
                                        <span>Dirty (D)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_windscreen" value="Broken/Damage"  hidden>
                                        <span>Broken / Damage (BD)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_windscreen" value="Bumt" hidden>
                                        <span>Bumt (B)</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/rear-windscreen.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Passenger Seat</h2>
                            <ul class="parts-content">
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_seat" value="Stained" hidden>
                                        <span>Stained (ST)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_seat" value="Torn/Ripped" hidden>
                                        <span>Torn / Ripped (T)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_seat" value="Warn" hidden>
                                        <span>Warn (W)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_seat" value="Dirty" hidden>
                                        <span>Dirty (D)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_seat" value="Broken/Damage"  hidden>
                                        <span>Broken / Damage (BD)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="passenger_seat" value="Bumt" hidden>
                                        <span>Bumt (B)</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/passenger-seat.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Driver Seat</h2>
                            <ul class="parts-content">
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_seat" value="Stained" hidden>
                                        <span>Stained (ST)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_seat" value="Torn/Ripped" hidden>
                                        <span>Torn / Ripped (T)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_seat" value="Warn" hidden>
                                        <span>Warn (W)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_seat" value="Dirty" hidden>
                                        <span>Dirty (D)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_seat" value="Broken/Damage"  hidden>
                                        <span>Broken / Damage (BD)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="driver_seat" value="Bumt" hidden>
                                        <span>Bumt (B)</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/driver-seat.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="step-sec">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Rear Seats</h2>
                            <ul class="parts-content">
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_seats" value="Stained" hidden>
                                        <span>Stained (ST)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_seats" value="Torn/Ripped" hidden>
                                        <span>Torn / Ripped (T)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_seats" value="Warn" hidden>
                                        <span>Warn (W)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_seats" value="Dirty" hidden>
                                        <span>Dirty (D)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_seats" value="Broken/Damage"  hidden>
                                        <span>Broken / Damage (BD)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="step-list-check" name="rear_seats" value="Bumt" hidden>
                                        <span>Bumt (B)</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/rear-seat.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
        
                <div class="step-button-wrap">
                    <div class="step-button" id="prev">&larr; Previous</div>
                    <div class="step-button nxtBtn" id="next" >Next &rarr;</div>
                </div>
  
            </section>
            <!--<div class="button" id="submit">Agree and send application</div>-->
        </div>
        <!--exterior -->
        <div class="step-main-wrap">
            <div id="svg_wrap_ext"></div>
            <h1 class="step-main-head">Exterior Information</h1>
            <section class="step-wrapper">
                
                <section class="step-sec-ext">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Front Door Left</h2>
                            <ul class="parts-content">
                            <li>
                                <label>
                                    <input type="radio" name="front_door_left" value="Dent" class="step-list-check" hidden>
                                    <span>Dent (D)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_left" value="Broken" class="step-list-check" hidden>
                                    <span>Broken (B)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_left" value="Chips" class="step-list-check" hidden>
                                    <span>Chips (CH)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_left" value="Crack/Rust" class="step-list-check" hidden>
                                    <span>Crack / Rust (CR)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_left" value="Scratch" class="step-list-check" hidden>
                                    <span>Scratch (S)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_left" value="Wheel Scuff" class="step-list-check" hidden>
                                    <span>Wheel Scuff (WS)</span>
                                </label>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/front-door-left.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="step-sec-ext">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Back Door Left</h2>
                            <ul class="parts-content">
                            <li>
                                <label>
                                    <input type="radio" name="back_door_left" value="Dent" class="step-list-check" hidden>
                                    <span>Dent (D)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_left" value="Broken" class="step-list-check" hidden>
                                    <span>Broken (B)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_left" value="Chips" class="step-list-check" hidden>
                                    <span>Chips (CH)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_left" value="Crack/Rust" class="step-list-check" hidden>
                                    <span>Crack / Rust (CR)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_left" value="Scratch" class="step-list-check" hidden>
                                    <span>Scratch (S)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_left" value="Wheel Scuff" class="step-list-check" hidden>
                                    <span>Wheel Scuff (WS)</span>
                                </label>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/back-door-left.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="step-sec-ext">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Front Door Right</h2>
                            <ul class="parts-content">
                           <li>
                                <label>
                                    <input type="radio" name="front_door_right" value="Dent" class="step-list-check" hidden>
                                    <span>Dent (D)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_right" value="Broken" class="step-list-check" hidden>
                                    <span>Broken (B)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_right" value="Chips" class="step-list-check" hidden>
                                    <span>Chips (CH)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_right" value="Crack/Rust" class="step-list-check" hidden>
                                    <span>Crack / Rust (CR)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_right" value="Scratch" class="step-list-check" hidden>
                                    <span>Scratch (S)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front_door_right" value="Wheel Scuff" class="step-list-check" hidden>
                                    <span>Wheel Scuff (WS)</span>
                                </label>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/front-door-right.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="step-sec-ext">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Back Door Right</h2>
                           <ul class="parts-content">
                           <li>
                                <label>
                                    <input type="radio" name="back_door_right" value="Dent" class="step-list-check" hidden>
                                    <span>Dent (D)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_right" value="Broken" class="step-list-check" hidden>
                                    <span>Broken (B)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_right" value="Chips" class="step-list-check" hidden>
                                    <span>Chips (CH)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_right" value="Crack/Rust" class="step-list-check" hidden>
                                    <span>Crack / Rust (CR)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_right" value="Scratch" class="step-list-check" hidden>
                                    <span>Scratch (S)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back_door_right" value="Wheel Scuff" class="step-list-check" hidden>
                                    <span>Wheel Scuff (WS)</span>
                                </label>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/back-door-right.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="step-sec-ext">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Top</h2>
                           <ul class="parts-content">
                            <li>
                                <label>
                                    <input type="radio" name="top" value="Dent" class="step-list-check" hidden>
                                    <span>Dent (D)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="top" value="Broken" class="step-list-check" hidden>
                                    <span>Broken (B)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="top" value="Chips" class="step-list-check" hidden>
                                    <span>Chips (CH)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="top" value="Crack/Rust" class="step-list-check" hidden>
                                    <span>Crack / Rust (CR)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="top" value="Scratch" class="step-list-check" hidden>
                                    <span>Scratch (S)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="top" value="Wheel Scuff" class="step-list-check" hidden>
                                    <span>Wheel Scuff (WS)</span>
                                </label>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/top.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="step-sec-ext">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Bonut</h2>
                           <ul class="parts-content">
                            <li>
                                <label>
                                    <input type="radio" name="bonut" value="Dent" class="step-list-check" hidden>
                                    <span>Dent (D)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="bonut" value="Broken" class="step-list-check" hidden>
                                    <span>Broken (B)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="bonut" value="Chips" class="step-list-check" hidden>
                                    <span>Chips (CH)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="bonut" value="Crack/Rust" class="step-list-check" hidden>
                                    <span>Crack / Rust (CR)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="bonut" value="Scratch" class="step-list-check" hidden>
                                    <span>Scratch (S)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="bonut" value="Wheel Scuff" class="step-list-check" hidden>
                                    <span>Wheel Scuff (WS)</span>
                                </label>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/bonut.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="step-sec-ext">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Front</h2>
                           <ul class="parts-content">
                            <li>
                                <label>
                                    <input type="radio" name="front" value="Dent" class="step-list-check" hidden>
                                    <span>Dent (D)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front" value="Broken" class="step-list-check" hidden>
                                    <span>Broken (B)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front" value="Chips" class="step-list-check" hidden>
                                    <span>Chips (CH)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front" value="Crack/Rust" class="step-list-check" hidden>
                                    <span>Crack / Rust (CR)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front" value="Scratch" class="step-list-check" hidden>
                                    <span>Scratch (S)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="front" value="Wheel Scuff" class="step-list-check" hidden>
                                    <span>Wheel Scuff (WS)</span>
                                </label>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/front.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="step-sec-ext">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="part-heading">Back</h2>
                           <ul class="parts-content">
                            <li>
                                <label>
                                    <input type="radio" name="back" value="Dent" class="step-list-check" hidden>
                                    <span>Dent (D)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back" value="Broken" class="step-list-check" hidden>
                                    <span>Broken (B)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back" value="Chips" class="step-list-check" hidden>
                                    <span>Chips (CH)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back" value="Crack/Rust" class="step-list-check" hidden>
                                    <span>Crack / Rust (CR)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back" value="Scratch" class="step-list-check" hidden>
                                    <span>Scratch (S)</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio"  name="back" value="Wheel Scuff" class="step-list-check" hidden>
                                    <span>Wheel Scuff (WS)</span>
                                </label>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="step-img">
                                <img src="{{ URL::asset('frontend/dealers/assets/image/back.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </section>
    
                <div class="step-button-wrap">
                    <div class="step-button-ext" id="prev-ext">&larr; Previous</div>
                    <div class="step-button-ext" id="next-ext">Next &rarr;</div>
                </div>
  
            </section>
            <!--<div class="button" id="submit">Agree and send application</div>-->
        </div>
    </div>
</section>

</form>



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


<!--Alert Modal-->
<button type="button" class="alertModalOn" data-bs-toggle="modal" data-bs-target="#selectAnyRadio" style="display:none;">Launch static backdrop modal</button>
<div class="modal fade modalTN" id="selectAnyRadio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="selectAnyRadioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="Modal__component">
        	<h3>Alert!</h3>
        	<article class="">
        		<i class="fa fa-info-circle" aria-hidden="true"></i>
        		<p>Please Select Atleast One Option</p>
        	</article>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
     $('button.nxtBtn').on('click', function(){

var vehicleSteps = $(this).closest('.vehicleSteps');
var numChecked = $(vehicleSteps).find('.checboxNum').text();
var numcheckBoxChecked = $(vehicleSteps).find('.checkboxNum').text();
var numChecked1 = parseInt(numChecked);
var numcheckBoxChecked1 = parseInt(numcheckBoxChecked);

if( numChecked1 < 1){
    $('#selectAnyRadio').modal('toggle');
}
else if( numcheckBoxChecked1 < 1){
    $('#selectAnyRadio').modal('toggle');
}
else{
     $(vehicleSteps).removeClass('vehicleStepsActive');
     $(vehicleSteps).slideUp();
     $(vehicleSteps).next().slideDown();
     $(vehicleSteps).next().addClass('vehicleStepsActive');
}

});



</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--<script src="{}"></script>-->

@endsection


