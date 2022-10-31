<?php

namespace App\Http\Controllers\backend\admin;

use Notification;
use App\Models\User;
use App\Models\Dealer;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
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
        $response = Http::post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry', [
            'registrationNumber' => 'AY69 GOU',
            'id-token'=>'c5TilCBdU22DgHAtlNJiY7EnD5EV2CdM9WU4KPyt',
           
        ]);
        dd($response);
        $dealers = User::where('status',0)->where('role_id',3)->orderBy('id', 'DESC')->get();

        return view('backend.admin.dealers.viewDealers',compact('dealers'));
    }
    public function viewDealerDetails($id)
    {
        $dealers = User::where('id',$id)->with('userDetails')->first();

        return view('backend.admin.dealers.viewDealersDetail',compact('dealers'));
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
            'actionURL' => url('/register-step-1'),
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
        $approvedDealersByAdmin = User::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.dealers.approvedDealersByAdmin',compact('approvedDealersByAdmin'));
    }
    // end approved dealer by admin


     // block approved dealer by admin
     public function blockDealersByAdmin()
     {
         $blockDealersByAdmin = User::where('status',2)->where('role_id',3)->orderBy('id', 'DESC')->get();

         return view('backend.admin.dealers.blockDealersByAdmin',compact('blockDealersByAdmin'));
     }
     // end block dealer by admin

}
