<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dealer;
use App\Models\VehicleFeature;
class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('backend.admin.dashboard');
    }
    public function viewDealers()
    {
        $dealers = Dealer::where('dealer_status',2)->orderBy('id', 'DESC')->get();

        return view('backend.admin.dealers.viewDealers',compact('dealers'));
    }

    public function approveDealer($id)
    {
        $status = ['dealer_status' => 0];
        $dealers = Dealer::where('id',$id)->update($status);
        return redirect()->back()->with('success', 'Dealer approved Successfully!');
        //return view('backend.admin.dealers.viewDealers',compact('dealers'));
    }
    public function blockDealer($id)
    {
        $status = ['dealer_status' => 1];
        $dealers = Dealer::where('id',$id)->update($status);
        return redirect()->back()->with('error', 'Dealer Blocked Successfully!');
    }
    public function admin()
    {
        return view('backend.admin.dashboard');
    }

    // start approved dealer by admin
    public function approvedDealersByAdmin()
    {
        $approvedDealersByAdmin = Dealer::where('dealer_status',0)->orderBy('id', 'DESC')->get();

        return view('backend.admin.dealers.approvedDealersByAdmin',compact('approvedDealersByAdmin'));
    }
    // end approved dealer by admin


     // block approved dealer by admin
     public function blockDealersByAdmin()
     {
         $blockDealersByAdmin = Dealer::where('dealer_status',1)->orderBy('id', 'DESC')->get();

         return view('backend.admin.dealers.blockDealersByAdmin',compact('blockDealersByAdmin'));
     }
     // end block dealer by admin

}
