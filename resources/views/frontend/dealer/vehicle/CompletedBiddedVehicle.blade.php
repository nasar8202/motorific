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
    <input type="hidden" id="path" value="{{ asset('')}}">
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
                        <p class="count">{{ $countBids  }}<span style="margin: 5px">Results</span></p>
                    </div>
                    <br>
                    <div class="row" id="first">
                        @forelse ($bids as $bid)
                        <div class="col-sm-4 vec-box p-0" ><img src="{{ asset('/vehicles/vehicles_images/'. $bid->vehicle->vehicleimage->front) }}" width="300px" height="200px"></div>
                        <div class="col-sm-8 vec-box p-0" >
                            <h1 style="font-size: 20px"><span >{{ $bid->vehicle->vehicle_registartion_number }}</span></h1>
                           <p>{{ $bid->vehicle->vehicle_name }}</p>
                            <span>Max Bid:£ {{ $bid->bid_price }}</span>
                            <span style="padding-left: 60px;">{{ $bid->created_at }}</span>
                                
                            <!-- Collapsible Element HTML -->
                                <div class="card card-body " style="width: 40%;float: right;" >
                                    <ul>
                                        <li><a href="{{route('sellerDetails',['bided'=>"bided",'slug'=>"seller",'id'=>$bid->vehicle->id])}}"> Seller's Details</a></li>
                                        {{-- <li><a href="{{route('deliveryDetailPage')}}">Delivery Details</a></li> --}}
                                    </ul>
                                </div>
                            
                        
                        </div>
                        @empty
                        <div class="col-sm-12">No active bids or offers!</div>

                        @endforelse

                    </div>
                    <div class="row" id="search" >
                      

                    </div>
                    <div class="row" id="no-record" >
                      

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
<script>var path = $('#path').val();
        
    $('#usr').keyup(function (e) { 
        
        
        if(e.target.value !== ''){
            // console.log("hre",typeof(e.target.value));
            // return;
        var search = $('#usr').val();
        $.ajax({
            type: "GET",
            url: "{{route('purchasesBids')}}",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {search:search}
,
            success: function (response) {
                console.log(response);
                var bodyData = '';
                var resultData = response; 
                
                var count_length = resultData.length;
                var count = resultData[0];
                if(count != null){


                    $(".count").html("");
                    $(".count").html(count_length+ "  <span style='margin: 5px'>Results</span>");
                $.each(resultData,function(resultData,row){
                    bodyData+='<div class="col-sm-4 vec-box p-0" ><img src="'+path+'vehicles/vehicles_images/'+row.vehicle_image.front+'  " width="300px" height="200px"></div>'
                    bodyData+='<div class="col-sm-8 vec-box p-0" ><h1 style="font-size: 20px"><span >'+row.vehicle_registartion_number+'</span></h1><p>'+row.vehicle_name+'</p><span>Max Bid:'+row.bid.bid_price+'</span><span style="padding-left: 60px;">'+row.bid.created_at+'</span>'
                    bodyData+='<div class="card card-body " style="width: 40%;float: right;" ><ul><li><a href="{{route('sellerDetails',["bided"=>"bided",'id'=>'row.id',"slug"=>"seller"])}}"> Sellers Details</a></li></ul> </div>';
                        bodyData+='</div>';
                    $("#search").html(bodyData);
                    $("#first").html('');
                    $("#no-record").html('');
                })

            }
            else{
                $("#search").html("");
                $("#first").hide();
                $(".count").html("0  <span style='margin: 5px'>Results</span>");
            $("#no-record").html('<h4>No matching vehicles found</h4><a href="" class="btn btn-danger">Clear Search Filter</a>');
            }
        }
        });
    } 
    else {
        return;
    }
    });
    </script>

@endpush

