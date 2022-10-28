
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
                <h3>Vehicle</h3>
                <p class="text-subtitle text-muted">View All Vehicles List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Vehicles List
                <a href="{{ route('createVehicleForm') }}"><span class="badge bg-primary" style="float: right">Create Vehicle</span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Registartion Number</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Year</th>
                            <th>Vehicle Type</th>
                            <th>Vehicle Tank</th>
                            <th>Vehicle Price</th>
                            <th>Image</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($vehicles as $vehicle)
                        <tr>
                          
                            <td>{{ $i++ }}</td>
                            <td>{{ $vehicle->vehicle_registartion_number}}</td>
                            <td>{{ $vehicle->vehicle_name}}</td>
                            <td>{{ $vehicle->vehicle_year}}</td>
                            <td>{{ $vehicle->vehicle_type}}</td>
                            <td>{{ $vehicle->vehicle_tank}}</td>
                            <td>{{ $vehicle->vehicle_price}}</td>
                            <td>
                                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->front ?? "") }}" width="100" height="100">
                            </td>
                            <td>
                                <a href="{{ route('editVehicle',$vehicle->id) }}"><span class="badge bg-success">View Details</span></a>
                                <a href="{{ route('deleteVehicle',$vehicle->id) }}"><span class="badge bg-danger">Delete</span></a>
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
