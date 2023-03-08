<?php

namespace App\Http\Controllers\backend\admin\meetings;

use App\Http\Controllers\Controller;
use App\Models\CanceledRequestReviews;
use App\Models\CancelImages;
use Illuminate\Http\Request;

class CancelVehicleController extends Controller
{
    public function cancelVehicle()
    { 
      
        $orders = CanceledRequestReviews::with(['user','vehicle','dealerVehicle','order','dealerOrder'])->get();
        
        return view('backend.admin.cancelVehicle.canceledVehicle',compact('orders'));
    }
    public function cancelVehicleEvidence($id)
    { 
      
        $orders = CancelImages::where('cancel_review_id',$id)->get();
        
        return view('backend.admin.cancelVehicle.canceledVehicleEvidence',compact('orders'));
    }
}
