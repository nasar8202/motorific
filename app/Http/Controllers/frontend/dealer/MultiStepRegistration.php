<?php

namespace App\Http\Controllers\frontend\dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class MultiStepRegistration extends Controller
{
    public function createStep1(Request $request)
    {
        $register = $request->session()->get('register');

        return view('frontend.dealer.step1',compact('register'));
    }

    public function createStep2(Request $request)
    {
        $register = $request->session()->get('register');

        return view('frontend.dealer.step2',compact('register'));
    }

    public function createStep3(Request $request)
    {
        $register = $request->session()->get('register');
        return view('frontend.dealer.step3',compact('register'));
    }


    public function PostcreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required',
             'company_name' => 'required',
             'position' => 'required',
             'phone_number' => 'required',
             'email' => 'required',
             'hear_about_us' => 'required',
             'privacy_policy'=>'required'
        ]);
        if(empty($request->session()->get('register'))){
            $register = new \App\Models\User();
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->fill($validatedData);
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
        if(empty($request->session()->get('register'))){
            $register = new \App\Models\UserDetail();
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }
        return redirect()->route('register.create.step.3');
    }

    public function PostcreateStep3(Request $request)
    {
// dd($request->session()->get('register'));
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
        if(empty($request->session()->get('register'))){
            $register = new \App\Models\UserDetail();
            $register->fill($validatedData);

            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }


            $register = $request->session()->get('register');

            $request->session()->put('register', $register);

            $register->role_id = 3;

            $register->user_id = $register->id;

            $register->all_makes = $request->all_makes;
            $register->specific_makes = $request->specific_makes;
            $register->any_thing_else = $request->any_thing_else;
            $register->save();
            Session::flush();
        return redirect('/');
    }

    public function store(Request $request)
    {
        $register = $request->session()->get('register');
        $user = new User;
        $user->abc = $register->abc;
        $user->save();

        $user_id = $user->id;
        $user = new UserDetail;
        $user->abc = $register->abc;
        $user->save();
        Session::flush();
        return redirect('/data');
    }
}
