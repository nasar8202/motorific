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
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->front ?? "") }}">
            </div>
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->front ?? "") }}">
            </div>
            <div class="sliderImgVehicleDetailRepeater">
                <img src="{{ asset('/vehicles/vehicles_images/'.$vehicle->VehicleImage->front ?? "") }}">
            </div>
        </div>
    </section>
    <section class="sec-2 productPageTn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12 vehicleDetailLeft">
                    <div class="numberStarDiv">
                        <span> D3 OTY</span>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="titleVehicle">
                        <h2>Ferrari GTC4 Lusso TV8</h2>
                        <p>Gold(grade)<span>.</span>2019<span>.</span>22,647 miles<span>.</span>Petrol<span>.</span>Manula</p>
                    </div>
                    <div class="mapAndText">
                        <p><strong>Collection:</strong> Available immediately</p>
                        <p><strong>Location:</strong> Marlow, Buckinghamshire (9 miles away)</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1735296.3457931995!2d-2.163602670085061!3d53.0821386019051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487661882e969811%3A0xb25284f05eccc5c2!2sMarlow%2C%20UK!5e0!3m2!1sen!2s!4v1667457325449!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="features bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fa-light fa-file-check"></i> Features</h4>
                            <ul>
                                <li><i class="fa-solid fa-map"></i> Sat Nav</li>
                                <li><i class="fas fa-sun"></i> Panoramic roof</li>
                                <li><i class="fas fa-temperature-up"></i> Heated Seats</li>
                                <li><i class="fas fa-camera"></i>Parking camera</li>
                                <li><i class="fas fa-volume-down"></i> Upgraded Sound System </li>
                                <li>Additional Spec <i class="fas fa-chevron-down"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bottomList mainSpec">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-gift"></i> Specification</h4>
                            <ul>
                                <li>Exterior <span> <i class="circleI" style="background:blue;"></i> Blue</span></li>
                                <li>Interior <span>Full Leather</span></li>
                                <li>Body Type <span>Coupe</span></li>
                                <li>Transmission <span>Manual</span></li>
                                <li>Fuel <span>Petrol</span></li>
                                <li>Engine Size <span>3855 cc</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bottomList mainSpec">
                        <div class="bottomListTitle">
                            <h4><i class="far fa-copy"></i> Vehicle Details</h4>
                            <ul>
                                <li>HPI history check <span><i class="fas fa-exclamation-triangle"></i> 2 alerts <a href="#">details</a></span></li>
                                <li>Registration <span>D3 OTY</span></li>
                                <li>VIN <span>ZFF82YNC000247970</span></li>
                                <li>First Registered<span>11/07/2019</span></li>
                                <li>Keeper Start Date<span>16/07/2021</span></li>
                                <li>Last MOT Date<span>21/06/2022</span></li>
                                <li>Previous Owners<span>2</span></li>
                                <li>Number of Keys<span>2</span></li>
                                <li>On Finance<span>Yes</span></li>
                                <li>Private Plate<span>Yes</span></li>
                                <li>Seller Keeping Plate<span>Yes</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-wrench"></i> Service History</h4>
                            <ul>
                                <li>Service record <span>Full</span></li>
                                <li>Main dealer services <span>3</span></li>
                                <li>Independent dealer service <span>3</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-bolt"></i> Condition and damage</h4>
                            <ul>
                                <li>Exterior Grade <span>Gold <a href="#">details</a></span></li>
                                <li>Scratches and Scuffs <span>No</span></li>
                                <li>Dents <span>No</span></li>
                                <li>Paintwork Problems <span>No</span></li>
                                <li>Windscreen damage <span>No</span></li>
                                <li>Broken/Missing lights, Mirrors, Trim or fittings <span>No</span></li>
                                <li>Warning Lights on dashboard <span>No</span></li>
                                <li>Smoking in vehicle <span>3</span></li>
                                <li>Additional Information <span>Date Tested <br/> 21/06/2022 <br/> Monitor and repair if necessary offside front widescreen wiper blade defective(3,4(b)(i)) <br/> Reflected <br/> Original Reg: RN190EO</span></li>
                                <li>Service record <span>Full</span></li>
                                <li>Main dealer services <span>3</span></li>
                                <li>Independent dealer service <span>3</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bottomList">
                        <div class="bottomListTitle">
                            <h4><i class="fas fa-circle-notch"></i> Wheels and Tyres</h4>
                            <ul>
                                <li>Tyre Problems <span>2.</span></li>
                                <li>Scuffed alloys <span>3.</span></li>
                                <li>Tool Pack <span>Yes</span></li>
                                <li>Locking Wheel nut <span>Yes</span></li>
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
                    </div>
                </div> 
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 vehicleDetailRight">
                    <div class="liveSalesInProgress">
                        <h4>Live Sales In Progress</h4>
                        <div class="reserveDetail">
                            <ul>
                                <li>Reserve Price: <span>€144,939</span></li>
                                <li>valuation <span><i class="fas fa-chevron-down"></i></span></li>
                                <li>Live Salaes end <span>3h 53m 26s <a href="#">1 Bid</a></span></li>
                            </ul>
                            <form>
                                <div class="form-group">
                                    <label>Enter Maximum Bid</label>
                                    <input type="number" name="bid" placeholder="€"/>
                                    <button type="submit">Submit Bid</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection


