<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Mail\EmailForDealerRegistrationQueuing;

class SendEmailForDealerRegistrationQueuing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $dealerQueueData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($dealerQueueData)
    {
        $this->dealerQueueData = $dealerQueueData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailForDealerRegistrationQueuing($this->dealerQueueData);
        Mail::to($this->dealerQueueData['email'])->send($email);
    }
}
