<?php

namespace App\Http\Controllers\frontend\seller;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Finance;
use App\Models\Smoking;
use App\Models\Vehicle;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Models\NumberOfKey;
use Illuminate\Support\Str;
use App\Models\PrivatePlate;
use App\Models\SeatMaterial;
use App\Models\VehicleImage;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Models\LockingWheelNut;
use App\Models\VehicleExterior;
use App\Models\VehicleInterior;
use App\Mail\SellerVehicleAdded;
use App\Models\vehicleCategories;
use App\Models\vehicleInformation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\vehicleConditionAndDamage;
use App\Models\VehicleHistory;

class FrontController extends Controller
{
    public function sellToADealer()
    {
        return view('frontend.seller.sellToADealer');
    }
    public function CarValueTracker()
    {
        return view('frontend.seller.CarValueTracker');
    }
    public function SellMyCarOnFinance()
    {
        return view('frontend.seller.SellMyCarOnFinance');
    }
    public function sellMyElectricCars()
    {
        return view('frontend.seller.sellMyElectricCars');
    }
    public function createStep1(Request $request)
    {
        $register = $request->session()->get('register');

        return view('frontend.dealer.step1',compact('register'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function PostcreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'company_name' => 'required',
            'position' => 'required',
            'mobile_number' => 'required',
            'email' => 'required',
            'hear_about_us' => 'required',
        ]);
        if(empty($request->session()->get('register'))){
            $register = new \App\Models\Dealer();
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }
        dd($request->session()->put('register', $register));
        return redirect('/register-create-step-2');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function createStep2(Request $request)
    {
        $register = $request->session()->get('register');

        return view('register.step2',compact('register'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function PostcreateStep2(Request $request)
    {
        $validatedData = $request->validate([
            'address_line_1' => 'required',
            'address_line_2' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'company_type' => 'required',
            'website' => 'required',
            'company_phone' => 'required',
        ]);
        if(empty($request->session()->get('register'))){
            $register = new \App\Models\Dealer();
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }
        return redirect()->route('register.create.step.3');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function createStep3(Request $request)
    {
        $register = $request->session()->get('register');
        return view('register.step3',compact('register'));
    }

   /**
     * Write code on Method
     *
     * @return response()
     */
    public function PostcreateStep3(Request $request)
    {

        $validatedData = $request->validate([
            'lowest_purchase_price' => 'required',
            'highest_purchase_price' => 'required',
            'age_range_from' => 'required',
            'age_range_to' => 'required',
            'mileage_from' => 'required',
            'mileage_to' => 'required',
            'how_far_distance' => 'required',
            'purchase_each_month_vehicles' => 'required',
        ]);
        if(empty($request->session()->get('register'))){
            $register = new \App\Models\Dealer();
            $register->fill($validatedData);

            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }

            $register = $request->session()->get('register');

            $request->session()->put('register', $register);
            $register->all_makes = $request->all_makes;
            $register->specific_makes = $request->specific_makes;
            $register->any_thing_else = $request->any_thing_else;
            $register->save();

        return redirect('/');
    }

   /**
     * Write code on Method
     *
     * @return response()
     */

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $register = $request->session()->get('register');

        return redirect('/data');
    }
    public function index()
    {

        return view('frontend.seller.index');
    }
    public function sellMyCar()
    {
        return view('frontend.seller.index');
    }

    public function valuation()
    {
        return view('frontend.seller.valuation');
    }
    //multistep question form submition code start
    public function vehicleInformation(Request $request)
    {
        // dd($request->all());
        // $feature = implode($request->the_value, ',');

        $request->session()->put('vehicle_feature',$request->the_value);
        $request->session()->put('seat_material',$request->seatMaterial);
        $request->session()->put('number_of_keys',$request->numberOfKeys);
        $request->session()->put('tool_pack',$request->toolPack);
        $request->session()->put('locking_wheel_nut',$request->wheelNut);
        $request->session()->put('smoked_in',$request->smoking);
        $request->session()->put('log_book',$request->logBook);
        $request->session()->put('location',$request->location);
        $request->session()->put('vehicle_owner',$request->vehicleOwner);
        $request->session()->put('private_plate',$request->privatePlate);
        $request->session()->put('finance',$request->finance);
        $request->session()->put('categ',$request->categ);
        $request->session()->put('VehicleHistory',$request->VehicleHistory);

        $feature = explode(',',$request->the_value);
        foreach($feature as $f){
            $VehicleFeature[] = VehicleFeature::where('id',$f)->first();
        }
        $SeatMaterials =  SeatMaterial::where('id',session()->get('seat_material'))->first();
        $numberOfKeys =  NumberOfKey::where('id',session()->get('number_of_keys'))->first();
        $ToolPack =  ToolPack::where('id',session()->get('tool_pack'))->first();
        $LockingWheelNut =  LockingWheelNut::where('id',session()->get('locking_wheel_nut'))->first();
        $Smokings =  Smoking::where('id',session()->get('smoked_in'))->first();
        $VCLogBooks =  VCLogBook::where('id',session()->get('log_book'))->first();
        $VehicleLocation = session()->get('location');
        $VehicleOwners =  VehicleOwner::where('id',session()->get('vehicle_owner'))->first();
        $PrivatePlates =  PrivatePlate::where('id',session()->get('private_plate'))->first();
        $Finances =  Finance::where('id',session()->get('finance'))->first();
        $vehicleCategories =  vehicleCategories::where('id',session()->get('categ'))->first();
        $VehicleHistory =  VehicleHistory::where('id',session()->get('VehicleHistory'))->first();

        

        return ['VehicleFeature'=>$VehicleFeature,'SeatMaterials'=>$SeatMaterials,'NumberOfKeys'=>$numberOfKeys,
        'ToolPack'=>$ToolPack,'LockingWheelNut'=>$LockingWheelNut,'Smokings'=>$Smokings,'VCLogBooks'=>$VCLogBooks,
        'VehicleLocation'=>$VehicleLocation,'VehicleOwners'=>$VehicleOwners,'PrivatePlates'=>$PrivatePlates,'Finances'=>$Finances,'vehicleCategories'=>$vehicleCategories
        ,'VehicleHistory'=>$VehicleHistory];
    //  $request->session()->get('seat_material');

    }

     //multistep question form submition code end
     //multistep main vehicle submission code start
    public function addSellerVehicle(Request $request)
    {
        // dd($request->all());
        // $feature = implode($request->the_value, ',');

        $request->session()->put('RegisterationNumber',$request->RegisterationNumber);
        $request->session()->put('VehicleName',$request->VehicleName);
        $request->session()->put('VehicleYear',$request->VehicleYear);
        $request->session()->put('VehicleColor',$request->VehicleColor);
        $request->session()->put('VehicleType',$request->VehicleType);
        $request->session()->put('VehicleTank',$request->VehicleTank);
        $request->session()->put('VehicleMileage',$request->VehicleMileage);
        $request->session()->put('VehiclePrice',$request->VehiclePrice);

        return "true";

    }
    //multistep main vehicle submission code end
    //multipstep condition and damages code start
    public function addConditionDamages(Request $request)
    {

        $request->session()->put('interior',$request->interior);
        $request->session()->put('bodyType',$request->bodyType);
        $request->session()->put('engineSize',$request->engineSize);
        $request->session()->put('hpi',$request->hpi);
        $request->session()->put('vin',$request->vin);
        $request->session()->put('registerDate',$request->registerDate);
        $request->session()->put('keeperDate',$request->keeperDate);
        $request->session()->put('motDate',$request->motDate);
        $request->session()->put('previousOwner',$request->previousOwner);
        $request->session()->put('keepingPlate',$request->keepingPlate);
        $request->session()->put('additional',$request->additional);
        $request->session()->put('YourExteriorGrade',$request->YourExteriorGrade);
        $request->session()->put('vehicleCategory',$request->vehicleCategory);
        $request->session()->put('scrateches',$request->scrateches);
        $request->session()->put('dents',$request->dents);
        $request->session()->put('paintwork',$request->paintwork);
        $request->session()->put('windscreen',$request->windscreen);
        $request->session()->put('brokenmissing',$request->brokenmissing);
        $request->session()->put('warninglights',$request->warninglights);
        $request->session()->put('YourServiceRecord',$request->YourServiceRecord);
        $request->session()->put('MainDealerServices',$request->MainDealerServices);
        $request->session()->put('IndependentDealerService',$request->IndependentDealerService);

        return "true";

    }
    //multipstep condition and damages code end


    public function createVehicle(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'RegisterationNumber' => 'required',
            // 'VehicleName' => 'required',
            // 'VehicleYear' => 'required',
            // 'VehicleColor' => 'required',
            // 'VehicleType' => 'required',
            // 'VehicleTank' => 'required',
            // 'VehicleMileage' => 'required',
            // 'VehiclePrice' => 'required',
            'vehicle_feature' => 'required',
            'seat_material' => 'required',
            'number_of_keys' => 'required',
            'tool_pack' => 'required',
            'locking_wheel_nut' => 'required',
            // 'VehicleCategory'=>'required',
            'smoked_in' => 'required',
            'log_book' => 'required',
            'location' => 'required|max:256',
            'vehicle_owner' => 'required',
            'private_plate' => 'required',
            'finance' => 'required',
            // 'YourExteriorGrade' => 'required',
            // 'scratchesandScuffs' => 'required',
            // 'dents' => 'required',
            // 'paintworkProblems' => 'required',
            // 'WindscreenDamage' => 'required',
            // 'brokenMissing' => 'required',
            // 'WarningLights' => 'required',
            // 'YourServiceRecord' => 'required',
            // 'MainDealerServices' => 'required',
            // 'IndependentDealerService' => 'required',
            // 'interior' => 'required',
            // 'body_type' => 'required',
            // 'engine_size' => 'required',
            // 'hpi' => 'required',
            // 'vin' => 'required',
            // 'register_date' => 'required',
            // 'keeper_date' => 'required',
            // 'mot_date' => 'required',
            // 'previous_owner' => 'required',
            // 'keeping_plate' => 'required',
            // 'additional' => 'required',
            'image1' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image2' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image3' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image4' => 'required|mimes:jpeg,png,jpg,|max:1024',
            'image5' => 'required|mimes:jpeg,png,jpg,|max:1024',


        ]);
        DB::beginTransaction();
        try{

            $users = User::where('id',$request->user_id)->first();
            // dd($users);
            $vehicle = new Vehicle;
            $vehicle->user_id = $request->user_id;
            $vehicle->vehicle_registartion_number = $request->RegisterationNumber;
            $vehicle->vehicle_name = $request->VehicleName;
            $vehicle->vehicle_year = $request->VehicleYear;
            $vehicle->vehicle_color = $request->VehicleColor;
            $vehicle->vehicle_type = $request->VehicleType;
            $vehicle->vehicle_tank = $request->VehicleTank;
            $vehicle->previous_owners =  $request->previous_owner;
            $vehicle->vehicle_mileage = $request->VehicleMileage;
            $vehicle->vehicle_price = $request->VehiclePrice;
            $vehicle->vehicle_category = $request->vehicleCateg;
            $vehicle->status = 0;

            $vehicle->save();

            

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
            // $damages = new vehicleConditionAndDamage;
            // $damages->vehicle_id = $vehicle->id;
            // $damages->exterior_grade = $request->YourExteriorGrade;
            // $damages->scratches_and_scuffs = $request->scratchesandScuffs;
            // $damages->dents = $request->dents;
            // $damages->paintwork_problems = $request->paintworkProblems;
            // $damages->windscreen_damage = $request->WindscreenDamage;
            // $damages->broken_missing = $request->brokenMissing;
            // $damages->warning_lights_on_dashboard = $request->WarningLights;
            // $damages->service_record = $request->YourServiceRecord;
            // $damages->main_dealer_services = $request->MainDealerServices;
            // $damages->independent_dealer_service = $request->IndependentDealerService;
            // $damages->save();


            $vehicle_feature_id =  implode(',', $request->vehicle_feature);

            $vehicleInformation = new vehicleInformation;
            $vehicleInformation->vehicle_id = $vehicle->id;
            $vehicleInformation->vehicle_feature_id = $vehicle_feature_id ;

            $vehicleInformation->seat_material_id =  $request->seat_material;
            $vehicleInformation->number_of_keys_id =  $request->number_of_keys;
            $vehicleInformation->tool_pack_id =  $request->tool_pack;
            $vehicleInformation->looking_wheel_nut_id =  $request->locking_wheel_nut;
            $vehicleInformation->smooking_id =  $request->smoked_in;
            $vehicleInformation->logbook_id =  $request->log_book;
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

                $originalDate = $vehicle->created_at;
                $winDate = date("d F Y ", strtotime($originalDate));
                $winTime = date("H:i:s a", strtotime($originalDate));

                $users = User::where('id',$request->user_id)->first();

                $data = ([
                    'name' => $users->name,
                    'email' => $users->email,
                    'date' => $winDate.' at '.$winTime,
                    'vehicle_registration'=>$request->RegisterationNumber,
                    'vehicle_name'=>$request->VehicleName,
                    'vehicle_mileage'=>$request->VehicleMileage,
                    'front'=> $front,
                    'colour'=>$vehicle->vehicle_color,
                    'bidded_price'=>$request->VehiclePrice??"No Price Yet!",
                    'age'=>$request->VehicleYear,
    
                ]);
                Mail::to($users->email)->send(new SellerVehicleAdded($data));


        }catch(\Exception $e)
        {
            DB::rollback();
            return $e;
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();

            return redirect()->route('thankyou')->with('success', 'Vehicle Added Successfully. Wait For Admin Approvel!');


    }

    public function photoUpload(Request $request)
    {
        $request->validate([
            'millage' => 'required|numeric|min:1000',
      ]);
      try{
        $data = $request;
    $logging_cond = Auth::user();
    if(!isset($logging_cond)){
        $registeration = trim($request->registeration,' ');
        $vehicle = Vehicle::where('vehicle_registartion_number',$registeration)->where('user_id',$logging_cond)->first();

        if($vehicle != null){
            return back()->with('error','You Already Register This Vehicle');
         } else{
        // $res = Http::withHeaders([
        //     'accept' => 'application/json',
        //     'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
        // ])
        // ->get("https://api.oneautoapi.com/autotrader/inventoryaugmentationfromvrm?vehicle_registration_mark=$registeration")
        // ->json();
        // if($res['success'] == 'false'){
        //     return back()->with('error','Record not found');
        // }

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
                  CURLOPT_POSTFIELDS =>"{\n\t\"registrationNumber\": \"$registeration\"\n}",
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

                 session(['registrationNo' => $res->registrationNumber]);
                 session(['model' => $res->make]);
        return view('frontend.seller.registration',compact('data','res'));
    }
}
        $currentUser = Auth::user()->id;
     
        $vehicleCategories = vehicleCategories::all();
        $VehicleFeature = VehicleFeature::all();
        $NumberOfKeys =  NumberOfKey::where('status',1)->get();
        $SeatMaterials =  SeatMaterial::where('status',1)->get();
        $ToolPacks =  ToolPack::where('status',1)->get();
        $LockingWheelNuts =  LockingWheelNut::where('status',1)->get();
        $Smokings =  Smoking::where('status',1)->get();
        $VCLogBooks =  VCLogBook::where('status',1)->get();
        $VehicleOwners =  VehicleOwner::where('status',1)->get();
        $PrivatePlates =  PrivatePlate::where('status',1)->get();
        $Finances =  Finance::where('status',1)->get();
        $VehicleHistories =  VehicleHistory::where('status',1)->get();
        $user = User::find($currentUser);
        $registeration = str_replace(' ','',$request->registeration);
        // $res = Http::withHeaders([
        //     'accept' => 'application/json',
        //     'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
        // ])
        // ->get("https://api.oneautoapi.com/autotrader/inventoryaugmentationfromvrm?vehicle_registration_mark=$registeration")
        // ->json();
        // if($res['success'] == 'false'){
        //     return back()->with('error','Record not found');
        // }
        // dd($registeration);
        $vehicle = Vehicle::where('vehicle_registartion_number',$registeration)->where('user_id',$currentUser)->first();

        if($vehicle != null || !empty($vehicle)){
            
            return back()->with('error','You Already Register This Vehicle');
         } else{

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
                  CURLOPT_POSTFIELDS =>"{\n\t\"registrationNumber\": \"$registeration\"\n}",
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

             //return $response;
        // $res = $res['result'];
        // $id = $res['basic_vehicle_info']['autotrader_derivative_id'];
        // $date = $res['basic_vehicle_info']['first_registration_date'];
        if( isset($res->registrationNumber) ){
        $milage = $request->millage;
        }else{
            return back()->with('error','Record not found');
        }
        return view('frontend.seller.photoUpload',compact('milage','res','vehicleCategories','VehicleFeature','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances','VehicleHistories','user'));
    
    }
        // $milage= Http::withHeaders([
        //     'accept' => 'application/json',
        //     'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
        // ])
        // ->get("https://api.oneautoapi.com/autotrader/valuationfromid?autotrader_derivative_id=$id&first_registration_date=$date&current_mileage=$check_millage")
        // ->json();
        // $milage = $milage['result'];
    }catch(\Exception $e)
    {
       //return $e;
        return Redirect()->back()
            ->with('error',$e->getMessage() )
            ->withInput();
    }
    }
    public function registration()
    {
        return view('frontend.seller.registration');
    }

    public function updateSeller(Request $request)
    {
        $seller = User::find($request->userId);
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->phone_number = $request->number;
        $seller->update();
        return $seller;
    }
    public function myLogin()
    {
        return view('frontend.seller.myLogin');
    }
    public function longitude()
    {
        $zip = 71000;
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=.'$zip'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk";
        $result_string = file_get_contents($url);
        $result = json_decode($result_string, true);
        
        $result1[]=$result['results'][0];
        $result2[]=$result1[0]['geometry'];
        $result3[]=$result2[0]['location'];

        $zipk = 74500;
        $urlk = "https://maps.googleapis.com/maps/api/geocode/json?address=.'$zipk'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk";
        $result_stringk = file_get_contents($urlk);
        $resultk = json_decode($result_stringk, true);
        
        $resultk1[]=$resultk['results'][0];
        $resultk2[]=$resultk1[0]['geometry'];
        $resultk3[]=$resultk2[0]['location'];
        // dd($resultk3[0]);



        $long1 = deg2rad($result3[0]['lng']);
        $long2 = deg2rad($resultk3[0]['lng']);
        $lat1 = deg2rad($resultk3[0]['lat']);
        $lat2 = deg2rad($resultk3[0]['lat']);
          
        //Haversine Formula
        $dlong = $long2 - $long1;
        $dlati = $lat2 - $lat1;
          
        $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
          
        $res = 2 * asin(sqrt($val));
          
        $radius = 3958.756;
          
        dd ($res*$radius.'miles');
   

   // latitude and longitude of Two Points
//    $latitudeFrom = 19.017656 ;
//    $longitudeFrom = 72.856178;
//    $latitudeTo = 40.7127;
//    $longitudeTo = -74.0059;
     
//    // Distance between Mumbai and New York
//    print_r(twopoints_on_earth( $latitudeFrom, $longitudeFrom,
//                  $latitudeTo,  $longitudeTo).' '.'miles');


    }

    public function testlocation(Request $request)
    {

        // if(isset(Auth::user()->id)==null){
        //     return response()->json('0');
        // }
        // else{

            try{
                $registeration = trim($request->registeration,' ');
                // $res= Http::withHeaders([
                //     'accept' => 'application/json',
                //     'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
                // ])
                // ->get("https://api.oneautoapi.com/autotrader/inventoryaugmentationfromvrm?vehicle_registration_mark=$registeration")
                // ->json();
                // // $user = Auth::user();

                // return response()->json($res);

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
                  CURLOPT_POSTFIELDS =>"{\n\t\"registrationNumber\": \"$registeration\"\n}",
                  CURLOPT_HTTPHEADER => array(
                    "x-api-key: XlMDFK2cy74gg0iIBYqFT9lgP4Zrul64aRVBpQC5",
                    "Content-Type: application/json"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                 //echo $response;
             return $response;
            }catch(\Exception $e)
            {
               //return $e;
                return Redirect()->back()
                    ->with('error',$e->getMessage() )
                    ->withInput();
            }

    // $data = json_decode($response, true);
    // $quiz_queue_ans_id = $data['errors'][0]['status'];
    // if($quiz_queue_ans_id == 404){
    //     return 0;
    // }else{
    //     return $response;

    // }

// }

    }
    public function getUsers(Request $request)
    {

        $users = User::where('id',$request->id)->first();
        if ($users) {
        return response()->json(['success'=>'success','users'=>$users]);

        }else{
        return response()->json(['success'=>'error']);
        }
        // $users = User::where('id',$request->id)->get();
        // if(count($users)>0){
        //     return response()->json(['success'=>'success','users'=>$users]);
        // }else{
        //     return response()->json(['success'=>'error']);
        // }
    }
    public function forgotPassPage()
    {
        return view('frontend.seller.forgotPassword');

    }
    public function forgotPass(Request $request)
    {
        //$user = User::where('email',$request->email)->first();

        // $details = [
        //     'greeting' => 'Hi ' . $user->name,
        //     'body' => 'Your Request Has Been Approved',
        //     'thanks' => 'Thank you for using Motorfic.com ',
        //     'actionText' => 'Login',
        //     'actionURL' => url('/register-step-1'),
        //     'order_id' => 101
        // ];

        // // Notification::send($user->email, new MyFirstNotification($details));
        // $user->notify(new ApprovedDealerNotification($details));

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'We have e-mailed your password reset link!');

    }

    public function showResetPasswordForm($token)
    {
        $email =  DB::table('password_resets')
        ->where([
          'token' => $token
        ])
        ->first();

        return view('frontend.seller.forgetPasswordLink', ['token' => $token,'email'=>$email->email]);
    }

    public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email,
                                'token' => $request->token
                              ])
                              ->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/seller-login')->with('success', 'Your password has been changed!');
      }
}
