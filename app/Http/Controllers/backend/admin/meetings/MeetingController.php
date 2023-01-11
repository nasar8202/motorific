<?php

namespace App\Http\Controllers\backend\admin\meetings;

use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class MeetingController extends Controller
{
    // public function viewMeeting()
    // { 
      
    //     $orders = DealersOrderVehicleRequest::get();
    //     return view('backend.admin.meetings.meetings',compact('orders'));
    // }
    public function viewMeeting()
    {   
        $events = [];
        $data = Event::all();
        
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => 'pass here url and any route',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('backend.admin.meetings.meetingstest',compact('calendar'));
    }
}
