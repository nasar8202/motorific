
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
                <a href="{{ route('allBiddingVehicle') }}"><span class="badge badge-success">Go Back</span></a>

                <h3>Orderd Vehicles Seller's Details</h3>
                <p class="text-subtitle text-muted">Orderd  Vehicles Seller's Details </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orderd Vehicle Seller's Details</li>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                                                   </tr>
                    </thead>
                    <tbody>
                        
                        <tr>

                            <td>{{ $seller->name}}</td>
                            <td><a href="mailto:">{{ $seller->email}}</a></td>
                            
                            <td><a href="callto:">{{ $seller->phone_number}}</a></td>
                            
                            <td>{{ $seller->address}} </td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>

           

           
        </div>


    </section>
</div>
@endsection
