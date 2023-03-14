<?php

namespace App\Http\Controllers\backend\admin\newVehicle;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\sellerVehicleApprovedByAdmin;
use Illuminate\Support\Facades\Mail;
use App\Mail\sellerVehicleDeactivateByAdmin;

class SellerVehicleController extends Controller
{
    public function viewSellerDetails($id)
    {
        // dd($id);
       $vehicles = Vehicle::where('status',0)->where('id',$id)->first();
       $seller = User::where('id',$vehicles->user_id)->with('userDetails')->first();

        return view('backend.admin.sellerVehicle.sellerVehicleDetail',compact('seller'));
    }
    public function vehicleDetails($id)
    {
       $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')
       ->where('status',0)->where('id',$id)->first();

        return view('backend.admin.sellerVehicle.vehicleDetail',compact('vehicles'));
    }
    public function approveSellerVehicle($id)
    {

       $vehicles = Vehicle::with('user')->with('VehicleImage')->where('id',$id)->first();
// dd($vehicles);
       if($vehicles->hidden_price == null){
        return redirect()->back()->with('warning', 'First Fill Out Vehicle Prices!');

    }
        $vehicles->status = 1;
        $vehicles->save();

        $originalDate = $vehicles->updated_at;
        $winDate = date("d F Y ", strtotime($originalDate));
        $winTime = date("H:i:s a", strtotime($originalDate));


        $data = ([
            'name' => $vehicles->user->name,
            'email' => $vehicles->user->email,
            'date' => $winDate.' at '.$winTime,
            'bidded_price'=>$vehicles->reserve_price,
            'vehicle_registration'=>$vehicles->vehicle_registartion_number,
            'vehicle_name'=>$vehicles->vehicle_name,
            'vehicle_mileage'=>$vehicles->vehicle_mileage,
            'front'=>$vehicles->VehicleImage->front,
            'colour'=>$vehicles->vehicle_color,
            'age'=>$vehicles->vehicle_year,

        ]);
        Mail::to($vehicles->user->email)->send(new sellerVehicleApprovedByAdmin($data));


        return redirect()->route('viewVehicle')->with('success', 'Vehicle Approved Successfully!');
    }
    public function deactivateSellerVehicle($id)
    {

       $vehicles = Vehicle::with('user')->with('VehicleImage')->where('id',$id)->first();

        $vehicles->status = 0;
        $vehicles->save();

        $originalDate = $vehicles->updated_at;
        $winDate = date("d F Y ", strtotime($originalDate));
        $winTime = date("H:i:s a", strtotime($originalDate));


        $data = ([
            'name' => $vehicles->user->name,
            'email' => $vehicles->user->email,
            'date' => $winDate.' at '.$winTime,
            'bidded_price'=>$vehicles->vehicle_price,
            'vehicle_registration'=>$vehicles->vehicle_registartion_number,
            'vehicle_name'=>$vehicles->vehicle_name,
            'vehicle_mileage'=>$vehicles->vehicle_mileage,
            'front'=>$vehicles->VehicleImage->front,
            'colour'=>$vehicles->vehicle_color,
            'age'=>$vehicles->vehicle_year,

        ]);
        Mail::to($vehicles->user->email)->send(new sellerVehicleDeactivateByAdmin($data));

        return redirect()->route('viewVehicle')->with('error', 'Vehicle Deativate Successfully!');
    }
}
