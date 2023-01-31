
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
                <h3>Dealer Vehicle</h3>
                <p class="text-subtitle text-muted">View Dealer Vehicle List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dealer Vehicle</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Dealer Vehicle
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data vehicle_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Registartion Number</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Year</th>
                            <th>Vehicle Type</th>
                            <th>Vehicle Tank</th>
                            <th>Vehicle Price</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($DealerVehicles as $DealerVehicle)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $DealerVehicle->vehicle_registartion_number}}</td>
                            <td>{{ $DealerVehicle->vehicle_name}}</td>
                            <td>{{ $DealerVehicle->vehicle_year}}</td>
                            <td>{{ $DealerVehicle->vehicle_type}}</td>
                            <td>{{ $DealerVehicle->vehicle_tank}}</td>
                            <td>{{ $DealerVehicle->vehicle_price}}</td>
                            @if($DealerVehicle->status == 0)
                            <td class=""><span class="badge badge-info"> Pending </span></td>
                            @elseif($DealerVehicle->status == 1)
                            <td class=""><span class="badge badge-success"> Accepted </span></td>
                            @else
                            <td class=""><span class="badge badge-danger"> Deactivate </span></td>
                            @endif
                            
                            <td>
                                <img src="{{ asset('/uploads/dealerVehicles/exterior/'.$DealerVehicle->DealerVehicleExterior[0]->exterior_image) }}" width="100" height="100">
                            </td>
                            <td>
                                <a href="{{ route('viewDealerVehicleDetail',$DealerVehicle->id) }}" class="action_btn"><span class="badge bg-success">View Details</span></a>
                                <a href="{{ route('deleteDealerVehicle',$DealerVehicle->id) }}" class="action_btn"><span class="badge bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        @empty
                        <td>no data found</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
