<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use Illuminate\Http\Request;

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

    public function updateStatus(Request $request, Candidature $candidate)
    {
        $request->validate([
            'status' => ['required', 'in:pending,accepted,rejected'],
        ]);

        $candidate->update(['status' => $request->input('status')]);

        return back()->with('success', 'Statut de candidature mis à jour.');
    }
}
