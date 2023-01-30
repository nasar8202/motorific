<?php

namespace App\Http\Controllers\backend\admin\meetings;

use App\Http\Controllers\Controller;
use App\Models\CanceledRequestReviews;
use Illuminate\Http\Request;

class CancelVehicleController extends Controller
{
    public function cancelVehicle()
    { 
      
        $orders = CanceledRequestReviews::with(['user','vehicle','dealerVehicle','order','dealerOrder'])->get();
        return view('backend.admin.cancelVehicle.canceledVehicle',compact('orders'));
    }
}
