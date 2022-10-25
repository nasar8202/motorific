<?php

namespace App\Http\Controllers\frontend\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerDashboardController extends Controller
{
    public function seller()
    {

        return view('frontend.seller.index');

    }
}
