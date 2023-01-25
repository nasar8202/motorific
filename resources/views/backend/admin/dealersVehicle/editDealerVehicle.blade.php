
@extends('backend.admin.layouts.app')
@section('title','add wheel nut ')
@section('secton')
<style>
    .container {
          max-width: 1200px;
      }
      body {
  font-family: arial;
}
.hide {
  display: none;
}
p {
  font-weight: bold;
}
  </style>
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<div class="page-heading">
    
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="fs-head">View And Update Dealer's Vehicle Details</h3>
                <p class="text-subtitle text-muted">View And Update Dealer's Vehicle Details</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View And Update Dealer's Vehicle Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
  
 <div class="row dealer_vehicle_images">
     
     @forelse($vehicle->DealerVehicleExterior as $exteriorimage)
     
     <div class="col-md-3 col-sm-6">
                    <img width="400px" height="200px" src="{{ asset('/uploads/DealerVehicles/exterior/'.$exteriorimage->exterior_image ?? "") }}">
              </div>
                @empty
                @endforelse
                @forelse($vehicle->DealerVehicleInterior as $interiorimage)
          <div class="col-md-3 col-sm-6">
                    <img width="400px" height="200px" src="{{ asset('/uploads/DealerVehicles/interior/'.$interiorimage->interior_image ?? "") }}">
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

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12 vehicleDetailLeft">
            <div class="numberStarDiv">
                <span>{{$vehicle->vehicle_registartion_number}}</span>
                <i class="fa-regular fa-star"></i>
            </div>
            <div class="titleVehicle">
                <h2 class="fs-head">{{$vehicle->vehicle_name}}</h2>
                <p>{{$vehicle->vehicle_color}}.<span>{{$vehicle->vehicle_year}}</span><span>.</span>{{$vehicle->vehicle_mileage}}<span>.</span>{{$vehicle->vehicle_tank}}<span>.</span>{{$vehicle->vehicle_type}}</p>
            </div>
            <div class="mapAndText">
                <p><strong>Collection:</strong> Available immediately</p>
                <p><strong>Location:</strong> {{$vehicle->location ?? ''}} (9 miles away)
                
                
                </p>
            </div>
            <div class="features bottomList">
                <div class="bottomListTitle">
                    <h4><i class="fa-light fa-file-check"></i> Features</h4>
                    <ul>
                     
                    </ul>
                </div>
            </div>
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
            <div class="bottomList mainSpec">
                <div class="bottomListTitle">
                    <h4><i class="far fa-copy"></i> Vehicle History</h4>
                    <ul>
                        <li>Keys<span><i class="fas fa-exclamation-triangle"></i> {{$vehicle->DealerVehicleHistory->keys}}</span></li>
                        <li>Previous Owners <span>{{$vehicle->DealerVehicleHistory->previous_owners}}</span></li>
                        <li>Service History <span>{{$vehicle->DealerVehicleHistory->service_history_title}}</span></li>
                        <li>Mileage<span>{{$vehicle->DealerVehicleHistory->mileage}}</span></li>
                        <li>V5 Status<span>{{$vehicle->DealerVehicleHistory->v5_status}}</span></li>
                        <li>Origin<span>{{$vehicle->DealerVehicleHistory->origin}}</span></li>
                        <li>Interior<span>{{$vehicle->DealerVehicleHistory->interior}}</span></li>
                        <li>Exterior<span>{{$vehicle->DealerVehicleHistory->exterior}}</span></li>
                        <li>Audio and Communications<span>{{$vehicle->DealerVehicleHistory->audio_and_communications}}</span></li>
                        <li>Drivers Assistance<span>{{$vehicle->DealerVehicleHistory->drivers_assistance}}</span></li>
                        <li>More Details<span>{{$vehicle->DealerVehicleHistory->checkbox_questions}}</span></li>
                        <li>Illumination<span>{{$vehicle->DealerVehicleHistory->illumination}}</span></li>
                        <li>Performance<span>{{$vehicle->DealerVehicleHistory->performance}}</span></li>
                        <li>Safety and Security<span>{{$vehicle->DealerVehicleHistory->safety_and_security}}</span></li>
                   
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
            <div class="bottomList">
                <div class="bottomListTitle">
                    <h4><i class="fas fa-bolt"></i> Condition And Damages</h4>
                    <ul>
                        <li>Condition / Damage<span>{{$vehicle->DealerVehicleMedia->condition_damage}}</span></li>
                        <li>Condition / Damage URL <span>{{$vehicle->DealerVehicleMedia->condition_damage_url}}</span></li>
                        <li>Do you have existing condition report?<span>{{$vehicle->DealerVehicleMedia->existing_condition_report}}</span></li>
                        <li>Is there any damage on your vehicle? <span>{{$vehicle->DealerVehicleMedia->any_damage_checked}}</span></li>
                        <li>Advert description <span>{{$vehicle->DealerVehicleMedia->advert_description}}</span></li>
                        <li>Attention Grabber <span>{{$vehicle->DealerVehicleMedia->attention_grabber}}</span></li>
                        <li>Nearside Front<span>{{$vehicle->DealerVehicleMedia->nearside_front}}</span></li>
                        <li>Nearside Rear<span>{{$vehicle->DealerVehicleMedia->nearside_rear}}</span></li>
                        <li>Offside Front <span>{{$vehicle->DealerVehicleMedia->offside_front}} </span></li>
                        <li>Offside Rear<span>{{$vehicle->DealerVehicleMedia->offside_rear}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="bottomList">
                <div class="bottomListTitle">
                    <h4><i class="fas fa-bolt"></i>Interior Information</h4>
                    <ul>
                        <li>Dashboard<span>{{$vehicle->DealerVehicleInteriorDetails->dashboard ?? 'No Detail' }}</span></li>
                        <li>Passenger Side Interior <span>{{$vehicle->DealerVehicleInteriorDetails->passenger_side_interior ?? 'No Detail'}}</span></li>
                        <li>Driver Side Interior<span>{{$vehicle->DealerVehicleInteriorDetails->driver_side_interior ?? 'No Detail'}}</span></li>
                        <li>Floor<span>{{$vehicle->DealerVehicleInteriorDetails->floor ?? 'No Detail'}}</span></li>
                        <li>Ceiling <span>{{$vehicle->DealerVehicleInteriorDetails->ceiling ?? 'No Detail'}}</span></li>
                        <li>Boot<span>{{$vehicle->DealerVehicleInteriorDetails->boot ?? 'No Detail'}}</span></li>
                        <li>Rear Windscreen<span>{{$vehicle->DealerVehicleInteriorDetails->rear_windscreen ?? 'No Detail'}}</span></li>
                        <li>Passenger Seat<span>{{$vehicle->DealerVehicleInteriorDetails->passenger_seat ?? 'No Detail'}}</span></li>
                        <li>Driver Seat <span>{{$vehicle->DealerVehicleInteriorDetails->driver_seat ?? 'No Detail'}} </span></li>
                        <li>Rear Seats<span>{{$vehicle->DealerVehicleInteriorDetails->rear_seats ?? 'No Detail'}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="bottomList">
                <div class="bottomListTitle">
                    <h4><i class="fas fa-bolt"></i>Exterior Information</h4>
                    <ul>
                        <li>Front Door Left<span>{{$vehicle->DealerVehicleExteriorDetails->front_door_left ?? 'No Detail' }}</span></li>
                        <li>Back Door Left <span>{{$vehicle->DealerVehicleExteriorDetails->back_door_left ?? 'No Detail'}}</span></li>
                        <li>Front Door Right<span>{{$vehicle->DealerVehicleExteriorDetails->front_door_right ?? 'No Detail'}}</span></li>
                        <li>Back Door Right<span>{{$vehicle->DealerVehicleExteriorDetails->back_door_right	 ?? 'No Detail'}}</span></li>
                        <li>Top <span>{{$vehicle->DealerVehicleExteriorDetails->top ?? 'No Detail'}}</span></li>
                        <li>Bonut<span>{{$vehicle->DealerVehicleExteriorDetails->bonut ?? 'No Detail'}}</span></li>
                        <li>Front<span>{{$vehicle->DealerVehicleExteriorDetails->front ?? 'No Detail'}}</span></li>
                        <li>Back<span>{{$vehicle->DealerVehicleExteriorDetails->back ?? 'No Detail'}}</span></li>
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
            </div> --}}
            <div class="vehicleDetailGal">
                <h4>Wheels</h4>
                <div class="vehicleDetailGalrepeatMain row dealer_vehicle_images">
                    @forelse($vehicle->DealerVehicleTyre as $wheel)
                    <div class="col-md-4 col-sm-6">
                        <div class="imgVehicle">
                            <img  width="400px" height="200px"  src="{{ asset('/uploads/DealerVehicles/tyres/'.$wheel->tyre_image ?? "") }}" alt="">
                        </div>
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
        </div> 
        
    </div>
    <br>
    <section id="multiple-column-form" class="mt-4">
        <div class="row match-height vehicle_form">
            <form class="form" method="post" action="{{route('dealerVehicleUpdatePrice',$vehicle->id)}}" >
                @csrf
            <div class="col-12">
               
               
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Vehicle Prices for Sell</h4>
                            </div>

                            <div class="card-content" >
                                <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="retail_price">Vehicle Detail Price </label>
                                                    <input type="number" id="retail_price" value=""  class="form-control"
                                                       name="retail_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('retail_price'))
                                                <span class="text-danger">{{ $errors->first('retail_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="clean_price">Vehicle Clean Price </label>
                                                    <input type="number" id="clean_price" value=""  class="form-control"
                                                       name="clean_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('clean_price'))
                                                <span class="text-danger">{{ $errors->first('clean_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="average_price">Vehicle Average Price </label>
                                                    <input type="number" id="average_price" value=""  class="form-control"
                                                       name="average_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('average_price'))
                                                <span class="text-danger">{{ $errors->first('average_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="hidden_price">Vehicle Hidden Price </label>
                                                    <input type="number" id="hidden_price" value=""  class="form-control"
                                                       name="hidden_price" placeholder="" >

                                                </div>
                                                @if ($errors->has('hidden_price'))
                                                <span class="text-danger">{{ $errors->first('hidden_price') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit"
                        class="btn btn-primary me-1 mb-1">Update Vehicle</button>
                    <button type="reset"
                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </div>

        </div>
    </form>
    </section>

</div>
<script type="text/javascript">

function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
$(document).on('change', '.commonCheck', function () {

        document.getElementById('div1').style.display = 'block';

});

$('#liveSell').prop('checked', true).trigger('change');
</script>
@endsection
