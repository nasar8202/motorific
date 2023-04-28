@extends('frontend.dealer.layouts.app')
@section('title', 'Purchases')
@section('section')
    <!-- form css -->
    <style>
        .sec-2-txt h2 div,
        .sec-2-txt h2 div span {
            font-size: inherit;
            display: initial;
            color: inherit;
        }
    </style>

    <!-- MultiStep Form -->

    <section class="sec-2 productPageTn requested-vehicles">
        <input type="hidden" id="path" value="{{ asset('') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 productsFiltersCol">
                    <div class="productsFilters">
                        @include('frontend.dealer.include.biddsOffer')
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="usr">Search Purchases Vehcle:</label>
                                <input type="text" placeholder="Search in Complete" class="form-control" id="usr">
                                <br>
                                {{-- <p class="count">{{ $countOrder + $countDealerOrder }}<span style="margin: 5px">Results</span></p> --}}
                            </div>
                            <br>
                            <div class="" id="first">
                                <h4>Seller's Vehicle</h4>
                                @forelse ($Orders as $Order)
                                <div class="row vec-box-row">
                                    <div class="col-sm-4 vec-box p-0" >
                                        <a href="{{ route('completedVehicleDetails', $Order->vehicle->id) }}">
                                            <img src="{{ asset('/vehicles/vehicles_images/' . $Order->vehicle->VehicleImage->front) }}">
                                        </a>
                                    </div>
                                    <div class="col-sm-8 vec-box vec-box-big " >
                                        <h1><span>{{ $Order->vehicle->vehicle_registartion_number }}</span>
                                        </h1>
                                        <p>{{ $Order->vehicle->vehicle_name }}</p>
                                        <span class="req-price">Requested Price:£ {{ $Order->request_price }}</span>
                                        
                                        @if ($Order->admin_updated_status == 1)
                                            <small class="updated-price">Your Price Was Updated By Admin</small>
                                        @endif
                                        <span class="order-date">{{ $Order->created_at }}</span>
                                       
                                        <div class="card card-body " >
                                            <ul>
                                                <li><a
                                                        href="{{ route('sellerRequestedDetails', ['slug' => 'seller', 'id' => $Order->vehicle->id]) }}">
                                                        Seller's Details</a></li>
                                                {{-- <li><a href="{{route('deliveryDetailPage')}}">Delivery Details</a></li> --}}
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                @empty
                                    <div class="col-sm-12">No Purchases Vehicle Found!</div>
                                @endforelse

                            </div>
                            <div class="row" id="dealerfirst">
                                <h4>Dealer's Vehicle</h4>
                                @forelse ($dealerOrders as $dealerOrder)
                                    {{-- @dd($dealerOrder) --}}
                                    <div class="col-sm-4 vec-box p-0" style="padding: 10px;"> <a
                                            href="{{ route('completedDealersVehicleDetail', $dealerOrder->vehicle->id) }}"><img
                                                src="{{ asset('uploads/dealerVehicles/exterior/' . $dealerOrder->vehicle->DealerVehicleExterior[0]->exterior_image) }}"
                                                width="300px" height="200px"> </a></div>
                                    <div class="col-sm-8 vec-box p-0" style="padding: 10px">
                                        <h1 style="font-size: 20px"><span
                                                style="background-color:rgba(72, 255, 0, 0);border-radius:45px;padding:7px">{{ $dealerOrder->vehicle->vehicle_registartion_number }}</span>
                                        </h1>
                                        <p>{{ $dealerOrder->vehicle->vehicle_name }}</p>
                                        <span>Requested Price:{{ $dealerOrder->request_price }}</span>
                                        <br>
                                        @if ($dealerOrder->admin_updated_status == 1)
                                            <small>Your Price Was Updated By Admin</small>
                                        @endif
                                        <span style="padding-left: 60px;">{{ $dealerOrder->created_at }}</span>
                                        <span style="padding-left: 200px;">


                                            <!-- Collapsible Element HTML -->
                                            <div class="card card-body " style="width: 40%;float: right;">
                                                <ul>
                                                    <li><a
                                                            href="{{ route('ownerDealerRequestedDetails', ['slug' => 'dealer', 'id' => $dealerOrder->vehicle->id]) }}">
                                                            Seller's Details</a></li>
                                                    {{-- <li><a href="{{route('deliveryDetailPage')}}">Delivery Details</a></li> --}}
                                                </ul>
                                            </div>

                                        </span>

                                    </div>
                                @empty
                                    <div class="col-sm-12">No Purchases Vehicle Found!</div>
                                @endforelse

                            </div>
                            <div class="row" id="search">


                            </div>
                            <div class="row" id="no-record">


                            </div>
                        </div>
                        <!-- BOX-1 -->

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
@push('child-scripts')
    <script>
        var path = $('#path').val();

        $('#usr').keyup(function(e) {


            if (e.target.value !== '') {
                // console.log("hre",typeof(e.target.value));
                // return;
                var search = $('#usr').val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('completedRequestPurchase') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        search: search
                    },
                    success: function(response) {
                        // console.log(response);
                        var bodyData = '';
                        var resultData = response.vehicle;
                        var resultDatadealer = response.dealervehicle;

                        // console.log(count_length+count_lengthsecond);
                        var count = resultData[0];
                        var count1 = resultDatadealer[0];
                        $("#first").hide();
                        $("#dealerfirst").hide();
                        if(count != null || count1 != null){
                            
                            
                        if (count != null) {
                            $("#first").show();
                                if (resultData) {
                                $.each(resultData, function(resultData, row) {
                                    bodyData +=
                                        '<div class="col-sm-4 vec-box p-0" ><img src="' + path +
                                        'vehicles/vehicles_images/' + row.vehicle_image.front +
                                        '  " width="300px" height="200px"></div>'
                                    bodyData +=
                                        '<div class="col-sm-8 vec-box p-0" ><h1 style="font-size: 20px"><span >' +
                                        row.vehicle_registartion_number + '</span></h1><p>' +
                                        row.vehicle_name + '</p><span>Max Bid:' + row
                                        .singleorder.request_price +
                                        '</span><span style="padding-left: 60px;">' + row
                                        .singleorder.created_at + '</span>'
                                    bodyData +=
                                        '<div class="card card-body " style="width: 40%;float: right;" ><ul><li><a href="{{ route('sellerDetails', ['bided' => 'bided', 'id' => 'row.id', 'slug' => 'seller']) }}"> Sellers Details</a></li></ul> </div>';
                                    bodyData += '</div>';
                                    
                                    $("#search").html(bodyData);
                                    $("#first").html('');
                                    $("#no-record").html('');
                                })
                            }
                        }
                        if (count1 != null) {
                        $("#dealerfirst").show();
                            var resultData = resultDatadealer;
                            if (resultDatadealer) {
                                $.each(resultData, function(resultData, row) {
                                    bodyData +=
                                        '<div class="col-sm-4 vec-box p-0" ><img src="' + path +
                                        'uploads/dealerVehicles/exterior/' + row
                                        .dealer_vehicle_exterior[0].exterior_image +
                                        '  " width="300px" height="200px"></div>'
                                    bodyData +=
                                        '<div class="col-sm-8 vec-box p-0" ><h1 style="font-size: 20px"><span >' +
                                        row.vehicle_registartion_number + '</span></h1><p>' +
                                        row.vehicle_name + '</p><span>Max Bid:' + row.singlebid
                                        .request_price +
                                        '</span><span style="padding-left: 60px;">' + row
                                        .singlebid.created_at + '</span>'
                                    bodyData +=
                                        '<div class="card card-body " style="width: 40%;float: right;" ><ul><li><a href="{{ route('sellerDetails', ['bided' => 'bided', 'id' => 'row.id', 'slug' => 'seller']) }}"> Sellers Details</a></li></ul> </div>';
                                    bodyData += '</div>';
                                    $("#search").html(bodyData);
                                    $("#dealerfirst").html('');
                                    $("#no-record").html('');
                                })
                            }
                            }
                        } else {
                            $("#search").html("");
                            $("#first").hide();
                            $("#dealerfirst").hide();
                            $(".count").html("0  <span style='margin: 5px'>Results</span>");
                            $("#no-record").html(
                                '<h4>No matching vehicles found</h4><a href="" class="btn btn-danger">Clear Search Filter</a>'
                                );
                        }
                    }
                });
            } else {
                return;
            }
        });
    </script>
@endpush
