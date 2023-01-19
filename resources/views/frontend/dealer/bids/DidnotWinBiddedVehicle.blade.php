@extends('frontend.dealer.layouts.app')
@section('title','Bids And Offers')
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
<input type="hidden" id="path" value="{{ asset('')}}">

<section class="sec-2 productPageTn requested-vehicles">
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
                        {{-- <label for="usr">Search Bidded Vehcle:</label>
                        <input type="text" placeholder="Search in Complete" class="form-control" id="usr"> --}}
                        <br>
                        <p class="count">{{ $countBids  }} <span style="margin: 5px">Results</span></p>
                    </div>
                    <br>
                    <div class="row" id="first">
                        @forelse ($bids as $bid)
                        <div class="col-sm-4 vec-box p-0" ><img src="{{ asset('/vehicles/vehicles_images/'. $bid->front) }}" width="300px" height="200px"></div>
                        <div class="col-sm-8 vec-box p-0" >
                            <h1 style="font-size: 20px"><span >{{ $bid->vehicle_registartion_number }}</span></h1>
                            <p>{{ $bid->vehicle_name }}</p>
                            <span>Max Bid:{{ $bid->bid_price }}</span>
                            <span style="padding-left: 60px;">{{ $bid->created_at->format('m/d/Y') }}</span>

                        </div>
                        @empty
                        <div class="col-sm-12">No active bids or offers!</div>

                        @endforelse

                    </div>
                    <div class="row searchDiv">

                    </div>
                    <div class=""  id="no-record" ></div>

                    <br>

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
        
    $('#usr').keyup(function (e) { 
        
        
        if(e.target.value !== ''){
            // console.log("hre",typeof(e.target.value));
            // return;
        var search = $('#usr').val();
        $.ajax({
            type: "GET",
            url: "{{route('didNotWinSearch')}}",
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
            $("#no-record").html('');

                    $(".count").html("");
                    $(".count").html(count_length+ "  <span style='margin: 5px'>Results</span>");
                $.each(resultData,function(resultData,row){
                    bodyData+='<div class="col-sm-4 vec-box p-0" ><img src="'+path+'vehicles/vehicles_images/'+row.vehicle_image.front+'  " width="300px" height="200px"></div>'
                    bodyData+='<div class="col-sm-8 vec-box p-0" ><h1 style="font-size: 20px"><span >'+row.vehicle_registartion_number+'</span></h1><p>'+row.vehicle_name+'</p><span>Max Bid:'+row.bid.bid_price+'</span><span style="padding-left: 60px;">'+row.bid.created_at+'</span>'
                    bodyData+='</div>';
                    $(".searchDiv").html(bodyData);
                    $("#first").html('');
                })

            }
            else{
                $(".searchDiv").html("");
                $("#first").hide();
                $(".count").html("0  <span style='margin: 5px'>Results</span>");
            $("#no-record").html('<h4>No matching vehicles found</h4><br><p>To see more results, try selecting different filters.</p><a href="{{URL::to('dealer/dashboard')}}" class="btn btn-danger">Clear All Filter</a>');
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

