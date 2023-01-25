
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
                <h3>Dealer Card Details</h3>
                <p class="text-subtitle text-muted">View All Dealer Card List</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dealer's Card Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
         
            <div class="card-body">
                <table class="table table-striped tables_admin_data"  id="table1">
                    <thead>
                        <tr>
                            <th>Name On Card</th>
                            <th>Card Number</th>
                            <th>CVC</th>
                            <th>Expiration Month</th>
                            <th>Expiration Year</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>

                            <td>{{ $dealers->name_on_card}}</td>
                            <td>{{ $dealers->card_number}}</td>
                            <td>{{ $dealers->cvc}}</td>
                            <td>{{ $dealers->expiration_month}}</td>
                            <td>{{ $dealers->expiration_year}}</td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
