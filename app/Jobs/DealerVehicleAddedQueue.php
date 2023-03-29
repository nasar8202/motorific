<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Mail\DealerVehicleAdded;

class DealerVehicleAddedQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $queue_details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($queue_details)
    {
        $this->queue_details = $queue_details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new DealerVehicleAdded($this->queue_details);
        Mail::to($this->queue_details['email'])->send($email);
    }
}
