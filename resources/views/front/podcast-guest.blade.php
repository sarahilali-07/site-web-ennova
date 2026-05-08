@extends('front.layouts.app')
@section('title', 'Devenir invité(e) - Podcast Ennova')

@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">Rejoindre notre plateforme</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-4">Devenir invité(e) du Podcast Ennova</h1>
            <p class="text-gray-800 dark:text-gray-light text-lg">Partagez votre expertise et inspirez la prochaine génération de marketeurs engagés.</p>
        </div>

        <div class="bg-dark-card border border-dark-border rounded-3xl p-8 lg:p-10">
            {{-- Info section --}}
            <div class="bg-dark rounded-2xl p-6 mb-8 border border-dark-border">
                <div class="flex items-start space-x-4">
                    <div class="w-8 h-8 bg-orange/20 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-orange" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0zM5 7a1 1 0 11-2 0 1 1 0 012 0zm4-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/></svg>
                    </div>
                    <div>
                        <p class="text-white font-semibold mb-1">Qu'est-ce que le Podcast Ennova ?</p>
                        <p class="text-gray-muted text-sm">Le Podcast Ennova met en lumière des professionnels du marketing, des acteurs associatifs et des experts engagés. Nous inspirons, partageons des expériences réelles et valorisons l'engagement stratégique.</p>
                    </div>
                </div>
            </div>

            @if($errors->any())
                <div class="bg-red-900/30 border border-red-700/50 rounded-xl p-4 mb-6">
                    <ul class="text-red-400 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('podcast-guest.store') }}" class="space-y-6">
                @csrf

                {{-- Personal Information --}}
                <div>
                    <h3 class="font-display font-bold text-white mb-4">Informations personnelles</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-white text-sm font-medium mb-2">Nom complet <span class="text-orange">*</span></label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Votre nom complet" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-white text-sm font-medium mb-2">Fonction <span class="text-orange">*</span></label>
                                <input type="text" name="position" value="{{ old('position') }}" placeholder="ex: Directeur Marketing" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                            </div>
                            <div>
                                <label class="block text-white text-sm font-medium mb-2">Organisation <span class="text-orange">*</span></label>
                                <input type="text" name="organization" value="{{ old('organization') }}" placeholder="Nom de votre entreprise/org" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-white text-sm font-medium mb-2">Email <span class="text-orange">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="votre@email.com" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                            </div>
                            <div>
                                <label class="block text-white text-sm font-medium mb-2">Téléphone <span class="text-orange">*</span></label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="06 12 34 56 78" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Podcast Theme --}}
                <div class="pt-6 border-t border-dark-border">
                    <h3 class="font-display font-bold text-white mb-4">Thématique</h3>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Sujet proposé pour le podcast <span class="text-orange">*</span></label>
                        <input type="text" name="topic" value="{{ old('topic') }}" placeholder="ex: Le marketing responsable en 2026" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                </div>

                {{-- Motivation --}}
                <div class="pt-6 border-t border-dark-border">
                    <h3 class="font-display font-bold text-white mb-4">Motivation</h3>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Pourquoi souhaitez-vous intervenir dans Ennova Podcast ? <span class="text-orange">*</span></label>
                        <textarea name="motivation" rows="5" placeholder="Expliquez-nous pourquoi vous souhaitez partager votre expertise avec notre communauté..." required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors resize-none">{{ old('motivation') }}</textarea>
                    </div>
                </div>

                {{-- Terms --}}
                <div class="pt-6 border-t border-dark-border">
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" name="terms" id="terms" required class="mt-1 w-4 h-4 accent-orange">
                        <label for="terms" class="text-gray-light text-sm">Je confirme que les informations fournies sont exactes et j'accepte de participer au Podcast Ennova. <span class="text-orange">*</span></label>
                    </div>
                </div>

                <button type="submit" class="w-full bg-orange hover:bg-orange-dark text-white font-semibold py-4 rounded-xl transition-colors orange-glow text-base mt-8">
                    Soumettre ma candidature
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
