<?php

namespace App\Http\Controllers\backend\admin\bid;

use App\Models\Vehicle;
use App\Models\vehicleInformation;
use App\Models\VehicleImage;
use App\Models\BidedVehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BidVehicleController extends Controller
{
 
    public function viewBiddedVehicle()
  
    {

       $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->get();
       
        return view('backend.admin.bidding.biddedVehicle',compact('vehicles'));
    }

    public function allBiddingVehicle()
  
    {
       $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->get();
      
        return view('backend.admin.bidding.biddedVehicle',compact('vehicles'));
    }
    public function singleBid($id)
  
    {
       $orders = BidedVehicle::with('vehicle')->with('user')
       ->where('vehicle_id',$id)->get();
     
      
        return view('backend.admin.bidding.singlebiddedVehicle',compact('orders'));
    }
    public function bidMeeting(Request $request){
      
        $orders = BidedVehicle::where('id',$request->id)->with('user')->with('vehicle')->first();
        return $orders;
    
        }
    public function approveBid($id){
     
        $orders = BidedVehicle::where('id',$id)->first();
        $orders->status = 1;
        $orders->save();
      $ordered_vehicle = Vehicle::where('id',$orders->vehicle->id)->first();
      $ordered_vehicle->status = 2 ;
      $ordered_vehicle->save();
        return redirect()->back()->with('success', 'Order Approved Successfully!');
    
        
        }   
    
    public function approveBidWithAdminUpdated(Request $request){
      // dd($request->all());
      $request->validate([
        'updatedPrice' => 'required',
        ]);
      $orders = BidedVehicle::where('id',$request->orderId)->first();
      $orders->request_price = $request->updatedPrice;
      $orders->status = 1;
      $orders->admin_updated_status = 1;
      $orders->save();
      $ordered_vehicle = Vehicle::where('id',$orders->vehicle_id)->first();
      $ordered_vehicle->status = 2 ;
      $ordered_vehicle->save();
      return redirect()->back()->with('success', 'Order Approved And Updated Successfully!');
  
      
       }     
}
