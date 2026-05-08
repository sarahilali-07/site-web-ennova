@extends('front.layouts.app')
@section('title', 'La Compétition')

@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Hero --}}
        <div class="text-center mb-16 max-w-3xl mx-auto">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">Compétition nationale</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-5">Marketing inter-écoles au <span class="gradient-text">Maroc</span></h1>
            <p class="text-gray-700 dark:text-gray-light text-lg leading-relaxed">La compétition Ennova connecte des étudiants en marketing, des associations, des influenceurs, des professionnels, des écoles et des entreprises autour du marketing responsable et de l'impact social.</p>
        </div>

        {{-- Who can participate --}}
        <div class="grid md:grid-cols-2 gap-6 mb-16">
            <div class="bg-dark-card border border-dark-border rounded-2xl p-7">
                <div class="w-12 h-12 bg-orange/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/></svg>
                </div>
                <h3 class="font-display font-bold text-white text-xl mb-3">Étudiants en marketing</h3>
                <p class="text-gray-light text-sm leading-relaxed">Étudiants en Master Marketing ou équivalent dans n'importe quelle école ou université au Maroc. Travaillez en équipes sur des briefs réels proposés par des associations partenaires.</p>
            </div>
            <div class="bg-dark-card border border-dark-border rounded-2xl p-7">
                <div class="w-12 h-12 bg-orange/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/></svg>
                </div>
                <h3 class="font-display font-bold text-white text-xl mb-3">Associations partenaires</h3>
                <p class="text-gray-light text-sm leading-relaxed">Des associations engagées qui proposent un brief réel avec des objectifs concrets. Les étudiants créent une campagne marketing complète pour votre cause.</p>
            </div>
        </div>

        {{-- Steps --}}
        <div class="mb-16">
            <h2 class="font-display font-bold text-3xl text-gray-900 dark:text-white text-center mb-10">Comment ça se passe ?</h2>
            <div class="relative">
                <div class="absolute left-8 top-0 bottom-0 w-px bg-dark-border hidden md:block"></div>
                <div class="space-y-6">
                    @php $steps = [
                        ['num'=>'01','title'=>'Sélection des écoles','desc'=>'Identifier et inviter 10 grandes écoles et universités de marketing. Chaque école désigne une équipe de 3 étudiants en 2e année de Master pour représenter leur établissement.'],
                        ['num'=>'02','title'=>'Briefing','desc'=>"Chaque équipe reçoit un brief réel proposé par une association partenaire. Le brief contient : objectifs de l'association, contexte, besoins, et contraintes."],
                        ['num'=>'03','title'=>'Conception stratégique','desc'=>'Les étudiants disposent de 48 à 72 heures pour imaginer une campagne marketing complète. Chaque équipe est accompagnée d\'un influenceur de son choix. Livrables : Nom de campagne, Concept créatif, Plan de diffusion, Budget prévisionnel, Pitch vidéo 30 secondes.'],
                        ['num'=>'04','title'=>'Pré-évaluation','desc'=>'Les équipes reçoivent des retours constructifs permettant d\'améliorer la stratégie finale et de mieux se préparer pour le grand jour.'],
                        ['num'=>'05','title'=>'Journée de présentation','desc'=>'Événement organisé à Kenzi Tower ou un espace de co-working. Chaque équipe présente son projet devant un jury de professionnels, un influenceur partenaire, un professeur universitaire, un directeur commercial, un entrepreneur et un responsable marketing.'],
                        ['num'=>'06','title'=>'Délibération & remise des prix','desc'=>'Trois prix sont décernés : Meilleure campagne globale, Prix de l\'impact associatif, et Prix du public (votes en live lors de l\'événement).'],
                    ]; @endphp
                    @foreach($steps as $step)
                    <div class="flex items-start space-x-6 pl-0 md:pl-0 relative">
                        <div class="w-16 h-16 bg-orange rounded-xl flex items-center justify-center flex-shrink-0 z-10">
                            <span class="font-display font-bold text-white text-sm">{{ $step['num'] }}</span>
                        </div>
                        <div class="bg-dark-card border border-dark-border rounded-xl p-5 flex-1">
                            <h3 class="font-display font-bold text-white text-lg mb-1">{{ $step['title'] }}</h3>
                            <p class="text-gray-muted text-sm">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Brief Competition Info --}}
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
                <h3 class="font-display font-bold text-xl text-white mb-3">Objectif du brief</h3>
                <p class="text-gray-light text-sm leading-relaxed">Développer une stratégie marketing complète pour améliorer la notoriété et l'engagement de l'association partenaire.</p>
            </div>
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
                <h3 class="font-display font-bold text-xl text-white mb-3">Attentes</h3>
                <ul class="text-gray-light text-sm space-y-2">
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>Analyse de la situation</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>Définition des cibles</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>Positionnement stratégique</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>Plan d'action digital/offline</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>Recommandations créatives</span>
                    </li>
                </ul>
            </div>
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
                <h3 class="font-display font-bold text-xl text-white mb-3">Livrable final</h3>
                <p class="text-gray-light text-sm leading-relaxed">Présentation stratégique devant le jury incluant un Pitch et un support visuel complet montrant votre compréhension de l'association et votre approche créative.</p>
            </div>
        </div>

        {{-- Deliverables --}}
        <div class="bg-dark-card border border-dark-border rounded-3xl p-8 mb-12">
            <h2 class="font-display font-bold text-2xl text-white mb-6">Livrables attendus par les équipes</h2>
            <div class="grid md:grid-cols-3 gap-4">
                @php $deliverables = ['Nom de campagne', 'Concept créatif', 'Plan de diffusion', 'Budget prévisionnel', 'Pitch vidéo 30 secondes', 'Stratégie digitale']; @endphp
                @foreach($deliverables as $d)
                <div class="flex items-center space-x-3 bg-dark rounded-xl p-4">
                    <div class="w-5 h-5 bg-orange rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    </div>
                    <span class="text-gray-light text-sm">{{ $d }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('candidature') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-10 py-4 rounded-xl transition-colors orange-glow text-lg inline-block">Participer →</a>
        </div>
    </div>
</div>
@endsection