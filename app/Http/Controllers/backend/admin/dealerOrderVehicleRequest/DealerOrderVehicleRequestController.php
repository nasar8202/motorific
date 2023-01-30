<?php

namespace App\Http\Controllers\backend\admin\dealerOrderVehicleRequest;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DealerVehicle;
use App\Models\OrderVehicleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\DealersOrderVehicleRequest;
use App\Mail\WinnerOrderVehicleRequestPerson;
use App\Mail\approveDealersOrderdWithAdminUpdated;

class DealerOrderVehicleRequestController extends Controller
{
    public function viewDealerOrderVehicle()
    {
        $orders = DealersOrderVehicleRequest::with('user')->with('vehicle')->get();


        return view('backend.admin.DealersorderVehicleRequests.dealersRequestsVehicle',compact('orders'));
    }
     public function orderdDealerDetail($id){

        $dealers = User::where('id',$id)->with('userDetails')->first();


        return view('backend.admin.DealersorderVehicleRequests.viewOrderdDealerDetail',compact('dealers'));

   }
   public function dealersOrderdVehicleDetail($id){

    $vehicles = DealerVehicle::
    with('DealerVehicleHistory')
    ->with('DealerVehicleExterior')
    ->with('DealerVehicleInterior')
    ->where('id',$id)->first();


    return view('backend.admin.DealersorderVehicleRequests.VehicleDetail',compact('vehicles'));

     }

     public function vehicleOwnerDetails($id){

        $seller = User::where('id',$id)->with('userDetails')->first();


        return view('backend.admin.DealersorderVehicleRequests.vehicleOwnerDetail',compact('seller'));

    }
    public function approveDealersOrder($id,$vId){

      $orders = DealersOrderVehicleRequest::where('vehicle_id',$vId)->get();
      foreach($orders as $ord){
        if($ord->status == 1){
        return redirect()->back()->with('warning', 'Vehicle Already Assign To Another User!');
      }

    }
        $orders = DealersOrderVehicleRequest::where('id',$id)->with('user')->with('vehicle')->first();

        $orders->status = 1;
        $orders->save();

        $originalDate = $orders->updated_at;
        $winDate = date("d F Y ", strtotime($originalDate));
        $winTime = date("H:i:s a", strtotime($originalDate));

      $ordered_vehicle = DealerVehicle::where('id',$orders->vehicle->id)->first();
      $ordered_vehicle->status = 2 ;
      $ordered_vehicle->save();

      $data = ([
        'name' => $orders->user->name,
        'email' => $orders->user->email,
        'date' => $winDate.' at '.$winTime,
        'bidded_price'=>$orders->request_price,
        'vehicle_registration'=>$orders->vehicle->vehicle_registartion_number,
        'vehicle_name'=>$orders->vehicle->vehicle_name,
        'vehicle_mileage'=>$orders->vehicle->vehicle_mileage,

    ]);
    Mail::to($orders->user->email)->send(new WinnerOrderVehicleRequestPerson($data));

        return redirect()->back()->with('success', 'Request Approved Successfully!');




    }
    public function approveDealersOrderdWithAdminUpdated(Request $request){
        // dd($request->all());
        $request->validate([
          'updatedPrice' => 'required',


      ]);
        $orders = DealersOrderVehicleRequest::where('id',$request->orderId)->with('user')->with('vehicle')->first();
        $vehicles = DealersOrderVehicleRequest::where('vehicle_id',$orders->vehicle_id)->get();
        foreach($vehicles as $ord){
          if($ord->status == 1){
          return redirect()->back()->with('warning', 'Vehicle Already Assign To Another User!');
        }
    }
            $originalDate = $orders->updated_at;
            $winDate = date("d F Y ", strtotime($originalDate));
            $winTime = date("H:i:s a", strtotime($originalDate));

          $orders->request_price = $request->updatedPrice;
          $orders->status = 1;
          $orders->admin_updated_status = 1;
          $orders->save();
          $ordered_vehicle = DealerVehicle::where('id',$orders->vehicle_id)->first();
          $ordered_vehicle->status = 2 ;
          $ordered_vehicle->save();

          $data = ([
            'name' => $orders->user->name,
            'email' => $orders->user->email,
            'date' => $winDate.' at '.$winTime,
            'bidded_price'=>$orders->request_price,
            'vehicle_registration'=>$orders->vehicle->vehicle_registartion_number,
            'vehicle_name'=>$orders->vehicle->vehicle_name,
            'vehicle_mileage'=>$orders->vehicle->vehicle_mileage,

        ]);
        Mail::to($orders->user->email)->send(new approveDealersOrderdWithAdminUpdated($data));

          return redirect()->back()->with('success', 'Request Approved And Updated Successfully!');


        return redirect()->back()->with('success', 'Order Approved And Updated Successfully!');


    }
    public function unassignDealerReq($id){

      $unassign_bid = DealersOrderVehicleRequest::where('id',$id)->first();

         if($unassign_bid->meeting_status == 'Completed'){
        return redirect()->back()->with('warning', 'This Vehicle Sold Successfully! , You Cant Make Changes ');
      }
      else{
      $unassign_bid->status = 0 ;
      $unassign_bid->save();
      return redirect()->back()->with('success', 'Request Unassign Successfully!');
    }
   }


}
