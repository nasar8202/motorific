
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
                Vehicles List
                <a href="{{ route('createVehicleForm') }}"><span class="badge bg-primary" style="float: right">Create Vehicle</span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Price from</th>
                            <th>Price To</th>
                            <th>Fee</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pricing as $price)
                        <tr>

                            <td></td>
                            <td><input class="border-0 bg-light"  type="text" value=" £{{$price->price_from}}" ></td>
                            <td> <input  class="border-0 bg-light"  type="text" value=" £{{$price->price_to}}" ></td>
                            <td> <input class="border-0 bg-light" type="text" value=" £{{$price->fee}}" ></td>
                            
                            <td>
                                <a href="#"><span class="badge bg-success">Update</span></a>
                            
                            </td>
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
