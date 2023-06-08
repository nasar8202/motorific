<?php

namespace App\Http\Controllers\backend\admin\userdetails;

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
use App\Models\VehicleHistory;
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
use App\Models\InsuranceWriteOff;

class UserController extends Controller
{
    public function viewUsers()
    {
        $viewUsers = User::whereIn('status', array(1, 2))->where('role_id',2)->orderBy('id', 'DESC')->get();

        return view('backend.admin.userDetails.userDetails',compact('viewUsers'));
    }

    public function deleteUser($id)
    {
        $deleteUser = User::where('id',$id)->first();

        $deleteUser->status = 2;
        $deleteUser->save();
        return redirect()->route('viewUsers')->with('error', 'User Disabled Successfully!');

    }
    public function enableUser($id)
    {
        $deleteUser = User::where('id',$id)->first();

        $deleteUser->status = 1;
        $deleteUser->save();
        return redirect()->route('viewUsers')->with('success', 'User Enabled Successfully!');

    }
    public function markAsContacted($id)
    {
        $deleteUser = User::where('id',$id)->first();

        $deleteUser->contact_status = 1;
        $deleteUser->save();
        return redirect()->route('viewUsers')->with('success', 'User Marked As Contact Successfully ✔');

    }
    public function editUserForm($id)
    {
        $editUserForm = User::where('id',$id)->first();

        return view('backend.admin.userDetails.editUserForm',compact('editUserForm'));
    }
    public function findVehicleForOldUser(Request $request,$id)
    {
        $user = User::where('id',$id)->where('status',1)->first();
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
        $InsuranceWorkOffs =  InsuranceWriteOff::where('status', 1)->get();
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

            return view('backend.admin.userDetails.createVehicleForOldUser', compact('user','InsuranceWorkOffs','VehicleHistories','res', 'VehicleFeatures', 'NumberOfKeys', 'SeatMaterials', 'ToolPacks', 'LockingWheelNuts', 'Smokings', 'VCLogBooks', 'VehicleOwners', 'PrivatePlates', 'Finances', 'vehicleCategories'));
        } else {
            return back()->with('error', 'Record not found');
        }
    }
    public function addVehicleForOldUser($id)
    {   
        $user = User::where('id',$id)->where('status',1)->first();
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
        $InsuranceWorkOffs =  InsuranceWriteOff::where('status', 1)->get();
        $VehicleHistories =  VehicleHistory::where('status', 1)->get();
        $halfVehicleEntry =  Vehicle::where('user_id',$user->id)->where('status', 5)->first();
        
        return view('backend.admin.userDetails.createVehicleForOldUser', compact('halfVehicleEntry','InsuranceWorkOffs','user','VehicleFeatures', 'NumberOfKeys', 'SeatMaterials', 'ToolPacks', 'LockingWheelNuts', 'Smokings', 'VCLogBooks', 'VehicleOwners', 'PrivatePlates', 'Finances', 'vehicleCategories','VehicleHistories'));
   
    }

    public function updateUser(Request $request,$id)
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->number,
            'post_code'=>$request->code,
        ];
        User::where('id',$id)->update($data);

        return redirect()->route('viewUsers')->with('success', 'Users Updated  Successfully!');

    }
    public function StoreVehicleByAdminForOldUser(Request $request,$id)
    {
        $request->validate([
            'InsuranceWorkOff'=>'required',
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
            'VehicleHistory'=>'required',
            'HouseName'=>'required',
            'image1' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image2' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image3' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image4' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image5' => 'required|mimes:jpeg,png,jpg,|max:1024',


        ]);
        // dd($request->all());

        DB::beginTransaction();
        try {

            $vehicle = Vehicle::Where('status','!=',5)->where('vehicle_registartion_number',$request->register_number)->where('user_id',$id)->first();
            
            if($vehicle != null){
                return back()->with('error','User Already Register This Vehicle');
             } else{
                $find = Vehicle::where('status', 5)->where('vehicle_registartion_number', $request->register_number)->first();
            
            if (isset($find)) {
                
            $update = Vehicle::where('status', 5)->where('vehicle_registartion_number', $request->register_number)->first();
            $update->vehicle_registartion_number = strtoupper($request->register_number);
            $update->vehicle_name = $request->vehicle_name;
            $update->vehicle_year = $request->vehicle_year;
            $update->vehicle_color = $request->vehicle_color;
            $update->vehicle_type = $request->vehicle_type;
            $update->vehicle_tank = $request->vehicle_tank;
            $update->previous_owners = $request->previous_owner;
            $update->vehicle_price = $request->vehicle_mileage;
            $update->vehicle_price = $request->vehicle_price;
            $update->vehicle_category = $request->vehicle_category;
            $update->status =  0;
            $update->save();
            // dd("if",$update);
            }
            else
            {
                $vehicle = new Vehicle;
                $vehicle->user_id = $id;
                $vehicle->vehicle_registartion_number = strtoupper($request->register_number);
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
            }
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

                if(isset($find)){
                    $vehicleInformation->vehicle_id = $find->id;
                }
                else{
                    $vehicleInformation->vehicle_id = $vehicle->id;
                }

                // $vehicleInformation->vehicle_id = $vehicle->id; InsuranceWorkOff
                $vehicleInformation->vehicle_feature_id = $vehicle_feature_id;
                $vehicleInformation->insurance_work_off_id = $request->InsuranceWorkOff;

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
                // $vehicleInformation->additional_information =  $request->additional;
                $vehicleInformation->additional_information =  $request->HouseName;
                $vehicleInformation->save();

                $interior_detail = new VehicleInterior;

                if(isset($find)){
                    $interior_detail->vehicle_id = $find->id;
                }
                else{
                    $interior_detail->vehicle_id = $vehicle->id;
                }

                // $interior_detail->vehicle_id = $vehicle->id;
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

                if(isset($find)){
                    $exterior_detail->vehicle_id = $find->id;
                }
                else{
                    $exterior_detail->vehicle_id = $vehicle->id;
                }

                // $exterior_detail->vehicle_id = $vehicle->id;
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

                if(isset($find)){
                    $VehicleImage->vehicle_id = $find->id;
                }
                else{
                    $VehicleImage->vehicle_id = $vehicle->id;
                }

                // $VehicleImage->vehicle_id =  $vehicle->id;
                $VehicleImage->front = $front;
                $VehicleImage->passenger_rare_side_corner = $passenger_rare_side_corner;
                $VehicleImage->driver_rare_side_corner = $driver_rare_side_corner;
                $VehicleImage->interior_front = $interior_front;
                $VehicleImage->dashboard = $dashboard;
                $VehicleImage->save();
             }
            
        } catch (\Exception $e) {
            // return $e->getMessage();
            DB::rollback();
            //return $e;
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
        DB::commit();

        return redirect()->route('viewVehicle')->with('success', 'Vehicle Added For Old User Successfully!');
    }
    public function sellerAllVehicleInAdmin($id)
    {

        $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->orderBy('id','DESC')->where('user_id',$id)->get();
        //    dd($vehicles);
        return view('backend.admin.userDetails.viewSellerVehicle', compact('vehicles'));
    }

}
