@extends('frontend.dealer.layouts.app')
@section('title','Sell your car the with Motorific')
@section('section')
<!-- form css -->
<style>
div#loader {
    position: absolute;
    left: 60%;
    top: 50%;
}

/* section.sec-2.productPageTn .col-lg-4.col-md-4 {
    filter: blur(3px);
} */
</style>

<!-- MultiStep Form -->
{{-- <div id='loader' >
    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
  </div>

</div> --}}
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
                        <div id="slider"></div><br/>
                        <label class="rangeCommon">
                            <input type="text" class="js-range-slider" name="my_range" value="" id="slider-range" data-skin="round" data-type="double" data-min="0" data-max="1000" data-grid="false" />
                            <input type="number" maxlength="4" name="min" value="0" id="min" class="from"/>
                            <input type="number" maxlength="4" name="max" value="1000" id="max" class="to"/>
                            Range: <span id='range'></span>
                        </label>
                    </div>
                    <div class="filterIn">
                        <h4>Mileage</h4>
                        <label class="selectCommon selectSingle">
                            <select name="mileAgePro" id="mileAgePro" multiple>
                                <option value=""> Select MileAge </option>
                                <option value="848"> < 10,0000</option>
    							<option value="342"> < 50,0000</option>
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
                <button>All</button>
                <button>Live Sell</button>
                <button>Buy It Now</button>
                <h4>Showing  {{ $countAllVehicle }} vehicles</h4>
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
                <div id="first">
                @foreach ($allVehicles as $vehicle)
                <div class="col-lg-4 col-md-4 blur_action" >
                    <a href="{{ route('vehicle.vehicleDetail',[$vehicle->id]) }}">
                        <div class="box" id>

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
                    </a>
                    <br>
                </div>
                @endforeach
                </div>
                <div class="col-lg-4 col-md-4 blur_action"  id="filter-price">
                
                    
                </div>

                

        </div>
    </div>
</div>
</section>

@endsection
@push('child-scripts')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.blur_action').css('filter','blur(0px)');
    // $('#loader').hide();
// Initializing slider
$("#slider").slider({
    range: true,
    min: 20000,
    max: 80000,
    values: [ 22000, 25000 ],
    slide: function( event, ui ) {

        // Get values
        var min = ui.values[0];
        var max = ui.values[1];
        $('#range').text(min+' - ' + max);

        // AJAX request
        $.ajax({
            url: 'test',
            type: 'get',
            data: {min:min,max:max},
            beforeSend: function(){
                /* Show image container */
                $("#loader").show();
    $('.blur_action').css('filter','blur(3px)');

            },
            success: function(response){
                
            var resultData = response;
            
            var bodyData = '';
            var i=1;
            $("#first").hide(); 
            $.each(resultData,function(resultData,row){     
                     
                    bodyData+='<a href="{{URL::to('vehicle.vehicleDetail',['+row.id+'])}}"><div class="box">'
                    bodyData+='<div class="box-img"><img src="/vehicles/vehicles_images/'+row.vehicle_image.front+'" width="180px" alt=""></div><h4>'+row.vehicle_registartion_number+'</h4><div class="d-flex justify-content-between"><p>'+row.vehicle_name+'</p></div> <div class="d-flex justify-content-between"><h6>'+row.vehicle_year+'.'+row.vehicle_tank+'.'+row.vehicle_mileage+'.'+row.vehicle_type+'</h6></div> <span>$'+row.vehicle_price+'</span>'
                    bodyData+='</div></a>';
                    $("#filter-price").html(bodyData); 
                })
                

            },
            complete:function(data){
    /* Hide image container */
    $("#loader").hide();
    $('.blur_action').css('filter','blur(0px)');

   }
        });
    }
});
});
</script>
@endpush

