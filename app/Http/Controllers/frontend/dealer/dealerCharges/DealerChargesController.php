<?php

namespace App\Http\Controllers\frontend\dealer\dealerCharges;


use Stripe\Token;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Vehicle;
use Stripe\PaymentIntent;
use App\Models\CardDetails;
use App\Models\BidedVehicle;
use App\Models\CancelImages;
use Illuminate\Http\Request;

use App\Models\DealerVehicle;
use App\Mail\BiddedVehicleDealer;
use App\Mail\BiddedVehicleSeller;
use Illuminate\Support\Facades\DB;
use App\Models\OrderVehicleRequest;
use App\Http\Controllers\Controller;
use App\Mail\YourVehicleHasBeenSold;
use App\Models\DealerWinningCharges;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\YourVehicleHasBeenSolds;
use App\Models\VehicleWinningCharges;
use App\Models\CanceledRequestReviews;
use Illuminate\Support\Facades\Session;
use App\Models\DealersOrderVehicleRequest;

class DealerChargesController extends Controller
{
    public function stripePost(Request $request)
    {
        dd($request->all());
        Stripe::setApiKey(env('STRIPE_SECRET'));

        Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function sellerDetails($bided, $id, $slug)
    {
        // dd($bided,$id,$slug);
        try {
        $bided = $bided;
        $role = $slug;
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $charges =  DealerWinningCharges::where('user_id', $user_id)->where('vehicle_id', $id)->first();

        $pricing = BidedVehicle::where('vehicle_id', $id)->where('user_id', $user_id)->first();
        
        if($pricing->bid_price > 99999){
            $pricing->bid_price = 99999;
            $charges_fee = VehicleWinningCharges::where('status', 1)
            ->where('price_to', '>=', $pricing->bid_price)
            ->where('price_from', '<=', $pricing->bid_price)
            ->orderBy('id', "DESC")->first();
           // dd("if",$pricing->bid_price);
            
        }else{
           // dd("else",$pricing->bid_price);
            $charges_fee = VehicleWinningCharges::where('status', 1)
            ->where('price_to', '>=', $pricing->bid_price)
            ->where('price_from', '<=', $pricing->bid_price)
            ->orderBy('id', "DESC")->first();
        }

       

            
        if ($charges == null) {
            $dealerCard =  CardDetails::where('user_id',$user_id)->first();
            $charges_payment = $charges_fee->fee;
            if($dealerCard == null){
                    return view('frontend.dealer.sellerDetails.cardDetail', compact('id', 'charges_payment', 'user_id', 'role', 'bided'))->with('error', 'First You Need To Pay');
        }else{
           
  Stripe::setApiKey("sk_test_51L6BbmHh7DA7fp0JBVYZphgLBNOStcNsdKyockhG7OdGCpfL8eBETqsN3XniEjRPGFuc8C272ORCR1YsFcKi2clz00ilFXOFCW");

            $result = Token::create([
            
                'card' => [
                    'number' => $dealerCard->card_number,
                    'exp_month' => $dealerCard->expiration_month,
                    'exp_year' => $dealerCard->expiration_year,
                    'cvc' => $dealerCard->cvc,
                    ],
                    ]);
            

            $token = $result['id'];
            
            $user_email = Auth::user()->email;
            $amount = (int)100 * $charges_payment;
            
            Stripe::setApiKey(env('STRIPE_SECRET'));
            Charge::create([
                "amount" => $amount,
                "currency" => "gbp",
                "source" => $token,
                "description" => "Vehicle Has Been Sold To $user_email ",
              
            ]);
            
            $allVehicles = Vehicle::Where('status', 2)->where('id', $id)->with('vehicleInformation')->with('VehicleImage')->first();
            
            $chargesDetails = new DealerWinningCharges;
            $user_id = Auth::user()->id;
            $chargesDetails->user_id = $user_id;
            $chargesDetails->vehicle_id = $allVehicles->id;
            
            $chargesDetails->vehicle_charges = $charges_payment;
            $chargesDetails->status = 1;
            $chargesDetails->save();
            
            $user = User::where('id', $allVehicles->user_id)->first();
            $current = Auth::user()->id;
            $pricing = BidedVehicle::where('vehicle_id', $id)->where('user_id', $current)->first();
            Session::flash('success', 'Your '.$charges_payment.' Payment Has Been Charged From Your Card'); 
            return view('frontend.dealer.sellerDetails.sellerDetail', compact('user', 'role', 'allVehicles', 'current', 'pricing', 'bided'));
       
        }
        } else {
            $allVehicles = Vehicle::Where('status', 2)->where('id', $id)->with('vehicleInformation')->with('VehicleImage')->first();
            
            $user = User::where('id', $allVehicles->user_id)->first();
            $current = Auth::user()->id;
            $pricing = BidedVehicle::where('vehicle_id', $id)->where('user_id', $current)->first();

            return view('frontend.dealer.sellerDetails.sellerDetail', compact('user', 'role', 'allVehicles', 'current', 'pricing', 'bided'));
        }
    } catch (\Exception $e) {
        return $e;
        return Redirect()->back()
            ->with('error', $e->getMessage())
            ->withInput();
    }
    }
    public function sellerRequestedDetails($slug, $id)
    {
        try {
            $role = $slug;

            $user_id = Auth::user()->id;
            $charges =  DealerWinningCharges::where('user_id', $user_id)->where('vehicle_id', $id)->first();
            $pricing = OrderVehicleRequest::where('vehicle_id', $id)->where('user_id', $user_id)->first();

            $charges_fee = VehicleWinningCharges::where('status', 1)
                ->where('price_to', '>=', $pricing->request_price)
                ->where('price_from', '<=', $pricing->request_price)
                ->orderBy('id', "DESC")->first();

                if ($charges == null) {
                    $dealerCard =  CardDetails::where('user_id',$user_id)->first();
                    $charges_payment = $charges_fee->fee;
                    if($dealerCard == null){
                    return view('frontend.dealer.sellerDetails.cardDetail', compact('id', 'charges_payment', 'user_id', 'role'))->with('error', 'First You Need To Pay');
                }else{
        
                    Stripe::setApiKey("sk_test_51L6BbmHh7DA7fp0JBVYZphgLBNOStcNsdKyockhG7OdGCpfL8eBETqsN3XniEjRPGFuc8C272ORCR1YsFcKi2clz00ilFXOFCW");
        
                    $result = Token::create([
                    
                        'card' => [
                            'number' => $dealerCard->card_number,
                            'exp_month' => $dealerCard->expiration_month,
                            'exp_year' => $dealerCard->expiration_year,
                            'cvc' => $dealerCard->cvc,
                            ],
                            ]);
                    
        
                    $token = $result['id'];
                    
                    $user_email = Auth::user()->email;
                    $amount = (int)100 * $charges_payment;
                    
                    Stripe::setApiKey(env('STRIPE_SECRET'));
                    Charge::create([
                        "amount" => $amount,
                        "currency" => "gbp",
                        "source" => $token,
                        "description" => "Vehicle Has Been Sold To $user_email ",
                      
                    ]);
                    
                    $allVehicles = Vehicle::Where('status', 2)->where('id', $id)->with('vehicleInformation')->with('VehicleImage')->first();
                    $chargesDetails = new DealerWinningCharges;
                    $user_id = Auth::user()->id;
                    $chargesDetails->user_id = $user_id;
                    $chargesDetails->vehicle_id = $allVehicles->id;
                    
                    $chargesDetails->vehicle_charges = $charges_payment;
                    $chargesDetails->status = 1;
                    $chargesDetails->save();
                    
                    $user = User::where('id', $allVehicles->user_id)->first();
                    $current = Auth::user()->id;
                    $pricing = BidedVehicle::where('vehicle_id', $id)->where('user_id', $current)->first();
                    // Session::flash('success', 'Your '.$charges_payment.' Payment Has Been Charged From Your Card'); 
                    // return view('frontend.dealer.sellerDetails.sellerDetail', compact('user', 'role', 'allVehicles', 'current', 'pricing'));
                    return redirect()->back()->with('success', 'Your '.$charges_payment.' Payment Has Been Charged From Your Card');
                }
            } else {
                $allVehicles = Vehicle::Where('status', 2)->where('id', $id)->with('vehicleInformation')->with('VehicleImage')->first();

                $user = User::where('id', $allVehicles->user_id)->first();
                $current = Auth::user()->id;
                $pricing = OrderVehicleRequest::where('vehicle_id', $id)->where('user_id', $current)->first();


                return view('frontend.dealer.sellerDetails.sellerDetail', compact('user', 'allVehicles', 'role', 'pricing', 'current'));
            }
        } catch (\Exception $e) {
            //return $e;
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

    public function cardDetails()
    {

        return view('frontend.dealer.sellerDetails.cardDetail');
    }
    public function stripePayment(Request $request)
    {
        try {
            $user_email = Auth::user()->email;
            $amount = (int)100 * $request->amount;
            Stripe::setApiKey("sk_test_51L6BbmHh7DA7fp0JBVYZphgLBNOStcNsdKyockhG7OdGCpfL8eBETqsN3XniEjRPGFuc8C272ORCR1YsFcKi2clz00ilFXOFCW");

            Charge::create([
                "amount" => $amount,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => $user_email
            ]);

            $chargesDetails = new DealerWinningCharges;
            $user_id = Auth::user()->id;
            $chargesDetails->user_id = $user_id;
            if ($request->role == 'dealer') {
                $chargesDetails->dealer_vehicle_id = $request->vehicleId;
            } else {
                $chargesDetails->vehicle_id = $request->vehicleId;
            }
            $chargesDetails->vehicle_charges = $amount;
            $chargesDetails->status = 1;
            $chargesDetails->save();
            $cardDetails = new CardDetails;
            $cardDetails->user_id = $user_id;
            $cardDetails->name_on_card = $request->name_on_card;
            $cardDetails->card_number = $request->card_number;
            $cardDetails->cvc = $request->cvc;
            $cardDetails->expiration_month = $request->expiration_month;
            $cardDetails->expiration_year = $request->expiration_year;
            $cardDetails->status = 1;
            $cardDetails->save();
            return redirect()->route('bids.ActiveBiddedVehicle')->with('success', 'Your Payment Successfully Completed');
        } catch (\Exception $e) {
            //return $e;
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

    public function reviewForCancel(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'reviews' => 'required|max:256|min:10',
            'cancelImages' => 'required',
        ]);
        DB::beginTransaction();
        try {
            if (count($request->cancelImages) <= 5) {

                if ($request->role == 'dealer') {
                    $cancel = new CanceledRequestReviews;
                    $cancel->user_id = $request->user_id;
                    $cancel->dealer_vehicle_id = $request->vehicle_id;
                    $cancel->order_requests_id = $request->order_id;
                    $cancel->reviews = $request->reviews;
                    $cancel->status = 1;
                    $cancel->save();
                    $pricing = DealersOrderVehicleRequest::where('id', $request->order_id)->first();
                    $pricing->status = 2;
                    $pricing->save();
                } elseif ($request->role == 'seller' && $request->bided == 'bided') {
                    $cancel = new CanceledRequestReviews;
                    $cancel->user_id = $request->user_id;
                    $cancel->vehicle_id = $request->vehicle_id;
                    $cancel->biding_id = $request->order_id;
                    $cancel->reviews = $request->reviews;
                    $cancel->status = 1;
                    $cancel->save();
                    $pricing = BidedVehicle::where('id', $request->order_id)->first();
                    $pricing->status = 2;
                    $pricing->save();
                } else {
                    $cancel = new CanceledRequestReviews;
                    $cancel->user_id = $request->user_id;
                    $cancel->vehicle_id = $request->vehicle_id;
                    $cancel->order_requests_id = $request->order_id;
                    $cancel->reviews = $request->reviews;
                    $cancel->status = 1;
                    $cancel->save();
                    $pricing = OrderVehicleRequest::where('id', $request->order_id)->first();
                    $pricing->status = 2;
                    $pricing->save();
                }
                foreach ($request->cancelImages as $images) {

                    $image_1 = time() . '_' . $images->getClientOriginalName();
                    $images->move(public_path() . '/uploads/cancelVehicle/', $image_1);


                    $cancel_image = new CancelImages;
                    $cancel_image->cancel_review_id = $cancel->id;
                    $cancel_image->image = $image_1;
                    $cancel_image->save();
                }
            } else {
                return back()->with('error', 'images may not be greater than 5');
            }
        } catch (\Exception $e) {
            DB::rollback();
            //return $e;
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
        DB::commit();
        return redirect()->route('CompletedRequestedVehicle')->with('success', 'Request Cancel Successfully');
    }
    public function scheduleMeeting(Request $request)
    {
        
        
        //dd($meeting = BidedVehicle::where('id', $request->order_id)->first());
        if ($request->bided == 'bided') {
            $dealer = BidedVehicle::where('id', $request->order_id)->with('user')->with('vehicle')->first();
            $vehicle  = Vehicle::where('id', $dealer->vehicle->id)->with('VehicleImage')->first();
            $seller = User::where('id', $vehicle->user_id)->first();
            $dealer->meeting_date_time = $request->date_time;
            $dealer->save();
            // dd("dss",$dealer,$seller);
            // $user = User::where('id', $meeting->user_id)->first();
            $originalDate = $dealer->created_at;
            $winDate = date("d F Y ", strtotime($originalDate));
            $winTime = date("H:i:s a", strtotime($originalDate));
            $front = $vehicle->VehicleImage->front;
            $data = ([
              'name' => $dealer->user->name,
              'email' => $dealer->user->email,
              'date' => $winDate . ' at ' . $winTime,
              'bidded_price' => $dealer->bid_price,
              'vehicle_registration' => $vehicle->vehicle_registartion_number,
              'vehicle_name' => $vehicle->vehicle_name,
              'vehicle_mileage' => $vehicle->vehicle_mileage,
              'front' => $front,
              'colour' => $vehicle->vehicle_color,
              'age' => $vehicle->vehicle_year,
              'meeting_schedule' => $request->date_time
            ]);
            

            $data1 = ([
                'name' => $seller->name,
                'email' => $seller->email,
                'date' => $winDate . ' at ' . $winTime,
                'bidded_price' => $dealer->bid_price,
                'vehicle_registration' => $vehicle->vehicle_registartion_number,
                'vehicle_name' => $vehicle->vehicle_name,
                'vehicle_mileage' => $vehicle->vehicle_mileage,
                'front' => $front,
                'colour' => $vehicle->vehicle_color,
                'age' => $vehicle->vehicle_year,
                'meeting_schedule' => $request->date_time
              ]);
            
            Mail::to($seller->email)->send(new BiddedVehicleSeller($data));
            Mail::to($dealer->user->email)->send(new BiddedVehicleDealer($data1));

            return redirect()->route('CompletedRequestedVehicle')->with('success', 'Meeting Has Been Schedule');
        } else {
            $meeting = OrderVehicleRequest::where('id', $request->order_id)->with('user')->with('vehicle')->first();
            $meeting->meeting_date_time = $request->date_time;
            
            $meeting->save();
            
            $vehicle  = Vehicle::where('id', $meeting->vehicle->id)->with('VehicleImage')->first();
            
            $seller = User::where('id', $vehicle->user_id)->first();
            $originalDate = $meeting->created_at;
            $winDate = date("d F Y ", strtotime($originalDate));
            $winTime = date("H:i:s a", strtotime($originalDate));
            $front = $vehicle->VehicleImage->front;
            $data = ([
              'name' => $meeting->user->name,
              'email' => $meeting->user->email,
              'date' => $winDate . ' at ' . $winTime,
              'bidded_price' => $meeting->request_price,
              'vehicle_registration' => $vehicle->vehicle_registartion_number,
              'vehicle_name' => $vehicle->vehicle_name,
              'vehicle_mileage' => $vehicle->vehicle_mileage,
              'front' => $front,
              'colour' => $vehicle->vehicle_color,
              'age' => $vehicle->vehicle_year,
              'meeting_schedule' => $request->date_time
            ]);

            $data1 = ([
                'name' => $meeting->name,
                'email' => $meeting->email,
                'date' => $winDate . ' at ' . $winTime,
                'bidded_price' => $meeting->request_price,
                'vehicle_registration' => $vehicle->vehicle_registartion_number,
                'vehicle_name' => $vehicle->vehicle_name,
                'vehicle_mileage' => $vehicle->vehicle_mileage,
                'front' => $front,
                'colour' => $vehicle->vehicle_color,
                'age' => $vehicle->vehicle_year,
                'meeting_schedule' => $request->date_time
              ]);
            
            Mail::to($seller->email)->send(new BiddedVehicleSeller($data));
            Mail::to($meeting->user->email)->send(new BiddedVehicleDealer($data1));
            return redirect()->route('CompletedRequestedVehicle')->with('success', 'Meeting Has Been Schedule');
        }
    }
    public function ownerScheduleMeeting(Request $request)
    {
        $meeting = DealersOrderVehicleRequest::where('id', $request->order_id)->with('user')->with('vehicle')->first();
        $meeting->meeting_date_time = $request->date_time;
        $meeting->save();

        $vehicle  = Vehicle::where('id', $meeting->vehicle->id)->with('VehicleImage')->first();
            $seller = User::where('id', $vehicle->user_id)->first();
            $originalDate = $meeting->created_at;
            $winDate = date("d F Y ", strtotime($originalDate));
            $winTime = date("H:i:s a", strtotime($originalDate));
            $front = $vehicle->VehicleImage->front;
            $data = ([
              'name' => $meeting->user->name,
              'email' => $meeting->user->email,
              'date' => $winDate . ' at ' . $winTime,
              'bidded_price' => $vehicle->request_price,
              'vehicle_registration' => $vehicle->vehicle_registartion_number,
              'vehicle_name' => $vehicle->vehicle_name,
              'vehicle_mileage' => $vehicle->vehicle_mileage,
              'front' => $front,
              'colour' => $vehicle->vehicle_color,
              'age' => $vehicle->vehicle_year,
              'meeting_schedule' => $request->date_time
            ]);
            
            Mail::to($seller->email)->send(new BiddedVehicleSeller($data));
            Mail::to($meeting->user->email)->send(new BiddedVehicleDealer($data));

        return redirect()->route('CompletedRequestedVehicle')->with('success', 'Meeting Has Been Schedule');
    }
    public function ownerDealerRequestedDetails($slug, $id)
    {
        try {
            $role = $slug;

            $user_id = Auth::user()->id;

            $charges =  DealerWinningCharges::where('user_id', $user_id)->where('dealer_vehicle_id', $id)->first();

            $pricing = DealersOrderVehicleRequest::where('vehicle_id', $id)->where('user_id', $user_id)->first();
            //   dd($pricing);
            $charges_fee = VehicleWinningCharges::where('status', 1)
                ->where('price_to', '>=', $pricing->request_price)
                ->where('price_from', '<=', $pricing->request_price)
                ->orderBy('id', "DESC")->first();

                if ($charges == null) {
                    $dealerCard =  CardDetails::where('user_id',$user_id)->first();
                    $charges_payment = $charges_fee->fee;
                    if($dealerCard == null){
                    return view('frontend.dealer.sellerDetails.cardDetail', compact('id', 'charges_payment', 'user_id', 'role', 'bided'))->with('error', 'First You Need To Pay');
                }else{
        
                    Stripe::setApiKey("sk_test_51L6BbmHh7DA7fp0JBVYZphgLBNOStcNsdKyockhG7OdGCpfL8eBETqsN3XniEjRPGFuc8C272ORCR1YsFcKi2clz00ilFXOFCW");
        
                    $result = Token::create([
                    
                        'card' => [
                            'number' => $dealerCard->card_number,
                            'exp_month' => $dealerCard->expiration_month,
                            'exp_year' => $dealerCard->expiration_year,
                            'cvc' => $dealerCard->cvc,
                            ],
                            ]);
                    
        
                    $token = $result['id'];
                    
                    $user_email = Auth::user()->email;
                    $amount = (int)100 * $charges_payment;
                    
                    Stripe::setApiKey(env('STRIPE_SECRET'));
                    Charge::create([
                        "amount" => $amount,
                        "currency" => "gbp",
                        "source" => $token,
                        "description" => "Vehicle Has Been Sold To $user_email ",
                      
                    ]);
                    
                    $allVehicles = DealerVehicle::Where('status', 2)->where('id', $id)->with('DealerVehicleHistory')->with('DealerVehicleExterior')->first();
                    $chargesDetails = new DealerWinningCharges;
                    $user_id = Auth::user()->id;
                    $chargesDetails->user_id = $user_id;
                    $chargesDetails->dealer_vehicle_id = $allVehicles->id;
                    
                    $chargesDetails->vehicle_charges = $charges_payment;
                    $chargesDetails->status = 1;
                    $chargesDetails->save();
                   
                    $user = User::where('id', $allVehicles->user_id)->first();
                    $dealer = User::where('id', Auth::user()->id)->first();
                    // dd($user,$dealer);
                    $current = Auth::user()->id;
                    $pricing = DealersOrderVehicleRequest::where('vehicle_id', $id)->where('user_id', $current)->first();
                    $details = [
                        'name'=>$user->name,
                        'email'=>"$user->email",
                        'dealer_phone_number'=>$dealer->phone_number,
                        'dealer_email'=>$dealer->email,
                        'dealer_name'=>$dealer->name,
                        'vehicle_name'=>$allVehicles->vehicle_name,
                        'vehicle_registration'=>$allVehicles->vehicle_registartion_number,
                        'vehicle_mileage'=>$allVehicles->vehicle_mileage,
                        'age'=>$allVehicles->vehicle_year,
                        'reserve_price'=>$allVehicles->reserve_price,
                        'colour'=>$allVehicles->vehicle_color,
                    ];
                    dispatch(new YourVehicleHasBeenSolds($details));
                    Session::flash('success', 'Your '.$charges_payment.' Payment Has Been Charged From Your Card'); 
                    return view('frontend.dealer.sellerDetails.ownerDealerDetail', compact('user', 'role', 'allVehicles', 'current', 'pricing'));
               
                }
            }  else {
                $allVehicles = DealerVehicle::Where('status', 2)->where('id', $id)->with('DealerVehicleHistory')->with('DealerVehicleExterior')->first();

                $user = User::where('id', $allVehicles->user_id)->first();
                $current = Auth::user()->id;
                $pricing = DealersOrderVehicleRequest::where('vehicle_id', $id)->where('user_id', $current)->first();


                return view('frontend.dealer.sellerDetails.ownerDealerDetail', compact('user', 'allVehicles', 'pricing', 'current', 'role'));
            }
        } catch (\Exception $e) {
           // return $e;
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }
    public function dealerToDealerOrderStatus($id)
    {
        $current = Auth::user()->id;
        $order = DealersOrderVehicleRequest::where('vehicle_id', $id)->where('user_id', $current)->first();
        if ($order->meeting_date_time == null) {
            return redirect()->back()->with('warning', 'You Havent Set Any Meeting Yet, First You Need To Set The Meeting.');
        } else if ($order->meeting_status == 'Completed') {
            $allVehicles = DealerVehicle::where('id', $order->vehicle_id)->first();
            $allVehicles->status = 2;
            $allVehicles->vehicle_availability = 'Sold';
            $allVehicles->save();
            $order->dealer_status = 'Yes';
            $order->save();
            return redirect()->back()->with('success', 'You Have Completely Purchase This Vehicle');
        } else {
            return redirect()->back()->with('warning', 'Seller Didnt Updated Meeting Status');
        }
    }
    public function requestedOrderStatus($id)
    {
        $current = Auth::user()->id;
        $order = OrderVehicleRequest::where('vehicle_id', $id)->where('user_id', $current)->first();
        if ($order->meeting_date_time == null) {
            return redirect()->back()->with('warning', 'You Havent Set Any Meeting Yet, First You Need To Set The Meeting.');
        } else if ($order->meeting_status == 'Completed') {
            $allVehicles = Vehicle::where('id', $order->vehicle_id)->first();
            $allVehicles->status = 2;
            $allVehicles->vehicle_availability = 'Sold';
            $allVehicles->save();
            $order->dealer_status = 'Yes';
            $order->save();
            return redirect()->back()->with('success', 'You Have Completely Purchase This Vehicle');
        } else {
            return redirect()->back()->with('warning', 'Seller Didnt Updated Meeting Status');
        }
    }
    public function BidedStatus($id)
    {
        $current = Auth::user()->id;
        $order = BidedVehicle::where('vehicle_id', $id)->where('user_id', $current)->first();
        if ($order->meeting_date_time == null) {
            return redirect()->back()->with('warning', 'You Havent Set Any Meeting Yet, First You Need To Set The Meeting.');
        } else if ($order->meeting_status == 'Completed') {
            $allVehicles = Vehicle::where('id', $order->vehicle_id)->first();
            $allVehicles->status = 2;
            $allVehicles->vehicle_availability = 'Sold';
            $allVehicles->save();
            $order->dealer_status = 'Yes';
            $order->save();
            return redirect()->back()->with('success', 'You Have Completely Purchase This Vehicle');
        } else {
            return redirect()->back()->with('warning', 'Seller Didnt Updated Meeting Status');
        }
    }
}
