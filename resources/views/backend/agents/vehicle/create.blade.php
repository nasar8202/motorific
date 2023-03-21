
@extends('backend.agents.layouts.app')
@section('title','add wheel nut ')
@section('secton')
<style>
    .container {
          max-width: 1200px;
      }
  </style>
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                
                <p class="text-subtitle text-muted">Add Vehicle</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Add Vehicle</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="form-group col-md-4">
        <form class="form" method="GET" action="{{route('findVehicleinAgent')}}" >
            @csrf
        <input type="text" id="email-id-column" class="form-control"
            name="registeration" placeholder="Vehicle Registeration Number">
        </div>
        <div class="col-md-6 col-4">
            <button type="submit" class="btn btn-success">Find Vehicle</button>
        </div>
    </form>
        <br>
    <form class="form" method="post" action="{{route('StoreVehicleByAgent')}}" enctype="multipart/form-data">
        @csrf
    <section id="multiple-column-form">
        <div class="row align-items-center">
            <div class="col-md-6 col-6">
                
                </div> 

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Seller Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Seller Email</label>
                                            <input type="email" id="first-name-column" class="form-control"
                                                placeholder="Seller email" name="email" required value="{{old('email')}}">
                                        </div>
                                        @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Password</label>
                                            <input type="password" id="last-name-column" class="form-control"
                                                placeholder="password" name="password" required value="{{old('password')}}">
                                        </div>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Seller Name</label>
                                            <input type="text" id="city-column" class="form-control"
                                                placeholder="Enter seller name" required name="name" value="{{old('name')}}">
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Phone Number</label>
                                            <input type="number" id="country-floating" class="form-control"
                                                name="phone_number" placeholder="Phone number" required value="{{old('phone_number')}}">
                                        </div>
                                        @if ($errors->has('phone_number'))
                                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Post Code </label>
                                            <input type="text" id="city-column" class="form-control"
                                                placeholder="Enter Post Code" required name="post_code" value="{{old('post_code')}}">
                                        </div>
                                        @if ($errors->has('post_code'))
                                        <span class="text-danger">{{ $errors->first('post_code') }}</span>
                                    @endif
                                    </div>
                                    
                                </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Add Vehcile Information</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Vehicle Registartion Number</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Registartion Number" name="register_number" readonly value="{{$res->registrationNumber ?? old('register_number')}}">
                                        </div>
                                        @if ($errors->has('register_number'))
                                    <span class="text-danger">{{ $errors->first('register_number') }}</span>
                                @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Vehicle Name</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                placeholder="Vehicle Name" name="vehicle_name" readonly value="{{$res->make?? old('vehicle_name')}}">
                                        </div>
                                        @if ($errors->has('vehicle_name'))
                                        <span class="text-danger">{{ $errors->first('vehicle_name') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Vehicle Year</label>
                                            <input type="number" id="city-column" class="form-control"
                                                placeholder="Vehicle Year" name="vehicle_year" readonly value="{{$res->yearOfManufacture ?? old('vehicle_year')}}">
                                        </div>
                                        @if ($errors->has('vehicle_year'))
                                        <span class="text-danger">{{ $errors->first('vehicle_year') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Vehicle Color</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="vehicle_color" placeholder="Vehicle Color" readonly value="{{$res->colour ?? old('vehicle_color')}}">
                                        </div>
                                        @if ($errors->has('vehicle_color'))
                                        <span class="text-danger">{{ $errors->first('vehicle_color') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Vehicle Type</label>
                                            <input type="text" id="company-column" class="form-control"
                                                name="vehicle_type" placeholder="Vehicle Type" required value="{{old('vehicle_type')}}">
                                        </div>
                                        @if ($errors->has('vehicle_type'))
                                        <span class="text-danger">{{ $errors->first('vehicle_type') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Fuel type</label>
                                            <input type="text" id="" class="form-control"
                                                name="vehicle_tank" placeholder="Fuel type" readonly value="{{$res->fuelType ?? old('vehicle_tank')}}">
                                        </div>
                                        @if ($errors->has('vehicle_tank'))
                                        <span class="text-danger">{{ $errors->first('vehicle_tank') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Vehicle Mileage</label>
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="vehicle_mileage" placeholder="Vehicle Mileage" required value="{{old('vehicle_mileage')}}">
                                        </div>
                                        @if ($errors->has('vehicle_mileage'))
                                        <span class="text-danger">{{ $errors->first('vehicle_mileage') }}</span>
                                    @endif
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Vehicle Price</label>
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="vehicle_price" placeholder="Vehicle Price" required value="{{old('vehicle_price')}}">
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
                                            <option @if (old('dashboard') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option value="Torn/Ripped"
                                                @if (old('dashboard') == 'Torn/Ripped') selected="selected" @endif>Torn /
                                                Ripped (T)</option>
                                            <option @if (old('dashboard') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('dashboard') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('dashboard') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('dashboard') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('dashboard'))
                                        <span class="text-danger">{{ $errors->first('dashboard') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Passenger Side Interior</h6>

                                    <div class="form-group">
                                        <select class="form-select" name="passenger_side_interior"
                                            id="basicSelect">
                                            <option disabled selected>Select passenger side interior</option>
                                            <option @if (old('passenger_side_interior') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('passenger_side_interior') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('passenger_side_interior') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('passenger_side_interior') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('passenger_side_interior') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('passenger_side_interior') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('passenger_side_interior'))
                                        <span
                                            class="text-danger">{{ $errors->first('passenger_side_interior') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Driver Side Interior</h6>

                                    <div class="form-group">
                                        <select class="form-select" name="driver_side_interior" id="basicSelect">
                                            <option disabled selected>Select driver side interior</option>
                                            <option @if (old('driver_side_interior') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('driver_side_interior') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('driver_side_interior') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('driver_side_interior') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('driver_side_interior') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('driver_side_interior') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('driver_side_interior'))
                                        <span
                                            class="text-danger">{{ $errors->first('driver_side_interior') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Floor</h6>

                                    <div class="form-group">
                                        <select class="form-select" name="floor" id="basicSelect">
                                            <option disabled selected>Select floor </option>
                                            <option @if (old('floor') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('floor') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('floor') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('floor') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('floor') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('floor') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
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
                                            <option @if (old('ceiling') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('ceiling') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('ceiling') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('ceiling') == 'Dirty') selected="selected" @endif
                                                value="Dirty" selected>Dirty (D)</option>
                                            <option @if (old('ceiling') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('ceiling') == 'Bumt') selected="selected" @endif
                                                value="Bumt" selected>Bumt (B)</option>
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
                                            <option @if (old('boot') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('boot') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('boot') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('boot') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('boot') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('boot') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
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
                                            <option @if (old('rear_windscreen') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('rear_windscreen') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('rear_windscreen') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('rear_windscreen') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('rear_windscreen') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('rear_windscreen') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
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
                                            <option @if (old('passenger_seat') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('passenger_seat') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('passenger_seat') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('passenger_seat') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('passenger_seat') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('passenger_seat') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
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

                                            <option @if (old('driver_seat') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('driver_seat') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('driver_seat') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('driver_seat') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('driver_seat') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('driver_seat') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
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
                                            <option @if (old('rear_seats') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('rear_seats') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('rear_seats') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('rear_seats') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('rear_seats') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('rear_seats') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('rear_seats'))
                                        <span class="text-danger">{{ $errors->first('rear_seats') }}</span>
                                    @endif
                                </div>

                                
                                <div class="col-md-6 mb-4">
                                    <h6>Passenger Back Door</h6>

                                    <div class="form-group">
                                        <select class="form-select" name="passenger_back_door" id="basicSelect">
                                            <option disabled selected>Select Passenger Back Door </option>
                                            <option @if (old('passenger_back_door') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('passenger_back_door') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('passenger_back_door') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('passenger_back_door') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('passenger_back_door') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('passenger_back_door') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
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
                                            <option disabled selected>Select Driver Back Door </option>
                                            <option @if (old('driver_back_door') == 'Stained') selected="selected" @endif
                                                value="Stained">Stained (ST)</option>
                                            <option @if (old('driver_back_door') == 'Torn/Ripped') selected="selected" @endif
                                                value="Torn/Ripped">Torn / Ripped (T)</option>
                                            <option @if (old('driver_back_door') == 'Warn') selected="selected" @endif
                                                value="Warn">Warn (W)</option>
                                            <option @if (old('driver_back_door') == 'Dirty') selected="selected" @endif
                                                value="Dirty">Dirty (D)</option>
                                            <option @if (old('driver_back_door') == 'Broken/Damage') selected="selected" @endif
                                                value="Broken/Damage">Broken / Damage (BD)</option>
                                            <option @if (old('driver_back_door') == 'Bumt') selected="selected" @endif
                                                value="Bumt">Bumt (B)</option>
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
                                            <option @if (old('front_door_left') == 'Dent') selected="selected" @endif
                                                value="Dent">Dent (D)</option>
                                            <option @if (old('front_door_left') == 'Broken') selected="selected" @endif
                                                value="Broken">Broken (B)</option>
                                            <option @if (old('front_door_left') == 'Chips') selected="selected" @endif
                                                value="Chips">Chips (CH)</option>
                                            <option @if (old('front_door_left') == 'Crack/Rust') selected="selected" @endif
                                                value="Crack/Rust">Crack / Rust (CR)</option>
                                            <option @if (old('front_door_left') == 'Scratch') selected="selected" @endif
                                                value="Scratch">Scratch (S)</option>
                                            <option @if (old('front_door_left') == 'Wheel Scuff') selected="selected" @endif
                                                value="Wheel Scuff">Wheel Scuff (WS)</option>
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
                                            <option @if (old('back_door_left') == 'Dent') selected="selected" @endif
                                                value="Dent">Dent (D)</option>
                                            <option @if (old('back_door_left') == 'Broken') selected="selected" @endif
                                                value="Broken">Broken (B)</option>
                                            <option @if (old('back_door_left') == 'Chips') selected="selected" @endif
                                                value="Chips">Chips (CH)</option>
                                            <option @if (old('back_door_left') == 'Crack/Rust') selected="selected" @endif
                                                value="Crack/Rust">Crack / Rust (CR)</option>
                                            <option @if (old('back_door_left') == 'Scratch') selected="selected" @endif
                                                value="Scratch">Scratch (S)</option>
                                            <option @if (old('back_door_left') == 'Wheel Scuff') selected="selected" @endif
                                                value="Wheel Scuff">Wheel Scuff (WS)</option>
                                        </select>
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
                                            <option @if (old('front_door_right') == 'Dent') selected="selected" @endif
                                                value="Dent">Dent (D)</option>
                                            <option @if (old('front_door_right') == 'Broken') selected="selected" @endif
                                                value="Broken">Broken (B)</option>
                                            <option @if (old('front_door_right') == 'Chips') selected="selected" @endif
                                                value="Chips">Chips (CH)</option>
                                            <option @if (old('front_door_right') == 'Crack/Rust') selected="selected" @endif
                                                value="Crack/Rust">Crack / Rust (CR)</option>
                                            <option @if (old('front_door_right') == 'Scratch') selected="selected" @endif
                                                value="Scratch">Scratch (S)</option>
                                            <option @if (old('front_door_right') == 'Wheel Scuff') selected="selected" @endif
                                                value="Wheel Scuff">Wheel Scuff (WS)</option>
                                        </select>
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
                                            <option @if (old('back_door_right') == 'Dent') selected="selected" @endif
                                                value="Dent">Dent (D)</option>
                                            <option @if (old('back_door_right') == 'Broken') selected="selected" @endif
                                                value="Broken">Broken (B)</option>
                                            <option @if (old('back_door_right') == 'Chips') selected="selected" @endif
                                                value="Chips">Chips (CH)</option>
                                            <option @if (old('back_door_right') == 'Crack/Rust') selected="selected" @endif
                                                value="Crack/Rust">Crack / Rust (CR)</option>
                                            <option @if (old('back_door_right') == 'Scratch') selected="selected" @endif
                                                value="Scratch">Scratch (S)</option>
                                            <option @if (old('back_door_right') == 'Wheel Scuff') selected="selected" @endif
                                                value="Wheel Scuff">Wheel Scuff (WS)</option>
                                        </select>
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
                                            <option @if (old('top') == 'Dent') selected="selected" @endif
                                                value="Dent">Dent (D)</option>
                                            <option @if (old('top') == 'Broken') selected="selected" @endif
                                                value="Broken">Broken (B)</option>
                                            <option @if (old('top') == 'Chips') selected="selected" @endif
                                                value="Chips">Chips (CH)</option>
                                            <option @if (old('top') == 'Crack/Rust') selected="selected" @endif
                                                value="Crack/Rust">Crack / Rust (CR)</option>
                                            <option @if (old('top') == 'Scratch') selected="selected" @endif
                                                value="Scratch">Scratch (S)</option>
                                            <option @if (old('top') == 'Wheel Scuff') selected="selected" @endif
                                                value="Wheel Scuff">Wheel Scuff (WS)</option>
                                        </select>
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
                                            <option @if (old('bonut') == 'Dent') selected="selected" @endif
                                                value="Dent">Dent (D)</option>
                                            <option @if (old('bonut') == 'Broken') selected="selected" @endif
                                                value="Broken">Broken (B)</option>
                                            <option @if (old('bonut') == 'Chips') selected="selected" @endif
                                                value="Chips">Chips (CH)</option>
                                            <option @if (old('bonut') == 'Crack/Rust') selected="selected" @endif
                                                value="Crack/Rust">Crack / Rust (CR)</option>
                                            <option @if (old('bonut') == 'Scratch') selected="selected" @endif
                                                value="Scratch">Scratch (S)</option>
                                            <option @if (old('bonut') == 'Wheel Scuff') selected="selected" @endif
                                                value="Wheel Scuff">Wheel Scuff (WS)</option>
                                        </select>
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
                                            <option @if (old('front') == 'Dent') selected="selected" @endif
                                                value="Dent">Dent (D)</option>
                                            <option @if (old('front') == 'Broken') selected="selected" @endif
                                                value="Broken">Broken (B)</option>
                                            <option @if (old('front') == 'Chips') selected="selected" @endif
                                                value="Chips">Chips (CH)</option>
                                            <option @if (old('front') == 'Crack/Rust') selected="selected" @endif
                                                value="Crack/Rust">Crack / Rust (CR)</option>
                                            <option @if (old('front') == 'Scratch') selected="selected" @endif
                                                value="Scratch">Scratch (S)</option>
                                            <option @if (old('front') == 'Wheel Scuff') selected="selected" @endif
                                                value="Wheel Scuff">Wheel Scuff (WS)</option>
                                        </select>
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
                                            <option @if (old('back') == 'Dent') selected="selected" @endif
                                                value="Dent">Dent (D)</option>
                                            <option @if (old('back') == 'Broken') selected="selected" @endif
                                                value="Broken">Broken (B)</option>
                                            <option @if (old('back') == 'Chips') selected="selected" @endif
                                                value="Chips">Chips (CH)</option>
                                            <option @if (old('back') == 'Crack/Rust') selected="selected" @endif
                                                value="Crack/Rust">Crack / Rust (CR)</option>
                                            <option @if (old('back') == 'Scratch') selected="selected" @endif
                                                value="Scratch">Scratch (S)</option>
                                            <option @if (old('back') == 'Wheel Scuff') selected="selected" @endif
                                                value="Wheel Scuff">Wheel Scuff (WS)</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('back'))
                                        <span class="text-danger">{{ $errors->first('back') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6>Windscreen</h6>

                                    <div class="form-group">
                                        <select class="form-select" name="wind_screen" id="basicSelect">
                                            <option disabled selected>Select back </option>
                                            <option @if (old('wind_screen') == 'Dent') selected="selected" @endif
                                                value="Dent">Dent (D)</option>
                                            <option @if (old('wind_screen') == 'Broken') selected="selected" @endif
                                                value="Broken">Broken (B)</option>
                                            <option @if (old('wind_screen') == 'Chips') selected="selected" @endif
                                                value="Chips">Chips (CH)</option>
                                            <option @if (old('wind_screen') == 'Crack/Rust') selected="selected" @endif
                                                value="Crack/Rust">Crack / Rust (CR)</option>
                                            <option @if (old('wind_screen') == 'Scratch') selected="selected" @endif
                                                value="Scratch">Scratch (S)</option>
                                            <option @if (old('wind_screen') == 'Wheel Scuff') selected="selected" @endif
                                                value="Wheel Scuff">Wheel Scuff (WS)</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('wind_screen'))
                                        <span class="text-danger">{{ $errors->first('wind_screen') }}</span>
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
                                        <select name="vehicle_feature[]"
                                            class="choices form-select multiple-remove" multiple="multiple">

                                            @foreach ($VehicleFeatures as $VehicleFeature)
                                                <option value="{{ $VehicleFeature->id }}">
                                                    {{ $VehicleFeature->title }}</option>
                                            @endforeach


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

                                            @foreach ($vehicleCategories as $vehicleCategorie)
                                                <option
                                                    {{ old('vehicle_category') == $vehicleCategorie->id ? 'selected' : '' }}
                                                    value="{{ $vehicleCategorie->id }}">
                                                    {{ $vehicleCategorie->title }}</option>
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
                                            @foreach ($SeatMaterials as $SeatMaterial)
                                                <option
                                                    {{ old('seat_material') == $SeatMaterial->id ? 'selected' : '' }}
                                                    value="{{ $SeatMaterial->id }}">{{ $SeatMaterial->title }}
                                                </option>
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
                                            @foreach ($NumberOfKeys as $NumberOfKey)
                                                <option
                                                    {{ old('number_of_keys') == $NumberOfKey->id ? 'selected' : '' }}
                                                    value="{{ $NumberOfKey->id }}">
                                                    {{ $NumberOfKey->number_of_key }}</option>
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
                                            @foreach ($ToolPacks as $ToolPack)
                                                <option {{ old('tool_pack') == $ToolPack->id ? 'selected' : '' }}
                                                    value="{{ $ToolPack->id }}">{{ $ToolPack->title }}
                                                </option>
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
                                            @foreach ($LockingWheelNuts as $LockingWheelNut)
                                                <option
                                                    {{ old('wheel_nut') == $LockingWheelNut->id ? 'selected' : '' }}
                                                    value="{{ $LockingWheelNut->id }}">
                                                    {{ $LockingWheelNut->title }}</option>
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
                                            @foreach ($Smokings as $Smoking)
                                                <option {{ old('smoking') == $Smoking->id ? 'selected' : '' }}
                                                    value="{{ $Smoking->id }}">{{ $Smoking->title }}
                                                </option>
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
                                            @foreach ($VCLogBooks as $VCLogBook)
                                                <option {{ old('logbook') == $VCLogBook->id ? 'selected' : '' }}
                                                    value="{{ $VCLogBook->id }}">{{ $VCLogBook->title }}
                                                </option>
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
                                        <input type="text" class="form-control" name="location"
                                            placeholder="Enter Your Location" id="search" value="{{ old('location') }}">
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
                                            @foreach ($VehicleOwners as $VehicleOwner)
                                                <option
                                                    {{ old('vehicle_owner') == $VehicleOwner->id ? 'selected' : '' }}
                                                    value="{{ $VehicleOwner->id }}">
                                                    {{ $VehicleOwner->title }}</option>
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
                                            @foreach ($PrivatePlates as $PrivatePlate)
                                                <option
                                                    {{ old('private_plate') == $PrivatePlate->id ? 'selected' : '' }}
                                                    value="{{ $PrivatePlate->id }}">
                                                    {{ $PrivatePlate->title }}</option>
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
                                            @foreach ($Finances as $Finance)
                                                <option {{ old('finance') == $Finance->id ? 'selected' : '' }}
                                                    value="{{ $Finance->id }}">{{ $Finance->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('finance'))
                                        <span class="text-danger">{{ $errors->first('finance') }}</span>
                                    @endif
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <h6>Vehicle History</h6>

                                        <div class="form-group">
                                            <select class="form-select" name="VehicleHistory" id="basicSelect">
                                                <option disabled selected>Select Vehicle History</option>
                                                @foreach($VehicleHistories as $VehicleHistory)
                                                <option value="{{$VehicleHistory->id}}">{{$VehicleHistory->title}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('VehicleHistory'))
                                        <span class="text-danger">{{ $errors->first('VehicleHistory') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">House Name And Number</label>
                                            <input type="text" class="form-control" name="HouseName"
                                                placeholder="Enter Your House Name And Number"  value="{{ old('HouseName') }}">
                                                 
                                        </div>
                                        @if ($errors->has('HouseName'))
                                            <span class="text-danger">{{ $errors->first('HouseName') }}</span>
                                        @endif
                                    </div>
                                    {{-- <div class="col-md-6 col-12">
                                        <h6>Interior</h6>
                                        <div class="form-group">
                                            
                                            <input type="text"  class="form-control"
                                                name="interior" placeholder="Eg : Full Leather, etc">
                                        </div>
                                        @if ($errors->has('interior'))
                                        <span class="text-danger">{{ $errors->first('interior') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Body Type</h6>
                                        <div class="form-group">
                                           
                                            <input type="text"  class="form-control"
                                                name="body_type" placeholder="Eg : Sedan,Coupe,etc">
                                        </div>
                                        @if ($errors->has('body_type'))
                                        <span class="text-danger">{{ $errors->first('body_type') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Engine Size</h6>
                                        <div class="form-group">
                                           
                                            <input type="text"  class="form-control"
                                                name="engine_size" placeholder="Eg : 2700cc,3500cc,etc">
                                        </div>
                                        @if ($errors->has('engine_size'))
                                        <span class="text-danger">{{ $errors->first('engine_size') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>HPI history check</h6>
                                        <div class="form-group">
                                            
                                            <input type="text"  class="form-control"
                                                name="hpi" placeholder="Enter history check">
                                        </div>
                                        @if ($errors->has('hpi'))
                                        <span class="text-danger">{{ $errors->first('hpi') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>VIN</h6>
                                        <div class="form-group">
                                            
                                            <input type="text"  class="form-control"
                                                name="vin" placeholder="Eg : ZFF82YNC000247970,etc">
                                        </div>
                                        @if ($errors->has('vin'))
                                        <span class="text-danger">{{ $errors->first('vin') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>First Registeration Date</h6>
                                        <div class="form-group">
                                            
                                            <input type="date"  class="form-control"
                                                name="register_date" placeholder="">
                                        </div>
                                        @if ($errors->has('register_date'))
                                        <span class="text-danger">{{ $errors->first('register_date') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Keeper Start Date</h6>
                                        <div class="form-group">
                
                                            <input type="date"  class="form-control"
                                                name="keeper_date" placeholder="">
                                        </div>
                                        @if ($errors->has('keeper_date'))
                                        <span class="text-danger">{{ $errors->first('keeper_date') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Last MOT Date</h6>
                                        <div class="form-group">
                
                                            <input type="date"  class="form-control"
                                                name="mot_date" placeholder="">
                                        </div>
                                        @if ($errors->has('mot_date'))
                                        <span class="text-danger">{{ $errors->first('mot_date') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Previous Owners</h6>
                                        <div class="form-group">
                                            
                                            <input type="number"  class="form-control"
                                                name="previous_owner" placeholder="how many previous owners are">
                                        </div>
                                        @if ($errors->has('previous_owner'))
                                        <span class="text-danger">{{ $errors->first('previous_owner') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Seller Keeping Plate</h6>
                                        <div class="form-group">
                                            
                                            <input type="text"  class="form-control"
                                                name="keeping_plate" placeholder="yes or no">
                                        </div>
                                        @if ($errors->has('keeping_plate'))
                                        <span class="text-danger">{{ $errors->first('keeping_plate') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h6>Additional Information</h6>
                                        <div class="form-group">
                                            
                                            <input type="text"  class="form-control"
                                                name="additional" placeholder="Enter Description">
                                        </div>
                                        @if ($errors->has('additional'))
                                        <span class="text-danger">{{ $errors->first('additional') }}</span>
                                    @endif
                                    </div> --}}


                                </div>

                                {{-- <div class="col-md-6 mb-4">
                                    <h6>Vehicle History</h6>

                                    <div class="form-group">
                                        <select class="form-select" name="VehicleHistory" id="basicSelect">
                                            <option disabled selected>Select Vehicle History</option>
                                            @foreach ($VehicleHistories as $VehicleHistory)
                                                <option
                                                    {{ old('VehicleHistory') == $VehicleHistory->id ? 'selected' : '' }}
                                                    value="{{ $VehicleHistory->id }}">
                                                    {{ $VehicleHistory->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('VehicleHistory'))
                                        <span class="text-danger">{{ $errors->first('VehicleHistory') }}</span>
                                    @endif
                                </div> --}}
                                {{-- <div class="col-md-6 col-12">
                                <h6>Interior</h6>
                                <div class="form-group">
                                    
                                    <input type="text"  class="form-control"
                                        name="interior" placeholder="Eg : Full Leather, etc">
                                </div>
                                @if ($errors->has('interior'))
                                <span class="text-danger">{{ $errors->first('interior') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>Body Type</h6>
                                <div class="form-group">
                                   
                                    <input type="text"  class="form-control"
                                        name="body_type" placeholder="Eg : Sedan,Coupe,etc">
                                </div>
                                @if ($errors->has('body_type'))
                                <span class="text-danger">{{ $errors->first('body_type') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>Engine Size</h6>
                                <div class="form-group">
                                   
                                    <input type="text"  class="form-control"
                                        name="engine_size" placeholder="Eg : 2700cc,3500cc,etc">
                                </div>
                                @if ($errors->has('engine_size'))
                                <span class="text-danger">{{ $errors->first('engine_size') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>HPI history check</h6>
                                <div class="form-group">
                                    
                                    <input type="text"  class="form-control"
                                        name="hpi" placeholder="Enter history check">
                                </div>
                                @if ($errors->has('hpi'))
                                <span class="text-danger">{{ $errors->first('hpi') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>VIN</h6>
                                <div class="form-group">
                                    
                                    <input type="text"  class="form-control"
                                        name="vin" placeholder="Eg : ZFF82YNC000247970,etc">
                                </div>
                                @if ($errors->has('vin'))
                                <span class="text-danger">{{ $errors->first('vin') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>First Registeration Date</h6>
                                <div class="form-group">
                                    
                                    <input type="date"  class="form-control"
                                        name="register_date" placeholder="">
                                </div>
                                @if ($errors->has('register_date'))
                                <span class="text-danger">{{ $errors->first('register_date') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>Keeper Start Date</h6>
                                <div class="form-group">
        
                                    <input type="date"  class="form-control"
                                        name="keeper_date" placeholder="">
                                </div>
                                @if ($errors->has('keeper_date'))
                                <span class="text-danger">{{ $errors->first('keeper_date') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>Last MOT Date</h6>
                                <div class="form-group">
        
                                    <input type="date"  class="form-control"
                                        name="mot_date" placeholder="">
                                </div>
                                @if ($errors->has('mot_date'))
                                <span class="text-danger">{{ $errors->first('mot_date') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>Previous Owners</h6>
                                <div class="form-group">
                                    
                                    <input type="number"  class="form-control"
                                        name="previous_owner" placeholder="how many previous owners are">
                                </div>
                                @if ($errors->has('previous_owner'))
                                <span class="text-danger">{{ $errors->first('previous_owner') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>Seller Keeping Plate</h6>
                                <div class="form-group">
                                    
                                    <input type="text"  class="form-control"
                                        name="keeping_plate" placeholder="yes or no">
                                </div>
                                @if ($errors->has('keeping_plate'))
                                <span class="text-danger">{{ $errors->first('keeping_plate') }}</span>
                            @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <h6>Additional Information</h6>
                                <div class="form-group">
                                    
                                    <input type="text"  class="form-control"
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
                                            <input type="text"  class="form-control"
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
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                               
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
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
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
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
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
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
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
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
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
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
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
                                                name="service_record" placeholder="Enter Service record">
                                        </div>
                                        @if ($errors->has('service_record'))
                                        <span class="text-danger">{{ $errors->first('service_record') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Main dealer services</h6>
                                        <div class="form-group">
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="main_dealer" placeholder="Enter Main dealer services">
                                        </div>
                                        @if ($errors->has('main_dealer'))
                                        <span class="text-danger">{{ $errors->first('main_dealer') }}</span>
                                    @endif
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Independent dealer service</h6>
                                        <div class="form-group">
                                            <input type="number" id="email-id-column" class="form-control"
                                                name="independent_dealer" placeholder="Enter Independent dealer service">
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
        <div class="container-fluid">
            <div class="row match-height">
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Pictures</h4>
                        </div>
                     <div class="row align-items-center">
    
                        <div class="col-md-6">
                            <img src="{{URL::asset('/frontend/seller/assets/image/add-p-front.png')}}" id="preview-image1"  width="250px" height="250px" class="rounded mx-auto d-block" >
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 px-3">
                                <label for="formFile" class="form-label">Add Picture In This Type</label>
                                <input class="form-control" type="file" name="image1" id="image1" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            @if ($errors->has('image1'))
                            <span class="text-danger">{{ $errors->first('image1') }}</span>
                        @endif
                        </div>
                     </div>
                     <br>
                     <div class="row  align-items-center">
    
                        <div class="col-md-6">
                            <img src="{{URL::asset('/frontend/seller/assets/image/add-p-back.png')}} " id="preview-image2"  width="250px" height="250px" class="rounded mx-auto d-block">
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 px-3">
                                <label for="formFile" class="form-label">Add Picture In This Type</label>
                                <input class="form-control" type="file" name="image2" id="image2" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            @if ($errors->has('image2'))
                            <span class="text-danger">{{ $errors->first('image2') }}</span>
                        @endif
                        </div>
                     </div>
                     <br>
                     <div class="row align-items-center">
    
                        <div class="col-md-6">
                            <img src="{{URL::asset('/frontend/seller/assets/image/add-p-back-corner.png')}} " id="preview-image3"  width="250px" height="250px" class="rounded mx-auto d-block">
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 px-3">
                                <label for="formFile" class="form-label">Add Picture In This Type</label>
                                <input class="form-control" type="file" name="image3"   id="image3" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            @if ($errors->has('image3'))
                            <span class="text-danger">{{ $errors->first('image3') }}</span>
                        @endif
                        </div>
                     </div>
                     <br>
                     <div class="row align-items-center">
    
                        <div class="col-md-6">
                            <img src="{{URL::asset('/frontend/seller/assets/image/add-p-interior.png')}}" id="preview-image4"  width="250px" height="250px" class="rounded mx-auto d-block">
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 px-3">
                                <label for="formFile" class="form-label">Add Picture In This Type</label>
                                <input class="form-control" type="file" name="image4"  id="image4" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            @if ($errors->has('image4'))
                            <span class="text-danger">{{ $errors->first('image4') }}</span>
                        @endif
    
                        </div>
                     </div>
                     <br>
                     <div class="row align-items-center">
    
                        <div class="col-md-6">
                            <img src="{{URL::asset('/frontend/seller/assets/image/add-p-dashboard.png')}} " id="preview-image5"  width="250px" height="250px" class="rounded mx-auto d-block mb-3">
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 px-3">
                                <label for="formFile" class="form-label">Add Picture In This Type</label>
                                <input class="form-control" type="file" id="image5"  name="image5" accept="image/png, image/jpeg, image/jpg"0>
                            </div>
                            @if ($errors->has('image5'))
                            <span class="text-danger">{{ $errors->first('image5') }}</span>
                        @endif
                        </div>
                     </div>
    
                    </div>
    
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit"
                            class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset"
                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
    
            </div>
        </div>
    </section>
</form>
</div>
<script type="text/javascript">

 function readURL(input) {
  
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imgId = '#preview-' + $(input).attr('id');
                    $(imgId).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $("input[type='file']").change(function() {
            readURL(this);
        });
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][title]" placeholder="Enter LogBook Question" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Remove </button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
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
</script>
@endsection
