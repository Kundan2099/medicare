<?php

namespace App\Jobs;

use App\Notifications\ContactEnquiryNotification;
use Illuminate\Bus\Queueable;
use App\Mail\ContactEnquiryMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendContactEnquiryNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    /**
     * Create a new job instance.
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Mail::to(config('mail.admin_email'))->send(new ContactEnquiryMail($this->enquiry));
        // $this->enquiry->notify(new ContactEnquiryNotification($this->enquiry));

        $email = 'kundankapgate2005@gmail.com';
        Notification::route('mail', $this->email)->notify(new ContactEnquiryNotification($email));
    }
}
