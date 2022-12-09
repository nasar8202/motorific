<?php

namespace App\Http\Controllers\frontend\dealer\dealerCharges;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Vehicle;
use Stripe\PaymentIntent;
use App\Models\BidedVehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DealerWinningCharges;
use Illuminate\Support\Facades\Auth;
use App\Models\VehicleWinningCharges;

class DealerChargesController extends Controller
{
    public function sellerDetails($id)
    {
      
        $user_id = Auth::user()->id;
       $charges =  DealerWinningCharges::where('user_id',$user_id)->first();
       $pricing = BidedVehicle::where('vehicle_id',$id)->first();
    //    dd($pricing->bid_price);
       $charges_fee = VehicleWinningCharges::where('status',1)
       ->where('price_to','>=',$pricing->bid_price)
       ->where('price_from','<=',$pricing->bid_price)
       ->orderBy('id',"DESC")->first();
       
       $user_email =Auth::user()->email;
     
        if($charges == null){

            Stripe::setApiKey('sk_test_51L6BbmHh7DA7fp0JBVYZphgLBNOStcNsdKyockhG7OdGCpfL8eBETqsN3XniEjRPGFuc8C272ORCR1YsFcKi2clz00ilFXOFCW');
            
       
            // $amount_all = cleanNumber($pricing->bid_price);
            // $myNumber = (str_replace(',', '', $order_subtotal));
            
            // // dump(gettype($amount_all));
            // // dd(gettype($amount_all));
            $amount =(int)100* $charges_fee->fee;
            
            $payment_intent = PaymentIntent::create([
                'description' => 'Stripe Test Payment',
                'amount' => $amount,
                'currency' => 'GBP',
                'description' => $user_email,
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;
            return view('frontend.dealer.sellerDetails.cardDetail',compact('intent','id'))->with('error','First You Need To Pay');
           
        }
        else{
            $allVehicles = Vehicle::Where('status',1)->where('id',$id)->with('vehicleInformation')->with('VehicleImage')->first();
       $user = User::where('id',$allVehicles->user_id)->first();
      
        return view('frontend.dealer.sellerDetails.sellerDetail',compact('user','allVehicles'));
        }
    }

    public function cardDetails()
    {
      
        return view('frontend.dealer.sellerDetails.cardDetail');
    }
    public function stripePayment(Request $request)
    {
      
     $chargesDetails = new DealerWinningCharges;
     $user_id = Auth::user()->id;
     $chargesDetails->user_id = $user_id;
     $chargesDetails->vehicle_id = $request->vehicleId;
     $chargesDetails->stripe_payment = 'completed';
     $chargesDetails->status = 1;
     $chargesDetails->save();
     return redirect()->route('bids.CompletedBiddedVehicle')->with('success','Your Payment Successfully Completed');
  
    }

    public function cardDetailsCreate(Request $request)
    {
    }
}
