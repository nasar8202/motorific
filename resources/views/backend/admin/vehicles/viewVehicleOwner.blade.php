
@extends('backend.admin.layouts.app')
@section('title','view Vehicles Features List')
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
                <h3>Vehicle Owner Questions</h3>
                <p class="text-subtitle text-muted">Vehicle Owner Questions List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Smooking </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
               
                <a href="{{ route('createVehicleOwnerForm') }}" class="cvf_btn"><span class="badge bg-primary" style="float: right">Add Vehicle Owner Questions </span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vehicle Owner Questions Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($viewVehicleOwners as $viewVehicleOwner)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $viewVehicleOwner->title}}</td>
                            <td>
                                <a href="{{ route('editVehicalOwnerForm',$viewVehicleOwner->id) }}"><span class="badge badge-success">Edit</span></a>
                                <a href="{{ route('deleteVehcileOwner',$viewVehicleOwner->id) }}"><span class="badge badge-danger">Delete</span></a>
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
