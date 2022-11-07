<?php

namespace App\Http\Controllers\frontend\dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\vehicleInformation;
use Illuminate\Support\Facades\DB;
use DateTime;
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
      echo   $liveSellVehicles[0]['start_vehicle_date']." ".$liveSellVehicles[0]['start_vehicle_time'];
echo "<br>";
      echo   $liveSellVehicles[0]['end_vehicle_date']." ".$liveSellVehicles[0]['end_vehicle_time'];

      date_default_timezone_set("Asia/Karachi");
      echo "The time is " . date('Y m d h:i:s a');
       $date1 = new DateTime('2012-06-01 02:12:51');
       $date2 = $date1->diff(new DateTime('2014-05-12 11:10:00'));
    //    echo $date2->days.'Total days'."\n";
    //    echo $date2->y.' years'."\n";
    //    echo $date2->m.' months'."\n";
    //    echo $date2->d.' days'."\n";
    //    echo $date2->h.' hours'."\n";
    //    echo $date2->i.' minutes'."\n";
    //    echo $date2->s.' seconds'."\n";

        //die;
       return view('frontend.dealer.vehicle.liveSale',compact('countLiveSellVehicle','liveSellVehicles'));

    }
    public function test(Request $request){
    return $request->min." max ". $request->max ;
    $min = $request->min;
    $max = $request->max;
        //$filter = DB::table('vehicles')->whereBetween('vehicle_price',[$min, $max])->get();
        //return $filter;
        $users = Vehicle::whereBetween('vehicle_price', [$request->min, $request->max])->get();
        return $users;
        // $array = $request->search;
        // $implode = implode(",",$array);

        // $a = Vehicle::whereIn('vehicle_mileage', array($implode))->where('status',1)->get();
        // return $a;
    }
    public function vehicleDetail($id)
    {
        $vehicle = Vehicle::Where('id',$id)->with('vehicleInformation')->with('VehicleImage')->first();

        return view('frontend.dealer.vehicle.vehicleDetail',compact('vehicle'));
    }
    public function dashboard()
    {

        return view('frontend.dealer.dashboard');

    }
}

