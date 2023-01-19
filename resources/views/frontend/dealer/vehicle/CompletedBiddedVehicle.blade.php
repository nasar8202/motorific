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

<section class="sec-2 productPageTn requested-vehicles">
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
                        <p>{{ $countBids  }}<span style="margin: 5px">Results</span></p>
                    </div>
                    <br>
                    <div class="row">
                     
                        @forelse ($bids as $bid)
                        <div class="col-sm-4 vec-box p-0" style="padding: 10px;"><img src="{{ asset('/vehicles/vehicles_images/'. $bid->front) }}" width="300px" height="200px"></div>
                        <div class="col-sm-8 vec-box p-0" style="padding: 10px">
                            <h1 style="font-size: 20px"><span style="background-color:rgba(72, 255, 0, 0);border-radius:45px;padding:7px">{{ $bid->vehicle_registartion_number }}</span></h1>
                            <p>{{ $bid->vehicle_name }}</p>
                            <span>Max Bid:{{ $bid->bid_price }}</span>
                            <span style="padding-left: 60px;">{{ $bid->created_at->format('m/d/Y') }}</span>
                            <span style="padding-left: 200px;">
                               
                                        <!-- Trigger Buttons HTML -->
                                       
                                        <button type="button" class="btn btn-primary ms-4" data-bs-toggle="collapse" data-bs-target="#myCollapse{{$bid->id}}">...</button>
                                   
                                    <!-- Collapsible Element HTML -->
                                    <div class="collapse" id="myCollapse{{$bid->id}}">
                                        <div class="card card-body " style="width: 40%;float: right;" >
                                            <ul>
                                                <li><a href="{{route('sellerDetails',$bid->id)}}"> Seller's Details</a></li><br>
                                                <li><a href="{{route('deliveryDetailPage')}}">Delivery Details</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                
                            </span>

                        </div>
                        @empty
                        <div class="col-sm-12 ">No Purchases Vehicle Found!</div>

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

