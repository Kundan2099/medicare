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


class SendContactEnquiryNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $enquiry;
    /**
     * Create a new job instance.
     */
    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to(config('mail.admin_email'))->send(new ContactEnquiryMail($this->enquiry));
        // Notification::send($admin, new ContactEnquiryNotification($this->enquiry));
        // $this->enquiry->notify(new ContactEnquiryNotification($this->enquiry));

    }
}
