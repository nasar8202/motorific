
@extends('backend.admin.layouts.app')
@section('title','view Approved Dealers List')
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
                <h3>Dealers Purchase</h3>
                <p class="text-subtitle text-muted">View All Dealers Purchases List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dealers Purchases </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Dealers Purchases List
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Dealer Name</th>
                            <th>Vehicle Reg Number</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Price</th>
                            <th>Vehicle Charges</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchase as $dealer)
                        <tr>
                            <td>{{ $dealer->user->name }}</td>
                            <td>{{ $dealer->vehicle->vehicle_registartion_number }}</td>
                            <td>{{ $dealer->vehicle->vehicle_name }}</td>
                            <td>{{ $dealer->vehicle->vehicle_price }}</td>
                            <td>{{ $dealer->vehicle_charges }}</td>
                            
                           
                        </tr>
                        @empty
                        <td colspan="6">No Purchase Found</td>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
