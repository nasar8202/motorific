<?php

namespace App\Http\Controllers\frontend\dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function pricing(){
    
    return view('frontend.dealer.pricing');    
    
    }
}
