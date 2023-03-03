
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
                <h3>Selles Person</h3>
                <p class="text-subtitle text-muted">View All Selles Person List</p>
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
                Selles Person List
                <a href="{{ route('createSellesPersonForm') }}" class="cvf_btn"><span class="badge bg-primary" style="float: right">Create Selles Person</span></a>
            </div>

            <div class="card-body">
                <table class="table table-striped tables_admin_data" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($sellesPersons as $sellesPerson)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $sellesPerson->name }}</td>
                            <td>{{ $sellesPerson->email }}</td>
                            <td>
                                <a href="{{ route('sellesPersonEdit',$sellesPerson->id) }}"><span class="badge badge-success">Edit</span></a>
                                @if($sellesPerson->status == 1)
                                <a href="{{ route('unBlockSellesPerson',$sellesPerson->id) }}"><span class="badge badge-danger">unblocked</span></a>
                                @else
                                <a href="{{ route('blockSellesPerson',$sellesPerson->id) }}"><span class="badge badge-danger">blocked</span></a>
                                @endif
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
