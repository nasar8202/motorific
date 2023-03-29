<?php

namespace App\Jobs;

use App\Mail\SellerRegistrationEmailToAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SellerRegistrationEmailToAdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $seller_registration_email_to_admin;
    public function __construct($seller_registration_email_to_admin)
    {
        $this->seller_registration_email_to_admin = $seller_registration_email_to_admin;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SellerRegistrationEmailToAdmin($this->seller_registration_email_to_admin);
        Mail::to('webuyurcars121@gmail.com')->send($email);
    }
}
