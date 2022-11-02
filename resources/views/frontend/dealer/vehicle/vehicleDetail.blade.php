@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>

</style>

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->front ?? "") }}" width="100%" height="300px">

                <div class="row">
                    <div class="col-md-12 mx-0">


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="sec-2 productPageTn">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 productsFiltersCol">
                <div class="productsFilters">

                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="sec-2-txt pb-4">
                    <h2>Live Sell ends in 2 hrs</h2>
                   
                </div>
                <div class="row">

                    <!-- BOX-1 -->

                    <div class="col-lg-4 col-md-4">
                        <a href="{{ route('vehicle.vehicleDetail',[$vehicle->id]) }}">
                            <div class="box">

                                <div class="box-img">
                                    <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->front ?? "") }}" width="180px" alt="">
                                </div>
                                <h4>{{ $vehicle->vehicle_registartion_number }}</h4>
                                <div class="d-flex justify-content-between">
                                    <p>{{ $vehicle->vehicle_name }}</p>


                                </div>
                                <div class="d-flex justify-content-between">

                                    <h6>{{ $vehicle->vehicle_year }}.{{ $vehicle->vehicle_tank }}.{{ $vehicle->vehicle_mileage }}.{{ $vehicle->vehicle_type }}</h6>



                                </div>
                                <span>${{ $vehicle->vehicle_price }}</span>
                            </div>
                        </a>
                        <br>
                    </div>



                </div>

            </div>
        </div>
    </div>
    </section>
@endsection


