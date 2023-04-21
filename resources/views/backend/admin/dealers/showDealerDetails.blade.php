@extends('backend.admin.layouts.app')
@section('title','Show Dealer Details')
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
                <h3>Dealer Detail</h3>
                <p class="text-subtitle text-muted">Dealer Detail</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dealer Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Dealer Detail
            </div>
            <div class="card-body">
                <table class="table dealer-detail-table">
                    <tr>
                        <th>Name</th>
                        <td>{{$dealers->name}}</td>
                        <th>Email</th>
                        <td>{{$dealers->email}}</td>
                        <th>Address</th>
                        <td>{{$dealers->userDetails->city}}</td>
                    </tr>
                    <tr>
                        <th>Post Code</th>
                        <td>{{$dealers->post_code}}</td>
                        <th>Phone Number</th>
                        <td>{{$dealers->phone_number}}</td>
                        <th>Company Name</th>
                        <td>{{$dealers->company_name}}</td>
                    </tr>
                    <tr>
                        <th>Address Line 1</th>
                        <td>{{$dealers->userDetails->address_line_2}}</td>
                        <th>Address Line 2</th>
                        <td>{{$dealers->userDetails->address_line_2}}</td>
                        <th>Company Type</th>
                        <td>{{$dealers->userDetails->company_type}}</td>
                        </tr>
                        <tr>
                        <th>Website</th>
                        <td>{{$dealers->userDetails->website}}</td>
                        <th>Company Phone</th>
                        <td>{{$dealers->userDetails->company_phone}}</td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="dd-imgs row justify-content-center">
            <div class="col-lg-4">
                <img src="{{ asset('/dealers/documents/'.$dealers->userDetails->dealer_identity_card??"") }}" alt="">
                <p class="text-center mt-2 font-bold">Dealer Identity Card</p>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('/dealers/documents/'.$dealers->userDetails->dealer_documents??"") }}" alt="">
                <p class="text-center mt-2 font-bold">Dealer Documents</p>
            </div>
        </div>

    </section>
</div>
@endsection