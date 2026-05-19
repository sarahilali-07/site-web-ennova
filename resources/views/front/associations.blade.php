@extends('front.layouts.app')
@section('title', __('messages.associations.title'))
@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">{{ __('messages.associations.subtitle') }}</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-4">{{ __('messages.associations.title') }}</h1>
            <p class="text-gray-800 dark:text-gray-light text-lg max-w-2xl mx-auto">{{ __('messages.associations.description') }}</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 mb-14">
            @php $benefits = [
                ['icon'=>'🎯', 'title'=>__('messages.associations.benefits.1'), 'desc'=>__('messages.associations.benefits.1')],
                ['icon'=>'📱', 'title'=>__('messages.associations.benefits.2'), 'desc'=>__('messages.associations.benefits.2')],
                ['icon'=>'🤝', 'title'=>__('messages.associations.benefits.3'), 'desc'=>__('messages.associations.benefits.3')],
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
            <h2 class="font-display font-bold text-2xl text-white mb-4">{{ __('messages.associations.benefits.title') }}</h2>
            <p class="text-gray-light leading-relaxed mb-4">{{ __('messages.associations.description') }}</p>
            <p class="text-gray-light leading-relaxed">{{ __('messages.associations.description') }}</p>
        </div>
        <div class="text-center">
            <a href="{{ route('contact') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-10 py-4 rounded-xl transition-colors orange-glow text-lg inline-block">{{ __('messages.associations.join') }}</a>
        </div>
    </div>
</div>
@endsection