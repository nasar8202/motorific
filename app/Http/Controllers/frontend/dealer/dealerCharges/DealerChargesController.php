<?php

namespace App\Http\Controllers\frontend\dealer\dealerCharges;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Vehicle;
use Stripe\PaymentIntent;
use App\Models\BidedVehicle;
use Illuminate\Http\Request;
use App\Models\OrderVehicleRequest;
use App\Http\Controllers\Controller;
use App\Models\DealerWinningCharges;
use Illuminate\Support\Facades\Auth;
use App\Models\VehicleWinningCharges;
use App\Models\CanceledRequestReviews;

use DB;
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
            $charges_payment = $charges_fee->fee;
            $amount =(int)100* $charges_payment;
            
            $payment_intent = PaymentIntent::create([
                'description' => 'Stripe Test Payment',
                'amount' => $amount,
                'currency' => 'GBP',
                'description' => $user_email,
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;
            return view('frontend.dealer.sellerDetails.cardDetail',compact('intent','id','charges_payment'))->with('error','First You Need To Pay');
           
        }
        else{
            $allVehicles = Vehicle::Where('status',1)->where('id',$id)->with('vehicleInformation')->with('VehicleImage')->first();
       $user = User::where('id',$allVehicles->user_id)->first();
      
        return view('frontend.dealer.sellerDetails.sellerDetail',compact('user','allVehicles'));
        }
    }
    public function sellerRequestedDetails($id)
    {
      
        $user_id = Auth::user()->id;
       $charges =  DealerWinningCharges::where('user_id',$user_id)->first();
       $pricing = OrderVehicleRequest::where('vehicle_id',$id)->first();
        //   dd($pricing);
       $charges_fee = VehicleWinningCharges::where('status',1)
       ->where('price_to','>=',$pricing->request_price)
       ->where('price_from','<=',$pricing->request_price)
       ->orderBy('id',"DESC")->first();
       $user_email =Auth::user()->email;
       
        if($charges == null){

            Stripe::setApiKey('sk_test_51L6BbmHh7DA7fp0JBVYZphgLBNOStcNsdKyockhG7OdGCpfL8eBETqsN3XniEjRPGFuc8C272ORCR1YsFcKi2clz00ilFXOFCW');
            
       
            // $amount_all = cleanNumber($pricing->bid_price);
            // $myNumber = (str_replace(',', '', $order_subtotal));
            
            // // dump(gettype($amount_all));
            // // dd(gettype($amount_all));
            $charges_payment = $charges_fee->fee;
            $amount =(int)100* $charges_payment;
            
            $payment_intent = PaymentIntent::create([
                'description' => 'Stripe Test Payment',
                'amount' => $amount,
                'currency' => 'GBP',
                'description' => $user_email,
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;
            return view('frontend.dealer.sellerDetails.cardDetail',compact('intent','id','charges_payment'))->with('error','First You Need To Pay');
           
        }
        else{
            $allVehicles = Vehicle::Where('status',2)->where('id',$id)->with('vehicleInformation')->with('VehicleImage')->first();
      
            $user = User::where('id',$allVehicles->user_id)->first();
            $pricing = OrderVehicleRequest::where('vehicle_id',$id)->first();
            $current = Auth::user()->id;
            
        return view('frontend.dealer.sellerDetails.sellerDetail',compact('user','allVehicles','pricing','current'));
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
     $chargesDetails->vehicle_charges = $request->amount;
     $chargesDetails->stripe_payment = 'completed';
     $chargesDetails->status = 1;
     $chargesDetails->save();
     return redirect()->route('bids.CompletedBiddedVehicle')->with('success','Your Payment Successfully Completed');
  
    }

    public function reviewForCancel(Request $request)
    {
        DB::beginTransaction();
        try{
        $cancel = new CanceledRequestReviews;
        $cancel->user_id = $request->user_id;
        $cancel->vehicle_id = $request->vehicle_id;
        $cancel->order_requests_id = $request->order_id;
        $cancel->reviews = $request->reviews;
        $cancel->status = 1;
        $cancel->save();
        $pricing = OrderVehicleRequest::where('id',$request->order_id)->first();
        $pricing->status = 2;
        $pricing->save();
        }catch(\Exception $e)
        {
        DB::rollback();
       //return $e;
        return Redirect()->back()
            ->with('error',$e->getMessage() )
            ->withInput();
    }
         DB::commit();
         return redirect()->route('CompletedRequestedVehicle')->with('success','Request Cancel Successfully');
       
    }
}
