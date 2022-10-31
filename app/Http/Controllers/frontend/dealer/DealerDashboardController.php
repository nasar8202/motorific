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

        $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->get();
        
        return view('frontend.dealer.index',compact('vehicles'));

    }
    public function dashboard()
    {

        return view('frontend.dealer.dashboard');

    }
}

