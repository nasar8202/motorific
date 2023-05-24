@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->


    <section class="sec-2 productPageTn requested-vehicles">
        <div class="sliderImgVehicleDetail">
          
           @forelse($vehicle->DealerVehicleExterior as $exteriorimage)
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/uploads/DealerVehicles/exterior/'.$exteriorimage->exterior_image ?? "") }}">
            </div>
            @empty
            @endforelse
            @forelse($vehicle->DealerVehicleInterior as $interiorimage)
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/uploads/DealerVehicles/interior/'.$interiorimage->interior_image ?? "") }}">
            </div>
            @empty
            @endforelse
            {{-- <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->passenger_rare_side_corner ?? "") }}">
            </div>
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->driver_rare_side_corner ?? "") }}">
            </div>
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->dashboard ?? "") }}">
            </div> --}}
        </div>
    </section>
    <section class="sec-2 productPageTn">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bottomList mainSpec">
                            <div class="bottomListTitle">
                                <h4><i class="far fa-copy"></i> Vehicle History</h4>
                                <ul>
                                    <li>Keys<span>
                                            {{ $vehicle->DealerVehicleHistory->keys }}</span></li>
                                    <li>Previous Owners <span>{{ $vehicle->DealerVehicleHistory->previous_owners }}</span>
                                    </li>
                                    <li>Service History
                                        <span>{{ $vehicle->DealerVehicleHistory->service_history_title }}</span>
                                    </li>
                                    <li>Mileage<span>{{ $vehicle->DealerVehicleHistory->mileage }}</span></li>
                                    <li>V5 Status<span>{{ $vehicle->DealerVehicleHistory->v5_status }}</span></li>
                                    <li>Origin<span>{{ $vehicle->DealerVehicleHistory->origin }}</span></li>
                                    <li>Interior<span>{{ $vehicle->DealerVehicleHistory->interior }}</span></li>
                                    <li>Exterior<span>{{ $vehicle->DealerVehicleHistory->exterior }}</span></li>
                                    <li>Audio and
                                        Communications<span>{{ $vehicle->DealerVehicleHistory->audio_and_communications }}</span>
                                    </li>
                                    <li>Drivers
                                        Assistance<span>{{ $vehicle->DealerVehicleHistory->drivers_assistance }}</span>
                                    </li>
                                    <li>More Details
                                        <span>
                                            @php
                                                $in_array_questions = explode(',', $vehicle->DealerVehicleHistory->checkbox_questions);
                                            @endphp
                                            @if (in_array('1', $in_array_questions))
                                                Battery Charge Warning ,
                                            @endif
                                            @if (in_array('2', $in_array_questions))
                                            Cruise Control with Programmable Speed Limiter ,
                                            @endif
                                            @if (in_array('3', $in_array_questions))
                                            Distance to Next Service Indicator ,
                                            @endif
                                            @if (in_array('4', $in_array_questions))
                                            Door Open Warning ,
                                            @endif
                                            @if (in_array('5', $in_array_questions))
                                            Oil Level Indicator ,
                                            @endif
                                            @if (in_array('6', $in_array_questions))
                                            Park Assist - 180 Degree ,
                                            @endif
                                            @if (in_array('7', $in_array_questions))
                                            Rear Parking Sensors ,
                                            @endif
                                            @if (in_array('8', $in_array_questions))
                                            Rev Counter ,
                                            @endif
                                            @if (in_array('9', $in_array_questions))
                                            Speedometer with Digital Odometer and Digital Trip Recorder ,
                                            @endif
                                            @if (in_array('10', $in_array_questions))
                                            Trip Computer ,
                                            @endif
                                            @if (in_array('11', $in_array_questions))
                                            Tyre Pressure Monitor ,
                                            @endif
                                            @if (in_array('12', $in_array_questions))
                                            Water Temperature and Fuel Gauges ,
                                            @endif
                                        </span>
                                    </li>
                                    <li>Illumination<span>{{ $vehicle->DealerVehicleHistory->illumination }}</span></li>
                                    <li>Performance<span>{{ $vehicle->DealerVehicleHistory->performance }}</span></li>
                                    <li>Safety and
                                        Security<span>{{ $vehicle->DealerVehicleHistory->safety_and_security }}</span></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-6">
                    <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-bolt"></i> Condition And Damages</h4>
                            <ul>
                                <li>Condition / Damage<span>{{ $vehicle->DealerVehicleMedia->condition_damage }}</span>
                                </li>
                                <li>Condition / Damage URL
                                    <span>{{ $vehicle->DealerVehicleMedia->condition_damage_url }}</span>
                                </li>
                                <li>Do you have existing condition
                                    report?<span>{{ $vehicle->DealerVehicleMedia->existing_condition_report }}</span>
                                </li>
                                <li>Is there any damage on your vehicle?
                                    <span>{{ $vehicle->DealerVehicleMedia->any_damage_checked }}</span>
                                </li>
                                <li>Advert description
                                    <span>{{ $vehicle->DealerVehicleMedia->advert_description }}</span>
                                </li>
                                <li>Attention Grabber
                                    <span>{{ $vehicle->DealerVehicleMedia->attention_grabber }}</span>
                                </li>
                                <li>Nearside Front<span>{{ $vehicle->DealerVehicleMedia->nearside_front }}</span></li>
                                <li>Nearside Rear<span>{{ $vehicle->DealerVehicleMedia->nearside_rear }}</span></li>
                                <li>Offside Front <span>{{ $vehicle->DealerVehicleMedia->offside_front }} </span></li>
                                <li>Offside Rear<span>{{ $vehicle->DealerVehicleMedia->offside_rear }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-bolt"></i>Interior Information</h4>
                            <ul>
                                <li>Dashboard<span>{{ $vehicle->DealerVehicleInteriorDetails->dashboard ?? 'No Damage' }}</span>
                                </li>
                                <li>Passenger Side Interior
                                    <span>{{ $vehicle->DealerVehicleInteriorDetails->passenger_side_interior ?? 'No Damage' }}</span>
                                </li>
                                <li>Driver Side
                                    Interior<span>{{ $vehicle->DealerVehicleInteriorDetails->driver_side_interior ?? 'No Damage' }}</span>
                                </li>
                                <li>Floor<span>{{ $vehicle->DealerVehicleInteriorDetails->floor ?? 'No Damage' }}</span>
                                </li>
                                <li>Ceiling
                                    <span>{{ $vehicle->DealerVehicleInteriorDetails->ceiling ?? 'No Damage' }}</span>
                                </li>
                                <li>Boot<span>{{ $vehicle->DealerVehicleInteriorDetails->boot ?? 'No Damage' }}</span>
                                </li>
                                <li>Rear
                                    Windscreen<span>{{ $vehicle->DealerVehicleInteriorDetails->rear_windscreen ?? 'No Damage' }}</span>
                                </li>
                                <li>Passenger
                                    Seat<span>{{ $vehicle->DealerVehicleInteriorDetails->passenger_seat ?? 'No Damage' }}</span>
                                </li>
                                <li>Driver Seat
                                    <span>{{ $vehicle->DealerVehicleInteriorDetails->driver_seat ?? 'No Damage' }}
                                    </span>
                                </li>
                                <li>Rear
                                    Seats<span>{{ $vehicle->DealerVehicleInteriorDetails->rear_seats ?? 'No Damage' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-bolt"></i>Exterior Information</h4>
                            <ul>
                                <li>Front Door
                                    Left<span>{{ $vehicle->DealerVehicleExteriorDetails->front_door_left ?? 'No Damage' }}</span>
                                </li>
                                <li>Back Door Left
                                    <span>{{ $vehicle->DealerVehicleExteriorDetails->back_door_left ?? 'No Damage' }}</span>
                                </li>
                                <li>Front Door
                                    Right<span>{{ $vehicle->DealerVehicleExteriorDetails->front_door_right ?? 'No Damage' }}</span>
                                </li>
                                <li>Back Door
                                    Right<span>{{ $vehicle->DealerVehicleExteriorDetails->back_door_right ?? 'No Damage' }}</span>
                                </li>
                                <li>Top <span>{{ $vehicle->DealerVehicleExteriorDetails->top ?? 'No Damage' }}</span>
                                </li>
                                <li>Bonut<span>{{ $vehicle->DealerVehicleExteriorDetails->bonut ?? 'No Damage' }}</span>
                                </li>
                                <li>Front<span>{{ $vehicle->DealerVehicleExteriorDetails->front ?? 'No Damage' }}</span>
                                </li>
                                <li>Back<span>{{ $vehicle->DealerVehicleExteriorDetails->back ?? 'No Damage' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="vehicleDetailGal">
                        <h4>Wheels</h4>
                        <div class="vehicleDetailGalrepeatMain">
                            @forelse($vehicle->DealerVehicleTyre as $wheel)
                                <div class="imgVehicle">
                                    <img src="{{ asset('/uploads/dealerVehicles/tyres/' . $wheel->tyre_image ?? '') }}"
                                        alt="">
                                </div>
                            @empty
                            @endforelse
                            {{-- <div class="imgVehicle">
                            <img src="{{ URL::asset('frontend/seller/assets/image//box-1.png') }}" alt="">
                        </div>
                        <div class="imgVehicle">
                            <img src="{{ URL::asset('frontend/seller/assets/image//box-1.png') }}" alt="">
                        </div>
                        <div class="imgVehicle">
                            <img src="{{ URL::asset('frontend/seller/assets/image//box-1.png') }}" alt="">
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".spinner-border").hide();
    $("form").submit(function(e){
        e.preventDefault();
    });
    $(".bid").click(function(){
        
    var BidPrice = $(".bid_price").val();
    var HiddenPrice = $(".hidden_price").val();
    var VehicleId = $(".vehicle_id").val();
    console.log(BidPrice,HiddenPrice);
    // console.log(BidPrice <= HiddenPrice);
    if(!(BidPrice <= HiddenPrice)){

         $.ajax({

            url: '{{route("orderVehicleRequest")}}',
            type: 'post',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {BidPrice:BidPrice,HiddenPrice:HiddenPrice,VehicleId:VehicleId},

            success: function(response){

            var resultData = response;
            console.log(resultData)
            
            if(resultData != null){
                $(".spinner-border").show();
                setTimeout(function() {
                location.reload();
            }, 1000);
            toastr.success(resultData.success);
            }
            else{
                $(".error").html('');
        $(".error").html('Something Error');
            }
            
            },



            });
   

    }
    else{
        $(".warning").html('');
        $(".warning").html('Your Bid Amount Is Not Matching The Vehicle Criteria');
    }
  });

    $(".hidden").hide();
  $("#dynamic-ar").click(function(){
    $(".hidden").toggle();
  });
});
</script>
@endsection


