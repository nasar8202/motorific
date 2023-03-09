<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;

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
                $subscribe->email = $data['subscriber_email'];
                $subscribe->save();
                return "inserted";

            }
        }
    }

    public function subscribeEmail()
    {
        return view("frontend.seller.thankyouEmailSubscribe");
    }
}
