<?php

namespace App\Services;

use App\Mail\CandidateStatusUpdated;
use App\Models\Candidature;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CandidateStatusNotificationService
{
    private const NOTIFIABLE_STATUSES = [
        'accepted',
        'rejected',
        'review',
    ];

    public function shouldNotify(string $status): bool
    {
        return in_array($status, self::NOTIFIABLE_STATUSES, true);
    }

    public function queueStatusEmail(Candidature $candidate): void
    {
        if (! $this->shouldNotify($candidate->status)) {
            Log::info('CandidateStatusNotification: status not notifiable, skipping email.', [
                'candidate_id' => $candidate->id,
                'status' => $candidate->status,
            ]);
            return;
        }

        Mail::to($candidate->email)->queue(
            new CandidateStatusUpdated($candidate, $candidate->status)
        );

        Log::info('CandidateStatusNotification: email queued.', [
            'candidate_id' => $candidate->id,
            'candidate_email' => $candidate->email,
            'status' => $candidate->status,
            'queue_connection' => config('queue.default'),
            'queue' => config('queue.connections.'.config('queue.default').'.queue', 'default'),
        ]);
    }
}
