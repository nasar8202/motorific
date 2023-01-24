<?php

namespace App\Http\Controllers\backend\admin;

use Notification;
use App\Models\User;
use App\Models\Dealer;
use App\Models\Vehicle;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Http\Controllers\Controller;
use App\Models\DealerWinningCharges;
use App\Notifications\RejectDealerNotification;
use App\Notifications\ApprovedDealerNotification;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('backend.admin.dashboard');
    }
    public function viewDealers()
    {
        $dealers = User::where('status',0)->where('role_id',3)->orderBy('id', 'DESC')->get();

        return view('backend.admin.dealers.viewDealers',compact('dealers'));
    }
    public function viewDealerDetails($id)
    {
        $dealers = User::where('id',$id)->with('userDetails')->first();

        return view('backend.admin.dealers.viewDealersDetail',compact('dealers'));
    }
    public function approveRequestDocuments(Request $request)
    {
        $request->validate([
            'dealer_identity_card' => 'required',
            'dealer_documents' => 'required',
            

        ]);
        // dd($request->all());
        $status = ['status' => 1];
        $user = User::where('id',$request->id)->first();

        $dealers = User::where('id',$request->id)->update($status);

        $dealer_identity_card = time() . '_' . $request->file('dealer_identity_card')->getClientOriginalName();
        $request->file('dealer_identity_card')->move(public_path() . '/dealers/documents/', $dealer_identity_card);

        $dealer_documents = time() . '_' . $request->file('dealer_documents')->getClientOriginalName();
        $request->file('dealer_documents')->move(public_path() . '/dealers/documents/', $dealer_documents);


        $dealerDetails = UserDetail::where('user_id',$request->id)->first();

        $dealerDetails->dealer_identity_card = $dealer_identity_card ;
        $dealerDetails->dealer_documents =  $dealer_documents;
        $dealerDetails->save();
        $details = [
            'greeting' => 'Hi ' . $user->name,
            'body' => 'Your Request Has Been Approved',
            'thanks' => 'Thank you for using Motorfic.com ',
            'actionText' => 'Login',
            'actionURL' => url('/dealer-login'),
            'order_id' => 101
        ];

        // Notification::send($user->email, new MyFirstNotification($details));
        $user->notify(new ApprovedDealerNotification($details));

       return redirect()->route('dealer.approvedDealersByAdmin')->with('success', 'Dealer approved Successfully!');
    }
    public function approveDealer($id)
    {
        $status = ['status' => 1];
        $user = User::where('id',$id)->first();

        $dealers = User::where('id',$id)->update($status);

        $details = [
            'greeting' => 'Hi ' . $user->name,
            'body' => 'Your Request Has Been Approved',
            'thanks' => 'Thank you for using Motorfic.com ',
            'actionText' => 'Login',
            'actionURL' => url('/register-step-1'),
            'order_id' => 101
        ];

        // Notification::send($user->email, new MyFirstNotification($details));
        $user->notify(new ApprovedDealerNotification($details));

       return redirect()->back()->with('success', 'Dealer approved Successfully!');
        //return view('backend.admin.dealers.viewDealers',compact('dealers'));
    }
    public function blockDealer($id)
    {
        $status = ['status' => 2];
        $user = User::where('id',$id)->first();
        $dealers = User::where('id',$id)->update($status);
        $details = [
            'greeting' => 'Hi ' . $user->name,
            'body' => 'Your Request Has Been Rejected',
            'thanks' => 'Thank you for using Motorfic.com ',
            'actionText' => 'Login',
            'actionURL' => url('/dealer-login'),
            'order_id' => 101
        ];

        // Notification::send($user->email, new MyFirstNotification($details));
        $user->notify(new RejectDealerNotification($details));
        return redirect()->back()->with('error', 'Dealer Blocked Successfully!');

    }
    public function admin()
    {
        return view('backend.admin.dashboard');
    }

    // start approved dealer by admin
    public function approvedDealersByAdmin()
    {
        $approvedDealersByAdmin = User::where('status',1)->where('role_id',3)->orderBy('id', 'DESC')->get();

        return view('backend.admin.dealers.approvedDealersByAdmin',compact('approvedDealersByAdmin'));
    }
    public function dealersPurchase($id)
    {
        
        $purchase = DealerWinningCharges::with('user')->with('Vehicle')->where('user_id',$id)->where('status','1')->get();
        
        return view('backend.admin.dealers.dealersPurchase',compact('purchase'));
    }
    // end approved dealer by admin


     // block approved dealer by admin
     public function blockDealersByAdmin()
     {
         $blockDealersByAdmin = User::where('status',2)->where('role_id',3)->orderBy('id', 'DESC')->get();

         return view('backend.admin.dealers.blockDealersByAdmin',compact('blockDealersByAdmin'));
     }
     // end block dealer by admin

     public function viewSellerVehicle()
     {
        $vehicles = Vehicle::with('vehicleInformation')->with('VehicleImage')->where('status',0)->get();
         return view('backend.admin.sellerVehicle.viewNewVehicle',compact('vehicles'));
     }

}
