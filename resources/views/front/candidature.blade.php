@extends('front.layouts.app')
@section('title', 'Postuler à Ennova')

@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">Rejoindre</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-4">Postuler à Ennova</h1>
            <p class="text-gray-800 dark:text-gray-light text-lg">Remplissez le formulaire ci-dessous pour rejoindre notre communauté de jeunes innovateurs.</p>
        </div>

        <div class="bg-dark-card border border-dark-border rounded-3xl p-8 lg:p-10">
            @if($errors->any())
                <div class="bg-red-900/30 border border-red-700/50 rounded-xl p-4 mb-6">
                    <ul class="text-red-400 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('candidature.store') }}" class="space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Nom complet <span class="text-orange">*</span></label>
                        <input type="text" name="nom" value="{{ old('last_name') }}" placeholder="Votre nom" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Prénom <span class="text-orange">*</span></label>
                        <input type="text" name="prenom" value="{{ old('first_name') }}" placeholder="Votre prénom" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Email <span class="text-orange">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="votre@email.com" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Téléphone (optionnel)</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="06 12 34 56 78" class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                </div>
                <div>
                    <label class="block text-white text-sm font-medium mb-2">École / Université <span class="text-orange">*</span></label>
                    <input type="text" name="school" value="{{ old('school') }}" placeholder="Votre établissement" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Niveau d'études</label>
                        <select name="level" class="w-full bg-dark border border-dark-border text-gray-light text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50 transition-colors">
                            <option value="">Sélectionner</option>
                            <option value="Master 1">Master 1</option>
                            <option value="Master 2">Master 2</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Spécialité</label>
                        <input type="text" name="specialty" value="{{ old('specialty') }}" placeholder="Marketing, Communication..." class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                </div>

                {{-- Academic Profile Section --}}
                <div class="pt-6 border-t border-dark-border">
                    <h3 class="font-display font-bold text-white mb-4">Profil académique</h3>
                    
                    <div class="mb-6">
                        <label class="block text-white text-sm font-medium mb-3">Avez-vous déjà participé à une compétition ? <span class="text-orange">*</span></label>
                        <div class="flex items-center space-x-6">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="previous_competition" value="yes" {{ old('previous_competition') === 'yes' ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm">Oui</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="previous_competition" value="no" {{ old('previous_competition') === 'no' ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm">Non</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-white text-sm font-medium mb-3">Compétences principales <span class="text-orange">*</span></label>
                        <div class="space-y-3">
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Stratégie" {{ in_array('Stratégie', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">Stratégie</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Marketing digital" {{ in_array('Marketing digital', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">Marketing digital</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Création de contenu" {{ in_array('Création de contenu', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">Création de contenu</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Analyse de données" {{ in_array('Analyse de données', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">Analyse de données</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Autre" {{ in_array('Autre', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">Autre (préciser)</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <input type="text" name="other_skills" value="{{ old('other_skills') }}" placeholder="Autres compétences..." class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors mt-3">
                    </div>
                </div>
                
                <div>
                    <label class="block text-white text-sm font-medium mb-2">Motivation <span class="text-orange">*</span></label>
                    <textarea name="motivation" rows="5" placeholder="Expliquez-nous pourquoi vous souhaitez rejoindre Ennova..." required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors resize-none">{{ old('motivation') }}</textarea>
                </div>
                <div class="flex items-start space-x-3">
                    <input type="checkbox" name="agree" id="agree" required class="mt-1 w-4 h-4 accent-orange">
                    <label for="agree" class="text-gray-light text-sm">J'accepte le règlement de la compétition Ennova et confirme être étudiant(e) actuellement inscrit(e). <span class="text-orange">*</span></label>
                </div>
                <button type="submit" class="w-full bg-orange hover:bg-orange-dark text-white font-semibold py-4 rounded-xl transition-colors orange-glow text-base">
                    Envoyer ma candidature
                </button>
            </form>
        </div>
    </div>
</div>
@endsection