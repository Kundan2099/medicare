<?php

namespace App\Listeners;

use App\Events\ContactEnquiryReceived;
use App\Jobs\SendContactEnquiryNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendContactEnquiryNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactEnquiryReceived $event): void
    {
        SendContactEnquiryNotification::dispatch($event->enquiry);
    }
}
