<?php

namespace App\Http\Controllers\frontend\dealer;

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
use App\Models\vehicleConditionAndDamage;

class DealerDashboardController extends Controller
{
    public function index()
    {

        $vehicles = Vehicle::Where('status',1)->with('vehicleInformation')->with('VehicleImage')->get();
        $countVehicle = Vehicle::where('status',1)->count();

        return view('frontend.dealer.index',compact('vehicles','countVehicle'));

    }

    public function vehicleDetail($id)
    {
        $vehicle = Vehicle::Where('id',$id)->with('vehicleInformation')->with('VehicleImage')->first();
        
        $vehicle_info = vehicleInformation::where('vehicle_id',$id)->first();
        $damage = vehicleConditionAndDamage::where('vehicle_id',$id)->first();

        
        $vehcile_info_feature_id = explode(',' ,$vehicle_info->vehicle_feature_id);
        
        $number_of_keys = NumberOfKey::where('id',$vehicle_info->number_of_keys_id)->first();
        $finance = Finance::where('id',$vehicle_info->finance_id)->first();
        $privateplate = PrivatePlate::where('id',$vehicle_info->private_plate_id)->first();
        $smooking = Smoking::where('id',$vehicle_info->smooking_id)->first();
        $toolpack = ToolPack::where('id',$vehicle_info->tool_pack_id)->first();
        $LockingWheelNut = LockingWheelNut::where('id',$vehicle_info->looking_wheel_nut_id)->first();
      
     

        return view('frontend.dealer.vehicle.vehicleDetail',compact('vehicle','vehcile_info_feature_id','number_of_keys','finance','privateplate','smooking','toolpack','LockingWheelNut','damage'));
    }
    public function dashboard()
    {

        return view('frontend.dealer.dashboard');

    }
}

