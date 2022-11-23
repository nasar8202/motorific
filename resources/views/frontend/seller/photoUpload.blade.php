@extends('frontend.seller.layouts.app')
@section('title','Photo Upload | Motorific')
@section('section')
<style>
    .dropdown {
position: relative;
display: inline-block;
color:white
}

.dropdown-content {
display: none;
position: absolute;
background-color: #f9f9f9;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
padding: 12px 16px;
z-index: 1;
}

.dropdown:hover .dropdown-content {
display: block;
}
    </style>
 <!-- HEADER -->
 <header>
    <div class="container-1600 d-flex justify-content-between pt-4">
        <div class="logo-navlinks d-flex align-items-center">
            <a href="{{ route('index') }}"><img src="{{ URL::asset('frontend/seller/assets/image/logo-w.png')}}" alt=""></a>
            <ul class="navlinks navlinks-w mb-0 align-items-center">
                <a href="{{ route('sellMyCar') }}">
                    <li>Sell My Car</li>
                </a>
                <a href="#">
                    <li>How It Works</li>
                </a>
                <a href="#">
                    <li>Reviews</li>
                </a>
                <a href="#">
                    <li>Help</li>
                </a>
                <div class="dropdown">
                    <span>More</span>
                    <div class="dropdown-content">
                   <a href="{{ route('DealerLogin') }}">For Dealers</a>
                   <a href="{{ route('sellMyCar') }}">Sell My Car</a>
                    </div>
                </div>
            </ul>
        </div>
        <div class="head-btns  justify-content-between">
            <button><a href="{{ route('myLogin') }}">Sign In</a></button>
            @if (Route::has('register'))
            <button><a href="{{ route('registration') }}">Sign Up</a></button>
            @endif
            <button>Contact Us</button>
        </div>
        <div class="menu">
            <div class="toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="navi">
                <ul>
                    <li><a  href="{{ route('sellMyCar') }}">Sell My Car</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Reviews</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
  <!-- PHOTO-UPLOAD-SECTION-1 -->
  <section class="photo-up-sec-1">
    <div class="container-1151">
        <img src="{{ URL::asset('frontend/seller/assets/image/ford.png')}}" alt="">
        <h3>GJ65 YUA</h3>
        <p>Volkswagen Golf R DSG</p>
        <div class="chart">
            <ul>
                <li>2015</li>
                <li>43,000 miles</li>
                <li>Grey</li>
                <li>Hatchback</li>
                <li>Petrol</li>
            </ul>
        </div>
    </div>
</section>

<!-- PHOTO-UPLOAD-SECTION-1 -->
<section class="photo-up-sec-2">
    <div class="container-1151">
        <div class="photo-up-sec-2-heading text-center">
            <h3>Complete your profile steps to get your vehicle for sale</h3>
        </div>

        <div class="photo-up-sec-2-box-main">
            <div class="photo-up-sec-2-box">
                <div class="photo-up-sec-2-box-txt">
                    <h4>Personal Information</h4>
                    <div class="photo-up-sec-2-box-personal-information">
                        <p>Wasif</p>
                        <p>sureshbca@gmail.com</p>
                        <p>07735 772 373</p>
                    </div>
                    <div class="prf-complete d-flex align-items-center">
                        <div>
                            <img src="{{ URL::asset('frontend/seller/assets/image/check-gr.png')}}" alt="">
                        </div>
                        <h3> Complete</h3>
                    </div>
                </div>
                <div class="photo-up-sec-2-box-btn clr-prp my-auto">
                    <button onclick="myFunction3()">EDIT</button>
                </div>
            </div>

            <div class="personal-info-main" id="myDIV3">
                <div class="personal-info-heading">
                    <h3>Personal Information</h3>
                    <p>Here’s the contact information you’ve given us. Please make sure it’s correct so we can keep you up to date.</p>
                </div>

                <div class="personal-info-form">
                    <form>
                        <div>
                            <h4>Full Name</h4>
                            <input type="text" placeholder="Enter Name">
                        </div>
                        <div>
                            <h4>Email</h4>
                            <input type="email" placeholder="Enter E-mail">
                        </div>
                        <div>
                            <h4>Phone Number</h4>
                            <input type="number" placeholder="Enter Phone">
                        </div>
                        <div class="personal-info-form-btn photo-up-sec-2-box-btn clr-s-gr text-center">
                            <button type="submit">CONFIRM</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="photo-up-sec-2-box-main">
            <div class="photo-up-sec-2-box">
                <div class="photo-up-sec-2-box-txt">
                    <h4>Vehicle Information</h4>
                </div>
                <div class="photo-up-sec-2-box-btn clr-prp my-auto">
                    <button onclick="myFunction4()">EDIT</button>
                </div>
            </div>
            <div class="personal-info-main" id="myDIV4">

                <div class="personal-info-form">
                    <form class="rowFormTn"> 
                        <div class="col-2Tn">
                            <h4>Vehicle Registeration Number</h4>
                            <input type="text" placeholder="Registeration Number" name="RegisterationNumber">    
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Name</h4>
                            <input type="text" placeholder="Vehicle Name" name="VehicleName">
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Year</h4>
                            <input type="text" placeholder="Vehicle Year" name="VehicleYear">
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Color</h4>
                            <input type="text" placeholder="Vehicle Color" name="VehicleColor">
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Type</h4>
                            <input type="text" placeholder="Vehicle Type" name="VehicleType">
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Tank</h4>
                            <input type="text" placeholder="Vehicle Tank" name="VehicleTank">
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Mileage</h4>
                            <input type="text" placeholder="Vehicle Mileage" name="VehicleMileage">
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Price</h4>
                            <input type="text" placeholder="Vehicle Price" name="VehiclePrice">
                        </div>
                        <div class="personal-info-form-btn photo-up-sec-2-box-btn clr-s-gr text-center">
                            <button type="submit">CONFIRM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="photo-up-sec-2-box-main">
            <div class="photo-up-sec-2-box">
                <div class="photo-up-sec-2-box-txt">
                    <h4>Condition and Damage</h4>
                </div>
                <div class="photo-up-sec-2-box-btn clr-prp my-auto">
                    <button onclick="myFunction5()">EDIT</button>
                </div>
            </div>
            <div class="personal-info-main" id="myDIV5">

                <div class="personal-info-form">
                    <form class="rowFormTn"> 
                        <div class="col-2Tn">
                            <h4>Your Exterior Grade</h4>
                            <input type="text" placeholder="Your Exterior Grade" name="YourExteriorGrade">    
                        </div>
                        <div class="col-2Tn">
                            <h4>Scratches and Scuffs</h4>
                            <select name="scratchesandScuffs">
                                <option>Is it Your car Have Scratches and Scuffs</option>
                            </select>
                        </div>
                        <div class="col-2Tn">
                            <h4>Dents</h4>
                            <select name="dents">
                                <option>Is it Your car have Dents</option>
                            </select>
                        </div>
                        <div class="col-2Tn">
                            <h4>Paintwork Problems</h4>
                            <select name="paintworkProblems">
                                <option>Is it Your car have Paintwork Problems</option>
                            </select>
                        </div>
                        <div class="col-2Tn">
                            <h4>Windscreen Damage</h4>
                            <select name="WindscreenDamage">
                                <option>Is it Your car's windscreen is damage</option>
                            </select>
                        </div>
                        <div class="col-2Tn">
                            <h4>Broken/Misisng Lights, Mirrors, Trim or fittings</h4>
                            <select name="brokenMissing">
                                <option>Broken/Misisng Lights, Mirrors, Trim or fittings</option>
                            </select>
                        </div>
                        <div class="col-2Tn">
                            <h4>Warning Lights on Dashboard</h4>
                            <select name="WarningLights">
                                <option>Warning Lights on Dashboard</option>
                            </select>
                        </div>
                        <div class="col-2Tn">
                            <h4>Your Service Record</h4>
                            <input type="text" placeholder="Your Service Record" name="YourServiceRecord">
                        </div>
                        <div class="col-2Tn">
                            <h4>Main Dealer Services</h4>
                            <input type="text" placeholder="Main Dealer Services" name="MainDealerServices">
                        </div>
                        <div class="col-2Tn">
                            <h4>Independent Dealer Service</h4>
                            <input type="text" placeholder="Independent Dealer Service" name="IndependentDealerService">
                        </div>
                        <div class="personal-info-form-btn photo-up-sec-2-box-btn clr-s-gr text-center">
                            <button type="submit">CONFIRM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="photo-up-sec-2-box-main">
            <form method="POST" action="{{route('vehicleInformation')}}">
                @csrf
            <div class="photo-up-sec-2-box">

                <div class="photo-up-sec-2-box-txt">
                    <h4>Vehicle Information</h4>
                    <div class="photo-up-sec-2-box-personal-information">
                        <p>Features, equipment & ownership</p>
                    </div>
                    <div class="prf-complete d-flex align-items-center">
                        <!--<div>-->
                        <!--    <img src="{{ URL::asset('frontend/seller/assets/image/load.png')}}" alt="">-->
                        <!--</div>-->
                        <!--<h3>15% Complete</h3>-->
                    </div>
                </div>
                <div class="photo-up-sec-2-box-btn clr-s-gr my-auto">
                    <button type="button" onclick="myFunction2()">Start</button>
                </div>
            </div>

            <div class="photo-up-sec-2" id="myDIV2">
                <form class="vehicleinformationForm">
                    <div class="photo-up-sec-2-vehicle-information">
                        <div class="vehicleStepsMain">
                            <!--0-->
                            <div class="vehicleStepsActive vehicleSteps" data-id="VehicleFeatures">
                                <span class="checkboxNum" style="display:none;">0</span>
                                <h3>Vehicle features</h3>
                                <p>Select the features your vehicle has.</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns">
                                            @if(count((array)session()->get('vehicle_feature')) != 0)
                                            @php
                                            $a=explode(',',session()->get('vehicle_feature'));
                                            // dd($a);
                                            @endphp
                                            @endif
                                            @foreach($VehicleFeature as $key=> $feature)
                                            <label for="sat_nav-{{$key}}">
                                                <input type="checkbox" class="feature" @if (isset($feature) && count((array)session()->get('vehicle_feature')) != 0) {{in_array( $feature->id, $a) ? 'checked' : '' }} @endif name="vehicle_feature[]" value="{{$feature->id}}"  id="sat_nav-{{$key}}"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$feature->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="panoramic_roof">
                                                <input type="checkbox" name="panoramic_roof" value="2" id="panoramic_roof"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Panoramic roof</p>
                                                </div>
                                            </label>
                                            <label for="heated_seats">
                                                <input type="checkbox" name="heated_seats" value="3" id="heated_seats"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Heated seats</p>
                                                </div>
                                            </label>
                                            <label for="parking_cam">
                                                <input type="checkbox" name="parking_cam" value="2" id="parking_cam"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Rear parking camera</p>
                                                </div>
                                            </label>
                                            <label for="sound_system">
                                                <input type="checkbox" name="sound_system" value="3" id="sound_system"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Upgraded sound system</p>
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="nxtBtn">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--1-->
                            <div class="vehicleSteps" data-id="SeatMaterial">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Seat material</h3>
                                <p>Select the material your seats are upholstered with.</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns withImgInLabel">
                                            @foreach($SeatMaterials as $key=> $seat)
                                            <label for="interiorType-cloth-{{$key}}">
                                                <input type="radio" name="seat_material" class="seatMaterial" value="{{$seat->id}}" @if($seat->id == session()->get('seat_material')) checked @endif  id="interiorType-cloth-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$seat->title}}</p>
                                                    <img src="{{ asset('materials/seat_material_iamges/'.$seat->image)}}" />
                                                   
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="interiorType-fauxleather">
                                                <input type="radio" name="interiorType" value="Fauxleather" id="interiorType-fauxleather"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Faux leather</p>
                                                    <img src="{{ URL::asset('frontend/seller/assets/image/fauxLeather.jpg')}}" />
                                                </div>
                                            </label>
                                            <label for="interiorType-halfleather">
                                                <input type="radio" name="interiorType" value="Halfleather" id="interiorType-halfleather"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Half leather</p>
                                                    <img src="{{ URL::asset('frontend/seller/assets/image/halfLeather.jpg')}}" />
                                                </div>
                                            </label>
                                            <label for="interiorType-halfsuede">
                                                <input type="radio" name="interiorType" value="Cloth" id="interiorType-halfsuede"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Half suede</p>
                                                    <img src="{{ URL::asset('frontend/seller/assets/image/halfSuede.jpg')}}" />
                                                </div>
                                            </label>
                                            <label for="interiorType-leather">
                                                <input type="radio" name="interiorType" value="Leather" id="interiorType-leather"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Leather</p>
                                                    <img src="{{ URL::asset('frontend/seller/assets/image/leather.jpg')}}" />
                                                </div>
                                            </label>
                                            <label for="interiorType-suede">
                                                <input type="radio" name="interiorType" value="Suede" id="interiorType-suede"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Suede</p>
                                                    <img src="{{ URL::asset('frontend/seller/assets/image/suede.jpg')}}" />
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>The locking wheel nut is a metal part usually located near the tool pack, either in the spare wheel or its compartment.</p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/halfLeather.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                        <button type="button" class="nxtBtn">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--2-->
                            <div class="vehicleSteps" data-id="NumberOfKeys">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Number of keys</h3>
                                <p>How many keys do you have?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns">
                                            @foreach($NumberOfKeys as $key=> $NumberOfKey)
                                            <label for="keysCount1-{{$key}}">
                                                <input type="radio" name="number_of_keys" class="numberOfKeys" value="{{$NumberOfKey->id}}" @if($NumberOfKey->id == session()->get('number_of_keys')) checked @endif id="keysCount1-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$NumberOfKey->number_of_key}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="keysCount2">
                                                <input type="radio" name="keysCount" value="2" id="keysCount2"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>2 key</p>
                                                </div>
                                            </label>
                                            <label for="keysCount3">
                                                <input type="radio" name="keysCount" value="3" id="keysCount3"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>3 key</p>
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>Please don't include any keys with problems, e.g. where the remote unlocking is broken.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                        <button type="button" class="nxtBtn">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--3-->
                            <div class="vehicleSteps" data-id="Toolpack">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Tool pack</h3>
                                <p>Do you have the tool pack that came with the vehicle?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns withImgInLabel">
                                            @foreach($ToolPacks as $key=> $tool)
                                            <label for="hasToolsInBoot-included-{{$key}}">
                                                <input type="radio" name="tool_pack" class="toolPack" value="{{$tool->id}}" @if($tool->id == session()->get('tool_pack')) checked @endif id="hasToolsInBoot-included-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$tool->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="hasToolsInBoot-missing">
                                                <input type="radio" name="hasToolsInBoot" value="Missing" id="hasToolsInBoot-missing"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Tool pack missing</p>
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>Check your spare wheel and its compartment — tool packs can usually be found there and should include a jack and wheel wrench.</p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/toolPack.avif')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                        <button type="button" class="nxtBtn">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--4-->
                            <div class="vehicleSteps" data-id="LockingWheelNut">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Locking wheel nut</h3>
                                <p>Do you have the locking wheel nut?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns withImgInLabel">
                                            @foreach($LockingWheelNuts as $key=> $wheelnut)
                                            <label for="lockingWheelNut-yes-{{$key}}">
                                                <input type="radio" name="locking_wheel_nut" class="wheelNut" value="{{$wheelnut->id}}" @if($wheelnut->id == session()->get('locking_wheel_nut')) checked @endif id="lockingWheelNut-yes-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$wheelnut->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="lockingWheelNut-no">
                                                <input type="radio" name="lockingWheelNut" value="No" id="lockingWheelNut-no"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Locking wheel nut missing</p>
                                                </div>
                                            </label>
                                            <label for="lockingWheelNut-not_applicable">
                                                <input type="radio" name="lockingWheelNut" value="Not Applicable" id="lockingWheelNut-not_applicable"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Wheels do not have locking nuts</p>
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>The locking wheel nut is a metal part usually located near the tool pack, either in the spare wheel or its compartment.</p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/wheelNut.avif')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                        <button type="button" class="nxtBtn">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--5-->
                            <div class="vehicleSteps" data-id="Smoking">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Smoking</h3>
                                <p>Has anyone regularly smoked in the vehicle?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns">
                                            @foreach($Smokings as $key=> $smoking)
                                            <label for="hasBeenSmokedIn-no-{{$key}}">
                                                <input type="radio" name="smoked_in" class="smoking" value="{{$smoking->id}}" @if($smoking->id == session()->get('smoked_in')) checked @endif id="hasBeenSmokedIn-no-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$smoking->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="hasBeenSmokedIn-yes">
                                                <input type="radio" name="hasBeenSmokedIn" value="Yes" id="hasBeenSmokedIn-yes"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Vehicle has been smoked in</p>
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>This does not include vaping. If vehicle has been vaped in, then please select ‘Vehicle has not been smoked in’.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                        <button type="button" class="nxtBtn">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--6 with Popup-->
                            <div class="vehicleSteps popUpOnFalse" data-id="V5CLogbook">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>V5C logbook</h3>
                                <p>Do you have the V5C logbook for this vehicle? You will only need to provide it once the vehicle has sold.</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns withImgInLabel">
                                           @foreach($VCLogBooks as $key=> $VCLogBook)
                                            <label for="hasV5LogBook-true-{{$key}}">
                                                <input type="radio" name="log_book" class="logBook" value="{{$VCLogBook->id}}" @if($VCLogBook->id == session()->get('log_book')) checked @endif id="hasV5LogBook-true-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$VCLogBook->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="hasV5LogBook-false">
                                                <input type="radio" name="hasV5LogBook" value="False" id="hasV5LogBook-false"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>I’ve lost the V5C logbook</p>
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>The V5C logbook (also known as the V5 form or document) records the Registered Keeper(s) of the vehicle.</p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/V5C-logbook.avif')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal on false Condition -->
                                <div class="modal fade modalTN" id="v5Cfalse" tabindex="-1" role="dialog" aria-labelledby="V5CfalseTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="Modal__component">
                                        	<h3>Lost V5C logbook</h3>
                                        	<article class="">
                                        		<i class="fa fa-info-circle" aria-hidden="true"></i>
                                        		<p>We are unable to sell vehicles with a missing V5C log book.</p>
                                        	</article>
                                        	<p>You can obtain a replacement V5C on the <a class="" href="https://www.gov.uk/vehicle-log-book" rel="noreferrer" target="_blank">DVLA website</a>. Once you have it, return to Motorway and we will be happy to help with your vehicle sale.</p>
                                        </div>
                                        <div class="Modal__dvlaButton">
                                        	<a href="https://www.gov.uk/vehicle-log-book" rel="noopener noreferrer" target="_blank">
                                        		<button type="button">
                                        			<span class="Button-module__label">Take me to the DVLA website</span>
                                        			<span class="Button-module__icon Button-module__chevron Button-module__autoFlip"></span>
                                        		</button>
                                        	</a>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                        <button type="button" class="nxtBtn">NEXT</button>
                                        <button type="button" class="modalBtn" style="display:none;">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--7 Search-->
                            <div class="vehicleSteps" data-id="VehicleLocation">
                                <h3>Vehicle location</h3>
                                <p>Where do you keep the vehicle?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-input">
                                            <label for="search-loc" class="iconAbsolute">
                                                <span><p>Enter postcode or the first line of the address</p></span>
                                                <input type="search" name="location" class="location" value="@if(session()->get('location')) {{session()->get('location')}} @endif" id="search-loc" placeholder="Vehicle location"/>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                        <button type="button" class="nxtBtn">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--8-->
                            <div class="vehicleSteps" data-id="VehicleOwner">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Vehicle owner</h3>
                                <p>Who is named on the V5C form?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns">
                                            @foreach($VehicleOwners as $key=> $VehicleOwner)
                                            <label for="radio-keeperType-seller-{{$key}}">
                                                <input type="radio" name="vehicle_owner" class="vehicleOwner" value="{{$VehicleOwner->id}}" @if($VehicleOwner->id == session()->get('vehicle_owner')) checked @endif id="radio-keeperType-seller-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$VehicleOwner->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="radio-keeperType-other">
                                                <input type="radio" name="keeperType" value="Other" id="radio-keeperType-other"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Someone Else</p>
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtnToVehicleLocation">PREVIOUS</button>
                                        <button type="button" class="nxtBtn formeBtn">NEXT</button>
                                        <button style="display:none" type="button" class="forSomeoneElseBtn">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--9-->
                            <div class="vehicleSteps ifMe afterFriendNameInput afterProbateSale" data-id="PrivatePlate">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Private plate?</h3>
                                <p>Does your vehicle have a private registration plate?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns withImgInLabel">
                                           @foreach($PrivatePlates as $key=> $PrivatePlate)
                                            <label for="radio-hasPrivatePlate-false-{{$key}}">
                                                <input type="radio" name="private_plate" class="privatePlate" value="{{$PrivatePlate->id}}" @if($PrivatePlate->id == session()->get('private_plate')) checked @endif id="radio-hasPrivatePlate-false-{{$key}}"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$PrivatePlate->title}}</p>
                                                    <img src="{{ asset('plates/private_plate_iamges/'.$PrivatePlate->image)}}" />
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="radio-hasPrivatePlate-true">
                                                <input type="radio" name="hasPrivatePlate" value="True" id="radio-hasPrivatePlate-true"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Private plate</p>
                                                    <img src="{{ URL::asset('frontend/seller/assets/image/hasPrivatePlateTrue.jpg')}}" />
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p></p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/hasPrivatePlateTrue.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                        <button type="button" class="nxtBtnToKeepingThePlate" style="display:none">NEXT</button>
                                        <button type="button" class="nxtBtnToFinance">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--10-->
                            <div class="vehicleSteps ifSomeoneElse" data-id="WhoOwnsTheVehicle">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Who owns the vehicle?</h3>
                                <p>Does your vehicle have a private registration plate?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns withImgInLabel">
                                            @foreach($Finances as $key=> $Finance)
                                            <label for="radio-keeperType-familyOrFriend-{{$key}}">
                                                <input type="radio" name="finance"  value="{{$Finance->id}}" @if($Finance->id == session()->get('finance')) checked @endif id="radio-keeperType-familyOrFriend-{{$key}}"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$Finance->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="radio-keeperType-probate">
                                                <input type="radio" name="keeperType" value="probate" id="radio-keeperType-probate"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>This is a probate sale</p>
                                                </div>
                                            </label>
                                            <label for="radio-keeperType-company">
                                                <input type="radio" name="keeperType" value="company" id="radio-keeperType-company"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>It's a company vehicle or owned by a business</p>
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p></p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/nut.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtnToVehicleLocation">PREVIOUS</button>
                                        <button type="button" class="nxtBtn">NEXT</button>
                                        <button type="button" class="nxtBtnWhoOwnsTheVehicleToPrivatePlate" style="display:none">NEXTgahdg</button>
                                    </div>
                                </div>
                            </div>
                            <!--11-->
                            <div class="vehicleSteps ifFriend" data-id="NameOnV5C">
                                <h3>Name on V5C</h3>
                                <p>Please enter the full name as written on the V5C logbook</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-input">
                                            <label for="friendName">
                                                <span><p>Enter their full name</p></span>
                                                <input type="text" name="friendName" value="" id="friendName" placeholder="e.g. Joe Bloggs"/>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtnToVehicleLocation">PREVIOUS</button>
                                        <button type="button" class="nxtBtnToPrivatePlate">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--12-->
                            <div class="vehicleSteps ifPrivatePlate" data-id="KeepingThePlate">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Keeping the plate?</h3>
                                <p>Are you wanting to keep the private plate?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns">
                                            <label for="radio-keepPrivatePlate-true">
                                                <input type="radio" name="keepPrivatePlate" value="true" id="radio-keepPrivatePlate-true" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Keeping it</p>
                                                </div>
                                            </label>
                                            <label for="radio-keepPrivatePlate-false">
                                                <input type="radio" name="keepPrivatePlate" value="false" id="radio-keepPrivatePlate-false"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Not keeping it</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>If you want to keep your private plate, then you’ll need to visit the <a href="https://www.gov.uk/personalised-vehicle-registration-numbers/take-private-number-off" rel="noreferrer" target="_blank">DVLA website</a> to get a new V5C form. This takes about 5 days to receive so we advise starting the process now.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                        <button type="button" class="nxtBtn">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--13-->
                            <div class="vehicleSteps ifnormalRegistrationPlate ifKeepingit ifNotKeepingit" data-id="Finance">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Finance</h3>
                                <p>Is this vehicle on finance?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns">
                                           @foreach($Finances as $key=> $Finance)
                                            <label for="radio-isVehicleOnFinance-true-{{$key}}">
                                                <input type="radio"  name="finance" class="finance" value="{{$Finance->id}}" @if($Finance->id == session()->get('finance')) checked @endif id="radio-isVehicleOnFinance-true-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$Finance->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            {{-- <label for="radio-isVehicleOnFinance-false">
                                                <input type="radio" name="isVehicleOnFinance" value="false" id="radio-isVehicleOnFinance-false"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>Not on finance</p>
                                                </div>
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>If your vehicle currently has any finance remaining, whether PCP or HP, or any other type of loan or finance, please select “On finance”.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtnFinaceToPrivatePlate">PREVIOUS</button>
                                        <button type="button" class="nxtBtn" id="store">NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--14-->
                            <div class="vehicleSteps Summary">
                                <h3>Summary</h3>
                                <p>Please check the information you have provided.</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-12 my-auto">
                                        <div class="photo-up-sec-2-vi-table">
                                            <div class="summTn">
                                            	<table class="table table-striped">
                                            		<tbody class="">
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Vehicle features</span></td>
                                            				<td id="vehicleFeaturefinal">
                                            					<p>No Data Found</p>
                                            				</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="VehicleFeatures" >
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Seat material</span></td>
                                            				<td id="seatMaterialFinal">No Data Found</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="SeatMaterial" >
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Number of keys</span></td>
                                            				<td id="NumberOfKeyFinal">No Data Found</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="NumberOfKeys" >
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Tool pack</span></td>
                                            				<td id="ToolPackFinal">No Data Found</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="ToolPack" >
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Locking wheel nut</span></td>
                                            				<td id="LockingWheelNutFinal">N/A</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="LockingWheelNut" >
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Smoking</span></td>
                                            				<td id="SmokingFinal" >N/A</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="Smoking">
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            		</tbody>
                                            	</table>
                                            	<div class="SectionTable__component">
                                            		<h2>Ownership</h2>
                                            		<table class="table table-striped">
                                            			<tbody class="">
                                            				<tr class="SectionTable__withLink">
                                            					<td><span>V5C logbook</span></td>
                                            						<td id="LogbookFinal">N/A</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="V5CLogbook">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                            				<tr class="SectionTable__noValue SectionTable__withLink">
                                            					<td>
                                            						<span>Vehicle location</span>
                                            					</td>
                                            						<td id="VehicleLocationFinal">–</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="VehicleLocation">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                            				<tr class="SectionTable__withLink">
                                            					<td><span>Vehicle owner</span></td>
                                            						<td id="VehicleOwnerFinal" >N/A</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="VehicleOwner">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                            				<tr class="SectionTable__withLink">
                                            					<td><span>Private plate</span></td>
                                            						<td id="PrivatePlateFinal">N/A</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="PrivatePlate">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                            				{{-- <tr class="SectionTable__withLink">
                                            					<td><span>Keeping the plate</span></td>
                                            						<td>Not keeping it</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="KeepingThePlate">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr> --}}
                                            				<tr class="SectionTable__withLink">
                                            					<td><span>Finance</span></td>
                                            						<td id="FinanceFinal" >N/A</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="Finance">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                            			</tbody>
                                            		</table>
                                            	</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="photo-up-sec-2-vi-btm-btns d-flex justify-content-between">
                            <div class="photo-up-sec-2-vi-btns">
                                <div class="photo-up-sec-2-box-btn clr-prp my-auto">
                                    <button type="submit">SAVE AND EXIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        
        </form>
    </div>

        <div class="photo-up-sec-2-box-main">
            <div class="photo-up-sec-2-box">
                <div class="photo-up-sec-2-box-txt">
                    <h4>Photos</h4>
                    <div class="photo-up-sec-2-box-personal-information">
                        <p>The final step is to add photos of your vehicle.</p>
                    </div>
                </div>
                <div class="photo-up-sec-2-box-btn clr-s-dis my-auto">
                    <button onclick="myFunction()">START</button>
                </div>
            </div>

            <div class="main-add-photos" id="myDIV">
                <form>
                    <div class="add-photos-inner row">
                        <div class="add-photos-box1 col-lg-6">
                            <label class="labelForFile" for="photo1">
                                <div class="add-photos-numbering">
                                    <h3>1</h3>
                                </div>
                                <input type="file" name="photo1" id="photo1" />
                                <img src="{{ URL::asset('frontend/seller/assets/image/add-p-front.png')}}" alt="" accept="image/*" >
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <div class="add-photos-box1">
                                <label class="labelForFile" for="photo2">
                                    <div class="add-photos-numbering">
                                        <h3>2</h3>
                                    </div>
                                    <input type="file" name="photo1" id="photo2" />
                                    <img src="{{ URL::asset('frontend/seller/assets/image/add-p-back.png')}}" alt="" accept="image/*" >
                                </label>
                            </div>
                            <div class="add-photos-box1">
                                <label class="labelForFile" for="photo3">
                                    <div class="add-photos-numbering">
                                        <h3>3</h3>
                                    </div>
                                    <input type="file" name="photo1" id="photo3" />
                                    <img src="{{ URL::asset('frontend/seller/assets/image/add-p-corner.png')}}" alt="" accept="image/*" >
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="add-p-bottom-row row">
                        <div class="col-lg-4">
                            <div class="add-photos-box1">
                                <label class="labelForFile" for="photo4">
                                    <div class="add-photos-numbering">
                                        <h3>4</h3>
                                    </div>
                                    <input type="file" name="photo1" id="photo4" />
                                    <img src="{{ URL::asset('frontend/seller/assets/image/add-p-back-corner.png')}}" alt="" accept="image/*" >
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="add-photos-box1">
                                <label class="labelForFile" for="photo5">
                                    <div class="add-photos-numbering">
                                        <h3>5</h3>
                                    </div>
                                    <input type="file" name="photo1" id="photo5" />
                                    <img src="{{ URL::asset('frontend/seller/assets/image/add-p-interior.png')}}" alt="" accept="image/*" >
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="add-photos-box1">
                                <label class="labelForFile" for="photo6">
                                    <div class="add-photos-numbering">
                                        <h3>6</h3>
                                    </div>
                                    <input type="file" name="photo1" id="photo6" />
                                    <img src="{{ URL::asset('frontend/seller/assets/image/add-p-dashboard.png')}}" alt="" accept="image/*" >
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="photo-up-sec-2-btn photo-up-sec-2-box-btn text-center clr-s-gr">
                        <button>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- PHOTO-UPLOAD-SECTION-2 -->
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
                        <button>Value Your Car</button>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="sec-7-box">
                        <h4>Newsletter</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore</p>
                        <input class="mb-3" type="text">
                        <button>SUBSCRIBE</button>
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
@endsection
@push('child-scripts')
<script type="text/javascript">
$('.vehicleStepsMain .vehicleSteps').each(function(){
var totalRadChecked1 = $(this).closest('.vehicleSteps').find('input[type="radio"]:checked').length;
var totalChecked1 = $(this).closest('.vehicleSteps').find('input[type="checkbox"]:checked').length;
$(this).closest('.vehicleSteps').find('.checboxNum').text(totalRadChecked1);
$(this).closest('.vehicleSteps').find('.checkboxNum').text(totalChecked1);
});
$("#store").click(function(){
    var the_value;

    the_value = getChecklistItems();
    var seatMaterial = $(".seatMaterial:checked").val();
    var numberOfKeys = $(".numberOfKeys:checked").val();
    var toolPack = $(".toolPack:checked").val();
    var wheelNut = $(".wheelNut:checked").val();
    var smoking = $(".smoking:checked").val();
    var logBook = $(".logBook:checked").val();
    var location = $(".location").val();
    var vehicleOwner = $(".vehicleOwner:checked").val();
    var privatePlate = $(".privatePlate:checked").val();
    var finance = $(".finance:checked").val();
    
    console.log(the_value);
    console.log(seatMaterial);
    console.log(numberOfKeys);
    console.log(toolPack);
    console.log(wheelNut);
    console.log(smoking);
    console.log(logBook);
    console.log(location);
    console.log(vehicleOwner);
    console.log(privatePlate);
    console.log(finance);

     $.ajax({

            url: 'vehicle_information',
            type: 'post',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {the_value:the_value,seatMaterial:seatMaterial,numberOfKeys:numberOfKeys,
                toolPack:toolPack,wheelNut:wheelNut,smoking:smoking,logBook:logBook,location:location,
                vehicleOwner:vehicleOwner,privatePlate:privatePlate,finance:finance
            },

            success: function(response){
                // console.log("ghhhhh",response);
                var vehicleResponse = response.VehicleFeature;
                var vehicledata = '';
                var SeatMaterialsResponse = response.SeatMaterials;
               
                var NumberOfKeyResponse = response.NumberOfKeys;
                var ToolPackResponse = response.ToolPack;
                var LockingWheelNut = response.LockingWheelNut;
                var Smokings = response.Smokings;
                var VCLogBooks = response.VCLogBooks;
                var VehicleLocation = response.VehicleLocation;
                var VehicleOwners = response.VehicleOwners;
                var PrivatePlates = response.PrivatePlates;
                var Finances = response.Finances;
                // console.log(SeatMaterials.title);
                $.each(vehicleResponse,function(vehicleResponse,row){
                    vehicledata+='<p>'+row.title+'</p>';
                    
                    $("#vehicleFeaturefinal").html(vehicledata);
                })
                $("#seatMaterialFinal").html('');
                $("#seatMaterialFinal").html(SeatMaterialsResponse.title);
                
                $("#NumberOfKeyFinal").html('');
                $("#NumberOfKeyFinal").html(NumberOfKeyResponse.number_of_key);
            
                $("#ToolPackFinal").html('');
                $("#ToolPackFinal").html(ToolPackResponse.title);

                $("#LockingWheelNutFinal").html('');
                $("#LockingWheelNutFinal").html(LockingWheelNut.title);

                $("#SmokingFinal").html('');
                $("#SmokingFinal").html(Smokings.title);

                $("#LogbookFinal").html('');
                $("#LogbookFinal").html(VCLogBooks.title);

                $("#VehicleLocationFinal").html('');
                $("#VehicleLocationFinal").html(VehicleLocation);

                $("#VehicleOwnerFinal").html('');
                $("#VehicleOwnerFinal").html(VehicleOwners.title);
   
                $("#PrivatePlateFinal").html('');
                $("#PrivatePlateFinal").html(PrivatePlates.title);
  
                $("#FinanceFinal").html('');
                $("#FinanceFinal").html(Finances.title);
            },

            


            });
   


    function getChecklistItems() {
    var result =
        $("input[name='vehicle_feature[]']:checked").get();

    var columns = $.map(result, function(element) {
        return $(element).attr("value");
    });

    return columns.join(",");
}

});
    $("#myform").on("submit", function(e) {
           e.preventDefault(); // prevent the form submission

           $.ajax({
               type: "post",
               dataType: 'JSON',
               url: '{{ route('users') }}',
               data: $('#myform').serialize(), // serialize all form inputs
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function(response) {

                if(response.success=='success')
                {
                     $("#vehicle_registration_details").html('<div class="container-1151"><div class="row"><div class="sec-1-txt col-lg-6"><h2>'+response.users.name+' <span>Motorific</span></h2><p>'+response.users.email+'</p><form id="myForm">@csrf Confirm mileage<input type="text" id="id" name="vehicle_registration_no" value="111" placeholder="Enter REG"><button id="submitid" type="submit" >Continue</button></form></div><div class="sec-1-img col-lg-6"><img  alt=""></div><div id="title"></div></div></div>');
                     $("#vehicle_registration").hide();
                }else{
                    console.log("some thing wrong")
                }
               },
               error: function(data) {
                   console.log(data)
               }
           });
       });

        //   On Hover Change Image in Profile Form 27-10-22
        $('.photo-up-sec-2-vi-btns label').on('mouseenter', function(){
            var imgLabel = $(this).find('.photo-up-sec-2-vi-btn > img').attr('src');
            $(this).closest('.photo-up-sec-2-vi-row-ay').find('.info-box-image > img').attr('src',imgLabel);
        });
        // 28-10-22
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

        $('button.prevBtn').on('click', function(){
            $(this).closest('.vehicleSteps').removeClass('vehicleStepsActive');
            $(this).closest('.vehicleSteps').slideUp();
            $(this).closest('.vehicleSteps').prev().slideDown();
            $(this).closest('.vehicleSteps').prev().addClass('vehicleStepsActive');
        });

        $('.vehicleSteps .photo-up-sec-2-vi-btns input[type="radio"],.vehicleSteps .photo-up-sec-2-vi-btns input[type="checkbox"]').change(function(){

            var totalRadChecked = $(this).closest('.vehicleSteps').find('input[type="radio"]:checked').length;
            var totalChecked = $(this).closest('.vehicleSteps').find('input[type="checkbox"]:checked').length;

            $(this).closest('.vehicleSteps').find('.checboxNum').text(totalRadChecked);
            $(this).closest('.vehicleSteps').find('.checkboxNum').text(totalChecked);

            var radioVal =  $(this).attr('id');
                console.log(radioVal);
                // For Popup on False Condition
                if( radioVal == 'hasV5LogBook-false'){
                    $(this).closest('.vehicleSteps').find('.nxtBtn').hide();
                    $(this).closest('.vehicleSteps').find('.modalBtn').show();
                }
                else if( radioVal == 'hasV5LogBook-true'){
                    $(this).closest('.vehicleSteps').find('.nxtBtn').show();
                    $(this).closest('.vehicleSteps').find('.modalBtn').hide();
                }
                // If Select ME in Vehicle Owner
                else if(radioVal == 'radio-keeperType-seller'){
                    $(this).closest('.vehicleSteps').find('.nxtBtn').show();
                    $(this).closest('.vehicleSteps').find('.forSomeoneElseBtn').hide();
                }
                else if(radioVal == 'radio-keeperType-other'){
                    $(this).closest('.vehicleSteps').find('.nxtBtn').hide();
                    $(this).closest('.vehicleSteps').find('.forSomeoneElseBtn').show();
                }
                // If Select Normal registration plate in Private Plate
                else if(radioVal == 'radio-hasPrivatePlate-false'){
                    $(this).closest('.vehicleSteps').find('.nxtBtnToFinance').show();
                    $(this).closest('.vehicleSteps').find('.nxtBtnToKeepingThePlate').hide();
                }
                else if(radioVal == 'radio-hasPrivatePlate-true'){
                    $(this).closest('.vehicleSteps').find('.nxtBtnToFinance').hide();
                    $(this).closest('.vehicleSteps').find('.nxtBtnToKeepingThePlate').show();
                }
                // If Select Family Member or Friend in Who owns the vehicle
                else if(radioVal == 'radio-keeperType-familyOrFriend'){
                    $(this).closest('.vehicleSteps').find('.nxtBtn').show();
                    $(this).closest('.vehicleSteps').find('.nxtBtnWhoOwnsTheVehicleToPrivatePlate').hide();
                }
                else if(radioVal == 'radio-keeperType-probate'){
                    $(this).closest('.vehicleSteps').find('.nxtBtn').hide();
                    $(this).closest('.vehicleSteps').find('.nxtBtnWhoOwnsTheVehicleToPrivatePlate').show();
                }
                else if(radioVal == 'radio-keeperType-company'){
                    $(this).closest('.vehicleSteps').find('.nxtBtn').hide();
                    $(this).closest('.vehicleSteps').find('.nxtBtnWhoOwnsTheVehicleToPrivatePlate').show();
                }

        });

        // When Click on Someone Else Button
        $('.forSomeoneElseBtn').on('click', function(){
                  $(this).closest('.vehicleSteps').removeClass('vehicleStepsActive');
                  $(this).closest('.vehicleSteps').slideUp();
                  $('.ifSomeoneElse').slideDown();
                  $('.ifSomeoneElse').addClass('vehicleStepsActive');
        });
        // When Click on Who On Previous Button
        $('.prevBtnToVehicleOwner').on('click', function(){
              $(this).closest('.vehicleSteps').removeClass('vehicleStepsActive');
              $(this).closest('.vehicleSteps').slideUp();
              $('.vehicleSteps[data-id="VehicleOwner"]').slideDown();
              $('.vehicleSteps[data-id="VehicleOwner"]').addClass('vehicleStepsActive');
        });

        // When Click on Vehicle Owner Previous Button
        $('.prevBtnToV5Clogbook').on('click', function(){
              $(this).closest('.vehicleSteps').removeClass('vehicleStepsActive');
              $(this).closest('.vehicleSteps').slideUp();
              $('.vehicleSteps[data-id="V5CLogbook"]').slideDown();
              $('.vehicleSteps[data-id="V5CLogbook"]').addClass('vehicleStepsActive');
        });
        // When Click on nxtBtnToFinance
        $('.nxtBtnToFinance').on('click', function(){

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
                  $('.ifnormalRegistrationPlate').slideDown();
                  $('.ifnormalRegistrationPlate').addClass('vehicleStepsActive');
            }
        });
        // When Click on nxtBtnToKeepingThePlate
        $('.nxtBtnToKeepingThePlate').on('click', function(){
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
                  $('.ifPrivatePlate').slideDown();
                  $('.ifPrivatePlate').addClass('vehicleStepsActive');
            }

        });

        //When Click on prevBtnToVehicleLocation from Name on V5C
        $('.prevBtnToVehicleLocation').on('click', function(){
              $(this).closest('.vehicleSteps').removeClass('vehicleStepsActive');
              $(this).closest('.vehicleSteps').slideUp();
              $('.vehicleSteps[data-id="VehicleLocation"]').slideDown();
              $('.vehicleSteps[data-id="VehicleLocation"]').addClass('vehicleStepsActive');
        });
        //When Click on nxtBtnToPrivatePlate from Name on V5C
        $('.nxtBtnToPrivatePlate').on('click', function(){
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
                  $('.vehicleSteps[data-id="PrivatePlate"]').slideDown();
                  $('.vehicleSteps[data-id="PrivatePlate"]').addClass('vehicleStepsActive');
            }
        });
        //When Click on prevBtnFinaceToPrivatePlate from Finance
        $('.prevBtnFinaceToPrivatePlate').on('click', function(){
              $(this).closest('.vehicleSteps').removeClass('vehicleStepsActive');
              $(this).closest('.vehicleSteps').slideUp();
              $('.vehicleSteps[data-id="PrivatePlate"]').slideDown();
              $('.vehicleSteps[data-id="PrivatePlate"]').addClass('vehicleStepsActive');
        });
        //When Click on nxtBtnWhoOwnsTheVehicleToPrivatePlate from Who owns the vehicle
        $('.nxtBtnWhoOwnsTheVehicleToPrivatePlate').on('click', function(){
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
                  $(this).closest('.vehicleSteps').removeClass('vehicleStepsActive');
                  $(this).closest('.vehicleSteps').slideUp();
                  $('.vehicleSteps[data-id="PrivatePlate"]').slideDown();
                  $('.vehicleSteps[data-id="PrivatePlate"]').addClass('vehicleStepsActive');
            }
        });

        // Summary Step
        $('.stepOpener').on('click', function(){
            var thisData = $(this).attr('data-title');
            $(this).closest('.vehicleSteps').removeClass('vehicleStepsActive');
            $(this).closest('.vehicleSteps').slideUp();
            $('.vehicleSteps[data-id="'+ thisData +'"]').slideDown();
            $('.vehicleSteps[data-id="'+ thisData +'"]').addClass('vehicleStepsActive');
        });
        // Modal Open Close of Vehicle Form
        $('.modalBtn').on('click',function(){
             $('#v5Cfalse').modal('toggle');
        });

        $('.modalTN .close').on('click',function(){
             $(this).closest('.modal').modal('toggle');
        });

        // Images On Change
        $('.labelForFile').each(function(){
       var thisInpt = $(this).find('input');
       $(thisInpt).on('change', function(){

          var file = $(thisInpt).get(0).files[0];

            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $(thisInpt).closest('.labelForFile').find('img').attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
       });
    });
</script>
@endpush
