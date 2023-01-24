<?php

namespace App\Http\Controllers\backend\admin\orderRequest;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\OrderVehicleRequest;
use App\Http\Controllers\Controller;
use App\Models\DealersOrderVehicleRequest;

class OrderRequestController extends Controller
{
    public function orderRequest(){
    $orders = OrderVehicleRequest::with('user')->with('vehicle')->get();
    
    return view('backend.admin.orderVehicleRequests.requestsVehicle',compact('orders'));

    }

    public function dealerOrderRequestMeeting(Request $request){
      
      $orders = DealersOrderVehicleRequest::where('id',$request->id)->with('user')->with('vehicle')->first();
      return $orders;
  
    }
    public function orderRequestMeeting(Request $request){
      
      $orders = OrderVehicleRequest::where('id',$request->id)->with('user')->with('vehicle')->first();
      return $orders;
  
      }
    public function orderdUserDetail($id){
      
        $dealers = User::where('id',$id)->with('userDetails')->first();


        return view('backend.admin.orderVehicleRequests.viewUserDetail',compact('dealers'));
    
   }
   public function orderdSellerDetail($id){
      
    $seller = User::where('id',$id)->with('userDetails')->first();
    

    return view('backend.admin.orderVehicleRequests.sellerDetail',compact('seller'));

}
        

    public function orderdVehicleDetail($id){
      
    $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->where('id',$id)->first();
    
    
    return view('backend.admin.orderVehicleRequests.VehicleDetail',compact('vehicles'));
        
     }
     public function approveOrderdWithAdminUpdated(Request $request){
      // dd($request->all());
      $request->validate([
        'updatedPrice' => 'required',
        
       
    ]);
      $orders = OrderVehicleRequest::where('id',$request->orderId)->first();
      $vehicles = OrderVehicleRequest::where('vehicle_id',$orders->vehicle_id)->get();
      foreach($vehicles as $ord){
        if($ord->status == 1){
        return redirect()->back()->with('warning', 'Vehicle Already Assign To Another User!');        
      }
      else{
        $orders->request_price = $request->updatedPrice;
        $orders->status = 1;
        $orders->admin_updated_status = 1;
        $orders->save();
        $ordered_vehicle = Vehicle::where('id',$orders->vehicle_id)->first();
        $ordered_vehicle->status = 2 ;
        $ordered_vehicle->save();
        return redirect()->back()->with('success', 'Request Approved And Updated Successfully!');
      }
    }
      
       }
     public function approveOrderd($id,$vId){
      
      $orders = OrderVehicleRequest::where('vehicle_id',$vId)->get();
      foreach($orders as $ord){
        if($ord->status == 1){
        return redirect()->back()->with('warning', 'Vehicle Already Assign To Another User!');        
      }
    
      else{
        $orders = OrderVehicleRequest::where('id',$id)->first();
        $orders->status = 1;
        $orders->save();
      $ordered_vehicle = Vehicle::where('id',$orders->vehicle->id)->first();
      $ordered_vehicle->status = 2 ;
      $ordered_vehicle->save();
        return redirect()->back()->with('success', 'Bid Approved Successfully!');
    
      }
    }    
        
    
  }

  public function unassignReq($id){
      
      $unassign_req = OrderVehicleRequest::where('id',$id)->first();
      if($unassign_req->meeting_status == 'Completed'){
        return redirect()->back()->with('warning', 'This Vehicle Sold Successfully! , You Cant Make Changes ');
      }
      else{
      $unassign_req->status = 0 ;
      $unassign_req->save();
      return redirect()->back()->with('success', 'Request Unassign Successfully!');
    }
    }             
}
