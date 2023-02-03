<?php

namespace App\Http\Controllers\frontend\dealer;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\WelcomeDealerRegistrationRequestMail;
use App\Notifications\NewDealerRequestNotification;

class MultiStepRegistration extends Controller
{
    public function createStep1(Request $request)
    {

        $register = $request->session()->get('register');

        return view('frontend.dealer.step1', compact('register'));
    }

    public function createStep2(Request $request)
    {
        $register = $request->session()->get('register');

        return view('frontend.dealer.step2', compact('register'));
    }

    public function ListingDetails(Request $request)
    {
        return view('frontend.dealer.ListingDetails.listing-details');
    }
    public function CreateAdvert(Request $request)
    {
        return view('frontend.dealer.CreateAdvert.create-advert');
    }

    public function createStep3(Request $request)
    {
        $register = $request->session()->get('register');
        return view('frontend.dealer.step3', compact('register'));
    }


    public function PostcreateStep1(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'company_name' => 'required',
            'position' => 'required',
            'phone_number' => 'required',

            'email' => 'required|unique:users',
            'hear_about_us' => 'required',
            'privacy_policy' => 'required'
        ]);


        $request->session()->put('name', $request->input('name'));
        $request->session()->put('password', $request->input('password'));
        $request->session()->put('company_name', $request->input('company_name'));
        $request->session()->put('position', $request->input('position'));
        $request->session()->put('phone_number', $request->input('phone_number'));

        $request->session()->put('email', $request->input('email'));
        $request->session()->put('hear_about_us', $request->input('hear_about_us'));
        $request->session()->put('privacy_policy', $request->input('privacy_policy'));
        if (empty($request->session()->get('register'))) {
            $register = new User();
            // $register->role_id = 3;
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        } else {
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            // $register->role_id = 3;
            $request->session()->put('register', $register);
        }
        return redirect('/register-create-step-2');
    }

    public function PostcreateStep2(Request $request)
    {
        $validatedData = $request->validate([
            'address_line_1' => 'required',
            'address_line_2' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'company_type' => 'required',
            'website' => 'required',
            'company_phone' => 'required',
        ]);

        $zip = trim($request->postcode, ' ');

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=.'$zip'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk";

        try {
            $result_string = file_get_contents($url);
            $result = json_decode($result_string, true);
            if (count($result['results']) != 0) {

                $request->session()->put('address_line_1', $request->input('address_line_1'));
                $request->session()->put('address_line_2', $request->input('address_line_2'));
                $request->session()->put('city', $request->input('city'));
                $request->session()->put('postcode', $request->input('postcode'));
                $request->session()->put('company_type', $request->input('company_type'));
                $request->session()->put('website', $request->input('website'));
                $request->session()->put('company_phone', $request->input('company_phone'));

                if (empty($request->session()->get('register'))) {
                    $register = new UserDetail();
                    $register->fill($validatedData);
                    $request->session()->put('register', $register);
                } else {
                    $register = $request->session()->get('register');
                    $register->fill($validatedData);
                    $request->session()->put('register', $register);
                }
                return redirect()->route('register.create.step.3');
            } else {
                return back()->with('error', 'Enter The Right Post Code');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Enter The Right Post Code');
        }
    }

    public function PostcreateStep3(Request $request)
    {
        // dd($request->session()->get('postcode'));
        $validatedData = $request->validate([
            'lowest_purchase_price' => 'required',
            'highest_purchase_price' => 'required',
            'age_range_from' => 'required',
            'age_range_to' => 'required',
            'mileage_from' => 'required',
            'mileage_to' => 'required',
            'how_far_distance' => 'required',
            'purchase_each_month_vehicles' => 'required',
        ]);

        $request->session()->put('lowest_purchase_price', $request->input('lowest_purchase_price'));
        $request->session()->put('highest_purchase_price', $request->input('highest_purchase_price'));
        $request->session()->put('age_range_from', $request->input('age_range_from'));
        $request->session()->put('age_range_to', $request->input('age_range_to'));
        $request->session()->put('mileage_from', $request->input('mileage_from'));
        $request->session()->put('mileage_to', $request->input('mileage_to'));
        $request->session()->put('how_far_distance', $request->input('how_far_distance'));
        $request->session()->put('purchase_each_month_vehicles', $request->input('purchase_each_month_vehicles'));
        $request->session()->put('any_thing_else', $request->input('any_thing_else'));



        if ($request->input('all_makes') == 'all_makes') {
            $request->session()->put('all_makes', $request->input('all_makes'));
        } else {
            $request->session()->put('specific_makes', $request->input('specific_makes'));
        }

        if (empty($request->session()->get('register'))) {
            $register = new UserDetail();
            $register->fill($validatedData);

            $request->session()->put('register', $register);
        } else {
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }


        $register = $request->session()->get('register');
        $request->session()->put('register', $register);
        // dd($request->session()->put('register', $register));
        $user = new User();
        $user->email = $request->session()->get('email');
        $user->name = $request->session()->get('name');
        $user->password = Hash::make($request->session()->get('password'));
        $user->company_name = $request->session()->get('company_name');
        $user->position = $request->session()->get('position');
        $user->hear_about_us = $request->session()->get('hear_about_us');
        $user->phone_number = $request->session()->get('phone_number');
        $user->privacy_policy = $request->session()->get('privacy_policy');
        $user->post_code = $request->session()->get('postcode');
        $user->status = 0;
        $user->role_id = 3;
        //dd($register->email);
        $user->save();

        $user_id = $user->id;

        $user_detail  = new UserDetail();
        $user_detail->user_id = $user_id;
        $user_detail->address_line_1 = $request->session()->get('address_line_1');
        $user_detail->address_line_2 = $request->session()->get('address_line_2');
        $user_detail->city = $request->session()->get('city');
        $user_detail->postcode = $request->session()->get('postcode');
        $user_detail->company_type = $request->session()->get('company_type');
        $user_detail->website = $request->session()->get('website');
        $user_detail->company_phone = $request->session()->get('company_phone');
        $user_detail->lowest_purchase_price = $request->session()->get('lowest_purchase_price');
        $user_detail->highest_purchase_price = $request->session()->get('highest_purchase_price');
        $user_detail->age_range_from = $request->session()->get('age_range_from');
        $user_detail->age_range_to = $request->session()->get('age_range_to');
        $user_detail->mileage_from = $request->session()->get('mileage_from');
        $user_detail->mileage_to = $request->session()->get('mileage_to');
        $user_detail->how_far_distance = $request->session()->get('how_far_distance');
        $user_detail->purchase_each_month_vehicles = $request->session()->get('purchase_each_month_vehicles');
        if ($request->input('all_makes') == 'all_makes') {
            $user_detail->all_makes = $request->session()->get('all_makes');
        } else {
            $implode_data = implode(",", $request->session()->get('specific_makes'));
            $user_detail->specific_makes = $implode_data;
        }
        $user_detail->any_thing_else = $request->session()->get('any_thing_else');

        $user_detail->save();

        Session::flush();

        $details = [
            'greeting' => 'New Request Dealer Name :' . $user->name . " And  Email :" . $user->email,
            'body' => 'New Dealer Request Please Check Details',
            'thanks' => 'Thank you for using Motorfic.com',
            'actionText' => 'View New Dealers Request',
            'actionURL' => url('/requests-dealers'),
            'order_id' => 101
        ];
        $email = User::where('role_id', 1)->first();
        $data = ([
            'name' => $user->name,
            'email' => $user->email,

        ]);
        Mail::to($email)->send(new WelcomeDealerRegistrationRequestMail($data));
        // Notification::send($user->email, new MyFirstNotification($details));
        //$user->notify(new NewDealerRequestNotification($details));
        return redirect()->route('DealerLogin')->with("success", "Account Create Successfully! Waiting For Admin Approval");
    }

    public function store(Request $request)
    {
        $register = $request->session()->get('register');

        return redirect('/data');
    }


    public function DealerLogin()
    {
        return view('frontend.dealer.dealerLogin');
    }
}
