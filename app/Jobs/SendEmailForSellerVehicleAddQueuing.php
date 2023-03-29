<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\EmailForSellerVehicleAddQueuing;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendEmailForSellerVehicleAddQueuing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $vehicle_details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($vehicle_details)
    {
        $this->vehicle_details = $vehicle_details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailForSellerVehicleAddQueuing($this->vehicle_details);
        Mail::to($this->vehicle_details['email'])->send($email);
    }
}
