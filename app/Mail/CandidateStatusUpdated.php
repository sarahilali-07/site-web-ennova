<?php

namespace App\Mail;

use App\Models\Candidature;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CandidateStatusUpdated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private ?array $cachedContent = null;

    public function __construct(
        public Candidature $candidate,
        public string $status,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->emailContent()['subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.candidate-status-updated',
            with: [
                'candidate' => $this->candidate,
                'status' => $this->status,
                'content' => $this->emailContent(),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }

    private function emailContent(): array
    {
        if ($this->cachedContent !== null) {
            return $this->cachedContent;
        }

        return $this->cachedContent = match ($this->status) {
            'accepted' => [
                'subject' => 'Congratulations - your Ennova application was accepted',
                'eyebrow' => 'Application accepted',
                'headline' => 'Congratulations, '.$this->candidate->first_name.'!',
                'intro' => 'We are happy to let you know that your application to Ennova has been accepted.',
                'body' => 'Our team will contact you soon with the next steps, event details, and everything you need to prepare.',
                'cta' => 'Welcome to the Ennova community.',
                'accent' => '#16A34A',
            ],
            'rejected' => [
                'subject' => 'Update about your Ennova application',
                'eyebrow' => 'Application update',
                'headline' => 'Thank you for applying, '.$this->candidate->first_name.'.',
                'intro' => 'Thank you for the time and care you put into your Ennova application.',
                'body' => 'After reviewing your profile, we are not able to move forward with your application for this edition. We truly appreciate your interest and encourage you to stay connected for future opportunities.',
                'cta' => 'We wish you the very best in your next projects.',
                'accent' => '#DC2626',
            ],
            'review' => [
                'subject' => 'Your Ennova application is under review',
                'eyebrow' => 'Application under review',
                'headline' => 'Your application is being reviewed.',
                'intro' => 'We wanted to let you know that your Ennova application is now under review by our team.',
                'body' => 'You do not need to send anything else for now. We will contact you as soon as there is a new update.',
                'cta' => 'Thank you for your patience.',
                'accent' => '#D97706',
            ],
        };
    }
}
