<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterBroadcastMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $contentBody;
    public $unsubscribeUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $contentBody, $subscriber)
    {
        $this->subject = $subject;
        $this->contentBody = $contentBody;
        $this->unsubscribeUrl = env('FRONTEND_URL', 'http://localhost:5173') . "/newsletter-actions.html?action=unsubscribe&token=" . $subscriber->token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter_broadcast',
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
