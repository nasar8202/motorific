<?php

namespace App\Http\Controllers\frontend\seller;

use App\Models\User;
use App\Models\Finance;
use App\Models\Smoking;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Models\NumberOfKey;
use App\Models\PrivatePlate;
use App\Models\SeatMaterial;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Models\LockingWheelNut;
use App\Http\Controllers\Controller;

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
    public function photoUpload()
    {   
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
        
        return view('frontend.seller.photoUpload',compact('VehicleFeature','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances'));
    }
    public function registration()
    {
        return view('frontend.seller.registration');
    }
    public function myLogin()
    {
        return view('frontend.seller.myLogin');
    }

    public function testlocation()
    {
        $clientIP = \Request::getClientIp(true);
        dd($clientIP);
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
