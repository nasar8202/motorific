<?php

namespace App\Http\Controllers\frontend\dealer\dealerOrderRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DealersOrderVehicleRequest;

class DealerOrderRequestController extends Controller
{
    public function orderVehicleRequest(Request $request)
    {
        // dd($request->all());
        $order = new DealersOrderVehicleRequest;
        $order->user_id = Auth::user()->id;
        $order->vehicle_id = $request->VehicleId;
        $order->request_price = $request->BidPrice;
        $order->status = 0;
        $order->save();

        if($order){
            return response()->json(['success' => 'Order Request successfully Added . Wait For Seller Approvel']);
        }
        else{
            return 0;
        }

        
    }
    public function cancelDealerRequest($id)
    {
        $cancelbid = DealersOrderVehicleRequest::where('id',$id)->first();
        $cancelbid->delete();
        return back()->with('error', 'Order Cancel Succesfully');

    }
}

