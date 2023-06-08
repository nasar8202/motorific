
@extends('backend.admin.layouts.app')
@section('title','view Insurance Features List')
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
                <h3>Insurance</h3>
                <p class="text-subtitle text-muted">View All Insurance List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Insurance</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Insurance List
                <a href="{{ route('createInsuranceWriteOffForm') }}" class="cvf_btn"><span class="badge bg-primary" style="float: right">Create Insuracne Work off</span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($InsuranceWriteOffs as $InsuranceWriteOff)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $InsuranceWriteOff->title }}</td>
                            <td>
                                <a href="{{ route('insuranceWriteOffEditForm',$InsuranceWriteOff->id) }}"><span class="badge badge-success">Edit</span></a>
                                <a href="{{ route('deleteInsuranceWriteOff',$InsuranceWriteOff->id) }}"><span class="badge badge-danger">Delete</span></a>
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
