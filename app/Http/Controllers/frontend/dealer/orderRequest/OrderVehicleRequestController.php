<?php

namespace App\Http\Controllers\frontend\dealer\orderRequest;

use Illuminate\Http\Request;
use App\Models\OrderVehicleRequest;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

use App\Models\DealerVehicle;
use App\Models\DealersOrderVehicleRequest;

class OrderVehicleRequestController extends Controller
{
    public function vehicleRequest(Request $request)
    {   
        $vehicle = Vehicle::where('status',1)->where('id',$request->VehicleId)->first();
        if( $request->BidPrice >= $vehicle->reserve_price ){
        $order = new OrderVehicleRequest;
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

        $order = new OrderVehicleRequest;
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
    public function cancelRequest($id)
    {
        $cancelorder =  OrderVehicleRequest::find($id);
        $cancelorder->delete();
        
       return redirect()->back()->with('error','Your Request Is Canceled');
        
    }
    public function updateAmount(Request $request)
    {
        $updateorder =  OrderVehicleRequest::find($request->id);
       
      
        $updateorder->request_price = $request->updateAmountPrice;
        $updateorder->status = 0;
        $updateorder->save();

        if($updateorder){
            return response()->json(['success' => 'Order Requested Price Updated Succesfull']);
        }
        else{
            return 0;
        }
        
    }
    public function buyItNowFromSeller($id)
    {
      $vehicle = Vehicle::where('status',1)->where('id',$id)->first();
          
      
      $order = new OrderVehicleRequest;
      $order->user_id = Auth::user()->id;
      $order->vehicle_id = $id;
      $order->request_price = $vehicle->reserve_price;
      $order->status = 1;
      $order->save();
      $vehicle->status = 2;
      $vehicle->save();
      return redirect()->route('dealer.dashboard')->with('success', 'Vehicle Succesfully Purchase. Check Your Purchases For More Details');
    }

   	
}
