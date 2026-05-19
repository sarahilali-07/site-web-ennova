<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use App\Services\CandidateStatusNotificationService;
use Illuminate\Http\Request;
use Throwable;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $query = Candidature::query();

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        $candidates = $query->latest()->paginate(12)->withQueryString();

        return view('admin.candidates.index', compact('candidates'));
    }

    public function show(Candidature $candidate)
    {
        return view('admin.candidates.show', compact('candidate'));
    }

    public function updateStatus(Request $request, Candidature $candidate, CandidateStatusNotificationService $notificationService)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,review,accepted,rejected'],
        ]);

        $candidate->fill(['status' => $validated['status']]);

        // Only persist and notify when the candidate status actually changes.
        if (! $candidate->isDirty('status')) {
            return back()->with('success', __('messages.admin.candidates.status_unchanged'));
        }

        $candidate->save();

        $response = back()->with('success', __('messages.admin.candidates.status_updated'));

        try {
            $notificationService->queueStatusEmail($candidate);

            if ($notificationService->shouldNotify($candidate->status)) {
                $response->with('success', __('messages.admin.candidates.status_updated_email_queued'));
            }
        } catch (Throwable $exception) {
            report($exception);

            $response->with('error', __('messages.admin.candidates.status_updated_email_failed'));
        }

        return $response;
    }
}
