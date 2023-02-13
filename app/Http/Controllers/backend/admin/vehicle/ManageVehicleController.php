<?php

namespace App\Http\Controllers\backend\admin\vehicle;

use App\Models\Finance;
use App\Models\Smoking;
use App\Models\Vehicle;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Models\NumberOfKey;
use App\Models\LiveSaleTime;
use App\Models\PrivatePlate;
use App\Models\SeatMaterial;
use App\Models\VehicleImage;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Models\LockingWheelNut;
use App\Models\VehicleExterior;
use App\Models\VehicleInterior;
use App\Models\vehicleCategories;
use App\Models\vehicleInformation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\vehicleConditionAndDamage;
use App\Models\BidedVehicle;
use App\Models\OrderVehicleRequest;

class ManageVehicleController extends Controller
{
    public function createVehicleForm()
    {
        $VehicleFeatures =  VehicleFeature::where('status',1)->get();
        $NumberOfKeys =  NumberOfKey::where('status',1)->get();
        $vehicleCategories = vehicleCategories::all();
        $SeatMaterials =  SeatMaterial::where('status',1)->get();
        $ToolPacks =  ToolPack::where('status',1)->get();
        $LockingWheelNuts =  LockingWheelNut::where('status',1)->get();
        $Smokings =  Smoking::where('status',1)->get();
        $VCLogBooks =  VCLogBook::where('status',1)->get();
        $VehicleOwners =  VehicleOwner::where('status',1)->get();
        $PrivatePlates =  PrivatePlate::where('status',1)->get();
        $Finances =  Finance::where('status',1)->get();
        return view('backend.admin.manageVehicle.createVehicle',compact('VehicleFeatures','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances','vehicleCategories'));
    }
    public function StoreVehicle(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'post_code' => 'required',
            'phone_number' => 'required',
            'mile_age' => 'required',
            'register_number' => 'required',
            'vehicle_name' => 'required',
            'vehicle_year' => 'required',
            'vehicle_color' => 'required',
            'vehicle_type' => 'required',
            'vehicle_tank' => 'required',
            'vehicle_mileage' => 'required',
            'vehicle_price' => 'required',
            'vehicle_feature' => 'required',
            'seat_material' => 'required',
            'number_of_keys' => 'required',
            'tool_pack' => 'required',
            'wheel_nut' => 'required',
            'vehicle_category'=>'required',
            'smoking' => 'required',
            'logbook' => 'required',
            'location' => 'required',
            'vehicle_owner' => 'required',
            'private_plate' => 'required',
            'finance' => 'required',
            // 'exterior_grade' => 'required',
            // 'scratches' => 'required',
            // 'dents' => 'required',
            // 'paintwork' => 'required',
            // 'windscreen' => 'required',
            // 'broken_missing' => 'required',
            // 'warning_lights' => 'required',
            // 'service_record' => 'required',
            // 'main_dealer' => 'required',
            // 'independent_dealer' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required',
            'image5' => 'required',


        ]);
        DB::beginTransaction();
        try{

            $seller = new User;
            $seller->name = $request->name;
            $seller->email = $request->email;
            $seller->mile_age = $request->mile_age;
            $seller->post_code = $request->post_code;
            $seller->phone_number = $request->phone_number;
            $seller->password = Hash::make($request->password);

            $seller->save();

            $seller_id = $seller->id;
            $vehicle = new Vehicle;
            $vehicle->user_id = $seller_id;
            $vehicle->vehicle_registartion_number = $request->register_number;
            $vehicle->vehicle_name = $request->vehicle_name;
            $vehicle->vehicle_year = $request->vehicle_year;
            $vehicle->vehicle_color = $request->vehicle_color;
            $vehicle->vehicle_type = $request->vehicle_type;
            $vehicle->vehicle_tank = $request->vehicle_tank;
            $vehicle->previous_owners =  $request->previous_owner;
            $vehicle->vehicle_mileage = $request->vehicle_mileage;
            $vehicle->vehicle_price = $request->vehicle_price;
            $vehicle->vehicle_category = $request->vehicle_category;
            $vehicle->status = 0;

            $vehicle->save();

            // $damages = new vehicleConditionAndDamage;
            // $damages->vehicle_id = $vehicle->id;
            // $damages->exterior_grade = $request->exterior_grade;
            // $damages->scratches_and_scuffs = $request->scratches;
            // $damages->dents = $request->dents;
            // $damages->paintwork_problems = $request->paintwork;
            // $damages->windscreen_damage = $request->windscreen;
            // $damages->broken_missing = $request->broken_missing;
            // $damages->warning_lights_on_dashboard = $request->warning_lights;
            // $damages->service_record = $request->service_record;
            // $damages->main_dealer_services = $request->main_dealer;
            // $damages->independent_dealer_service = $request->independent_dealer;
            // $damages->save();


            $vehicle_feature_id =  implode(',', $request->vehicle_feature);

            $vehicleInformation = new vehicleInformation;
            $vehicleInformation->vehicle_id = $vehicle->id;
            $vehicleInformation->vehicle_feature_id = $vehicle_feature_id ;

            $vehicleInformation->seat_material_id =  $request->seat_material;
            $vehicleInformation->number_of_keys_id =  $request->number_of_keys;
            $vehicleInformation->tool_pack_id =  $request->tool_pack;
            $vehicleInformation->looking_wheel_nut_id =  $request->wheel_nut;
            $vehicleInformation->smooking_id =  $request->smoking;
            $vehicleInformation->logbook_id =  $request->logbook;
            $vehicleInformation->location =  $request->location;
            $vehicleInformation->vehicle_owner_id =  $request->vehicle_owner;
            $vehicleInformation->private_plate_id =  $request->private_plate;

            // $vehicleInformation->interior =  $request->interior;
            // $vehicleInformation->body_type =  $request->body_type;
            // $vehicleInformation->engine_size =  $request->engine_size;
            // $vehicleInformation->HPI_history_check =  $request->hpi;
            // $vehicleInformation->vin =  $request->vin;
            // $vehicleInformation->first_registered =  $request->register_date;
            // $vehicleInformation->keeper_start_date =  $request->keeper_date;
            // $vehicleInformation->last_mot_date =  $request->mot_date;
            // $vehicleInformation->previous_owners =  $request->previous_owner;
            // $vehicleInformation->seller_keeping_plate =  $request->keeping_plate;
            // $vehicleInformation->additional_information =  $request->additional;

            $vehicleInformation->save();

            $interior_detail = new VehicleInterior;
            $interior_detail->vehicle_id = $vehicle->id;
            $interior_detail->dashboard = $request->dashboard;
            $interior_detail->passenger_side_interior = $request->passenger_side_interior;
            $interior_detail->driver_side_interior = $request->driver_side_interior;
            $interior_detail->floor = $request->floor;
            $interior_detail->ceiling = $request->ceiling;
            $interior_detail->boot = $request->boot;
            $interior_detail->rear_windscreen = $request->rear_windscreen;
            $interior_detail->passenger_seat = $request->passenger_seat;
            $interior_detail->driver_seat = $request->driver_seat;
            $interior_detail->rear_seats = $request->rear_seats;
            $interior_detail->save();
            $exterior_detail = new VehicleExterior;
            $exterior_detail->vehicle_id = $vehicle->id;
            $exterior_detail->front_door_left = $request->front_door_left;
            $exterior_detail->back_door_left = $request->back_door_left;
            $exterior_detail->front_door_right = $request->front_door_right;
            $exterior_detail->back_door_right = $request->back_door_right;
            $exterior_detail->top = $request->top;
            $exterior_detail->bonut = $request->bonut;
            $exterior_detail->front = $request->front;
            $exterior_detail->back = $request->back;
            $exterior_detail->save();

                $front = time() . '_' . $request->file('image1')->getClientOriginalName();
                $request->file('image1')->move(public_path() . '/vehicles/vehicles_images/', $front);
                $passenger_rare_side_corner = time() . '_' . $request->file('image2')->getClientOriginalName();
                $request->file('image2')->move(public_path() . '/vehicles/vehicles_images/', $passenger_rare_side_corner);
                $driver_rare_side_corner = time() . '_' . $request->file('image3')->getClientOriginalName();
                $request->file('image3')->move(public_path() . '/vehicles/vehicles_images/', $driver_rare_side_corner);
                $interior_front = time() . '_' . $request->file('image4')->getClientOriginalName();
                $request->file('image4')->move(public_path() . '/vehicles/vehicles_images/', $interior_front);
                $dashboard = time() . '_' . $request->file('image5')->getClientOriginalName();
                $request->file('image5')->move(public_path() . '/vehicles/vehicles_images/', $dashboard);

                $VehicleImage = new VehicleImage;
                $VehicleImage->vehicle_id =  $vehicle->id;
                $VehicleImage->front = $front;
                $VehicleImage->passenger_rare_side_corner = $passenger_rare_side_corner;
                $VehicleImage->driver_rare_side_corner = $driver_rare_side_corner;
                $VehicleImage->interior_front = $interior_front;
                $VehicleImage->dashboard = $dashboard;
                $VehicleImage->save();

        }catch(\Exception $e)
        {
            DB::rollback();
           //return $e;
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();

            return redirect()->route('createVehicleForm')->with('success', 'Vehicle added  Successfully!');



    }
    public function viewVehicle()
    {

       $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->get();
    //    dd($vehicles);
        return view('backend.admin.manageVehicle.viewVehicle',compact('vehicles'));
    }

    public function deleteVehicle($id)
    {
        DB::beginTransaction();
        try{
            $alreadyVehicles = Vehicle::where('id',$id)->first();
            // dd($alreadyVehicles);
            if($alreadyVehicles->all_auction == NULL){
                $bided = BidedVehicle::where('vehicle_id',$alreadyVehicles->id)->first();
            }else{
                $alreadyOrderVehicleRequest = OrderVehicleRequest::where('vehicle_id',$alreadyVehicles->id)->first();
            }


            if(isset($bided) || isset($alreadyOrderVehicleRequest)){
                return redirect()->route('viewVehicle')->with('error', 'This Vehicle Contain Bids, Thats Why You Cant Delete This Vehicle! ');
            }else{


            $vehicles = Vehicle::find($id);
            $vehicleInformation = vehicleInformation::where('vehicle_id',$id)->first();
            $VehicleImage = VehicleImage::where('vehicle_id',$id)->first();
            $VehicleInterior = VehicleInterior::where('vehicle_id',$id)->first();
            $VehicleExterior = VehicleExterior::where('vehicle_id',$id)->first();
            $vehicles->delete();
            $VehicleInterior->delete();
            $VehicleExterior->delete();
            $vehicleInformation->delete();


            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->front))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->front));
            }

            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->passenger_rare_side_corner))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->passenger_rare_side_corner));
            }

            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->driver_rare_side_corner))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->driver_rare_side_corner));
            }

            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->interior_front))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->interior_front));
            }

            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->dashboard))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->dashboard));
            }
            $VehicleImage->delete();
        }
    }catch(\Exception $e)
    {
       // return $e;
        DB::rollback();
        return Redirect()->back()
            ->with('error',$e->getMessage() )
            ->withInput();
    }
    DB::commit();
       return redirect()->route('viewVehicle')->with('success', 'Vehicle Deleted  Successfully!');

    }
    public function editVehicle($id)
    {

        $vehicles = Vehicle::find($id);
        $seller  = User::where('id',$vehicles->user_id)->first();

        $vehicleInformation = vehicleInformation::where('vehicle_id',$id)->first();
        $VehicleImage = VehicleImage::where('vehicle_id',$id)->first();
        $damages = vehicleConditionAndDamage::where('vehicle_id',$id)->first();
        $exterior = VehicleExterior::where('vehicle_id',$id)->first();
        $interior = VehicleInterior::where('vehicle_id',$id)->first();

        $vehicleCategories = vehicleCategories::all();
        $VehicleFeatures =  VehicleFeature::where('status',1)->get();
        $NumberOfKeys =  NumberOfKey::where('status',1)->get();
        $SeatMaterials =  SeatMaterial::where('status',1)->get();
        $ToolPacks =  ToolPack::where('status',1)->get();
        $LockingWheelNuts =  LockingWheelNut::where('status',1)->get();
        $Smokings =  Smoking::where('status',1)->get();
        $VCLogBooks =  VCLogBook::where('status',1)->get();
        $VehicleOwners =  VehicleOwner::where('status',1)->get();
        $PrivatePlates =  PrivatePlate::where('status',1)->get();
        $Finances =  Finance::where('status',1)->get();
        $liveselltime = LiveSaleTime::first();
        return view('backend.admin.manageVehicle.editVehicle',compact('exterior','interior','VehicleFeatures','seller','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances','vehicles','vehicleInformation','VehicleImage','damages','vehicleCategories','liveselltime'));

    }
    public function updateVehicle(Request $request,$id)
    {
       // dd($request->all());

        $request->validate([
            'register_number' => 'required',
            'vehicle_name' => 'required',
            'vehicle_year' => 'required',
            'vehicle_color' => 'required',
            'vehicle_type' => 'required',
            'vehicle_tank' => 'required',
            'vehicle_mileage' => 'required',
            'vehicle_price' => 'required',
            'vehicle_feature' => 'required',
            'vehicle_category'=>'required',
            'seat_material' => 'required',
            'number_of_keys' => 'required',
            'tool_pack' => 'required',
            'wheel_nut' => 'required',
            'smoking' => 'required',
            'logbook' => 'required',
            'location' => 'required',
            'vehicle_owner' => 'required',
            'private_plate' => 'required',
            'finance' => 'required',
            // 'exterior_grade' => 'required',
            // 'scratches' => 'required',
            // 'dents' => 'required',
            // 'paintwork' => 'required',
            // 'windscreen' => 'required',
            // 'broken_missing' => 'required',
            // 'warning_lights' => 'required',
            // 'service_record' => 'required',
            // 'main_dealer' => 'required',
            // 'independent_dealer' => 'required',
            'retail_price' => 'required|max:11',
            'clean_price' => 'required|max:11',
            'average_price' => 'required|max:11',
            'hidden_price' => 'required|max:11',

        ]);
        DB::beginTransaction();
        try{

            // list($start_vehicle_date, $start_vehicle_time) = explode("T", $request->start_vehicle_date_and_time, 2);
            // list($end_vehicle_date, $end_vehicle_time) = explode("T", $request->end_vehicle_date_and_time, 2);

            if($request->auction_date_and_time == 'all'){
                $auction_date_time = 'all';
                $start_date = null;
                $start_time = null;
                $end_date = null;
                $end_time = null;
            }else{
                    $start_date = $request->start_vehicle_date;
                    $start_time = $request->start_vehicle_time;
                    $end_date = $request->end_vehicle_date;
                    $end_time = $request->end_vehicle_time;
                    $auction_date_time = null;
            }

        $vehicle = Vehicle::find($id);
        $vehicle->vehicle_registartion_number = $request->register_number;
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_year = $request->vehicle_year;
        $vehicle->vehicle_color = $request->vehicle_color;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->vehicle_tank = $request->vehicle_tank;
        $vehicle->previous_owners =  $request->previous_owner;
        $vehicle->vehicle_mileage = $request->vehicle_mileage;
        $vehicle->vehicle_price = $request->vehicle_price;
        $vehicle->vehicle_category = $request->vehicle_category;

        // add time
        $vehicle->all_auction = $auction_date_time;
        $vehicle->start_vehicle_date = $start_date;
        $vehicle->start_vehicle_time = $start_time;
        $vehicle->end_vehicle_date =$end_date;
        $vehicle->end_vehicle_time =$end_time;

        // prices
        $vehicle->retail_price = $request->retail_price;
        $vehicle->clean_price = $request->clean_price;
        $vehicle->average_price = $request->average_price;
        $vehicle->hidden_price = $request->hidden_price;
                    $vehicle->status = 0;


        $vehicle->save();

        $seller = User::find($vehicle->user_id);
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->mile_age = $request->mile_age;
        $seller->post_code = $request->post_code;
        $seller->phone_number = $request->phone_number;
        // $seller->password = Hash::make($request->password);
        $seller->save();

       $vehicle_feature_id =  implode(',', $request->vehicle_feature);

        $vehicleInformation = vehicleInformation::where('vehicle_id',$id)->first();
        $vehicleInformation->vehicle_id = $vehicle->id;
        $vehicleInformation->vehicle_feature_id = $vehicle_feature_id ;
        $vehicleInformation->seat_material_id =  $request->seat_material;
        $vehicleInformation->number_of_keys_id =  $request->number_of_keys;
        $vehicleInformation->tool_pack_id =  $request->tool_pack;
        $vehicleInformation->looking_wheel_nut_id =  $request->wheel_nut;
        $vehicleInformation->smooking_id =  $request->smoking;
        $vehicleInformation->logbook_id =  $request->logbook;
        $vehicleInformation->location =  $request->location;
        $vehicleInformation->vehicle_owner_id =  $request->vehicle_owner;
        $vehicleInformation->private_plate_id =  $request->private_plate;
        $vehicleInformation->finance_id =  $request->finance;

        // $vehicleInformation->interior =  $request->interior;
        // $vehicleInformation->body_type =  $request->body_type;
        // $vehicleInformation->engine_size =  $request->engine_size;
        // $vehicleInformation->HPI_history_check =  $request->hpi;
        // $vehicleInformation->vin =  $request->vin;
        // $vehicleInformation->first_registered =  $request->register_date;
        // $vehicleInformation->keeper_start_date =  $request->keeper_date;
        // $vehicleInformation->last_mot_date =  $request->mot_date;
        // $vehicleInformation->previous_owners =  $request->previous_owner;
        // $vehicleInformation->seller_keeping_plate =  $request->keeping_plate;
        // $vehicleInformation->additional_information =  $request->additional;

        $vehicleInformation->save();

        // $damages = vehicleConditionAndDamage::where('vehicle_id',$id)->first();
        // $damages->vehicle_id = $vehicle->id;
        // $damages->exterior_grade = $request->exterior_grade;
        // $damages->scratches_and_scuffs = $request->scratches;
        // $damages->dents = $request->dents;
        // $damages->paintwork_problems = $request->paintwork;
        // $damages->windscreen_damage = $request->windscreen;
        // $damages->broken_missing = $request->broken_missing;
        // $damages->warning_lights_on_dashboard = $request->warning_lights;
        // $damages->service_record = $request->service_record;
        // $damages->main_dealer_services = $request->main_dealer;
        // $damages->independent_dealer_service = $request->independent_dealer;
        // $damages->save();

        $interior_detail = VehicleInterior::where('vehicle_id',$id)->first();
        $interior_detail->vehicle_id = $vehicle->id;
        $interior_detail->dashboard = $request->dashboard;
        $interior_detail->passenger_side_interior = $request->passenger_side_interior;
        $interior_detail->driver_side_interior = $request->driver_side_interior;
        $interior_detail->floor = $request->floor;
        $interior_detail->ceiling = $request->ceiling;
        $interior_detail->boot = $request->boot;
        $interior_detail->rear_windscreen = $request->rear_windscreen;
        $interior_detail->passenger_seat = $request->passenger_seat;
        $interior_detail->driver_seat = $request->driver_seat;
        $interior_detail->rear_seats = $request->rear_seats;
        $interior_detail->save();
        $exterior_detail = VehicleExterior::where('vehicle_id',$id)->first();
        $exterior_detail->vehicle_id = $vehicle->id;
        $exterior_detail->front_door_left = $request->front_door_left;
        $exterior_detail->back_door_left = $request->back_door_left;
        $exterior_detail->front_door_right = $request->front_door_right;
        $exterior_detail->back_door_right = $request->back_door_right;
        $exterior_detail->top = $request->top;
        $exterior_detail->bonut = $request->bonut;
        $exterior_detail->front = $request->front;
        $exterior_detail->back = $request->back;
        $exterior_detail->save();


        $VehicleImage = VehicleImage::where('vehicle_id',$id)->first();
        if($request->file('image1')){
            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->front))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->front));
              }
            $front = time() . '_' . $request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path() . '/vehicles/vehicles_images/', $front);
            $VehicleImage->front = $front;
        }
        if($request->file('image2')){
            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->passenger_rare_side_corner))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->passenger_rare_side_corner));
              }
            $passenger_rare_side_corner = time() . '_' . $request->file('image2')->getClientOriginalName();
            $request->file('image2')->move(public_path() . '/vehicles/vehicles_images/', $passenger_rare_side_corner);
            $VehicleImage->passenger_rare_side_corner = $passenger_rare_side_corner;
        }
        if($request->file('image3')){
            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->driver_rare_side_corner))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->driver_rare_side_corner));
              }
            $driver_rare_side_corner = time() . '_' . $request->file('image3')->getClientOriginalName();
            $request->file('image3')->move(public_path() . '/vehicles/vehicles_images/', $driver_rare_side_corner);
            $VehicleImage->driver_rare_side_corner = $driver_rare_side_corner;
        }
        if($request->file('image4')){
            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->interior_front))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->interior_front));
              }
            $interior_front = time() . '_' . $request->file('image4')->getClientOriginalName();
            $request->file('image4')->move(public_path() . '/vehicles/vehicles_images/', $interior_front);
            $VehicleImage->interior_front = $interior_front;
        }

        if($request->file('image5')){
            if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImage->dashboard))){
                unlink(public_path("/vehicles/vehicles_images/".$VehicleImage->dashboard));
              }
            $dashboard = time() . '_' . $request->file('image5')->getClientOriginalName();
            $request->file('image5')->move(public_path() . '/vehicles/vehicles_images/', $dashboard);
            $VehicleImage->dashboard = $dashboard;
        }
        $VehicleImage->vehicle_id =  $vehicle->id;

        $VehicleImage->save();

    }catch(\Exception $e)
    {
        return $e;
        DB::rollback();
        return Redirect()->back()
            ->with('error',$e->getMessage() )
            ->withInput();
    }
    DB::commit();

            return redirect()->route('viewVehicle')->with('success', 'Vehicle Updated  Successfully!');



    }
    public function approveVehicle($id){
        $vehicle = Vehicle::find($id);
        if($vehicle->all_auction == 'all'){
            $vehicle->status = 1;
            $vehicle->save();
            return redirect()->route('viewVehicle')->with('success', 'Vehicle Updated  Successfully!');
        }
        elseif($vehicle->all_auction == null && $vehicle->retail_price != null){
            $vehicle->status = 1;
            $vehicle->save();
            return redirect()->route('viewVehicle')->with('success', 'Vehicle Updated  Successfully!');
        }
        elseif($vehicle->status == 1){
            return redirect()->route('viewVehicle')->with('alert', 'Your Vehicle Is Already Approve!');

        }
        else{
            return redirect()->route('viewVehicle')->with('alert', 'First Update Vehicle Prices!');
        }
    }
}
