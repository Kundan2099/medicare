<?php

namespace App\Jobs;

use App\Models\ContactEnquiry;
use App\Notifications\ContactNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendContactNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $contactEnquiry;
    /**
     * Create a new job instance.
     */
    public function __construct(ContactEnquiry $contactEnquiry)
    {
        $this->contactEnquiry = $contactEnquiry;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $adminEmail = 'kundankapgate2005@gmail.com';
        Notification::route('mail', $adminEmail)->notify(new ContactNotification($this->contactEnquiry));
    }
}
