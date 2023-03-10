<?php

namespace App\Jobs;


use Illuminate\Bus\Queueable;

use App\Mail\SendEmailToSubscribers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailToSubscriber implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  
    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
  

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $email = new SendEmailToSubscribers();
        //  dd($this->data);
        // return $this->data;
        Mail::to($this->data['email'])->send(new SendEmailToSubscribers($this->data));

        // Mail::to($this->details['to'])
        //      ->send(new SendMail($this->details));
    }
}
