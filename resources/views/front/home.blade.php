@extends('front.layouts.app')

@section('title', 'Accueil')
@section('meta_description', 'Ennova - Là où naissent les futurs leaders du marketing. Compétition nationale de marketing inter-écoles au Maroc.')

@section('content')

{{-- HERO --}}
<section class="hero-bg min-h-screen flex items-center relative overflow-hidden pt-16">
    {{-- Decorative elements --}}
    <div class="absolute top-1/4 right-10 w-64 h-64 rounded-full border border-orange/10 opacity-40"></div>
    <div class="absolute top-1/3 right-20 w-32 h-32 rounded-full border border-orange/20 opacity-40"></div>
    <div class="absolute bottom-20 left-10 w-3 h-3 bg-orange rounded-full opacity-60"></div>
    <div class="absolute top-40 left-1/3 w-2 h-2 bg-orange/40 rounded-full"></div>
    <div class="absolute top-60 right-1/3 w-1.5 h-1.5 bg-orange/60 rounded-full"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 grid lg:grid-cols-2 gap-12 items-center">
        <div class="fade-in">
            <div class="inline-flex items-center space-x-2 bg-orange/10 border border-orange/20 text-orange text-xs font-semibold px-4 py-2 rounded-full mb-6">
                <span class="w-2 h-2 bg-orange rounded-full animate-pulse"></span>
                <span>BIENVENUE CHEZ ENNOVA</span>
            </div>
            <h1 class="font-display font-bold text-5xl lg:text-6xl xl:text-7xl leading-[1.05] text-gray-900 dark:text-white mb-6">
                Ennova - Là où naissent<br>
                les futurs leaders du<br>
                <span class="gradient-text">marketing</span>
            </h1>
            <p class="text-gray-600 dark:text-gray-light text-lg leading-relaxed mb-8 max-w-lg">
                compétition nationale et plateforme podcast connectant étudiants, marques et
professionnels du marketing.
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('candidature') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-7 py-3.5 rounded-xl transition-colors orange-glow inline-flex items-center space-x-2">
                    <span>Postuler maintenant</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('competition') }}" class="border border-dark-border text-gray-900 dark:text-white font-semibold px-7 py-3.5 rounded-xl transition-colors hover:border-orange/40 inline-flex items-center space-x-2 glass">
                    <svg class="w-4 h-4 text-orange" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    <span>Découvrir Ennova</span>
                </a>
            </div>
        </div>
        <div class="relative hidden lg:block">
            <div class="relative z-10">
                <div class="bg-dark-card border border-dark-border rounded-2xl overflow-hidden" style="background: linear-gradient(135deg, #111118, #0A0A0F);">
                   <img src="{{ asset('images/image.png') }}" alt="Étudiants Ennova" class="w-full h-80 object-cover opacity-80">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark via-transparent to-transparent rounded-2xl"></div>
                </div>
                {{-- Floating stat card --}}
                <div class="absolute -bottom-6 -left-6 bg-dark-card border border-dark-border rounded-xl px-5 py-4 glass">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-orange/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                        </div>
                        <div>
                            <p class="font-display font-bold text-white text-lg">2500+</p>
                            <p class="text-gray-muted text-xs">Étudiants actifs</p>
                        </div>
                    </div>
                </div>
                <div class="absolute -top-4 -right-4 bg-orange rounded-xl px-4 py-3">
                    <p class="font-display font-bold text-white text-base">30+</p>
                    <p class="text-orange-light text-xs">Partenaires</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- STATS --}}
<section class="py-12 border-y border-dark-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-8 text-center">
            <div class="stat-card rounded-2xl p-6">
                <div class="w-12 h-12 bg-orange/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/></svg>
                </div>
                <p class="font-display font-bold text-3xl text-gray-900 dark:text-white">2500+</p>
                <p class="text-gray-500 dark:text-gray-muted text-sm mt-1">Étudiants accompagnés</p>
            </div>
            <div class="stat-card rounded-2xl p-6">
                <div class="w-12 h-12 bg-orange/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-orange" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/></svg>
                </div>
                <p class="font-display font-bold text-3xl text-gray-900 dark:text-white">120+</p>
                <p class="text-gray-500 dark:text-gray-muted text-sm mt-1">Projets réalisés</p>
            </div>
            <div class="stat-card rounded-2xl p-6">
                <div class="w-12 h-12 bg-orange/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/></svg>
                </div>
                <p class="font-display font-bold text-3xl text-gray-900 dark:text-white">30+</p>
                <p class="text-gray-500 dark:text-gray-muted text-sm mt-1">Partenaires actifs</p>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section class="py-20 section-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-orange text-xs font-semibold uppercase tracking-widest">À propos de Ennova</span>
                <h2 class="font-display font-bold text-4xl text-gray-900 dark:text-white mt-3 mb-6">La plateforme qui <span class="gradient-text">connecte</span> et inspire</h2>
                <p class="text-gray-700 dark:text-gray-light leading-relaxed mb-6">Ennova est une plateforme dédiée à l'innovation et à l'entrepreneuriat des jeunes. Nous accompagnons les étudiants dans la réalisation de leurs projets et leur ouverture sur le monde professionnel.</p>
                <p class="text-gray-700 dark:text-gray-light leading-relaxed mb-8">Notre mission est de créer des ponts entre les étudiants en marketing, les associations, les influenceurs, les professionnels et les entreprises pour un impact social réel.</p>
                <a href="{{ route('competition') }}" class="inline-flex items-center space-x-2 bg-dark-card border border-dark-border hover:border-orange/40 text-white font-semibold px-6 py-3 rounded-xl transition-colors">
                    <span>En savoir plus</span>
                    <svg class="w-4 h-4 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="relative">
                <div class="rounded-2xl overflow-hidden">
                   <img 
                     src="{{ asset('images/pic2.jpg') }}" 
                     alt="Ennova Event"
                     class="w-full h-72 object-cover"
        >
                    <div class="absolute inset-0 bg-gradient-to-t from-dark/60 to-transparent rounded-2xl"></div>
                </div>
                <div class="absolute top-4 right-4 flex items-center space-x-2 bg-dark/80 border border-dark-border rounded-lg px-3 py-2 glass">
                    <div class="w-6 h-6 bg-orange/20 rounded flex items-center justify-center">
                        <span class="text-orange text-xs font-bold">E</span>
                    </div>
                    <span class="text-white text-sm font-display font-bold">ennova</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BLOG ARTICLES --}}
@if($posts->count() > 0)
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-12">
            <div>
                <span class="text-orange text-xs font-semibold uppercase tracking-widest">Contenu</span>
                <h2 class="font-display font-bold text-3xl text-gray-900 dark:text-white mt-2">Articles récents</h2>
            </div>
            <a href="{{ route('blog.index') }}" class="text-orange text-sm font-semibold hover:text-orange-light transition-colors flex items-center space-x-1">
                <span>Voir tous les articles</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <article class="bg-dark-card border border-dark-border rounded-2xl overflow-hidden card-hover">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-44 object-cover">
                @else
                    <div class="w-full h-44 bg-dark-muted flex items-center justify-center">
                        <svg class="w-12 h-12 text-dark-border" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                @endif
                <div class="p-5">
                    @if($post->category)
                        <span class="text-orange text-xs font-semibold uppercase tracking-wider">{{ $post->category->name }}</span>
                    @endif
                    <h3 class="font-display font-bold text-white text-lg mt-2 mb-2 line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-gray-muted text-sm leading-relaxed mb-4 line-clamp-2">{{ $post->excerpt }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-muted text-xs">{{ $post->created_at->format('d M Y') }}</span>
                        <a href="{{ route('blog.show', $post) }}" class="text-orange text-sm font-semibold hover:text-orange-light transition-colors">Lire plus →</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- PARTNERS --}}
@if($partners->count() > 0)
<section class="py-16 border-t border-dark-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10">
            <h2 class="font-display font-bold text-2xl text-gray-900 dark:text-white">Nos partenaires</h2>
            <a href="{{ route('partners') }}" class="text-orange text-sm font-semibold hover:text-orange-light transition-colors flex items-center space-x-1">
                <span>Voir tous les partenaires</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-10">
            @foreach($partners->take(6) as $partner)
                @if($partner->logo)
                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-10 partner-logo object-contain">
                @else
                    <span class="text-gray-muted font-display font-bold text-lg opacity-50 hover:opacity-80 transition-opacity">{{ $partner->name }}</span>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA SECTION --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="bg-gradient-to-br from-orange/10 to-transparent border border-orange/20 rounded-3xl p-12">
                <h2 class="font-display font-bold text-4xl lg:text-5xl text-gray-900 dark:text-white mb-4">Prêt à rejoindre <span class="gradient-text">Ennova</span> ?</h2>
                <p class="text-gray-700 dark:text-gray-light text-lg mb-8 max-w-xl mx-auto">Postulez dès maintenant et faites partie de la prochaine génération de leaders du marketing au Maroc.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('candidature') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-4 rounded-xl transition-colors orange-glow text-lg">
                    Postuler maintenant
                </a>
                <a href="{{ route('contact') }}" class="border border-dark-border hover:border-orange/40 text-gray-900 dark:text-white font-semibold px-8 py-4 rounded-xl transition-colors glass text-lg">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</section>

@endsection