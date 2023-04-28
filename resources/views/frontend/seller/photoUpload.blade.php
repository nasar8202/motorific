@extends('frontend.seller.layouts.app')
@section('title','Photo Upload | Motorific')
@section('section')

@section('headerClass','')
@section('headerUlClass','navlinks navlinks-w')
@section('logoMain','https://motorific.co.uk/frontend/seller/assets/image/logo-w.png')

@section('ContainerHeader','container-1600 d-flex justify-content-between pt-4')
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

@media only screen and (max-width:767px ){
    .photo-up-sec-2-vehicle-information {
    padding: 30px 10px;
}

.photo-up-sec-2-box-btn button {
    font-size: 10px;
    width: 80px;
    padding: 7px 0px;
}



.photo-up-sec-2-vi-bnch-btns {
    bottom: 20px;
}
}
    </style>
 <!-- HEADER -->

  <!-- PHOTO-UPLOAD-SECTION-1 -->
  <section class="photo-up-sec-1">
    <div class="container-1151">
       
        <h1>{{$res->make}}</h1>
        <h3>{{$res->registrationNumber}}</h3>
        <p> {{$res->make}}   {{$res->wheelplan}}</p>
        <div class="chart">
            <ul>
                <li>{{$res->yearOfManufacture??"year of manufacture"}}</li>
                    <li>{{$milage??"mileage"}} </li>
                    <li>{{$res->colour??"colour"}}</li>
                    <li>{{$res->wheelplan??"wheelplan"}}</li>
                    <li>{{$res->fuelType??"fueltype"}}</li>
                
            </ul>
        </div>
    </div>
</section>

<!-- PHOTO-UPLOAD-SECTION-1 -->
<form action="{{route('createVehicle')}}" id="createVehicle" method="POST" enctype="multipart/form-data" class="hz-form">
    @csrf
    <section class="photo-up-sec-2">
        <div class="container-1151">
            <div class="photo-up-sec-2-heading text-center">
                <h3>Complete your profile steps to Get your vehicles valuation </h3>
            </div>

            <div class="photo-up-sec-2-box-main personal-info">
                <div class="photo-up-sec-2-box">
                    <div class="photo-up-sec-2-box-txt">
                        <h4>Personal Information</h4>
                        <div class="photo-up-sec-2-box-personal-information">
                            <p class="ForUpdateError"></p>
                            <p class="topName">{{$user->name}}</p>
                            <p class="topEmail">{{$user->email}}</p>
                        <p class="topNumber">{{$user->phone_number}}</p>
                    </div>
                    <div class="prf-complete d-flex align-items-center">
                        <div>
                            <img src="{{ URL::asset('frontend/seller/assets/image/check-gr.png')}}" alt="" />
                        </div>
                        <h3> Complete</h3>
                    </div>
                </div>
                <div class="photo-up-sec-2-box-btn clr-prp my-auto">
                    <button onclick="myFunction3()" type="button">EDIT</button>
                </div>
            </div>

            <div class="personal-info-main" id="myDIV3">
                <div class="personal-info-heading">
                    <h3>Personal Information </h3>
                    <p>Here’s the contact information you’ve given us. Please make sure it’s correct so we can keep you up to date.</p>
                </div>

                <div class="personal-info-form">
                    <div class="form">
                        <div>
                            <h4>Full Name</h4>
                            <input type="text" placeholder="Enter Name" class="name"  name="name" value="{{$user->name}}" />
                        </div>
                        <div>
                            <h4>Email</h4>
                            <input type="email" placeholder="Enter E-mail" class="email" name="email" value="{{$user->email}}" />
                        </div>
                        <div>
                            <h4>Phone Number</h4>
                            <input type="number" placeholder="Enter Phone" class="number" name="number" value="{{$user->phone_number}}" />
                            <input type="hidden"  class="userId" name="user_id" value="{{$user->id}}">

                        </div>
                        <div class="personal-info-form-btn photo-up-sec-2-box-btn clr-s-gr">
                            <button type="button" id="updateInfo">CONFIRM</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="photo-up-sec-2-box-main d-none">
            <div class="photo-up-sec-2-box">
                <div class="photo-up-sec-2-box-txt">
                    <h4>Vehicle's Details</h4>
                </div>
                <div class="photo-up-sec-2-box-btn clr-prp my-auto">
                    <button onclick="myFunction4()" type="button">EDIT</button>
                </div>
            </div>
            <div class="personal-info-main" id="myDIV4">

                <div class="personal-info-form">
                    <span class="alert alert-success temprorySubmit" style="display: none;"></span>
                    <div class="form rowFormTn" id="mainVehicleInfo">

                        <div class="col-2Tn">
                            <h4>Vehicle Registeration Number</h4>
                            <input type="text" placeholder="Registeration Number" class="RegisterationNumber" name="RegisterationNumber" value="{{$res->registrationNumber}}" />
                            @if ($errors->has('RegisterationNumber'))
                            <span class="text-danger">{{ $errors->first('RegisterationNumber') }}</span>
                        @endif
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Name</h4>
                            <input type="text" placeholder="Vehicle Name" class="VehicleName" name="VehicleName" value="{{$res->make}}" />
                            @if ($errors->has('VehicleName'))
                            <span class="text-danger">{{ $errors->first('VehicleName') }}</span>
                        @endif
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Year</h4>
                            <?php $vehicleYear =date_create( $res->yearOfManufacture);?>
                            <input type="year" placeholder="Vehicle Year" class="VehicleYear" name="VehicleYear" value="{{$res->yearOfManufacture}}" />
                            @if ($errors->has('VehicleYear'))
                            <span class="text-danger">{{ $errors->first('VehicleYear') }}</span>
                        @endif
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Color</h4>
                            <input type="text" placeholder="Vehicle Color" class="VehicleColor" name="VehicleColor" value="{{$res->colour}}" />
                            @if ($errors->has('VehicleColor'))
                            <span class="text-danger">{{ $errors->first('VehicleColor') }}</span>
                        @endif
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Type</h4>
                            <input type="text" placeholder="Vehicle Type" class="VehicleType" name="VehicleType" value="" />
                            @if ($errors->has('VehicleType'))
                            <span class="text-danger">{{ $errors->first('VehicleType') }}</span>
                        @endif
                        </div>
                        <div class="col-2Tn">
                            <h4>Fuel type</h4>
                            <input type="text" placeholder="Fuel type" class="VehicleTank" name="VehicleTank" value="{{$res->fuelType}}" />
                            @if ($errors->has('VehicleTank'))
                            <span class="text-danger">{{ $errors->first('VehicleTank') }}</span>
                        @endif
                        </div>
                        <div class="col-2Tn">
                            <h4>Vehicle Mileage</h4>
                            <input type="number" placeholder="Vehicle Mileage" class="VehicleMileage" name="VehicleMileage" value="{{$milage}}" />
                            @if ($errors->has('VehicleMileage'))
                            <span class="text-danger">{{ $errors->first('VehicleMileage') }}</span>
                        @endif
                        </div>
                        

                        <div class="personal-info-form-btn photo-up-sec-2-box-btn clr-s-gr text-center">
                            <div class="spinner-border mt-2 spinnerVehicle"  style="float: right;" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>
                              &nbsp;&nbsp;
                            <button id="mainInfo" type="button">CONFIRM</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        <!--Interior Information Form-->
        <section class="step-form-sec">

            <div class="container-1200">
                <!--interior -->
                <div class="step-main-1">

                    <div class="step-main-wrap photo-upload" style="">
                        <!--<div id="svg_wrap"></div>-->
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="step-main-head">Interior Information</h1>
                                <div class="completed-status">
                                    <i class="fa-solid fa-circle-check"></i> Complete
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="photo-up-sec-2-box-btn clr-s-gr my-auto f-btn">
                                    <button type="button" class="form-toggle-btn">Start</button>
                                </div>
                            </div>
                        </div>
                        <section class="step-wrapper form-wraper">

                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Dashboard</h2>
                                        <ul class="parts-content">
                                            <span class="checkboxNum" style="display:none;">0</span>
                                        <li>
                                            <label>
                                                <input type="radio" class="step-list-check" name="dashboard" value="Stained" hidden="" />
                                                <span>Stained (ST)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" class="step-list-check" name="dashboard" value="Torn/Ripped" hidden="" />
                                                <span>Torn / Ripped (T)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" class="step-list-check" name="dashboard" value="Warn" hidden="" />
                                                <span>Warn (W)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" class="step-list-check" name="dashboard" value="Dirty" hidden="" />
                                                <span>Dirty (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" class="step-list-check" name="dashboard" value="Broken/Damage" hidden="" />
                                                <span>Broken / Damage (BD)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" class="step-list-check" name="dashboard" value="Burnt" hidden="" />
                                                <span>Burnt (B)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/dashboard.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec step-sec-qambar" style="transform: translateX(0px);">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Passenger Side Interior</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_side_interior" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_side_interior" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_side_interior" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_side_interior" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_side_interior" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_side_interior" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/passenger-side.png" alt="" />
                                        </div>
                                    </div>
                                </div>

                            </section>

                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Driver Side Interior</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_side_interior" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_side_interior" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_side_interior" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_side_interior" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_side_interior" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_side_interior" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/driver-side.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Floor</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="floor" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/floor.png" alt="" />
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
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_back_door" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/passengerback.png" alt="" />
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
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label> 
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_back_door" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/driverback.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Ceiling</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="ceiling" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/ceiling.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Boot</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="boot" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/boot.png" alt="" / />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Rear Windscreen</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_windscreen" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/rear-windscreen.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Passenger Seat</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="passenger_seat" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/passenger-seat.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Driver Seat</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="driver_seat" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/driver-seat.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Rear Seats</h2>
                                        <ul class="parts-content">
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats" value="Stained" hidden="" />
                                                    <span>Stained (ST)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats" value="Torn/Ripped" hidden="" />
                                                    <span>Torn / Ripped (T)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats" value="Warn" hidden="" />
                                                    <span>Warn (W)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats" value="Dirty" hidden="" />
                                                    <span>Dirty (D)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats" value="Broken/Damage" hidden="" />
                                                    <span>Broken / Damage (BD)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" class="step-list-check" name="rear_seats" value="Burnt" hidden="" />
                                                    <span>Burnt (B)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="https://webprojectmockup.com/custom/motorific/public/frontend/dealers/assets/image/rear-seat.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="step-button-wrap step2-btns-qambar">
                                <div class="step-button step-button-qambar prev-qambar disabled" id="prev">← Previous</div>
                                <div class="step-button step-button-qambar nxtBtn next-qambar" id="next">Next →</div>
                                
                            </div>

                            <p class="pt-4">If no damage to report! Then continue next .</p>

                        </section>
                
                    </div>
                </div>
                <!--exterior -->
                <div class="step-main-2">
                    <div class="step-main-wrap photo-upload">
                
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="step-main-head">Exterior Information</h1>
                                <div class="completed-status">
                                    <i class="fa-solid fa-circle-check"></i> Complete
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="photo-up-sec-2-box-btn clr-s-gr my-auto f-btn">
                                    <button type="button" class="form-toggle-btn">Start</button>
                                </div>
                            </div>
                        </div>
                        <section class="step-wrapper form-wraper">

                            <section class="step-sec-ext step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Front Door Left</h2>
                                        <ul class="parts-content">
                                        <li>
                                            <label>
                                                <input type="radio" name="front_door_left" value="Dent" class="step-list-check" hidden />
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_left" value="Broken" class="step-list-check" hidden />
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_left" value="Chips" class="step-list-check" hidden />
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_left" value="Crack/Rust" class="step-list-check" hidden />
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_left" value="Scratch" class="step-list-check" hidden />
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_left" value="Wheel Scuff" class="step-list-check" hidden />
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/front-door-left.png') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="step-sec-ext step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Back Door Left</h2>
                                        <ul class="parts-content">
                                        <li>
                                            <label>
                                                <input type="radio" name="back_door_left" value="Dent" class="step-list-check" hidden />
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_left" value="Broken" class="step-list-check" hidden />
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_left" value="Chips" class="step-list-check" hidden />
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_left" value="Crack/Rust" class="step-list-check" hidden />
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_left" value="Scratch" class="step-list-check" hidden />
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_left" value="Wheel Scuff" class="step-list-check" hidden />
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/back-door-left.png') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="step-sec-ext step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Front Door Right</h2>
                                        <ul class="parts-content">
                                    <li>
                                            <label>
                                                <input type="radio" name="front_door_right" value="Dent" class="step-list-check" hidden />
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_right" value="Broken" class="step-list-check" hidden />
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_right" value="Chips" class="step-list-check" hidden />
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_right" value="Crack/Rust" class="step-list-check" hidden />
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_right" value="Scratch" class="step-list-check" hidden />
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front_door_right" value="Wheel Scuff" class="step-list-check" hidden />
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/front-door-right.png') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="step-sec-ext step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Back Door Right</h2>
                                    <ul class="parts-content">
                                    <li>
                                            <label>
                                                <input type="radio" name="back_door_right" value="Dent" class="step-list-check" hidden />
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_right" value="Broken" class="step-list-check" hidden />
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_right" value="Chips" class="step-list-check" hidden />
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_right" value="Crack/Rust" class="step-list-check" hidden />
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_right" value="Scratch" class="step-list-check" hidden />
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back_door_right" value="Wheel Scuff" class="step-list-check" hidden />
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/back-door-right.png') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec-ext step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Top</h2>
                                    <ul class="parts-content">
                                        <li>
                                            <label>
                                                <input type="radio" name="top" value="Dent" class="step-list-check" hidden />
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="top" value="Broken" class="step-list-check" hidden />
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="top" value="Chips" class="step-list-check" hidden />
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="top" value="Crack/Rust" class="step-list-check" hidden />
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="top" value="Scratch" class="step-list-check" hidden />
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="top" value="Wheel Scuff" class="step-list-check" hidden />
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/top.png') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec-ext step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Bonut</h2>
                                    <ul class="parts-content">
                                        <li>
                                            <label>
                                                <input type="radio" name="bonut" value="Dent" class="step-list-check" hidden />
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="bonut" value="Broken" class="step-list-check" hidden />
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="bonut" value="Chips" class="step-list-check" hidden />
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="bonut" value="Crack/Rust" class="step-list-check" hidden />
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="bonut" value="Scratch" class="step-list-check" hidden />
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="bonut" value="Wheel Scuff" class="step-list-check" hidden />
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/bonut.png') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec-ext step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Front</h2>
                                    <ul class="parts-content">
                                        <li>
                                            <label>
                                                <input type="radio" name="front" value="Dent" class="step-list-check" hidden />
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front" value="Broken" class="step-list-check" hidden />
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front" value="Chips" class="step-list-check" hidden />
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front" value="Crack/Rust" class="step-list-check" hidden />
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front" value="Scratch" class="step-list-check" hidden />
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="front" value="Wheel Scuff" class="step-list-check" hidden />
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/front.png') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step-sec-ext step-sec-qambar">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2 class="part-heading">Back</h2>
                                    <ul class="parts-content">
                                        <li>
                                            <label>
                                                <input type="radio" name="back" value="Dent" class="step-list-check" hidden />
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back" value="Broken" class="step-list-check" hidden />
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back" value="Chips" class="step-list-check" hidden />
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back" value="Crack/Rust" class="step-list-check" hidden />
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back" value="Scratch" class="step-list-check" hidden />
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="back" value="Wheel Scuff" class="step-list-check" hidden />
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/back.png') }}" alt="" />
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
                                                <input type="radio" name="windscreen" value="Dent" class="step-list-check" hidden />
                                                <span>Dent (D)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Broken" class="step-list-check" hidden />
                                                <span>Broken (B)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Chips" class="step-list-check" hidden />
                                                <span>Chips (CH)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Crack/Rust" class="step-list-check" hidden />
                                                <span>Crack / Rust (CR)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Scratch" class="step-list-check" hidden />
                                                <span>Scratch (S)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio"  name="windscreen" value="Wheel Scuff" class="step-list-check" hidden />
                                                <span>Wheel Scuff (WS)</span>
                                            </label>
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="step-img">
                                            <img src="{{ URL::asset('frontend/dealers/assets/image/windscreen.png') }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="step-button-wrap">
                                <div class="step-button-qambar step-button-ext prev-qambar disabled" id="prev-ext">&larr; Previous</div>
                                <div class="step-button-qambar step-button-ext nxtBtn next-qambar" id="next-ext">Next &rarr;</div>
                            </div>

                            <p class="pt-4">If no damage to report! Then continue next.</p>

                        </section>
                
                    </div>
                </div>

            </div>
        </section>


        <!--End-->

        <div class="photo-up-sec-2-box-main veicle-info">
                
            <div class="photo-up-sec-2-box">

                <div class="photo-up-sec-2-box-txt">
                    <h4>Vehicle Information</h4>
                    <div class="photo-up-sec-2-box-personal-information">
                        <p>Features, equipment & ownership</p>
                    </div>
                   
                    <div class="prf-complete d-flex align-items-center completeStatus-vehicelInfo-qa d-none">
                        <div>
                            <img src="{{ URL::asset('frontend/seller/assets/image/check-gr.png')}}" alt="" />
                        </div>
                        <h3>Complete</h3>
                    </div>
                </div>
                <div class="photo-up-sec-2-box-btn clr-s-gr my-auto">
                    <button type="button" onclick="myFunction2()" id="startBtn-vehicleInfo">Start</button>
                </div>
            </div>

            <div class="photo-up-sec-2" id="myDIV2">
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
                                                <input type="checkbox" class="feature" @if (isset($feature) && count((array)session()->get('vehicle_feature')) != 0) {{in_array( $feature->id, $a) ? 'checked' : '' }} @endif name="vehicle_feature[]" value="{{$feature->id }}"  id="sat_nav-{{$key}}"/>
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$feature->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                           
                                        </div>
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="nxtBtn">NEXT</button>
                                    </div>
                                </div>
                                @if ($errors->has('vehicle_feature'))
                                <span class="text-danger">{{ $errors->first('vehicle_feature') }}</span>
                            @endif
                            </div>
                            <!--1-->
                            <div class="vehicleSteps" data-id="SeatMaterial">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Seat material</h3>
                                
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
                                           
                                        </div>
                                        @if ($errors->has('seat_material'))
                                        <span class="text-danger">{{ $errors->first('seat_material') }}</span>
                                    @endif
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/halfLeather.jpg')}}" alt="" />
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
                                            
                                        </div>

                                    </div>

                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>Please don't include any keys with problems, e.g. where the remote unlocking is broken.</p>
                                        </div>
                                    </div>
                                    @if ($errors->has('number_of_keys'))
                                        <span class="text-danger">{{ $errors->first('number_of_keys') }}</span>
                                    @endif
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
                                            
                                        </div>
                                        @if ($errors->has('tool_pack'))
                                        <span class="text-danger">{{ $errors->first('tool_pack') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>Check your spare wheel and its compartment — tool packs can usually be found there and should include a jack and wheel wrench.</p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/toolPack.avif')}}" alt="" />
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
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>The locking wheel nut is a metal part usually located near the tool pack, either in the spare wheel or its compartment.</p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/wheelNut.avif')}}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('locking_wheel_nut'))
                                        <span class="text-danger">{{ $errors->first('locking_wheel_nut') }}</span>
                                    @endif
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
                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>This does not include vaping. If vehicle has been vaped in, then please select ‘Vehicle has not been smoked in’.</p>
                                        </div>
                                    </div>
                                    @if ($errors->has('smoked_in'))
                                        <span class="text-danger">{{ $errors->first('smoked_in') }}</span>
                                    @endif
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
                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p>The V5C logbook (also known as the V5 form or document) records the Registered Keeper(s) of the vehicle.</p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/V5C-logbook.avif')}}" alt="" />
                                            </div>
                                        </div>
                                        @if ($errors->has('log_book'))
                                        <span class="text-danger">{{ $errors->first('log_book') }}</span>
                                    @endif
                                    </div>
                                </div>

                                <!-- Modal on false Condition -->
                                <div class="modal fade modalTN" id="v5Cfalse" tabindex="-1" role="dialog" aria-labelledby="V5CfalseTitle" aria-hidden="true" >
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
                                        	<p>You can obtain a replacement V5C on the <a class="" href="https://www.gov.uk/vehicle-log-book" rel="noreferrer" target="_blank">DVLA website</a>. Once you have it, return to Motorific and we will be happy to help with your vehicle sale.</p>
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
                                           
                                        </div>
                                    </div>
                                    @if ($errors->has('vehicle_owner'))
                                    <span class="text-danger">{{ $errors->first('vehicle_owner') }}</span>
                                @endif
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
                                            
                                        </div>
                                        @if ($errors->has('private_plate'))
                                    <span class="text-danger">{{ $errors->first('private_plate') }}</span>
                                @endif
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p></p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/hasPrivatePlateTrue.jpg')}}" alt="" />
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
                                           
                                        </div>
                                        @if ($errors->has('finance'))
                                        <span class="text-danger">{{ $errors->first('finance') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <p></p>
                                            <div class="info-box-image">
                                                <img src="{{ URL::asset('frontend/seller/assets/image/nut.png')}}" alt="" />
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
                                           
                                        </div>
                                        @if ($errors->has('finance'))
                                        <span class="text-danger">{{ $errors->first('finance') }}</span>
                                    @endif
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
                                        <button type="button" class="nxtBtn" >NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--Vehicle Category-->
                            <div class="vehicleSteps ifKeepingit ifNotKeepingit" data-id="vehicleCategory">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Vehicle Category</h3>
                                
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-btns">
                                           @foreach($vehicleCategories as $key=> $vehicleCategori)
                                            <label for="radio-isVehicleCategoryOnFinance-true-{{$key}}">
                                                <input type="radio"  name="vehicleCateg" class="categ" value="{{$vehicleCategori->id}}" @if($vehicleCategori->id == session()->get('categ')) checked @endif id="radio-isVehicleCategoryOnFinance-true-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$vehicleCategori->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                            
                                        </div>
                                        @if ($errors->has('vehicleCateg'))
                                        <span class="text-danger">{{ $errors->first('vehicleCateg') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-lg-5">
                                        
                                    </div>
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtnFinaceToPrivatePlate">PREVIOUS</button>
                                        <button type="button" class="nxtBtn" >NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--End-->

                              <!--Vehicle History-->
                              <div class="vehicleSteps ifKeepingit ifNotKeepingit" data-id="vehicleHisory">
                                <span class="checboxNum" style="display:none;">0</span>
                                <h3>Vehicle History</h3>
                                <p>How much service history does your car have?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-12 my-auto">
                                        <div class="photo-up-sec-2-vi-btns">
                                           @foreach($VehicleHistories as $key=> $VehicleHistory)
                                            <label for="radio-isVehicleHistory-true-{{$key}}">
                                                <input type="radio"  name="VehicleHistory" class="VehicleHistory" value="{{$VehicleHistory->id}}" @if($VehicleHistory->id == session()->get('VehicleHistory')) checked @endif id="radio-isVehicleHistory-true-{{$key}}" />
                                                <div class="photo-up-sec-2-vi-btn">
                                                    <p>{{$VehicleHistory->title}}</p>
                                                </div>
                                            </label>
                                            @endforeach
                                           
                                        </div>
                                        @if ($errors->has('VehicleHistory'))
                                        <span class="text-danger">{{ $errors->first('VehicleHistory') }}</span>
                                    @endif
                                    </div>
                                    
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtnFinaceToPrivatePlate">PREVIOUS</button>
                                        <button type="button" class="nxtBtn" >NEXT</button>
                                    </div>
                                </div>
                            </div>
                            <!--End-->

                            <!--7 Search-->
                            <div class="vehicleSteps" data-id="VehicleLocation">
                                <h3>Vehicle location</h3>
                                <p>Where do you keep the vehicle?</p>
                                <div class="row photo-up-sec-2-vi-row-ay">
                                    <div class="col-lg-6 my-auto">
                                        <div class="photo-up-sec-2-vi-input">
                                            <label for="search-loc" class="iconAbsolute">
                                                <span><p>Enter postcode </p></span>
                                           
                                                <input type="search" name="location" id="search" class="location" value="@if(session()->get('location')) {{session()->get('location')}} @endif" id="search-loc" placeholder="Vehicle location"/>
                                                <ul class="list-group text-center fw-bolder suggestionSearch" id="result"></ul> 
                                                <br>
                                                <span><p>House Name And Number </p></span>
                                                
                                                <input type="search" name="houseName"  class="HouseName"  value="@if(session()->get('HouseName')) {{session()->get('HouseName')}} @endif" id="search-loc" placeholder="Enter House Name And Location"/>
                                           
                                            </label>
                                            
                                        </div>
                                    </div>
                                    @if ($errors->has('location'))
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                @endif
                                </div>
                                <!--Next Previous Button-->
                                <div class="photo-up-sec-2-vi-bnch-btns">
                                    <div class="d-flex photo-up-sec-2-box-btn photo-up-sec-2-vi-btm-btn clr-s-gr my-auto">
                                        <button type="button" class="prevBtn">PREVIOUS</button>
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
                                            					<span class="stepOpener" data-title="VehicleFeatures" style="cursor: pointer">
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Seat material</span></td>
                                            				<td id="seatMaterialFinal">No Data Found</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="SeatMaterial" style="cursor: pointer" >
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Number of keys</span></td>
                                            				<td id="NumberOfKeyFinal">No Data Found</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="NumberOfKeys" style="cursor: pointer" >
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Tool pack</span></td>
                                            				<td id="ToolPackFinal">No Data Found</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="ToolPack" style="cursor: pointer" >
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Locking wheel nut</span></td>
                                            				<td id="LockingWheelNutFinal">N/A</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="LockingWheelNut" style="cursor: pointer" >
                                            						<i class="fa fa-pencil"></i>
                                            					</span>
                                            				</td>
                                            			</tr>
                                            			<tr class="SectionTable__withLink">
                                            				<td><span>Smoking</span></td>
                                            				<td id="SmokingFinal" >N/A</td>
                                            				<td>
                                            					<span class="stepOpener" data-title="Smoking" style="cursor: pointer">
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
                                            						<span class="stepOpener" data-title="V5CLogbook" style="cursor: pointer">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                            				<tr class="SectionTable__noValue SectionTable__withLink" style="cursor: pointer">
                                            					<td>
                                            						<span>Vehicle location</span>
                                            					</td>
                                            						<td id="VehicleLocationFinal">–</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="VehicleLocation" style="cursor: pointer">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                                            <tr class="SectionTable__noValue SectionTable__withLink" style="cursor: pointer">
                                            					<td>
                                            						<span>Home Name And Number</span>
                                            					</td>
                                            						<td id="HomeName">–</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="VehicleLocation" style="cursor: pointer">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                            				<tr class="SectionTable__withLink">
                                            					<td><span>Vehicle owner</span></td>
                                            						<td id="VehicleOwnerFinal" >N/A</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="VehicleOwner" style="cursor: pointer">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                            				<tr class="SectionTable__withLink">
                                            					<td><span>Private plate</span></td>
                                            						<td id="PrivatePlateFinal">N/A</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="PrivatePlate" style="cursor: pointer">
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
                                            						<span class="stepOpener" data-title="Finance" style="cursor: pointer">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                                            <tr class="SectionTable__withLink">
                                            					<td><span>Vehicle Category</span></td>
                                            						<td id="vehicleCategory" >N/A</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="vehicleCategory" style="cursor: pointer">
                                            							<i class="fa fa-pencil"></i>
                                            						</span>
                                            					</td>
                                            				</tr>
                                                            <tr class="SectionTable__withLink">
                                            					<td><span>Vehicle History</span></td>
                                            						<td id="vehicleHisory" >N/A</td>
                                            						<td>
                                            						<span class="stepOpener" data-title="vehicleHisory" style="cursor: pointer">
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
                                        <button type="button" class="submitVehicleInfo-qa">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="photo-up-sec-2-vi-btm-btns d-flex justify-content-between">
                            <div class="photo-up-sec-2-vi-btns">
                                <div class="photo-up-sec-2-box-btn clr-prp my-auto">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div>

       
        </div>

        <div class="photo-up-sec-2-box-main photos-sec">
            <div class="photo-up-sec-2-box row align-items-center">
                <div class="col-sm-6"> 
                    <div class="photo-up-sec-2-box-txt">
                        <h4>Photos</h4>
                        <div class="photo-up-sec-2-box-personal-information">
                            <p>The final step is to add photos of your vehicle.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="photo-up-sec-2-box-btn clr-s-dis my-auto f-btn">
                        <button class="form-toggle-btn" type="button">START</button>
                    </div>
                </div>
            </div>

            <div class="main-add-photos form-wraper">

                    <div class="add-photos-inner row">
                        <div class="add-photos-box1 col-lg-6">
                            <label class="labelForFile" for="photo1">
                                <span><i class="fas fa-times"></i></span>
                                <div class="add-photos-numbering">
                                    <h3>1</h3>
                                </div>
                                <input class="hz-img-input" type="file" name="image1" id="photo1" accept="image/*" maxlength="500000" onChange="compressimage(this)" />
                                <img src="{{ URL::asset('frontend/seller/assets/image/add-p-front.png')}}" alt=""  accept="image/*" />
                                <div class='text-danger error-msg-frontend'></div>
                            </label>
                            @if ($errors->has('image1'))
                            <span class="text-danger">{{ $errors->first('image1') }}</span>
                        @endif
                        </div>
                        <div class="col-lg-6 ">
                            <div class="add-photos-box1">
                                <label class="labelForFile" for="photo2">
                                    <div class="add-photos-numbering">
                                        <h3>2</h3>
                                    </div>
                                    <input class="hz-img-input" type="file" name="image2" id="photo2" accept="image/*" maxlength="500000" onChange="compressimage(this)" />
                                    <img src="{{ URL::asset('frontend/seller/assets/image/add-p-back.png')}}"  alt="" accept="image/*" />
                                    <div class='text-danger error-msg-frontend'></div>
                                </label>
                                @if ($errors->has('image2'))
                                        <span class="text-danger">{{ $errors->first('image2') }}</span>
                                    @endif
                            </div>
                            
                        </div>
                    </div>
                    <div class="add-p-bottom-row row">
                        <div class="col-lg-4">
                            <div class="add-photos-box1">
                                <label class="labelForFile" for="photo4">
                                    <div class="add-photos-numbering">
                                        <h3>3</h3>
                                    </div>
                                    <input class="hz-img-input" type="file" name="image3" id="photo4" accept="image/*" maxlength="500000" onChange="compressimage(this)" />
                                    <img src="{{ URL::asset('frontend/seller/assets/image/add-p-back-corner.png')}}" alt="" accept="image/*" />
                                    <div class='text-danger error-msg-frontend'></div>
                                </label>
                            </div>
                            @if ($errors->has('image3'))
                            <span class="text-danger">{{ $errors->first('image3') }}</span>
                        @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="add-photos-box1">
                                <label class="labelForFile" for="photo5">
                                    <div class="add-photos-numbering">
                                        <h3>4</h3>
                                    </div>
                                    <input class="hz-img-input" type="file" name="image4" id="photo5" accept="image/*" maxlength="500000" onChange="compressimage(this)" />
                                    <img src="{{ URL::asset('frontend/seller/assets/image/add-p-interior.png')}}"  alt="" accept="image/*" />
                                    <div class='text-danger error-msg-frontend'></div>
                                </label>
                            </div>
                            @if ($errors->has('image4'))
                            <span class="text-danger">{{ $errors->first('image4') }}</span>
                        @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="add-photos-box1">
                                <label class="labelForFile" for="photo6">
                                    <div class="add-photos-numbering">
                                        <h3>5</h3>
                                    </div>
                                    <input class="hz-img-input" type="file" name="image5" id="photo6" accept="image/*" maxlength="500000" onChange="compressimage(this)" />
                                    <img src="{{ URL::asset('frontend/seller/assets/image/add-p-dashboard.png')}}"  alt="" accept="image/*" />
                                    <div class='text-danger error-msg-frontend'></div>
                                </label>
                            </div>
                            @if ($errors->has('image5'))
                            <span class="text-danger">{{ $errors->first('image5') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="photo-up-sec-2-btn photo-up-sec-2-box-btn text-center clr-s-gr">
                        <button class="submitBtn-photos-sec" type="submit">Submit</button>
                        <br>
                        <br>
                        <span class="alertDisable">First Complete The Details.</span>
                    </div>

            </div>
        </div>
    </div>
</section>

</form>

<!-- PHOTO-UPLOAD-SECTION-2 -->
<section class="sec-7">
    <div class="sec-7-bg-img sec-1-txt">
        <div class="container-1151">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="sec-7-box">
                        <h4>What are you waiting for?</h4>
                        <p>Bid to traditional used car selling methods and join strong community of thousands happy customers!</p>
                        <input class="mb-3" type="text" placeholder="Enter REG">
                        <button>Value Your Car</button>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="sec-7-box">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and stay on top of industry news.</p>
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

<script>

    // photoupload size compress
    // Get the input field and image preview element
function compressimage(e) {
    var file = e.files[0];
    var imgPreview = e.nextElementSibling

    
    var reader = new FileReader();
    // Read the image file
    reader.readAsDataURL(file);

    // Resize the image when loaded
    reader.onload = function () {
        var img = new Image();
        img.src = reader.result;
        img.onload = function () {

            // Set the maximum file size in bytes (500kb)
            var maxFileSize = 500 * 1024;

            // Resize the image if necessary
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var width = img.width;
            var height = img.height;
            var ratio = width / height;
            
            if (file.size > maxFileSize) {
                width = Math.sqrt(maxFileSize * ratio);
                height = width / ratio;

            }

            console.log('width3 ',width);
            console.log('height3 ',height);
            canvas.width = width;
            canvas.height = height;

            ctx.drawImage(img, 0, 0, width, height);

            // Set the preview image source to the resized image
            imgPreview.src = canvas.toDataURL('image/jpeg', 0.8);
            imgPreview.width = width;
            imgPreview.height = height;
        }
    }
}

        // var fileUpload = document.getElementById('photo1');
		// var imgPreview = document.getElementById('imgPreview');
		
		// // Listen for changes to the input field
		// fileUpload.addEventListener('change', function() {
		// 	var file = this.files[0];
		// 	var reader = new FileReader();
			
		// 	// Read the image file
		// 	reader.readAsDataURL(file);
			
		// 	// Resize the image when loaded
		// 	reader.onload = function() {
		// 		var img = new Image();
		// 		img.src = reader.result;
		// 		img.onload = function() {
					
		// 			// Set the maximum file size in bytes (500kb)
		// 			var maxFileSize = 500 * 1024;
					
		// 			// Resize the image if necessary
		// 			var canvas = document.createElement('canvas');
		// 			var ctx = canvas.getContext('2d');
		// 			var width = img.width;
		// 			var height = img.height;
		// 			var ratio = width / height;
					
		// 			if (file.size > maxFileSize) {
		// 				width = Math.sqrt(maxFileSize * ratio);
		// 				height = width / ratio;
		// 			}
					
		// 			canvas.width = width;
		// 			canvas.height = height;
					
		// 			ctx.drawImage(img, 0, 0, width, height);
					
		// 			// Set the preview image source to the resized image
		// 			imgPreview.src = canvas.toDataURL('image/jpeg', 0.8);
		// 			imgPreview.width = width;
		// 			imgPreview.height = height;
		// 		}
		// 	}
		// });

    // photoupload size compress
        var form = document.querySelector('.hz-form');
        var input = document.querySelector('.hz-img-input');
        form.addEventListener('submit', function(event) {
          if (input.files && input.files[0] && input.files[0].size > 5000000) {
            alert('File size must be less than 5mb');
            input.value = '';
            event.preventDefault();
          }
          else{
              $(document).on('submit', '#createVehicle', function() {
            $('.submitBtn-photos-sec').attr('disabled', 'disabled');
            $(".submitBtn-photos-sec").attr("disabled", true);
            $('.submitBtn-photos-sec').html('Submitting...');
        });
          }
        });
    </script>

<script type="text/javascript">
$(document).ready(function() {

        
        // $(document).on('submit', '#createVehicle', function() {
        //     $('.submitBtn-photos-sec').attr('disabled', 'disabled');
        //     $(".submitBtn-photos-sec").attr("disabled", true);
        //     $('.submitBtn-photos-sec').html('Submitting...');
        // });
    });
$(".spinnerVehicle").hide();
$(".spinnerDamages").hide();


$('.vehicleStepsMain .vehicleSteps').each(function(){
var totalRadChecked1 = $(this).closest('.vehicleSteps').find('input[type="radio"]:checked').length;
var totalChecked1 = $(this).closest('.vehicleSteps').find('input[type="checkbox"]:checked').length;
$(this).closest('.vehicleSteps').find('.checboxNum').text(totalRadChecked1);
$(this).closest('.vehicleSteps').find('.checkboxNum').text(totalChecked1);
});


$(".createVehicle").click(function(){

    let form =  $(this).closest('#multiwala');
    // console.log(form);
});

$(".damagesDatas").click(function(){

    var interior = $("#interior").val();
    var bodyType = $("#body_type").val();
    var engineSize = $("#engine_size").val();
    var hpi = $("#hpi").val();
    var vin = $("#vin").val();
    var registerDate = $("#register_date").val();
    var keeperDate = $("#keeper_date").val();
    var motDate = $("#mot_date").val();
    var previousOwner = $("#previous_owner").val();
    var keepingPlate = $("#keeping_plate").val();
    var additional = $("#additional").val();
    var YourExteriorGrade = $("#YourExteriorGrade").val();
    var vehicleCategory = $("#vehicle_category").val();
    var scrateches = $("#scrateches").val();
    var dents = $("#dents").val();
    var paintwork = $("#paintwork").val();
    var windscreen = $("#windscreen").val();
    var brokenmissing = $("#brokenmissing").val();
    var warninglights = $("#warninglights").val();
    var YourServiceRecord = $("#YourServiceRecord").val();
    var MainDealerServices = $("#MainDealerServices").val();
    var IndependentDealerService = $("#IndependentDealerService").val();
    $.ajax({

        url:'{{route('addConditionDamages')}}',
          type: "post",
          data: {interior:interior,bodyType:bodyType,engineSize:engineSize,hpi:hpi
            ,vin:vin,registerDate:registerDate,keeperDate:keeperDate,motDate:motDate
            ,previousOwner:previousOwner,keepingPlate:keepingPlate,additional:additional,YourExteriorGrade:YourExteriorGrade
            ,vehicleCategory:vehicleCategory,scrateches:scrateches,dents:dents,paintwork:paintwork,windscreen:windscreen
            ,brokenmissing:brokenmissing,warninglights:warninglights,YourServiceRecord:YourServiceRecord,MainDealerServices:MainDealerServices
            ,IndependentDealerService:IndependentDealerService
        },

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            
            if(response == "true"){
                $(".temprorySubmitDamages").css("display","block");
                $(".temprorySubmitDamages").html("Your Data Is Submited For Temprory Time Now Move Onto Next Step");
                $(".spinnerDamages").show();
                setTimeout(function() {
                location.reload();
            }, 1500);
            }
            else{
                $(".temprorySubmitDamages").css("display","block");
                $(".temprorySubmitDamages").html("Something Error");
            }

       }
      });


});

$("#mainInfo").click(function(){
    var RegisterationNumber = $(".RegisterationNumber").val();
    var VehicleName = $(".VehicleName").val();
    var VehicleYear = $(".VehicleYear").val();
    var VehicleColor = $(".VehicleColor").val();
    var VehicleType = $(".VehicleType").val();
    var VehicleTank = $(".VehicleTank").val();
    var VehicleMileage = $(".VehicleMileage").val();
    var VehiclePrice = $(".VehiclePrice").val();
    $.ajax({

        url:'{{route('addSellerVehicle')}}',
          type: "post",
          data: {RegisterationNumber:RegisterationNumber,VehicleName:VehicleName,VehicleYear:VehicleYear,VehicleColor:VehicleColor
            ,VehicleType:VehicleType,VehicleTank:VehicleTank,VehicleMileage:VehicleMileage,VehiclePrice:VehiclePrice
        },

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {

            if(response == "true"){
                $(".temprorySubmit").css("display","block");
                $(".temprorySubmit").html("Your Data Is Submited For Temprory Time Now Move Onto Next Step");
                $(".spinnerVehicle").show();
                setTimeout(function() {
                location.reload();
            }, 1500);
            }
            else{
                $(".temprorySubmit").css("display","block");
                $(".temprorySubmit").html("Something Error");
            }
       }
      });

});

$("#updateInfo").click(function(){
    var name = $(".name").val();
    var email = $(".email").val();
    var number = $(".number").val();
    var userId = $(".userId").val();
          $.ajax({

             url:'{{route('updateSeller')}}',
               type: "post",
               data: {name:name,email:email,number:number,userId:userId},

               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function(response) {

            if(response){

                $(".topName").text(response.name);

                $(".topEmail").text(response.email);

                $(".topNumber").text(response.phone_number);
                $('#myDIV3').slideUp();
            }
            else{
                $(".topName").html('');
                $(".topEmail").html('');
                $(".topNumber").html('');
                $(".ForUpdateError").text("Something Error");
            }
            }
           });


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
    var HouseName = $(".HouseName").val();
    var vehicleOwner = $(".vehicleOwner:checked").val();
    var privatePlate = $(".privatePlate:checked").val();
    var finance = $(".finance:checked").val();
    var categ = $(".categ:checked").val();
    var VehicleHistory = $(".VehicleHistory:checked").val();
    

    

     $.ajax({

            url: 'vehicle_information',
            type: 'post',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {the_value:the_value,seatMaterial:seatMaterial,numberOfKeys:numberOfKeys,
                toolPack:toolPack,wheelNut:wheelNut,smoking:smoking,logBook:logBook,location:location,HouseName:HouseName,
                vehicleOwner:vehicleOwner,privatePlate:privatePlate,finance:finance,VehicleHistory:VehicleHistory,categ:categ
            },

            success: function(response){
              
                var vehicleResponse = response.VehicleFeature;
                var vehicledata = '';
                var SeatMaterialsResponse = response.SeatMaterials;

                var NumberOfKeyResponse = response.NumberOfKeys;
                var ToolPackResponse = response.ToolPack;
                var LockingWheelNut = response.LockingWheelNut;
                var Smokings = response.Smokings;
                var VCLogBooks = response.VCLogBooks;
                var VehicleLocation = response.VehicleLocation;
                var HouseName = response.HouseName;
                var VehicleOwners = response.VehicleOwners;
                var PrivatePlates = response.PrivatePlates;
                var Finances = response.Finances;
                var VehicleHistory = response.VehicleHistory;
                var categ = response.vehicleCategories;
             
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

                $("#HomeName").html('');
                $("#HomeName").html(HouseName);

                $("#VehicleOwnerFinal").html('');
                $("#VehicleOwnerFinal").html(VehicleOwners.title);

                $("#PrivatePlateFinal").html('');
                $("#PrivatePlateFinal").html(PrivatePlates.title);

                $("#FinanceFinal").html('');
                $("#FinanceFinal").html(Finances.title);

                $("#vehicleHisory").html('');
                $("#vehicleHisory").html(VehicleHistory.title);
                
                $("#vehicleCategory").html('');
                $("#vehicleCategory").html(categ.title);
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
                   console.log('error')
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
        
    
        
       
        
        // submitBtn-photos-sec
        
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
        $(this).parent()
          var file = $(thisInpt).get(0).files[0];
          console.log('file.size ',file.size);
          if(file.size > 5000000){
            $(this).parent().children('.error-msg-frontend').text('File size must be less than 5 mb')
          }
          else{
            var reader = new FileReader();
            reader.onload = function(){
                $(thisInpt).closest('.labelForFile').find('img').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
            $(this).parent().children('.error-msg-frontend').text('')
          }
       });
       $("#search").keyup( function() {

        $("#result").html('');
        
        let zip = $("#search").val();
       let removspace =  zip.replace(/\s/g, '');
       console.log(removspace)
            let api = `https://maps.googleapis.com/maps/api/geocode/json?address=.'${removspace}'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk`;
       
        $.getJSON( api, function( results ) {
            console.log(results,results.status,"cheking");
            if(results?.results && results?.results.length !== 0){
            $.each( results.results, function( key, value ) {
                if( value.formatted_address ) 
                {
                    $("#result").html(`<li class="list-group-item c">${value.formatted_address} </li>`)
                }
            } );
        } else {
            $("#result").html(`<span class="list-group-item c">Not Found</span>`)
        }
        } );
    } );

    $("#result").on("click", "li", function() {
        $("#search").val($(this).text());
        $("#result").html('');
    })
    });
</script>

@if(session()->get('seat_material'))
<script>
$(".submitBtn-photos-sec").attr("disabled", false);
$('.completeStatus-vehicelInfo-qa').removeClass('d-none');
$(".alertDisable").html(" ");
</script>
@else
<script>
        // DISABLE SUBIMIT BUTTON OF PHOTOS STEP
        $(".submitBtn-photos-sec").attr("disabled", true);
        // SYBMIT SUMMARY STEP 
        $('.submitVehicleInfo-qa').on('click', function(){
            
            myFunction2()
            $('#startBtn-vehicleInfo').text('Edit')
            $('#startBtn-vehicleInfo').css({ background: "#7977a2" })
            $('.completeStatus-vehicelInfo-qa').removeClass('d-none')
            $(".submitBtn-photos-sec").attr("disabled", false);
            $(".alertDisable").html(" ");
        });
        
    </script>
    
        @endif
@endpush


