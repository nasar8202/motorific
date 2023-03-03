@extends('frontend.dealer.layouts.app')
@section('title','Browse Vehicle the with Motorific')
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
                <div class="col-lg-8 vehicleDetailLeft">
                    <div class="row">
                        <div class="col-12">
                            <div class="numberStarDiv">
                        <span>{{$vehicle->vehicle_registartion_number}}</span>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="titleVehicle">
                        <h2>{{$vehicle->vehicle_name}}</h2>
                        <ul class="vehicle-list">
                            <li>{{$vehicle->vehicle_year}}</li>
                            <li>{{$vehicle->vehicle_mileage}} Miles</li>
                            <li>{{$vehicle->vehicle_color}}</li>
                            <li>{{$vehicle->vehicle_type}}</li>
                            <li>{{$vehicle->vehicle_tank}}</li>
                        </ul>

                    </div>
                    <div class="mapAndText">
                        {{-- <p><strong>Collection:</strong> Available immediately</p> --}}
                        <p><strong>Location:</strong> {{$vehicle->vehicleInformation->location}} ({{$distance ?? ''}} miles away)
                        </p>
                        @php
                        // $variable = "https://www.google.com/maps/embed/v1/place?key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk&q=$lng,$lat";
                        // echo(floatval($lng) . "<br>");
                        // die;
                        $map = "https://www.google.com/maps/embed/v1/place?key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk&q=$lat,$lng";
                        @endphp
                        {{-- <iframe src="https://www.google.com//maps?q='.$lat.','.$lng.'.&z=15&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        <iframe src="{{$map}}"></iframe>   
                        {{-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk&q=68.3644298,25.3605804"></iframe>    --}}
                        
                        {{-- @dd($lat,$lng) --}}
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
                        <div class="col-12">
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
                </div>
                <div class="col-12">
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
                </div>
                <div class="col-12">
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
                </div>
                <div class="col-12">
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
                </div>
                <div class="col-12">
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
                </div>
                <div class="col-12">
                    <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-wrench"></i>Service History</h4>
                            <ul>
                                <li>Service Record<span>First service not yet due</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    </div>

                </div> 
                <div class="col-lg-4 vehicleDetailRight">
                    <div class="liveSalesInProgress" id="vehBox">
                        <h4>Live Sales In Progress</h4>
                        <div class="reserveDetail vehicle">
                            <ul >
                                <li>Reserve Price: <span>£{{$vehicle->vehicle_price}}</span></li>
                                @if($vehicle->all_auction == 'all')
                                <li>Total Offers: <span>{{$allorder ??'No Offers Yet'}}</span></li>
                                <li >Higesht Offer<span> <a href="#">@if(isset($order->request_price)) {{$order->request_price}}@endif</a></span></li>
                                @else
                                <li>Total Bids: <span>{{$allbids??'No Bids Yet'}}</span></li>
                                <li >Live Sales end <span>3h 53m 26s <a href="#"></a></span></li>
                                @endif
                                <ul class="valuation">
                                    <li >valuation <span><i class="fas fa-chevron-down" id="dynamic-ar"></i></span></li>
                                    <li class="hidden">Retail:<span> £{{$vehicle->retail_price}} </span></li>
                                    <li class="hidden">Clean:<span> £{{$vehicle->clean_price}} </span></li>
                                    <li class="hidden">Average:<span> £{{$vehicle->average_price}} </span></li>
                                </ul>
                            </ul>
                            <?php
                           $bid = App\Models\BidedVehicle::where('vehicle_id',$vehicle->id)->where('user_id',\Auth::user()->id)->first();
                           $order = App\Models\OrderVehicleRequest::where('vehicle_id',$vehicle->id)->where('user_id',\Auth::user()->id)->first();
                            
                           if($bid == null && $order == null){
                            
                            ?>
                            
                            <form  action="#" >
                                <div class="form-group">
                                    <label>Enter Maximum Bid</label>
                                    <input type="number" name="bid" placeholder="£" class="bid_price" />
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
                            <center class="info_txt mt-2"><span class="text-center">You Already Request On This Vehicle</span>
                            </center>  
                            <input type="hidden" name="hidden_price" class="hidden_price" value="{{$vehicle->hidden_price}}" />
                                     
                            <center class="info_txt mb-2"><span class="info_txt text-center ">Your Request Price Is <span class="userRequestedPrice" > {{$order->request_price}} </span></span>
                            </center>   
                            <center><a data-id="{{$order->id}}" class="btn btn-success btn-sm updatePrice btn_success"> Update My Price</a>
                            <a href="{{route('cancelRequest',$order->id)}}" class="btn btn-danger btn-sm btn_danger"> Cancel My Request</a>
                            
                        </center>   
                        <br>    
                        <div class="input-group mb-3 requestPrice ">
                            <input type="number" class="form-control updatePriceInput" value="" placeholder="£" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
        $(".warning").html('Minimum Bid Require On This Vehicle Is '+HiddenPrice+'');
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
        $(".warning").html('Minimum Bid Require On This Vehicle Is '+HiddenPrice+'');
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


