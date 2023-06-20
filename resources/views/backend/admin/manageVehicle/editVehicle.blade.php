
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
  <style>
    .image-container {
        width: 100%;
        height: 200px;
        /* height: 0px auto; */
        overflow: hidden;
    }

    .image-container img {
        max-width: 100%;
        max-height: 100%;
        width: 100%;
        /* object-fit: contain; */
        object-fit: cover;
    }
    section#multiple-column-form .col-md-4:last-child {
    max-width: 360px;
    margin-left: auto;
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
                <a href="{{ route('viewVehicle') }}"><span class="badge badge-success">Go Back</span></a>
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
                                                placeholder="Registartion Number" readonly value="{{$seller->email}}" name="email">
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
                                                placeholder="Enter Seller Name" readonly value="{{$seller->name}}" name="name">
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating"></label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="phone_number" readonly value="{{$seller->phone_number}}" placeholder="Phone Number">
                                        </div>
                                        @if ($errors->has('phone_number'))
                                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Post Code </label>
                                            <input type="text" id="city-column" class="form-control"
                                                placeholder="Enter Post Code" readonly value="{{$seller->post_code}}" name="post_code">
                                        </div>
                                        @if ($errors->has('post_code'))
                                        <span class="text-danger">{{ $errors->first('post_code') }}</span>
                                    @endif
                                    </div>
                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Car Mile Age</label>
                                            <input type="text" id="country-floating" value="{{$seller->mile_age}}" class="form-control"
                                                name="mile_age" placeholder="Vehicle Age">
                                        </div>
                                        @if ($errors->has('mile_age'))
                                        <span class="text-danger">{{ $errors->first('mile_age') }}</span>
                                    @endif
                                    </div> --}}



                                </div>
                                <div class="card-header">
                                    <h4 class="card-title">View Vehicle Details</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Vehicle Registartion Number</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Registartion Number" value="{{$vehicles->vehicle_registartion_number}}" name="register_number" style="text-transform: uppercase">
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
                                                name="vehicle_type" value="{{$vehicles->vehicle_type ?? old('vehicle_type')}}" placeholder="Vehicle Type">
                                        </div>
                                        @if ($errors->has('vehicle_type'))
                                        <span class="text-danger">{{ $errors->first('vehicle_type') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Fuel type</label>
                                            <input type="text" id="" class="form-control"
                                                name="vehicle_tank" value="{{$vehicles->vehicle_tank ?? old('vehicle_tank')}}" placeholder="Fuel type">
                                        </div>
                                        @if ($errors->has('vehicle_tank'))
                                        <span class="text-danger">{{ $errors->first('vehicle_tank') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Vehicle Mileage</label>
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="vehicle_mileage" value="{{$vehicles->vehicle_mileage ?? old('vehicle_mileage')}}" placeholder="Vehicle Mileage">
                                        </div>
                                        @if ($errors->has('vehicle_mileage'))
                                        <span class="text-danger">{{ $errors->first('vehicle_mileage') }}</span>
                                    @endif
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Vehicle Price</label>
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="vehicle_price" value="{{$vehicles->vehicle_price ?? old('vehicle_price')}}" placeholder="Vehicle Price">
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
                        <h4 class="card-title">Interior Damages</h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6>Dashboard</h6>
                                <div class="form-group">
                                    <select class="form-select" name="dashboard" id="basicSelect">
                                        <option disabled selected>Select Dashboard Damage</option>
                                        <option value="Stained" @if(isset($interior->dashboard) && $interior->dashboard == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->dashboard) && $interior->dashboard == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->dashboard) && $interior->dashboard == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->dashboard) && $interior->dashboard == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->dashboard) && $interior->dashboard == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->dashboard) && $interior->dashboard == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('dashboard'))
                                <span class="text-danger">{{ $errors->first('dashboard') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Passenger Side Interior</h6>

                                <div class="form-group">
                                    <select class="form-select" name="passenger_side_interior" id="basicSelect">
                                        <option disabled selected>Select passenger side interior</option>
                                        <option value="Stained" @if(isset($interior->passenger_side_interior) && $interior->passenger_side_interior == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->passenger_side_interior) && $interior->passenger_side_interior == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->passenger_side_interior) && $interior->passenger_side_interior == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->passenger_side_interior) && $interior->passenger_side_interior == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->passenger_side_interior) && $interior->passenger_side_interior == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->passenger_side_interior) && $interior->passenger_side_interior == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('passenger_side_interior'))
                                <span class="text-danger">{{ $errors->first('passenger_side_interior') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Driver Side Interior</h6>

                                <div class="form-group">
                                    <select class="form-select" name="driver_side_interior" id="basicSelect">
                                        <option disabled selected>Select driver side interior</option>
                                        <option value="Stained" @if(isset($interior->driver_side_interior) && $interior->driver_side_interior == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->driver_side_interior) && $interior->driver_side_interior == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->driver_side_interior) && $interior->driver_side_interior == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->driver_side_interior) && $interior->driver_side_interior == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->driver_side_interior) && $interior->driver_side_interior == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->driver_side_interior) && $interior->driver_side_interior == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('driver_side_interior'))
                                <span class="text-danger">{{ $errors->first('driver_side_interior') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Floor</h6>

                                <div class="form-group">
                                    <select class="form-select" name="floor" id="basicSelect">
                                        <option disabled selected>Select floor </option>
                                        <option value="Stained" @if(isset($interior->floor) && $interior->floor == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->floor) && $interior->floor == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->floor) && $interior->floor == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->floor) && $interior->floor == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->floor) && $interior->floor == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->floor) && $interior->floor == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('floor'))
                                <span class="text-danger">{{ $errors->first('floor') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Ceiling</h6>

                                <div class="form-group">
                                    <select class="form-select" name="ceiling" id="basicSelect">
                                        <option disabled selected>Select ceiling </option>
                                        <option value="Stained" @if(isset($interior->ceiling) && $interior->ceiling == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->ceiling) && $interior->ceiling == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->ceiling) && $interior->ceiling == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->ceiling) && $interior->ceiling == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->ceiling) && $interior->ceiling == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->ceiling) && $interior->ceiling == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('ceiling'))
                                <span class="text-danger">{{ $errors->first('ceiling') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Boot</h6>

                                <div class="form-group">
                                    <select class="form-select" name="boot" id="basicSelect">
                                        <option disabled selected>Select boot </option>
                                        <option value="Stained" @if(isset($interior->boot) && $interior->boot == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->boot) && $interior->boot == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->boot) && $interior->boot == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->boot) && $interior->boot == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->boot) && $interior->boot == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->boot) && $interior->boot == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('boot'))
                                <span class="text-danger">{{ $errors->first('boot') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Rear Windscreen</h6>

                                <div class="form-group">
                                    <select class="form-select" name="rear_windscreen" id="basicSelect">
                                        <option disabled selected>Select rear windscreen </option>
                                        <option value="Stained" @if(isset($interior->rear_windscreen) && $interior->rear_windscreen == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->rear_windscreen) && $interior->rear_windscreen == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->rear_windscreen) && $interior->rear_windscreen == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->rear_windscreen) && $interior->rear_windscreen == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->rear_windscreen) && $interior->rear_windscreen == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->rear_windscreen) && $interior->rear_windscreen == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('rear_windscreen'))
                                <span class="text-danger">{{ $errors->first('rear_windscreen') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Passenger Seat</h6>

                                <div class="form-group">
                                    <select class="form-select" name="passenger_seat" id="basicSelect">
                                        <option disabled selected>Select passenger seat </option>
                                        <option value="Stained" @if(isset($interior->passenger_seat) && $interior->passenger_seat == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->passenger_seat) && $interior->passenger_seat == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->passenger_seat) && $interior->passenger_seat == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->passenger_seat) && $interior->passenger_seat == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->passenger_seat) && $interior->passenger_seat == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->passenger_seat) && $interior->passenger_seat == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('passenger_seat'))
                                <span class="text-danger">{{ $errors->first('passenger_seat') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Driver Seat</h6>

                                <div class="form-group">
                                    <select class="form-select" name="driver_seat" id="basicSelect">
                                        <option disabled selected>Select driver seat </option>
                                        
                                        <option value="Stained" @if(isset($interior->driver_seat) && $interior->driver_seat == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->driver_seat) && $interior->driver_seat == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->driver_seat) && $interior->driver_seat == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->driver_seat) && $interior->driver_seat == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->driver_seat) && $interior->driver_seat == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->driver_seat) && $interior->driver_seat == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('driver_seat'))
                                <span class="text-danger">{{ $errors->first('driver_seat') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Rear Seat</h6>

                                <div class="form-group">
                                    <select class="form-select" name="rear_seats" id="basicSelect">
                                        <option disabled selected>Select rear seats </option>
                                        <option value="Stained" @if(isset($interior->rear_seats) && $interior->rear_seats == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->rear_seats) && $interior->rear_seats == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->rear_seats) && $interior->rear_seats == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->rear_seats) && $interior->rear_seats == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->rear_seats) && $interior->rear_seats == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->rear_seats) && $interior->rear_seats == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('rear_seats'))
                                <span class="text-danger">{{ $errors->first('rear_seats') }}</span>
                            @endif
                            </div>

                            <div class="col-md-6 mb-4">
                                <h6>Passenger Back Door</h6>
{{-- @dd($interior->passenger_back_door) --}}
                                <div class="form-group">
                                    <select class="form-select" name="passenger_back_door" id="basicSelect">
                                        <option disabled selected>Select Passenger Back Doors </option>
                                        <option value="Stained" @if(isset($interior->passenger_back_door) && $interior->passenger_back_door == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->passenger_back_door) && $interior->passenger_back_door == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->passenger_back_door) && $interior->passenger_back_door == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->passenger_back_door) && $interior->passenger_back_door == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->passenger_back_door) && $interior->passenger_back_door == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->passenger_back_door) && $interior->passenger_back_door == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('passenger_back_door'))
                                <span class="text-danger">{{ $errors->first('passenger_back_door') }}</span>
                            @endif
                            </div>

                            <div class="col-md-6 mb-4">
                                <h6>Driver Back Door</h6>

                                <div class="form-group">
                                    <select class="form-select" name="driver_back_door" id="basicSelect">
                                        <option disabled selected>Select Driver Back Doors </option>
                                        <option value="Stained" @if(isset($interior->driver_back_door) && $interior->driver_back_door == 'Stained') selected @endif >Stained (ST)</option>
                                        <option value="Torn/Ripped" @if(isset($interior->driver_back_door) && $interior->driver_back_door == 'Torn/Ripped') selected @endif >Torn / Ripped (T)</option>
                                        <option value="Warn"  @if(isset($interior->driver_back_door) && $interior->driver_back_door == 'Warn') selected @endif >Warn (W)</option>
                                        <option value="Dirty" @if(isset($interior->driver_back_door) && $interior->driver_back_door == 'Dirty') selected @endif>Dirty (D)</option>
                                        <option value="Broken/Damage" @if(isset($interior->driver_back_door) && $interior->driver_back_door == 'Broken/Damage') selected @endif >Broken / Damage (BD)</option>
                                        <option value="Bumt" @if(isset($interior->driver_back_door) && $interior->driver_back_door == 'Bumt') selected @endif>Bumt (B)</option>
                                    </select>
                                </div>
                                @if ($errors->has('driver_back_door'))
                                <span class="text-danger">{{ $errors->first('driver_back_door') }}</span>
                            @endif
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
                        <h4 class="card-title">Exterior Damages</h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6>Front Door Left</h6>

                                <div class="form-group">
                                    <select class="form-select" name="front_door_left" id="basicSelect">
                                        <option disabled selected>Select Front Door Left Damage</option>
                                        <option value="Dent" @if(isset($exterior->front_door_left) && $exterior->front_door_left == 'Dent') selected @endif >Dent (D)</option>
                                        <option value="Broken" @if(isset($exterior->front_door_left) && $exterior->front_door_left == 'Broken') selected @endif >Broken (B)</option>
                                        <option value="Chips"  @if(isset($exterior->front_door_left) && $exterior->front_door_left == 'Chips') selected @endif >Chips (CH)</option>
                                        <option value="Crack/Rust" @if(isset($exterior->front_door_left) && $exterior->front_door_left == 'Crack/Rust') selected @endif>Crack / Rust (CR)</option>
                                        <option value="Scratch" @if(isset($exterior->front_door_left) && $exterior->front_door_left == 'Scratch') selected @endif >Scratch (S)</option>
                                        <option value="Wheel Scuff" @if(isset($exterior->front_door_left) && $exterior->front_door_left == 'Wheel Scuff') selected @endif>Wheel Scuff (WS)</option>
                                    </select>
                                </div>
                                @if ($errors->has('front_door_left'))
                                <span class="text-danger">{{ $errors->first('front_door_left') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>back door left</h6>

                                <div class="form-group">
                                    <select class="form-select" name="back_door_left" id="basicSelect">
                                        <option disabled selected>Select back door left </option>
                                        <option value="Dent" @if(isset($exterior->back_door_left) && $exterior->back_door_left == 'Dent') selected @endif >Dent (D)</option>
                                        <option value="Broken" @if(isset($exterior->back_door_left) && $exterior->back_door_left == 'Broken') selected @endif >Broken (B)</option>
                                        <option value="Chips"  @if(isset($exterior->back_door_left) && $exterior->back_door_left == 'Chips') selected @endif >Chips (CH)</option>
                                        <option value="Crack/Rust" @if(isset($exterior->back_door_left) && $exterior->back_door_left == 'Crack/Rust') selected @endif>Crack / Rust (CR)</option>
                                        <option value="Scratch" @if(isset($exterior->back_door_left) && $exterior->back_door_left == 'Scratch') selected @endif >Scratch (S)</option>
                                        <option value="Wheel Scuff" @if(isset($exterior->back_door_left) && $exterior->back_door_left == 'Wheel Scuff') selected @endif>Wheel Scuff (WS)</option></select>
                                </div>
                                @if ($errors->has('back_door_left'))
                                <span class="text-danger">{{ $errors->first('back_door_left') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Front Door Right</h6>

                                <div class="form-group">
                                    <select class="form-select" name="front_door_right" id="basicSelect">
                                        <option disabled selected>Select Front Door Right </option>
                                        <option value="Dent" @if(isset($exterior->front_door_right) && $exterior->front_door_right == 'Dent') selected @endif >Dent (D)</option>
                                        <option value="Broken" @if(isset($exterior->front_door_right) && $exterior->front_door_right == 'Broken') selected @endif >Broken (B)</option>
                                        <option value="Chips"  @if(isset($exterior->front_door_right) && $exterior->front_door_right == 'Chips') selected @endif >Chips (CH)</option>
                                        <option value="Crack/Rust" @if(isset($exterior->front_door_right) && $exterior->front_door_right == 'Crack/Rust') selected @endif>Crack / Rust (CR)</option>
                                        <option value="Scratch" @if(isset($exterior->front_door_right) && $exterior->front_door_right == 'Scratch') selected @endif >Scratch (S)</option>
                                        <option value="Wheel Scuff" @if(isset($exterior->front_door_right) && $exterior->front_door_right == 'Wheel Scuff') selected @endif>Wheel Scuff (WS)</option></select>
                                </div>
                                @if ($errors->has('front_door_right'))
                                <span class="text-danger">{{ $errors->first('front_door_right') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Back Door Right</h6>

                                <div class="form-group">
                                    <select class="form-select" name="back_door_right" id="basicSelect">
                                        <option disabled selected>Select back door right </option>
                                        <option value="Dent" @if(isset($exterior->back_door_right) && $exterior->back_door_right == 'Dent') selected @endif >Dent (D)</option>
                                        <option value="Broken" @if(isset($exterior->back_door_right) && $exterior->back_door_right == 'Broken') selected @endif >Broken (B)</option>
                                        <option value="Chips"  @if(isset($exterior->back_door_right) && $exterior->back_door_right == 'Chips') selected @endif >Chips (CH)</option>
                                        <option value="Crack/Rust" @if(isset($exterior->back_door_right) && $exterior->back_door_right == 'Crack/Rust') selected @endif>Crack / Rust (CR)</option>
                                        <option value="Scratch" @if(isset($exterior->back_door_right) && $exterior->back_door_right == 'Scratch') selected @endif >Scratch (S)</option>
                                        <option value="Wheel Scuff" @if(isset($exterior->back_door_right) && $exterior->back_door_right == 'Wheel Scuff') selected @endif>Wheel Scuff (WS)</option></select>
                                </div>
                                @if ($errors->has('back_door_right'))
                                <span class="text-danger">{{ $errors->first('back_door_right') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Top</h6>

                                <div class="form-group">
                                    <select class="form-select" name="top" id="basicSelect">
                                        <option disabled selected>Select Top </option>
                                        <option value="Dent" @if(isset($exterior->top) && $exterior->top == 'Dent') selected @endif >Dent (D)</option>
                                        <option value="Broken" @if(isset($exterior->top) && $exterior->top == 'Broken') selected @endif >Broken (B)</option>
                                        <option value="Chips"  @if(isset($exterior->top) && $exterior->top == 'Chips') selected @endif >Chips (CH)</option>
                                        <option value="Crack/Rust" @if(isset($exterior->top) && $exterior->top == 'Crack/Rust') selected @endif>Crack / Rust (CR)</option>
                                        <option value="Scratch" @if(isset($exterior->top) && $exterior->top == 'Scratch') selected @endif >Scratch (S)</option>
                                        <option value="Wheel Scuff" @if(isset($exterior->top) && $exterior->top == 'Wheel Scuff') selected @endif>Wheel Scuff (WS)</option></select>
                                </div>
                                @if ($errors->has('top'))
                                <span class="text-danger">{{ $errors->first('top') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Bonut</h6>

                                <div class="form-group">
                                    <select class="form-select" name="bonut" id="basicSelect">
                                        <option disabled selected>Select Bonut </option>
                                        <option value="Dent" @if(isset($exterior->bonut) && $exterior->bonut == 'Dent') selected @endif >Dent (D)</option>
                                        <option value="Broken" @if(isset($exterior->bonut) && $exterior->bonut == 'Broken') selected @endif >Broken (B)</option>
                                        <option value="Chips"  @if(isset($exterior->bonut) && $exterior->bonut == 'Chips') selected @endif >Chips (CH)</option>
                                        <option value="Crack/Rust" @if(isset($exterior->bonut) && $exterior->bonut == 'Crack/Rust') selected @endif>Crack / Rust (CR)</option>
                                        <option value="Scratch" @if(isset($exterior->bonut) && $exterior->bonut == 'Scratch') selected @endif >Scratch (S)</option>
                                        <option value="Wheel Scuff" @if(isset($exterior->bonut) && $exterior->bonut == 'Wheel Scuff') selected @endif>Wheel Scuff (WS)</option></select>
                                </div>
                                @if ($errors->has('bonut'))
                                <span class="text-danger">{{ $errors->first('bonut') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>front</h6>

                                <div class="form-group">
                                    <select class="form-select" name="front" id="basicSelect">
                                        <option disabled selected>Select front </option>
                                        <option value="Dent" @if(isset($exterior->front) && $exterior->front == 'Dent') selected @endif >Dent (D)</option>
                                        <option value="Broken" @if(isset($exterior->front) && $exterior->front == 'Broken') selected @endif >Broken (B)</option>
                                        <option value="Chips"  @if(isset($exterior->front) && $exterior->front == 'Chips') selected @endif >Chips (CH)</option>
                                        <option value="Crack/Rust" @if(isset($exterior->front) && $exterior->front == 'Crack/Rust') selected @endif>Crack / Rust (CR)</option>
                                        <option value="Scratch" @if(isset($exterior->front) && $exterior->front == 'Scratch') selected @endif >Scratch (S)</option>
                                        <option value="Wheel Scuff" @if(isset($exterior->front) && $exterior->front == 'Wheel Scuff') selected @endif>Wheel Scuff (WS)</option></select>
                                </div>
                                @if ($errors->has('front'))
                                <span class="text-danger">{{ $errors->first('front') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>back</h6>

                                <div class="form-group">
                                    <select class="form-select" name="back" id="basicSelect">
                                        <option disabled selected>Select back </option>
                                        <option value="Dent" @if(isset($exterior->back) && $exterior->back == 'Dent') selected @endif >Dent (D)</option>
                                        <option value="Broken" @if(isset($exterior->back) && $exterior->back == 'Broken') selected @endif >Broken (B)</option>
                                        <option value="Chips"  @if(isset($exterior->back) && $exterior->back == 'Chips') selected @endif >Chips (CH)</option>
                                        <option value="Crack/Rust" @if(isset($exterior->back) && $exterior->back == 'Crack/Rust') selected @endif>Crack / Rust (CR)</option>
                                        <option value="Scratch" @if(isset($exterior->back) && $exterior->back == 'Scratch') selected @endif >Scratch (S)</option>
                                        <option value="Wheel Scuff" @if(isset($exterior->back) && $exterior->back == 'Wheel Scuff') selected @endif>Wheel Scuff (WS)</option></select>
                                </div>
                                @if ($errors->has('back'))
                                <span class="text-danger">{{ $errors->first('back') }}</span>
                            @endif
                            </div>

                            <div class="col-md-6 mb-4">
                                <h6>wind screen</h6>

                                <div class="form-group">
                                    <select class="form-select" name="windscreen" id="basicSelect">
                                        <option disabled selected>Select wind screen </option>
                                        <option value="Dent" @if(isset($exterior->windscreen) && $exterior->windscreen == 'Dent') selected @endif >Dent (D)</option>
                                        <option value="Broken" @if(isset($exterior->windscreen) && $exterior->windscreen == 'Broken') selected @endif >Broken (B)</option>
                                        <option value="Chips"  @if(isset($exterior->windscreen) && $exterior->windscreen == 'Chips') selected @endif >Chips (CH)</option>
                                        <option value="Crack/Rust" @if(isset($exterior->windscreen) && $exterior->windscreen == 'Crack/Rust') selected @endif>Crack / Rust (CR)</option>
                                        <option value="Scratch" @if(isset($exterior->windscreen) && $exterior->windscreen == 'Scratch') selected @endif >Scratch (S)</option>
                                        <option value="Wheel Scuff" @if(isset($exterior->windscreen) && $exterior->windscreen == 'Wheel Scuff') selected @endif>Wheel Scuff (WS)</option></select>
                                </div>
                                @if ($errors->has('windscreen'))
                                <span class="text-danger">{{ $errors->first('windscreen') }}</span>
                            @endif
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
                                                name="location" value="{{$vehicleInformation->location}}" id="search" placeholder="Enter Your Location">
                                                <ul class="list-group text-center fw-bolder suggestionSearch" id="result"></ul> 
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

                                    <div class="col-md-6 mb-4">
                                        <h6>Vehcile History</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="VehicleHistory" id="basicSelect">
                                                <option disabled selected>Select Vehicle History</option>
                                                @foreach($VehicleHistories as $VehicleHistory)
                                                <option  @if($VehicleHistory->id == $vehicleInformation->vehicle_history_id ) selected @endif  value="{{$VehicleHistory->id}}">{{$VehicleHistory->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('VehicleHistory'))
                                        <span class="text-danger">{{ $errors->first('VehicleHistory') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Insurance Write Off</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="InsuranceWorkOff" id="basicSelect">
                                                <option disabled selected>Select Insurance Write Off</option>
                                                @foreach($InsuranceWorkOffs as $InsuranceWorkOff)
                                                <option  @if($InsuranceWorkOff->id == $vehicleInformation->insurance_work_off_id ) selected @endif  value="{{$InsuranceWorkOff->id}}">{{$InsuranceWorkOff->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('InsuranceWorkOff'))
                                        <span class="text-danger">{{ $errors->first('InsuranceWorkOff') }}</span>
                                    @endif
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">House Name And Number</label>
                                            <input type="text" class="form-control" name="HouseName"
                                                placeholder="Enter Your House Name And Number" id="search" value="{{$vehicleInformation->additional_information }}">
                                                <ul class="list-group text-center fw-bolder suggestionSearch" id="result"></ul> 
                                        </div>
                                        @if ($errors->has('HouseName'))
                                            <span class="text-danger">{{ $errors->first('HouseName') }}</span>
                                        @endif
                                    </div>
                                    {{-- <div class="col-md-6 col-12">
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
                                    </div> --}}
                                    


                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section id="multiple-column-form">
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
    </section> --}}
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Pictures</h4>
                    </div>
                 <div class="row align-items-center">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-front.png')}}" id="preview-image1" width="250px" height="250px"  class="rounded mx-auto d-block" width="500px" object-fit="cover">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label d-block text-center">Yours Picture</label>
                        <a href="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->front) }}" download>
                        <div class="image-container">
                            <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->front) }}" class="rounded mx-auto d-block mb-3" alt="Vehicle Image">
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 px-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" name="image1" id="image1">
                        </div>
                        @if ($errors->has('image1'))
                        <span class="text-danger">{{ $errors->first('image1') }}</span>
                    @endif
                    </div>
                 </div>
                 <br>
                 <div class="row align-items-center">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-back.png')}} " id="preview-image2" width="250px" height="250px" class="rounded mx-auto d-block">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label d-block text-center">Yours Picture</label>
                        <a href="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->passenger_rare_side_corner) }}" download>
                        <div class="image-container">
                        <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->passenger_rare_side_corner) }}" class="rounded mx-auto d-block  mb-3"  alt="Vehicle Image">
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 px-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" name="image2" id="image2">
                        </div>
                        @if ($errors->has('image2'))
                        <span class="text-danger">{{ $errors->first('image2') }}</span>
                    @endif
                    </div>
                 </div>

                 <div class="row align-items-center">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-back-corner.png')}} " id="preview-image3" width="250px" height="250px" class="rounded mx-auto d-block">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label d-block text-center">Yours Picture</label>
                        <a href="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->driver_rare_side_corner) }}" download>
                        <div class="image-container">
                        <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->driver_rare_side_corner) }}"  class="rounded mx-auto d-block  mb-3"  alt="Vehicle Image">
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 px-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" name="image3"   id="image3">
                        </div>
                        @if ($errors->has('image3'))
                        <span class="text-danger">{{ $errors->first('image3') }}</span>
                    @endif
                    </div>
                 </div>
                 <div class="row align-items-center">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-interior.png')}} " id="preview-image4" width="250px" height="250px" class="rounded mx-auto d-block">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label d-block text-center">Yours Picture</label>
                        <a href="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->interior_front) }}" download>
                        <div class="image-container">
                        <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->interior_front) }}"  class="rounded mx-auto d-block  mb-3"  alt="Vehicle Image">
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 px-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" name="image4"  id="image4">
                        </div>
                        @if ($errors->has('image4'))
                        <span class="text-danger">{{ $errors->first('image4') }}</span>
                    @endif
                    </div>
                 </div>

                 <div class="row align-items-center">

                    <div class="col-md-4">
                        <img src="{{ URL::asset('/frontend/seller/assets/image/add-p-dashboard.png')}} " id="preview-image5" width="250px" height="250px" class="rounded mx-auto d-block">
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label d-block text-center">Yours Picture</label>
                        <a href="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->dashboard) }}" download>
                        <div class="image-container">
                        <img src="{{ asset('/vehicles/vehicles_images/'.$VehicleImage->dashboard) }}"  class="rounded mx-auto d-block  mb-3"  alt="Vehicle Image">
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 px-3">
                            <label for="formFile" class="form-label">Add Picture In This Type</label>
                            <input class="form-control" type="file" id="image5"  name="image5">
                        </div>
                        @if ($errors->has('image5'))
                        <span class="text-danger">{{ $errors->first('image5') }}</span>
                    @endif
                    </div>
                 </div>

                </div>
                @if($vehicles->vehicle_availability == null)
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
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="start_vehicle_date">Start Sale Vehicle Date </label>
                                                    <input type="date"   id="start_vehicle_date" value="{{ $vehicles->start_vehicle_date ?? date('Y-m-d');}}"  class="form-control"
                                                       name="start_vehicle_date" placeholder="Registartion Number" >

                                                </div>
                                                @if ($errors->has('start_vehicle_date'))
                                                <span class="text-danger">{{ $errors->first('start_vehicle_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="start_vehicle_time">Start Sale Vehicle Time </label>
                                                    <input type="time"  id="start_vehicle_time" class="form-control"
                                                       name="start_vehicle_time" value="{{ $liveselltime->start_time ?? "" }}" readonly placeholder="" >

                                                </div>
                                                @if ($errors->has('start_vehicle_time'))
                                                <span class="text-danger">{{ $errors->first('start_vehicle_time') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="end_vehicle_date">End Sale Vehicle Date </label>
                                                    <input type="date" id="end_vehicle_date" value="{{$vehicles->end_vehicle_date ?? date('Y-m-d'); }}" readonly class="form-control"
                                                       name="end_vehicle_date" placeholder="" >

                                                </div>
                                                @if ($errors->has('end_vehicle_date'))
                                                <span class="text-danger">{{ $errors->first('end_vehicle_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="end_vehicle_time">End Sale Vehicle Time </label>
                                                    <input type="time" id="end_vehicle_time" class="form-control"
                                                       name="end_vehicle_time" value="{{ $liveselltime->end_time ?? ""}}" readonly placeholder="End Sale Vehicle Time" >

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
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="retail_price">Vehicle Retail Price </label>
                                                    <input type="number" id="retail_price" value="{{$vehicles->retail_price ?? old('retail_price')}}"  class="form-control"
                                                       name="retail_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('retail_price'))
                                                <span class="text-danger">{{ $errors->first('retail_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="clean_price">Vehicle Clean Price </label>
                                                    <input type="number" id="clean_price" value="{{$vehicles->clean_price ?? old('clean_price')}}"  class="form-control"
                                                       name="clean_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('clean_price'))
                                                <span class="text-danger">{{ $errors->first('clean_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="reserve_price">Vehicle Reserve Price </label>
                                                    <input type="number" id="reserve_price" value="{{$vehicles->reserve_price ?? old('reserve_price')}}"  class="form-control"
                                                       name="reserve_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('reserve_price'))
                                                <span class="text-danger">{{ $errors->first('reserve_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="average_price">Vehicle Average Price </label>
                                                    <input type="number" id="average_price" value="{{$vehicles->average_price ?? old('average_price')}}"  class="form-control"
                                                       name="average_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('average_price'))
                                                <span class="text-danger">{{ $errors->first('average_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="hidden_price">Vehicle Hidden Price </label>
                                                    <input type="number" id="hidden_price" value="{{$vehicles->hidden_price ?? old('hidden_price')}}"  class="form-control"
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
                @else
                <div class="col-12 d-flex justify-content-end">
              <span class="text text-danger">You Cant Make Any Changes Of Sold Vehicles</span>
                </div>
                @endif
            </div>

        </div>
    </section>

</form>
</div>
<script type="text/javascript">

document.getElementById("start_vehicle_date").addEventListener("change", function() {
    var input = this.value;
       
//     var date = new Date(input);
// var dd = String(date.getDate()+1).padStart(2, '0');
// var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
// var yyyy = date.getFullYear();

// date = mm + '/' + dd + '/' + yyyy;
// console.log(date)
// document.write(date);
// console.log(input);
$('#end_vehicle_date').val(input);
});
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgId = '#preview-'+$(input).attr('id');
                $(imgId).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
      }


      $("input[type='file']").change(function(){
        readURL(this);
      });
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
</script>
@endsection
