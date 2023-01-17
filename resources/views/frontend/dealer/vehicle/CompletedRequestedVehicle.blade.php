@extends('frontend.dealer.layouts.app')
@section('title','Purchases')
@section('section')
<!-- form css -->
<style>
    .sec-2-txt h2 div,.sec-2-txt h2 div span {
        font-size: inherit;
        display: initial;
        color: inherit;
    }
</style>

<!-- MultiStep Form -->

<section class="sec-2 productPageTn">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 productsFiltersCol">
            <div class="productsFilters">
                @include('frontend.dealer.include.biddsOffer')
            </div>
        </div>
        <div class="col-lg-9 col-md-9">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        {{-- <label for="usr">Search Purchases Vehcle:</label>
                        <input type="text" placeholder="Search in Complete" class="form-control" id="usr"> --}}
                        <br>
                        <p>{{$countOrder}}<span style="margin: 5px">Results</span></p>
                    </div>
                    <br>
                    <div class="row">
                     <h4>Seller's Vehicle</h4>
                        @forelse ($Orders as $Order)
                       <div class="col-sm-4 vec-box p-0" style="padding: 10px;"> <a href="{{route('completedVehicleDetails',$Order->vehicle->id)}}"><img src="{{ asset('/vehicles/vehicles_images/'. $Order->vehicle->VehicleImage->front) }}" width="300px" height="200px">  </a></div>
                      <div class="col-sm-8 vec-box p-0" style="padding: 10px">
                            <h1 style="font-size: 20px"><span style="background-color:rgba(72, 255, 0, 0);border-radius:45px;padding:7px">{{ $Order->vehicle->vehicle_registartion_number }}</span></h1>
                      <p>{{ $Order->vehicle->vehicle_name }}</p>
                            <span>Requested Price:{{ $Order->request_price }}</span>
                           <br> @if($Order->admin_updated_status == 1)
                            <small>Your Price Was Updated By Admin</small>
                            @endif
                            <span style="padding-left: 60px;">{{ $Order->created_at->format('m/d/Y') }}</span>
                            <span style="padding-left: 200px;">
                               
                                        <!-- Trigger Buttons HTML -->
                                       
                                        <button type="button" class="btn btn-primary ms-4" data-bs-toggle="collapse" data-bs-target="#myCollapse{{$Order->id}}">...</button>
                                   
                                    <!-- Collapsible Element HTML -->
                                    <div class="collapse" id="myCollapse{{$Order->id}}">
                                        <div class="card card-body " style="width: 40%;float: right;" >
                                            <ul>
                                                <li><a href="{{route('sellerRequestedDetails',['slug'=>"seller",'id'=>$Order->vehicle->id])}}"> Seller's Details</a></li>
                                                {{-- <li><a href="{{route('deliveryDetailPage')}}">Delivery Details</a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                
                            </span>

                        </div>
                        @empty
                        <div class="col-sm-12">No Purchases Vehicle Found!</div>

                        @endforelse

                    </div>
                    <div class="row">
                        <h4>Completed Dealers To Dealer Vehicle</h4>
                           @forelse ($dealerOrders as $dealerOrder)
                           {{-- @dd($dealerOrder) --}}
                          <div class="col-sm-4 vec-box p-0" style="padding: 10px;"> <a href="{{route('completedDealersVehicleDetail',$dealerOrder->vehicle->id)}}"><img src="{{ asset('uploads/dealerVehicles/exterior/'. $dealerOrder->vehicle->DealerVehicleExterior[0]->exterior_image) }}" width="300px" height="200px">  </a></div>
                         <div class="col-sm-8 vec-box p-0" style="padding: 10px">
                               <h1 style="font-size: 20px"><span style="background-color:rgba(72, 255, 0, 0);border-radius:45px;padding:7px">{{ $dealerOrder->vehicle->vehicle_registartion_number }}</span></h1>
                         <p>{{ $dealerOrder->vehicle->vehicle_name }}</p>
                               <span>Requested Price:{{ $dealerOrder->request_price }}</span>
                              <br> @if($dealerOrder->admin_updated_status == 1)
                               <small>Your Price Was Updated By Admin</small>
                               @endif
                               <span style="padding-left: 60px;">{{ $dealerOrder->created_at->format('m/d/Y') }}</span>
                               <span style="padding-left: 200px;">
                                  
                                           <!-- Trigger Buttons HTML -->
                                          
                                           <button type="button" class="btn btn-primary ms-4" data-bs-toggle="collapse" data-bs-target="#myCollapse{{$dealerOrder->id}}">...</button>
                                      
                                       <!-- Collapsible Element HTML -->
                                       <div class="collapse" id="myCollapse{{$dealerOrder->id}}">
                                           <div class="card card-body " style="width: 40%;float: right;" >
                                               <ul>
                                                   <li><a href="{{route('ownerDealerRequestedDetails',['slug'=>"dealer",'id'=>$dealerOrder->vehicle->id])}}"> Seller's Details</a></li>
                                                   {{-- <li><a href="{{route('deliveryDetailPage')}}">Delivery Details</a></li> --}}
                                               </ul>
                                           </div>
                                       </div>
                                   
                               </span>
   
                           </div>
                           @empty
                           <div class="col-sm-12">No Purchases Vehicle Found!</div>
   
                           @endforelse
   
                       </div>
                </div>
                <!-- BOX-1 -->

            </div>

        </div>
    </div>
</div>
</section>

@endsection
@push('child-scripts')


@endpush

