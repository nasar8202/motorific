@extends('frontend.dealer.layouts.app')
@section('title','Seller details')
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
                                <li>Full Name <span>{{$user->name}}</span></li>
                                <li>Email <span>{{$user->email}}</span></li>
                                <li>Phone Number <span>{{$user->phone_number}}</span></li>
                                <li>Address <span>{{$user->address??""}}</span></li>
                                <li>House Name And Number <span>{{$allVehicles->vehicleInformation->additional_information??""}}</span></li>
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
                    @if($pricing->dealer_status == null)
                    <div class="bottomList">
                        <button class="btn btn-info meeting">Schedule A Meeting</button>
                        <button class="btn btn-danger cancelRequest">Cancel purchase </button>
                        <div class="form-group mt-4 reviewSection">
                            <form method="POST" action="{{route('reviewForCancel')}}" enctype="multipart/form-data">
                                @csrf
                            <span>Why You Want To Cancel This Vehicle ?</span>
                            <input type="hidden" name="vehicle_id" value="{{$allVehicles->id}}">
                            <input type="hidden" name="user_id" value="{{$current}}">
                            <input type="hidden" name="role" value="{{$role}}">

                            <input type="hidden" name="bided" value="{{$bided ??''}}">
                                                        <input type="hidden" name="order_id" value="{{$pricing->id}}">
                            <textarea class="form-control" name="reviews" id="exampleFormControlTextarea1" required rows="3"></textarea>
                            @if ($errors->has('reviews'))
                            <span class="text-danger">{{ $errors->first('reviews') }}</span>
                            @endif
                            <br>
                            <span>Add Image For Cancel Evidence</span>
                            <input type="file" class="form-control" name="cancelImages[]" multiple >
                            @if ($errors->has('cancelImages'))
                            <span class="text-danger">{{ $errors->first('cancelImages') }}</span>
                            @endif
                            <br>
                        <button type="submit" class="btn btn-info mt-4 float-left">Submit Review</button>
                    </form>
                    </div>

                    <div class="form-group mt-4 meetingDiv">
                        <form method="POST" action="{{route('scheduleMeeting')}}">
                            @csrf
                        @if(Auth::user()->id == $pricing->user_id)
                        @if($pricing->meeting_date_time == null)

                        <span>Schedule Your Date With Seller ?</span>
                        <input type="hidden" name="order_id" value="{{$pricing->id}}">
                        <input type="hidden" name="bided" value="{{$bided ??''}}">
                        <input type="datetime-local" class="form-control mt-4" name="date_time" required >
                        <br><button type="submit" class="btn btn-info mt-4 float-left">Schedule Meeting</button>

                        @else
                        <span> Your Meeting Is Already Set On <b>{{$pricing->meeting_date_time}}</b></span>
                        <br>
                        <small>If You Want To Rescedule.</small>
                        <input type="hidden" name="order_id" value="{{$pricing->id}}">
                        <input type="hidden" name="bided" value="{{$bided ??''}}">
                        <input type="datetime-local" class="form-control mt-4" name="date_time"  required >
                        <br><button type="submit" class="btn btn-info mt-4 float-left">Reschedule Meeting</button>
                        @endif
                        @endif
                </form>
                </div>
                    </div>
                    @endif
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
                         <!-- <h4 class="bg bg-danger">Sold</h4>  -->
                        <div class="reserveDetail">



                            <form action="#">
                                <div class="form-group">
                                   <center> <a href="{{route('completedVehicleDetails',$allVehicles)}}"> <img src="{{ asset('/vehicles/vehicles_images/'.$allVehicles->VehicleImage->dashboard ?? "") }}" width="350px"></a>
                                   </center>

                                   <br>
                                 <div class="container">
                                      <h2 class="text text-warning">{{$allVehicles->vehicle_registartion_number}}</h2>
                                      <h5>{{$allVehicles->vehicle_name}}</h5>
                                      <p>{{$allVehicles->vehicle_year}} . {{$allVehicles->vehicle_mileage}} . {{$allVehicles->vehicle_tank}} . {{$allVehicles->vehicle_type}}</p>
                                    </div>
                                    <br>
                                    @if($pricing->dealer_status == null)
                                    <div class="container">
                                    <center><h5 type="button" >You Have Succesfully Purchase This Vehicle ?</h5>
                                  @if($allVehicles->all_auction == null)
                                    <a href="{{route('BidedStatus',$allVehicles->id)}}"> <span class="badge bg-success btn" role="button">Confirm Purchase ✓</span></center></a>
                                    @else
                                    <a href="{{route('requestedOrderStatus',$allVehicles->id)}}"> <span class="badge bg-success">Yes ✓</span></center></a>
                                    @endif
                                    <span class="text-danger warning"></span>
                                    <span class="text-danger error"></span>
                                    </div>
                                    @else
                                    <button type="button" >Purchased  ✓</button>
                                    @endif</div>
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
    $(".meetingDiv").hide();
    $(".cancelRequest").click(function(){
        $(".meetingDiv").hide();
        $(".reviewSection").show();
    });
    $(".meeting").click(function(){
        $(".reviewSection").hide();
      $(".meetingDiv").show();
  });
</script>
@endsection


