<?php

namespace App\Http\Controllers\backend\admin\vehicle;

use DB;
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
use App\Models\vehicleInformation;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageVehicleController extends Controller
{
    public function createVehicleForm()
    {
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
        return view('backend.admin.manageVehicle.createVehicle',compact('VehicleFeatures','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances'));
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
            'smoking' => 'required',
            'logbook' => 'required',
            'location' => 'required',
            'vehicle_owner' => 'required',
            'private_plate' => 'required',
            'finance' => 'required',
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
            $vehicle->vehicle_mileage = $request->vehicle_mileage;
            $vehicle->vehicle_price = $request->vehicle_price;

            $vehicle->save();

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
            $vehicleInformation->finance_id =  $request->finance;
            $vehicleInformation->save();


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

       $vehicles = Vehicle::find($id);
       $vehicleInformation = vehicleInformation::where('vehicle_id',$id)->first();
       $VehicleImage = VehicleImage::where('vehicle_id',$id)->first();
       $vehicles->delete();
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

    }catch(\Exception $e)
    {
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
        return view('backend.admin.manageVehicle.editVehicle',compact('VehicleFeatures','seller','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances','vehicles','vehicleInformation','VehicleImage'));

    }
    public function updateVehicle(Request $request,$id)
    {

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

        ]);
        DB::beginTransaction();
        try{


        $vehicle = Vehicle::find($id);
        $vehicle->vehicle_registartion_number = $request->register_number;
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_year = $request->vehicle_year;
        $vehicle->vehicle_color = $request->vehicle_color;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->vehicle_tank = $request->vehicle_tank;
        $vehicle->vehicle_mileage = $request->vehicle_mileage;
        $vehicle->vehicle_price = $request->vehicle_price;

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
        $vehicleInformation->save();


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
        DB::rollback();
        return Redirect()->back()
            ->with('error',$e->getMessage() )
            ->withInput();
    }
    DB::commit();

            return redirect()->route('viewVehicle')->with('success', 'Vehicle Updated  Successfully!');



    }
}
