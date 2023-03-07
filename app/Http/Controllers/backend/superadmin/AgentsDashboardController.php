<?php

namespace App\Http\Controllers\backend\superadmin;

use App\Models\Role;
use App\Models\User;
use App\Models\Finance;
use App\Models\Smoking;
use App\Models\Vehicle;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Models\NumberOfKey;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewSellerVehicleByAdmin;
use App\Http\Requests\RolePermissionStoreRequest;

class AgentsDashboardController extends Controller
{
    public function agent()
    {
        return view('backend.agents.dashboard');
    }
    public function findVehicle(Request $request)
    {
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

        $registeration = trim($request->registeration, ' ');


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

            return view('backend.agents.vehicle.create', compact('res', 'VehicleFeatures', 'NumberOfKeys', 'SeatMaterials', 'ToolPacks', 'LockingWheelNuts', 'Smokings', 'VCLogBooks', 'VehicleOwners', 'PrivatePlates', 'Finances', 'vehicleCategories'));
        } else {
            return back()->with('error', 'Record not found');
        }
    }
    public function addVehicleFromSellerPerson()
    {
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
        return view('backend.agents.vehicle.create', compact('VehicleFeatures', 'NumberOfKeys', 'SeatMaterials', 'ToolPacks', 'LockingWheelNuts', 'Smokings', 'VCLogBooks', 'VehicleOwners', 'PrivatePlates', 'Finances', 'vehicleCategories'));
        
    }
   

    public function StoreVehicle(Request $request)
    {

        $request->validate([
            
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

        $zip = trim($request->post_code, ' ');

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=.'$zip'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk";

        DB::beginTransaction();
        try {

            $result_string = file_get_contents($url);
            $result = json_decode($result_string, true);
            if (count($result['results']) != 0) {
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
        DB::commit();

        return redirect()->route('createVehicleForm')->with('success', 'Vehicle added  Successfully!');
    }
    
   
}