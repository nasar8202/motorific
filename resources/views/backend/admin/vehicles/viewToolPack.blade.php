
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
                <h3>Tool Kit </h3>
                <p class="text-subtitle text-muted">View All Tool Kit List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tool Kit </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Vehicles List
                <a href="{{ route('createToolPackForm') }}" class="cvf_btn"><span class="badge bg-primary" style="float: right">Add Tool Kit </span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tool Kit Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($ViewToolPacks as $ViewToolPack)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $ViewToolPack->title}}</td>
                            <td>
                                <a href="{{ route('editToolPackForm',$ViewToolPack->id) }}"><span class="badge bg-success">Edit</span></a>
                                <a href="{{ route('deleteToolPack',$ViewToolPack->id) }}"><span class="badge bg-danger">Delete</span></a>
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
