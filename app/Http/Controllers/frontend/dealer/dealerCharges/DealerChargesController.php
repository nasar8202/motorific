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
       $allVehicles = Vehicle::Where('status',1)->where('id',$id)->with('vehicleInformation')->with('VehicleImage')->first();
       $user = User::where('id',$allVehicles->user_id)->first();
      
        return view('frontend.dealer.sellerDetails.sellerDetail',compact('user','allVehicles'));
        // if($charges == null){
        //     return redirect()->back()->with('error','First You Need To Pay');
           
        // }
        // else{
          
        // }
    }
}
