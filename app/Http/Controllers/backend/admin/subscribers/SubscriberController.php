<?php

namespace App\Http\Controllers\backend\admin\subscribers;

use App\Models\User;
use App\Models\MotorificJob;
use Illuminate\Http\Request;
use App\Jobs\SendEmailToSubscriber;
use App\Mail\MailToSubscriberUsers;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;



class SubscriberController extends Controller
{

    public function getCvs(){
        $CvLists = MotorificJob::where('status',1)->orderBy('id',"DESC")->get();
        return view('backend.admin.jobs.viewCvList',compact('CvLists'));
    }
    public function viewAllSubscribers()
    {
        $subscribers = NewsletterSubscriber::where('status',1)->get(); 
        return view('backend.admin.subscribers.viewAllSubscribers',compact('subscribers'));
    }

    public function createNotificationToSubscriberForm()
    {
        $users = NewsletterSubscriber::where('status',1)->get();
        return view('backend.admin.subscribers.createNotificationToSubscriberForm',compact('users'));

    }

    public function sendNotificationsToUsers(Request $request)
    {
       
        try {
                $user_ids = $request->users_id;
                $data['title'] = $request->title;
                $data['description'] = $request->description;
            foreach($user_ids as $id){
                $user_id = $id;
                $user = User::where('id',$user_id)->first();
                //echo  $user['email'];
                
                $data['email'] = $user['email'];
                //dd($details['description']);
               // SendEmailToSubscriber::dispatch($details);
                dispatch(new SendEmailToSubscriber($data));
                //Mail::to($user['email'])->send(new MailToSubscriberUsers($data));
           // Mail::to($user['email'])->send(new \App\Mail\SendEmailToSubscribers($details));
           
            }
            return redirect()->route('viewAllSubscribers')->with('success', 'Notification Send Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
        
    }

}