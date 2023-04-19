
@extends('backend.admin.layouts.app')
@section('title','view Sold Vehicles  List')
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
                <h3>Sold Vehicles</h3>
                <p class="text-subtitle text-muted">View Sold Vehicles List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sold Vehicles </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            
            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Registartion Number</th>
                        <th>Vehicle Name</th>
                        <th>Vehicle Year</th>
                        <th>Vehicle Type</th>
                        <th>Fuel type</th>
                        <!-- <th>Vehicle Price</th> -->
                        <th>Registered Date Time</th>
                        <th>Sold Date Time</th>
                        <th>Status</th>
                        
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($soldVehicles as $vehicle)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $vehicle->vehicle_registartion_number}}</td>
                            <td>{{ $vehicle->vehicle_name}}</td>
                            <td>{{ $vehicle->vehicle_year}}</td>
                            <td>{{ $vehicle->vehicle_type}}</td>
                            <td>{{ $vehicle->vehicle_tank}}</td>
                            <!-- <td>{{ $vehicle->vehicle_price}}</td> -->
                            <td>{{ $vehicle->created_at}}</td>
                            <td>{{ $vehicle->updated_at}}</td>
                            @if($vehicle->vehicle_availability == 'Sold')
                            <td class=""><span class="badge badge-danger"> Sold </span></td>
                            @endif
                            
                            <td>
                                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->front) }}" width="100" height="100">
                            </td>
                            
                            <td>
                                
                                @if($vehicle->status == 0)
                                <a href="{{ route('approveSellerVehicle',$vehicle->id) }}"><span class="badge badge-success w-100 my-1">Approve</span></a>
                                @elseif($vehicle->status == 1)
                                <a href="{{ route('deactivateSellerVehicle',$vehicle->id) }}"><span class="badge badge-danger my-1 w-100">Deactivate</span></a>
                                
                                @endif
                                <a href="{{ route('editVehicle',$vehicle->id) }}"><span class="badge badge-success w-100">View Details</span></a>
                                <!-- <a href="{{ route('deleteVehicle',$vehicle->id) }}"><span class="badge badge-danger w-100 my-1">Delete</span></a> -->
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
