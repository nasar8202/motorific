<?php

namespace App\Http\Controllers\backend\admin\dealerOrderVehicleRequest;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DealerVehicle;
use App\Models\OrderVehicleRequest;
use App\Http\Controllers\Controller;
use App\Models\DealersOrderVehicleRequest;

class DealerOrderVehicleRequestController extends Controller
{
    public function viewDealerOrderVehicle()
    {
        $orders = DealersOrderVehicleRequest::with('user')->with('vehicle')->get();
        // dd($order);
        
        return view('backend.admin.DealersorderVehicleRequests.dealersRequestsVehicle',compact('orders'));
    }
     public function orderdDealerDetail($id){
      
        $dealers = User::where('id',$id)->with('userDetails')->first();


        return view('backend.admin.DealersorderVehicleRequests.viewOrderdDealerDetail',compact('dealers'));
    
   }
   public function dealersOrderdVehicleDetail($id){
      
    $vehicles = DealerVehicle::
    with('DealerVehicleHistory')
    ->with('DealerVehicleExterior')
    ->with('DealerVehicleInterior')
    ->where('id',$id)->first();
    
    
    return view('backend.admin.DealersorderVehicleRequests.VehicleDetail',compact('vehicles'));
        
     }
    
     public function vehicleOwnerDetails($id){
      
        $seller = User::where('id',$id)->with('userDetails')->first();
        
    
        return view('backend.admin.DealersorderVehicleRequests.vehicleOwnerDetail',compact('seller'));
    
    }  
    public function approveDealersOrder($id){
        
        $orders = DealersOrderVehicleRequest::where('id',$id)->first();
        $ordered_vehicle = DealerVehicle::where('id',$orders->vehicle->id)->first();
        if($ordered_vehicle->status == 2){
          
        return redirect()->back()->with('warning', 'This Order Is Already Assing To Another!');
        }
        else{
        $orders->status = 1;
        $orders->save();
      $ordered_vehicle->status = 2 ;
      $ordered_vehicle->save();
        return redirect()->back()->with('success', 'Order Approved Successfully!');
      }
        
    }
    public function approveDealersOrderdWithAdminUpdated(Request $request){
        // dd($request->all());
        $request->validate([
          'updatedPrice' => 'required',
          
         
      ]);
        $orders = DealersOrderVehicleRequest::where('id',$request->orderId)->first();
        $ordered_vehicle = DealerVehicle::where('id',$orders->vehicle_id)->first();
        if($ordered_vehicle->status == 2){
          
          return redirect()->back()->with('warning', 'This Order Is Already Assing To Another!');
          }
          else{
        $orders->request_price = $request->updatedPrice;
        $orders->status = 1;
        $orders->admin_updated_status = 1;
        $orders->save();
      $ordered_vehicle->status = 2 ;
      $ordered_vehicle->save();
          }
        return redirect()->back()->with('success', 'Order Approved And Updated Successfully!');
    
        
    }
    public function unassignReq($id){
      
      $unassign_bid = OrderVehicleRequest::where('id',$id)->first();
      $unassign_bid->status = 0 ;
      $unassign_bid->save();
      return redirect()->back()->with('success', 'Bid Unassign Successfully!');
   }      
        
}
