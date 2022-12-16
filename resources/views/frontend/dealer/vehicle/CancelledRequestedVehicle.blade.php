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
<h5>Canceled Vehicle</h5>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="usr">Search Purchases Vehcle:</label>
                        <input type="text" placeholder="Search in Complete" class="form-control" id="usr">
                        <br>
                        <p>{{ $countcanceled  }}<span style="margin: 5px">Results</span></p>
                    </div>
                    <br>
                    <div class="row">
                        @forelse ($canceled as $cancel)
                        <a href="{{route('completedVehicleDetails',$cancel->vehicle->id)}}"><div class="col-sm-4" style="padding: 10px;"><img src="{{ asset('/vehicles/vehicles_images/'. $cancel->vehicle->VehicleImage->front) }}" width="300px" height="200px"></div>
                        </a><div class="col-sm-8" style="padding: 10px">
                            <h1 style="font-size: 20px"><span style="background-color:rgba(72, 255, 0, 0);border-radius:45px;padding:7px">{{ $cancel->vehicle->vehicle_registartion_number }}</span></h1>
                            <br><p>{{ $cancel->vehicle->vehicle_name }}</p><br>
                            <span>Requested Price:{{ $cancel->order->request_price }}</span>
                            
                            <span style="padding-left: 60px;">{{ $cancel->created_at->format('m/d/Y') }}</span>
                            <span style="padding-left: 200px;">
                               
                                        <!-- Trigger Buttons HTML -->
                                       
                                    
                                
                            </span>

                        </div>
                        <div>
                            <span>Your reviews : {{ $cancel->reviews }}</span>
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

