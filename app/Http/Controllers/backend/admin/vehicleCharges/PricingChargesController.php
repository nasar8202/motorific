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
    public function pricingCreate(Request $request)
    {
        
          
        $request->validate([
            'price_from' => 'required|numeric',
            'price_to' => 'required|numeric',
            'fee' => 'required|numeric'
            
        ]);
        $pricing = new VehicleWinningCharges;
        $pricing->price_from = $request->price_from;
        $pricing->price_to = $request->price_to;
        $pricing->fee = $request->fee;
        $pricing->status = 1;
        $pricing->save();
        return redirect()->route('viewPricing')->with('success', 'Pricing added  Successfully!');
    }
    public function pricingEdit($id)
    {
        $pricing = VehicleWinningCharges::findOrFail($id);
        // dd($pricing);
        return view('backend.admin.pricing.pricingEdit',compact('pricing'));
    }
    public function pricingDelete($id)
    {
        $pricing = VehicleWinningCharges::findOrFail($id);
        $pricing->delete();
        return redirect()->route('viewPricing')->with('error', 'Pricing Delete  Successfully!');
    }
    public function pricingUpdate(Request $request,$id)
    {
        
          
        $request->validate([
            'price_from' => 'required|numeric',
            'price_to' => 'required|numeric',
            'fee' => 'required|numeric'
            
        ]);
        $pricing = VehicleWinningCharges::find($id);
        $pricing->price_from = $request->price_from;
        $pricing->price_to = $request->price_to;
        $pricing->fee = $request->fee;
        $pricing->status = 1;
        $pricing->save();
        return redirect()->route('viewPricing')->with('success', 'Pricing Updated  Successfully!');
    }
}
