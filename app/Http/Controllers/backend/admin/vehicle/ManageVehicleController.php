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
use Illuminate\Support\Facades\Auth;

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
        // dd($request->file());
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
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required',
            'image5' => 'required',
            
        ]);
        DB::beginTransaction();
        try{
        $vehicle = new Vehicle;
        $vehicle->user_id = Auth::user()->id;
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
        
            foreach($request->file() as $data) {

                $seat_material_iamges = time() . '_' . $data->getClientOriginalName();

                $data->move(public_path() . '/vehicles/vehicles_images/', $seat_material_iamges);

            //     $instructor_image_name = time() . '_' . $request->file('instructor_image')->getClientOriginalName();
            //     //            $product_image_first_path = $request->file('product_image_first')->storeAs('products', $product_image_first);
            // $request->file('instructor_image')->move(public_path() . '/uploads/instructorimages/', $instructor_image_name);

                $VehicleImage = new VehicleImage;
                $VehicleImage->vehicle_id =  $vehicle->id;
                $VehicleImage->image = $seat_material_iamges;
                $VehicleImage->save();
            }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
            
            return redirect()->route('createVehicleForm')->with('success', 'Vehicle added  Successfully!');

        
        
    }
    public function viewVehicle()
    {   
       $vehicles = Vehicle::
       with('vehicleInformation')
       ->with('VehicleImage')->get();
       
        return view('backend.admin.manageVehicle.viewVehicle',compact('vehicles'));
    }

    public function deleteVehicle($id)
    {   
        DB::beginTransaction();
        try{
    
       $vehicles = Vehicle::find($id);
       $vehicleInformation = vehicleInformation::where('vehicle_id',$id)->first();
       $VehicleImage = VehicleImage::where('vehicle_id',$id)->get();
       $vehicles->delete();
       $vehicleInformation->delete();
       foreach($VehicleImage as $VehicleImg){
        if(file_exists(public_path("/vehicles/vehicles_images/".$VehicleImg->image))){
            unlink(public_path("/vehicles/vehicles_images/".$VehicleImg->image));
          }
        $VehicleImg->delete();
       }
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
        $vehicleInformation = vehicleInformation::where('vehicle_id',$id)->first();
        $VehicleImage = VehicleImage::where('vehicle_id',$id)->get();
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
        return view('backend.admin.manageVehicle.editVehicle',compact('VehicleFeatures','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances','vehicles','vehicleInformation','VehicleImage'));
   
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
        
        $vehicle = Vehicle::find($id);
        $vehicle->user_id = Auth::user()->id;
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
        
            foreach($request->file() as $data) {

                $seat_material_iamges = time() . '_' . $data->getClientOriginalName();

                $data->move(public_path() . '/vehicles/vehicles_images/', $seat_material_iamges);

            //     $instructor_image_name = time() . '_' . $request->file('instructor_image')->getClientOriginalName();
            //     //            $product_image_first_path = $request->file('product_image_first')->storeAs('products', $product_image_first);
            // $request->file('instructor_image')->move(public_path() . '/uploads/instructorimages/', $instructor_image_name);

                $VehicleImage = VehicleImage::where('vehicle_id',$id)->first();
                $VehicleImage->vehicle_id =  $vehicle->id;
                $VehicleImage->image = $seat_material_iamges;
                $VehicleImage->save();
            }
       
            
            return redirect()->route('viewVehicle')->with('success', 'Vehicle Updated  Successfully!');

        
        
    }
}
