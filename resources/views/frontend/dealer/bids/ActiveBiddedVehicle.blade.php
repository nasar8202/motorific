@extends('frontend.dealer.layouts.app')
@section('title','Bids And Offers')
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
                        {{-- <label for="usr">Search Bidded Vehcle:</label>
                        <input type="text" placeholder="Search in Complete" class="form-control" id="usr"> --}}
                        <br>
                        <p>{{ $countBids  }} <span style="margin: 5px">Results</span></p>
                    </div>
                    <br>
                    <div class="row">
                        @forelse ($bids as $bid)
                        <div class="col-sm-4 vec-box p-0" ><img src="{{ asset('/vehicles/vehicles_images/'. $bid->vehicle->vehicleimage->front) }}" width="300px" height="200px"></div>
                        <div class="col-sm-8 vec-box p-0" >
                            <h1 style="font-size: 20px"><span >{{ $bid->vehicle->vehicle_registartion_number }}</span></h1>
                           <p>{{ $bid->vehicle->vehicle_name }}</p>
                            <span>Max Bid:{{ $bid->bid_price }}</span>
                            <span style="padding-left: 60px;">{{ $bid->created_at->format('m/d/Y') }}</span>
                            <button type="button" class="btn btn-primary ms-4" data-bs-toggle="collapse" data-bs-target="#myCollapse{{$bid->id}}">...</button>
                                   
                            <!-- Collapsible Element HTML -->
                            <div class="collapse" id="myCollapse{{$bid->id}}">
                                <div class="card card-body " style="width: 40%;float: right;" >
                                    <ul>
                                        <li><a href="{{route('sellerDetails',['bided'=>"bided",'slug'=>"seller",'id'=>$bid->vehicle->id])}}"> Seller's Details</a></li><br>
                                        {{-- <li><a href="{{route('deliveryDetailPage')}}">Delivery Details</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        
                        </div>
                        @empty
                        <div class="col-sm-12">No active bids or offers!</div>

                        @endforelse

                    </div>
                    <br>

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

