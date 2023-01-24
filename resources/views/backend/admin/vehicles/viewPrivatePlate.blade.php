
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
                <h3>Private Plate</h3>
                <p class="text-subtitle text-muted">View All Private Plate List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Private Plate</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                
                <a href="{{ route('createPrivatePlateForm') }}" class="cvf_btn"><span class="badge bg-primary" style="float: right">Create Private Plate Question</span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Private Plate Title</th>
                            <th>Image</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($viewPrivatePlates as $viewPrivatePlate)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $viewPrivatePlate->title }}</td>
                            <td><img src="{{ asset('/plates/private_plate_iamges/'.$viewPrivatePlate->image) }}" width="100" height="100"></td>
                            <td>
                                <a href="{{ route('editPrivatePlateForm',$viewPrivatePlate->id) }}"><span class="badge bg-success">Edit</span></a>
                                <a href="{{ route('deletePrivatePlate',$viewPrivatePlate->id) }}"><span class="badge bg-danger">Delete</span></a>
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
