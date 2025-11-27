<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BroadcastMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailSubject;
    public $mailContent;

    public function __construct($subject, $content)
    {
        $this->mailSubject = $subject;
        $this->mailContent = $content;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📢 ' . $this->mailSubject . ' - ' . config('app.name', 'Test Broadcast'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.broadcast',
            with: [
                'emailSubject' => $this->mailSubject,
                'emailContent' => $this->mailContent,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->view('emails.broadcast')
            ->with([
                'emailSubject' => $this->mailSubject,
                'emailContent' => $this->mailContent,
            ]);
    }
}