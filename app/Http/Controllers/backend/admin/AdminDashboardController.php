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
use App\Models\NewsletterSubscriber;
use App\Notifications\RejectDealerNotification;
use App\Notifications\ApprovedDealerApplication;
use App\Notifications\ApprovedDealerNotification;
use App\Jobs\SendEmailValuationNotificationToSeller;


class AdminDashboardController extends Controller
{
    public function valuationNotifications()
    {
        $sellers = User::where(['role_id'=>2,'status'=>1])->orderBy('id', 'DESC')->get();

        return view('backend.admin.valuations.valuationNotifications',compact('sellers'));
    }
    public function saveValuation(Request $request)
    {
        $user = User::where('id',$request->userId)->first();
        // $vehicleValuation = Vehicle::where('id',$request->vehicle_id)->first();
        $vehicleValuation = Vehicle::where('id',$request->vehicle_id)->with('vehicleInformation')->with('VehicleImage')->first();
        if($vehicleValuation->status == 5){
            
            // dd($user->email);
            $data = [
                'email'=>$user->email,
                'name'=>$user->name,
                'vehicle_registration_number'=>$vehicleValuation->vehicle_registartion_number,
                'vehicle_name'=>$vehicleValuation->vehicle_name,
                'valuation_price'=>$request->valuation,
                'halfEntry' =>5
                
            ];
        }else{
           
            $data = [
                'email'=>$user->email,
                'name'=>$user->name,
                'vehicle_registration_number'=>$vehicleValuation->vehicle_registartion_number,
                'vehicle_name'=>$vehicleValuation->vehicle_name,
                'valuation_price'=>$request->valuation,
                'halfEntry' =>0
            ];
        }
        
        $vehicleValuation->reserve_price = $request->valuation;
        $vehicleValuation->save();
        dispatch(new SendEmailValuationNotificationToSeller($data));
        return response()->json(['success' => true]);
    }
    public function getVehicles($userId)
    {
        $user = User::where(['id'=> $userId,'status'=>1])->first();
        
        if ($user) {
            $vehicles = Vehicle::where('user_id', $user->id)->get();
            return response()->json($vehicles);
        } else {
            return response()->json([]);
        }
    }
    public function sendValuationsNotificationsToSellers(Request $request)
    {
       
        try {
                // $user_id = $request->users_id;
                
                // $data['title'] = $request->title;
                // $data['description'] = $request->description;
            
                // $user = User::where('id',$user_id)->first();
                //echo  $user['email'];
                // dd($user);
                // $data['email'] = $user['email'];
                //dd($details['description']);
               // SendEmailToSubscriber::dispatch($details);
               // dispatch(new SendEmailValuationNotificationToSeller($data));
                //Mail::to($user['email'])->send(new MailToSubscriberUsers($data));
           // Mail::to($user['email'])->send(new \App\Mail\SendEmailToSubscribers($details));
           
            
            return redirect()->route('valuationNotifications')->with('success', 'Notification Send Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
        
    }

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
        $dealerDetails = UserDetail::where('user_id',$request->id)->first();
        if( $dealerDetails->dealer_documents== null && $dealerDetails->dealer_identity_card == null ){
            $request->validate([
                'dealer_identity_card' => 'required|image',
                'dealer_documents' => 'required|image',
                
            ]);
            
            $dealer_identity_card = time() . '_' . $request->file('dealer_identity_card')->getClientOriginalName();
            $request->file('dealer_identity_card')->move(public_path() . '/dealers/documents/', $dealer_identity_card);
            $dealerDetails->dealer_identity_card = $dealer_identity_card ;
            $dealer_documents = time() . '_' . $request->file('dealer_documents')->getClientOriginalName();
            $request->file('dealer_documents')->move(public_path() . '/dealers/documents/', $dealer_documents);

            $dealerDetails->dealer_identity_card = $dealer_identity_card ;
            $dealerDetails->dealer_documents =  $dealer_documents;
            $dealerDetails->save();   
            $user = User::where('id',$request->id)->first();
            $user->status = 1;
            $user->save();
            
            $details = [
                'greeting' => 'Hi ' . $user->name,
                'body' => "The application you submitted for becoming a Motorific approved dealer has been approved 
            Our daily stock availability can now be viewed through your dealer portal
            Your slow moving stock can also be advertised in the portal for the dealer community to purchase. \n",
            'body2' => "Our daily auction timings are 8AM to 3PM . \n",
            'body3' => "With 100s of new cars listed daily on our website, we provide a large selection of high-quality private sale and trade-in vehicles. \n",
            'body4' => "Each vehicle is fully profiled by our team, including photos, specs, condition, and service history. We vet sellers and set the price expectations to ensure a hassle-free transaction. \n",
            'thanks' => "Welcome to the motorific family . \n",
            'actionText' => 'Login',
                'actionURL' =>   url('/dealer-login?email=' . urlencode($user->email)),
                'order_id' => 101
            ];
            
            // Notification::send($user->email, new MyFirstNotification($details));
            $user->notify(new ApprovedDealerApplication($details));
            
            return redirect()->route('dealer.approvedDealersByAdmin')->with('success', 'Dealer approved Successfully!');
        }
        else if($dealerDetails->dealer_identity_card == null ){
            $request->validate([
                'dealer_identity_card' => 'required|image',
                
            ]);
       
            $dealer_identity_card = time() . '_' . $request->file('dealer_identity_card')->getClientOriginalName();
            $request->file('dealer_identity_card')->move(public_path() . '/dealers/documents/', $dealer_identity_card);
            $dealerDetails->dealer_identity_card = $dealer_identity_card ;
            $dealerDetails->save();
            $user = User::where('id',$request->id)->first();
            $user->status = 1;
            $user->save();
            
            $details = [
                'greeting' => 'Hi ' . $user->name,
                'body' => "The application you submitted for becoming a Motorific approved dealer has been approved 
                Our daily stock availability can now be viewed through your dealer portal
                Your slow moving stock can also be advertised in the portal for the dealer community to purchase. \n",
                'body2' => "Our daily auction timings are 8AM to 3PM . \n",
                'body3' => "With 100s of new cars listed daily on our website, we provide a large selection of high-quality private sale and trade-in vehicles. \n",
                'body4' => "Each vehicle is fully profiled by our team, including photos, specs, condition, and service history. We vet sellers and set the price expectations to ensure a hassle-free transaction. \n",
                'thanks' => "Welcome to the motorific family . \n",
                'actionText' => 'Login',
                'actionURL' => url('/dealer-login?email=' . urlencode($user->email)),
                'order_id' => 101
            ];
    
            // Notification::send($user->email, new MyFirstNotification($details));
            $user->notify(new ApprovedDealerApplication($details));
    
           return redirect()->route('dealer.approvedDealersByAdmin')->with('success', 'Dealer approved Successfully!');
        }
           elseif( $dealerDetails->dealer_documents== null){
                $request->validate([
                    
                    'dealer_documents' => 'required|image',
                ]);
            $dealer_documents = time() . '_' . $request->file('dealer_documents')->getClientOriginalName();
            $request->file('dealer_documents')->move(public_path() . '/dealers/documents/', $dealer_documents);

            
            $dealerDetails->dealer_documents =  $dealer_documents;
            $dealerDetails->save();
            $user = User::where('id',$request->id)->first();
            $user->status = 1;
            $user->save();
            
            $details = [
                'greeting' => 'Hi ' . $user->name,
                'body' => "The application you submitted for becoming a Motorific approved dealer has been approved 
                Our daily stock availability can now be viewed through your dealer portal
                Your slow moving stock can also be advertised in the portal for the dealer community to purchase. \n",
                'body2' => "Our daily auction timings are 8AM to 3PM . \n",
                'body3' => "With 100s of new cars listed daily on our website, we provide a large selection of high-quality private sale and trade-in vehicles. \n",
                'body4' => "Each vehicle is fully profiled by our team, including photos, specs, condition, and service history. We vet sellers and set the price expectations to ensure a hassle-free transaction. \n",
                'thanks' => "Welcome to the motorific family . \n",
                 'actionText' => 'Login',
                'actionURL' => url('/dealer-login?email=' . urlencode($user->email)),
                'order_id' => 101
            ];
    
            // Notification::send($user->email, new MyFirstNotification($details));
            $user->notify(new ApprovedDealerApplication($details));
    
           return redirect()->route('dealer.approvedDealersByAdmin')->with('success', 'Dealer approved Successfully!');
            
        }
         
       else{
            if(!empty($request->file('dealer_identity_card'))){
                $dealer_identity_card = time() . '_' . $request->file('dealer_identity_card')->getClientOriginalName();
                $request->file('dealer_identity_card')->move(public_path() . '/dealers/documents/', $dealer_identity_card);
                $dealerDetails->dealer_identity_card = $dealer_identity_card ;
                $dealerDetails->save();   
            }
            if(!empty($request->file('dealer_documents'))){
                $dealer_documents = time() . '_' . $request->file('dealer_documents')->getClientOriginalName();
                $request->file('dealer_documents')->move(public_path() . '/dealers/documents/', $dealer_documents);
    
                // $dealerDetails->dealer_documents = $dealer_documents ;
                $dealerDetails->dealer_documents =  $dealer_documents;
                $dealerDetails->save();   
            }
            
            
            

        $user = User::where('id',$request->id)->first();
        $user->status = 1;
        $user->save();
        
        $details = [
            'greeting' => 'Hi ' . $user->name,
            'body' => "The application you submitted for becoming a Motorific approved dealer has been approved 
            Our daily stock availability can now be viewed through your dealer portal
            Your slow moving stock can also be advertised in the portal for the dealer community to purchase. \n",
            'body2' => "Our daily auction timings are 8AM to 3PM . \n",
            'body3' => "With 100s of new cars listed daily on our website, we provide a large selection of high-quality private sale and trade-in vehicles. \n",
            'body4' => "Each vehicle is fully profiled by our team, including photos, specs, condition, and service history. We vet sellers and set the price expectations to ensure a hassle-free transaction. \n",
            'thanks' => "Welcome to the motorific family . \n",
            'actionText' => 'Login',
            'actionURL' => url('/dealer-login?email=' . urlencode($user->email)),
            'order_id' => 101
        ];

        // Notification::send($user->email, new MyFirstNotification($details));
        $user->notify(new ApprovedDealerApplication($details));

       return redirect()->route('dealer.approvedDealersByAdmin')->with('success', 'Dealer approved Successfully!');
       }
    }
    public function approveDealer($id)
    {
        $status = ['status' => 1];
        $user = User::where('id',$id)->first();

        $dealers = User::where('id',$id)->update($status);

        $details = [
            'greeting' => 'Hi ' . $user->name,
            'body' => "The application you submitted for becoming a Motorific approved dealer has been approved 
            Our daily stock availability can now be viewed through your dealer portal
            Your slow moving stock can also be advertised in the portal for the dealer community to purchase. \n",
            'body2' => "Our daily auction timings are 8AM to 3PM . \n",
            'body3' => "With 100s of new cars listed daily on our website, we provide a large selection of high-quality private sale and trade-in vehicles. \n",
            'body4' => "Each vehicle is fully profiled by our team, including photos, specs, condition, and service history. We vet sellers and set the price expectations to ensure a hassle-free transaction. \n",
            'thanks' => "Welcome to the motorific family . \n",
            'actionText' => 'Login',
            'actionURL' => url('/register-step-1'),
            'order_id' => 101
        ];

        // Notification::send($user->email, new MyFirstNotification($details));
        $user->notify(new ApprovedDealerApplication($details));

       return redirect()->back()->with('success', 'Dealer approved Successfully!');
        //return view('backend.admin.dealers.viewDealers',compact('dealers'));
    }
    public function blockDealer($id)
    {
        $user = User::where('id',$id)->first();
        $user->status = 2;
        $user->save();
        $details = [
            'greeting' => 'Hi ' . $user->name,
            'body' => 'Your Are Block By Admin From Motorific. Contact Admin For More Dealers',
            'thanks' => 'Thank you for using motorific.co.uk ',
            'actionText' => 'Login',
            'actionURL' => url('/dealer-login?email=' . urlencode($user->email)),
            'order_id' => 101
        ];

        // Notification::send($user->email, new MyFirstNotification($details));
        $user->notify(new RejectDealerNotification($details));
        return redirect()->back()->with('error', 'Dealer Blocked Successfully!');

    }
    public function admin()
    {
        $totalSellerCounts = User::where('role_id',2)->count();
        $totalDealerCounts = User::where('role_id',3)->count();
        $totalAgentCounts = User::where('role_id',4)->count();
        $totalSubscribers = NewsletterSubscriber::where('status',1)->count();
        //dd($totalAgentCounts,"total agents",$totalDealerCounts,"del cou",$totalSellerCounts,"sel to");
        return view('backend.admin.dashboard',compact('totalSellerCounts','totalDealerCounts','totalAgentCounts','totalSubscribers'));
    }

    // start approved dealer by admin
    public function approvedDealersByAdmin()
    {
        $approvedDealersByAdmin = User::where('status',1)->where('role_id',3)->with('userDetails')->orderBy('id', 'DESC')->get();

        return view('backend.admin.dealers.approvedDealersByAdmin',compact('approvedDealersByAdmin'));
    }
    public function dealersPurchase($id)
    {

        $purchase = DealerWinningCharges::with('user')->with('Vehicle')->where('user_id',$id)->where('status','1')->get();
        return view('backend.admin.dealers.dealersPurchase',compact('purchase'));
    }
    public function dealersDetail($id)
    {

        $dealers = User::where('id',$id)->where('status',1)->where('role_id',3)->with('userDetails')->first();
        return view('backend.admin.dealers.showDealerDetails',compact('dealers'));
    
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
