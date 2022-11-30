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

        $validatedData = $request->validate([
            'vehicle_registartion_number' => 'required',
            'vehicle_mileage' => 'required|numeric',
        ]);
        Session::put('vehicle_registartion_number', $request->vehicle_registartion_number);
        Session::put('vehicle_mileage', $request->vehicle_mileage);

        return redirect()->route('dealer.mediaCondition');
    }

    public function mediaCondition(Request $request)
    {

        return view('frontend.dealer.dealerVehicles.mediaCondition');

    }



    public function mediaConditionPost(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'listing_type' => 'required',
            'stand_in_value' => 'required',
            'vat' => 'required',
            'confirm' => 'required',

        ]);
        Session::put('listing_type', $request->listing_type);
        Session::put('stand_in_value', $request->stand_in_value);
        Session::put('vat', $request->vat);
        Session::put('confirm', $request->confirm);
        return redirect()->route('dealer.vehicleAndDetails');
        // return view('frontend.dealer.dealerVehicles.vehicleAndDetails');

    }


    public function vehicleAndDetails()
    {
        return view('frontend.dealer.dealerVehicles.vehicleAndDetails');
    }

    public function vehicleAndDetailsPost(Request $request)
    {
        // $request->validate([
        //     'image_1' => 'required',
        //     'image_2' => 'required',
        //     'image_3' => 'required',
        //     'image_4' => 'required',
        //     'image_5' => 'required',
        //     'image_6' => 'required',
        //     'image_7' => 'required',
        //     'image_8' => 'required',
        //     'image_9' => 'required',
        //     'interior_image_1' => 'required',
        //     'interior_image_2' => 'required',
        //     'interior_image_3' => 'required',
        //     'interior_image_4' => 'required',
        //     'interior_image_5' => 'required',
        //     'condition_damage' => 'required',
        //     'condition_damage_url' => 'required',
        //     'existing_condition_report' => 'required',
        //     'any_damage_checked' => 'required',
        //     'advert_description' => 'required',
        //     'attention_grabber' => 'required',
        //     'nearside_front' => 'required',
        //     'nearside_rear' => 'required',
        //     'offside_front' => 'required',
        //     'offside_rear' => 'required',

        // ]);



            $image_1 = time() . '_' . $request->file('image_1')->getClientOriginalName();
            $request->file('image_1')->move(public_path() . '/uploads/dealerVehicles/', $image_1);

            $image_2 = time() . '_' . $request->file('image_2')->getClientOriginalName();
            $request->file('image_2')->move(public_path() . '/uploads/dealerVehicles/', $image_2);

            $image_3 = time() . '_' . $request->file('image_3')->getClientOriginalName();
            $request->file('image_3')->move(public_path() . '/uploads/dealerVehicles/', $image_3);

            $image_4 = time() . '_' . $request->file('image_4')->getClientOriginalName();
            $request->file('image_4')->move(public_path() . '/uploads/dealerVehicles/', $image_4);

            $image_5 = time() . '_' . $request->file('image_5')->getClientOriginalName();
            $request->file('image_5')->move(public_path() . '/uploads/dealerVehicles/', $image_5);

            $image_6 = time() . '_' . $request->file('image_6')->getClientOriginalName();
            $request->file('image_6')->move(public_path() . '/uploads/dealerVehicles/', $image_6);

            $image_7 = time() . '_' . $request->file('image_7')->getClientOriginalName();
            $request->file('image_7')->move(public_path() . '/uploads/dealerVehicles/', $image_7);

            $image_8 = time() . '_' . $request->file('image_8')->getClientOriginalName();
            $request->file('image_8')->move(public_path() . '/uploads/dealerVehicles/', $image_8);

            $image_9 = time() . '_' . $request->file('image_9')->getClientOriginalName();
            $request->file('image_9')->move(public_path() . '/uploads/dealerVehicles/', $image_9);

            $interior_image_1 = time() . '_' . $request->file('interior_image_1')->getClientOriginalName();
            $request->file('interior_image_1')->move(public_path() . '/uploads/dealerVehicles/', $interior_image_1);

            $interior_image_2 = time() . '_' . $request->file('interior_image_2')->getClientOriginalName();
            $request->file('interior_image_2')->move(public_path() . '/uploads/dealerVehicles/', $interior_image_2);

            $interior_image_3 = time() . '_' . $request->file('interior_image_3')->getClientOriginalName();
            $request->file('interior_image_3')->move(public_path() . '/uploads/dealerVehicles/', $interior_image_3);

            $interior_image_4 = time() . '_' . $request->file('interior_image_4')->getClientOriginalName();
            $request->file('interior_image_4')->move(public_path() . '/uploads/dealerVehicles/', $interior_image_4);

            $interior_image_5 = time() . '_' . $request->file('interior_image_5')->getClientOriginalName();
            $request->file('interior_image_5')->move(public_path() . '/uploads/dealerVehicles/', $interior_image_5);

            Session::put('image_1', $image_1);
            Session::put('image_2', $image_2);
            Session::put('image_3', $image_3);
            Session::put('image_4', $image_4);
            Session::put('image_5', $image_5);
            Session::put('image_6', $image_6);
            Session::put('image_7', $image_7);
            Session::put('image_8', $image_8);
            Session::put('image_9', $image_9);

            Session::put('interior_image_1', $interior_image_1);
            Session::put('interior_image_2', $interior_image_2);
            Session::put('interior_image_3', $interior_image_3);
            Session::put('interior_image_4', $interior_image_4);
            Session::put('interior_image_5', $interior_image_5);
            Session::put('condition_damage', $condition_damage);
            Session::put('condition_damage_url', $request->condition_damage_url);
            Session::put('existing_condition_report', $request->existing_condition_report);
            Session::put('any_damage_checked', $request->any_damage_checked);
            Session::put('advert_description', $request->advert_description);
            Session::put('attention_grabber', $request->attention_grabber);
            Session::put('nearside_front', $request->nearside_front);
            Session::put('nearside_rear', $request->nearside_rear);
            Session::put('offside_front', $request->offside_front);
            Session::put('offside_rear', $request->offside_rear);

            //$image_1 = Session::get('image_1');






            return redirect()->route('dealer.vehicleListing');
    }
    public function vehicleListing(Request $request)
    {

        return view('frontend.dealer.dealerVehicles.vehicleListing');

    }
    public function vehicleListingPost(Request $request)
    {

        $request->validate([
            'keys' => 'required',
            'previous_owners' => 'required',
            'service_history_title' => 'required',
            'mileage' => 'required',
            'v5_status' => 'required',
            'origin' => 'required',
            'interior' => 'required',
            'exterior' => 'required',
            'audio_and_communications' => 'required',
            'drivers_assistance' => 'required',
            'checkbox_questions' => 'required',
            'illumination' => 'required',
            'performance' => 'required',
            'safety_and_security' => 'required',


        ]);
            Session::put('keys', $request->keys);
            Session::put('previous_owners', $request->previous_owners);
            Session::put('service_history_title', $request->service_history_title);
            Session::put('mileage', $request->mileage);
            Session::put('v5_status', $request->v5_status);
            Session::put('origin', $request->origin);
            dd( Session::get('origin'));
        //return view('frontend.dealer.dealerVehicles.vehicleListing');

    }
}
