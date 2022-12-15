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
    $orders = OrderVehicleRequest::where('status',0)->with('user')->with('vehicle')->get();
    
    return view('backend.admin.orderVehicleRequests.requestsVehicle',compact('orders'));

    }
    public function orderdUserDetail($id){
      
        $dealers = User::where('id',$id)->with('userDetails')->first();


        return view('backend.admin.orderVehicleRequests.viewUserDetail',compact('dealers'));
    
        }

    public function orderdVehicleDetail($id){
      
    $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->where('id',$id)->first();
    
    
    return view('backend.admin.orderVehicleRequests.VehicleDetail',compact('vehicles'));
        
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
