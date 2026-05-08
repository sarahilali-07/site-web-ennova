@extends('front.layouts.app')
@section('title', 'Associations')
@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">Partenariat</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-4">Associations</h1>
            <p class="text-gray-800 dark:text-gray-light text-lg max-w-2xl mx-auto">Ennova offre aux associations une stratégie de communication complète, développée par des étudiants en marketing encadrés par des professionnels.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mb-14">
            @php $benefits = [
                ['icon'=>'🎯', 'title'=>'Stratégie marketing', 'desc'=>'Une équipe d\'étudiants motivés développe une stratégie de communication complète pour votre association.'],
                ['icon'=>'📱', 'title'=>'Campagne digitale', 'desc'=>'Production d\'une campagne publicitaire digitale selon les conditions du concours, adaptée à votre cible.'],
                ['icon'=>'🤝', 'title'=>'Accompagnement expert', 'desc'=>'Conseil et accompagnement par des professionnels tout au long de la compétition pour garantir des résultats de qualité.'],
            ]; @endphp
            @foreach($benefits as $b)
            <div class="bg-dark-card border border-dark-border rounded-2xl p-7 card-hover">
                <div class="text-3xl mb-4">{{ $b['icon'] }}</div>
                <h3 class="font-display font-bold text-white text-xl mb-3">{{ $b['title'] }}</h3>
                <p class="text-gray-muted text-sm leading-relaxed">{{ $b['desc'] }}</p>
            </div>
            @endforeach
        </div>
        <div class="bg-dark-card border border-dark-border rounded-3xl p-8 mb-10">
            <h2 class="font-display font-bold text-2xl text-white mb-4">Comment ça marche ?</h2>
            <p class="text-gray-light leading-relaxed mb-4">Chaque association partenaire d'Ennova soumet un <strong class="text-white">brief associatif</strong> qui inclut les objectifs, le contexte, les besoins, les contraintes et les enjeux de communication. Ce brief devient le point de départ de la compétition.</p>
            <p class="text-gray-light leading-relaxed">Les équipes d'étudiants en marketing travaillent ensuite sur ce brief pour produire une stratégie de campagne marketing complète, qui sera présentée devant un jury d'experts.</p>
        </div>
        <div class="text-center">
            <a href="{{ route('contact') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-10 py-4 rounded-xl transition-colors orange-glow text-lg inline-block">Proposer mon association →</a>
        </div>
    </div>
</div>
@endsection