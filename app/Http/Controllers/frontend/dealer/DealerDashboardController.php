<?php

namespace App\Http\Controllers\frontend\dealer;

use DB;
use App\Models\Finance;
use App\Models\Smoking;
use App\Models\Vehicle;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Models\NumberOfKey;
use App\Models\BidedVehicle;
use App\Models\PrivatePlate;
use App\Models\SeatMaterial;
use App\Models\VehicleImage;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use App\Models\DealerVehicle;
use App\Models\VehicleFeature;
use App\Models\LockingWheelNut;
use App\Models\vehicleCategories;
use App\Models\vehicleInformation;
use App\Models\OrderVehicleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CanceledRequestReviews;
use Illuminate\Support\Facades\Session;
use App\Models\vehicleConditionAndDamage;

class DealerDashboardController extends Controller
{
    public function index()
    {


        $allVehicles = Vehicle::Where('status',1)->with('vehicleInformation')->with('VehicleImage')->get();

        $countAllVehicle = Vehicle::where('status',1)->count();

        return view('frontend.dealer.vehicle.index',compact('allVehicles','countAllVehicle'));

    }

    // public function addVehicleToSellFromDealer()
    // {

    //     return view('frontend.dealer.CreateAdvert.create-advert');

    // }


    public function BidsAndOffers()
    {
        $user_id = Auth::user()->id;

        $bids = BidedVehicle::join('vehicles', 'vehicles.id', '=', 'bided_vehicles.vehicle_id')

                                ->join('users', 'users.id', '=', 'bided_vehicles.user_id')
                                ->join('vehicle_images', 'vehicle_images.vehicle_id', '=', 'vehicles.id')
                                ->select('vehicles.id','vehicles.user_id','vehicles.vehicle_registartion_number','vehicles.vehicle_name','vehicles.vehicle_year','vehicles.vehicle_color','vehicles.vehicle_type','vehicles.vehicle_tank','vehicles.previous_owners','vehicles.vehicle_mileage','vehicles.vehicle_price','vehicles.retail_price','vehicles.clean_price','vehicles.average_price','vehicles.hidden_price','bided_vehicles.vehicle_id','bided_vehicles.user_id','bided_vehicles.created_at','bided_vehicles.bid_price','users.id','users.name','users.email','users.phone_number','vehicle_images.front')
                                ->where('users.id',$user_id)->get();
// dd($bids);
        $countBids = count($bids);

        return view('frontend.dealer.bids.BidsAndOffers',compact('bids','countBids'));

    }

    public function ActiveBiddedVehicle()
    {
        $user_id = Auth::user()->id;

        $bids = BidedVehicle::join('vehicles', 'vehicles.id', '=', 'bided_vehicles.vehicle_id')

                                ->join('users', 'users.id', '=', 'bided_vehicles.user_id')
                                ->join('vehicle_images', 'vehicle_images.vehicle_id', '=', 'vehicles.id')
                                ->select('vehicles.id','vehicles.user_id','vehicles.vehicle_registartion_number','vehicles.vehicle_name','vehicles.vehicle_year','vehicles.vehicle_color','vehicles.vehicle_type','vehicles.vehicle_tank','vehicles.previous_owners','vehicles.vehicle_mileage','vehicles.vehicle_price','vehicles.retail_price','vehicles.clean_price','vehicles.average_price','vehicles.hidden_price','bided_vehicles.vehicle_id','bided_vehicles.user_id','bided_vehicles.created_at','bided_vehicles.bid_price','users.id','users.name','users.email','users.phone_number','vehicle_images.front')
                                ->where('users.id',$user_id)->get();
// dd($bids);
        $countBids = count($bids);

        return view('frontend.dealer.bids.ActiveBiddedVehicle',compact('bids','countBids'));

    }

    public function UnderBiddedOfferVehicle()
    {
        $user_id = Auth::user()->id;

        $bids = BidedVehicle::join('vehicles', 'vehicles.id', '=', 'bided_vehicles.vehicle_id')

                                ->join('users', 'users.id', '=', 'bided_vehicles.user_id')
                                ->join('vehicle_images', 'vehicle_images.vehicle_id', '=', 'vehicles.id')
                                ->select('vehicles.id','vehicles.user_id','vehicles.vehicle_registartion_number','vehicles.vehicle_name','vehicles.vehicle_year','vehicles.vehicle_color','vehicles.vehicle_type','vehicles.vehicle_tank','vehicles.previous_owners','vehicles.vehicle_mileage','vehicles.vehicle_price','vehicles.retail_price','vehicles.clean_price','vehicles.average_price','vehicles.hidden_price','bided_vehicles.vehicle_id','bided_vehicles.user_id','bided_vehicles.created_at','bided_vehicles.bid_price','users.id','users.name','users.email','users.phone_number','vehicle_images.front')
                                ->where('users.id',$user_id)->get();
// dd($bids);
        $countBids = count($bids);

        return view('frontend.dealer.bids.UnderBiddedOfferVehicle',compact('bids','countBids'));

    }

    public function DidnotWinBiddedVehicle()
    {
        $user_id = Auth::user()->id;

        $bids = BidedVehicle::join('vehicles', 'vehicles.id', '=', 'bided_vehicles.vehicle_id')

                                ->join('users', 'users.id', '=', 'bided_vehicles.user_id')
                                ->join('vehicle_images', 'vehicle_images.vehicle_id', '=', 'vehicles.id')
                                ->select('vehicles.id','vehicles.user_id','vehicles.vehicle_registartion_number','vehicles.vehicle_name','vehicles.vehicle_year','vehicles.vehicle_color','vehicles.vehicle_type','vehicles.vehicle_tank','vehicles.previous_owners','vehicles.vehicle_mileage','vehicles.vehicle_price','vehicles.retail_price','vehicles.clean_price','vehicles.average_price','vehicles.hidden_price','bided_vehicles.vehicle_id','bided_vehicles.user_id','bided_vehicles.created_at','bided_vehicles.bid_price','users.id','users.name','users.email','users.phone_number','vehicle_images.front')
                                ->where('users.id',$user_id)->get();
// dd($bids);
        $countBids = count($bids);

        return view('frontend.dealer.bids.DidnotWinBiddedVehicle',compact('bids','countBids'));

    }

    public function PurchasesVehicle()
    {
        $user_id = Auth::user()->id;

        $bids = BidedVehicle::join('vehicles', 'vehicles.id', '=', 'bided_vehicles.vehicle_id')

                                ->join('users', 'users.id', '=', 'bided_vehicles.user_id')
                                ->join('vehicle_images', 'vehicle_images.vehicle_id', '=', 'vehicles.id')
                                ->select('vehicles.id','vehicles.user_id','vehicles.vehicle_registartion_number','vehicles.vehicle_name','vehicles.vehicle_year','vehicles.vehicle_color','vehicles.vehicle_type','vehicles.vehicle_tank','vehicles.previous_owners','vehicles.vehicle_mileage','vehicles.vehicle_price','vehicles.retail_price','vehicles.clean_price','vehicles.average_price','vehicles.hidden_price','bided_vehicles.vehicle_id','bided_vehicles.user_id','bided_vehicles.created_at','bided_vehicles.bid_price','users.id','users.name','users.email','users.phone_number','vehicle_images.front')
                                ->where('users.id',$user_id)
                                ->where('vehicles.status','2')
                                ->get();
            $countBids = count($bids);

        return view('frontend.dealer.vehicle.PurchasesVehicle',compact('bids','countBids'));

    }
    public function CompletedBiddedVehicle()
    {
        $user_id = Auth::user()->id;

        $bids = BidedVehicle::join('vehicles', 'vehicles.id', '=', 'bided_vehicles.vehicle_id')

                                ->join('users', 'users.id', '=', 'bided_vehicles.user_id')
                                ->join('vehicle_images', 'vehicle_images.vehicle_id', '=', 'vehicles.id')
                                ->select('vehicles.id','vehicles.user_id','vehicles.vehicle_registartion_number','vehicles.vehicle_name','vehicles.vehicle_year','vehicles.vehicle_color','vehicles.vehicle_type','vehicles.vehicle_tank','vehicles.previous_owners','vehicles.vehicle_mileage','vehicles.vehicle_price','vehicles.retail_price','vehicles.clean_price','vehicles.average_price','vehicles.hidden_price','bided_vehicles.vehicle_id','bided_vehicles.created_at','bided_vehicles.bid_price','users.name','users.email','users.phone_number','vehicle_images.front')
                                ->where('users.id',$user_id)
                                ->where('vehicles.status','1')
                                ->get();

            $countBids = count($bids);

        return view('frontend.dealer.vehicle.CompletedBiddedVehicle',compact('bids','countBids'));

    }
    public function CompletedRequestedVehicle()
    {
      $user_id = Auth::user()->id;
      $Orders = OrderVehicleRequest::where('status',1)->where('user_id',$user_id)->with('user')->with('vehicle.VehicleImage')->get();
      
      $countOrder = count($Orders);

        return view('frontend.dealer.vehicle.CompletedRequestedVehicle',compact('Orders','countOrder'));

    }
    public function CancelRequestedVehicle()
    {
      
      $user_id = Auth::user()->id;
      $canceled = CanceledRequestReviews::where('status',1)->where('user_id',$user_id)->with('user')->with('order')->with('vehicle.VehicleImage')->get();

      $countcanceled = count($canceled);

        return view('frontend.dealer.vehicle.CancelledRequestedVehicle',compact('canceled','countcanceled'));

    }
    public function CancelledBiddedOfferVehicle()
    {
        $user_id = Auth::user()->id;

        $bids = BidedVehicle::join('vehicles', 'vehicles.id', '=', 'bided_vehicles.vehicle_id')

                                ->join('users', 'users.id', '=', 'bided_vehicles.user_id')
                                ->join('vehicle_images', 'vehicle_images.vehicle_id', '=', 'vehicles.id')
                                ->select('vehicles.id','vehicles.user_id','vehicles.vehicle_registartion_number','vehicles.vehicle_name','vehicles.vehicle_year','vehicles.vehicle_color','vehicles.vehicle_type','vehicles.vehicle_tank','vehicles.previous_owners','vehicles.vehicle_mileage','vehicles.vehicle_price','vehicles.retail_price','vehicles.clean_price','vehicles.average_price','vehicles.hidden_price','bided_vehicles.vehicle_id','bided_vehicles.user_id','bided_vehicles.created_at','bided_vehicles.bid_price','users.id','users.name','users.email','users.phone_number','vehicle_images.front')
                                ->where('users.id',$user_id)
                                ->where('vehicles.status','1')
                                ->get();
            $countBids = count($bids);

        return view('frontend.dealer.vehicle.CancelledBiddedOfferVehicle',compact('bids','countBids'));

    }
    public function onlyCars()
    {

      $category = vehicleCategories::where('title','car')->first();

        $allVehicles = Vehicle::Where('status',1)->Where('vehicle_category',$category->id)->with('vehicleInformation')->with('VehicleImage')->get();

        $countAllVehicle = Vehicle::where('status',1)->Where('vehicle_category',$category->id)->count();

        return view('frontend.dealer.vehicle.index',compact('allVehicles','countAllVehicle'));

    }

    public function onlyVans()
    {
      $category = vehicleCategories::where('title','van')->first();

        $allVehicles = Vehicle::Where('status',1)->Where('vehicle_category',$category->id)->with('vehicleInformation')->with('VehicleImage')->get();

        $countAllVehicle = Vehicle::where('status',1)->Where('vehicle_category',$category->id)->count();

        return view('frontend.dealer.vehicle.index',compact('allVehicles','countAllVehicle'));

    }
    public function liveSell()
    {

        $liveSellVehicles = Vehicle::Where('status',1)->with('vehicleInformation')->with('VehicleImage')->where('all_auction',null )->get();
        $countLiveSellVehicle = Vehicle::where('status',1)->where('all_auction',null )->count();



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


    public function dropdownfilter(Request $request)
    {

       if($request->dropdownfilter == 'lowestPrice'){
        $lowestVehicles = Vehicle::Where('status',1)->orderBy('vehicle_price', 'ASC')->with('vehicleInformation')->with('VehicleImage')->get();
        return $lowestVehicles;
      }
       if($request->dropdownfilter == 'highestPrice'){
        $highestVehicles = Vehicle::Where('status',1)->orderBy('vehicle_price', 'DESC')->with('vehicleInformation')->with('VehicleImage')->get();
        return $highestVehicles;
      }
      else{

        $newestVehicles = Vehicle::Where('status',1)->orderBy('id', 'DESC')->with('vehicleInformation')->with('VehicleImage')->get();
        return $newestVehicles;
      }



    }
    public function dropdownfilterforlivesell(Request $request)
    {

       if($request->dropdownfilter == 'lowestPrice'){
        $lowestVehicles = Vehicle::Where(['status'=>1,'all_auction'=>null])->orderBy('vehicle_price', 'ASC')->with('vehicleInformation')->with('VehicleImage')->get();
        return $lowestVehicles;
      }
       if($request->dropdownfilter == 'highestPrice'){
        $highestVehicles = Vehicle::Where(['status'=>1,'all_auction'=>null])->orderBy('vehicle_price', 'DESC')->with('vehicleInformation')->with('VehicleImage')->get();
        return $highestVehicles;
      }
      else{

        $newestVehicles = Vehicle::Where(['status'=>1,'all_auction'=>null])->orderBy('id', 'DESC')->with('vehicleInformation')->with('VehicleImage')->get();
        return $newestVehicles;
      }



    }
    public function buyItNowVehicledDropdownfilter(Request $request)
    {
        if($request->dropdownfilter == 'lowestPrice'){
            $lowestVehicles = Vehicle::Where(['status'=>1,'all_auction'=>'all'])->orderBy('vehicle_price', 'ASC')->with('vehicleInformation')->with('VehicleImage')->get();
            return $lowestVehicles;
          }
           if($request->dropdownfilter == 'highestPrice'){
            $highestVehicles = Vehicle::Where(['status'=>1,'all_auction'=>'all'])->orderBy('vehicle_price', 'DESC')->with('vehicleInformation')->with('VehicleImage')->get();
            return $highestVehicles;
          }
          else{

            $newestVehicles = Vehicle::Where(['status'=>1,'all_auction'=>'all'])->orderBy('id', 'DESC')->with('vehicleInformation')->with('VehicleImage')->get();
            return $newestVehicles;
          }
    }
    public function filterLiveSell(Request $request)
    {
            $current_year = date("Y");
            $total = $current_year - $request->agePro;
            $range = explode('-',$request->range);

            $previous_owners = $request->previous_owners;
            $mileAgePro = $request->mileAgePro;
            $fuelType = $request->fuelType;
            if(!empty($request->range)) $query_string_second_part[] = " AND v.vehicle_price >= '$range[0]'";
            if(!empty($request->range)) $query_string_second_part[] = " AND v.vehicle_price <= '$range[1]'";
            if(!empty($request->mileAgePro)) $query_string_second_part[] = " AND v.vehicle_mileage <= '$mileAgePro'";
            if(!empty($previous_owners)) $query_string_second_part[] = " AND v.previous_owners <= '$previous_owners'";
            if(!empty($fuelType)) $query_string_second_part[] = " AND v.vehicle_tank = '$fuelType'";
            if(!empty($request->agePro)) $query_string_second_part[] = " AND v.vehicle_year >= '$total'";
            if(!empty($request->agePro)) $query_string_second_part[] = " AND v.vehicle_year <= '$current_year'";
            $query_string_second_part[] = " AND v.status = '1'";
            $query_string_second_part[] = " AND v.all_auction IS NULL";
            $query_string_second_part[] = " AND v.deleted_at IS NULL";
            $query_string_second_part[] = " AND vimg.deleted_at IS NULL";

            $query_string_First_Part= "SELECT  v.vehicle_registartion_number,v.vehicle_name, v.vehicle_year,v.vehicle_color, v.vehicle_type, v.vehicle_type,v.previous_owners, v.vehicle_tank, v.previous_owners, v.vehicle_mileage, v.vehicle_price, v.all_auction, v.retail_price, v.clean_price, v.average_price, v.hidden_price,v.vehicle_category, v.status,vi.location,vi.interior,vi.body_type,vi.engine_size,vi.HPI_history_check,vi.vin,vi.first_registered,vi.keeper_start_date,vi.last_mot_date,vi.previous_owners,vi.seller_keeping_plate,vimg.vehicle_id, vimg.front,vimg.passenger_rare_side_corner,vimg.driver_rare_side_corner,vimg.interior_front,vimg.dashboard FROM vehicles AS v JOIN vehicle_information AS vi ON vi.vehicle_id = v.id
            JOIN vehicle_images AS vimg ON vimg.vehicle_id = v.id WHERE ";
            $query_string_third_part = ' ORDER BY v.id';
            $query_string_second_part= implode(" ", $query_string_second_part);
            $query_string_second_part=  preg_replace("/AND/", " ", $query_string_second_part, 1);
            $query_string = $query_string_First_Part.$query_string_second_part.$query_string_third_part;
            $liveSellFilter = DB::select(DB::raw($query_string));
          return $liveSellFilter;
    }
    public function  dealerToDealerVehicleFilter(Request $request)
    {
        $current_year = date("Y");
            $total = $current_year - $request->agePro;
            $range = explode('-',$request->range);

            $previous_owners = $request->previous_owners;
            $mileAgePro = $request->mileAgePro;
            $fuelType = $request->fuelType;
            if(!empty($request->range)) $query_string_second_part[] = " AND vd.vehicle_price >= '$range[0]'";
            if(!empty($request->range)) $query_string_second_part[] = " AND vd.vehicle_price <= '$range[1]'";
            if(!empty($request->mileAgePro)) $query_string_second_part[] = " AND vd.vehicle_mileage <= '$mileAgePro'";
            if(!empty($previous_owners)) $query_string_second_part[] = " AND vd.previous_owners <= '$previous_owners'";
            if(!empty($fuelType)) $query_string_second_part[] = " AND vd.vehicle_tank = '$fuelType'";
            if(!empty($request->agePro)) $query_string_second_part[] = " AND vd.vehicle_year >= '$total'";
            if(!empty($request->agePro)) $query_string_second_part[] = " AND vd.vehicle_year <= '$current_year'";
            $query_string_second_part[] = " AND vd.status = '1'";
            $query_string_second_part[] = " AND vd.deleted_at IS NULL";
            $query_string_second_part[] = " AND veintImg.deleted_at IS NULL";
            $query_string_second_part[] = " AND vextImg.deleted_at IS NULL";
            $query_string_second_part[] = " AND dvmedia.deleted_at IS NULL";
            $query_string_second_part[] = " AND dvhistory.deleted_at IS NULL";

            $query_string_First_Part= "SELECT vd.vehicle_registartion_number,vd.vehicle_name, vd.vehicle_year,vd.vehicle_color, vd.vehicle_type,vd.vehicle_type,vd.previous_owners, vd.vehicle_tank,vd.previous_owners, vd.vehicle_mileage, vd.vehicle_price,  vd.retail_price,  vd.status,
             vextImg.exterior_image,veintImg.interior_image,dvhistory.keys,dvhistory.previous_owners,dvhistory.service_history_title,dvhistory.mileage,dvhistory.v5_status,dvhistory.origin,dvhistory.interior,dvhistory.exterior,dvhistory.audio_and_communications,dvhistory.drivers_assistance,
             dvhistory.checkbox_questions,dvhistory.performance,dvhistory.safety_and_security,dvmedia.condition_damage,dvmedia.condition_damage_url,dvmedia.existing_condition_report
             ,dvmedia.any_damage_checked,dvmedia.any_damage_on_your_vehicle,dvmedia.advert_description,dvmedia.attention_grabber,dvmedia.nearside_rear,dvmedia.nearside_front,
             dvmedia.offside_front,dvmedia.offside_rear
             FROM dealer_vehicles AS vd
            join dealer_vehicle_histories AS dvhistory ON dvhistory.dealer_vehicle_id = vd.id
            Join dealer_vehicle_media As dvmedia ON dvmedia.dealer_vehicle_id = vd.id
            JOIN dealer_vehicle_exteriors AS vextImg ON vextImg.dealer_vehicle_id = vd.id
            JOIN dealer_vehicle_interiors AS veintImg ON veintImg.dealer_vehicle_id = vd.id WHERE ";

            $query_string_third_part = ' ORDER BY vd.id';

        //     ->with('DealerVehicleExterior')
        // ->with('DealerVehicleHistory')
        // ->with('DealerVehicleInterior')
        // ->with('DealerVehicleMedia')

            $query_string_second_part= implode(" ", $query_string_second_part);
            $query_string_second_part=  preg_replace("/AND/", " ", $query_string_second_part, 1);
            $query_string = $query_string_First_Part.$query_string_second_part.$query_string_third_part;
            // dd($query_string);
            $dealerToDealerVehicleFilter = DB::select(DB::raw($query_string));


          return $dealerToDealerVehicleFilter;
    }
    public function test(Request $request){


        switch($request != null) {


         //  fuel tank  + previours owners + price range + milage + age year filter combine case
         case($request->previousOwnersPro && $request->fuelType && $request->mileAgePro && $request->range && $request->agePro ):

            $current_year = date("Y");
            $total = $current_year - $request->agePro;
            $range = explode('-',$request->range);

            $owner_milage_price_filter = Vehicle::where('vehicle_price', '>=', $range[0])
            ->where('vehicle_price', '<=', $range[1])
            ->where('vehicle_mileage','<=',$request->mileAgePro)
            ->where('previous_owners', '<=', $request->previousOwnersPro)
            ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
            ->where('vehicle_tank',$request->fuelType)
            ->with('vehicleInformation')
            ->with('VehicleImage')->get();
           //dd($age_milage_price_filter);
              return $owner_milage_price_filter;
         break;


            //    previours owners + price range + milage + age year filter combine case
            case($request->previousOwnersPro && $request->mileAgePro && $request->range && $request->agePro ):

                $current_year = date("Y");
                $total = $current_year - $request->agePro;
                $range = explode('-',$request->range);

                $owner_milage_price_filter = Vehicle::where('vehicle_price', '>=', $range[0])
                ->where('vehicle_price', '<=', $range[1])
                ->where('vehicle_mileage','<=',$request->mileAgePro)
                ->where('previous_owners', '<=', $request->previousOwnersPro)
                ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();
               //dd($age_milage_price_filter);
                  return $owner_milage_price_filter;
             break;


                 //   fuel type + Mileage + Price + Age filter combine case
                 case($request->fuelType && $request->mileAgePro && $request->range && $request->agePro ):

                    $current_year = date("Y");
                    $total = $current_year - $request->agePro;
                    $range = explode('-',$request->range);

                    $fuel_age_milage_price_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                    ->where('vehicle_price', '>=', $range[0])
                    ->where('vehicle_price', '<=', $range[1])
                    ->where('vehicle_mileage','<=',$request->mileAgePro)
                    ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                    ->with('vehicleInformation')
                    ->with('VehicleImage')->get();
                   //dd($fuel_age_milage_price_filter);
                      return $fuel_age_milage_price_filter;
                 break;


                 // fuel type + Mileage + age year + previous owners filter combine case
                 case($request->fuelType && $request->mileAgePro && $request->previousOwnersPro && $request->agePro ):

                    $current_year = date("Y");
                    $total = $current_year - $request->agePro;


                    $fuel_age_milage_owner_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                    ->where('previous_owners', '<=', $request->previousOwnersPro)
                    ->where('vehicle_mileage','<=',$request->mileAgePro)
                    ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                    ->with('vehicleInformation')
                    ->with('VehicleImage')->get();
                   //dd($fuel_age_milage_price_filter);
                      return $fuel_age_milage_owner_filter;
                 break;


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


               //    previours owners + price range + milage filter combine case
            case($request->previousOwnersPro && $request->mileAgePro && $request->range ):

                $range = explode('-',$request->range);

                $owner_milage_price_filter = Vehicle::where('vehicle_price', '>=', $range[0])
                ->where('vehicle_price', '<=', $range[1])
                ->where('vehicle_mileage','<=',$request->mileAgePro)
                ->where('previous_owners', '<=', $request->previousOwnersPro)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();
               //dd($age_milage_price_filter);
                  return $owner_milage_price_filter;
              break;


               //    previours owners + price range + age filter combine case
            case($request->previousOwnersPro && $request->agePro && $request->range ):

                $current_year = date("Y");
                $total = $current_year - $request->agePro;
                $range = explode('-',$request->range);

                $owner_milage_price_filter = Vehicle::where('vehicle_price', '>=', $range[0])
                ->where('vehicle_price', '<=', $range[1])
                ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                ->where('previous_owners', '<=', $request->previousOwnersPro)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();
               //dd($age_milage_price_filter);
                  return $owner_milage_price_filter;
              break;


                             //    previours owners + price range + age filter combine case
            case($request->previousOwnersPro && $request->agePro && $request->mileAgePro ):

                $current_year = date("Y");
                $total = $current_year - $request->agePro;


                $owner_milage_price_filter = Vehicle::where('vehicle_mileage','<=',$request->mileAgePro)
                ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                ->where('previous_owners', '<=', $request->previousOwnersPro)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();
               //dd($age_milage_price_filter);
                  return $owner_milage_price_filter;
              break;

                 // fuel type and  previous owner and age filter case
                 case($request->fuelType && $request->previousOwnersPro && $request->agePro):

                    $current_year = date("Y");
                    $total = $current_year - $request->agePro;


                    $fuel_owner_age_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                    ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                    ->where('previous_owners', '<=', $request->previousOwnersPro)
                    ->with('vehicleInformation')
                    ->with('VehicleImage')->get();


                      return $fuel_owner_age_filter;
                  break;


                     // fuel type and  previous owner and milage filter case
                 case($request->fuelType && $request->previousOwnersPro && $request->mileAgePro):


                    $fuel_owner_milage_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                    ->where('vehicle_mileage','<=',$request->mileAgePro)
                    ->where('previous_owners', '<=', $request->previousOwnersPro)
                    ->with('vehicleInformation')
                    ->with('VehicleImage')->get();


                      return $fuel_owner_milage_filter;
                  break;


                     // fuel type and  previous owner and Price filter case
                     case($request->fuelType && $request->previousOwnersPro && $request->range):

                        $range = explode('-',$request->range);
                        $fuel_owner_milage_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                        ->where('vehicle_price', '>=', $range[0])
                        ->where('vehicle_price', '<=', $range[1])
                        ->where('previous_owners', '<=', $request->previousOwnersPro)
                        ->with('vehicleInformation')
                        ->with('VehicleImage')->get();


                          return $fuel_owner_milage_filter;
                      break;


                       // fuel type and  year  and milage filter case
                     case($request->fuelType && $request->agePro && $request->mileAgePro ):

                        $current_year = date("Y");
                        $total = $current_year - $request->agePro;
                        $fuel_owner_milage_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                        ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                        ->where('vehicle_mileage','<=',$request->mileAgePro)
                        ->with('vehicleInformation')
                        ->with('VehicleImage')->get();


                          return $fuel_owner_milage_filter;
                      break;


                   // fuel type and  age year and Price filter case
                   case($request->fuelType && $request->agePro && $request->range ):

                    $current_year = date("Y");
                    $total = $current_year - $request->agePro;
                    $range = explode('-',$request->range);
                    $fuel_age_price_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                    ->where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                    ->where('vehicle_price', '>=', $range[0])
                    ->where('vehicle_price', '<=', $range[1])
                    ->with('vehicleInformation')
                    ->with('VehicleImage')->get();


                      return $fuel_age_price_filter;
                  break;


                // fuel type and  milage and Price filter case
                case($request->fuelType && $request->mileAgePro && $request->range ):

                    $range = explode('-',$request->range);
                    $fuel_milage_price_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                    ->where('vehicle_mileage','<=',$request->mileAgePro)
                    ->where('vehicle_price', '>=', $range[0])
                    ->where('vehicle_price', '<=', $range[1])
                    ->with('vehicleInformation')
                    ->with('VehicleImage')->get();


                      return $fuel_milage_price_filter;
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

            // age and price filter combine case
            case($request->agePro && $request->range ):

                $current_year = date("Y");
                $total = $current_year - $request->agePro;
                $range = explode('-',$request->range);
                $age_price_filter = Vehicle::where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)
                ->where('vehicle_price', '>=', $range[0])->where('vehicle_price', '<=', $range[1])->
                with('vehicleInformation')
                ->with('VehicleImage')->get();

                  return $age_price_filter;
              break;


             // milage and price filter combine case
             case($request->range && $request->mileAgePro ):

                $range = explode('-',$request->range);
                $milage_price_filter = Vehicle::where('vehicle_mileage','<=',$request->mileAgePro)->
                where('vehicle_price', '>=', $range[0])->where('vehicle_price', '<=', $range[1])->with('vehicleInformation')
                ->with('VehicleImage')->get();

                return $milage_price_filter;
            break;


             // previous owner and milage filter combine case
             case($request->previousOwnersPro && $request->mileAgePro ):


                    $previous_milage_filter =Vehicle::where('previous_owners', '<=', $request->previousOwnersPro)
                    ->where('vehicle_mileage','<=',$request->mileAgePro)
                    ->with('vehicleInformation')
                    ->with('VehicleImage')->get();

            // dd($previous_milage_filter);
                return $previous_milage_filter;
            break;

              // previous owner and age filter combine case
              case($request->previousOwnersPro && $request->agePro ):

                $current_year = date("Y");
                $total = $current_year - $request->agePro;

                $previous_age_filter =Vehicle::where('previous_owners', '<=', $request->previousOwnersPro)
                ->where('vehicle_year', '>=', $total)
                ->where('vehicle_year', '<=', $current_year)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();

            // dd($previous_milage_filter);
                return $previous_age_filter;
            break;


              // previous owner and price range filter combine case
              case($request->previousOwnersPro && $request->range  ):

                $range = explode('-',$request->range);
                $previous_price_filter =Vehicle::where('previous_owners', '<=', $request->previousOwnersPro)
                ->where('vehicle_price', '>=', $range[0])
                ->where('vehicle_price', '<=', $range[1])
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();

            // dd($previous_milage_filter);
                return $previous_price_filter;
            break;

            // fuel type and  previous owners filter case
            case($request->fuelType && $request->previousOwnersPro):



                $fuel_owner_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                ->where('previous_owners', '<=', $request->previousOwnersPro)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();


                  return $fuel_owner_filter;
              break;
            // fuel type and  age filter case
              case($request->fuelType && $request->agePro):

                $current_year = date("Y");
                $total = $current_year - $request->agePro;

                $fuel_age_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                ->where('vehicle_year', '>=', $total)
                ->where('vehicle_year', '<=', $current_year)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();


                  return $fuel_age_filter;
              break;


              // fuel type and  milage filter case
              case($request->fuelType && $request->mileAgePro):



                $fuel_milage_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                ->where('vehicle_mileage','<=',$request->mileAgePro)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();


                  return $fuel_milage_filter;
              break;


                // fuel type and  price range filter case
                case($request->fuelType && $request->range):

                    $range = explode('-',$request->range);

                    $fuel_price_filter = Vehicle::where('vehicle_tank',$request->fuelType)
                    ->where('vehicle_price', '>=', $range[0])->where('vehicle_price', '<=', $range[1])
                    ->with('vehicleInformation')
                    ->with('VehicleImage')->get();


                      return $fuel_price_filter;
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

            // age filter case
            case($request->agePro):
              $current_year = date("Y");
              $total = $current_year - $request->agePro;

              $age_filter = Vehicle::where('vehicle_year', '>=', $total)->where('vehicle_year', '<=', $current_year)->with('vehicleInformation')
              ->with('VehicleImage')->get();

                return $age_filter;
            break;

            // previous owner filter case
            case($request->previousOwnersPro):



                $previous_owners = Vehicle::where('previous_owners', '<=', $request->previousOwnersPro)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();


//   dd($previous_owners);
                  return $previous_owners;
              break;



            // fuel type filter case
            case($request->fuelType):



                $fuel_type = Vehicle::where('vehicle_tank',$request->fuelType)
                ->with('vehicleInformation')
                ->with('VehicleImage')->get();


                  return $fuel_type;
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
        $order = OrderVehicleRequest::where('vehicle_id',$vehicle->id)->orderBy('request_price','DESC')->first();
             


        return view('frontend.dealer.vehicle.vehicleDetail',compact('vehicle','vehcile_info_feature_id','number_of_keys','finance','privateplate','smooking','toolpack','LockingWheelNut','damage','order'));
    }
    public function dashboard()
    {

        return view('frontend.dealer.dashboard');

    }
    public function dealerToDealer()
    {

        $allVehicles = DealerVehicle::Where('status',1)
        ->with('DealerAdvertVehicleDetail')
        ->with('DealerVehicleExterior')
        ->with('DealerVehicleHistory')
        ->with('DealerVehicleInterior')
        ->with('DealerVehicleMedia')
        ->get();
        $countAllVehicle = count($allVehicles);

        return view('frontend.dealer.vehicle.dealerToDealer',compact('allVehicles','countAllVehicle'));

    }
    public function dealersVehicleDetail($id){
        $vehicle = DealerVehicle::Where('status',1)->where('id',$id)
        ->with('DealerAdvertVehicleDetail')
        ->with('DealerVehicleExterior')
        ->with('DealerVehicleHistory')
        ->with('DealerVehicleInterior')
        ->with('DealerVehicleMedia')
        ->with('DealerVehicleTyre')
        ->first();
        // dd($vehicle);

        return view('frontend.dealer.vehicle.dealerVehicleDetail',compact('vehicle'));
    }
    public function buyItNow()
    {
        $buyItNowVehicles = Vehicle::Where('status',1)->with('vehicleInformation')->with('VehicleImage')->where('all_auction','all' )->get();
        $countbuyItNoVehicle = Vehicle::where('status',1)->where('all_auction','all' )->count();


        return view('frontend.dealer.vehicle.buyItNow',compact('buyItNowVehicles','countbuyItNoVehicle'));

    }

    public function buyItNowVehicle(Request $request)
    {
        $current_year = date("Y");
        $total = $current_year - $request->agePro;
        $range = explode('-',$request->range);

        $previous_owners = $request->previous_owners;
        $mileAgePro = $request->mileAgePro;
        $fuelType = $request->fuelType;
        if(!empty($request->range)) $query_string_second_part[] = " AND v.vehicle_price >= '$range[0]'";
        if(!empty($request->range)) $query_string_second_part[] = " AND v.vehicle_price <= '$range[1]'";
        if(!empty($request->mileAgePro)) $query_string_second_part[] = " AND v.vehicle_mileage <= '$mileAgePro'";
        if(!empty($previous_owners)) $query_string_second_part[] = " AND v.previous_owners <= '$previous_owners'";
        if(!empty($fuelType)) $query_string_second_part[] = " AND v.vehicle_tank = '$fuelType'";
        if(!empty($request->agePro)) $query_string_second_part[] = " AND v.vehicle_year >= '$total'";
        if(!empty($request->agePro)) $query_string_second_part[] = " AND v.vehicle_year <= '$current_year'";
        $query_string_second_part[] = " AND v.status = '1'";
        $query_string_second_part[] = " AND v.all_auction ='all'";
        $query_string_second_part[] = " AND v.deleted_at IS NULL";
        $query_string_second_part[] = " AND vimg.deleted_at IS NULL";
        $query_string_First_Part= "SELECT  v.vehicle_registartion_number,v.vehicle_name, v.vehicle_year,v.vehicle_color, v.vehicle_type, v.vehicle_type,v.previous_owners, v.vehicle_tank, v.previous_owners, v.vehicle_mileage, v.vehicle_price, v.all_auction, v.retail_price, v.clean_price, v.average_price, v.hidden_price,v.vehicle_category, v.status,vi.location,vi.interior,vi.body_type,vi.engine_size,vi.HPI_history_check,vi.vin,vi.first_registered,vi.keeper_start_date,vi.last_mot_date,vi.previous_owners,vi.seller_keeping_plate,vimg.vehicle_id, vimg.front,vimg.passenger_rare_side_corner,vimg.driver_rare_side_corner,vimg.interior_front,vimg.dashboard FROM vehicles AS v JOIN vehicle_information AS vi ON vi.vehicle_id = v.id
        JOIN vehicle_images AS vimg ON vimg.vehicle_id = v.id WHERE ";
        $query_string_third_part = ' ORDER BY v.id';
        $query_string_second_part= implode(" ", $query_string_second_part);
        $query_string_second_part=  preg_replace("/AND/", " ", $query_string_second_part, 1);
        $query_string = $query_string_First_Part.$query_string_second_part.$query_string_third_part;
        $liveSellFilter = DB::select(DB::raw($query_string));
      return $liveSellFilter;
    }

    public function completedVehicleDetails($id)
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
      $order = OrderVehicleRequest::where('vehicle_id',$vehicle->id)->where('user_id',Auth::user()->id)->orderBy('request_price','DESC')->first();
           

      return view('frontend.dealer.vehicle.completedVehicleDetail',compact('vehicle','vehcile_info_feature_id','number_of_keys','finance','privateplate','smooking','toolpack','LockingWheelNut','damage','order'));
  

    }
}

