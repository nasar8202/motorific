<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailToSubscriberUsers extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Notification From Motorific Team!';
       return $this->view('emails.sendEmailToSubscribers')->subject($subject);
        // $address = 'janeexampexample@example.com';
        // $subject = 'This is a demo!';
        // $name = 'Jane Doe';
        
        // return $this->view('emails.test')
        //             ->from($address, $name)
        //             ->cc($address, $name)
        //             ->bcc($address, $name)
        //             ->replyTo($address, $name)
        //             ->subject($subject)
        //             ->with([ 'message' => $this->data['message'] ]);
    }
}
