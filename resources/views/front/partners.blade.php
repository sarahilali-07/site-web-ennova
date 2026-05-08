@extends('front.layouts.app')
@section('title', 'Partenaires')
@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">Ils nous soutiennent</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-4">Nos partenaires</h1>
            <p class="text-gray-700 dark:text-gray-light text-lg max-w-2xl mx-auto">Ils nous accompagnent et nous soutiennent dans notre mission pour former les futurs leaders du marketing au Maroc.</p>
        </div>

        @if($partners->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-16">
            @foreach($partners as $partner)
            <div class="bg-dark-card border border-dark-border rounded-2xl p-6 flex flex-col items-center justify-center text-center card-hover min-h-[140px]">
                @if($partner->logo)
                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-12 object-contain mb-3 partner-logo">
                @endif
                <p class="font-display font-semibold text-white text-sm">{{ $partner->name }}</p>
                @if($partner->website)
                    <a href="{{ $partner->website }}" target="_blank" class="text-orange text-xs mt-1 hover:text-orange-light transition-colors">Visiter →</a>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <p class="text-gray-muted text-center py-12">Les partenaires seront affichés prochainement.</p>
        @endif

        <div class="bg-gradient-to-br from-orange/10 to-transparent border border-orange/20 rounded-3xl p-10 text-center">
            <h2 class="font-display font-bold text-3xl text-gray-900 dark:text-white mb-3">Devenez partenaire</h2>
            <p class="text-gray-700 dark:text-gray-light mb-6 max-w-lg mx-auto">Rejoignez l'écosystème Ennova. Bénéficiez d'une visibilité premium et d'un accès à un vivier de jeunes talents en marketing.</p>
            <a href="{{ route('contact') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3.5 rounded-xl transition-colors orange-glow inline-block">Devenir partenaire →</a>
        </div>
    </div>
</div>
@endsection