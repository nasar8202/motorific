<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DealerVehicleAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $queue_details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($queue_details)
    {
        $this->queue_details = $queue_details;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Congratulations';
        return $this->view('emails.DealerVehicleAdded')->subject($subject);

        //return $this->view('view.name');
    }
}
