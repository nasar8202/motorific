<?php

namespace App\Http\Controllers\backend\admin\newVehicle;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerVehicleController extends Controller
{
    public function viewSellerDetails($id)
    {
        // dd($id);
       $vehicles = Vehicle::where('status',0)->where('id',$id)->first();
       $seller = User::where('id',$vehicles->user_id)->with('userDetails')->first();
       
        return view('backend.admin.sellerVehicle.sellerVehicleDetail',compact('seller'));
    }
    public function vehicleDetails($id)
    {
       $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')
       ->where('status',0)->where('id',$id)->first();
      
        return view('backend.admin.sellerVehicle.vehicleDetail',compact('vehicles'));
    }
    public function approveSellerVehicle($id)
    {
        
       $vehicles = Vehicle::where('id',$id)->first();
       if($vehicles->hidden_price == null){
        return redirect()->back()->with('warning', 'First Fill Out Vehicle Prices!');
    
    }
        $vehicles->status = 1;
        $vehicles->save();
        return redirect()->route('viewVehicle')->with('success', 'Vehicle Approved Successfully!');
    }
    public function deactivateSellerVehicle($id)
    {
        
       $vehicles = Vehicle::where('id',$id)->first();
     
        $vehicles->status = 0;
        $vehicles->save();
        return redirect()->route('viewVehicle')->with('error', 'Vehicle Deativate Successfully!');
    }
}
