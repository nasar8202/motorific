<?php

namespace App\Http\Controllers\frontend\dealer\orderRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\OrderVehicleRequest;

class OrderVehicleRequestController extends Controller
{
    public function vehicleRequest(Request $request)
    {
        dd($request->all());

        return view('frontend.dealer.vehicle.index',compact('allVehicles','countAllVehicle'));

    }
}
