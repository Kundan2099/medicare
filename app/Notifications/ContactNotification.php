<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    protected $contact_enquiry;
    /**
     * Create a new notification instance.
     */
    public function __construct($contact_enquiry)
    {
        $this->contact_enquiry = $contact_enquiry;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New Contact Enquiry')
                    ->line('You have received a new contact enquiry.')
                    ->line('Name: ' . $this->contact_enquiry['name'])
                    ->line('Email: ' . $this->contact_enquiry['email'])
                    ->line('Phone: ' . $this->contact_enquiry['phone'])
                    ->line('Subject: ' . $this->contact_enquiry['subject'])
                    ->line('Message: ' . $this->contact_enquiry['message'])
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
