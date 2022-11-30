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

            <form action="">

                <h2 class="headingqa-2 f-40 ">Vehicle History</h2>

                <div>
                    <p class="label-main-text f-20"> Keys </p>

                    <ul class="list-unstyled d-flex gap-4">
                        <li class="radio-option-box min-width-170">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="keys" id="two_keys" value="2+ keys">
                                <label class="dflex-gap10" for="two_keys">
                                    <span class="radio-circle"></span>
                                    <span>2+ keys</span>
                                </label>
                            </div>
                        </li>
                        <li class="radio-option-box min-width-170">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="keys" id="one_keys" value="1 key">
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
                                <input class="hide-inp" type="radio" name="service_history_title" id="full_history" value="Full history">
                                <label class="dflex-gap10" for="full_history">
                                    <span class="radio-circle"></span>
                                    <span>Full history</span>
                                </label>
                            </div>
                        </li>
                        <li class="radio-option-box">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="service_history_title" id="full_frnachise_history" value="Full franchise history">
                                <label class="dflex-gap10" for="full_frnachise_history">
                                    <span class="radio-circle"></span>
                                    <span>Full franchise history</span>
                                </label>
                            </div>
                        </li>

                        <li class="radio-option-box">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="service_history_title" id="partial_history" value="Partial history">
                                <label class="dflex-gap10" for="partial_history">
                                    <span class="radio-circle"></span>
                                    <span>Partial history</span>
                                </label>
                            </div>
                        </li>
                        <li class="radio-option-box">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="service_history_title" id="no_history" value="No history">
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
                    <label class="label-main-text f-20" for="mileage"> Mileage </label>
                    <input class="inp-qa f-20" type="text" placeholder="0" id="mileage">
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
                                <input class="hide-inp" type="radio" name="origin" id="origin_uk" value="UK Vehicle">
                                <label class="dflex-gap10" for="origin_uk">
                                    <span class="radio-circle"></span>
                                    <span>UK Vehicle</span>
                                </label>
                            </div>
                        </li>
                        <li class="radio-option-box min-width-170">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="origin" id="origin_import" value="Import">
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

                {{-- <div class="mt-40">
                    <label class="label-main-text f-20" for="search_spec_step4"> Search for spec </label>
                    <input class="inp-qa f-20" type="text" placeholder="Type a spec item..." id="search_spec_step4">
                </div> --}}

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
                        <select class="interiorSelect-step4  form-control multi-select-step4" name="interior" id="interiorSelect_step4" multiple="multiple">
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
                        <select class="exteriorSelect-step4  form-control multi-select-step4" name="exterior" id="exteriorSelect_step4" multiple="multiple">
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
                        <select class="audioSelect-step4  form-control multi-select-step4" name="audio_and_communications" id="audioSelect_step4" multiple="multiple">
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
                        <select class="driverAssistanceSelect-step4  form-control multi-select-step4" name="drivers_assistance" id="driverAssistanceSelect_step4" multiple="multiple">
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
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Battery Charge Warning
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Cruise Control with Programmable Speed Limiter
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Distance to Next Service Indicator
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Door Open Warning
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Oil Level Indicator
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Park Assist - 180 Degree
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Rear Parking Sensors
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Rev Counter
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Speedometer with Digital Odometer and Digital Trip Recorder
                            </span>
                        </label>
                    </li>


                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Trip Computer
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
                            <span class="checkbox-square f-20">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            <span class="f-18">
                                Tyre Pressure Monitor
                            </span>
                        </label>
                    </li>
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" id="checkbox_questions">
                        <label class="dflex-gap10" for="checkbox_questions">
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
                    <label class="multi-select-qa" for="illumination">
                        <p class="multiselect-label label-main-text f-20 dflexBt">
                            <span>Illumination  <span>  </span> </span>
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="illuminationSelect-step4  form-control multi-select-step4" name="illumination" id="illumination" multiple="multiple">
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
                    <label class="multi-select-qa" for="performance">
                        <p class="multiselect-label label-main-text f-20 dflexBt">
                            <span>Performance  <span>  </span> </span>
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="performanceSelect-step4  form-control multi-select-step4" id="performance" name="performance" multiple="multiple">
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
                    <label class="multi-select-qa" for="safety_and_security" >
                        <p class="multiselect-label label-main-text f-20 dflexBt">
                            <span>Safety and Security  <span>  </span> </span>
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="safetySelect-step4  form-control multi-select-step4" id="safety_and_security" name="safety_and_security"  multiple="multiple">
                            <option value="Alarm">
                                Alarm
                            </option>
                            <option value="Electronic Stability Control with Hill Assist">
                                Electronic Stability Control with Hill Assist
                            </option>
                        </select>
                    </label>
                </div>


                {{-- <button type="button" class="btn-qa1 f-25 w-100 mt-40"> Continue to Listing Details </button> --}}
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


