<!DOCTYPE html>
<html lang="{{ session('locale', config('app.locale')) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('messages.admin.dashboard')) | {{ __('messages.admin.title') }}</title>
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
                        light: { DEFAULT: '#FFFFFF', card: '#F3F4F6', border: '#E5E7EB', muted: '#D1D5DB' }
                    },
                    fontFamily: { display: ['Cabinet Grotesk', 'sans-serif'], body: ['DM Sans', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        * { font-family: 'DM Sans', sans-serif; }
        html { transition: background-color 0.3s ease, color 0.3s ease; }
        body { background-color: #0A0A0F; color: #fff; }
        html.dark body { background-color: #0A0A0F; color: #fff; }
        html:not(.dark) body { background-color: #f5f5f5; color: #111827; }
        .sidebar-link { display: flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 10px; color: #9CA3AF; font-size: 0.875rem; transition: all 0.2s; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,107,43,0.1); color: #FF6B2B; }
        .sidebar-link.active { border-left: 3px solid #FF6B2B; padding-left: 11px; }
        html:not(.dark) .sidebar-link { color: #1F2937; }
        html:not(.dark) .sidebar-link:hover, html:not(.dark) .sidebar-link.active { background: rgba(255,107,43,0.1); color: #FF6B2B; }
        .status-badge { padding: 2px 10px; border-radius: 9999px; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }
        .status-pending { background: rgba(251,191,36,0.15); color: #D97706; }
        .status-review { background: rgba(59,130,246,0.15); color: #2563EB; }
        .status-accepted { background: rgba(34,197,94,0.15); color: #16A34A; }
        .status-rejected { background: rgba(239,68,68,0.15); color: #DC2626; }
        html:not(.dark) .status-pending { background: rgba(251,191,36,0.12); color: #92400E; }
        html:not(.dark) .status-review { background: rgba(59,130,246,0.12); color: #1D4ED8; }
        html:not(.dark) .status-accepted { background: rgba(34,197,94,0.12); color: #166534; }
        html:not(.dark) .status-rejected { background: rgba(239,68,68,0.12); color: #991B1B; }
        html:not(.dark) .text-gray-500 { color: #4B5563; }
    </style>
    @include('partials.typography')
</head>
<body>
<div class="flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="w-60 border-r border-gray-200 dark:border-dark-border flex-shrink-0 flex flex-col transition-colors bg-white dark:bg-dark-card">
        <div class="p-5 border-b border-gray-200 dark:border-dark-border bg-white dark:bg-black">
            <div class="flex items-center space-x-2">
               <div class="flex items-center gap-3">
     <img 
        src="{{ asset('images/logoDark.png') }}" 
        alt="Ennova Logo"
        class="h-10 w-auto object-contain block dark:hidden"
    >
    <img 
        src="{{ asset('images/logolight.png') }}" 
        alt="Ennova Logo"
        class="h-10 w-auto object-contain hidden dark:block"
    >

    
           </div>
            </div>
        </div>
        <nav class="flex-1 p-4 space-y-1">
            <p class="text-gray-800 dark:text-gray-600 text-xs uppercase tracking-wider px-3 py-2 font-semibold">{{ __('messages.admin.sidebar.dashboard') }}</p>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"/></svg>
                {{ __('messages.admin.sidebar.dashboard') }}
            </a>
            <a href="{{ route('admin.candidates.index') }}" class="sidebar-link {{ request()->routeIs('admin.candidates.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ __('messages.admin.sidebar.candidates') }}
            </a>
            <p class="text-gray-800 dark:text-gray-600 text-xs uppercase tracking-wider px-3 py-2 mt-4 font-semibold">{{ __('messages.admin.sidebar.posts') }}</p>
            <a href="{{ route('admin.posts.index') }}" class="sidebar-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                {{ __('messages.admin.sidebar.posts') }}
            </a>
            <a href="{{ route('admin.podcasts.index') }}" class="sidebar-link {{ request()->routeIs('admin.podcasts.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                {{ __('messages.admin.sidebar.podcasts') }}
            </a>
            <a href="{{ route('admin.partners.index') }}" class="sidebar-link {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2"/></svg>
                {{ __('messages.admin.sidebar.partners') }}
            </a>
            <a href="{{ route('admin.social-links.index') }}" class="sidebar-link {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5c-4.694 0-8.5 3.806-8.5 8.5S7.306 21.5 12 21.5 20.5 17.694 20.5 13 16.694 4.5 12 4.5zm0 3a2.5 2.5 0 110 5 2.5 2.5 0 010-5zm0 10.5c-2.675 0-5.04-1.503-6.186-3.75.034-1.992 3.988-3.082 6.186-3.082 2.198 0 6.154 1.09 6.188 3.082C17.04 16.497 14.675 17.5 12 17.5z"/></svg>
                {{ __('messages.admin.sidebar.social') }}
            </a>
            <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ __('messages.admin.sidebar.settings') }}
            </a>
            <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                {{ __('messages.admin.sidebar.messages') }}
            </a>
        </nav>
        <div class="p-4 border-t border-gray-200 dark:border-dark-border">
            <div class="flex items-center space-x-3 mb-3">
                <div class="w-8 h-8 bg-orange/20 rounded-full flex items-center justify-center">
                    <span class="text-orange text-xs font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <p class="text-gray-900 dark:text-white text-sm font-medium truncate max-w-[110px]">{{ auth()->user()->name }}</p>
                    <p class="text-gray-500 dark:text-gray-500 text-xs">{{ __('messages.admin.title') }}</p>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('home') }}" class="flex-1 text-center text-xs text-gray-800 dark:text-gray-500 hover:text-orange dark:hover:text-orange py-2 border border-gray-200 dark:border-dark-border rounded-lg transition-colors">{{ __('messages.nav.home') }}</a>
                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full text-xs text-gray-800 dark:text-gray-500 hover:text-red-400 dark:hover:text-red-400 py-2 border border-gray-200 dark:border-dark-border rounded-lg transition-colors">{{ __('messages.admin.sidebar.logout') }}</button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="border-b border-gray-200 dark:border-dark-border px-6 py-4 flex items-center justify-between bg-white dark:bg-black text-gray-800 dark:text-white transition-colors">
            <h1 class="font-display font-bold text-gray-900 dark:text-white text-xl dark:text-xl">@yield('page-title', __('messages.admin.dashboard'))</h1>
            <div class="flex items-center space-x-4">
                @if(session('success'))
                    <div class="bg-green-50 dark:bg-green-900/50 border border-green-200 dark:border-green-700/50 text-green-700 dark:text-green-400 px-4 py-2 rounded-lg text-sm">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="bg-red-50 dark:bg-red-900/50 border border-red-200 dark:border-red-700/50 text-red-700 dark:text-red-400 px-4 py-2 rounded-lg text-sm">{{ session('error') }}</div>
                @endif
                <div class="text-gray-800 dark:text-white text-sm">{{ now()->format('d M Y') }}</div>
                
                {{-- Theme Toggle --}}
                <button data-theme-toggle class="text-gray-800 dark:text-white hover:text-orange dark:hover:text-orange transition-colors p-2.5 rounded-lg bg-white dark:bg-black border border-gray-200 dark:border-dark-border hover:border-orange/30 ml-2">
                    <svg data-sun-icon class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1m-16 0H1m15.364 1.636l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <svg data-moon-icon class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>
            </div>
        </header>
        <main class="flex-1 overflow-y-auto p-6">
            @yield('admin-content')
        </main>
    </div>
</div>
<script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>
