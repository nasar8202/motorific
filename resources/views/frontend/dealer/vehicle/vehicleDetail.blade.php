@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->

<main class="topPadingPage">
    <section>
        <div class="sliderImgVehicleDetail">
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->front ?? "") }}">
            </div>
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->passenger_rare_side_corner ?? "") }}">
            </div>
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->driver_rare_side_corner ?? "") }}">
            </div>
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->dashboard ?? "") }}">
            </div>
        </div>
    </section>
    <section class="sec-2 productPageTn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12 vehicleDetailLeft">
                    <div class="numberStarDiv">
                        <span>{{$vehicle->vehicle_registartion_number}}</span>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="titleVehicle">
                        <h2>{{$vehicle->vehicle_name}}</h2>
                        <p>{{$vehicle->vehicle_color}}.<span>{{$vehicle->vehicle_year}}</span><span>.</span>{{$vehicle->vehicle_mileage}}<span>.</span>{{$vehicle->vehicle_tank}}<span>.</span>{{$vehicle->vehicle_type}}</p>
                    </div>
                    <div class="mapAndText">
                        {{-- <p><strong>Collection:</strong> Available immediately</p> --}}
                        <p><strong>Location:</strong> {{$vehicle->vehicleInformation->location}} (9 miles away)
                        
                        
                        </p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1735296.3457931995!2d-2.163602670085061!3d53.0821386019051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487661882e969811%3A0xb25284f05eccc5c2!2sMarlow%2C%20UK!5e0!3m2!1sen!2s!4v1667457325449!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="features bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fa-light fa-file-check"></i> Features</h4>
                            <ul>
                             <?php
                                foreach($vehcile_info_feature_id as $feature){
                                $VehicleFeature = App\Models\VehicleFeature::where('id',$feature)->first();
                                
                                ?>
                                <li><i class="fa-solid fa-map"></i> {{$VehicleFeature->title}}</li>
                             <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="bottomList mainSpec">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-gift"></i> Specification</h4>
                            <ul>
                                {{-- <li>Exterior <span> <i class="circleI" style="background:blue;"></i> {{$vehicle->vehicle_color}}</span></li> --}}
                                {{-- <li>Interior <span>{{$vehicle->vehicleInformation->interior}}</span></li> --}}
                                {{-- <li>Body Type <span>{{$vehicle->vehicleInformation->body_type}}</span></li> --}}
                                {{-- <li>Transmission <span>{{$vehicle->vehicle_type}}</span></li> --}}
                                <li>Fuel <span>{{$vehicle->vehicle_tank}}</span></li>
                                {{-- <li>Engine Size <span>{{$vehicle->vehicleInformation->engine_size}}</span></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="bottomList mainSpec">
                        <div class="bottomListTitle">
                            <h4><i class="far fa-copy"></i> Vehicle Details</h4>
                            <ul>
                                {{-- <li>HPI history check <span><i class="fas fa-exclamation-triangle"></i> {{$vehicle->vehicleInformation->HPI_history_check}}</span></li>
                                <li>Registration <span>{{$vehicle->vehicle_registartion_number}}</span></li>
                                <li>VIN <span>{{$vehicle->vehicleInformation->vin}}</span></li>
                                <li>First Registered<span>{{$vehicle->vehicleInformation->first_registered}}</span></li>
                                <li>Keeper Start Date<span>{{$vehicle->vehicleInformation->keeper_start_date}}</span></li>
                                <li>Last MOT Date<span>{{$vehicle->vehicleInformation->last_mot_date}}</span></li>
                                <li>Previous Owners<span>{{$vehicle->vehicleInformation->previous_owners}}</span></li> --}}
                                <li>Number of Keys<span>{{$number_of_keys->number_of_key}}</span></li>
                                <li>On Finance<span>{{$finance->title}}</span></li>
                                <li>Private Plate<span>{{$privateplate->title}}</span></li>
                                <li>Smooking<span>{{$smooking->title}}</span></li>
                                <li>Tool Pack<span>{{$toolpack->title}}</span></li>
                                <li>Locking Wheel Nut<span>{{$LockingWheelNut->title}}</span></li>
                                {{-- <li>Seller Keeping Plate<span>{{$vehicle->vehicleInformation->seller_keeping_plate}}</span></li> --}}
                            </ul>
                        </div>
                    </div>
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
                            <h4><i class="fas fa-bolt"></i> Condition and damage</h4>
                            <ul>
                                <li>Exterior Grade <span>{{$damage->exterior_grade}}</span></li>
                                <li>Scratches and Scuffs <span>{{$damage->scratches_and_scuffs}}</span></li>
                                <li>Dents <span>{{$damage->dents}}</span></li>
                                <li>Paintwork Problems <span>{{$damage->paintwork_problems}}</span></li>
                                <li>Windscreen damage <span>{{$damage->windscreen_damage}}</span></li>
                                <li>Broken/Missing lights, Mirrors, Trim or fittings <span>{{$damage->broken_missing}}</span></li>
                                <li>Warning Lights on dashboard <span>{{$damage->warning_lights_on_dashboard}}</span></li>
                                <li>Smoking in vehicle <span>{{$smooking->title}}</span></li>
                                <li>Additional Information <span>{{$vehicle->vehicleInformation->additional_information}} </span></li>
                                <li>Service record <span>{{$damage->service_record}}</span></li>
                                <li>Main dealer services <span>{{$damage->main_dealer_services}}</span></li>
                                <li>Independent dealer service <span>{{$damage->independent_dealer_service}}</span></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-bolt"></i>Interior Information</h4>
                            <ul>
                                <li>Dashboard<span>{{$interior->dashboard ?? 'No Damage' }}</span></li>
                                <li>Passenger Side Interior <span>{{$interior->passenger_side_interior ?? 'No Damage'}}</span></li>
                                <li>Driver Side Interior<span>{{$interior->driver_side_interior ?? 'No Damage'}}</span></li>
                                <li>Floor<span>{{$interior->floor ?? 'No Damage'}}</span></li>
                                <li>Ceiling <span>{{$interior->ceiling ?? 'No Damage'}}</span></li>
                                <li>Boot<span>{{$interior->boot ?? 'No Damage'}}</span></li>
                                <li>Rear Windscreen<span>{{$interior->rear_windscreen ?? 'No Damage'}}</span></li>
                                <li>Passenger Seat<span>{{$interior->passenger_seat ?? 'No Damage'}}</span></li>
                                <li>Driver Seat <span>{{$interior->driver_seat ?? 'No Damage'}} </span></li>
                                <li>Rear Seats<span>{{$interior->rear_seats ?? 'No Damage'}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-bolt"></i>Exterior Information</h4>
                            <ul>
                                <li>Front Door Left<span>{{$exterior->front_door_left ?? 'No Damage' }}</span></li>
                                <li>Back Door Left <span>{{$exterior->back_door_left ?? 'No Damage'}}</span></li>
                                <li>Front Door Right<span>{{$exterior->front_door_right ?? 'No Damage'}}</span></li>
                                <li>Back Door Right<span>{{$exterior->back_door_right	 ?? 'No Damage'}}</span></li>
                                <li>Top <span>{{$exterior->top ?? 'No Damage'}}</span></li>
                                <li>Bonut<span>{{$exterior->bonut ?? 'No Damage'}}</span></li>
                                <li>Front<span>{{$exterior->front ?? 'No Damage'}}</span></li>
                                <li>Back<span>{{$exterior->back ?? 'No Damage'}}</span></li>
                            </ul>
                        </div>
                    </div>
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
                    </div>
                    <div class="vehicleDetailGal">
                        <h4>Wheels</h4>
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
                    </div>
                    <div class="vehicleDetailGal">
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
                </div> 
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 vehicleDetailRight">
                    <div class="liveSalesInProgress">
                        <h4>Live Sales In Progress</h4>
                        <div class="reserveDetail">
                            <ul >
                                <li>Reserve Price: <span>€{{$vehicle->vehicle_price}}</span></li>
                                @if($vehicle->all_auction == 'all')
                                <li >Higesht Offer<span> <a href="#">@if(isset($order->request_price)) {{$order->request_price}}@endif</a></span></li>
                                @else
                                <li >Live Salaes end <span>3h 53m 26s <a href="#">1 Bid</a></span></li>
                                @endif
                                <li >valuation <span><i class="fas fa-chevron-down" id="dynamic-ar"></i></span></li>
                                <li class="hidden">Retail:<span> €{{$vehicle->retail_price}} </span></li>
                                <li class="hidden">Clean:<span> €{{$vehicle->clean_price}} </span></li>
                                <li class="hidden">Average:<span> €{{$vehicle->average_price}} </span></li>
                            </ul>
                            <?php
                           $bid = App\Models\BidedVehicle::where('vehicle_id',$vehicle->id)->where('user_id',\Auth::user()->id)->first();
                           $order = App\Models\OrderVehicleRequest::where('vehicle_id',$vehicle->id)->where('user_id',\Auth::user()->id)->first();
                            
                           if($bid == null && $order == null){
                            
                            ?>
                            
                            <form  action="#" >
                                <div class="form-group">
                                    <label>Enter Maximum Bid</label>
                                    <input type="number" name="bid" placeholder="€" class="bid_price" />
                                    <input type="hidden" name="hidden_price" class="hidden_price" value="{{$vehicle->hidden_price}}" />
                                    <input type="hidden" name="vehicle_id" class="vehicle_id" value="{{$vehicle->id}}" />
                                    <div class="spinner-border"  style="margin-left: 150px; " role="status">
                                        <span class="sr-only">Loading...</span>
                                      </div>
                                      @if($vehicle->all_auction == 'all')
                                      <button type="button" class="requestVehicle" >Request Price</button>
                                      @else
                                      <button type="button" class="bid">Submit Bid</button>
                                      @endif
                                    <span class="text-danger warning"></span>
                                    <span class="text-danger error"></span>
                                
                                </div>
                            </form>
                            <?php }
                           else{
                            
                            ?>
                            @if(isset($order))
                            <center><span class="text-danger ">You Already Request On This Vehicle</span>
                            </center>  
                            <input type="hidden" name="hidden_price" class="hidden_price" value="{{$vehicle->hidden_price}}" />
                                     
                            <center><span class="text-danger ">Your Request Price Is <span class="userRequestedPrice" > {{$order->request_price}} </span></span>
                            </center>   
                            <center><a data-id="{{$order->id}}" class="btn btn-success btn-sm updatePrice"> Update My Price</a>
                            <a href="{{route('cancelRequest',$order->id)}}" class="btn btn-danger btn-sm"> Cancel My Request</a>
                            
                        </center>   
                        <br>    
                        <div class="input-group mb-3 requestPrice ">
                            <input type="number" class="form-control updatePriceInput" value="" placeholder="€" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary updateAmount" type="button">Update</button>
                            </div>
                          </div>
                          <span class="text-danger same"></span>
                            @else
                            <center><span class="text-danger ">You Already Bid On This Vehicle</span>
                            </center>   
                            <center><span class="text-danger ">Your Bid Price Is {{$bid->bid_price}}</span>
                            </center>   
                            <center><a href="{{route('cancelBid',$bid->id)}}" class="btn btn-danger btn-sm"> Cancel Bid</a>
                            </center> 
                            @endif
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
  $(document).ready(function(){
    $(".spinner-border").hide();
    $(".requestPrice").hide();
    $("form").submit(function(e){
        e.preventDefault();
    });
    $(".requestVehicle").click(function(){
        var BidPrice = $(".bid_price").val();
        var VehicleId = $(".vehicle_id").val();
        var HiddenPrice = $(".hidden_price").val();
        if(!(BidPrice <= HiddenPrice)){
             $.ajax({

            url: '{{route("vehicleRequest")}}',
            type: 'post',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {BidPrice:BidPrice,VehicleId:VehicleId},

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
        $(".warning").html('Your Requested Amount Is Not Matching The Vehicle Criteria');
    }
    });
        
    $(".bid").click(function(){
        
    var BidPrice = $(".bid_price").val();
    var HiddenPrice = $(".hidden_price").val();
    var VehicleId = $(".vehicle_id").val();
    console.log(BidPrice,HiddenPrice);
    // console.log(BidPrice <= HiddenPrice);
    if(!(BidPrice <= HiddenPrice)){

         $.ajax({

            url: '{{route("bid")}}',
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


  $(".updatePrice").click(function(){
    var HiddenPrice = $(".hidden_price").val();
    console.log(HiddenPrice); 
    var id = $(".updatePrice").data("id");
    $(".requestPrice").show();
    
    var userRequestedPrice = $(".userRequestedPrice").text();
    console.log(userRequestedPrice);
    var a = $(".updatePriceInput").value === userRequestedPrice;
    
    $(".updateAmount").click(function(){
        var updateAmountPrice = $(".updatePriceInput").val(); 
       if(updateAmountPrice < HiddenPrice) {
   
        $(".same").html('');
        $(".same").html('Your Requested Amount is low');
      

        }
        else if(updateAmountPrice == parseInt(userRequestedPrice)) {
            $(".same").html('');
        $(".same").html('Your Requested Amount is same');
            console.log('else if');
        }
       else{
      
          $.ajax({

            url: '{{route("updateAmount")}}',
            type: 'post',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {updateAmountPrice:updateAmountPrice,id:id},

            success: function(response){

            var resultData = response;
            console.log(resultData)
            
            if(resultData != null){
                $(".spinner-border").show();
                setTimeout(function() {
                location.reload();
            }, 1000);
            toastr.success(resultData.success);
            $(".same").html('');
            }
            else{
                $(".error").html('');
        $(".error").html('Something Error');
            }
            
            },



            });

   
        }
        
    });

  });
});
</script>
@endsection


