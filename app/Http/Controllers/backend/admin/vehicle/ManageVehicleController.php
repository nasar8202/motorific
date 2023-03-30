<?php

namespace App\Http\Controllers\backend\admin\vehicle;

use Carbon\Carbon;
use App\Models\Finance;
use App\Models\Smoking;
use App\Models\Vehicle;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Models\NumberOfKey;
use App\Models\BidedVehicle;
use App\Models\LiveSaleTime;
use App\Models\PrivatePlate;
use App\Models\SeatMaterial;
use App\Models\VehicleImage;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Models\VehicleHistory;
use App\Models\LockingWheelNut;
use App\Models\VehicleExterior;
use App\Models\VehicleInterior;
use App\Models\vehicleCategories;
use App\Models\User as ModelsUser;
use App\Models\vehicleInformation;
use Illuminate\Support\Facades\DB;
use App\Mail\VehicleValuationPrice;
use App\Mail\WinnerRequestedPerson;
use App\Models\OrderVehicleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewSellerVehicleByAdmin;
use App\Models\vehicleConditionAndDamage;

class ManageVehicleController extends Controller
{



    public function findVehicle(Request $request)
    {
        $seller = User::where('role_id',2)->where('status',1)->get();
        $VehicleFeatures =  VehicleFeature::where('status', 1)->get();
        $NumberOfKeys =  NumberOfKey::where('status', 1)->get();
        $vehicleCategories = vehicleCategories::all();
        $SeatMaterials =  SeatMaterial::where('status', 1)->get();
        $ToolPacks =  ToolPack::where('status', 1)->get();
        $LockingWheelNuts =  LockingWheelNut::where('status', 1)->get();
        $Smokings =  Smoking::where('status', 1)->get();
        $VCLogBooks =  VCLogBook::where('status', 1)->get();
        $VehicleOwners =  VehicleOwner::where('status', 1)->get();
        $PrivatePlates =  PrivatePlate::where('status', 1)->get();
        $Finances =  Finance::where('status', 1)->get();
        $VehicleHistories =  VehicleHistory::where('status', 1)->get();
        $registeration = str_replace(' ', '', $request->registeration);
        
       

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
            CURLOPT_POSTFIELDS => "{\n\t\"registrationNumber\": \"$registeration\"\n}",
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
        if (isset($res->registrationNumber)) {

            return view('backend.admin.manageVehicle.createVehicle', compact('VehicleHistories','seller','res', 'VehicleFeatures', 'NumberOfKeys', 'SeatMaterials', 'ToolPacks', 'LockingWheelNuts', 'Smokings', 'VCLogBooks', 'VehicleOwners', 'PrivatePlates', 'Finances', 'vehicleCategories'));
        } else {
            return back()->with('error', 'Record not found');
        }
    }
    public function createVehicleForm()
    {
        $seller = User::where('role_id',2)->where('status',1)->get();
        $VehicleFeatures =  VehicleFeature::where('status', 1)->get();
        $NumberOfKeys =  NumberOfKey::where('status', 1)->get();
        $vehicleCategories = vehicleCategories::all();
        $SeatMaterials =  SeatMaterial::where('status', 1)->get();
        $ToolPacks =  ToolPack::where('status', 1)->get();
        $LockingWheelNuts =  LockingWheelNut::where('status', 1)->get();
        $Smokings =  Smoking::where('status', 1)->get();
        $VCLogBooks =  VCLogBook::where('status', 1)->get();
        $VehicleOwners =  VehicleOwner::where('status', 1)->get();
        $PrivatePlates =  PrivatePlate::where('status', 1)->get();
        $Finances =  Finance::where('status', 1)->get();
        $VehicleHistories =  VehicleHistory::where('status', 1)->get();
        
        return view('backend.admin.manageVehicle.createVehicle', compact('seller','VehicleFeatures', 'NumberOfKeys', 'SeatMaterials', 'ToolPacks', 'LockingWheelNuts', 'Smokings', 'VCLogBooks', 'VehicleOwners', 'PrivatePlates', 'Finances', 'vehicleCategories','VehicleHistories'));
    }
    public function StoreVehicleByAdmin(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'name' => 'required|max:50|string|regex:/[a-zA-Z]+$/u',
            'email' => 'required|string|email|max:50|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required',
            'post_code' => 'required',
            'phone_number' => 'required|min:9|max:16',
            // 'mile_age' => 'required',
            'register_number' => 'required',
            'vehicle_name' => 'required',
            'vehicle_year' => 'required',
            'vehicle_color' => 'required',
            'vehicle_type' => 'required|max:256',
            'vehicle_tank' => 'required',
            'vehicle_mileage' => 'required',
            'vehicle_price' => 'required|max:11',
            'vehicle_feature' => 'required',
            'seat_material' => 'required',
            'number_of_keys' => 'required',
            'tool_pack' => 'required',
            'wheel_nut' => 'required',
            'vehicle_category' => 'required',
            'smoking' => 'required',
            'logbook' => 'required',
            'location' => 'required|max:256',
            'vehicle_owner' => 'required',
            'private_plate' => 'required',
            'finance' => 'required',
            'HouseName' => 'required',
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
            'image1' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image2' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image3' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image4' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image5' => 'required|mimes:jpeg,png,jpg,|max:1024',


        ]);

        $zip = ($request->post_code);
        $postcode = str_replace(' ', '', $zip);
       

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=.'$postcode'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk";

        DB::beginTransaction();
        try {

            $result_string = file_get_contents($url);
            $result = json_decode($result_string, true);
            if (count($result['results']) != 0) {
                
                $seller = new User;
                $seller->name = $request->name;
                $seller->email = $request->email;
                $seller->mile_age = $request->mile_age;
                $seller->post_code = $postcode;
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
                $vehicleInformation->vehicle_feature_id = $vehicle_feature_id;

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
                $vehicleInformation->vehicle_history_id =  $request->VehicleHistory;

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
                $vehicleInformation->additional_information =  $request->HouseName;

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
                $interior_detail->passenger_back_door = $request->passenger_back_door;
                $interior_detail->driver_back_door = $request->driver_back_door;
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
                $exterior_detail->windscreen = $request->windscreen;
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
                $data = ([
                    'name' => $seller->name,
                    'email' => $seller->email,
                    'date' => $seller->created_at ,
                    'vehicle_registration' => $vehicle->vehicle_registartion_number,
                    'vehicle_name' => $vehicle->vehicle_name,
                    'vehicle_mileage' => $vehicle->vehicle_mileage,
                    'front' => $VehicleImage->front,
                    'colour' => $vehicle->vehicle_color,
                    'age' => $vehicle->vehicle_year,
                    'password' => $request->password,
                  ]);
            
                  Mail::to($seller->email)->send(new NewSellerVehicleByAdmin($data));
                  DB::commit();

        return redirect()->route('createVehicleForm')->with('success', 'Vehicle added  Successfully!');
            } else {
                return back()->with('error', 'Enter The Right Post Code');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            DB::rollback();
            //return $e;
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
        
    }
    public function viewVehicle()
    {

        $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->orderBy('id','DESC')->get();
        //    dd($vehicles);
        return view('backend.admin.manageVehicle.viewVehicle', compact('vehicles'));
    }

    public function deleteVehicle($id)
    {
        DB::beginTransaction();
        try {
            $alreadyVehicles = Vehicle::where('id', $id)->first();
            // dd($alreadyVehicles);
            if ($alreadyVehicles->all_auction == NULL) {
                $bided = BidedVehicle::where('vehicle_id', $alreadyVehicles->id)->first();
            } else {
                $alreadyOrderVehicleRequest = OrderVehicleRequest::where('vehicle_id', $alreadyVehicles->id)->first();
            }


            if (isset($bided) || isset($alreadyOrderVehicleRequest)) {
                return redirect()->route('viewVehicle')->with('error', 'This Vehicle Contain Bids, Thats Why You Cant Delete This Vehicle! ');
            } else {


                $vehicles = Vehicle::find($id);
                $vehicleInformation = vehicleInformation::where('vehicle_id', $id)->first();
                $VehicleImage = VehicleImage::where('vehicle_id', $id)->first();
                $VehicleInterior = VehicleInterior::where('vehicle_id', $id)->first();
                $VehicleExterior = VehicleExterior::where('vehicle_id', $id)->first();
                $vehicles->delete();
                $VehicleInterior->delete();
                $VehicleExterior->delete();
                $vehicleInformation->delete();


                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->front))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->front));
                }

                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->passenger_rare_side_corner))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->passenger_rare_side_corner));
                }

                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->driver_rare_side_corner))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->driver_rare_side_corner));
                }

                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->interior_front))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->interior_front));
                }

                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->dashboard))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->dashboard));
                }
                $VehicleImage->delete();
            }
        } catch (\Exception $e) {
            // return $e;
            DB::rollback();
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
        DB::commit();
        return redirect()->route('viewVehicle')->with('success', 'Vehicle Deleted  Successfully!');
    }
    public function editVehicle($id)
    {

        $vehicles = Vehicle::find($id);
        $seller  = User::where('id', $vehicles->user_id)->first();

        $vehicleInformation = vehicleInformation::where('vehicle_id', $id)->first();
        $VehicleImage = VehicleImage::where('vehicle_id', $id)->first();
        $damages = vehicleConditionAndDamage::where('vehicle_id', $id)->first();
        $exterior = VehicleExterior::where('vehicle_id', $id)->first();
        $interior = VehicleInterior::where('vehicle_id', $id)->first();
//  dd($interior,$exterior);
        $vehicleCategories = vehicleCategories::all();
        $VehicleFeatures =  VehicleFeature::where('status', 1)->get();
        $NumberOfKeys =  NumberOfKey::where('status', 1)->get();
        $SeatMaterials =  SeatMaterial::where('status', 1)->get();
        $ToolPacks =  ToolPack::where('status', 1)->get();
        $LockingWheelNuts =  LockingWheelNut::where('status', 1)->get();
        $Smokings =  Smoking::where('status', 1)->get();
        $VCLogBooks =  VCLogBook::where('status', 1)->get();
        $VehicleOwners =  VehicleOwner::where('status', 1)->get();
        $PrivatePlates =  PrivatePlate::where('status', 1)->get();
        $Finances =  Finance::where('status', 1)->get();
        $VehicleHistories =  VehicleHistory::where('status', 1)->get();
        $liveselltime = LiveSaleTime::first();
        return view('backend.admin.manageVehicle.editVehicle', compact('exterior', 'interior', 'VehicleFeatures', 'seller', 'NumberOfKeys', 'SeatMaterials', 'ToolPacks', 'LockingWheelNuts', 'Smokings', 'VCLogBooks', 'VehicleOwners', 'PrivatePlates', 'Finances', 'vehicles', 'vehicleInformation', 'VehicleImage', 'damages', 'vehicleCategories','VehicleHistories', 'liveselltime'));
    }
    public function updateVehicle(Request $request, $id)
    {
        //  dd($request->all());

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
            'vehicle_category' => 'required',
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
            'reserve_price' => 'required|max:11',
            'average_price' => 'required|max:11',
            'hidden_price' => 'required|max:11',

        ]);
        DB::beginTransaction();
        try {

            // list($start_vehicle_date, $start_vehicle_time) = explode("T", $request->start_vehicle_date_and_time, 2);
            // list($end_vehicle_date, $end_vehicle_time) = explode("T", $request->end_vehicle_date_and_time, 2);

            if ($request->auction_date_and_time == 'all') {
                $auction_date_time = 'all';
                $start_date = null;
                $start_time = null;
                $end_date = null;
                $end_time = null;
            } else {
                // $mytime = Carbon::now();
                // if($mytime->toTimeString() >= "16:00:00" && $mytime->toTimeString() <= "16:00:00"){
                //     return back()->with('error','Can not update rightnow');
                // }
                // else{

                
                $start_date = $request->start_vehicle_date;
                $start_time = $request->start_vehicle_time;
                $end_date = $request->start_vehicle_date;
                $end_time = $request->end_vehicle_time;
                $auction_date_time = null;
           // }
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
            $vehicle->end_vehicle_date = $end_date;
            $vehicle->end_vehicle_time = $end_time;

            // prices
            $vehicle->retail_price = $request->retail_price;
            $vehicle->clean_price = $request->clean_price;
            $vehicle->reserve_price = $request->reserve_price;
            
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

            $vehicleInformation = vehicleInformation::where('vehicle_id', $id)->first();
            $vehicleInformation->vehicle_id = $vehicle->id;
            $vehicleInformation->vehicle_feature_id = $vehicle_feature_id;
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
            $vehicleInformation->vehicle_history_id =  $request->VehicleHistory;

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
            $vehicleInformation->additional_information =  $request->HouseName;

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

            $interior_detail = VehicleInterior::where('vehicle_id', $id)->first();
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
            $interior_detail->passenger_back_door = $request->passenger_back_door;
            $interior_detail->driver_back_door = $request->driver_back_door;
            $interior_detail->save();
            $exterior_detail = VehicleExterior::where('vehicle_id', $id)->first();
            $exterior_detail->vehicle_id = $vehicle->id;
            $exterior_detail->front_door_left = $request->front_door_left;
            $exterior_detail->back_door_left = $request->back_door_left;
            $exterior_detail->front_door_right = $request->front_door_right;
            $exterior_detail->back_door_right = $request->back_door_right;
            $exterior_detail->top = $request->top;
            $exterior_detail->bonut = $request->bonut;
            $exterior_detail->front = $request->front;
            $exterior_detail->windscreen = $request->windscreen;
            $exterior_detail->back = $request->back;
            $exterior_detail->save();


            $VehicleImage = VehicleImage::where('vehicle_id', $id)->first();
            if ($request->file('image1')) {
                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->front))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->front));
                }
                $front = time() . '_' . $request->file('image1')->getClientOriginalName();
                $request->file('image1')->move(public_path() . '/vehicles/vehicles_images/', $front);
                $VehicleImage->front = $front;
            }
            if ($request->file('image2')) {
                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->passenger_rare_side_corner))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->passenger_rare_side_corner));
                }
                $passenger_rare_side_corner = time() . '_' . $request->file('image2')->getClientOriginalName();
                $request->file('image2')->move(public_path() . '/vehicles/vehicles_images/', $passenger_rare_side_corner);
                $VehicleImage->passenger_rare_side_corner = $passenger_rare_side_corner;
            }
            if ($request->file('image3')) {
                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->driver_rare_side_corner))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->driver_rare_side_corner));
                }
                $driver_rare_side_corner = time() . '_' . $request->file('image3')->getClientOriginalName();
                $request->file('image3')->move(public_path() . '/vehicles/vehicles_images/', $driver_rare_side_corner);
                $VehicleImage->driver_rare_side_corner = $driver_rare_side_corner;
            }
            if ($request->file('image4')) {
                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->interior_front))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->interior_front));
                }
                $interior_front = time() . '_' . $request->file('image4')->getClientOriginalName();
                $request->file('image4')->move(public_path() . '/vehicles/vehicles_images/', $interior_front);
                $VehicleImage->interior_front = $interior_front;
            }

            if ($request->file('image5')) {
                if (file_exists(public_path("/vehicles/vehicles_images/" . $VehicleImage->dashboard))) {
                    unlink(public_path("/vehicles/vehicles_images/" . $VehicleImage->dashboard));
                }
                $dashboard = time() . '_' . $request->file('image5')->getClientOriginalName();
                $request->file('image5')->move(public_path() . '/vehicles/vehicles_images/', $dashboard);
                $VehicleImage->dashboard = $dashboard;
            }
            $VehicleImage->vehicle_id =  $vehicle->id;

            $VehicleImage->save();

            $originalDate = $vehicle->updated_at;
            $winDate = date("d F Y ", strtotime($originalDate));
            $winTime = date("H:i:s a", strtotime($originalDate));
            $data = ([
                'name' => $seller->name,
                'vehicle_id' => $vehicle->id,
                'user_id' => $seller->id,
                'front'=> $VehicleImage->front,
                'date' => $winDate.' at '.$winTime,
                'reserve_price'=>$request->reserve_price,
                'vehicle_registration'=>$vehicle->vehicle_registartion_number,
                'vehicle_name'=>$vehicle->vehicle_name,
                'vehicle_mileage'=>$vehicle->vehicle_mileage,
                'age'=>$vehicle->vehicle_year,
                'colour'=>$vehicle->vehicle_color,
            ]);

            Mail::to($vehicle->user->email)->send(new VehicleValuationPrice($data));
        } catch (\Exception $e) {
           // return $e;
            DB::rollback();
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
        DB::commit();

        return redirect()->route('viewVehicle')->with('success', 'Vehicle Updated  Successfully!');
    }
    public function approveVehicle($id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle->all_auction == 'all') {
            $vehicle->status = 1;
            $vehicle->save();
            return redirect()->route('viewVehicle')->with('success', 'Vehicle Updated  Successfully!');
        } elseif ($vehicle->all_auction == null && $vehicle->retail_price != null) {
            $vehicle->status = 1;
            $vehicle->save();
            return redirect()->route('viewVehicle')->with('success', 'Vehicle Updated  Successfully!');
        } elseif ($vehicle->status == 1) {
            return redirect()->route('viewVehicle')->with('alert', 'Your Vehicle Is Already Approve!');
        } else {
            return redirect()->route('viewVehicle')->with('alert', 'First Update Vehicle Prices!');
        }
    }
}
