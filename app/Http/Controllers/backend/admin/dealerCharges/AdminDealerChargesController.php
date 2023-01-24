<?php

namespace App\Http\Controllers\backend\admin\dealerCharges;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CardDetails;
use App\Models\DealerWinningCharges;

class AdminDealerChargesController extends Controller
{
    public function cardDetailsShowAdmin()
    {
        $dealerCardDetails = DealerWinningCharges::with('Vehicle')->with('user')->where('dealer_vehicle_id',null)->get();
        $dealervehicleCardDetails = DealerWinningCharges::with('dealerVehicle')->with('user')->where('vehicle_id',null)->get();
        
        return view('backend.admin.dealerCharges.dealerCharges',compact('dealerCardDetails','dealervehicleCardDetails'));
    }
    public function viewDealerDetailsFromCharges($id)
    {
        $dealers = User::where('id',$id)->with('userDetails')->first();

        return view('backend.admin.dealerCharges.viewDealersDetail',compact('dealers'));
    }
    public function dealerCardDetails($id)
    {
        $dealers = CardDetails::where('user_id',$id)->first();
        
        return view('backend.admin.dealerCharges.dealerCardDetails',compact('dealers'));
    }
    // public function cardDetailsAccept($id)
    // {
    //     $dealerCardDetails = DealerWinningCharges::find($id);
    //     $dealerCardDetails->status = 1;
    //     $dealerCardDetails->save();
    //     return redirect()->back()->with('success','You Approved This Dealer As A Paid Dealer');
    // }
}
