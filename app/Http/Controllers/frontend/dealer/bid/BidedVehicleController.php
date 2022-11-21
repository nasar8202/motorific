<?php

namespace App\Http\Controllers\frontend\dealer\bid;

use App\Models\BidedVehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BidedVehicleController extends Controller
{

    public function bid(Request $request)
    {
        $biding = new BidedVehicle;
        $biding->user_id = Auth::user()->id;
        $biding->vehicle_id = $request->VehicleId;
        $biding->bid_price = $request->BidPrice;
        $biding->save();

        if($biding){
            return response()->json(['success' => 'Bid successfully Added']);
        }
        else{
            return 0;
        }


    }
}
