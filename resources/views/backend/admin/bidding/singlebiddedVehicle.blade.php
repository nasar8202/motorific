
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
                <h3>Bidding List For This Vehicle</h3>
                <p class="text-subtitle text-muted">View All Bidding Lists</p>
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
                Bidding List
                <a href="{{ route('createVehicleForm') }}"><span class="badge bg-primary" style="float: right">Create Vehicle</span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Registartion Number</th>
                            <th>Vehicle Name</th>
                            <th>Bidder Name</th>
                            <th>Bidder Price</th>
                            <th>Current Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($bids as $bid)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $bid->user_id}}</td>
                            <td>{{ $bid->vehicle_id}}</td>
                            <td>{{ $bid->bid_price}}</td>
                            <td>{{ $bid->vehicle_type}}</td>
                            <td>{{ $bid->vehicle_tank}}</td>
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
