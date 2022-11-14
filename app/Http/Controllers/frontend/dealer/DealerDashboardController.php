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

        $allVehicles = Vehicle::Where('status',1)->with('vehicleInformation')->with('VehicleImage')->get();

        $countAllVehicle = Vehicle::where('status',1)->count();

        return view('frontend.dealer.vehicle.index',compact('allVehicles','countAllVehicle'));

    }
    public function liveSell()
    {

        $liveSellVehicles = Vehicle::Where('status',1)->with('vehicleInformation')->with('VehicleImage')->get();
        $countLiveSellVehicle = Vehicle::where('status',1)->where('all_auction','!=' , "all" )->orWhereNull('all_auction')->count();



       // echo $interval;
      //echo   $liveSellVehicles[0]['start_vehicle_date']." ".$liveSellVehicles[0]['start_vehicle_time'];
// echo "<br>";
//       $a =  $liveSellVehicles[0]['end_vehicle_date']." ".$liveSellVehicles[0]['end_vehicle_time'];
//echo $a;
    //   date_default_timezone_set("Asia/Karachi");
    //    $currentDateTime = date('Y-m-d h:i:s');
    //   echo $currentDateTime;
    //    $date1 = new DateTime($currentDateTime);
    //    echo $date1;
      // print_r($date1);
      // $date2 = $date1->diff(new DateTime('2014-05-12 11:10:00'));
       //echo $date2->days.'Total days'."\n";
    //    echo $date2->y.' years'."\n";
    //    echo $date2->m.' months'."\n";
    //    echo $date2->d.' days'."\n";
    //    echo $date2->h.' hours'."\n";
    //    echo $date2->i.' minutes'."\n";
    //    echo $date2->s.' seconds'."\n";

        // die;
       return view('frontend.dealer.vehicle.liveSale',compact('countLiveSellVehicle','liveSellVehicles'));

    }
    public function test(Request $request){
        switch($request != null) {
        //    age milage and price filter combine case
            case($request->agePro && $request->mileAgePro && $request->range ):

                $current_year = date("Y");
                $total = $current_year - $request->agePro;
                $range = explode('-',$request->range);

                $age_milage_price_filter = Vehicle::where('vehicle_price', '>=', $range[0])->where('vehicle_price', '<=', $range[1])
                ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                ->where('vehicle_mileage','<=',$request->mileAgePro)->
                with('vehicleInformation')
                ->with('VehicleImage')->get();
               //dd($age_milage_price_filter);
                  return $age_milage_price_filter;
              break;
            // age and millage filter combine case
            case($request->agePro && $request->mileAgePro ):

                $current_year = date("Y");
                $total = $current_year - $request->agePro;

                $age_milage_filter = Vehicle::where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                ->where('vehicle_mileage','<=',$request->mileAgePro)->
                with('vehicleInformation')
                ->with('VehicleImage')->get();

                  return $age_milage_filter;
              break;
             // milage and price filter combine case
             case($request->range && $request->mileAgePro ):

                $range = explode('-',$request->range);
                $milage_price_filter = Vehicle::where('vehicle_mileage','<=',$request->mileAgePro)->
                where('vehicle_price', '>=', $range[0])->where('vehicle_price', '<=', $range[1])->with('vehicleInformation')
                ->with('VehicleImage')->get();

                return $milage_price_filter;
            break;
            // price range filter case
            case($request->range):

                $range = explode('-',$request->range);
                $price_filter = Vehicle::where('vehicle_price', '>=', $range[0])->where('vehicle_price', '<=', $range[1])->with('vehicleInformation')
                ->with('VehicleImage')->get();
                return $price_filter;
            break;
            // milage range filter case
            case($request->mileAgePro):

                $milage_filter = Vehicle::where('vehicle_mileage','<=',$request->mileAgePro)->with('vehicleInformation')
                ->with('VehicleImage')->get();
                return $milage_filter;
            break;
            case($request->agePro):
              $current_year = date("Y");
              $total = $current_year - $request->agePro;

              $age_filter = Vehicle::where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)->with('vehicleInformation')
              ->with('VehicleImage')->get();

                return $age_filter;
            break;


        }

die();

        // dd($request->all());

        dd($range[0]);
        if($request->milage){
            $milage = $request->milage;
            $milage_filter = Vehicle::where('vehicle_mileage','<=', $milage)->with('vehicleInformation')
            ->with('VehicleImage')->get();
            return $milage_filter;
        }

  if($request->min && $request->max){
        $min = $request->min;
        $max = $request->max;
        //$filter = DB::table('vehicles')->whereBetween('vehicle_price',[$min, $max])->get();
        //return $filter;
        $users = Vehicle::where('vehicle_price', '>=', $min)->where('vehicle_price', '<=', $max)->with('vehicleInformation')
        ->with('VehicleImage')->get();
        // dd($users);
        return $users;
  }

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

