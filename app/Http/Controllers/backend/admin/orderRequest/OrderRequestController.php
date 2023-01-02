<?php

namespace App\Http\Controllers\backend\admin\orderRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderVehicleRequest;
use App\Models\User;
use App\Models\Vehicle;
class OrderRequestController extends Controller
{
    public function orderRequest(){
    $orders = OrderVehicleRequest::with('user')->with('vehicle')->get();
    
    return view('backend.admin.orderVehicleRequests.requestsVehicle',compact('orders'));

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
      $orders = OrderVehicleRequest::where('id',$request->orderId)->first();
      $orders->request_price = $request->updatedPrice;
      $orders->status = 1;
      $orders->admin_updated_status = 1;
      $orders->save();
    $ordered_vehicle = Vehicle::where('id',$orders->vehicle_id)->first();
    $ordered_vehicle->status = 2 ;
    $ordered_vehicle->save();
      return redirect()->back()->with('success', 'Order Approved And Updated Successfully!');
  
      
       }
     public function approveOrderd($id){
        $orders = OrderVehicleRequest::where('id',$id)->first();
        $orders->status = 1;
        $orders->save();
      $ordered_vehicle = Vehicle::where('id',$orders->vehicle->id)->first();
      $ordered_vehicle->status = 2 ;
      $ordered_vehicle->save();
        return redirect()->back()->with('success', 'Order Approved Successfully!');
    
        
        }
}
