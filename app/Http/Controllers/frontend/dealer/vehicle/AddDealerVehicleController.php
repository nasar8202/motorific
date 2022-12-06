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
use App\Models\DealerVehicleTyres;
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
        // $request->validate([
        //     'image_1' => 'required',
        //     'interior_image_1' => 'required',
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

            // Session::forget('vehicle_registartion_number');
            // Session::forget('vehicle_mileage');
            // Session::forget('listing_type');
            // Session::forget('stand_in_value');
            // Session::forget('vat');
            // Session::forget('confirm');
            // Session::forget('keys');
            // Session::forget('previous_owners');
            // Session::forget('service_history_title');
            // Session::forget('mileage');
            // Session::forget('v5_status');
            // Session::forget('origin');
            // Session::forget('interior');
            // Session::forget('exterior');
            // Session::forget('audio_and_communications');
            // Session::forget('drivers_assistance');
            // Session::forget('checkbox_questions');
            // Session::forget('illumination');
            // Session::forget('performance');
            // Session::forget('safety_and_security');

            $dealer_vehicle_history = new DealerVehicleHistory;
            $dealer_vehicle_history->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_vehicle_history->keys = session()->get('keys');
            $dealer_vehicle_history->previous_owners = session()->get('previous_owners');
            $dealer_vehicle_history->service_history_title = session()->get('service_history_title');
            $dealer_vehicle_history->mileage = session()->get('mileage');
            $dealer_vehicle_history->v5_status = session()->get('v5_status');
            $dealer_vehicle_history->origin = session()->get('origin');
            if(!empty(session()->get('interior'))){
                $dealer_vehicle_history->interior = session()->get('interior');
            }
            // $dealer_vehicle_history->exterior = session()->get('exterior');
            if(!empty(session()->get('exterior'))){
                $dealer_vehicle_history->exterior = session()->get('exterior');
            }
            if(!empty(session()->get('audio_and_communications'))){
                $dealer_vehicle_history->audio_and_communications = session()->get('audio_and_communications');
            }
            // $dealer_vehicle_history->exterior = session()->get('exterior');
            if(!empty(session()->get('drivers_assistance'))){
                $dealer_vehicle_history->drivers_assistance = session()->get('drivers_assistance');
            }
            if(!empty(session()->get('checkbox_questions'))){
                $dealer_vehicle_history->checkbox_questions = session()->get('checkbox_questions');
            }
            // $dealer_vehicle_history->exterior = session()->get('exterior');
            if(!empty(session()->get('illumination'))){
                $dealer_vehicle_history->illumination = session()->get('illumination');
            }
            if(!empty(session()->get('performance'))){
                $dealer_vehicle_history->performance = session()->get('performance');
            }
            // $dealer_vehicle_history->exterior = session()->get('exterior');
            if(!empty(session()->get('safety_and_security'))){
                $dealer_vehicle_history->safety_and_security = session()->get('safety_and_security');
            }
            // $dealer_vehicle_history->audio_and_communications = session()->get('audio_and_communications');
            // $dealer_vehicle_history->drivers_assistance = session()->get('drivers_assistance');
            // $dealer_vehicle_history->checkbox_questions = session()->get('checkbox_questions');
            // $dealer_vehicle_history->illumination = session()->get('illumination');
            // $dealer_vehicle_history->performance = session()->get('performance');
            // $dealer_vehicle_history->safety_and_security = session()->get('safety_and_security');
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
            // dd($request->image_1);
            // die();
            foreach($request->image_1 as $exterior_images){
                
            $image_1 = time() . '_' . $exterior_images->getClientOriginalName();
            $exterior_images->move(public_path() . '/uploads/dealerVehicles/exterior/', $image_1);


            $dealer_vehicle_exterior = new DealerVehicleExterior;
            $dealer_vehicle_exterior->dealer_vehicle_id = $dealers_vehicle->id ;
            $dealer_vehicle_exterior->exterior_image = $image_1;
            $dealer_vehicle_exterior->save();
            }
            
            foreach($request->interior_image_1 as $interior_image){
            $interior_image_1 = time() . '_' . $interior_image->getClientOriginalName();
            $interior_image->move(public_path() . '/uploads/dealerVehicles/interior/', $interior_image_1);



            $dealer_vehicle_interior = new DealerVehicleInterior;
            $dealer_vehicle_interior->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_vehicle_interior->interior_image = $interior_image_1;
            $dealer_vehicle_interior->save();
            //$image_1 = Session::get('image_1');
            }


            foreach($request->tyre_image as $interior_image){
                $tyre_image = time() . '_' . $interior_image->getClientOriginalName();
                $interior_image->move(public_path() . '/uploads/dealerVehicles/tyres/', $tyre_image);
    
    
    
                $dealer_Vehicle_Tyres = new DealerVehicleTyres;
                $dealer_Vehicle_Tyres->dealer_vehicle_id = $dealers_vehicle->id;
                $dealer_Vehicle_Tyres->tyre_image = $tyre_image;
                $dealer_Vehicle_Tyres->save();
                //$image_1 = Session::get('image_1');
                }



            }catch(Exception $e)
            {
                return $e;
                DB::rollback();
                return Redirect()->back()
                    ->with('error',$e->getMessage() )
                    ->withInput();
            }
            DB::commit();

            return redirect()->route('dealerToDealer')->with('success', 'Vehicle added  Successfully!');
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
            // 'interior' => 'required',
            // 'exterior' => 'required',
            // 'audio_and_communications' => 'required',
            // 'drivers_assistance' => 'required',
            // 'checkbox_questions' => 'required',
            // 'illumination' => 'required',
            // 'performance' => 'required',
            // 'safety_and_security' => 'required',


        ]);
            Session::put('keys', $request->keys);
            Session::put('previous_owners', $request->previous_owners);
            Session::put('service_history_title', $request->service_history_title);
            Session::put('mileage', $request->mileage);
            Session::put('v5_status', $request->v5_status);
            Session::put('origin', $request->origin);
           
            if(!empty($request->interior)){
                $interior = implode(',',$request->interior);
                Session::put('interior', $interior);
            }
            
            if(!empty($request->exterior)){
                $exterior = implode(',',$request->exterior);
                Session::put('exterior', $exterior);
            }
            // Session::put('exterior', $exterior);
            if(!empty($request->audio_and_communications)){
                $audio_and_communications = implode(',',$request->audio_and_communications);
                Session::put('audio_and_communications', $audio_and_communications);
            }
            if(!empty($request->drivers_assistance)){
                $drivers_assistance = implode(',',$request->drivers_assistance);
                Session::put('drivers_assistance', $drivers_assistance);
            }
            if(!empty($request->checkbox_questions)){
                $checkbox_questions = implode(',',$request->checkbox_questions);
                Session::put('checkbox_questions', $checkbox_questions);
            }
            
            
            if(!empty($request->illumination)){
                $illumination = implode(',',$request->illumination);
            Session::put('illumination', $illumination);
            }
            if(!empty($request->performance)){
                $performance = implode(',',$request->performance);
                Session::put('performance', $performance);
            }
            if(!empty($request->safety_and_security)){
                $safety_and_security = implode(',',$request->safety_and_security);
                Session::put('safety_and_security', $safety_and_security);
            }
           
            

        return redirect()->route('dealer.vehicleAndDetails');

    }
}
