<?php

namespace App\Http\Controllers\backend\admin\bid;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\BidedVehicle;
use App\Models\VehicleImage;
use Illuminate\Http\Request;
use App\Mail\VehicleSoldPerson;
use App\Mail\WinnerBidedPerson;
use App\Models\vehicleInformation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\approveBidWithAdminUpdated;
use App\Mail\approveBidWithAdminUpdatedForSeller;

class BidVehicleController extends Controller
{

  public function viewBiddedVehicle()

  {

    $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->get();

    return view('backend.admin.bidding.biddedVehicle', compact('vehicles'));
  }

  public function allBiddingVehicle()

  {
    $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->with('allbid')->where('all_auction', null)->where('status','!=',0)->get();
   
    
    return view('backend.admin.bidding.biddedVehicle', compact('vehicles'));
  }
  public function singleBid($id)

  {
    $orders = BidedVehicle::with('vehicle')->with('user')
      ->where('vehicle_id', $id)->get();


    return view('backend.admin.bidding.singlebiddedVehicle', compact('orders'));
  }
  public function bidMeeting(Request $request)
  {

    $orders = BidedVehicle::where('id', $request->id)->with('user')->with('vehicle')->first();
    return $orders;
  }
  public function approveBid($id, $vid)
  {
    try {
      $orders = BidedVehicle::where('vehicle_id', $vid)->get();
      foreach ($orders as $ord) {
        if ($ord->status == 1) {
          return redirect()->back()->with('warning', 'Vehicle Already Assign To Another User!');
        }
      }

      $orders = BidedVehicle::where('id', $id)->with('user')->with('vehicle')->first();
      $orders->status = 1;
      $orders->save();
      $ordered_vehicle = Vehicle::where('id', $orders->vehicle->id)->with('VehicleImage')->first();
      $ordered_vehicle->status = 2;
      $ordered_vehicle->save();

      $originalDate = $orders->updated_at;
      $winDate = date("d F Y ", strtotime($originalDate));
      $winTime = date("H:i:s a", strtotime($originalDate));
      $front = $ordered_vehicle->VehicleImage->front;
      $data = ([
        'name' => $orders->user->name,
        'email' => $orders->user->email,
        'date' => $winDate . ' at ' . $winTime,
        'bidded_price' => $orders->bid_price,
        'vehicle_registration' => $orders->vehicle->vehicle_registartion_number,
        'vehicle_name' => $orders->vehicle->vehicle_name,
        'vehicle_mileage' => $orders->vehicle->vehicle_mileage,
        'front' => $front,
        'colour' => $orders->vehicle->vehicle_color,
        'age' => $orders->vehicle->vehicle_year,
      ]);
      $seller = User::where('id', $ordered_vehicle->user_id)->first();
      Mail::to($seller->email)->send(new VehicleSoldPerson($data));
      Mail::to($orders->user->email)->send(new WinnerBidedPerson($data));
      return redirect()->back()->with('success', 'Bid Approved Successfully!');
    } catch (\Exception $e) {
      //dd($e->getMessage());
      DB::rollback();
      return Redirect()->back()
        ->with('error', $e->getMessage())
        ;
    }

  }

  public function approveBidWithAdminUpdated(Request $request)
  {
    
    $request->validate([
      'updatedPrice' => 'required',
    ]);
    try {


      $orders = BidedVehicle::where('id', $request->orderId)->with('user')->with('vehicle')->first();
      $vehicle = BidedVehicle::where('vehicle_id', $orders->vehicle_id)->get();
      
      foreach ($vehicle as $ord) {
        if ($ord->status == 1) {
          return redirect()->back()->with('warning', 'Vehicle Already Assign To Another User!');
        }
      }
      $orders->bid_price = $request->updatedPrice;
      $orders->status = 1;
      $orders->admin_updated_status = 1;
      $orders->save();
      $ordered_vehicle = Vehicle::where('id', $orders->vehicle_id)->first();
      $ordered_vehicle->status = 2;
      $ordered_vehicle->save();
      $front = $ordered_vehicle->VehicleImage->front;
      $originalDate = $orders->updated_at;
      $winDate = date("d F Y ", strtotime($originalDate));
      $winTime = date("H:i:s a", strtotime($originalDate));
      $data = ([
        'name' => $orders->user->name,
        'email' => $orders->user->email,
        'date' => $winDate . ' at ' . $winTime,
        'bidded_price' => $orders->bid_price,
        'vehicle_registration' => $orders->vehicle->vehicle_registartion_number,
        'vehicle_name' => $orders->vehicle->vehicle_name,
        'vehicle_mileage' => $orders->vehicle->vehicle_mileage,
        'front' => $front,
        'colour' => $orders->vehicle->vehicle_color,
        'age' => $orders->vehicle->vehicle_year,

      ]);
      $user = User::where('id', $ordered_vehicle->user_id)->first();
      Mail::to($user->email)->send(new approveBidWithAdminUpdatedForSeller($data));
      Mail::to($orders->user->email)->send(new approveBidWithAdminUpdated($data));
    } catch (\Exception $e) {
      DB::rollback();
      return Redirect()->back()
        ->with('error', $e->getMessage())
        ->withInput();
    }
    return redirect()->back()->with('success', 'Order Approved And Updated Successfully!');
  }
  public function unassignBid($id)
  {

    $unassign_bid = BidedVehicle::where('id', $id)->first();
    if ($unassign_bid->meeting_status == 'Completed') {
      return redirect()->back()->with('warning', 'This Vehicle Sold Successfully! , You Cant Make Changes ');
    } else {
      $unassign_bid->status = 0;
      $unassign_bid->save();
      return redirect()->back()->with('success', 'Bid Unassign Successfully!');
    }
  }
}
