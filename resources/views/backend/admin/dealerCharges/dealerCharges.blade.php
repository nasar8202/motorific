
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
                <h3>Dealer Card Details</h3>
                <p class="text-subtitle text-muted">View All Dealer Card List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dealer's Card Detail</li>
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
                            <th>User Name</th>
                            <th>Vehicle Regitseration</th>
                            <th>Charges Fee Paid</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($dealerCardDetails as $details)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $details->user->name}}</td>
                            <td>{{ $details->vehicle->vehicle_registartion_number}}</td>
                            <td>{{ $details->vehicle_charges}}</td>
                            <td>@if($details->status == 0)<span class="badge badge-danger">Not Paid</span>
                                @else<span class="badge badge-success">Paid</span>
                                @endif</td>
                            <td>
                                {{-- <a title="mark as paid this dealer it means this dealer paid the charges" href="{{ route('cardDetailsAccept',$details->id) }}"><span class="badge bg-success my-2">Paid Completed ✓</span></a>
                            <br> --}}
                                <a href="{{ route('viewDealerDetailsFromCharges',$details->user_id) }}"><span class="badge bg-info my-2">View Dealer Deatils</span></a>
                                <a href="{{ route('dealerCardDetails',$details->user_id) }}"><span class="badge bg-info my-2">View Dealer's Card Deatils</span></a>
                            
                            </td>
                        </tr>
                        @endforeach
                        @foreach ($dealervehicleCardDetails as $dealervehicleCard)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $dealervehicleCard->user->name}}</td>
                            <td>{{ $dealervehicleCard->dealerVehicle->vehicle_registartion_number}}</td>
                            <td>{{ $dealervehicleCard->vehicle_charges}}</td>
                            <td>@if($dealervehicleCard->status == 0)<span class="badge badge-danger">Not Paid</span>
                                @else<span class="badge badge-success">Paid</span>
                                @endif</td>
                            <td>
                                {{-- <a title="mark as paid this dealer it means this dealer paid the charges" href="{{ route('cardDetailsAccept',$details->id) }}"><span class="badge bg-success my-2">Paid Completed ✓</span></a>
                            <br> --}}
                                <a href="{{ route('viewDealerDetailsFromCharges',$dealervehicleCard->user_id) }}"><span class="badge bg-info">View Dealer Deatils</span></a>
                                <a href="{{ route('dealerCardDetails',$dealervehicleCard->user_id) }}"><span class="badge bg-info my-2">View Dealer's Card Deatils</span></a>
                            
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
