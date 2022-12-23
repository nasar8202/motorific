
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
                            <td class="requestedPrice">{{ $order->request_price}}</td>
                            <td>@if($order->status == 0) <span class="badge badge-danger">Not Accepted</span>@endif</td>
                            <td><a class="badge badge-success" href="{{route('orderdUserDetail',$order->user_id)}}">Dealer Details </a>
                            <a class="badge badge-success" href="{{route('orderdVehicleDetail',$order->vehicle_id)}}" >Vehicle Details </a>
                            <a class="badge badge-success" href="{{route('orderdSellerDetail',$order->vehicle->user_id)}}" >Seller Details </a>
                            <a class="badge badge-info" href="{{route('approveOrderd',$order->id)}}" >Approve Order Request </a>
                            <button type="button" class="btn btn-sm mt-2 btn-outline-primary block price" data-bs-toggle="modal"
                            data-bs-target="#default"  data-id="{{$order->id}}">
                            Update Price
                        </button>
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
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">Update Price</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('approveOrderdWithAdminUpdated')}}" method="POST">
                                                        @csrf
                                                    <input class="form-control" type="number" id="newPrice" name="updatedPrice" placeholder="Enter Your Updated Price">
                                                    <span id="warn" class="text text-danger"></span>
                                                    <input class="form-control" type="hidden" id="orderId" name="orderId" value="" >
                                               
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1 updatedBut"
                                                    >
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Update</span>
                                                    </button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
</div>
@endsection
@push('child-scripts')
<script>

$(document).ready(function(){
    $('.price').on('click', function() {
        var id = $('.price').attr("data-id");
        $("#orderId").val(id);
        
            $('#newPrice').on('keyup', function() {
              
                var newprice = $('#newPrice').val();
            var requestedPrice = parseInt($('.requestedPrice').html(),10);
          
          if(newprice < requestedPrice){
            $("#warn").html("Your Amount is low");
            $('.updatedBut').prop('disabled', true);
        }
        else{
            $("#warn").html("");
            $('.updatedBut').prop('disabled', false);
        }
        });
    });
});
</script>

@endpush