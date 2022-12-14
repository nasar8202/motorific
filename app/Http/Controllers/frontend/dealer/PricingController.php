<?php

namespace App\Http\Controllers\frontend\dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleWinningCharges;

class PricingController extends Controller
{
    public function pricing(){
    $charges =  VehicleWinningCharges::get();
    return view('frontend.dealer.pricing',compact('charges'));    
    
    }
}
