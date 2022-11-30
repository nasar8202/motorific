
@extends('backend.admin.layouts.app')
@section('title','add wheel nut ')
@section('secton')
<style>
    .container {
          max-width: 1200px;
      }
      body {
  font-family: arial;
}
.hide {
  display: none;
}
p {
  font-weight: bold;
}
  </style>
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<div class="page-heading">
    <form class="form" method="post" action="{{route('updateVehicle',$vehicles->id)}}" enctype="multipart/form-data">
        @csrf
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>View And Update Vehicle Details</h3>
                <p class="text-subtitle text-muted">View And Update Vehicle Details</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View And Update Vehicle Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View And Update User Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">User Email</label>
                                            <input type="email" id="first-name-column" class="form-control"
                                                placeholder="Registartion Number" value="{{$seller->email}}" name="email">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                         @endif
                                    </div>
                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Password</label>
                                            <input type="password" id="last-name-column" class="form-control"
                                                placeholder="Enter password" value="" name="password">
                                        </div>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    </div> --}}
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Seller Name</label>
                                            <input type="text" id="city-column" class="form-control"
                                                placeholder="Enter Seller Name" value="{{$seller->name}}" name="name">
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating"></label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="phone_number" value="{{$seller->phone_number}}" placeholder="Phone Number">
                                        </div>
                                        @if ($errors->has('phone_number'))
                                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Post Code </label>
                                            <input type="text" id="city-column" class="form-control"
                                                placeholder="Enter Post Code" value="{{$seller->post_code}}" name="post_code">
                                        </div>
                                        @if ($errors->has('post_code'))
                                        <span class="text-danger">{{ $errors->first('post_code') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Car Mile Age</label>
                                            <input type="text" id="country-floating" value="{{$seller->mile_age}}" class="form-control"
                                                name="mile_age" placeholder="Vehicle Age">
                                        </div>
                                        @if ($errors->has('mile_age'))
                                        <span class="text-danger">{{ $errors->first('mile_age') }}</span>
                                    @endif
                                    </div>



                                </div>
                                <div class="card-header">
                                    <h4 class="card-title">View Vehicle Details</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Vehicle Registartion Number</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Registartion Number" value="{{$vehicles->vehicle_registartion_number}}" name="register_number">
                                        </div>
                                        @if ($errors->has('register_number'))
                                    <span class="text-danger">{{ $errors->first('register_number') }}</span>
                                @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Vehicle Name</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                placeholder="Vehicle Name" value="{{$vehicles->vehicle_name}}" name="vehicle_name">
                                        </div>
                                        @if ($errors->has('vehicle_name'))
                                        <span class="text-danger">{{ $errors->first('vehicle_name') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Vehicle Year</label>
                                            <input type="text" id="city-column" class="form-control"
                                                placeholder="Vehicle Year" value="{{$vehicles->vehicle_year}}" name="vehicle_year">
                                        </div>
                                        @if ($errors->has('vehicle_year'))
                                        <span class="text-danger">{{ $errors->first('vehicle_year') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Vehicle Color</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="vehicle_color" value="{{$vehicles->vehicle_color}}" placeholder="Vehicle Color">
                                        </div>
                                        @if ($errors->has('vehicle_color'))
                                        <span class="text-danger">{{ $errors->first('vehicle_color') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Vehicle Type</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="vehicle_type" value="{{$vehicles->vehicle_type}}" placeholder="Vehicle Type">
                                        </div>
                                        @if ($errors->has('vehicle_type'))
                                        <span class="text-danger">{{ $errors->first('vehicle_type') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Vehicle Tank</label>
                                            <input type="text" id="" class="form-control"
                                                name="vehicle_tank" value="{{$vehicles->vehicle_tank}}" placeholder="Vehicle Tank">
                                        </div>
                                        @if ($errors->has('vehicle_tank'))
                                        <span class="text-danger">{{ $errors->first('vehicle_tank') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Vehicle Mileage</label>
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="vehicle_mileage" value="{{$vehicles->vehicle_mileage}}" placeholder="Vehicle Mileage">
                                        </div>
                                        @if ($errors->has('vehicle_mileage'))
                                        <span class="text-danger">{{ $errors->first('vehicle_mileage') }}</span>
                                    @endif
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Vehicle Price</label>
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="vehicle_price" value="{{$vehicles->vehicle_price}}" placeholder="Vehicle Price">
                                        </div>
                                        @if ($errors->has('vehicle_price'))
                                        <span class="text-danger">{{ $errors->first('vehicle_price') }}</span>
                                    @endif
                                    </div>


                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Vehicle features</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                             <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h6>Select Vehicle Feature</h6>

                                        <div class="form-group">
                                            @if(isset($vehicleInformation))
                                            @php
                                            $a=explode(',',$vehicleInformation->vehicle_feature_id);
                                            @endphp
                                        @endif

                                            {{-- <option disabled selected>Select Grade</option> --}}
                                            <select name="vehicle_feature[]" class="choices form-select multiple-remove"
                                            multiple="multiple">
                                            @foreach ($VehicleFeatures as $VehicleFeature)
                                                <option value="{{ $VehicleFeature->id }}"  @if (isset($vehicleInformation)) {{in_array( $VehicleFeature->id, $a) ? 'selected' : '' }} @endif>{{$VehicleFeature->title}}</option>
                                                @endforeach

                                                {{-- <option @if($VehicleFeature->id == $vehicleInformation->vehicle_feature_id ) selected @endif  value="{{$VehicleFeature->id}}">{{$VehicleFeature->title}}</option> --}}


                                            </select>
                                        </div>
                                        @if ($errors->has('vehicle_feature'))
                                        <span class="text-danger">{{ $errors->first('vehicle_feature') }}</span>
                                    @endif
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <h6>Select Vehicle Category</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="vehicle_category" id="basicSelect">
                                                <option disabled selected>Select Vehicle Category</option>
                                                @foreach($vehicleCategories as $vehicleCategorie)
                                                    <option @if($vehicleCategorie->id == $vehicles->vehicle_category ) selected @endif value="{{$vehicleCategorie->id}}">{{$vehicleCategorie->title}}</option>
                                                   @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('vehicle_category'))
                                        <span class="text-danger">{{ $errors->first('vehicle_category') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Select Seat Material</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="seat_material" id="basicSelect">
                                                <option disabled selected>Select Seat Material</option>
                                                @foreach($SeatMaterials as $SeatMaterial)
                                                    <option @if($SeatMaterial->id == $vehicleInformation->seat_material_id ) selected @endif value="{{$SeatMaterial->id }}">{{$SeatMaterial->title}}</option>
                                                   @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('seat_material'))
                                        <span class="text-danger">{{ $errors->first('seat_material') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Number of keys</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="number_of_keys" id="basicSelect">
                                                <option disabled selected>Select Number of keys</option>
                                                @foreach($NumberOfKeys as $NumberOfKey)
                                                <option @if($NumberOfKey->id == $vehicleInformation->number_of_keys_id ) selected @endif value="{{$NumberOfKey->id}}">{{$NumberOfKey->number_of_key}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('number_of_keys'))
                                        <span class="text-danger">{{ $errors->first('number_of_keys') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Tool pack</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="tool_pack" id="basicSelect">
                                                <option disabled selected>Select Tool pack</option>
                                                @foreach($ToolPacks as $ToolPack)
                                                <option @if($ToolPack->id == $vehicleInformation->tool_pack_id ) selected @endif value="{{$ToolPack->id}}">{{$ToolPack->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('tool_pack'))
                                        <span class="text-danger">{{ $errors->first('tool_pack') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Locking wheel nut</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="wheel_nut" id="basicSelect">
                                                <option disabled selected>Select Locking wheel nut</option>
                                                @foreach($LockingWheelNuts as $LockingWheelNut)
                                                <option @if($LockingWheelNut->id == $vehicleInformation->looking_wheel_nut_id ) selected @endif value="{{$LockingWheelNut->id}}">{{$LockingWheelNut->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('wheel_nut'))
                                        <span class="text-danger">{{ $errors->first('wheel_nut') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Smoking</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="smoking" id="basicSelect">
                                                <option disabled selected>Select Smoking</option>
                                                @foreach($Smokings as $Smoking)
                                                <option  @if($Smoking->id == $vehicleInformation->smooking_id ) selected @endif value="{{$Smoking->id}}">{{$Smoking->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('smoking'))
                                        <span class="text-danger">{{ $errors->first('smoking') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>V5C logbook</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="logbook" id="basicSelect">
                                                <option disabled selected>Select V5C logbook</option>
                                                @foreach($VCLogBooks as $VCLogBook)
                                                <option @if($VCLogBook->id == $vehicleInformation->logbook_id ) selected @endif value="{{$VCLogBook->id}}">{{$VCLogBook->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('logbook'))
                                        <span class="text-danger">{{ $errors->first('logbook') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Location</label>
                                            <input type="text"  class="form-control"
                                                name="location" value="{{$vehicleInformation->location}}" placeholder="Enter Your Location">
                                        </div>
                                        @if ($errors->has('location'))
                                        <span class="text-danger">{{ $errors->first('location') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Vehicle owner</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="vehicle_owner" id="basicSelect">
                                                <option disabled selected>Select Vehicle owner</option>
                                                @foreach($VehicleOwners as $VehicleOwner)
                                                <option @if($VehicleOwner->id == $vehicleInformation->vehicle_owner_id ) selected @endif value="{{$VehicleOwner->id}}">{{$VehicleOwner->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('vehicle_owner'))
                                        <span class="text-danger">{{ $errors->first('vehicle_owner') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Private plate</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="private_plate" id="basicSelect">
                                                <option disabled selected>Select Private plate</option>
                                                @foreach($PrivatePlates as $PrivatePlate)
                                                <option @if($PrivatePlate->id == $vehicleInformation->private_plate_id ) selected @endif value="{{$PrivatePlate->id}}">{{$PrivatePlate->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('private_plate'))
                                        <span class="text-danger">{{ $errors->first('private_plate') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Finance</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="finance" id="basicSelect">
                                                <option disabled selected>Select Finance</option>
                                                @foreach($Finances as $Finance)
                                                <option  @if($Finance->id == $vehicleInformation->finance_id ) selected @endif  value="{{$Finance->id}}">{{$Finance->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('finance'))
                                        <span class="text-danger">{{ $errors->first('finance') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Interior</h6>
                                        <div class="form-group">
                                            
                                            <input type="text"  class="form-control"
                                                name="interior" value="{{$vehicleInformation->interior}}" placeholder="Eg : Full Leather, etc">
                                        </div>
                                        @if ($errors->has('interior'))
                                        <span class="text-danger">{{ $errors->first('interior') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Body Type</h6>
                                        <div class="form-group">
                                           
                                            <input type="text"  class="form-control"
                                                name="body_type" value="{{$vehicleInformation->body_type}}" placeholder="Eg : Sedan,Coupe,etc">
                                        </div>
                                        @if ($errors->has('body_type'))
                                        <span class="text-danger">{{ $errors->first('body_type') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Engine Size</h6>
                                        <div class="form-group">
                                           
                                            <input type="text"  class="form-control"
                                                name="engine_size" value="{{$vehicleInformation->engine_size}}" placeholder="Eg : 2700cc,3500cc,etc">
                                        </div>
                                        @if ($errors->has('engine_size'))
                                        <span class="text-danger">{{ $errors->first('engine_size') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>HPI history check</h6>
                                        <div class="form-group">
                                            
                                            <input type="text" value="{{$vehicleInformation->HPI_history_check}}"  class="form-control"
                                                name="hpi" placeholder="Enter history check">
                                        </div>
                                        @if ($errors->has('hpi'))
                                        <span class="text-danger">{{ $errors->first('hpi') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>VIN</h6>
                                        <div class="form-group">
                                            
                                            <input type="text" value="{{$vehicleInformation->vin}}"  class="form-control"
                                                name="vin" placeholder="Eg : ZFF82YNC000247970,etc">
                                        </div>
                                        @if ($errors->has('vin'))
                                        <span class="text-danger">{{ $errors->first('vin') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>First Registeration Date</h6>
                                        <div class="form-group">
                                            
                                            <input type="date" value="{{$vehicleInformation->first_registered}}" class="form-control"
                                                name="register_date" placeholder="">
                                        </div>
                                        @if ($errors->has('register_date'))
                                        <span class="text-danger">{{ $errors->first('register_date') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Keeper Start Date</h6>
                                        <div class="form-group">
                
                                            <input type="date" value="{{$vehicleInformation->keeper_start_date}}" class="form-control"
                                                name="keeper_date" placeholder="">
                                        </div>
                                        @if ($errors->has('keeper_date'))
                                        <span class="text-danger">{{ $errors->first('keeper_date') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Last MOT Date</h6>
                                        <div class="form-group">
                
                                            <input type="date" value="{{$vehicleInformation->last_mot_date}}" class="form-control"
                                                name="mot_date" placeholder="">
                                        </div>
                                        @if ($errors->has('mot_date'))
                                        <span class="text-danger">{{ $errors->first('mot_date') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Previous Owners</h6>
                                        <div class="form-group">
                                            
                                            <input type="text" value="{{$vehicleInformation->previous_owners}}" class="form-control"
                                                name="previous_owner" placeholder="how many previous owners are">
                                        </div>
                                        @if ($errors->has('previous_owner'))
                                        <span class="text-danger">{{ $errors->first('previous_owner') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Seller Keeping Plate</h6>
                                        <div class="form-group">
                                            
                                            <input type="text" value="{{$vehicleInformation->seller_keeping_plate}}" class="form-control"
                                                name="keeping_plate" placeholder="yes or no">
                                        </div>
                                        @if ($errors->has('keeping_plate'))
                                        <span class="text-danger">{{ $errors->first('keeping_plate') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Additional Information</h6>
                                        <div class="form-group">
                                            
                                            <input type="text" value="{{$vehicleInformation->additional_information}}" class="form-control"
                                                name="additional" placeholder="Enter Description">
                                        </div>
                                        @if ($errors->has('additional'))
                                        <span class="text-danger">{{ $errors->first('additional') }}</span>
                                    @endif
                                    </div>
                                    


                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Condition And Damage</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                             <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h6>Your Exterior Grade</h6>
                                        <div class="form-group">
                                            <input type="text" value="{{$damages->exterior_grade}}"  class="form-control"
                                                name="exterior_grade" placeholder="Enter Exterior Grade">
                                        </div>
                                        @if ($errors->has('exterior_grade'))
                                        <span class="text-danger">{{ $errors->first('exterior_grade') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Scratches and Scuffs</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="scratches" id="basicSelect">
                                                <option disabled selected>Is It Your Car Have Scratches and Scuffs</option>
                                                
                                                @if($damages->scratches_and_scuffs == 'yes')
                                                <option selected value="yes">Yes</option>
                                                <option value="no">No</option>
                                                @else
                                                <option  value="yes">Yes</option>
                                                <option selected value="no">No</option>
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('scratches'))
                                        <span class="text-danger">{{ $errors->first('scratches') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Dents</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="dents" id="basicSelect">
                                                <option disabled selected>Is It Your Car Have Dents</option>
                                                @if($damages->dents == 'yes')
                                                <option selected value="yes">Yes</option>
                                                <option value="no">No</option>
                                                @else
                                                <option  value="yes">Yes</option>
                                                <option selected value="no">No</option>
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('dents'))
                                        <span class="text-danger">{{ $errors->first('dents') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Paintwork Problems</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="paintwork" id="basicSelect">
                                                <option disabled selected>Is It Your Car Have Paintwork Problems</option>
                                                @if($damages->paintwork_problems == 'yes')
                                                <option selected value="yes">Yes</option>
                                                <option value="no">No</option>
                                                @else
                                                <option  value="yes">Yes</option>
                                                <option selected value="no">No</option>
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('paintwork'))
                                        <span class="text-danger">{{ $errors->first('paintwork') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Windscreen damage</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="windscreen" id="basicSelect">
                                                <option disabled selected>Is It Your Car's Windscreen is damage</option>
                                              
                                                @if($damages->windscreen_damage == 'yes')
                                                <option selected value="yes">Yes</option>
                                                <option value="no">No</option>
                                                @else
                                                <option  value="yes">Yes</option>
                                                <option selected value="no">No</option>
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('windscreen'))
                                        <span class="text-danger">{{ $errors->first('windscreen') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Broken/Missing lights, Mirrors, Trim or fittings</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="broken_missing" id="basicSelect">
                                                <option disabled selected>Broken/Missing lights, Mirrors, Trim or fittings</option>
                                                @if($damages->broken_missing == 'yes')
                                                <option selected value="yes">Yes</option>
                                                <option value="no">No</option>
                                                @else
                                                <option  value="yes">Yes</option>
                                                <option selected value="no">No</option>
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('broken_missing'))
                                        <span class="text-danger">{{ $errors->first('broken_missing') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Warning Lights on dashboard</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="warning_lights" id="basicSelect">
                                                <option disabled selected>Warning Lights on dashboard</option>
                                                @if($damages->warning_lights_on_dashboard == 'yes')
                                                <option selected value="yes">Yes</option>
                                                <option value="no">No</option>
                                                @else
                                                <option  value="yes">Yes</option>
                                                <option selected value="no">No</option>
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('warning_lights'))
                                        <span class="text-danger">{{ $errors->first('warning_lights') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Your Service record</h6>
                                        <div class="form-group">
                                            <input type="text"  class="form-control"
                                                name="service_record" value="{{$damages->service_record}}" placeholder="Enter Service record">
                                        </div>
                                        @if ($errors->has('service_record'))
                                        <span class="text-danger">{{ $errors->first('service_record') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Main dealer services</h6>
                                        <div class="form-group">
                                            <input type="text" id="email-id-column" class="form-control"
                                                name="main_dealer" value="{{$damages->main_dealer_services}}" placeholder="Enter Main dealer services">
                                        </div>
                                        @if ($errors->has('main_dealer'))
                                        <span class="text-danger">{{ $errors->first('main_dealer') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Independent dealer service</h6>
                                        <div class="form-group">
                                            <input type="text" id="email-id-column" class="form-control"
                                                name="independent_dealer" value="{{$damages->independent_dealer_service}}" placeholder="Enter Independent dealer service">
                                        </div>
                                        @if ($errors->has('independent_dealer'))
                                        <span class="text-danger">{{ $errors->first('independent_dealer') }}</span>
                                    @endif
                                    </div>


                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Pictures</h4>
                    </div>
                 <div class="row">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-front.png')}}" width="80%">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label">Yours Picture</label>
                        <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->front) }}" width="80%">
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" name="image1" id="formFile">
                        </div>
                        @if ($errors->has('image1'))
                        <span class="text-danger">{{ $errors->first('image1') }}</span>
                    @endif
                    </div>
                 </div>
                 <br>
                 <div class="row">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-back.png')}} " class="rounded mx-auto d-block">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label">Yours Picture</label>
                        <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->passenger_rare_side_corner) }}" width="80%">
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" name="image2" id="formFile">
                        </div>
                        @if ($errors->has('image2'))
                        <span class="text-danger">{{ $errors->first('image2') }}</span>
                    @endif
                    </div>
                 </div>

                 <div class="row">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-back-corner.png')}} " class="rounded mx-auto d-block">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label">Yours Picture</label>
                        <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->driver_rare_side_corner) }}" width="80%">
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" name="image3"   id="formFile">
                        </div>
                        @if ($errors->has('image3'))
                        <span class="text-danger">{{ $errors->first('image3') }}</span>
                    @endif
                    </div>
                 </div>
                 <div class="row">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-interior.png')}} " class="rounded mx-auto d-block">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label">Yours Picture</label>
                        <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->interior_front) }}" width="80%">
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" name="image4"  id="formFile">
                        </div>
                        @if ($errors->has('image4'))
                        <span class="text-danger">{{ $errors->first('image4') }}</span>
                    @endif
                    </div>
                 </div>

                 <div class="row">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-dashboard.png')}} " class="rounded mx-auto d-block">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label">Yours Picture</label>
                        <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->dashboard) }}" width="80%">
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" id="formFile"  name="image5">
                        </div>
                        @if ($errors->has('image5'))
                        <span class="text-danger">{{ $errors->first('image5') }}</span>
                    @endif
                    </div>
                 </div>

                </div>
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Auction Date And Time Of Vehicle</h4>
                            </div>
                            <div class="card-body">
                                <fieldset>
                                    <div class="some-class">
                                      <input type="radio" class="radio" name="auction_date_and_time" value="all" {{ ($vehicles->all_auction == 'all' ? 'checked' : '')}} onclick="show1();"  />
                                      <label for="y">Buy Now (All)</label>
                                      <input type="radio" class="radio commonCheck"  name="auction_date_and_time" id="liveSell" value="date_and_time" {{ ($vehicles->all_auction == null ? 'checked' : '')}} onclick="show2();" style="margin-left: 20px" />
                                      <label for="z">Time Auction (Live Sale)</label>
                                    </div>
                                  </fieldset>

                            </div>


                            <div class="card-content hide" id="div1">
                                <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-3 col-3">
                                                <div class="form-group">
                                                    <label for="start_vehicle_date">Start Vehicle Date </label>
                                                    <input type="date" id="start_vehicle_date" value="{{ date('Y-m-d'); }}" readonly class="form-control"
                                                       name="start_vehicle_date" placeholder="Registartion Number" >

                                                </div>
                                                @if ($errors->has('start_vehicle_date'))
                                                <span class="text-danger">{{ $errors->first('start_vehicle_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-3">
                                                <div class="form-group">
                                                    <label for="start_vehicle_time">Start Vehicle Time </label>
                                                    <input type="time" id="start_vehicle_time" class="form-control"
                                                       name="start_vehicle_time" value="{{ $liveselltime->start_time }}" readonly placeholder="" >

                                                </div>
                                                @if ($errors->has('start_vehicle_time'))
                                                <span class="text-danger">{{ $errors->first('start_vehicle_time') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-3">
                                                <div class="form-group">
                                                    <label for="end_vehicle_date">End Vehicle Date </label>
                                                    <input type="date" id="end_vehicle_date" value="{{ date('Y-m-d'); }}" readonly class="form-control"
                                                       name="end_vehicle_date" placeholder="" >

                                                </div>
                                                @if ($errors->has('end_vehicle_date'))
                                                <span class="text-danger">{{ $errors->first('end_vehicle_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-3">
                                                <div class="form-group">
                                                    <label for="end_vehicle_time">Start Vehicle Date </label>
                                                    <input type="time" id="end_vehicle_time" class="form-control"
                                                       name="end_vehicle_time" value="{{ $liveselltime->end_time }}" readonly placeholder="Registartion Number" >

                                                </div>
                                                @if ($errors->has('end_vehicle_time'))
                                                <span class="text-danger">{{ $errors->first('end_vehicle_time') }}</span>
                                                @endif
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Vehicle Prices for Bidding</h4>
                            </div>

                            <div class="card-content" >
                                <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-3 col-3">
                                                <div class="form-group">
                                                    <label for="retail_price">Vehicle Detail Price </label>
                                                    <input type="number" id="retail_price" value=""  class="form-control"
                                                       name="retail_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('retail_price'))
                                                <span class="text-danger">{{ $errors->first('retail_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-3">
                                                <div class="form-group">
                                                    <label for="clean_price">Vehicle Clean Price </label>
                                                    <input type="number" id="clean_price" value=""  class="form-control"
                                                       name="clean_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('clean_price'))
                                                <span class="text-danger">{{ $errors->first('clean_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-3">
                                                <div class="form-group">
                                                    <label for="average_price">Vehicle Average Price </label>
                                                    <input type="number" id="average_price" value=""  class="form-control"
                                                       name="average_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('average_price'))
                                                <span class="text-danger">{{ $errors->first('average_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-3">
                                                <div class="form-group">
                                                    <label for="hidden_price">Vehicle Hidden Price </label>
                                                    <input type="number" id="hidden_price" value=""  class="form-control"
                                                       name="hidden_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('hidden_price'))
                                                <span class="text-danger">{{ $errors->first('hidden_price') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit"
                        class="btn btn-primary me-1 mb-1">Update Data</button>
                    <button type="reset"
                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </div>

        </div>
    </section>

</form>
</div>
<script type="text/javascript">

function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
$(document).on('change', '.commonCheck', function () {

        document.getElementById('div1').style.display = 'block';

});

$('#liveSell').prop('checked', true).trigger('change');
</script>
@endsection
