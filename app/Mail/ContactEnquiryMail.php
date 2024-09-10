<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class ContactEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;

    /**
     * Create a new message instance.
     *
     * @param mixed $enquiry
     */
    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Enquiry Mail'
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_enquiry',
            with: ['enquiry' => $this->enquiry]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}


// <!-- resources/views/emails/contact_enquiry.blade.php -->

// <h1>Contact Enquiry</h1>
// <p>Name: {{ $enquiry['name'] }}</p>
// <p>Email: {{ $enquiry['email'] }}</p>
// <p>Message: {{ $enquiry['message'] }}</p>
