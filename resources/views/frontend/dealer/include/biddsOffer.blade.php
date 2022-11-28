<form>
    <h2>Shortlist</h2>


     <div class="filterIn">

        <div class="filterIn">
            <button type="button" class="btn btn-info text-white" data-bs-toggle="collapse" data-bs-target="#Bids_and_offers">Bids And Offers</button>
            <div id="Bids_and_offers" class="collapse">
                <br>
                <p><a href="{{ route('bids.ActiveBiddedVehicle') }}" class="active">Active</a></p><br>
                <p><a href="{{ route('bids.UnderBiddedOfferVehicle') }}">Under Offer</a></p><br>
                <p><a href="{{ route('bids.DidnotWinBiddedVehicle') }}">Didn't Win</a></p>
            </div>
        </div>
    </div>
    <div class="filterIn">
        <button type="button" class="btn btn-info text-white" data-bs-toggle="collapse" data-bs-target="#purchases">Purchases</button>
            <div id="purchases" class="collapse">
                <br>
                <p><a href="{{ route('bids.CompletedBiddedVehicle') }}">Completed</a></p><br>
                <p><a href="{{ route('bids.CancelledBiddedOfferVehicle') }}">Cancelled</a></p><br>

            </div>
    </div>

</form>
