<?php

namespace App\Http\Controllers\frontend\seller;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\BidedVehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SellerDashboardController extends Controller
{
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
    public function bidsOnVehicles($id)
    {
       $bids = BidedVehicle::join('vehicles', 'vehicles.id', '=', 'bided_vehicles.vehicle_id')

       ->join('users', 'users.id', '=', 'bided_vehicles.user_id')->where('vehicle_id',$id)->orderBy('bid_price','DESC')->get();
       
        return view('frontend.seller.bidsOnMyVehicles',compact('bids'));

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
            'phone_number' => 'required|max:256|min:14',

        ]);
        // dd($request->all());
        $user = User::find($id);
        $user->name = $request->name;
        $user->post_code = $request->post_code;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully!');
        

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
}
