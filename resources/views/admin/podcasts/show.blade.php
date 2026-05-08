@extends('admin.layouts.layout')

@section('title', $podcast->title)
@section('page-title', 'Podcast')

@section('admin-content')

<div class="max-w-3xl">

    <!-- Back button -->
    <a href="{{ route('admin.podcasts.index') }}"
       class="text-orange text-sm hover:text-orange-light mb-6 inline-flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
        </svg>
        <span>Retour aux podcasts</span>
    </a>

    <!-- Card -->
    <div class="bg-dark-card border border-dark-border rounded-2xl overflow-hidden">

        <!-- Thumbnail -->
        @if($podcast->thumbnail)
            <img src="{{ asset('storage/'.$podcast->thumbnail) }}"
                 class="w-full h-64 object-cover">
        @endif

        <div class="p-8">

            <!-- Title -->
            <h1 class="text-white text-2xl font-bold mb-2">
                {{ $podcast->title }}
            </h1>

            <!-- Meta -->
            <div class="flex flex-wrap gap-4 text-sm text-gray-500 mb-6">
                <span>🎤 {{ $podcast->guest ?? 'Invité inconnu' }}</span>
                <span>⏱ {{ $podcast->duration ?? '—' }}</span>
                <span>📅 {{ $podcast->created_at->format('d/m/Y') }}</span>
            </div>

            <!-- Description -->
            @if($podcast->description)
                <p class="text-gray-300 leading-relaxed mb-6">
                    {{ $podcast->description }}
                </p>
            @endif

            <!-- YouTube -->
            @if($podcast->youtube_url)
                <div class="aspect-video mb-6">
                    <iframe
                        class="w-full h-80 rounded-xl"
                        src="{{ $podcast->youtube_url }}"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
            @endif

            <!-- Actions -->
            <div class="flex space-x-3">
                <a href="{{ route('admin.podcasts.edit', $podcast) }}"
                   class="bg-orange hover:bg-orange-dark text-white font-semibold px-5 py-2.5 rounded-xl">
                    Éditer
                </a>

                <form method="POST"
                      action="{{ route('admin.podcasts.destroy', $podcast) }}"
                      onsubmit="return confirm('Supprimer ce podcast ?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2.5 rounded-xl">
                        Supprimer
                    </button>
                </form>
            </div>

        </div>
    </div>

</div>

@endsection