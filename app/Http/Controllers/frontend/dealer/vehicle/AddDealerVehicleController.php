<?php

namespace App\Http\Controllers\frontend\dealer\vehicle;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DealerVehicle;
use App\Mail\DealerVehicleAdded;
use App\Models\DealerVehicleMedia;
use App\Models\DealerVehicleTyres;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DealerVehicleHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Jobs\DealerVehicleAddedQueue;
use App\Models\DealerVehicleExterior;
use App\Models\DealerVehicleInterior;
use Illuminate\Support\Facades\Session;
use App\Models\DealerAdvertVehicleDetail;
use App\Models\DealerVehicleExteriorDetails;
use App\Models\DealerVehicleInteriorDetails;

class AddDealerVehicleController extends Controller
{
    public function addVehicleToSellFromDealer()
    {

        return view('frontend.dealer.dealerVehicles.vehicleLookUp');

    }
    public function addVehicleToSellFromDealerPost(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'vehicle_registartion_number' => 'required',
            'vehicle_mileage' => 'required|numeric',
        ]);
        $registeration = str_replace(' ','',$request->vehicle_registartion_number);
        // $registeration = trim($request->vehicle_registartion_number,' ');
        // dd($registeration,$request);
        $currentUser = Auth::user()->id;
        $vehicle = DealerVehicle::where('vehicle_registartion_number',$registeration)->where('user_id',$currentUser)->first();
        if($vehicle != null || !empty($vehicle)){
            
            return back()->with('error','You Already Register This Vehicle');
         } else{
        // $res= Http::withHeaders([
        //     'accept' => 'application/json',
        //     'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
        // ])
        // ->get("https://api.oneautoapi.com/autotrader/inventoryaugmentationfromvrm?vehicle_registration_mark=$registeration")
        // ->json();
        // if($res['success'] === 'false'){
        //     return back()->with('error','Record not found');
        // }
        // $res = $res['result'];

        $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS =>"{\n\t\"registrationNumber\": \"$registeration\"\n}",
                  CURLOPT_HTTPHEADER => array(
                    "x-api-key: XlMDFK2cy74gg0iIBYqFT9lgP4Zrul64aRVBpQC5",
                    "Content-Type: application/json"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                 //echo $response;
                 $res = json_decode($response);
                // dd($res->registrationNumber);
                if( isset($res->registrationNumber) ){

                    $milage = $request->millage;

                    Session::put('vehicle_registartion_number', $request->vehicle_registartion_number);
                    Session::put('vehicle_mileage', $request->vehicle_mileage);

                    // $fullname = $res['basic_vehicle_info']['manufacturer_desc'].' '.$res['basic_vehicle_info']['derivative_desc'];

                    Session::put('vehicle_year', $res->yearOfManufacture);
                    // Session::put('vehicle_company', $res['basic_vehicle_info']['manufacturer_desc']);
                    Session::put('vehicle_name', $res->make??'');

                    Session::put('vehicle_color', $res->colour??'');
                    Session::put('vehicle_body',$res->euroStatus??'' );
                    Session::put('vehicle_transmission', $res->fuelType??'');
                    return redirect()->route('dealer.mediaCondition');


                }

                else{
                    return back()->with('error','Record not found');
                }
             return $res;
            }
        // $res = $res['result'];
        // $id = $res['basic_vehicle_info']['autotrader_derivative_id'];
        // $date = $res['basic_vehicle_info']['first_registration_date'];

    }

    public function mediaCondition(Request $request)
    {

        return view('frontend.dealer.dealerVehicles.mediaCondition');

    }



    public function mediaConditionPost(Request $request)
    {
        // dd($request->all());
        $request->validate([
            
            'reservePrice' => 'required',
            'vat' => 'required',
            'confirm' => 'required',

        ]);
        Session::put('listing_type', "staticaly now");
        // Session::put('listing_type', $request->listing_type);
        Session::put('reservePrice', $request->reservePrice);
        Session::put('vat', $request->vat);
        Session::put('confirm', $request->confirm);
        return redirect()->route('dealer.vehicleListing');
        // return view('frontend.dealer.dealerVehicles.vehicleAndDetails');

    }


    public function vehicleAndDetails()
    {
        return view('frontend.dealer.dealerVehicles.vehicleAndDetails');
    }
    public function compressImageDeleteFromDealerSide(Request $request)
{
    $image = $request->input('interior_image_1');
    $path = public_path('uploads/dealerVehicles/interior1/' . $image);

    if (file_exists($path)) {
        unlink($path);
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false]);
    }
}

    public function compressImageDealerSide(Request $request)
    {
        
    // dd($request->all());
    // return('test432');
    if ($request->hasFile('image_1')) {
            if(! is_array($request->image_1)){
                $images = [$request->file('image_1')];
            }
            else{
                $images = $request->file('image_1') ; 
            }
            $paths = [];

        foreach ($images as $image) {
            $path = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/uploads/dealerVehicles/exterior/', $path);
            $paths[] = $path;
        }
    
        // Store the paths in the session
        $request->session()->put('paths', $paths);
    
        return response()->json(['paths' => $paths]);
        }

        if ($request->hasFile('interior_image_1')) {
            $paths = [];

        foreach ($request->file('interior_image_1') as $image) {
            $path = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/uploads/dealerVehicles/interior/', $path);
            $paths[] = $path;
        }
    
        // Store the paths in the session
        $request->session()->put('paths', $paths);
    
        return response()->json(['paths' => $paths]);
        }
        
        if ($request->hasFile('tyre_image')) {
            $paths = [];

            foreach ($request->file('tyre_image') as $image) {
                $path = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/dealerVehicles/tyres/', $path);
                $paths[] = $path;
            }
        
            // Store the paths in the session
            $request->session()->put('paths', $paths);
        
            return response()->json(['paths' => $paths]);
        }
    }
    

    public function vehicleAndDetailsPost(Request $request)
    {
        
          //  dd($request->all());
        // $interior_image_1 = explode(',',$request->interior_image_1[0]);
        // $tyre_image = explode(',',$request->interior_image_1);
        // dd($interior_image_1);
        //    dd($img);
        //   foreach($request->image_1 as $a){
        //     echo $a;
        //   }
        //   die;
        $request->validate([
            'image_1.*' => 'required',
           'interior_image_1.*' => 'required',
            
            'any_damage_checked' => 'required',
            'advert_description' => 'required',
            'attention_grabber' => 'required',
            
            'tyre_image.*' => 'required',

        ]);


        DB::beginTransaction();
        try{
            $dealers_vehicle = new DealerVehicle;
            $dealers_vehicle->user_id = Auth::user()->id;
            $dealers_vehicle->vehicle_registartion_number = strtoupper(session()->get('vehicle_registartion_number'));
            $dealers_vehicle->vehicle_name = session()->get('vehicle_name');
            $dealers_vehicle->vehicle_year = session()->get('vehicle_year');
            $dealers_vehicle->vehicle_color = session()->get('vehicle_color');
            $dealers_vehicle->vehicle_type = session()->get('vehicle_body');
            $dealers_vehicle->previous_owners = session()->get('previous_owners');
            $dealers_vehicle->vehicle_tank = session()->get('vehicle_transmission');
            $dealers_vehicle->vehicle_mileage = session()->get('vehicle_mileage');
            $dealers_vehicle->reserve_price = session()->get('reservePrice');
            


            $dealers_vehicle->status = 0;
            $dealers_vehicle->save();

            $dealer_advert_vehicle = new DealerAdvertVehicleDetail;
            $dealer_advert_vehicle->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_advert_vehicle->listing_type = "live auction statically";
            // $dealer_advert_vehicle->stand_in_value = session()->get('stand_in_value');
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
            // $dealer_vehicle_media->condition_damage_url = $request->condition_damage_url;
            // $dealer_vehicle_media->existing_condition_report = $request->existing_condition_report;
            $dealer_vehicle_media->condition_damage_url = "ads";
            $dealer_vehicle_media->existing_condition_report = 0;
            $dealer_vehicle_media->any_damage_checked = $request->any_damage_checked;
            $dealer_vehicle_media->advert_description = $request->advert_description;
            $dealer_vehicle_media->attention_grabber = $request->attention_grabber;
            $dealer_vehicle_media->nearside_front = $request->nearside_front;
            $dealer_vehicle_media->nearside_rear = $request->nearside_rear;
            $dealer_vehicle_media->offside_front = $request->offside_front;
            $dealer_vehicle_media->offside_rear = $request->offside_rear;
            $dealer_vehicle_media->save();
           
            $image_1 = explode(',',$request->image_1[0]);
            foreach($image_1 as $exterior_images){

            // $image_1 = time() . '_' . $exterior_images->getClientOriginalName();
            // $exterior_images->move(public_path() . '/uploads/dealerVehicles/exterior/', $image_1);


            $dealer_vehicle_exterior = new DealerVehicleExterior;
            $dealer_vehicle_exterior->dealer_vehicle_id = $dealers_vehicle->id ;
            $dealer_vehicle_exterior->exterior_image = $exterior_images;
            $dealer_vehicle_exterior->save();
            }
            $interior_image_1 = explode(',',$request->interior_image_1[0]);
            foreach($interior_image_1 as $interior_image){
            // $interior_image_1 = time() . '_' . $interior_image->getClientOriginalName();
            // $interior_image->move(public_path() . '/uploads/dealerVehicles/interior/', $interior_image_1);



            $dealer_vehicle_interior = new DealerVehicleInterior;
            $dealer_vehicle_interior->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_vehicle_interior->interior_image = $interior_image;
            $dealer_vehicle_interior->save();
            //$image_1 = Session::get('image_1');
            }

            $tyre_image = explode(',',$request->tyre_image[0]);

            foreach($tyre_image as $tyre){
                // $tyre_image = time() . '_' . $interior_image->getClientOriginalName();
                // $interior_image->move(public_path() . '/uploads/dealerVehicles/tyres/', $tyre_image);



                $dealer_Vehicle_Tyres = new DealerVehicleTyres;
                $dealer_Vehicle_Tyres->dealer_vehicle_id = $dealers_vehicle->id;
                $dealer_Vehicle_Tyres->tyre_image = $tyre;
                $dealer_Vehicle_Tyres->save();
                //$image_1 = Session::get('image_1');
                }

               
           // $request->session()->flush();
                $originalDate = $dealers_vehicle->created_at;
                $winDate = date("d F Y ", strtotime($originalDate));
                $winTime = date("H:i:s a", strtotime($originalDate));
    
                 $users = User::where('id',Auth::user()->id)->first();
    // dd($users);
                
                // $data = ([
                //     'name' => $users->name,
                //     'email' => $users->email,
                //     'date' => $winDate.' at '.$winTime,
                //     'vehicle_registration'=>session()->get('vehicle_registartion_number'),
                //     'vehicle_name'=>session()->get('vehicle_name'),
                //     'vehicle_mileage'=>session()->get('vehicle_mileage'),
                //     'front'=>$image_1,
                //     'bidded_price'=>session()->get('reservePrice')??"No Price Yet!",
                //     'age'=>session()->get('vehicle_year'),
    
                // ]);
                $queue_details = ([
                    'name' => $users->name,
                    'email' => $users->email,
                    'date' => $winDate.' at '.$winTime,
                    'vehicle_registration'=>session()->get('vehicle_registartion_number'),
                    'vehicle_name'=>session()->get('vehicle_name'),
                    'vehicle_mileage'=>session()->get('vehicle_mileage'),
                    'front'=>$request->interior_image_1[0][0],
                    'bidded_price'=>session()->get('reservePrice')??"No Price Yet!",
                    'age'=>session()->get('vehicle_year'),
    
                ]);
                 dispatch(new DealerVehicleAddedQueue($queue_details));
    
                // Mail::to($users->email)->send(new DealerVehicleAdded($data));
                if($request->any_damage_checked == 1) {
            $dealer_interior_detail = new DealerVehicleInteriorDetails;
            $dealer_interior_detail->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_interior_detail->dashboard = $request->dashboard;
            $dealer_interior_detail->passenger_side_interior = $request->passenger_side_interior;
            $dealer_interior_detail->driver_side_interior = $request->driver_side_interior;
            $dealer_interior_detail->floor = $request->floor;
            $dealer_interior_detail->ceiling = $request->ceiling;
            $dealer_interior_detail->boot = $request->boot;
            $dealer_interior_detail->rear_windscreen = $request->rear_windscreen;
            $dealer_interior_detail->passenger_seat = $request->passenger_seat;
            $dealer_interior_detail->driver_seat = $request->driver_seat;
            $dealer_interior_detail->rear_seats = $request->rear_seats;
            $dealer_interior_detail->passenger_back_door = $request->passenger_back_door;
            $dealer_interior_detail->driver_back_door = $request->driver_back_door;
            $dealer_interior_detail->save();

            
            $dealer_exterior_detail = new DealerVehicleExteriorDetails;
            $dealer_exterior_detail->dealer_vehicle_id = $dealers_vehicle->id;
            $dealer_exterior_detail->front_door_left = $request->front_door_left;
            $dealer_exterior_detail->back_door_left = $request->back_door_left;
            $dealer_exterior_detail->front_door_right = $request->front_door_right;
            $dealer_exterior_detail->back_door_right = $request->back_door_right;
            $dealer_exterior_detail->top = $request->top;
            $dealer_exterior_detail->bonut = $request->bonut;
            $dealer_exterior_detail->front = $request->front;
            $dealer_exterior_detail->back = $request->back;
            $dealer_exterior_detail->windscreen = $request->windscreen;
            $dealer_exterior_detail->save();
            $request->session()->forget(['vehicle_registartion_number', 'vehicle_name','vehicle_mileage','reservePrice','vat','confirm','keys','previous_owners','service_history_title','origin','checkbox_questions','image_1','interior_image_1','tyre_image','advert_description','attention_grabber']);
//             $originalDate = $dealers_vehicle->created_at;
//             $winDate = date("d F Y ", strtotime($originalDate));
//             $winTime = date("H:i:s a", strtotime($originalDate));

//              $users = User::where('id',Auth::user()->id)->first();
// dd($users);
            
//             $data = ([
//                 'name' => $users->name,
//                 'email' => $users->email,
//                 'date' => $winDate.' at '.$winTime,
//                 'vehicle_registration'=>session()->get('vehicle_registartion_number'),
//                 'vehicle_name'=>session()->get('vehicle_name'),
//                 'vehicle_mileage'=>session()->get('vehicle_mileage'),
               
//                 'bidded_price'=>session()->get('reservePrice')??"No Price Yet!",
//                 'age'=>session()->get('vehicle_year'),

//             ]);

//             Mail::to($users->email)->send(new DealerVehicleAdded($data));

        }

            }
            catch(Exception $e)
            {
                DB::rollback();
                return Redirect()->back()
                    ->with('error',$e->getMessage() )
                    ->withInput();
            }
            DB::commit();
            
             //return view('frontend.dealer.dealerVehicles.thankyou');
            return redirect()->route('dealerToDealer')->with('success', 'Vehicle added  Successfully. Wait For Admin Approvel!');
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
