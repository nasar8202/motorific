
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
                <table class="table table-striped tables_admin_data tables_admin_data" id="table1">
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
                            <td>@if($order->status == 0) <span class="badge badge-danger">Not Accepted</span>
                                @else <span class="badge badge-success">Accepted</span>
                                @endif</td>
                            <td><a class="badge badge-success" href="{{route('orderdUserDetail',$order->user_id)}}">Dealer Details </a>
                            <a class="badge badge-success" href="{{route('orderdVehicleDetail',$order->vehicle_id)}}" >Vehicle Details </a>
                            <a class="badge badge-success" href="{{route('orderdSellerDetail',$order->vehicle->user_id)}}" >Seller Details </a>
                            @if($order->status == 0)
                            <a class="badge badge-success" href="{{route('approveOrderd',['id'=>$order->id,'vId'=>$order->vehicle->id])}}" >Approve Order Request </a>
                            <a role="button" class="badge badge-success mt-1 price" data-bs-toggle="modal"
                            data-bs-target="#pricing"  data-id="{{$order->id}}">
                            Update Price
                        </a>
                        @else
                        <a class="badge badge-danger" href="{{route('unassignReq',$order->id)}}" >Unassign Request</a>
                       
                        <a role="button" class="badge badge-success mt-1 meeting"
                        data-bs-toggle="modal" data-bs-target="#meeting" data-id="{{$order->id}}">
                        View Meeting Status
                         </a>
                        @endif
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
    <div class="modal fade text-left" id="pricing" tabindex="-1" role="dialog"
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
                                                    @if ($errors->has('updatedPrice'))
                                                    <span class="text-danger">{{ $errors->first('updatedPrice') }}</span>
                                                    @endif
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
<div class="modal fade text-left" id="meeting" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel150"                 
                       aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
       role="document">
     <div class="modal-content">
          <div class="modal-header bg-dark white">
             <span class="modal-title" id="myModalLabel150">
                Meeting Status
             </span>
             <button type="button" class="close"
                 data-bs-dismiss="modal" aria-label="Close">
                 <i data-feather="x"></i>
              </button>
          </div>
         <div class="modal-body">
             <h6>Dealer Meeting Date</h6>
             <span class="date"></span>
             <br>
             <h6>Seller Reviews</h6>
             <span class="reviews"></span>
         </div>
          <div class="modal-footer">
               <button type="button"
                  class="btn btn-light-secondary"
                 data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
              </button>
             <button type="button" class="btn btn-dark ml-1"
                   data-bs-dismiss="modal">
        <i class="bx bx-check d-block d-sm-none"></i>
        <span class="d-none d-sm-block">Accept</span>
        </button>
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
        // console.log('dsadasa');
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

    $('.meeting').on('click', function() {

        var id = $('.meeting').attr("data-id");
         $.ajax({

            url: '{{route("orderRequestMeeting")}}',
            type: 'get',
            
            data: {id:id},

            success: function(response){
                
                if(response.meeting_status == null){
                    $(".reviews").html("No Status Has Been Given By Seller"); 
                }
                else{
                    $(".reviews").html(response.meeting_status); 
                }
                if(response.meeting_date_time == null){
                    $(".date").html("No Meeting Has Been Scehdule");  
                    
                }
                else{
                    $(".date").html(response.meeting_date_time); 
                }


           
            },



            });
    
});
});
</script>

@endpush