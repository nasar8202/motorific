@extends('frontend.dealer.layouts.app')
@section('title','Purchases')
@section('section')
<!-- form css -->
<style>
    .sec-2-txt h2 div,.sec-2-txt h2 div span {
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
            <h5>My Vehicle</h5>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="usr">Search My Vehcle:</label>
                        <input type="text" placeholder="Search in Complete" name="search" class="form-control search-retailers" id="search">
                        <br>
                        <p class="vehiclesCount" id="vehiclesCount"><span class="spanResult" style="margin: 5px" >{{ $vehiclesCount  }} Results</span></p>
                    </div>
                    <br>
                    <div class="row vec-box" id="filter">
                        @forelse ($vehicles as $vehicle)
                       <div class="col-sm-4 p-0" style="padding: 10px;"> <a href="{{route('dealersVehicleDetail',$vehicle->id)}}"><img src="{{ asset('/uploads/dealerVehicles/exterior/'. $vehicle->DealerVehicleExterior[0]->exterior_image) }}" width="300px" height="200px"> </a></div>
                       <div class="col-sm-8 p-0" style="padding: 10px">
                            <h1 style="font-size: 20px"><span style="background-color:rgba(72, 255, 0, 0);border-radius:45px;padding:7px">{{ $vehicle->vehicle_registartion_number }}</span></h1>
                            <p>{{ $vehicle->vehicle_name }}</p>
                            @if($vehicle->status == 1)
                            <span class="badge badge-success">Approved </span>
                            @elseif($vehicle->status == 2)
                            <span class="badge badge-danger">Deactivate </span>
                            @else
                            <span class="badge badge-danger">Pending </span>
                            @endif

                            <span style="padding-left: 60px;">{{ $vehicle->created_at->format('m/d/Y') }}</span>
                            <a href="{{route('orderOnMyVehicle',$vehicle->id)}}"> Orders On Vehicle</a>
                            {{-- <a href="{{route('markAsSoldDealerVehicle',$vehicle->id)}}">Marks As Sold ?</a> --}}

                            <span style="padding-left: 200px;">

                                        <!-- Trigger Buttons HTML -->



                            </span>
                            {{-- <button type="button" class="btn btn-primary ms-4" data-bs-toggle="collapse" data-bs-target="#myCollapse{{$vehicle->id}}">...</button>

                                    <!-- Collapsible Element HTML -->
                                    <div class="collapse" id="myCollapse{{$vehicle->id}}">
                                        <div class="card card-body " style="width: 40%;float: right;" >
                                            <ul>
                                                <li><a href="{{route('orderOnMyVehicle',$vehicle->id)}}"> Orders On Vehicle</a></li>
                                            </ul>
                                        </div>
                                    </div> --}}

                        </div>
                        @empty
                        <div class="col-sm-12">No My Vehicle Found!</div>

                        @endforelse

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
    $(function() {
    $("#search").keyup(function() {
        var keyword = $("#search").val();
        var dataString = 'keyword='+ keyword;
        var date = new Date().toISOString();

        if(keyword=='') {
        } else {
            $.ajax({
                type: "GET",
                url: "{{ URL::route('searchMyVehicles') }}",
                data: dataString,
              cache: false,
              
                success: function(data)
                {
                  
                    if(data['dealerVehicles'] != null && data['dealerVehicles'] != '') {
                        var $tableBody = jQuery('#filter');
                        
                        
                        
                        $tableBody.html('');
                        $('#vehiclesCount').html('')
                        $('#vehiclesCount').text(data.count);
                        
                        jQuery.each(data['dealerVehicles'], function (i) {
                        $tableBody.append(
                            '<div class="col-sm-4 p-0" style="padding: 10px;"> <a href=""><img src="' + path +
                                        'uploads/dealerVehicles/exterior/' + data['dealerVehicles'][i].dealer_vehicle_interior[0].interior_image +
                                        '  " width="300px" height="200px"> </a></div>' +
                            '<div class="col-sm-8 p-0" style="padding: 10px">'+
                            '<h1 style="font-size: 20px"><span style="background-color:rgba(72, 255, 0, 0);border-radius:45px;padding:7px">'+ data['dealerVehicles'][i].vehicle_registartion_number +'</span></h1>'+
                            '<p>'+data['dealerVehicles'][i].vehicle_name +'</p>'+
                            '<span>+if(data[i].status == 2){var status = 2 }else if(data[i].status){ var status = 1}else{ var status = 3}+</span>'+
                            // '<p>'+data[i].status == "2" ? "pending" : +data[i].status == "1" ? "approved" : "ASD"+ '</p>'+
                            '<p>'+status+ '</p>'+
                            '<span style="padding-left: 60px;">'+ new Date (data['dealerVehicles'][i].created_at).toLocaleDateString() +'</span>'+
                            '<span style="padding-left: 200px;"></span>'+
                            '<a href="{{route('orderOnMyVehicle',$vehicle->id)}}"> Orders On Vehicle</a>'+
                            '</div></div>'
                        ); 
                        });
                  
                    }else{
                        
                        var $tableBody = jQuery('#filter');
                        $tableBody.html('');
                        $('#vehiclesCount').text(data.count);
                       
                        $tableBody.append(
                            '<div class="col-sm-4 p-0" style="padding: 10px;text-align:center"> <h3> No Vehicle found</h3></div>' 
                        ); 
                    }
                     //console.log(typeof (data[i].status));
                    
                    
                }
            });
        } return false;
    });
});
</script>
@endpush

