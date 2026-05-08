<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::orderBy('platform')->paginate(15);

        return view('admin.social-links.index', compact('socialLinks'));
    }

    public function create()
    {
        $platforms = SocialLink::PLATFORMS;

        return view('admin.social-links.form', compact('platforms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => ['required', 'string', 'in:' . implode(',', SocialLink::PLATFORMS)],
            'url' => ['nullable', 'url'],
        ]);

        SocialLink::create($request->only('platform', 'url'));

        return redirect()->route('admin.social-links.index')->with('success', 'Lien social ajouté avec succès.');
    }

    public function edit(SocialLink $socialLink)
    {
        $platforms = SocialLink::PLATFORMS;

        return view('admin.social-links.form', compact('socialLink', 'platforms'));
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $request->validate([
            'platform' => ['required', 'string', 'in:' . implode(',', SocialLink::PLATFORMS)],
            'url' => ['nullable', 'url'],
        ]);

        $socialLink->update($request->only('platform', 'url'));

        return redirect()->route('admin.social-links.index')->with('success', 'Lien social mis à jour avec succès.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()->route('admin.social-links.index')->with('success', 'Lien social supprimé avec succès.');
    }
}
