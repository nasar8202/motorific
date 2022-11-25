
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
                <h3>Seller's Vehicles</h3>
                <p class="text-subtitle text-muted">View New Vehicles </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Seller's Vehicles</li>
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
                            <th>Seller Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Post Code</th>
                                                   </tr>
                    </thead>
                    <tbody>
                        
                        <tr>

                            <td>{{ $seller->name}}</td>
                            <td>{{ $seller->email}}</td>
                            
                            <td>{{ $seller->phone_number}}</td>
                            
                            <td>{{ $seller->post_code}}</td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
