<?php

namespace App\Http\Controllers\frontend\dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleWinningCharges;
use App\Models\Blog;

class Sitemap extends Controller
{
    public function sitemap(){
    
        $Blog =  Blog::get();
        return response()->view('frontend.dealer.sitemap', ['Blog' => $Blog])->header('Content-Type', 'text/xml');
        //dd($Blog);
        // return view('frontend.dealer.sitemap',compact('Blog'))->header('Content-Type', 'text/xml');
    }
}