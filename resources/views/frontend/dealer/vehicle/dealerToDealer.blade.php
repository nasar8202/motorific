@extends('frontend.dealer.layouts.app')
@section('title', 'Sell your car the with Motorific')
@section('section')
    <!-- form css -->
    <style>
        div#loader {
            position: absolute;
            left: 60%;
            top: 50%;
        }

        .col-lg-3.col-md-3.blur_action {
            float: left;
            width: 32%;
            margin-left: 1%;
            height: 360px;
            flex: 0 0 32%;
        }

        .col-lg-3.col-md-3.blur_action h6 {
            font-size: 15px;
        }

        .box {
            height: 370px;
        }

        div#loop {
            width: 100%;
        }

        .col-lg-3.col-md-3.blur_action a {
            float: left;
            width: 100%;
            margin-left: 1%;
            height: 360px;
            flex: 0 0 41%;
        }

        div#filter-price {
            display: flex;
        }

        .category-btn a {
            color: black;
            text-decoration: none;
            transition: all ease 0.5s;
            padding: 10px 20px;
        }

        .category-btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-btn a.active,
        .category-btn a:hover {
            background: #05eab5;
            color: white;
            border-radius: 10px;
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
    <section class="banner-sec dealer-banner">
        <div class="container-1170">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                        <h2 class="sec-heading fs-50 text-white">Dealer To Dealer</h2>
                        {{-- <p class="text-white">Next sales begins at 8AM </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-2 productPageTn">
        <input type="hidden" id="path" value="{{ asset('') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 productsFiltersCol">
                    <div class="productsFilters">
                        <h2 class="filter-head">
                            Filters
                        <span class="filterToggle"><svg class="svg-inline--fa fa-sliders" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sliders" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 416c0-17.7 14.3-32 32-32l54.7 0c12.3-28.3 40.5-48 73.3-48s61 19.7 73.3 48L480 384c17.7 0 32 14.3 32 32s-14.3 32-32 32l-246.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 448c-17.7 0-32-14.3-32-32zm192 0a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM384 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm-32-80c32.8 0 61 19.7 73.3 48l54.7 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-54.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l246.7 0c12.3-28.3 40.5-48 73.3-48zM192 64a32 32 0 1 0 0 64 32 32 0 1 0 0-64zm73.3 0L480 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l-214.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 128C14.3 128 0 113.7 0 96S14.3 64 32 64l86.7 0C131 35.7 159.2 16 192 16s61 19.7 73.3 48z"></path></svg><!-- <i class="fa-solid fa-sliders"></i> Font Awesome fontawesome.com --></span>
                        </h2>
                        <div class="filterWraper">
                            {{-- <div class="filterIn">
                                <h4>Type</h4>
                                <label class="checkboxCommon" for="typeAll">
                                    <a href="{{ route('dealer.dashboard') }}" id="typeAll">All</a>
                                    <input type="radio" class="type"  name="typePro" value="All" id="typeAll"/>
                                <span>All</span>
                                </label>
                                <label class="checkboxCommon" for="typeCar">
                                    <a href="{{ route('onlyCars') }}" id="typeAll">Cars</a>
                                    <input type="radio" class="type" name="typePro" value="Car" id="typeCar"/>
                                <span>Car</span>
                                </label>
                                <label class="checkboxCommon" for="typeVan">
                                    <a href="{{ route('onlyVans') }}">Vans</a>
                                    <input type="radio" class="type" name="typePro" value="Van" id="typeVan"/>
                                <span>Van</span>
                                </label>
                            </div> --}}
                            <div class="filterIn">
                                <h4>Makes</h4>
                                <label class="selectCommon selectSingle" >
                                    <select name="makePro" id="makePro">
                                        <option disabled selected value=""> Select Makes</option>
                                        @forelse($allVehiclesName as $vehicle)
                                        <option value="{{$vehicle}}"> {{$vehicle}}</option>
                                        @empty
                                        <option disabled selected value=""> No Make Found</option>
                                        @endforelse
                                    </select>
                                </label>
                            </div>
                            <form action="#">
    
                              
                                <div class="filterIn">
                                    <h4>Price</h4>
                                    <div id="slider"></div><br />
                                    <label class="rangeCommon">
                                        {{-- <input type="text" class="js-range-slider" name="my_range" value="" id="slider-range" data-skin="round" data-type="double" data-min="0" data-max="1000" data-grid="false" />
                                <input type="number" maxlength="4" name="min" value="0" id="min" class="from"/> --}}
                                        <input type="number" maxlength="4" name="max" value="1000" id="max"
                                            class="to" />
                                        Range: <span id='range'></span>
                                    </label>
                                </div>
                                <div class="filterIn">
                                    <h4>Mileage</h4>
                                    <label class="selectCommon selectSingle">
                                        <select name="mileAgePro" id="mileAgePro">
                                            <option disabled selected value=""> Select MileAge </option>
                                            <option value="100000">
                                                < 10,0000</option>
                                            <option value="500000">
                                                < 50,0000</option>
                                            <option value="1000000">
                                                < 100,0000</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="filterIn">
                                    <h4>Age</h4>
                                    <label class="selectCommon selectSingle">
                                        <select name="agePro1" id="agePro">
                                            <option selected disabled value=""> Select Age </option>
                                            <option value="10">
                                                < 10</option>
                                            <option value="50">
                                                < 50</option>
                                            <option value="100">
                                                < 100</option>
                                        </select>
                                    </label>
                                </div>
                                {{-- <div class="filterIn">
                                    <h4>Previous Owners</h4>
                                    <label class="selectCommon selectSingle">
                                        <select name="previousOwnersPro" id="previousOwnersPro">
                                            <option selected disabled value=""> Select Previous Owners </option>
                                            <option value="1">
                                                < 1 </option>
                                            <option value="5">
                                                < 5</option>
                                        </select>
                                    </label>
                                </div> --}}
                                {{-- <div class="filterIn">
                            <h4>Distance From SL1 2LX</h4>
                            <label class="selectCommon selectSingle">
                                  <select name="SL12LX" id="SL12LX">
                                    <option value=""> Select Age</option>
                                    <option value="10,000"> < 10,0000</option>
        							<option value="50,000"> < 50,0000</option>
        							<option value="100,000"> < 100,0000</option>
                                </select>
                            </label>
                        </div> --}}
                                {{-- <div class="filterIn">
                            <h4>Exterior Grade</h4>
                            <label class="selectCommon selectSingle">
                                <select name="exteriorGrade" id="exteriorGrade">
                                    <option value=""> Select Previous Owners </option>
                                    <option value="1"> 1</option>
        							<option value="2"> 2</option>
                                </select>
                            </label>
                        </div> --}}
                                <div class="filterIn">
                                    <h4>Fuel Type</h4>
                                    <label class="selectCommon selectSingle">
                                        <select name="fuelType" id="fuelType">
                                            <option selected disabled value=""> Select Fuel Type </option>
                                            <option value="diesel"> Diesel</option>
                                            <option value="petrol"> Petrol</option>
                                            <option value="hybrid"> Hybrid</option>
                                            <option value="electric"> Electric</option>
                                        </select>
                                    </label>
                                </div>
                                {{-- <div class="filterIn">
                            <h4>Transmission</h4>
                            <label class="selectCommon selectSingle">
                                <select name="transmission" id="transmission">
                                    <option value=""> Select Transmission </option>
                                    <option value="1"> 1</option>
        							<option value="2"> 2</option>
                                </select>
                            </label>
                        </div> --}}
                                {{-- <div class="filterIn">
                            <h4>Collection</h4>
                            <label class="selectCommon selectSingle">
                                <select name="collection" id="collection">
                                    <option value=""> Select collection </option>
                                    <option value="1"> 1</option>
        							<option value="2"> 2</option>
                                </select>
                            </label>
                        </div> --}}
                                {{-- <div class="filterIn">
                            <h4>Additional Filters</h4>
                            <label class="selectCommon selectSingle">
                                <select name="additionalFilters" id="additionalFilters">
                                    <option value=""> Select Additional Filters </option>
                                    <option value="1"> 1</option>
        							<option value="2"> 2</option>
                                </select>
                            </label>
                        </div> --}}
                                <button type="button" class="btn btn-primary" id="subm"> Filter</button>
                                <a href="" class="btn btn-danger" id="subm">Clear Filter</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="sec-2-txt pb-4">
                        {{-- <h2>Live Sell <span id="word"> ends </span> in <span id="counter"></span></h2> --}}
                        {{-- <div class="sale-countdown">
                            <h2 id="message"></h2>
                            <h2 id="countdown"></h2>
                        </div> --}}
                        <div class="category-btn">
                            <a href="{{ route('dealer.dashboard') }}"
                                class="abcd {{ request()->IS('dealer/dashboard') ? 'active' : '' }}">All </a>
                            <a href="{{ route('vehicle.liveSell') }}"
                                class="abcd {{ request()->IS('/dealer/live-sell') ? 'active' : '' }}">Live Sale </a>
                            <a href="{{ route('buyItNow') }}">Buy It Now</a>
                            <a href="{{ route('dealerToDealer') }}"
                                class="abcd {{ request()->IS('dealer/dealer-to-dealer') ? 'active' : '' }}">Dealer To
                                Dealer</a>
                        </div>
                        <h4 class="count">Showing {{ $countAllVehicle }} vehicles</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="topRightFilter">
                                <select id="dropdownfilter">
                                    <option selected disabled value="newest">Filter</option>
                                    <option value="newest">Newest</option>
                                    <option value="lowestPrice">Lowest Price</option>
                                    <option value="highestPrice">Highest Price</option>
                                </select>
                            </div>
                        </div>
                        <!-- BOX-1 -->

                        <!-- Products Cards New Design -->
                        <!-- <div class="procuts-wraper">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-sm-6">
                                                                        <a href="#" class="product-main">
                                                                            <div class="product-card">
                                                                                <div class="produc-img">
                                                                                    <img src="{{ URL::asset('frontend/dealers/assets/image/images/car1.png') }}" alt="">
                                                                                </div>
                                                                                <div class="p-content">
                                                                                    <h3 class="p-title">Fiat 500 Sport</h3>
                                                                                    <ul class="p-spec">
                                                                                        <li>2020</li>
                                                                                        <li>10,550 miles</li>
                                                                                        <li>Petrol</li>
                                                                                        <li>Manual</li>
                                                                                    </ul>
                                                                                    <div class="p-cate-list">
                                                                                        <span class="p-code gold">MX20 XGU</span>
                                                                                        <span class="p-location">
                                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                                        161 Mi away
                                                                                        </span>
                                                                                    </div>
                                                                                    <h5 class="p-price">Reserve price: <span >£9,240</span></h5>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                        {{-- <div class="procuts-wraper">
                            <div class="row">
                                @forelse ($allVehicles as $vehicle)
                                    <div class="col-lg-4 col-sm-6">
                                        <a href="{{ route('dealersVehicleDetail', [$vehicle->id]) }}"
                                            class="product-main">
                                            <div class="product-card">
                                                <div class="produc-img">
                                                    <img src="{{ asset('/uploads/dealerVehicles/exterior/' . $vehicle->DealerVehicleExterior[0]->exterior_image ?? '') }}"
                                                        alt="">
                                                </div>
                                                <div class="p-content">
                                                    <h3 class="p-title">{{ $vehicle->vehicle_name }}</h3>
                                                    <ul class="p-spec">
                                                        <li>{{ $vehicle->vehicle_year }}</li>
                                                        <li>{{ $vehicle->vehicle_mileage }}</li>
                                                        <li>{{ $vehicle->vehicle_tank }}</li>
                                                        <li>{{ $vehicle->vehicle_type }}</li>
                                                    </ul>
                                                    <div class="p-cate-list">
                                                        <span
                                                            class="p-code gold">{{ $vehicle->vehicle_registartion_number }}</span>
                                                        <span class="p-location">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            161 Mi away
                                                        </span>
                                                    </div>
                                                    <h5 class="p-price">Reserve price:
                                                        <span>£{{ $vehicle->vehicle_price }}</span>
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <h4>No Vehicle Found</h4>
                                @endforelse
                            </div>
                        </div> --}}
                    </div> 
                    <div class="procuts-wraper list-wraper" id="first">
                        <div class="row">
                            @forelse ($allVehicles as $vehicle)
                            <div class="col-lg-4 col-sm-6 reviews-add">
                                <a href="{{ route('dealersVehicleDetail', [$vehicle->id]) }}" class="product-main">
                                    <div class="product-card">
                                        <div class="produc-img">
                                        <img src="{{ asset('/uploads/dealerVehicles/exterior/' . $vehicle->DealerVehicleExterior[0]->exterior_image ?? '') }}" alt="">
                                        </div>
                                        <div class="p-content">
                                            <h3 class="p-title">{{ $vehicle->vehicle_name }}</h3>
                                            <ul class="p-spec">
                                                <li>{{ $vehicle->vehicle_year }}</li>
                                                <li>{{ $vehicle->vehicle_mileage }}</li>
                                                <li>{{ $vehicle->vehicle_tank }}</li>
                                                <li>{{ $vehicle->vehicle_type }}</li>
                                            </ul>
                                            <div class="p-cate-list">
                                                <span class="p-code gold">{{ $vehicle->vehicle_registartion_number }}</span>
                                                <span class="p-location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php
                                               
                                                $current_user = Illuminate\Support\Facades\Auth::user();
        $user = App\Models\User::where('id',$vehicle->user_id)->first();
        
        $zip = $current_user->post_code;
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=.'$zip'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk";
        $result_string = file_get_contents($url);
        
        if( json_decode($result_string)->status == "OK"){
        // dd(json_decode($decode));
        
        $result = json_decode($result_string, true);
        
        $result1[]=$result['results'][0];
        $result2[]=$result1[0]['geometry'];
        $result3[]=$result2[0]['location'];

        $zipk = $user->post_code;
        $urlk = "https://maps.googleapis.com/maps/api/geocode/json?address=.'$zipk'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk";
        $result_stringk = file_get_contents($urlk);
        $resultk = json_decode($result_stringk, true);

        
        $resultk1[]=$resultk['results'][0];
        $resultk2[]=$resultk1[0]['geometry'];
        $resultk3[]=$resultk2[0]['location'];
        // dd($resultk3[0]['lat'],$resultk3[0]['lng']);
      
        $lat = strval($resultk3[0]['lat']);
        $lng = strval($resultk3[0]['lng']);
        


        $long1 = deg2rad($result3[0]['lng']);
        $long2 = deg2rad($resultk3[0]['lng']);
        $lat1 = deg2rad($resultk3[0]['lat']);
        $lat2 = deg2rad($resultk3[0]['lat']);
          
        //Haversine Formula
        $dlong = $long2 - $long1;
        $dlati = $lat2 - $lat1;
          
        $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
          
        $res = 2 * asin(sqrt($val));
          
        $radius = 3958.756;
          
       $distance = floor($res*$radius);
              echo $distance.' Mi away';  
            }else{
                echo ' 100 Mi away';  
            }
              ?>
                                                </span>
                                            </div>
                                            <h5 class="p-price">Buy it now: <span >£{{ $vehicle->reserve_price }}</span></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @empty
                                <h4>No Vehicle Found</h4>
                            @endforelse
                        </div>
                    </div>
                    <div class="procuts-wraper" >
                        <div class="row" id="filter-price">
                            

                        </div>
                    </div>
                    <div id="pagination-container"></div>
                    <!-- Products Cards New Design End -->
                        <!-- <div id="first">
                                                                    @forelse ($allVehicles as $vehicle)
    <div class="col-lg-3 col-md-3 blur_action mb-5">
                                                                            <a href="{{ route('dealersVehicleDetail', [$vehicle->id]) }}">
                                                                                <div class="box" id>

                                                                                    <div class="box-img">
                                                                                        <img src="{{ asset('/uploads/dealerVehicles/exterior/' . $vehicle->DealerVehicleExterior[0]->exterior_image ?? '') }}"
                                                                                            width="180px" alt="">
                                                                                    </div>
                                                                                    <h4>{{ $vehicle->vehicle_registartion_number }}</h4>
                                                                                    <div class="d-flex justify-content-between">
                                                                                        <p>{{ $vehicle->vehicle_name }}</p>


                                                                                    </div>
                                                                                    <div class="d-flex justify-content-between">

                                                                                        <h6>{{ $vehicle->vehicle_year }}.{{ $vehicle->vehicle_tank }}.{{ $vehicle->vehicle_mileage }}.{{ $vehicle->vehicle_type }}
                                                                                        </h6>



                                                                                    </div>
                                                                                    <span>£{{ $vehicle->vehicle_price }}</span>
                                                                                </div>
                                                                            </a>
                                                                            <br>
                                                                        </div>
                            @empty
                                                                        <h4>No Vehicle Found</h4>
    @endforelse
                                                                </div> -->
                        <div id="loop">
                            <div class="col-lg-3 col-md-3 blur_action" >


                            </div>
                            <div class="" id="no-record">


                            </div>
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
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var path = $('#path').val();

            $('#dropdownfilter').on('change', function() {
                var dropdownfilter = $("#dropdownfilter").val();

                $.ajax({

                    url: 'dealerToDealerDropdownfilter',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        dropdownfilter: dropdownfilter
                    },

                    success: function(response) {
                        
                        $('.blur_action').css('filter', 'blur(0px)');
                        var resultData = response;
                        // console.log(resultData)
                        var bodyData = '';
                        var count = resultData.length;

                        if (count > 0) {
                            $("#first").hide();
                            $(".count").html("");
                            $(".count").html("Showing " + count + " vehicles");

                            $.each(resultData, function(resultData, row) {
                                bodyData += '<div class="col-lg-4 col-sm-6" ><a href="/dealer/dealer-vehicle-detail/' + row.id + '" class="product-main"><div class="product-card">'
                                        bodyData += '<div class="produc-img"> <img src="' +path + 'uploads/dealerVehicles/exterior/' + row.dealer_vehicle_exterior[0].exterior_image +'"></div>'
                                        bodyData +=  '<div class="p-content"><h3 class="p-title">'+ row.vehicle_name +'</h3> <ul class="p-spec"><li>' + row.vehicle_year + '</li><li>' + row.vehicle_mileage + '</li><li>' + row.vehicle_type + '</li><li>' + row.vehicle_tank + '</li> </ul><div class="p-cate-list"><span class="p-code gold">' + row.vehicle_registartion_number + '</span><span class="p-location"> <i class="fas fa-map-marker-alt"></i> 161 Mi away</span></div><h5 class="p-price">Reserve price: <span >£' + row.reserve_price + '</span></h5></div>'
                                        bodyData += '</div> </a></div>'

                                $("#filter-price").html(bodyData);
                                $("#no-record").html('');
                            })


                        } else {
                            $(".count").html("");
                            $(".count").html("Showing " + count + " vehicles");
                            $("#first").hide();
                            $("#filter-price").html('');
                            $("#no-record").html(
                                '<h4>No matching vehicles found</h4><br><p>To see more results, try selecting different filters.</p><a href="{{ URL::to('dealer/dashboard') }}" class="btn btn-danger">Clear All Filter</a>'
                            );
                        }
                    },

                    complete: function(data) {
                        /* Hide image container */
                        $("#loader").hide();

                    }


                });

            });


            $("#subm").click(function() {

                var makePro = $("#makePro").val();
                var range = $("#range").text();
                var mileAgePro = $("#mileAgePro").val();
                var agePro = $("#agePro").val();
                var previousOwnersPro = $("#previousOwnersPro").val();
                var fuelType = $("#fuelType").val();





                $.ajax({

                    url: 'dealerToDealerVehicleFilter',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        range: range,
                        mileAgePro: mileAgePro,
                        agePro: agePro,
                        previousOwnersPro: previousOwnersPro,
                        fuelType: fuelType
                    },

                    success: function(response) {
console.log(response);
                        if (response != '') {
                            $('.blur_action').css('filter', 'blur(0px)');
                            var resultData = response.dealerToDealerVehicleFilter;
                            var resultDatapic = response.pic;

                            var bodyData = '';
                            var count = resultData.length;
                            
                            const final_result = response.dealerToDealerVehicleFilter.map(element => {
                                const isExist = response.pic.find((p) => p
                                    .dealer_vehicle_id === element.id)
                                return {
                                    ...element,
                                    dealer_vehicle_pic: isExist.exterior_image
                                }
                            });
                            if (count > 0) {
                                $("#first").hide();
                                $(".count").html("");
                                $(".count").html("Showing " + count + " vehicles");

                                $.each(final_result, function(final_result, row) {


                                    bodyData += '<div class="col-lg-4 col-sm-6" ><a href="/dealer/dealer-vehicle-detail/' + row.id + '" class="product-main"><div class="product-card">'
                                        bodyData += '<div class="produc-img"> <img src="' +path + 'uploads/dealerVehicles/exterior/' + row.dealer_vehicle_pic +'"></div>'
                                        bodyData +=  '<div class="p-content"><h3 class="p-title">'+ row.vehicle_name +'</h3> <ul class="p-spec"><li>' + row.vehicle_year + '</li><li>' + row.vehicle_mileage + '</li><li>' + row.vehicle_type + '</li><li>' + row.vehicle_tank + '</li> </ul><div class="p-cate-list"><span class="p-code gold">' + row.vehicle_registartion_number + '</span><span class="p-location"> <i class="fas fa-map-marker-alt"></i> 161 Mi away</span></div><h5 class="p-price">Reserve price: <span >£' + row.reserve_price + '</span></h5></div>'
                                        bodyData += '</div> </a></div>'






                                    $("#filter-price").html(bodyData);
                                    $("#no-record").html('');
                                })


                            }
                        } else {
                            $(".count").html("");
                            $(".count").html("Showing 0 vehicles");
                            $("#first").hide();
                            $("#filter-price").html('');
                            $("#no-record").html(
                                '<h4>No matching vehicles found</h4><br><p>To see more results, try selecting different filters.</p><a href="" class="btn btn-danger">Clear All Filter</a>'
                            );
                        }
                    },

                    complete: function(data) {
                        /* Hide image container */
                        $("#loader").hide();

                    }


                });
            });

            $( "#makePro").change(function(){
    var makePro = $("#makePro").val();

        $.ajax({

            url: 'dealerToDealerMakeFilter',
            type: 'post',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {makePro:makePro},

            success: function(response){

            $('.blur_action').css('filter','blur(0px)');
            var resultData = response;
            console.log(resultData)
            var bodyData = '';
            var count = resultData.length;
                console.log(count);
            if(count > 0){
                $("#first").hide();
                $(".count").html("");
                $(".count").html("Showing " +count+ "vehicles");

            $.each(resultData,function(resultData,row){
                bodyData += '<div class="col-lg-4 col-sm-6" ><a href="/dealer/vehicle-detail/' + row.id + '" class="product-main"><div class="product-card">'
                                        bodyData += '<div class="produc-img"> <img src="'+path+'uploads/dealerVehicles/exterior/'+row.dealer_vehicle_exterior[0].exterior_image+'"></div>'
                                        bodyData +=  '<div class="p-content"><h3 class="p-title">'+ row.vehicle_name +'</h3> <ul class="p-spec"><li>' + row.vehicle_year + '</li><li>' + row.vehicle_mileage + '</li><li>' + row.vehicle_type + '</li><li>' + row.vehicle_tank + '</li> </ul><div class="p-cate-list"><span class="p-code gold">' + row.vehicle_registartion_number + '</span><span class="p-location"> <i class="fas fa-map-marker-alt"></i> 161 Mi away</span></div><h5 class="p-price">Reserve price: <span >£' + row.reserve_price + '</span></h5></div>'
                                        bodyData += '</div> </a></div>'

                                $("#filter-price").html(bodyData);
                                $("#no-record").html('');       
                })


            }
            else{
                $(".count").html("");
                $(".count").html("Showing " +count+ " vehicles");
                $("#first").hide();
                $("#no-record").html('<h4>No matching vehicles found</h4><br><p>To see more results, try selecting different filters.</p><a href="" class="btn btn-danger">Clear All Filter</a>');
                $("#filter-price").html('');
            }
            },

            complete:function(data){
            /* Hide image container */
            $("#loader").hide();

            }


            });
    });



            $('.blur_action').css('filter', 'blur(0px)');
            // $('#loader').hide();
            // Initializing slider
            $("#slider").slider({
                range: true,
                min: 1000,
    max: 100000,
    values: [ 1000, 10000 ],
                slide: function(event, ui) {


                    // Get values
                    var min = ui.values[0];
                    var max = ui.values[1];
                    $('#range').text(min + '-' + max);

                    // AJAX request

                }
            });
        });
   

        // end milage data ajax
        var items = $(".list-wraper .reviews-add");
    var numItems = items.length;
    var perPage = 9;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });

    </script>
@endpush
