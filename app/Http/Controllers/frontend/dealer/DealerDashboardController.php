<?php

namespace App\Http\Controllers\frontend\dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\vehicleInformation;

class DealerDashboardController extends Controller
{
    public function index()
    {

        $vehicles = Vehicle::Where('status',1)->with('vehicleInformation')->with('VehicleImage')->get();
        $countVehicle = Vehicle::where('status',1)->count();

        return view('frontend.dealer.index',compact('vehicles','countVehicle'));

    }

    public function vehicleDetail($id)
    {
        $vehicle = Vehicle::Where('id',$id)->with('vehicleInformation')->with('VehicleImage')->first();

        return view('frontend.dealer.vehicle.vehicleDetail',compact('vehicle'));
    }
    public function dashboard()
    {

        return view('frontend.dealer.dashboard');

    }
}

