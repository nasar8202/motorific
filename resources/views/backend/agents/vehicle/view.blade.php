
@extends('backend.agents.layouts.app')
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
                <h3>Sellers</h3>
                <p class="text-subtitle text-muted">View All Yours Sellers List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li> --}}
                        {{-- <li class="breadcrumb-item active" aria-current="page">Sellers</li> --}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Vehicles List
                {{-- <a href="{{ route('createVehicleForm') }}" class="cvf_btn"><span class="badge bg-primary" style="float: right">Create Vehicle</span></a> --}}
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data vehicle_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Seller Name</th>
                            <th>Seller Email</th>
                            <th>Seller Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($seller as $selle)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $selle->name}}</td>
                            <td>{{ $selle->email}}</td>
                            <td>{{ $selle->phone_number}}</td>
                            <td>
                                <a href="{{ route('addSellerVehicleFromAgent',$selle->id) }}" class="badge badge-success w-100">Add Vehicle For This Seller</a>
                                <a href="{{ route('viewSellersVehicle',$selle->id) }}" class="badge badge-success w-100 mt-1">View Vehicle</a>
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
