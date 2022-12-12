<?php

namespace App\Http\Controllers\backend\admin\orderRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderVehicleRequest;
class OrderRequestController extends Controller
{
    public function orderRequest(){
    $orders = OrderVehicleRequest::where('status',0)->get();
    
    return view('backend.admin.orderVehicleRequests.requestsVehicle',compact('orders'));

    }
}
