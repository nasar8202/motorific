<?php

namespace App\Http\Controllers\frontend\dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DealerDashboardController extends Controller
{
    public function seller()
    {

        return view('frontend.dealer.index');

    }
}
