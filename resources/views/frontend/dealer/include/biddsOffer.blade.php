<form>
    <h2>Shortlist</h2>


     <div class="filterIn">

        <div class="filterIn">
            <button type="button" class="btn-qa" data-bs-toggle="collapse" data-bs-target="#Bids_and_offers">
                <span>
                    Bids And Offers
                </span>
                <span>
                    <i class="fa-solid fa-angle-down"></i>
                </span>
            </button>
            <div id="Bids_and_offers" class="collapse">
                <br>
                <p><a href="{{ route('bids.ActiveBiddedVehicle') }}" class="active">Active</a></p><br>
                <p><a href="{{ route('bids.UnderBiddedOfferVehicle') }}">Under Offer</a></p><br>
                <p><a href="{{ route('bids.DidnotWinBiddedVehicle') }}">Didn't Win</a></p>
            </div>
        </div>
    </div>
    <div class="filterIn">
        <button type="button" class="btn-qa" data-bs-toggle="collapse" data-bs-target="#purchases">
            <span>Purchases</span>
            <span>
                <i class="fa-solid fa-angle-down"></i>
            </span>
        </button>
            <div id="purchases" class="collapse">
                <br>
                <p><a href="{{ route('bids.CompletedBiddedVehicle') }}">Completed</a></p><br>
                <p><a href="{{ route('bids.CancelledBiddedOfferVehicle') }}">Cancelled</a></p><br>
                <p><a href="{{ route('CompletedRequestedVehicle') }}">Completed Requested Vehicle</a></p><br>
                <p><a href="{{ route('CancelRequestedVehicle') }}">Cancelled Requested Vehicle</a></p><br>

            </div>
    </div>
    <div class="filterIn">
        <button type="button" class="btn-qa" data-bs-toggle="collapse" data-bs-target="#vehicles">
            <span>Vehicles</span>
            <span>
                <i class="fa-solid fa-angle-down"></i>
            </span>
        </button>
            <div id="vehicles" class="collapse">
                <br>
                <p><a href="{{ route('myVehicles') }}"> My Vehicles</a></p><br>

            </div>
    </div>

</form>
