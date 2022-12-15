
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
                <h3>Vehicle Orders Request</h3>
                <p class="text-subtitle text-muted">View All Vehicles Orders Request</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vehicles Requests</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
           

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Requested User Name </th>
                            <th>Vehicle name</th>
                            <th>Requested Price</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($orders as $order)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $order->user->name}}</td>
                            <td>{{ $order->vehicle->vehicle_name}}</td>
                            <td>{{ $order->request_price}}</td>
                            <td>@if($order->status == 0) <span class="badge badge-danger">Not Accepted</span>@endif</td>
                            <td><a class="badge badge-success" href="{{route('orderdUserDetail',$order->user_id)}}">User Details </a>
                            <a class="badge badge-success" href="{{route('orderdVehicleDetail',$order->vehicle_id)}}" >Vehicle Details </a>
                            <a class="badge badge-info" href="{{route('approveOrderd',$order->id)}}" >Approve Order Request </a>
                        </td>
                            
                        </tr>
                        @empty
                        <td colspan="5">no vehicle found</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection