@extends('front.layouts.app')
@section('title', 'Blog')

@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="mb-12">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">Contenu</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-4">Blog</h1>
            <p class="text-gray-700 dark:text-gray-light text-lg max-w-2xl">Découvrez nos articles et actualités sur l'innovation, l'entrepreneuriat et le développement personnel.</p>
        </div>

        {{-- Search + Filter --}}
        <form method="GET" class="flex flex-col sm:flex-row gap-4 mb-10">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un article..." class="flex-1 bg-dark-card border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
            <select name="category" class="bg-dark-card border border-dark-border text-gray-light text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50 transition-colors">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-6 py-3 rounded-xl transition-colors">Filtrer</button>
        </form>

        {{-- Posts Grid --}}
        @if($posts->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach($posts as $post)
            <article class="bg-dark-card border border-dark-border rounded-2xl overflow-hidden card-hover">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-dark-muted flex items-center justify-center">
                        <svg class="w-16 h-16 text-dark-border" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        @if($post->category)
                            <span class="text-orange text-xs font-semibold uppercase tracking-wider">{{ $post->category->name }}</span>
                        @endif
                        <span class="text-gray-muted text-xs">{{ $post->created_at->format('d M Y') }}</span>
                    </div>
                    <h2 class="font-display font-bold text-white text-lg mb-2 line-clamp-2">{{ $post->title }}</h2>
                    <p class="text-gray-muted text-sm leading-relaxed mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                    <a href="{{ route('blog.show', $post) }}" class="inline-flex items-center space-x-2 bg-orange hover:bg-orange-dark text-white text-sm font-semibold px-4 py-2 rounded-lg transition-colors">
                        <span>Lire plus</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        {{-- Pagination --}}
        <div class="flex justify-center">
            {{ $posts->links() }}
        </div>
        @else
        <div class="text-center py-20">
            <svg class="w-16 h-16 text-dark-border mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <p class="text-gray-muted">Aucun article trouvé.</p>
        </div>
        @endif
    </div>
</div>
@endsection