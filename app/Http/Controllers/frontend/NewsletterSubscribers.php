<?php

namespace App\Http\Controllers\frontend;

use App\Models\GetInTouch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\GetInTouchMailRecieve;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterSubscribers extends Controller
{
    public function addSubscriberEmail(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            
            $subcriberEmailCheck = NewsletterSubscriber::where('email',$data['subscriber_email'])->count();
            if($subcriberEmailCheck>0){
                return "exists";
            }else{
               
                $subscribe = new NewsletterSubscriber();
                $subscribe->email = $data['subscriber_email'];
                $subscribe->status = 1;
                $subscribe->save();
                return "inserted";

            }
        }
    }

    public function getContacts()
    {
        $getInTouchs = getInTouch::orderBy('id', 'DESC')->get();
        return view("backend.admin.getInTouch.getContacts",compact('getInTouchs'));
    }
    public function updateGetInTouch(Request $request,$id)
    {
        $update = getIntouch::find($id);
        $update->status = 2;
        $update->save();
        return redirect()->back()->with('success', 'Contacted updated!');
    }
    public function subscribeEmail()
    {
        return view("frontend.seller.thankyouEmailSubscribe");
    }

    public function GetInTouchSellerForm()
    {
        return view("frontend.seller.GetInTouchSellerForm");
    }

    public function getIntouchPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|string|regex:/[a-zA-Z]+$/u',
            'email' => 'required|string|email|max:50|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone_number' => 'min:9|max:16',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        DB::beginTransaction();
       try {
            if(isset($request->getintouchfromsellerform)){
                $GetInTouch = new GetInTouch();
                $GetInTouch->name = $request->name;
                $GetInTouch->email = $request->email;
                $GetInTouch->description = $request->description;
                $GetInTouch->save();

                $data = [
                    'greeting' => $request->name,
                    'email' => $request->email,
                    'body1' => $request->description,
                    
                ];
                //   dd($details);
                Mail::to("webuyurcars121@gmail.com")->send(new GetInTouchMailRecieve($data));
                
            }else{
                dd('else');
            }
            
       } catch (\Exception $e) {
        
        DB::rollBack();
        return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
       }
       DB::commit();
            return redirect()->route('GetInTouchSellerForm')->with('success', 'Thanks for contacting us we will get back soon!');
    }
}
