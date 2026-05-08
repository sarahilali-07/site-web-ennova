@extends('front.layouts.app')
@section('title', 'Podcast')

@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">Écouter</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-4">Podcast</h1>
            <p class="text-gray-700 dark:text-gray-light text-lg max-w-2xl">Écoutez nos podcasts et découvrez des interviews inspirantes et des débats enrichissants.</p>
        </div>

        @if($podcasts->count() > 0)
        <div class="grid md:grid-cols-3 gap-6 mb-16">
            @foreach($podcasts as $podcast)
            <div class="bg-dark-card border border-dark-border rounded-2xl overflow-hidden card-hover">
                @if($podcast->thumbnail)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $podcast->thumbnail) }}" alt="{{ $podcast->title }}" class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-dark/50 flex items-center justify-center">
                            <div class="w-14 h-14 bg-orange rounded-full flex items-center justify-center orange-glow">
                                <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="w-full h-48 bg-dark-muted flex items-center justify-center">
                        <div class="w-14 h-14 bg-orange rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                @endif
                <div class="p-5">
                    <h3 class="font-display font-bold text-white text-base mb-2 line-clamp-2">{{ $podcast->title }}</h3>
                    <p class="text-gray-muted text-sm mb-3 line-clamp-2">{{ $podcast->description }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-muted">
                        <span>{{ $podcast->guest ?? 'Invité' }}</span>
                        <span>{{ $podcast->created_at->format('d M Y') }}</span>
                    </div>
                    @if($podcast->youtube_url)
                    <a href="{{ $podcast->youtube_url }}" target="_blank" class="mt-4 flex items-center space-x-2 text-orange text-sm font-semibold hover:text-orange-light transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        <span>Écouter sur YouTube</span>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center">{{ $podcasts->links() }}</div>
        @else
        <p class="text-gray-muted text-center py-12">Aucun épisode disponible pour le moment.</p>
        @endif

        {{-- Become a guest CTA --}}
        <div class="mt-16 bg-dark-card border border-dark-border rounded-3xl p-10 text-center">
            <h2 class="font-display font-bold text-3xl text-white mb-3">Devenez invité(e)</h2>
            <p class="text-gray-light mb-6 max-w-lg mx-auto">Partagez votre expertise et inspirez la prochaine génération de marketeurs. Soumettez votre candidature pour participer à Ennova Podcast.</p>
            <a href="{{ route('podcast-guest.form') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3.5 rounded-xl transition-colors orange-glow">Devenir invité(e)</a>
        </div>
    </div>
</div>
@endsection