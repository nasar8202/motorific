@extends('frontend.dealer.layouts.app')
@section('title', 'Sell your car the with Motorific')
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

                    <form action="{{ route('dealer.vehicleAndDetailsPost') }}" method="POST" accept-charset="utf-8"
                        enctype="multipart/form-data">
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
                            <!-- Custom Code Testing-->
                            <label class="gallery-top-text mb-10 f-18">Exterior</label>
                            <span>(Upload 5 pictures only)</span>
                            <div class="cts-files">
                                <input type="file" onchange="uploadFile(this)" class="upload-img-btn" name="image_1[]"
                                    class="" multiple id="image_1" accept="image/*">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img1.png') }}">
                                <div class="upload-imgErros"></div>
                                <div id="selectedFiles" class="upload-img-wraper selectedFilesTn"></div>
                            </div>
                            @if ($errors->has('image_1'))
                                <span class="text-danger">{{ $errors->first('image_1') }}</span>
                            @endif
                            <!--End -->

                            <!--<div class="gallery-upload-main">-->

                            <!--    <label for="image_1" class="custom-gallery-upload">-->
                            <!--        <input type="file" name="image_1[]" id="image_1" multiple class="hide-inp" onchange="getFileName(this)">-->
                            <!--        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img1.png') }}" alt="car image" >-->

                            <!--    </label>-->

                            <!--    {{-- <label for="image_2" class="custom-gallery-upload">-->
                        <!--        <input type="file" name="image_2" id="image_2" class="hide-inp" onchange="getFileName(this)">-->
                        <!--        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img2.png')}}" alt="car image" >-->
                        <!--    </label>-->
                        <!--    <label for="image_3" class="custom-gallery-upload">-->
                        <!--        <input type="file" name="image_3" id="image_3" class="hide-inp" onchange="getFileName(this)">-->
                        <!--        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img3.png')}}" alt="car image" >-->
                        <!--    </label>-->
                        <!--    <label for="image_4" class="custom-gallery-upload">-->
                        <!--        <input type="file" name="image_4" id="image_4" class="hide-inp" onchange="getFileName(this)">-->
                        <!--        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img4.png')}}" alt="car image" >-->
                        <!--    </label>-->
                        <!--    <label for="image_5" class="custom-gallery-upload">-->
                        <!--        <input type="file" name="image_5" id="image_5" class="hide-inp" onchange="getFileName(this)">-->
                        <!--        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img5.png')}}" alt="car image" >-->
                        <!--    </label>-->
                        <!--    <label for="image_6" class="custom-gallery-upload">-->
                        <!--        <input type="file" name="image_6" id="image_6" class="hide-inp" onchange="getFileName(this)">-->
                        <!--        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img6.png')}}" alt="car image" >-->
                        <!--    </label>-->
                        <!--    <label for="image_7" class="custom-gallery-upload">-->
                        <!--        <input type="file" name="image_7" id="image_7" class="hide-inp" onchange="getFileName(this)">-->
                        <!--        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img7.png')}}" alt="car image" >-->
                        <!--    </label>-->
                        <!--    <label for="image_8" class="custom-gallery-upload">-->
                        <!--        <input type="file" name="image_8" id="image_8" class="hide-inp" onchange="getFileName(this)">-->
                        <!--        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img8.png')}}" alt="car image" >-->
                        <!--    </label>-->
                        <!--    <label for="image_9" class="custom-gallery-upload">-->
                        <!--        <input type="file" name="image_9" id="image_9" class="hide-inp" onchange="getFileName(this)">-->
                        <!--        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img9.png')}}" alt="car image" >-->
                        <!--    </label> --}}-->

                            <!--    {{-- @if ($errors->has('image_2'))-->
                        <!--    <span class="text-danger">{{ $errors->first('image_2') }}</span>-->
                        <!--    @endif-->
                        <!--    @if ($errors->has('image_3'))-->
                        <!--    <span class="text-danger">{{ $errors->first('image_3') }}</span>-->
                        <!--    @endif-->
                        <!--    @if ($errors->has('image_4'))-->
                        <!--    <span class="text-danger">{{ $errors->first('image_4') }}</span>-->
                        <!--    @endif-->
                        <!--    @if ($errors->has('image_5'))-->
                        <!--    <span class="text-danger">{{ $errors->first('image_5') }}</span>-->
                        <!--    @endif-->
                        <!--    @if ($errors->has('image_6'))-->
                        <!--    <span class="text-danger">{{ $errors->first('image_6') }}</span>-->
                        <!--    @endif-->
                        <!--    @if ($errors->has('image_7'))-->
                        <!--    <span class="text-danger">{{ $errors->first('image_7') }}</span>-->
                        <!--    @endif-->
                        <!--    @if ($errors->has('image_8'))-->
                        <!--    <span class="text-danger">{{ $errors->first('image_8') }}</span>-->
                        <!--    @endif-->
                        <!--    @if ($errors->has('image_9'))-->
                        <!--    <span class="text-danger">{{ $errors->first('image_9') }}</span>-->
                        <!--    @endif --}}-->
                            <!--</div>-->


                        </div>

                        <div class="mt-40">

                            <label class="gallery-top-text mb-10 f-18">Interior</label>
                            <span>(Upload 5 pictures only)</span>
                            <div class="cts-files">
                                <input type="file" onchange='uploadFile(this)' class="upload-img-btn"
                                    id="interior_image_1" name="interior_image_1[]" class="" multiple
                                    accept="image/*">
                                <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img10.png') }}">
                                <div class="upload-imgErros"></div>
                                <div id="selectedFiles" class="upload-img-wraper selectedFilesTn"></div>
                            </div>

                            @if ($errors->has('interior_image_1'))
                                <span class="text-danger">{{ $errors->first('interior_image_1') }}</span>
                            @endif
                            <div class="gallery-upload-main">
                                <!-- <label for="interior_image_1" class="custom-gallery-upload">
                                    <input type="file" name="interior_image_1[]" multiple id="interior_image_1" class="hide-inp" onchange="getFileName(this)">
                                    <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img10.png') }}" alt="car image" >
                                </label> -->
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

                        {{-- <div class="mt-40">
                        <label for="condition_damage" class="label-main-text f-20"> Condition / Damage </label>
                        <textarea class="textarea-qa" name="condition_damage" id="condition_damage" cols="30" rows="10"  >{{ old('condition_damage') ??request()->session()->get('condition_damage') }}</textarea>
                    </div>
                    @if ($errors->has('condition_damage'))
                    <span class="text-danger">{{ $errors->first('condition_damage') }}</span>
                    @endif --}}
                        {{-- <div class="mt-40">
                        <label for="condition_damage_url" class="label-main-text f-20"> Condition / Damage </label>
                        <div class="video-box-main">

                            <div class="upload-img-box sm-graybox upload-video-box">
                                <p class="f-18 c-dull-gray mb-0">Paste URL</p>
                                <input class="inp-qa inp-round"  name="condition_damage_url" type="text" value="{{ old('condition_damage_url') ?? request()->session()->get('condition_damage_url') }}">
                            </div>

                          

                        </div>
                    </div>
                    @if ($errors->has('condition_damage_url'))
                    <span class="text-danger">{{ $errors->first('condition_damage_url') }}</span>
                    @endif --}}
                        <div class="vehicle-condition-main mt-40">



                            <div class="mt-40">
                                <label for="advert_description" class="label-main-text f-20"> Advert description </label>
                                <textarea class="textarea-qa" name="advert_description" id="advert_description" cols="30" rows="10">{{ old('advert_description') ??request()->session()->get('advert_description') }}</textarea>
                                <p class="dflexBt f-18 mt-1">
                                    {{-- <span class="c-blue">Need help?</span> --}}
                                    <span class="c-gray">1500 characters left</span>
                                </p>
                            </div>
                            @if ($errors->has('advert_description'))
                                <span class="text-danger">{{ $errors->first('advert_description') }}</span>
                            @endif
                            <div class="mt-40">
                                <label for="attention_grabber" class="label-main-text f-20"> Attention Grabber </label>
                                <textarea class="textarea-qa textarea-qa-sm" name="attention_grabber" id="attention_grabber" cols="30"
                                    rows="10">{{ old('attention_grabber') ??request()->session()->get('attention_grabber') }}</textarea>
                                <p class="f-18 c-gray text-right mt-1">
                                    30 characters left
                                </p>
                            </div>
                            @if ($errors->has('attention_grabber'))
                                <span class="text-danger">{{ $errors->first('attention_grabber') }}</span>
                            @endif
                            <div class="mt-40">
                                <h2 class="headingqa-4 f-40">Tyre tread depths</h2>

                                <label class="gallery-top-text mb-10 f-18">Interior</label>
                                <div class="cts-files">
                                    <input type="file" onchange='uploadFile(this)' class="upload-img-btn"
                                        name="tyre_image[]" class="" multiple id="tyre_image" accept="image/*">
                                    <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img10.png') }}">
                                    <div class="upload-imgErros"></div>
                                    <div id="selectedFiles" class="upload-img-wraper qambaraaaa selectedFilesTn"></div>
                                </div>
                                <!-- <div class="cts-files">
                                        <input type="file" id="files11111" class="upload-img-btn" name="exterior" class="" multiple="" accept="image/*"  >
                                        <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img10.png') }}">
                                        <div class="upload-img-error-box"></div>
                                        <div id="selectedFiles_interior" class="upload-img-wraper"></div>
                                    </div> -->
                                <div class="gallery-upload-main">
                                    <!-- <label for="tyre_image" class="custom-gallery-upload">
                                            <input type="file" name="tyre_image[]" multiple id="tyre_image" class="hide-inp" onchange="getFileName(this)">
                                            <img src="{{ URL::asset('/frontend/dealers/assets/image/gallery-img10.png') }}" alt="car image" >
                                        </label> -->
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

                                {{-- <div class="d-flex gap-40">
                                <div class="counter-main">
                                    <label for="" class="d-block">Nearside Front</label>
                                    <div class="counter-with-unit">
                                        <div class="counter-inp">
                                            <input type="number" name="nearside_front" value="{{  request()->session()->get('nearside_front') }}">
                                            <span class="count">@if (request()->session()->get('nearside_front')) {{  request()->session()->get('nearside_front')}} @else 0 @endif</span>
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
                                            <input type="number" name="nearside_rear"  value="{{  request()->session()->get('nearside_rear') }}">
                                            <span class="count">@if (request()->session()->get('nearside_rear')) {{  request()->session()->get('nearside_rear')}} @else 0 @endif</span>
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
                                            <span class="count">@if (request()->session()->get('offside_front')) {{  request()->session()->get('offside_front')}} @else 0 @endif</span>
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
                                            <input type="number" name="offside_rear" value="{{  request()->session()->get('offside_rear') }}">
                                            <span class="count">@if (request()->session()->get('offside_rear')) {{  request()->session()->get('offside_rear')}} @else 0 @endif</span>
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

                            </div> --}}

                            </div>
                            <div class="mt-40">
                                <label for="condition_damage" class="label-main-text f-20"> Estimated Preparation Cost
                                </label>
                                <textarea class="textarea-qa textarea-qa-sm" name="condition_damage" id="condition_damage" cols="30"
                                    rows="10">{{ old('condition_damage') ??request()->session()->get('condition_damage') }}£45</textarea>
                            </div>

                            {{-- <div class="mt-40">
                        <label for="condition_damage_url" class="label-main-text f-20"> Condition / Damage </label>
                        <div class="video-box-main">

                            <div class="upload-img-box sm-graybox upload-video-box">
                                <p class="f-18 c-dull-gray mb-0">Paste URL</p>
                                <input class="inp-qa inp-round"  name="condition_damage_url" type="text" value="{{ old('condition_damage_url') ?? request()->session()->get('condition_damage_url') }}">
                            </div>

                          

                        </div>
                    </div>
                    @if ($errors->has('condition_damage_url'))
                    <span class="text-danger">{{ $errors->first('condition_damage_url') }}</span>
                    @endif --}}
                            <h2 class="headingqa-2 f-40">Vehicle Condition</h2>

                            <div class="details-field-main">

                                <p class="label-main-text f-20"> Is there any damage on your vehicle? </p>
                                <ul class="list-unstyled d-flex gap-4 mb-0">
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" name="any_damage_checked"
                                                id="any_damage_checked_yes" value="1"
                                                @if (request()->session()->get('any_damage_checked') == '1') checked @endif>
                                            <label class="dflex-gap10 any_damage_checked_label_yes"
                                                for="any_damage_checked_yes">
                                                <span class="radio-circle"></span>
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="radio-option-box">
                                        <div class="custom-radio-box d-flex">
                                            <input class="hide-inp" type="radio" checked name="any_damage_checked"
                                                id="any_damage_checked_no" value="0"
                                                @if (request()->session()->get('any_damage_checked') == '0') checked @endif>
                                            <label class="dflex-gap10 any_damage_checked_label_no"
                                                for="any_damage_checked_no">
                                                <span class="radio-circle"></span>
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                @if ($errors->has('any_damage_checked'))
                                    <span class="text-danger">{{ $errors->first('any_damage_checked') }}</span>
                                @endif

                            </div>

                            
                            <div class="bt-btns-main d-flex align-items-center btns-wraps">
                                <button type="button" class="btn-trans step4-back-btn btn-Prev d-block">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <span><a href="{{ route('dealer.vehicleListing') }}">Go Back</a></span>
                                </button>
                                {{-- <button type="submit" class="btn-trans step2-btn-save">
                            Save for Now
                        </button> --}}
                                <div class="d-flex gap-2 justify-content-end ">
                                    {{-- <button type="button" class="btn-qa1 f-16 btn-border-sm">Save Advert</button> --}}
                                    <button type="submit" class="btn-qa1 f-16 btn-filled-sm btn-publish">Publish Advert</button>
                                </div>
                            </div>

                        </div>



                </div>

                <!-- BOX-2 -->
                <div class="col-lg-6 col-md-8">
                    <div class="description-box graybox">
                        <div class="item-img">
                            <img src="{{ URL::asset('frontend/dealers/assets/image/your-image-vehicle.png')}}" alt="">
                            {{-- <img src="{{ URL::asset('frontend/dealers/assets/image/car1.png') }}" alt=""> --}}
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
                    {{-- <div class="d-flex gap-2 justify-content-end mt-4">
                
                <button type="submit" class="btn-qa1 f-16 btn-filled-sm">Publish Advert</button>
            </div> --}}

                </div>

            </div>

        </div>
    </section>
    {{-- <span>Do you have any damage on this vehicle</span><br>
    <input class="" type="radio" name="damage_any" id="any_damage_checked_yes" value="yes" @if (request()->session()->get('any_damage_checked') == '1') checked @endif>
    <label class="dflex-gap10" for="any_damage_checked_yes">
        <span class="radio-circle"></span>
        <span>Yes</span>
    </label>
    <input class="" type="radio" name="damage_any" id="any_damage_checked_yes" value="no" @if (request()->session()->get('any_damage_checked') == '1') checked @endif>
    <label class="dflex-gap10" for="any_damage_checked_yes">
        <span class="radio-circle"></span>
        <span>No</span>
    </label>                             --}}
    <section class="step-form-sec ">

        <div class="container-1200">
            <div class="step-form-sec-dealer-main d-none">
                <!--interior -->
                <div class="step-main-1">
                    {{-- <div class="parts-hide-show">
                        <p>Do you have any damage on this vehicle</p>
                        <label><input type="radio" name="damage_any" value="yes" class="parts-yes"> Yes</label>
                        <label><input type="radio" name="damage_any" value="no"  class="parts-no" checked> No</label>
                    
                </div> --}}
                    <div class="step-main-wrap ">
                        <!--<div id="svg_wrap"></div>-->


                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="step-main-head">Interior Information</h1>
                                <div class="prf-complete d-flex align-items-center interior-info-complete-txt d-none">
                                    <div>
                                        <img src="{{ URL::asset('frontend/seller/assets/image/check-gr.png') }}"
                                            alt="">
                                    </div>
                                    <h5 class="m-0"> Complete</h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="photo-up-sec-2-box-btn clr-s-gr my-auto f-btn">
                                    <button class="form-toggle-btn form-toggle-btn-interior" type="button">START</button>
                                </div>
                            </div>
                        </div>
                        <section class="step-wrapper form-wraper step-wrapper-interior">

                            <section class="step-sec">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Dashboard</h2>
                                        <ul class="parts-content">
                                            <span class="checkboxNum" style="display:none;">0</span>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="dashboard"
                                                        value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="dashboard"
                                                        value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="dashboard"
                                                        value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="dashboard"
                                                        value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="dashboard"
                                                        value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="dashboard"
                                                        value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/dashboard.png') }}"
                                                alt="">
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
                                                    <input type="radio" class="step-list-check"
                                                        name="passenger_side_interior" value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="passenger_side_interior" value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="passenger_side_interior" value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="passenger_side_interior" value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="passenger_side_interior" value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="passenger_side_interior" value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/passenger-side.png') }}"
                                                alt="">
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
                                                    <input type="radio" class="step-list-check"
                                                        name="driver_side_interior" value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="driver_side_interior" value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="driver_side_interior" value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="driver_side_interior" value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="driver_side_interior" value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check"
                                                        name="driver_side_interior" value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/driver-side.png') }}"
                                                alt="">
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
                                                    <input type="radio" class="step-list-check" name="floor"
                                                        value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor"
                                                        value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor"
                                                        value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor"
                                                        value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor"
                                                        value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor"
                                                        value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/floor.png') }}"
                                                alt="">
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
                                                    <input type="radio" class="step-list-check" name="ceiling"
                                                        value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling"
                                                        value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling"
                                                        value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling"
                                                        value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling"
                                                        value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling"
                                                        value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/ceiling.png') }}"
                                                alt="">
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
                                                    <input type="radio" class="step-list-check" name="boot"
                                                        value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot"
                                                        value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot"
                                                        value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot"
                                                        value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot"
                                                        value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot"
                                                        value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/boot.png') }}"
                                                alt="">
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
                                                    <input type="radio" class="step-list-check" name="rear_windscreen"
                                                        value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen"
                                                        value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen"
                                                        value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen"
                                                        value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen"
                                                        value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen"
                                                        value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/rear-windscreen.png') }}"
                                                alt="">
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
                                                    <input type="radio" class="step-list-check" name="passenger_seat"
                                                        value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat"
                                                        value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat"
                                                        value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat"
                                                        value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat"
                                                        value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat"
                                                        value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/passenger-seat.png') }}"
                                                alt="">
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
                                                    <input type="radio" class="step-list-check" name="driver_seat"
                                                        value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat"
                                                        value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat"
                                                        value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat"
                                                        value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat"
                                                        value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat"
                                                        value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/driver-seat.png') }}"
                                                alt="">
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
                                                    <input type="radio" class="step-list-check" name="rear_seats"
                                                        value="Stained" hidden>
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats"
                                                        value="Torn/Ripped" hidden>
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats"
                                                        value="Warn" hidden>
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats"
                                                        value="Dirty" hidden>
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats"
                                                        value="Broken/Damage" hidden>
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats"
                                                        value="Burnt" hidden>
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/rear-seat.png') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Passenger Back Door</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Stained" hidden="">
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Torn/Ripped" hidden="">
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Warn" hidden="">
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Dirty" hidden="">
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Broken/Damage" hidden="">
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Burnt" hidden="">
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/passengerback.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Driver Back Door</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Stained" hidden="">
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Torn/Ripped" hidden="">
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Warn" hidden="">
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Dirty" hidden="">
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Broken/Damage" hidden="">
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Burnt" hidden="">
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/driverback.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="step-button-wrap">
                                <div class="step-button" id="prev">&larr; Previous</div>
                                <div class="step-button nxtBtn" id="next">Next &rarr;</div>
                                <div class="step-button" id="submit">Submit</div>
                            </div>

                            <p class="pt-4">If no damage to report! Then continue next .</p>

                        </section>
                        <!--<div class="button" id="submit">Agree and send application</div>-->
                    </div>
                </div>
                <!--exterior -->
                <div class="step-main-2">
                    {{-- <div class="parts-hide-show">
                        <p>Do you have any damage on this vehicle</p>
                        <label><input type="radio"  name="damage_any_second" value="yes" class="parts-yes"> Yes</label>
                        <label><input type="radio" name="damage_any_second" value="no" class="parts-no" checked> No</label>
     
                </div> --}}
                    <div class="step-main-wrap">
                        <!-- <div id="svg_wrap_ext"></div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="step-main-head">Exterior Information</h1>
                                <div class="prf-complete d-flex align-items-center exterior-info-complete-txt d-none">
                                    <div>
                                        <img src="{{ URL::asset('frontend/seller/assets/image/check-gr.png') }}"
                                            alt="">
                                    </div>
                                    <h5 class="m-0"> Complete</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="photo-up-sec-2-box-btn clr-s-gr my-auto f-btn">
                                    <button class="form-toggle-btn form-toggle-btn-exterior" type="button">START</button>
                                </div>
                            </div>
                        </div>

                        <section class="step-wrapper form-wraper step-wrapper-exterior">

                            <section class="step-sec-ext">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Front Door Left</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_left" value="Dent"
                                                        class="step-list-check" hidden>
                                                    <span>Dent (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_left" value="Broken"
                                                        class="step-list-check" hidden>
                                                    <span>Broken (B)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_left" value="Chips"
                                                        class="step-list-check" hidden>
                                                    <span>Chips (CH)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_left" value="Crack/Rust"
                                                        class="step-list-check" hidden>
                                                    <span>Crack / Rust (CR)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_left" value="Scratch"
                                                        class="step-list-check" hidden>
                                                    <span>Scratch (S)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_left" value="Wheel Scuff"
                                                        class="step-list-check" hidden>
                                                    <span>Wheel Scuff (WS)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/front-door-left.png') }}"
                                                alt="">
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
                                                    <input type="radio" name="back_door_left" value="Dent"
                                                        class="step-list-check" hidden>
                                                    <span>Dent (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_left" value="Broken"
                                                        class="step-list-check" hidden>
                                                    <span>Broken (B)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_left" value="Chips"
                                                        class="step-list-check" hidden>
                                                    <span>Chips (CH)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_left" value="Crack/Rust"
                                                        class="step-list-check" hidden>
                                                    <span>Crack / Rust (CR)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_left" value="Scratch"
                                                        class="step-list-check" hidden>
                                                    <span>Scratch (S)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_left" value="Wheel Scuff"
                                                        class="step-list-check" hidden>
                                                    <span>Wheel Scuff (WS)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/back-door-left.png') }}"
                                                alt="">
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
                                                    <input type="radio" name="front_door_right" value="Dent"
                                                        class="step-list-check" hidden>
                                                    <span>Dent (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_right" value="Broken"
                                                        class="step-list-check" hidden>
                                                    <span>Broken (B)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_right" value="Chips"
                                                        class="step-list-check" hidden>
                                                    <span>Chips (CH)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_right" value="Crack/Rust"
                                                        class="step-list-check" hidden>
                                                    <span>Crack / Rust (CR)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_right" value="Scratch"
                                                        class="step-list-check" hidden>
                                                    <span>Scratch (S)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front_door_right" value="Wheel Scuff"
                                                        class="step-list-check" hidden>
                                                    <span>Wheel Scuff (WS)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/front-door-right.png') }}"
                                                alt="">
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
                                                    <input type="radio" name="back_door_right" value="Dent"
                                                        class="step-list-check" hidden>
                                                    <span>Dent (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_right" value="Broken"
                                                        class="step-list-check" hidden>
                                                    <span>Broken (B)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_right" value="Chips"
                                                        class="step-list-check" hidden>
                                                    <span>Chips (CH)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_right" value="Crack/Rust"
                                                        class="step-list-check" hidden>
                                                    <span>Crack / Rust (CR)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_right" value="Scratch"
                                                        class="step-list-check" hidden>
                                                    <span>Scratch (S)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back_door_right" value="Wheel Scuff"
                                                        class="step-list-check" hidden>
                                                    <span>Wheel Scuff (WS)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/back-door-right.png') }}"
                                                alt="">
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
                                                    <input type="radio" name="top" value="Dent"
                                                        class="step-list-check" hidden>
                                                    <span>Dent (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="top" value="Broken"
                                                        class="step-list-check" hidden>
                                                    <span>Broken (B)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="top" value="Chips"
                                                        class="step-list-check" hidden>
                                                    <span>Chips (CH)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="top" value="Crack/Rust"
                                                        class="step-list-check" hidden>
                                                    <span>Crack / Rust (CR)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="top" value="Scratch"
                                                        class="step-list-check" hidden>
                                                    <span>Scratch (S)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="top" value="Wheel Scuff"
                                                        class="step-list-check" hidden>
                                                    <span>Wheel Scuff (WS)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/top.png') }}"
                                                alt="">
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
                                                    <input type="radio" name="bonut" value="Dent"
                                                        class="step-list-check" hidden>
                                                    <span>Dent (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="bonut" value="Broken"
                                                        class="step-list-check" hidden>
                                                    <span>Broken (B)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="bonut" value="Chips"
                                                        class="step-list-check" hidden>
                                                    <span>Chips (CH)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="bonut" value="Crack/Rust"
                                                        class="step-list-check" hidden>
                                                    <span>Crack / Rust (CR)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="bonut" value="Scratch"
                                                        class="step-list-check" hidden>
                                                    <span>Scratch (S)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="bonut" value="Wheel Scuff"
                                                        class="step-list-check" hidden>
                                                    <span>Wheel Scuff (WS)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/bonut.png') }}"
                                                alt="">
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
                                                    <input type="radio" name="front" value="Dent"
                                                        class="step-list-check" hidden>
                                                    <span>Dent (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front" value="Broken"
                                                        class="step-list-check" hidden>
                                                    <span>Broken (B)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front" value="Chips"
                                                        class="step-list-check" hidden>
                                                    <span>Chips (CH)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front" value="Crack/Rust"
                                                        class="step-list-check" hidden>
                                                    <span>Crack / Rust (CR)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front" value="Scratch"
                                                        class="step-list-check" hidden>
                                                    <span>Scratch (S)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="front" value="Wheel Scuff"
                                                        class="step-list-check" hidden>
                                                    <span>Wheel Scuff (WS)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/front.png') }}"
                                                alt="">
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
                                                    <input type="radio" name="back" value="Dent"
                                                        class="step-list-check" hidden>
                                                    <span>Dent (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back" value="Broken"
                                                        class="step-list-check" hidden>
                                                    <span>Broken (B)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back" value="Chips"
                                                        class="step-list-check" hidden>
                                                    <span>Chips (CH)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back" value="Crack/Rust"
                                                        class="step-list-check" hidden>
                                                    <span>Crack / Rust (CR)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back" value="Scratch"
                                                        class="step-list-check" hidden>
                                                    <span>Scratch (S)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="back" value="Wheel Scuff"
                                                        class="step-list-check" hidden>
                                                    <span>Wheel Scuff (WS)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/back.png') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="step-sec-ext step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Windscreen</h2>
                                       <ul class="parts-content">
                                        <li>
                                            <label>
                                                <input type="radio" name="windscreen" value="Dent" class="step-list-check" hidden>
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Broken" class="step-list-check" hidden>
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Chips" class="step-list-check" hidden>
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Crack/Rust" class="step-list-check" hidden>
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Scratch" class="step-list-check" hidden>
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Wheel Scuff" class="step-list-check" hidden>
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/windscreen.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="step-button-wrap">
                                <div class="step-button-ext" id="prev-ext">&larr; Previous</div>
                                <div class="step-button-ext" id="next-ext">Next &rarr;</div>
                                <div class="step-button" id="submit-ext">Submit</div>
                            </div>

                            <p class="pt-4">If no damage to report! Then continue next .</p>

                        </section>
                        <!--<div class="button" id="submit">Agree and send application</div>-->

                    </div>
                </div>
            </div>
        </div>
    </section>

    </form>



    <!-- NEWSLETTER SECTION -->
    <section class="newsletter-sec"
        style="background-image: url({{ URL::asset('frontend/dealers/assets/image/newsletter-bg.png') }})">
        <div>
            <div class="container-1200">
                <div class="row">
                    {{-- <div class="col-lg-6 col-md-8">
                        <div class="newsletter-box">
                            <h4>What are you waiting for?</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut
                                labore</p>
                            <input class="inp-qa f-20" type="text" placeholder="Enter REG">
                            <button type="button" class="btn-mts f-25">
                                Value Your Car
                            </button>
                        </div>
                    </div> --}}

                    <div class="col-lg-12 col-md-8">
                        <div class="newsletter-box">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter and stay on top of industry news.</p>
                            <input class="inp-qa f-20" type="text" name="subscriber_email" id="subscriber_email" placeholder="Enter Email">
                            <button type="button" onclick="addSubscriber()" class="btn-mts f-25">
                                SUBSCRIBE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Alert Modal-->
    <!--<button type="button" class="alertModalOn" data-bs-toggle="modal" data-bs-target="#selectAnyRadio">Launch static backdrop modal</button>-->
    <div class="modal fade modalTN" id="selectAnyRadio" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="selectAnyRadioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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






    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->




@endsection


<!--step-form-sec-dealer-main-->
@push('child-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            console.log(' document');
            $(".any_damage_checked_label_no").click(function() {
                console.log('yes');
                $(".step-form-sec-dealer-main").addClass("d-none");
            });
            $(".any_damage_checked_label_yes").click(function() {
                console.log('no');
                $(".step-form-sec-dealer-main").removeClass("d-none");
            });


            $("#submit").click(function() {
                $(".interior-info-complete-txt").removeClass("d-none");
                $(".form-toggle-btn-interior").text("Edit");
                $('.form-toggle-btn-interior').css({
                    background: "#7977a2"
                })
                $('.step-wrapper-interior').slideToggle();
            });

            $("#submit-ext").click(function() {
                $(".exterior-info-complete-txt").removeClass("d-none");
                $(".form-toggle-btn-exterior").text("Edit");
                $('.form-toggle-btn-exterior').css({
                    background: "#7977a2"
                })
                $('.step-wrapper-exterior').slideToggle();
            });

        });
    </script>

<script type="text/javascript">
    function addSubscriber() {
        var subscriber_email = $("#subscriber_email").val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if(subscriber_email == '' || subscriber_email == null){
            alert('email field is required')
            return false;
        }
        else if(regex.test(subscriber_email) == false)
        {
            alert('invalid email format');
            return false;
        }
        $.ajax({
            type:"post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('addSubscriberEmail') }}',
            data: {
                subscriber_email,
                subscriber_email
            },
            success: function(response) {
                if(response == "exists"){
                    alert("This Email Already Subscribed!");
                }else if(response == "inserted"){
                    window.location.href = "{{ route('subscribeEmail')}}";
                    //alert("Congrats You Have Subscribe Successfully!");
                }
            },
            error:function(){
                alert('error')
            }
        });
      }
   
   
</script>

@endpush
