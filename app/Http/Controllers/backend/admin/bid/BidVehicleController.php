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
    public function approveBid($id,$vid){
     
      $orders = BidedVehicle::where('vehicle_id',$vid)->get();
      foreach($orders as $ord){
        if($ord->status == 1){
        return redirect()->back()->with('warning', 'Vehicle Already Assign To Another User!');        
      }
    
      else{
        $orders = BidedVehicle::where('id',$id)->first();
        $orders->status = 1;
        $orders->save();
      $ordered_vehicle = Vehicle::where('id',$orders->vehicle->id)->first();
      $ordered_vehicle->status = 2 ;
      $ordered_vehicle->save();
        return redirect()->back()->with('success', 'Bid Approved Successfully!');
    
      }
    }    
        
        }   
    
    public function approveBidWithAdminUpdated(Request $request){
      // dd($request->all());
      $request->validate([
        'updatedPrice' => 'required',
        ]);
      $orders = BidedVehicle::where('id',$request->orderId)->first();
      $vehicle = BidedVehicle::where('vehicle_id',$orders->vehicle_id)->get();
      
      foreach($vehicle as $ord){
        if($ord->status == 1){
        return redirect()->back()->with('warning', 'Vehicle Already Assign To Another User!');        
      }
      else{
        $orders->bid_price = $request->updatedPrice;
        $orders->status = 1;
        $orders->admin_updated_status = 1;
        $orders->save();
        $ordered_vehicle = Vehicle::where('id',$orders->vehicle_id)->first();
        $ordered_vehicle->status = 2 ;
        $ordered_vehicle->save();
        return redirect()->back()->with('success', 'Order Approved And Updated Successfully!');
      }
      
    }
      
       }  
    public function unassignBid($id){
      
      $unassign_bid = BidedVehicle::where('id',$id)->first();
      if($unassign_bid->meeting_status == 'Completed'){
        return redirect()->back()->with('warning', 'This Vehicle Sold Successfully! , You Cant Make Changes ');
      }
      else{
      $unassign_bid->status = 0 ;
      $unassign_bid->save();
      return redirect()->back()->with('success', 'Bid Unassign Successfully!');
   } 
  }     
}
