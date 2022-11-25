
@extends('backend.admin.layouts.app')
@section('title','view Seat Material List')
@section('secton')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Vehicles Details</h3>
                <p class="text-subtitle text-muted"> Vehicles Details </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vehicle Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Vehicle Details
                <a href="{{ route('approveVehicle',$vehicles->id) }}"><span class="btn btn-success" style="float: right">Approve This Vehicle</span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Registartion Number</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Type</th>
                            <th>Vehicle Price</th>
                                                   </tr>
                    </thead>
                    <tbody>
                        
                        <tr>

                            <td>{{ $vehicles->vehicle_registartion_number}}</td>
                            <td>{{ $vehicles->vehicle_name}}</td>
                            
                            <td>{{ $vehicles->vehicle_type}}</td>
                            
                            <td>{{ $vehicles->vehicle_price}} <i class="fa-solid fa-check"></i></td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Vehicle Year</th>
                            <th>Vehicle Color</th>
                            <th>Vehicle Tank</th>
                            <th>Previous Owner</th>
                            <th>Vehicle Milage</th>
                                                   </tr>
                    </thead>
                    <tbody>
                        
                        <tr>

                            <td>{{ $vehicles->vehicle_year}}</td>
                            <td>{{ $vehicles->vehicle_color}}</td>
                            
                            <td>{{ $vehicles->vehicle_tank}}</td>
                            
                            <td>{{ $vehicles->previous_owners}}</td>
                            <td>{{ $vehicles->vehicle_mileage}}</td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Body Type</th>
                            <th>Engine Size</th>
                            <th>First Regidteration Date</th>
                            <th>Location</th>
                                                   </tr>
                    </thead>
                    <tbody>
                        
                        <tr>

                            <td>{{ $vehicles->vehicleInformation->body_type}}</td>
                            <td>{{ $vehicles->vehicleInformation->engine_size}}</td>
                            
                            <td>{{ $vehicles->vehicleInformation->first_registered}}</td>
                            
                            <td>{{ $vehicles->vehicleInformation->location}}</td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>
        </div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5>Front Picture</h5>
            <img class="img-fluid" src="{{ asset('/vehicles/vehicles_images/'.$vehicles->VehicleImage->front) }}" >
                            
        </div>
        <div class="col-md-4">
            <h5>Corner Picture</h5>
            <img class="img-fluid" src="{{ asset('/vehicles/vehicles_images/'.$vehicles->VehicleImage->passenger_rare_side_corner) }}"  >
                            
        </div>
        <div class="col-md-4">
            <h5>Back Picture</h5>
            <img class="img-fluid" src="{{ asset('/vehicles/vehicles_images/'.$vehicles->VehicleImage->driver_rare_side_corner) }}"  >
                            
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h5>Interior Picture</h5>
            <img class="img-fluid" src="{{ asset('/vehicles/vehicles_images/'.$vehicles->VehicleImage->interior_front) }}" >
                            
        </div>
        <div class="col-md-4">
            <h5>Side Picture</h5>
            <img class="img-fluid" src="{{ asset('/vehicles/vehicles_images/'.$vehicles->VehicleImage->dashboard) }}"  >
                            
        </div>
       
    </div>
    </div>

    </section>
</div>
@endsection
