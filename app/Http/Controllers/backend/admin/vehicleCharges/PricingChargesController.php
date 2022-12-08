<?php

namespace App\Http\Controllers\backend\admin\vehicleCharges;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VehicleWinningCharges;

class PricingChargesController extends Controller
{
    public function viewPricing()
    {
        $pricing = VehicleWinningCharges::get();
        return view('backend.admin.pricing.pricingView',compact('pricing'));
    }
}
