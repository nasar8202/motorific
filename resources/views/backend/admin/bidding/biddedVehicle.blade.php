
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
                            <th>Image</th>
                            <th>Status</th>
                            <th>Total Bids</th>
                            {{-- <th>Bids Status</th> --}}
                            <th>Action</th>
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
                                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->front) }}" width="100" height="100">
                            </td>
                            @if($vehicle->status == 0)
                            <td class=""><span class="badge badge-danger"> Pending </span></td>
                            @elseif($vehicle->status == 2)
                            <td class=""><span class="badge badge-danger"> Deactivate </span></td>
                          @else
                            <td class=""><span class="badge badge-success"> Accepted </span></td>
                            @endif
                            <td>@if(count($vehicle->allbid))Total Bids : {{ count($vehicle->allbid)}}@else No Bid Yet @endif</td>
                            {{-- <td>
@php
foreach($vehicles as $all){
    $activebid[] = App\Models\BidedVehicle::where('vehicle_id', $all->id)->where('status',1)->first();
    if(isset($activebid->vehicle_id) && $activebid->vehicle_id == $vehicle->id){
    echo "Accepted";

  }
    
  }
  
  foreach($vehicles as $all){
    $deactivatebid[] = App\Models\BidedVehicle::where('vehicle_id', $all->id)->where('status',2)->first();
    
    if(isset($deactivatebid->vehicle_id) &&  $deactivatebid->vehicle_id == $vehicle->id){
    echo "deactivate";
  }
  }
  
  foreach($vehicles as $all){
    $pending[] = App\Models\BidedVehicle::where('vehicle_id', $all->id)->where('status',null)->first();
    if(isset($pending->vehicle_id) && $pending->vehicle_id == $vehicle->id){
    echo "pending";
}
    
  }
@endphp
{{$vehicle->allbid}}

@if(count($vehicle->allbid) != null) 
@if($vehicle->bid->status == 1)
accepted

@elseif($vehicle->bid->status == 2)
deacivated
@else
pending
@endif

@else no bid @endif
                            </td> --}}
                            <td>
                                <a href="{{ route('singleBid',$vehicle->id) }}" class="cvf_btn"><span class="badge bg-success">View All Bids</span></a>
                            
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
