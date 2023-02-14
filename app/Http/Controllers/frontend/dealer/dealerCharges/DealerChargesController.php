<?php

namespace App\Http\Controllers\frontend\dealer\dealerCharges;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Vehicle;
use Stripe\PaymentIntent;
use App\Models\CardDetails;
use App\Models\BidedVehicle;
use Illuminate\Http\Request;
use App\Models\DealerVehicle;
use Illuminate\Support\Facades\DB;
use App\Models\OrderVehicleRequest;
use App\Http\Controllers\Controller;

use App\Models\DealerWinningCharges;
use Illuminate\Support\Facades\Auth;
use App\Models\VehicleWinningCharges;
use App\Models\CanceledRequestReviews;
use App\Models\CancelImages;
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
        $bided = $bided;
        $role = $slug;
        $user_id = Auth::user()->id;
        $charges =  DealerWinningCharges::where('user_id', $user_id)->where('vehicle_id', $id)->first();

        $pricing = BidedVehicle::where('vehicle_id', $id)->where('user_id', $user_id)->first();

        $charges_fee = VehicleWinningCharges::where('status', 1)
            ->where('price_to', '>=', $pricing->bid_price)
            ->where('price_from', '<=', $pricing->bid_price)
            ->orderBy('id', "DESC")->first();


        if ($charges == null) {

            $charges_payment = $charges_fee->fee;
            return view('frontend.dealer.sellerDetails.cardDetail', compact('id', 'charges_payment', 'user_id', 'role', 'bided'))->with('error', 'First You Need To Pay');
        } else {
            $allVehicles = Vehicle::Where('status', 2)->where('id', $id)->with('vehicleInformation')->with('VehicleImage')->first();

            $user = User::where('id', $allVehicles->user_id)->first();
            $current = Auth::user()->id;
            $pricing = BidedVehicle::where('vehicle_id', $id)->where('user_id', $current)->first();

            return view('frontend.dealer.sellerDetails.sellerDetail', compact('user', 'role', 'allVehicles', 'current', 'pricing', 'bided'));
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
                $charges_payment = $charges_fee->fee;


                return view('frontend.dealer.sellerDetails.cardDetail', compact('id', 'charges_payment', 'user_id', 'role'))->with('error', 'First You Need To Pay');
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
            Stripe::setApiKey(env('STRIPE_SECRET'));

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

        if ($request->bided == 'bided') {
            $meeting = BidedVehicle::where('id', $request->order_id)->first();
            $meeting->meeting_date_time = $request->date_time;
            $meeting->save();
            return redirect()->route('CompletedRequestedVehicle')->with('success', 'Meeting Has Been Schedule');
        } else {
            $meeting = OrderVehicleRequest::where('id', $request->order_id)->first();
            $meeting->meeting_date_time = $request->date_time;
            $meeting->save();
            return redirect()->route('CompletedRequestedVehicle')->with('success', 'Meeting Has Been Schedule');
        }
    }
    public function ownerScheduleMeeting(Request $request)
    {
        $meeting = DealersOrderVehicleRequest::where('id', $request->order_id)->first();
        $meeting->meeting_date_time = $request->date_time;
        $meeting->save();
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
                $charges_payment = $charges_fee->fee;


                return view('frontend.dealer.sellerDetails.cardDetail', compact('id', 'charges_payment', 'user_id', 'role'))->with('error', 'First You Need To Pay');
            } else {
                $allVehicles = DealerVehicle::Where('status', 2)->where('id', $id)->with('DealerVehicleHistory')->with('DealerVehicleExterior')->first();

                $user = User::where('id', $allVehicles->user_id)->first();
                $current = Auth::user()->id;
                $pricing = DealersOrderVehicleRequest::where('vehicle_id', $id)->where('user_id', $current)->first();


                return view('frontend.dealer.sellerDetails.ownerDealerDetail', compact('user', 'allVehicles', 'pricing', 'current', 'role'));
            }
        } catch (\Exception $e) {
            //return $e;
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
