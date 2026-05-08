<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    /**
     * Store a new candidature
     */
    public function store(Request $request)
    {
        // 1. Validation
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'motivation' => 'required|string',
            'school' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'level' => 'nullable|string|max:255',
            'specialty' => 'nullable|string|max:255',
        ]);

        // 2. Create candidature
        Candidature::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'motivation' => $validated['motivation'],
            'school' => $validated['school'],
            'phone' => $validated['phone'] ?? null,
            'level' => $validated['level'] ?? null,
            'specialty' => $validated['specialty'] ?? null,
            'status' => 'pending', // مهم جداً 🔥
        ]);

        // 3. Redirect back
        return back()->with('success', 'Candidature envoyée avec succès');
    }
}