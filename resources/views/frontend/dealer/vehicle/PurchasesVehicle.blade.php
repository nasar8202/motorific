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

<section class="sec-2 productPageTn">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 productsFiltersCol">
            <div class="productsFilters">
                <form>
                    <h2>Shortlist</h2>

                    <div class="filterIn">

                    </div>
                     <div class="filterIn">
                        <h4>Bids And Offers</h4>

                    </div>
                    <div class="filterIn">
                        <h4>Purchases</h4>

                    </div>

                </form>
            </div>
        </div>
        <div class="col-lg-9 col-md-9">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="usr">Search Purchases Vehcle:</label>
                        <input type="text" placeholder="Search in Complete" class="form-control" id="usr">
                        <br>
                        <p>{{ $countBids  }}<span style="margin: 5px">Results</span></p>
                    </div>
                    <br>
                    <div class="row">
                        @forelse ($bids as $bid)
                        <div class="col-sm-4" style="padding: 10px;"><img src="{{ asset('/vehicles/vehicles_images/'. $bid->front) }}" width="300px" height="200px"></div>
                        <div class="col-sm-8" style="padding: 10px">
                            <h1 style="font-size: 20px"><span style="background-color:yellow;border-radius:45px;padding:7px">{{ $bid->vehicle_registartion_number }}</span></h1>
                            <br><p>{{ $bid->vehicle_name }}</p><br>
                            <span>Max Bid:{{ $bid->bid_price }}</span>
                            <span style="padding-left: 60px;">{{ $bid->created_at->format('m/d/Y') }}</span>

                        </div>
                        @empty
                        <div class="col-sm-12">No Purchases Vehicle Found!</div>

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


@endpush

