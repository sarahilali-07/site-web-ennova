@extends('front.layouts.app')

@section('title', 'Connexion')

@section('content')
<section class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-20">
    <div class="max-w-lg w-full bg-dark border border-dark-border rounded-[2rem] p-10 shadow-[0_20px_80px_rgba(0,0,0,0.35)]">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-white">Connexion</h1>
            <p class="text-gray-400 mt-2">Connectez-vous pour accéder à l'espace administrateur.</p>
        </div>

        @if(session('error'))
            <div class="mb-6 rounded-xl border border-red-700 bg-red-900/80 px-4 py-3 text-sm text-red-100">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-xl border border-red-700 bg-red-900/80 px-4 py-3 text-sm text-red-100">
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-300 mb-2">Adresse email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    class="w-full rounded-3xl border border-dark-border bg-[#111118] px-5 py-3 text-white placeholder:text-gray-500 outline-none focus:border-orange focus:ring-2 focus:ring-orange/20" />
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-300 mb-2">Mot de passe</label>
                <input id="password" name="password" type="password" required
                    class="w-full rounded-3xl border border-dark-border bg-[#111118] px-5 py-3 text-white placeholder:text-gray-500 outline-none focus:border-orange focus:ring-2 focus:ring-orange/20" />
            </div>

            <div class="flex items-center justify-between text-sm text-gray-400">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="remember" class="h-4 w-4 rounded border-gray-600 bg-[#111118] text-orange focus:ring-orange" />
                    Se souvenir de moi
                </label>
                <a href="{{ route('home') }}" class="text-orange hover:text-orange-light">Retour à l'accueil</a>
            </div>

            <button type="submit" class="w-full rounded-[1.5rem] bg-orange hover:bg-orange-dark px-5 py-3 text-sm font-semibold text-white transition-colors orange-glow">
                Se connecter
            </button>
        </form>
    </div>
</section>
@endsection
