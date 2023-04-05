<?php

namespace App\Jobs;

use App\Mail\SellerDetails;
use Illuminate\Bus\Queueable;
use App\Mail\YourVehicleHasBeenSold;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class YourVehicleHasBeenSolds implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new YourVehicleHasBeenSold($this->details);
        Mail::to($this->details['email'])->send($email);
    }
}
