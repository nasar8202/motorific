<?php

namespace App\Http\Controllers\frontend\dealer\orderRequest;

use Illuminate\Http\Request;
use App\Models\OrderVehicleRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderVehicleRequestController extends Controller
{
    public function vehicleRequest(Request $request)
    {
        $order = new OrderVehicleRequest;
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
}