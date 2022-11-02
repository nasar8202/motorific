@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>

</style>

<!-- MultiStep Form -->

<section class="sec-2 productPageTn">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 productsFiltersCol">
            <div class="productsFilters">
                <form>
                    <h2>Filters</h2>
                    <div class="filterIn">
                        <h4>Type</h4>
                        <label class="checkboxCommon" for="typeAll">
                            <input type="radio" name="typePro" value="All" id="typeAll"/>
                            <span>All</span>
                        </label>
                        <label class="checkboxCommon" for="typeCar">
                            <input type="radio" name="typePro" value="Car" id="typeCar"/>
                            <span>Car</span>
                        </label>
                        <label class="checkboxCommon" for="typeVan">
                            <input type="radio" name="typePro" value="Van" id="typeVan"/>
                            <span>Van</span>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Makes</h4>
                        <label class="selectCommon selectSingle" >
                            <select name="makePro" id="makePro">
                                <option value=""> Select Makes</option>
    							<option value="Audi"> Audi</option>
    							<option value="Bentley"> Bentley</option
    							<option value="Bmw"> Bmw</option>
                            </select>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Price</h4>
                        <label class="rangeCommon">
                            <input type="text" class="js-range-slider" name="my_range" value="" data-skin="round" data-type="double" data-min="0" data-max="1000" data-grid="false" />
                            <input type="number" maxlength="4" value="0" class="from"/>
                            <input type="number" maxlength="4" value="1000" class="to"/>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Mileage</h4>
                        <label class="selectCommon selectSingle">
                            <select name="mileAgePro" id="mileAgePro">
                                <option value=""> Select MileAge </option>
                                <option value="10,000"> < 10,0000</option>
    							<option value="50,000"> < 50,0000</option>
    							<option value="100,000"> < 100,0000</option>
                            </select>
                        </label>
                    </div>
                     <div class="filterIn">
                        <h4>Age</h4>
                        <label class="selectCommon selectSingle">
                            <select name="agePro1" id="agePro1">
                                <option value=""> Select Age </option>
                                <option value="10"> < 10</option>
    							<option value="50"> < 50</option>
    							<option value="100"> < 100</option>
                            </select>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Previous Owners</h4>
                        <label class="selectCommon selectSingle">
                            <select name="previousOwnersPro" id="previousOwnersPro">
                                <option value=""> Select Previous Owners </option>
                                <option value="Abc"> Abc</option>
    							<option value="Xyz"> Xyz</option>
                            </select>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Distance From SL1 2LX</h4>
                        <label class="selectCommon selectSingle">    
                              <select name="SL12LX" id="SL12LX">
                                <option value=""> Select Age</option>
                                <option value="10,000"> < 10,0000</option>
    							<option value="50,000"> < 50,0000</option>
    							<option value="100,000"> < 100,0000</option>
                            </select>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Exterior Grade</h4>
                        <label class="selectCommon selectSingle">
                            <select name="exteriorGrade" id="exteriorGrade">
                                <option value=""> Select Previous Owners </option>
                                <option value="1"> 1</option>
    							<option value="2"> 2</option>
                            </select>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Fuel Type</h4>
                        <label class="selectCommon selectSingle">
                            <select name="fuelType" id="fuelType">
                                <option value=""> Select Fuel Type </option>
                                <option value="diesel"> Diesel</option>
    							<option value="petrol"> Petrol</option>
                            </select>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Transmission</h4>
                        <label class="selectCommon selectSingle">
                            <select name="transmission" id="transmission">
                                <option value=""> Select Transmission </option>
                                <option value="1"> 1</option>
    							<option value="2"> 2</option>
                            </select>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Collection</h4>
                        <label class="selectCommon selectSingle">
                            <select name="collection" id="collection">
                                <option value=""> Select collection </option>
                                <option value="1"> 1</option>
    							<option value="2"> 2</option>
                            </select>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Additional Filters</h4>
                        <label class="selectCommon selectSingle">
                            <select name="additionalFilters" id="additionalFilters">
                                <option value=""> Select Additional Filters </option>
                                <option value="1"> 1</option>
    							<option value="2"> 2</option>
                            </select>
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-9 col-md-9">
            <div class="sec-2-txt pb-4">
                <h2>Live Sell ends in 2 hrs</h2>
                <p>Find your best offer from over 5,000 dealers and sell for up to £1,000* more. It’s that easy.</p>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="topRightFilter">
                        <select>
                            <option value="newest">Newest</option>
                            <option value="lowestPrice">Lowest Price</option>
                            <option value="highestPrice">Highest Price</option>
                        </select>
                    </div>
                </div>
                <!-- BOX-1 -->
                @foreach ($vehicles as $vehicle)
                <div class="col-lg-4 col-md-4">
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
    </div>
</div>
</section>

@endsection


