<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $podcasts = Podcast::latest()->paginate(15);

        return view('admin.podcasts.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.podcasts.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'guest' => ['nullable', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:50'],
            'youtube_url' => ['nullable', 'url', 'max:2048'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('podcasts', 'public');
        }

        $data['media_url'] = $data['youtube_url'] ?? null;

        Podcast::create($data);

        return redirect()->route('admin.podcasts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Podcast $podcast)
    {
        return view('admin.podcasts.show', compact('podcast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Podcast $podcast)
    {
        return view('admin.podcasts.form', compact('podcast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Podcast $podcast)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'guest' => ['nullable', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:50'],
            'youtube_url' => ['nullable', 'url', 'max:2048'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($podcast->thumbnail) {
                Storage::disk('public')->delete($podcast->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store('podcasts', 'public');
        }

        $data['media_url'] = $data['youtube_url'] ?? $podcast->media_url;

        $podcast->update($data);

        return redirect()->route('admin.podcasts.show', $podcast);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Podcast $podcast)
    {
        if ($podcast->thumbnail) {
            Storage::disk('public')->delete($podcast->thumbnail);
        }

        $podcast->delete();

        return redirect()->route('admin.podcasts.index');
    }
}
