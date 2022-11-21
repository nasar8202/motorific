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
       $bids = BidedVehicle::join('vehicles', 'vehicles.id', '=', 'bided_vehicles.vehicle_id')
       ->join('users', 'users.id', '=', 'bided_vehicles.user_id')
       ->where('vehicle_id',$id)->get();
     
    //    dd($vehicles);
      
        return view('backend.admin.bidding.singlebiddedVehicle',compact('bids'));
    }
}
