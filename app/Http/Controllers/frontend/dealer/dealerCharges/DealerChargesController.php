<?php

namespace App\Http\Controllers\frontend\dealer\dealerCharges;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DealerWinningCharges;
use Illuminate\Support\Facades\Auth;

class DealerChargesController extends Controller
{
    public function sellerDetails($id)
    {
      
        $user_id = Auth::user()->id;
       $charges =  DealerWinningCharges::find($user_id);
     
        if($charges == null){
            return redirect()->route('cardDetails')->with('error','First You Need To Pay');
           
        }
        else{
            $allVehicles = Vehicle::Where('status',1)->where('id',$id)->with('vehicleInformation')->with('VehicleImage')->first();
       $user = User::where('id',$allVehicles->user_id)->first();
      
        return view('frontend.dealer.sellerDetails.sellerDetail',compact('user','allVehicles'));
        }
    }

    public function cardDetails()
    {
      
        return view('frontend.dealer.sellerDetails.cardDetail');
    }

    public function cardDetailsCreate(Request $request)
    {
        $request->validate([
            'card_num' => 'required|min:16|max:16',
            'name' => 'required',
            'exp' => 'required',

        ]);
     $chargesDetails = new DealerWinningCharges;
     $user_id = Auth::user()->id;
     $chargesDetails->user_id = $user_id;
     $chargesDetails->card_number = $request->card_num;
     $chargesDetails->card_holder_name = $request->name;
     $chargesDetails->card_expiry_date = $request->exp;
     $chargesDetails->save();
     return redirect()->route('CompletedBiddedVehicle')->with('success','Your Details Is Submitted , Admin Will Contact You As Soon As Possible');
    }
}
