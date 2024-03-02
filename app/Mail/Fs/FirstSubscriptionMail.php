<?php

declare(strict_types=1);

namespace App\Mail\Fs;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class FirstSubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @return void
     */
    public function __construct(
        public string $email
    ) {}

    /**
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                config('mail.from.address'),
                config('mail.from.name')
            ),
            subject: 'Welcome to the Daycode Newsletter: Your Source for Tech Insights and Inspiration!',
        );
    }

    /**
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.fs.first-subscription-mail',
            with: [
                'email' => $this->email
            ]
        );
    }

    /**
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
