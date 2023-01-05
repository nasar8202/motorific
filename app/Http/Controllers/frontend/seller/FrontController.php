<?php

namespace App\Http\Controllers\frontend\seller;

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
use App\Models\vehicleCategories;
use App\Models\vehicleInformation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\vehicleConditionAndDamage;

class FrontController extends Controller
{

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



        return ['VehicleFeature'=>$VehicleFeature,'SeatMaterials'=>$SeatMaterials,'NumberOfKeys'=>$numberOfKeys,
        'ToolPack'=>$ToolPack,'LockingWheelNut'=>$LockingWheelNut,'Smokings'=>$Smokings,'VCLogBooks'=>$VCLogBooks,
        'VehicleLocation'=>$VehicleLocation,'VehicleOwners'=>$VehicleOwners,'PrivatePlates'=>$PrivatePlates,'Finances'=>$Finances];        
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
        $request->validate([
            'RegisterationNumber' => 'required',
            'VehicleName' => 'required',
            'VehicleYear' => 'required',
            'VehicleColor' => 'required',
            'VehicleType' => 'required',
            'VehicleTank' => 'required',
            'VehicleMileage' => 'required',
            'VehiclePrice' => 'required',
            'vehicle_feature' => 'required',
            'seat_material' => 'required',
            'number_of_keys' => 'required',
            'tool_pack' => 'required',
            'locking_wheel_nut' => 'required',
            'VehicleCategory'=>'required',
            'smoked_in' => 'required',
            'log_book' => 'required',
            'location' => 'required',
            'vehicle_owner' => 'required',
            'private_plate' => 'required',
            'finance' => 'required',
            'YourExteriorGrade' => 'required',
            'scratchesandScuffs' => 'required',
            'dents' => 'required',
            'paintworkProblems' => 'required',
            'WindscreenDamage' => 'required',
            'brokenMissing' => 'required',
            'WarningLights' => 'required',
            'YourServiceRecord' => 'required',
            'MainDealerServices' => 'required',
            'IndependentDealerService' => 'required',
            'interior' => 'required',
            'body_type' => 'required',
            'engine_size' => 'required',
            'hpi' => 'required',
            'vin' => 'required',
            'register_date' => 'required',
            'keeper_date' => 'required',
            'mot_date' => 'required',
            'previous_owner' => 'required',
            'keeping_plate' => 'required',
            'additional' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required',
            'image5' => 'required',
            

        ]);
        DB::beginTransaction();
        try{


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
            $vehicle->vehicle_category = $request->VehicleCategory;
            $vehicle->status = 0;

            $vehicle->save();

            $damages = new vehicleConditionAndDamage;
            $damages->vehicle_id = $vehicle->id;
            $damages->exterior_grade = $request->YourExteriorGrade;
            $damages->scratches_and_scuffs = $request->scratchesandScuffs;
            $damages->dents = $request->dents;
            $damages->paintwork_problems = $request->paintworkProblems;
            $damages->windscreen_damage = $request->WindscreenDamage;
            $damages->broken_missing = $request->brokenMissing;
            $damages->warning_lights_on_dashboard = $request->WarningLights;
            $damages->service_record = $request->YourServiceRecord;
            $damages->main_dealer_services = $request->MainDealerServices;
            $damages->independent_dealer_service = $request->IndependentDealerService;
            $damages->save();


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
           
            $vehicleInformation->interior =  $request->interior;
            $vehicleInformation->body_type =  $request->body_type;
            $vehicleInformation->engine_size =  $request->engine_size;
            $vehicleInformation->HPI_history_check =  $request->hpi;
            $vehicleInformation->vin =  $request->vin;
            $vehicleInformation->first_registered =  $request->register_date;
            $vehicleInformation->keeper_start_date =  $request->keeper_date;
            $vehicleInformation->last_mot_date =  $request->mot_date;
            $vehicleInformation->previous_owners =  $request->previous_owner;
            $vehicleInformation->seller_keeping_plate =  $request->keeping_plate;
            $vehicleInformation->additional_information =  $request->additional;
           
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

            return redirect()->route('sellMyCar')->with('success', 'Vehicle added  Successfully!');


    }

    public function photoUpload(Request $request)
    {
        $data = $request;
    $logging_cond = Auth::user();
    if(!isset($logging_cond)){
        return view('frontend.seller.registration',compact('data'));
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
        $user = User::find($currentUser);
        $registeration = trim($request->registeration,' ');
        $res = Http::withHeaders([
            'accept' => 'application/json',
            'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
        ])
        ->get("https://api.oneautoapi.com/autotrader/inventoryaugmentationfromvrm?vehicle_registration_mark=$registeration")
        ->json();
        if($res['success'] == 'false'){
            return back()->with('error','Record not found');
        }
        $res = $res['result'];
        $id = $res['basic_vehicle_info']['autotrader_derivative_id'];
        $date = $res['basic_vehicle_info']['first_registration_date'];
        $check_millage = $request->millage;
        $milage= Http::withHeaders([
            'accept' => 'application/json',
            'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
        ])
        ->get("https://api.oneautoapi.com/autotrader/valuationfromid?autotrader_derivative_id=$id&first_registration_date=$date&current_mileage=$check_millage")
        ->json();
        $milage = $milage['result'];
        return view('frontend.seller.photoUpload',compact('milage','check_millage','res','vehicleCategories','VehicleFeature','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances','user'));
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

    public function testlocation(Request $request)
    {
        
        // if(isset(Auth::user()->id)==null){
        //     return response()->json('0');
        // }
        // else{
        $registeration = trim($request->registeration,' ');
    $res= Http::withHeaders([
        'accept' => 'application/json',
        'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
    ])
    ->get("https://api.oneautoapi.com/autotrader/inventoryaugmentationfromvrm?vehicle_registration_mark=$registeration")
    ->json();
    // $user = Auth::user();

    return response()->json($res);
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
}
