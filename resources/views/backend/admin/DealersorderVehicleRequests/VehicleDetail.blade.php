
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
                <h3>Orderd Vehicles Details</h3>
                <p class="text-subtitle text-muted">Orderd  Vehicles Details </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orderd Vehicle Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
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
                            
                            <td>{{ $vehicles->vehicle_price}} <i class="fa fa-check-circle" aria-hidden="true" style="color:#1bc002;"></i></td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>

            <div class="card-body table_wraper">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>Vehicle Year</th>
                            <th>Vehicle Color</th>
                            <th>Fuel type</th>
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

            <div class="card-body table_wraper">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>keys</th>
                            <th>V5 status</th>
                            <th>origin</th>
                            <th>interior</th>
                                                   </tr>
                    </thead>
                    <tbody>
                        
                        <tr>

                            <td>{{ $vehicles->DealerVehicleHistory->keys}}</td>
                            <td>{{ $vehicles->DealerVehicleHistory->v5_status}}</td>
                            
                            <td>{{ $vehicles->DealerVehicleHistory->origin}}</td>
                            
                            <td>{{ $vehicles->DealerVehicleHistory->interior}}</td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>
        </div>
<div class="container-fluid">
    <div class="row car_img_wraper">
        <h5>Exterior Images</h5>
        @forelse($vehicles->DealerVehicleExterior as $images)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid" src="{{ asset('uploads/dealerVehicles/exterior/'.$images->exterior_image) }}" >
                            
        </div>
        @empty<h5>No Image Found</h5>
        @endforelse
     
    </div>
    <div class="row car_img_wraper">
        <h5>Interior Images</h5>
        @forelse($vehicles->DealerVehicleInterior as $imagesinterior)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid" src="{{ asset('uploads/dealerVehicles/interior/'.$imagesinterior->interior_image) }}" >
                            
        </div>
        @empty<h5>No Image Found</h5>
        @endforelse
      
       
    </div>
    </div>

    </section>
</div>
@endsection
