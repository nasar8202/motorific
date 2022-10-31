@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>

</style>

<!-- MultiStep Form -->
<br>
<br>
<br>
<br>
<br>
<section class="sec-2">
<div class="container-1151">
    <div class="sec-2-txt pb-4">
        <h2>Live Sell ends in 2 hrs</h2>
        <p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>
    </div>
    <div class="row">

        <!-- BOX-1 -->
        @foreach ($vehicles as $vehicle)
        <div class="col-lg-3 col-md-3">
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
            <br>
        </div>

        @endforeach

    </div>


    <div class="sec-2-btns text-center">
        <button>VALUE YOUR CAR</button>
        <button>GET IN TOUCH</button>
    </div>
</div>
</section>

@endsection


