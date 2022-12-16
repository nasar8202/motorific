@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->

<main class="topPadingPage">
   
    <section class="sec-2 productPageTn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12 vehicleDetailLeft">
             
                    <div class="bottomList mainSpec">
                        <div class="bottomListTitle">
                            <h4><i class="far fa-copy"></i> Contact Information</h4>
                            <ul>
                                <li>Full Name <span><i class="fas fa-exclamation-triangle"></i> {{$user->name}}</span></li>
                                <li>Email <span>{{$user->email}}</span></li>
                                <li>Phone Number <span>{{$user->phone_number}}</span></li>
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
                        <button class="btn btn-info">Update Requested Price</button>
                        <button class="btn btn-danger cancelRequest">Cancel My Request</button>
                        <div class="form-group mt-4 reviewSection">
                            <form method="POST" action="{{route('reviewForCancel')}}">
                                @csrf
                            <span>Why You Want To Cancel This Vehicle ?</span>
                            <input type="hidden" name="vehicle_id" value="{{$allVehicles->id}}">
                            <input type="hidden" name="user_id" value="{{$current}}">
                            pricing
                            <input type="hidden" name="order_id" value="{{$pricing->id}}">
                            <textarea class="form-control" name="reviews" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <button type="submit" class="btn btn-info mt-4 float-left">Submit Review</button>  
                    </form>    
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
                        <h4 class="bg bg-danger">Sold</h4>
                        <div class="reserveDetail">
                            
                           
                            
                            <form action="#">
                                <div class="form-group">
                                   <center>  <img src="{{ asset('/vehicles/vehicles_images/'.$allVehicles->VehicleImage->dashboard ?? "") }}">
                                   </center>
                                   
                                   <br>
                                 <div class="container">
                                      <h2 class="text text-warning">{{$allVehicles->vehicle_registartion_number}}</h2>
                                      <h5>{{$allVehicles->vehicle_name}}</h5>
                                      <p>{{$allVehicles->vehicle_year}} . {{$allVehicles->vehicle_mileage}} . {{$allVehicles->vehicle_tank}} . {{$allVehicles->vehicle_type}}</p>
                                    </div>
                                    <button type="button" >View Delivery Option</button>
                                    <span class="text-danger warning"></span>
                                    <span class="text-danger error"></span>
                                </div>
                            </form>
                            
                          
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(".reviewSection").hide();
    $(".cancelRequest").click(function(){
      
        $(".reviewSection").show();
    });
</script>
@endsection


