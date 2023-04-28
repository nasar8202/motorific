<?php

namespace App\Http\Controllers\frontend\seller;

use App\Models\User;
use App\Models\Finance;
use App\Models\Smoking;
use App\Models\Vehicle;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Models\NumberOfKey;
use App\Models\BidedVehicle;
use App\Models\PrivatePlate;
use App\Models\SeatMaterial;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Models\VehicleHistory;
use App\Models\LockingWheelNut;
use App\Models\vehicleCategories;
use App\Models\OrderVehicleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\sellerVehicleRejectBySeller;
use App\Mail\sellerVehicleApprovedBySeller;

class SellerDashboardController extends Controller
{
    public function approveBySellerVehicle($id)
    {

       $vehicles = Vehicle::with('user')->with('VehicleImage')->where('id',$id)->first();
//  dd($vehicles);
      if($vehicles->status == 1){
        return back()->with('warning', 'This Vehicle Is Already Approve');
    }
    else{
        $vehicles->status = 1;
        $vehicles->save();
        $originalDate = $vehicles->updated_at;
        $winDate = date("d F Y ", strtotime($originalDate));
        $winTime = date("H:i:s a", strtotime($originalDate));

        $data = ([
           
            'date' => $winDate.' at '.$winTime,
            'reserve_price'=>$vehicles->reserve_price,
            'vehicle_registration'=>$vehicles->vehicle_registartion_number,
            'vehicle_name'=>$vehicles->vehicle_name,
            'vehicle_mileage'=>$vehicles->vehicle_mileage,
            

        ]);
        
        $admin = User::where('id',1)->first();
        Mail::to($admin->email)->send(new sellerVehicleApprovedBySeller($data));

        return redirect()->route('myLogin')->with('success', 'You Have Approved Your Valuation, Login To System So Further Process');
    }

    }

    public function rejectBySellerVehicle($id)
    {

       $vehicles = Vehicle::with('user')->with('VehicleImage')->where('id',$id)->first();
//  dd($vehicles);
      if($vehicles->status == 0){
        return redirect()->route('myLogin')->with('warning', 'You have already reject valuation');

      }else{
        $vehicles->status = 0;
        $vehicles->save();

        $originalDate = $vehicles->updated_at;
        $winDate = date("d F Y ", strtotime($originalDate));
        $winTime = date("H:i:s a", strtotime($originalDate));


        $originalDate = $vehicles->updated_at;
        $winDate = date("d F Y ", strtotime($originalDate));
        $winTime = date("H:i:s a", strtotime($originalDate));

        $data = ([
           
            'date' => $winDate.' at '.$winTime,
            'reserve_price'=>$vehicles->reserve_price,
            'vehicle_registration'=>$vehicles->vehicle_registartion_number,
            'vehicle_name'=>$vehicles->vehicle_name,
            'vehicle_mileage'=>$vehicles->vehicle_mileage,
            

        ]);
        $admin = User::where('role_id',1)->first();
        Mail::to($admin->email)->send(new sellerVehicleRejectBySeller($data));

        return redirect()->route('myLogin')->with('warning', 'You have reject valuation');
      }
        


    }

    public function seller()
    {

        return view('frontend.seller.index');

    }
    public function acceptedVehicles()
    {
        $allVehicles = Vehicle::Where('user_id',Auth::user()->id)
        ->with('vehicleInformation')->with('VehicleImage')->get();
        return view('frontend.seller.acceptedVehicles',compact('allVehicles'));

    }
    public function completeProfileVehicles()
    {
        $completeProfileVehicles = Vehicle::where('status',2)->Where('user_id',Auth::user()->id)
        ->get();
        // dd($completeProfileVehicles);
        return view('frontend.seller.completeProfileVehicles',compact('completeProfileVehicles'));
    }
    public function continueCompleteProfile($id)
    {
        
        
      try{
        
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
        $registeration = str_replace(' ','',$id);
      
        $vehicle = Vehicle::where('vehicle_registartion_number',$registeration)->where('user_id',$currentUser)->first();

        

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
                  CURLOPT_POSTFIELDS =>"{\n\t\"registrationNumber\": \"$id\"\n}",
                  CURLOPT_HTTPHEADER => array(
                    "x-api-key: XlMDFK2cy74gg0iIBYqFT9lgP4Zrul64aRVBpQC5",
                    "Content-Type: application/json"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                 
                 $res = json_decode($response);

        if( isset($id) ){
            $milage = $vehicle->millage;
            }else{
                return back()->with('error','Record not found');
            }
      
        return view('frontend.seller.photoUpload',compact('milage','res','vehicleCategories','VehicleFeature','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances','VehicleHistories','user'));
    
    }catch(\Exception $e)
    {
       return $e;
        return Redirect()->back()
            ->with('error',$e->getMessage() )
            ->withInput();
    }
    }
    public function marksAsSoldVehicles($id)
    {
        $allVehicles = Vehicle::Where('id',$id)->first();
        if($allVehicles->vehicle_availability == 'sold'){
            
        return redirect()->back()->with('warning', 'You Already Set This Vehicle To Sold');
        }
        else{
        $allVehicles->status = 2;
        $allVehicles->vehicle_availability = 'sold';
        $allVehicles->save();
        
        return redirect()->back()->with('success', 'Vehicle Status Set To Sold Successfully');
    }
    }
    public function bidsOnVehicles($id)
    {
       $orders = BidedVehicle::with('vehicle')->with('user')->where('vehicle_id',$id)->orderBy('bid_price','DESC')->get();
       
        return view('frontend.seller.bidsOnMyVehicles',compact('orders'));

    }
    public function ordersOnVehicles($id)
    {
        
        $orders = OrderVehicleRequest::where('vehicle_id',$id)->with('vehicle')->with('user')->orderBy('request_price','DESC')->get();
           if($orders == null){
             
               return redirect()->back()->with('success', 'You Dont Have Any Orders !');
            }
            else{
                
                return view('frontend.seller.ordersOnMyVehicles',compact('orders'));
        
            }
    }
    public function meetingStatus(Request $request)
    {
        $meetingStatus = OrderVehicleRequest::where('id',$request->id)->first();
        
        $meetingStatus->meeting_status = $request->status;
        $meetingStatus->save();
        
        return redirect()->back()->with('success', 'Meeting Status Updated Successfully!');
        
    }
    public function meetingBidStatus(Request $request)
    {    
        $meetingStatus = BidedVehicle::where('id',$request->id)->first();
        
        $meetingStatus->meeting_status = $request->status;
        $meetingStatus->save();
        
        return redirect()->back()->with('success', 'Meeting Status Updated Successfully!');
        
    }
    public function myProfile()
    {
       $currentUser = Auth::user();
    //    dd($currentUser);
        return view('frontend.seller.myProfile',compact('currentUser'));

    }
    public function updateMyProfile(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|regex:/(([a-zA-Z]+)(\d+)?$)/u|max:256',
            'post_code' => 'required|max:10|min:5',
            'email' => 'required',
            'phone_number' => 'required|max:256|min:11',

        ]);
        $zip = ($request->post_code);
        $postcode = str_replace(' ', '', $zip);
       

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=.'$postcode'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk";
        try {
        $result_string = file_get_contents($url);
        $result = json_decode($result_string, true);
        if (count($result['results']) != 0) {
        // dd($request->all());
        $user = User::find($id);
        $user->name = $request->name;
        $user->post_code = $request->post_code;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully!');
        }
        else{
            return back()->with('error', 'Enter The Right Post Code');
        }
    }
    catch (\Exception $e) {
        return $e->getMessage();

        //return $e;
        return Redirect()->back()
            ->with('error', $e->getMessage())
            ->withInput();
    }

    }
    public function updateMyPassword(Request $request, $id)
    {
      
        $request->validate([
            'current_pass' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                }],
            'new_pass' => 'required|required_with:confirm_pass|same:confirm_pass|min:8|max:12',
            'confirm_pass' => 'required|min:8|max:12',
           

        ]);
        // dd($request->all());
        $user = User::find($id);
        $user->password =  Hash::make($request->new_pass);
        $user->save();
        return redirect()->back()->with('success', 'Password Updated Successfully!');
        

    }
    public function thankyou()
    {

        return view('frontend.seller.thankyou');

    }
    public function sellersSoldDealerDetails($id)
    {
        $dealers = User::find($id);
        return view('frontend.seller.viewDealerDetail',compact('dealers'));
    }
}
