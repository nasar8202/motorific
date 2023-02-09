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

            <form action="{{ route('dealer.vehicleListingPost') }}" method="POST">
                @csrf
                <h2 class="headingqa-2 f-40 ">Vehicle History</h2>

                <div>
                    <p class="label-main-text f-20"> Keys </p>

                    <ul class="list-unstyled d-flex gap-4">
                        <li class="radio-option-box min-width-170">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="keys" id="two_keys" value="2+ keys"  @if(request()->session()->get('keys') == '2+ keys') checked @endif>
                                <label class="dflex-gap10" for="two_keys">
                                    <span class="radio-circle"></span>
                                    <span>2+ keys</span>
                                </label>
                            </div>
                        </li>
                        <li class="radio-option-box min-width-170">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="keys" id="one_keys" value="1 key" @if(request()->session()->get('keys') == '1 key') checked @endif>
                                <label class="dflex-gap10" for="one_keys">
                                    <span class="radio-circle"></span>
                                    <span>1 key</span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    @if ($errors->has('keys'))
                    <span class="text-danger">{{ $errors->first('keys') }}</span>
                    @endif

                </div>

                <div class="mt-40">
                    <label class="label-main-text f-20" for="previous_owners"> Previous Owners </label>
                    <input class="inp-qa f-20" type="text" value="{{session()->get('previous_owners')}}" placeholder="0" name="previous_owners" id="previous_owners">
                    @if ($errors->has('previous_owners'))
                    <span class="text-danger">{{ $errors->first('previous_owners') }}</span>
                    @endif
                </div>

                <div class="mt-40">
                    <p class="label-main-text f-20"> Service History </p>
                    <ul class="d-flex flex-wrap gap-4">
                        <li class="radio-option-box">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="service_history_title" @if(request()->session()->get('service_history_title') == 'Full history') checked @endif id="full_history" value="Full history">
                                <label class="dflex-gap10" for="full_history">
                                    <span class="radio-circle"></span>
                                    <span>Full history</span>
                                </label>
                            </div>
                        </li>

                        <li class="radio-option-box">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="service_history_title" id="full_frnachise_history"
                                @if(request()->session()->get('service_history_title') == 'Full franchise history') checked @endif value="Full franchise history">
                                <label class="dflex-gap10" for="full_frnachise_history">
                                    <span class="radio-circle"></span>
                                    <span>Full franchise history</span>
                                </label>
                            </div>
                        </li>

                        <li class="radio-option-box">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="service_history_title" id="partial_history"
                                @if(request()->session()->get('service_history_title') == 'Partial history') checked @endif value="Partial history">
                                <label class="dflex-gap10" for="partial_history">
                                    <span class="radio-circle"></span>
                                    <span>Partial history</span>
                                </label>
                            </div>
                        </li>

                        <li class="radio-option-box">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="service_history_title" id="no_history"
                                @if(request()->session()->get('service_history_title') == 'No history') checked @endif value="No history">
                                <label class="dflex-gap10" for="no_history">
                                    <span class="radio-circle"></span>
                                    <span>No history</span>
                                </label>
                            </div>
                        </li>

                    </ul>
                    @if ($errors->has('service_history_title'))
                    <span class="text-danger">{{ $errors->first('service_history_title') }}</span>
                    @endif
                </div>

                {{-- <div class="mt-40">
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

                </div> --}}

                <div class="mt-40">
                    <label class="label-main-text f-20" for="mileage"> Mileage </label>
                    <input class="inp-qa f-20" type="text" placeholder="0" value="{{session()->get('mileage')}}" id="mileage" name="mileage">
                    @if ($errors->has('mileage'))
                    <span class="text-danger">{{ $errors->first('mileage') }}</span>
                    @endif
                </div>

                <div class="mt-40">
                    <p class="label-main-text f-20"> V5 Status </p>
                    <ul class="list-unstyled d-flex gap-4">
                        <li class="radio-option-box min-width-170">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="v5_status" id="v5_present"
                                @if(request()->session()->get('v5_status') == 'Present') checked @endif value="Present">
                                <label class="dflex-gap10" for="v5_present">
                                    <span class="radio-circle"></span>
                                    <span>Present</span>
                                </label>
                            </div>
                        </li>
                        <li class="radio-option-box min-width-170">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="v5_status" id="v5_not_present"
                                @if(request()->session()->get('v5_status') == 'Not Present') checked @endif value="Not Present">
                                <label class="dflex-gap10" for="v5_not_present">
                                    <span class="radio-circle"></span>
                                    <span>Not Present</span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    @if ($errors->has('v5_status'))
                    <span class="text-danger">{{ $errors->first('v5_status') }}</span>
                    @endif
                </div>

                <div class="mt-40">
                    <p class="label-main-text f-20"> Origin </p>
                    <ul class="list-unstyled d-flex gap-4">
                        <li class="radio-option-box min-width-170">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="origin" id="origin_uk"
                                @if(request()->session()->get('origin') == 'UK Vehicle') checked @endif  value="UK Vehicle">
                                <label class="dflex-gap10" for="origin_uk">
                                    <span class="radio-circle"></span>
                                    <span>UK Vehicle</span>
                                </label>
                            </div>
                        </li>
                        <li class="radio-option-box min-width-170">
                            <div class="custom-radio-box d-flex">
                                <input class="hide-inp" type="radio" name="origin" id="origin_import"
                                @if(request()->session()->get('origin') == 'Import') checked @endif value="Import">
                                <label class="dflex-gap10" for="origin_import">
                                    <span class="radio-circle"></span>
                                    <span>Import</span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    @if ($errors->has('origin'))
                    <span class="text-danger">{{ $errors->first('origin') }}</span>
                    @endif
                </div>


                {{-- <div class="purple-box dflex-gap10">
                    <span class="error-icon">
                        <img src="{{ URL::asset('frontend/dealers/assets/image/error-icon.png')}}" alt="Add" class="img-fluid">
                    </span>
                    <span class="f-reg">
                        This spec has been automaticaly generated from 3rd party
                        sources. Please note that it is your responsiblity to
                        amend any  incorrect spec.
                    </span>
                </div> --}}

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
                            @php
                                $in_array_interior = explode(',',(session()->get('interior')));
                            @endphp
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="interiorSelect-step4  form-control multi-select-step4" name="interior[]" id="interiorSelect_step4" multiple="multiple">
                            <option value="Air Conditioning" @if(in_array('Air Conditioning',$in_array_interior)) checked @endif>
                                Air Conditioning
                            </option>
                            <option value="Twin Sliding Side Doors - Not Electric" @if(in_array('Twin Sliding Side Doors - Not Electric',$in_array_interior)) checked @endif>
                                Twin Sliding Side Doors - Not Electric
                            </option>
                        </select>
                    </label>
                    @if ($errors->has('interior'))
                    <span class="text-danger">{{ $errors->first('interior') }}</span>
                    @endif
                </div>


                <div class="mt-10">
                    <label class="multi-select-qa" for="exteriorSelect_step4">
                        <p class="multiselect-label label-main-text f-20 dflexBt">
                            <span>Exterior <span> </span> </span>
                            @php
                                $in_array_exterior = explode(',',(session()->get('exterior')));
                            @endphp
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="exteriorSelect-step4  form-control multi-select-step4" name="exterior[]" id="exteriorSelect_step4" multiple="multiple">
                            <option value="Acoustic Laminated Windscreen" @if(in_array('Acoustic Laminated Windscreen',$in_array_exterior)) checked @endif>
                                Acoustic Laminated Windscreen
                            </option>
                            <option value="Front Windows Tinted to 30 Percent Opacity" @if(in_array('Front Windows Tinted to 30 Percent Opacity',$in_array_exterior)) checked @endif>
                                Front Windows Tinted to 30 Percent Opacity
                            </option>
                        </select>
                    </label>
                    @if ($errors->has('exterior'))
                    <span class="text-danger">{{ $errors->first('exterior') }}</span>
                    @endif
                </div>


                <div class="mt-10">
                    <label class="multi-select-qa" for="audioSelect_step4">
                        <p class="multiselect-label label-main-text f-20 dflexBt">
                            <span>Audio and Communications  <span>  </span> </span>
                            @php
                            $in_array_audio = explode(',',(session()->get('audio_and_communications')));
                        @endphp
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="audioSelect-step4  form-control multi-select-step4" name="audio_and_communications[]" id="audioSelect_step4" multiple="multiple">
                            <option value="Air Conditioning" @if(in_array('Air Conditioning',$in_array_audio)) checked @endif>
                                Air Conditioning
                            </option>
                            <option value="Twin Sliding Side Doors - Not Electric" @if(in_array('Twin Sliding Side Doors - Not Electric',$in_array_audio)) checked @endif>
                                Twin Sliding Side Doors - Not Electric
                            </option>
                        </select>
                    </label>
                    @if ($errors->has('audio_and_communications'))
                    <span class="text-danger">{{ $errors->first('audio_and_communications') }}</span>
                    @endif
                </div>


                <div class="mt-10">
                    <label class="multi-select-qa" for="driverAssistanceSelect_step4">
                        <p class="multiselect-label label-main-text f-20 dflexBt">
                            <span>Drivers Assistance  <span>  </span> </span>
                            @php
                            $in_array_driver = explode(',',(session()->get('drivers_assistance')));
                        @endphp
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="driverAssistanceSelect-step4  form-control multi-select-step4" name="drivers_assistance[]" id="driverAssistanceSelect_step4" multiple="multiple">
                            <option value="Cruise Control with Programmable Speed Limiter" @if(in_array('Cruise Control with Programmable Speed Limiter',$in_array_driver)) checked @endif>
                                Cruise Control with Programmable Speed Limiter
                            </option>
                            <option value="Rear Parking Sensors"  @if(in_array('Rear Parking Sensors',$in_array_driver)) checked @endif >
                                Rear Parking Sensors
                            </option>
                        </select>
                    </label>
                    @if ($errors->has('drivers_assistance'))
                    <span class="text-danger">{{ $errors->first('drivers_assistance') }}</span>
                    @endif
                </div>


                <ul class="step4-checklist">
                    @php
                    $in_array_questions = explode(',',(session()->get('checkbox_questions')));
                @endphp
                    <li class="custom-checkbox d-flex">
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('1',$in_array_questions)) checked @endif value="1" id="checklist_1_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('2',$in_array_questions)) checked @endif value="2" id="checklist_2_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('3',$in_array_questions)) checked @endif value="3" id="checklist_3_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('4',$in_array_questions)) checked @endif value="4" id="checklist_4_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('5',$in_array_questions)) checked @endif value="5" id="checklist_5_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('6',$in_array_questions)) checked @endif value="6" id="checklist_6_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('7',$in_array_questions)) checked @endif value="7" id="checklist_7_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('8',$in_array_questions)) checked @endif value="8" id="checklist_8_step4">
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
                        <input class="hide-inp" type="checkbox"name="checkbox_questions[]" @if(in_array('9',$in_array_questions)) checked @endif value="9" id="checklist_9_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('10',$in_array_questions)) checked @endif value="10" id="checklist_10_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('11',$in_array_questions)) checked @endif value="11" id="checklist_11_step4">
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
                        <input class="hide-inp" type="checkbox" name="checkbox_questions[]" @if(in_array('12',$in_array_questions)) checked @endif value="12" id="checklist_12_step4">
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
                @if ($errors->has('checkbox_questions'))
                <span class="text-danger">{{ $errors->first('checkbox_questions') }}</span>
                @endif

                <div class="mt-40">
                    <label class="multi-select-qa" for="illumination">
                        <p class="multiselect-label label-main-text f-20 dflexBt">
                            <span>Illumination  <span>  </span> </span>
                            @php
                            $in_array_illumination = explode(',',(session()->get('illumination')));
                        @endphp
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="illuminationSelect-step4  form-control multi-select-step4" name="illumination[]" id="illumination" multiple="multiple">
                            <option value="Headlights with Integrated Daytime Running Lights - DRLs" @if(in_array('Headlights with Integrated Daytime Running Lights - DRLs',$in_array_illumination)) checked @endif>
                                Headlights with Integrated Daytime Running Lights - DRLs
                            </option>
                            <option value="Rear Parking Sensors"
                            @if(in_array('Rear Parking Sensors',$in_array_illumination)) checked @endif>
                                Rear Parking Sensors
                            </option>
                        </select>
                    </label>
                    @if ($errors->has('illumination'))
                    <span class="text-danger">{{ $errors->first('illumination') }}</span>
                    @endif
                </div>

                <div class="mt-10">
                    <label class="multi-select-qa" for="performance">
                        <p class="multiselect-label label-main-text f-20 dflexBt">
                            <span>Performance  <span>  </span> </span>
                            @php
                            $in_array_performance = explode(',',(session()->get('performance')));
                            @endphp
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="performanceSelect-step4  form-control multi-select-step4" id="performance" name="performance[]" multiple="multiple">
                            <option value="Headlights with Integrated Daytime Running Lights - DRLs"
                            @if(in_array('Headlights with Integrated Daytime Running Lights - DRLs',$in_array_performance)) checked @endif>>
                                Headlights with Integrated Daytime Running Lights - DRLs
                            </option>
                            <option value="Rear Parking Sensors"
                            @if(in_array('Rear Parking Sensors',$in_array_performance)) checked @endif>
                                Rear Parking Sensors
                            </option>
                        </select>
                    </label>
                    @if ($errors->has('performance'))
                    <span class="text-danger">{{ $errors->first('performance') }}</span>
                    @endif
                </div>

                <div class="mt-10">
                    <label class="multi-select-qa" for="safety_and_security" >
                        <p class="multiselect-label label-main-text f-20 dflexBt">
                            <span>Safety and Security  <span>  </span> </span>
                            @php
                            $in_array_safety = explode(',',(session()->get('safety_and_security')));
                            @endphp
                            <span class="select-icon"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        </p>
                        <select class="safetySelect-step4  form-control multi-select-step4" id="safety_and_security" name="safety_and_security[]"  multiple="multiple">
                            <option value="Alarm"
                            @if(in_array('Alarm',$in_array_performance)) checked @endif>
                                Alarm
                            </option>
                            <option value="Electronic Stability Control with Hill Assist"
                            @if(in_array('Electronic Stability Control with Hill Assist',$in_array_performance)) checked @endif>
                                Electronic Stability Control with Hill Assist
                            </option>
                        </select>
                    </label>
                    @if ($errors->has('safety_and_security'))
                    <span class="text-danger">{{ $errors->first('safety_and_security') }}</span>
                    @endif
                </div>


                {{-- <button type="button" class="btn-qa1 f-25 w-100 mt-40"> Continue to Listing Details </button> --}}
                <div class="vehicle-condition-main mt-10">

                    <div class="bt-btns-main d-flex">
                        <button type="button" class="btn-trans step4-back-btn">
                            <i class="fa-solid fa-arrow-left-long"></i>
                            <span><a href="{{route('dealer.mediaCondition')}}">Go Back</a></span>
                        </button>
                        <button type="submit" class="btn-trans step4-btn-save">
                            Next Step

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


