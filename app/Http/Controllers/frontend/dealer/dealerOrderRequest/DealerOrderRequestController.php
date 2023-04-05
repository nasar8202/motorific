<?php

namespace App\Http\Controllers\frontend\dealer\dealerOrderRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DealersOrderVehicleRequest;
use App\Models\DealerVehicle;

class DealerOrderRequestController extends Controller
{
    public function orderVehicleRequest(Request $request)
    {
        // dd($request->all());
        // $order = new DealersOrderVehicleRequest;
        // $order->user_id = Auth::user()->id;
        // $order->vehicle_id = $request->VehicleId;
        // $order->request_price = $request->BidPrice;
        // $order->status = 0;
        // $order->save();

        // if($order){
        //     return response()->json(['success' => 'Order Request successfully Added . Wait For Seller Approvel']);
        // }
        // else{
        //     return 0;
        // }

        $vehicle = DealerVehicle::where('status',1)->where('id',$request->VehicleId)->first();
        
        if( $request->BidPrice >= $vehicle->reserve_price ){
        $order = new DealersOrderVehicleRequest;
        $order->user_id = Auth::user()->id;
        $order->vehicle_id = $request->VehicleId;
        $order->request_price = $request->BidPrice;
        $order->status = 1;
        $order->save();
        $vehicle->status = 2;
        $vehicle->save();
        if($order){
            return response()->json(['success' => 'Congrats You Have Succesully Purchase This Vehicle. Go To The Purchases To Process Forward']);
        }
        else{
            return 0;
        }
    }
    else{

        $order = new DealersOrderVehicleRequest;
        $order->user_id = Auth::user()->id;
        $order->vehicle_id = $request->VehicleId;
        $order->request_price = $request->BidPrice;
        $order->status = 0;
        $order->save();
    
        if($order){
            return response()->json(['success' => 'Your Offer successfully Added . Wait For Seller Approvel']);
        }
        else{
            return 0;
        }


    }
        
    }
    public function cancelDealerRequest($id)
    {   
        
        $cancelbid = DealersOrderVehicleRequest::where('id',$id)->first();
        
        $cancelbid->delete();
        return back()->with('error', 'Order Cancel Succesfully');

    }
    public function buyNowFromDealer($id)
  {
    $vehicle = DealerVehicle::where('status',1)->where('id',$id)->first();
        
    
    $order = new DealersOrderVehicleRequest;
    $order->user_id = Auth::user()->id;
    $order->vehicle_id = $id;
    $order->request_price = $vehicle->reserve_price;
    $order->status = 1;
    $order->save();
    $vehicle->status = 2;
    $vehicle->save();
    return redirect()->route('dealerToDealer')->with('success', 'Vehicle Succesfully Purchase. Check Your Purchases For More Details');
  }
}

