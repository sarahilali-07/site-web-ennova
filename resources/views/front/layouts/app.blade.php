<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Ennova - Marketers Ready To Be. Compétition nationale de marketing inter-écoles au Maroc.')">
    <title>@yield('title', 'Ennova') | Marketers Ready To Be</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        orange: { DEFAULT: '#FF6B2B', dark: '#E85A1A', light: '#FF8C55' },
                        dark: { DEFAULT: '#0A0A0F', card: '#111118', border: '#1E1E2E', muted: '#2A2A3A' },
                        gray: { muted: '#6B7280', light: '#9CA3AF' },
                        light: { DEFAULT: '#FFFFFF', card: '#F3F4F6', border: '#E5E7EB', muted: '#D1D5DB' }
                    },
                    fontFamily: {
                        display: ['Cabinet Grotesk', 'sans-serif'],
                        body: ['DM Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        * { font-family: 'DM Sans', sans-serif; }
        html { transition: background-color 0.3s ease, color 0.3s ease; }
        body { background-color: #0A0A0F; color: #fff; }
        html.dark body { background-color: #0A0A0F; color: #fff; }
        html:not(.dark) body { background-color: #F9FAFB; color: #111827; }
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; bottom: -4px; left: 0; width: 0; height: 2px; background: #FF6B2B; transition: width 0.3s ease; }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .orange-glow { box-shadow: 0 0 30px rgba(255,107,43,0.3); }
        .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,0.4); }
        .gradient-text { background: linear-gradient(135deg, #FF6B2B, #FFB347); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .hero-bg { background: radial-gradient(ellipse at 70% 50%, rgba(255,107,43,0.12) 0%, transparent 60%), radial-gradient(ellipse at 20% 80%, rgba(255,107,43,0.06) 0%, transparent 50%), #0A0A0F; }
        html:not(.dark) .hero-bg { background: radial-gradient(ellipse at 70% 50%, rgba(255,107,43,0.08) 0%, transparent 60%), radial-gradient(ellipse at 20% 80%, rgba(255,107,43,0.04) 0%, transparent 50%), #F9FAFB; }
        .section-bg { background: linear-gradient(180deg, #0A0A0F 0%, #0F0F1A 50%, #0A0A0F 100%); }
        html:not(.dark) .section-bg { background: linear-gradient(180deg, #F9FAFB 0%, #F3F4F6 50%, #F9FAFB 100%); }
        .glass { background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.06); }
        html:not(.dark) .glass { background: rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.06); }
        .stat-card { background: linear-gradient(135deg, #111118, #1A1A2E); border: 1px solid #1E1E2E; }
        html:not(.dark) .stat-card { background: linear-gradient(135deg, #F3F4F6, #E5E7EB); border: 1px solid #D1D5DB; }
        .partner-logo { filter: brightness(0) invert(1); opacity: 0.5; transition: opacity 0.3s; }
        html:not(.dark) .partner-logo { filter: brightness(1) invert(0); }
        .partner-logo:hover { opacity: 1; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .fade-in { animation: fadeInUp 0.6s ease forwards; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
    </style>
    @include('partials.typography')
    @stack('styles')
</head>
<body class="antialiased">

    {{-- Navigation --}}
    <nav class="fixed top-0 left-0 right-0 z-50 border-b border-dark-border dark:border-dark-border bg-white dark:bg-dark-default transition-colors" style="background: rgba(10,10,15,0.95); --tw-bg-opacity: 0.95;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
 <a href="{{ route('home') }}" class="flex items-center">

    <!-- Logo Light Mode -->
    <img 
        src="{{ asset('images/logolight.png') }}" 
        alt="Ennova Logo"
        class="h-12 w-auto dark:hidden"
    >

    <!-- Logo Dark Mode -->
    <img 
        src="{{ asset('images/logolight.png') }}" 
        alt="Ennova Logo"
        class="hidden dark:block h-12 w-auto"
    >

</a>

                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="nav-link text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{ request()->routeIs('home') ? 'active text-gray-900 dark:text-white' : '' }}">Accueil</a>
                    <a href="{{ route('competition') }}" class="nav-link text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{ request()->routeIs('competition') ? 'active text-gray-900 dark:text-white' : '' }}">Compétition</a>
                    <a href="{{ route('blog.index') }}" class="nav-link text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{ request()->routeIs('blog.*') ? 'active text-gray-900 dark:text-white' : '' }}">Blog</a>
                    <a href="{{ route('podcast.index') }}" class="nav-link text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{ request()->routeIs('podcast.*') ? 'active text-gray-900 dark:text-white' : '' }}">Podcast</a>
                    <a href="{{ route('associations') }}" class="nav-link text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{ request()->routeIs('associations') ? 'active text-gray-900 dark:text-white' : '' }}">Associations</a>
                    <a href="{{ route('partners') }}" class="nav-link text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{ request()->routeIs('partners') ? 'active text-gray-900 dark:text-white' : '' }}">Partenaires</a>
                    <a href="{{ route('contact') }}" class="nav-link text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors {{ request()->routeIs('contact') ? 'active text-gray-900 dark:text-white' : '' }}">Contact</a>
                </div>

                {{-- CTA --}}
                <div class="flex items-center space-x-3">
                    {{-- Theme Toggle --}}
                    <button data-theme-toggle class="text-gray-600 dark:text-gray-400 hover:text-orange dark:hover:text-orange transition-colors p-2.5 rounded-lg dark:bg-dark-card bg-light-card dark:border-dark-border border border-light-border hover:border-orange/30">
                        <svg data-sun-icon class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1m-16 0H1m15.364 1.636l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <svg data-moon-icon class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                    </button>

                    @guest
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors hidden md:block">Connexion</a>
                    @endguest

                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="bg-orange hover:bg-orange-dark text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors orange-glow">
                                Admin Panel
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors">Déconnexion</button>
                        </form>
                    @endauth

                    <a href="{{ route('candidature') }}" class="bg-orange hover:bg-orange-dark text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors orange-glow">
                        Postuler
                    </a>
                    {{-- Mobile menu button --}}
                    <button id="mobile-menu-btn" class="md:hidden text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>
        {{-- Mobile menu --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-dark-border dark:border-dark-border bg-white dark:bg-dark transition-colors">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('home') }}" class="block text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white py-2 transition-colors">Accueil</a>
                <a href="{{ route('competition') }}" class="block text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white py-2 transition-colors">Compétition</a>
                <a href="{{ route('blog.index') }}" class="block text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white py-2 transition-colors">Blog</a>
                <a href="{{ route('podcast.index') }}" class="block text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white py-2 transition-colors">Podcast</a>
                <a href="{{ route('associations') }}" class="block text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white py-2 transition-colors">Associations</a>
                <a href="{{ route('partners') }}" class="block text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white py-2 transition-colors">Partenaires</a>
                <a href="{{ route('contact') }}" class="block text-sm text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white py-2 transition-colors">Contact</a>
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="fixed top-20 right-4 z-50 bg-green-900/90 border border-green-700 text-green-300 px-6 py-4 rounded-lg shadow-lg max-w-sm" id="flash-msg">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span class="text-sm">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="fixed top-20 right-4 z-50 bg-red-900/90 border border-red-700 text-red-300 px-6 py-4 rounded-lg shadow-lg max-w-sm" id="flash-msg">
            <span class="text-sm">{{ session('error') }}</span>
        </div>
    @endif

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-dark-border dark:border-dark-border bg-white dark:bg-dark-default transition-colors mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div class="md:col-span-1">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-orange rounded-lg flex items-center justify-center">
                            <span class="text-white font-display font-bold text-sm">E</span>
                        </div>
                        <span class="font-display font-bold text-xl text-gray-900 dark:text-white">ennova</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-light text-sm leading-relaxed mb-6">Ennova accompagne les jeunes talents dans leurs projets innovants et créatifs.</p>
                    @if(isset($socialLinks) && $socialLinks->count())
                    <div class="mt-6">
                        <p class="text-gray-500 dark:text-gray-400 text-xs uppercase tracking-wider mb-3">Suivez-nous</p>
                        <div class="flex space-x-3">
                            @foreach($socialLinks as $link)
                                @if($link->url)
                                    <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" title="{{ $link->platform }}" class="w-9 h-9 rounded-lg bg-dark-card border border-dark-border flex items-center justify-center text-gray-muted hover:text-orange hover:border-orange transition-colors">
                                        @switch($link->platform)
                                            @case('Instagram')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5z"/><path d="M12 7.25a4.75 4.75 0 110 9.5 4.75 4.75 0 010-9.5zm0 1.5a3.25 3.25 0 100 6.5 3.25 3.25 0 000-6.5z"/><circle cx="17.75" cy="6.25" r="1.25"/></svg>
                                                @break
                                            @case('Facebook')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.99H7.898v-2.89h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562v1.875h2.773l-.443 2.89h-2.33v6.99C18.343 21.128 22 16.991 22 12z"/></svg>
                                                @break
                                            @case('LinkedIn')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM.5 8.5h4V24h-4V8.5zm7.5 0h3.714v2.118h.053c.517-.98 1.782-2.012 3.665-2.012 3.921 0 4.646 2.583 4.646 5.94V24h-4V14.5c0-2.24-.04-5.125-3.125-5.125-3.126 0-3.604 2.445-3.604 4.97V24h-4V8.5z"/></svg>
                                                @break
                                            @case('YouTube')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                                @break
                                            @case('TikTok')
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.12 2v7.15a4.34 4.34 0 01-2.67-.98 4.58 4.58 0 00.02 7.41 4.4 4.4 0 004.34.13v3.1a7.48 7.48 0 01-4.32 1.34 7.53 7.53 0 01-7.56-7.48 7.53 7.53 0 017.53-7.52V2h2.16z"/></svg>
                                                @break
                                            @default
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg>
                                        @endswitch
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <div>
                    <h4 class="font-display font-semibold text-gray-900 dark:text-white mb-4">Liens rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">Accueil</a></li>
                        <li><a href="{{ route('competition') }}" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">Compétition</a></li>
                        <li><a href="{{ route('candidature') }}" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">Candidature</a></li>
                        <li><a href="{{ route('associations') }}" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">Associations</a></li>
                        <li><a href="{{ route('podcast.index') }}" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">Podcast</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-display font-semibold text-gray-900 dark:text-white mb-4">Ressources</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('blog.index') }}" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">Blog</a></li>
                        <li><a href="{{ route('partners') }}" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">Partenaires</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">Mentions légales</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-light text-sm hover:text-gray-900 dark:hover:text-orange transition-colors">Politique de confidentialité</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-display font-semibold text-gray-900 dark:text-white mb-4">Contact</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-2 text-gray-600 dark:text-gray-light text-sm">
                            <svg class="w-4 h-4 text-orange flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                            <a href="mailto:ennova.contact@gmail.com" class="hover:text-orange transition-colors">ennova.contact@gmail.com</a>
                        </li>
                        <li class="flex items-center space-x-2 text-gray-600 dark:text-gray-light text-sm">
                            <svg class="w-4 h-4 text-orange flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                            <a href="tel:+212668435244" class="hover:text-orange transition-colors">+212 668-435244</a>
                        </li>
                        <li class="flex items-center space-x-2 text-gray-600 dark:text-gray-light text-sm">
                            <svg class="w-4 h-4 text-orange flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                            <span>casablanca, Maroc</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-dark-border dark:border-dark-border mt-12 pt-8 text-center">
                <p class="text-gray-600 dark:text-gray-muted text-sm">© {{ date('Y') }} Ennova. Tous droits réservés. Porté par <span class="text-orange">Enna Digital</span></p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        // Auto-hide flash messages
        setTimeout(() => { document.getElementById('flash-msg')?.remove(); }, 4000);
    </script>
    @stack('scripts')
    <script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>