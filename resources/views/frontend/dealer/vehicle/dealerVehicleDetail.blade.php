@extends('frontend.dealer.layouts.app')
@section('title', 'Sell your car the with Motorific')
@section('section')
    <!-- form css -->

    <main class="topPadingPage">
        <section class="veh-detail-sec">
            <div class="backBtn">
                <a href="{{route('dealer.dashboard')}}">Back to Vehicles</a>
            </div>
            <div class="sliderImgVehicleDetail">
                
                @forelse($vehicle->DealerVehicleExterior as $exteriorimage)
                    <div class="sliderImgVehicleDetailRepeater">
                        <img src="{{ asset('/uploads/dealerVehicles/exterior/' . $exteriorimage->exterior_image ?? '') }}">
                    </div>
                @empty
                @endforelse
                @forelse($vehicle->DealerVehicleInterior as $interiorimage)
                    <div class="sliderImgVehicleDetailRepeater">
                        <img src="{{ asset('/uploads/dealerVehicles/interior/' . $interiorimage->interior_image ?? '') }}">
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
                    <div class="col-lg-8 vehicleDetailLeft">
                        <div class="row">
                            <div class="col-12">
                                <div class="numberStarDiv">
                            <span>{{ $vehicle->vehicle_registartion_number }}</span>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <div class="titleVehicle">
                            <h2>{{ $vehicle->vehicle_name }}</h2>
                            <ul class="vehicle-list">
                                <li>{{ $vehicle->vehicle_year }}</li>
                                <li>{{ $vehicle->vehicle_mileage }} Miles</li>
                                <li>{{ $vehicle->vehicle_color }}</li>
                                <li>{{ $vehicle->vehicle_type }}</li>
                                <li>{{ $vehicle->vehicle_tank }}</li>
                            </ul>
                        </div>
                        <div class="mapAndText">
                            <p><strong>Collection:</strong> Available immediately</p>
                            <p><strong>Location:</strong> {{ $vehicle->location ?? '' }} ({{ $distance??'' }} miles away)


                            </p>
                            @php
                                // $variable = "https://www.google.com/maps/embed/v1/place?key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk&q=$lng,$lat";
                                // echo(floatval($lng) . "<br>");
                                // die;
                                $map = "https://www.google.com/maps/embed/v1/place?key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk&q=$lat,$lng";
                            @endphp
                            {{-- <iframe src="https://www.google.com//maps?q='.$lat.','.$lng.'.&z=15&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            <iframe src="{{ $map }}"></iframe>
                        </div>
                        {{-- <div class="features bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fa-light fa-file-check"></i> Features</h4>
                            <ul>
                             
                            </ul>
                        </div>
                    </div> --}}
                    {{-- <div class="bottomList mainSpec">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-gift"></i> Specification</h4>
                            <ul>
                                <li>Exterior <span> <i class="circleI" style="background:blue;"></i> {{$vehicle->vehicle_color}}</span></li>
                                <li>Interior <span>{{$vehicle->vehicleInformation->interior}}</span></li>
                                <li>Body Type <span>{{$vehicle->vehicleInformation->body_type}}</span></li>
                                <li>Transmission <span>{{$vehicle->vehicle_type}}</span></li>
                                <li>Fuel <span>{{$vehicle->vehicle_tank}}</span></li>
                                <li>Engine Size <span>{{$vehicle->vehicleInformation->engine_size}}</span></li>
                            </ul>
                        </div>
                    </div> --}}
                        
                        {{-- <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-wrench"></i> Service History</h4>
                            <ul>
                                <li>Service record <span>Full</span></li>
                                <li>Main dealer services <span>3</span></li>
                                <li>Independent dealer service <span>3</span></li>
                            </ul>
                        </div>
                    </div> --}}
                        
                        
                        
                        {{-- <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-circle-notch"></i> Wheels and Tyres</h4>
                            <ul>
                                <li>Tyre Problems <span>2.</span></li>
                                <li>Scuffed alloys <span>3.</span></li>
                                <li>Tool Pack <span>{{$toolpack->title}}</span></li>
                                <li>Locking Wheel nut <span>{{$LockingWheelNut->title}}</span></li>
                            </ul>
                        </div>
                    </div> --}}
                        
                        {{-- <div class="vehicleDetailGal">
                        <h4>Tyre Treads</h4>
                        <div class="vehicleDetailGalrepeatMain">
                            <div class="imgVehicle">
                                <img src="{{ URL::asset('frontend/seller/assets/image//box-1.png') }}" alt="">
                            </div>
                            <div class="imgVehicle"> 
                                <img src="{{ URL::asset('frontend/seller/assets/image//box-1.png') }}" alt="">
                            </div>
                            <div class="imgVehicle">
                                <img src="{{ URL::asset('frontend/seller/assets/image//box-1.png') }}" alt="">
                            </div>
                            <div class="imgVehicle">
                                <img src="{{ URL::asset('frontend/seller/assets/image//box-1.png') }}" alt="">
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="col-12">
                        <div class="bottomList mainSpec">
                                <div class="bottomListTitle">
                                    <h4><i class="far fa-copy"></i> Vehicle History</h4>
                                    <ul>
                                        <li>Keys<span><i class="fas fa-exclamation-triangle"></i>
                                                {{ $vehicle->DealerVehicleHistory->keys }}</span></li>
                                        <li>VAT <span>{{ $vehicle->DealerAdvertVehicleDetail->vat }}</span>
                                        <li>Previous Owners <span>{{ $vehicle->DealerVehicleHistory->previous_owners }}</span>
                                        </li>
                                        {{-- <li>Service History
                                            <span>{{ $vehicle->DealerVehicleHistory->service_history_title }}</span>
                                        </li> --}}
                                        <li>Mileage<span>{{ $vehicle->vehicle_mileage }}</span></li>
                                        <li>V5 Status<span>{{ $vehicle->DealerVehicleHistory->v5_status }}</span></li>
                                        <li>Origin<span>{{ $vehicle->DealerVehicleHistory->origin }}</span></li>
                                        {{-- <li>Interior<span>{{ $vehicle->DealerVehicleHistory->interior }}</span></li>
                                        <li>Exterior<span>{{ $vehicle->DealerVehicleHistory->exterior }}</span></li>
                                        <li>Audio and
                                            Communications<span>{{ $vehicle->DealerVehicleHistory->audio_and_communications }}</span>
                                        </li>
                                        <li>Drivers
                                            Assistance<span>{{ $vehicle->DealerVehicleHistory->drivers_assistance }}</span>
                                        </li> --}}
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
                                        {{-- <li>Illumination<span>{{ $vehicle->DealerVehicleHistory->illumination }}</span></li>
                                        <li>Performance<span>{{ $vehicle->DealerVehicleHistory->performance }}</span></li>
                                        <li>Safety and
                                            Security<span>{{ $vehicle->DealerVehicleHistory->safety_and_security }}</span></li> --}}

                                    </ul>
                                </div>
                            </div>
                        </div>
                    <div class="col-12">
                        <div class="bottomList">
                            <div class="bottomListTitle">
                                <h4><i class="fas fa-bolt"></i> Condition And Damages</h4>
                                <ul>
                                    {{-- <li>Estimated Cost<span>{{ $vehicle->DealerVehicleMedia->condition_damage }}</span> --}}
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
                                    {{-- <li>Nearside Front<span>{{ $vehicle->DealerVehicleMedia->nearside_front }}</span></li>
                                    <li>Nearside Rear<span>{{ $vehicle->DealerVehicleMedia->nearside_rear }}</span></li>
                                    <li>Offside Front <span>{{ $vehicle->DealerVehicleMedia->offside_front }} </span></li>
                                    <li>Offside Rear<span>{{ $vehicle->DealerVehicleMedia->offside_rear }}</span></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
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
                                    <li>Passenger Back Door<span>{{$vehicle->DealerVehicleInteriorDetails->passenger_back_door ?? 'No Damage'}}</span></li>
                                <li>Back Driver Door<span>{{$vehicle->DealerVehicleInteriorDetails->driver_back_door ?? 'No Damage'}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
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
                                    <li>Wind screen<span>{{$vehicle->DealerVehicleExteriorDetails->windscreen ?? 'No Damage'}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bottomList">
                            <div class="bottomListTitle">
                                <h4><i class="fas fa-wrench"></i>&nbsp;&nbsp;Service History</h4>
                                <ul>
                                    <li>Service Record
                                        <span>{{ $vehicle->DealerVehicleHistory->service_history_title }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bottomList">
                            <div class="bottomListTitle">
                                <h4><i class="fas fa-pound-sign"></i>&nbsp;&nbsp;Estimated Cost</h4>
                                <ul>
                                    <li>Estimated Prepration Cost ( please provide estimated prep cost if any) 
                                        <span>{{ $vehicle->DealerVehicleMedia->condition_damage ?? 'No Cost'}}</span>
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
                        
                            
                        
                    </div>
                    <div class="col-lg-4 vehicleDetailRight">
                        <div class="liveSalesInProgress live_sell" id="vehBox">
                            <h4>Live Sales In Progress</h4>
                            <div class="reserveDetail">
                                <ul>
                                    <li>Reserve Price: <span>£{{ $vehicle->vehicle_price }}</span></li>
                                    <ul class="valuation">
                                        <li id="dynamic-ar" ><strong>Valuation </strong><span><i class="far fa-arrow-alt-circle-down" style="cursor: pointer;"></i></span></li>
                                        <li class="hidden">Retail:<span> £{{ $vehicle->retail_price }} </span></li>
                                        <li class="hidden">Clean:<span> £{{ $vehicle->clean_price }} </span></li>
                                        <li class="hidden">Average:<span> £{{ $vehicle->average_price }} </span></li>
                                    </ul>
                                    <!--<li>Live Salaes end <span>3h 53m 26s <a href="#">-->
                                    <li class="sale-timer"><div id="countdown"> <a href="#">
                                                @if ($allbid)
                                                    {{ $allbid }}
                                                @else
                                                    No Bid Yet
                                                @endif
                                            </a></div></li>
                                </ul>
                                <?php
                           $bid = App\Models\DealersOrderVehicleRequest::where('vehicle_id',$vehicle->id)->where('user_id',\Auth::user()->id)->first();
                            if($bid == null){
                            
                            ?>
                                @if ($vehicle->user_id == Auth::user()->id)
                                    <h2 class="text text-danger  p-2 dealerOwnVehilcle">This Is Your Own Vehicle</h2>
                                @else
                                    <form action="#">
                                        <div class="form-group">
                                            <label>Enter Maximum Bid</label>
                                            <input type="number" name="bid" placeholder="£" class="bid_price" />
                                            <input type="hidden" name="hidden_price" class="hidden_price"
                                                value="{{ $vehicle->hidden_price }}" />
                                            <input type="hidden" name="vehicle_id" class="vehicle_id"
                                                value="{{ $vehicle->id }}" />
                                            <div class="spinner-border" style="margin-left: 150px; " role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <button type="button" class="bid">Submit Bid</button>
                                            <span class="text-danger warning"></span>
                                            <span class="text-danger error"></span>
                                        </div>
                                    </form>
                                @endif
                                <?php }
                           else{

                            
                            ?>
                                {{-- <center><span class="text-danger ">You Already Bid On This Vehicle</span> --}}
                                </center>
                                <center><span class="text-danger "> You've already placed a bid on this car. 
                                    Your bid is for £
                                    
                                     {{ $bid->bid_price }}</span>
                                </center>
                                <center><a href="{{ route('cancelDealerRequest', $bid->id) }}"
                                        class="btn btn-danger btn-sm"> Cancel Bid</a>
                                </center>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".spinner-border").hide();
            $("form").submit(function(e) {
                e.preventDefault();
            });
            $(".bid").click(function() {

                var BidPrice = $(".bid_price").val();
                var HiddenPrice = $(".hidden_price").val();
                var VehicleId = $(".vehicle_id").val();
                console.log(BidPrice, HiddenPrice);
                // console.log(BidPrice <= HiddenPrice);
                if (!(BidPrice <= HiddenPrice)) {

                    $.ajax({

                        url: '{{ route('orderVehicleRequest') }}',
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            BidPrice: BidPrice,
                            HiddenPrice: HiddenPrice,
                            VehicleId: VehicleId
                        },

                        success: function(response) {

                            var resultData = response;
                            console.log(resultData)

                            if (resultData != null) {
                                $(".spinner-border").show();
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                                toastr.success(resultData.success);
                            } else {
                                $(".error").html('');
                                $(".error").html('Something Error');
                            }

                        },



                    });


                } else {
                    console.log(HiddenPrice++)
                    $(".warning").html('');
                    $(".warning").html('minimum bid required '+HiddenPrice+' or more ');
                }
            });

            $(".hidden").hide();
            $("#dynamic-ar").click(function() {
                
                $(".hidden").toggle();
            });
        });
    </script>
@endsection
