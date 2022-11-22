<?php

namespace App\Http\Controllers\frontend\dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowItWorksController extends Controller
{
    public function howItWorks(){
    
    return view('frontend.dealer.howItWorks');    
    
    }
}
