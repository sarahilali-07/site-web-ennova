<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReplyToMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $originalMessage;
    public $replySubject;
    public $replyBody;

    /**
     * Create a new message instance.
     */
    public function __construct($originalMessage, $replySubject, $replyBody)
    {
        $this->originalMessage = $originalMessage;
        $this->replySubject = $replySubject;
        $this->replyBody = $replyBody;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->replySubject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reply-to-message',
            with: [
                'originalMessage' => $this->originalMessage,
                'replyBody' => $this->replyBody,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
