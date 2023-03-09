
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
                <h3>Cancel Vehicle</h3>
                <p class="text-subtitle text-muted">View All Cancel Vehicles List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Canceled Vehicles</li>
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
                            <th>Reviews</th>
                            <th>Dealer Name</th>
                            <th>Vehicle Reg Num</th>
                            <th>Vehicle Price</th>
                            <th>Purchase Price</th>
                            <th>Evidence</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($orders as $order)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $order->reviews??""}}</td>
                            <td>{{ $order->user->name??""}}</td>
                            @if($order->vehicle_id == null)
                            <td>{{ $order->dealerVehicle->vehicle_name??""}}</td>
                            <td>{{ $order->dealerVehicle->vehicle_price??""}}</td>
                            @else
                            <td>{{ $order->vehicle->vehicle_name??""}}</td>
                            <td>{{ $order->vehicle->vehicle_price??""}}</td>
                            @endif
                            @if($order->dealer_vehicle_id == null)
                            @if($order->vehicle->all_auction == null)
                            <td>{{ $order->bidorder->bid_price??""}}</td>
                            @else
                            <td>{{ $order->order->request_price??""}}</td>
                            @endif
                            @else
                            <td>{{ $order->dealerOrder->request_price??""}}</td>
                          @endif
                          <td><a href="{{route('cancelVehicleEvidence',$order->id)}}" class="badge bg-dark">View Evidence</a></td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
