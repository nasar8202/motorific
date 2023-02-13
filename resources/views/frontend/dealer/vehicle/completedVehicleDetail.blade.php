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
                <div class="col-lg-6">
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
                <div class="col-lg-6">
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
                <div class="col-lg-6">
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
                <div class="col-lg-6">
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


