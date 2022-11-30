<?php

namespace App\Http\Controllers\frontend\dealer\vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AddDealerVehicleController extends Controller
{
    public function addVehicleToSellFromDealer()
    {

        return view('frontend.dealer.dealerVehicles.vehicleLookUp');

    }
    public function addVehicleToSellFromDealerPost(Request $request)
    {

        Session::put('vehicle_registartion_number', $request->vehicle_registartion_number);
        Session::put('vehicle_mileage', $request->vehicle_mileage);
        $validatedData = $request->validate([
            'vehicle_registartion_number' => 'required',
            'vehicle_mileage' => 'required|numeric',

        ]);
        $request->validate([
            'RegisterationNumber' => 'required',
            'VehicleName' => 'required'  ]);
        return view('frontend.dealer.dealerVehicles.mediaCondition');
    }

    public function mediaCondition(Request $request)
    {

        return view('frontend.dealer.dealerVehicles.mediaCondition');

    }



    public function mediaConditionPost(Request $request)
    {


        dd(Session::get('vehicle_registartion_number'));
        return view('frontend.dealer.dealerVehicles.dehicleAndDetails');

    }



    public function dehicleAndDetailsPost(Request $request)
    {
            Session::put('listing_type', $request->listing_type);
            Session::put('stand_in_value', $request->stand_in_value);
            Session::put('vat', $request->vat);
            Session::put('confirm', $request->confirm);
            //dd(Session::get('listing_type'));
        return view('frontend.dealer.dealerVehicles.dehicleAndDetails');
    }
    public function vehicleListing(Request $request)
    {

        return view('frontend.dealer.dealerVehicles.vehicleListing');

    }
}
