<?php

namespace App\Http\Controllers\frontend\dealer\vehicle;

use Exception;
use Illuminate\Http\Request;
use App\Models\DealerVehicle;
use App\Models\DealerVehicleMedia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DealerVehicleHistory;
use Illuminate\Support\Facades\Auth;
use App\Models\DealerVehicleExterior;
use App\Models\DealerVehicleInterior;
use Illuminate\Support\Facades\Session;
use App\Models\DealerAdvertVehicleDetail;

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
        return redirect()->route('dealer.vehicleListing');
        // return view('frontend.dealer.dealerVehicles.vehicleAndDetails');

    }


    public function vehicleAndDetails()
    {
        return view('frontend.dealer.dealerVehicles.vehicleAndDetails');
    }

    public function vehicleAndDetailsPost(Request $request)
    {
        $request->validate([
            'image_1' => 'required',
            'image_2' => 'required',
            'image_3' => 'required',
            'image_4' => 'required',
            'image_5' => 'required',
            'image_6' => 'required',
            'image_7' => 'required',
            'image_8' => 'required',
            'image_9' => 'required',
            'interior_image_1' => 'required',
            'interior_image_2' => 'required',
            'interior_image_3' => 'required',
            'interior_image_4' => 'required',
            'interior_image_5' => 'required',
            'condition_damage' => 'required',
            'condition_damage_url' => 'required',
            'existing_condition_report' => 'required',
            'any_damage_checked' => 'required',
            'advert_description' => 'required',
            'attention_grabber' => 'required',
            'nearside_front' => 'required',
            'nearside_rear' => 'required',
            'offside_front' => 'required',
            'offside_rear' => 'required',

        ]);

        DB::beginTransaction();
        try{
            $dealers_vehicle = new DealerVehicle;
            $dealers_vehicle->user_id = Auth::user()->id;
            $dealers_vehicle->vehicle_registartion_number = session()->get('vehicle_registartion_number');
            $dealers_vehicle->vehicle_mileage = session()->get('vehicle_mileage');
            $dealers_vehicle->save();

            $dealer_advert_vehicle = new DealerAdvertVehicleDetail;
            $dealer_advert_vehicle->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_advert_vehicle->listing_type = session()->get('listing_type');
            $dealer_advert_vehicle->stand_in_value = session()->get('stand_in_value');
            $dealer_advert_vehicle->vat = session()->get('vat');
            $dealer_advert_vehicle->confirm = session()->get('confirm');
            $dealer_advert_vehicle->save();

            $dealer_vehicle_history = new DealerVehicleHistory;
            $dealer_vehicle_history->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_vehicle_history->keys = session()->get('keys');
            $dealer_vehicle_history->previous_owners = session()->get('previous_owners');
            $dealer_vehicle_history->service_history_title = session()->get('service_history_title');
            $dealer_vehicle_history->mileage = session()->get('mileage');
            $dealer_vehicle_history->v5_status = session()->get('v5_status');
            $dealer_vehicle_history->origin = session()->get('origin');
            $dealer_vehicle_history->interior = session()->get('interior');
            $dealer_vehicle_history->exterior = session()->get('exterior');
            $dealer_vehicle_history->audio_and_communications = session()->get('audio_and_communications');
            $dealer_vehicle_history->drivers_assistance = session()->get('drivers_assistance');
            $dealer_vehicle_history->checkbox_questions = session()->get('checkbox_questions');
            $dealer_vehicle_history->illumination = session()->get('illumination');
            $dealer_vehicle_history->performance = session()->get('performance');
            $dealer_vehicle_history->safety_and_security = session()->get('safety_and_security');
            $dealer_vehicle_history->save();            

            $dealer_vehicle_media = new DealerVehicleMedia;
            $dealer_vehicle_media->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_vehicle_media->condition_damage = $request->condition_damage;
            $dealer_vehicle_media->condition_damage_url = $request->condition_damage_url;
            $dealer_vehicle_media->existing_condition_report = $request->existing_condition_report;
            $dealer_vehicle_media->any_damage_checked = $request->any_damage_checked;
            $dealer_vehicle_media->advert_description = $request->advert_description;
            $dealer_vehicle_media->attention_grabber = $request->attention_grabber;
            $dealer_vehicle_media->nearside_front = $request->nearside_front;
            $dealer_vehicle_media->nearside_rear = $request->nearside_rear;
            $dealer_vehicle_media->offside_front = $request->offside_front;
            $dealer_vehicle_media->offside_rear = $request->offside_rear;
            $dealer_vehicle_media->save();
            
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

            $dealer_vehicle_exterior = new DealerVehicleExterior;
            $dealer_vehicle_exterior->dealer_vehicle_id = $dealers_vehicle->id ;
            $dealer_vehicle_exterior->image_1 = $image_1;
            $dealer_vehicle_exterior->image_2 = $image_2;
            $dealer_vehicle_exterior->image_3 = $image_3;
            $dealer_vehicle_exterior->image_4 = $image_4;
            $dealer_vehicle_exterior->image_5 = $image_5;
            $dealer_vehicle_exterior->image_6 = $image_6;
            $dealer_vehicle_exterior->image_7 = $image_7;
            $dealer_vehicle_exterior->image_8 = $image_8;
            $dealer_vehicle_exterior->image_9 = $image_9;
            $dealer_vehicle_exterior->save();


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

            $dealer_vehicle_interior = new DealerVehicleInterior;
            $dealer_vehicle_interior->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_vehicle_interior->image_1 = $interior_image_1;
            $dealer_vehicle_interior->image_2 = $interior_image_2;
            $dealer_vehicle_interior->image_3 = $interior_image_3;
            $dealer_vehicle_interior->image_4 = $interior_image_4;
            $dealer_vehicle_interior->image_5 = $interior_image_5;
            $dealer_vehicle_interior->save();
            //$image_1 = Session::get('image_1');




            }catch(Exception $e)
            {
                return $e;
                DB::rollback();
                return Redirect()->back()
                    ->with('error',$e->getMessage() )
                    ->withInput();
            }
            DB::commit();

            return redirect()->route('dealer.dashboard')->with('success', 'Vehicle Updated  Successfully!');
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
            $interior = implode(',',$request->interior);
            Session::put('interior', $interior);
            $exterior = implode(',',$request->exterior);
            Session::put('exterior', $exterior);
            $audio_and_communications = implode(',',$request->audio_and_communications);
            Session::put('audio_and_communications', $audio_and_communications);
            $drivers_assistance = implode(',',$request->drivers_assistance);
            Session::put('drivers_assistance', $drivers_assistance);

            $checkbox_questions = implode(',',$request->checkbox_questions);
            Session::put('checkbox_questions', $checkbox_questions);
            $illumination = implode(',',$request->illumination);
            Session::put('illumination', $illumination);
            $performance = implode(',',$request->performance);
            Session::put('performance', $performance);
            $safety_and_security = implode(',',$request->safety_and_security);
            Session::put('safety_and_security', $safety_and_security);
            
        return redirect()->route('dealer.vehicleAndDetails');

    }
}
