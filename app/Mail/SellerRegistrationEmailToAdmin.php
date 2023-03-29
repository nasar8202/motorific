<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SellerRegistrationEmailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $seller_registration_email_to_admin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seller_registration_email_to_admin)
    {
        $this->seller_registration_email_to_admin = $seller_registration_email_to_admin;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'New Seller Registration Details';
        return $this->view('emails.SellerRegistrationEmailToAdmin')->subject($subject);

        //return $this->view('view.name');
    }
}
