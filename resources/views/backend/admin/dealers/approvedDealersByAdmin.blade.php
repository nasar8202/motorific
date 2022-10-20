
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
                <h3>Dealers</h3>
                <p class="text-subtitle text-muted">View All Approved Dealer List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Approved Dealers</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Approved Dealer List
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Company Name</th>
                            <th>Position</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($approvedDealersByAdmin as $dealer)
                        <tr>
                            <td>{{ $dealer->full_name }}</td>
                            <td>{{ $dealer->email }}</td>
                            <td>{{ $dealer->mobile_number }}</td>
                            <td>{{ $dealer->company_name }}</td>
                            <td>{{ $dealer->position }}</td>
                            <td>{{ $dealer->city }}</td>
                            <td>
                                <a href="{{ route('dealer.approve',$dealer->id) }}"><span class="badge bg-success">View Dealer Purchases</span></a>
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
