@extends('front.layouts.app')
@section('title', __('messages.competition.hero.title'))

@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Hero --}}
        <div class="text-center mb-16 max-w-3xl mx-auto">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">{{ __('messages.competition.hero.badge') }}</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-5">{!! __('messages.competition.hero.heading') !!}</h1>
            <p class="text-gray-700 dark:text-gray-light text-lg leading-relaxed">{{ __('messages.competition.hero.desc') }}</p>
        </div>

        {{-- Who can participate --}}
        <div class="grid md:grid-cols-2 gap-6 mb-16">
            <div class="bg-dark-card border border-dark-border rounded-2xl p-7">
                <div class="w-12 h-12 bg-orange/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/></svg>
                </div>
                <h3 class="font-display font-bold text-white text-xl mb-3">{{ __('messages.competition.students.title') }}</h3>
                <p class="text-gray-light text-sm leading-relaxed">{{ __('messages.competition.students.desc') }}</p>
            </div>
            <div class="bg-dark-card border border-dark-border rounded-2xl p-7">
                <div class="w-12 h-12 bg-orange/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/></svg>
                </div>
                <h3 class="font-display font-bold text-white text-xl mb-3">{{ __('messages.competition.associations.title') }}</h3>
                <p class="text-gray-light text-sm leading-relaxed">{{ __('messages.competition.associations.desc') }}</p>
            </div>
        </div>

        {{-- Steps --}}
        <div class="mb-16">
            <h2 class="font-display font-bold text-3xl text-gray-900 dark:text-white text-center mb-10">{{ __('messages.competition.steps.title') }}</h2>
            <div class="relative">
                <div class="absolute left-8 top-0 bottom-0 w-px bg-dark-border hidden md:block"></div>
                <div class="space-y-6">
                    @php $steps = [
                        ['num'=>'01','key'=>'step1'],
                        ['num'=>'02','key'=>'step2'],
                        ['num'=>'03','key'=>'step3'],
                        ['num'=>'04','key'=>'step4'],
                        ['num'=>'05','key'=>'step5'],
                        ['num'=>'06','key'=>'step6'],
                    ]; @endphp
                    @foreach($steps as $step)
                    <div class="flex items-start space-x-6 pl-0 md:pl-0 relative">
                        <div class="w-16 h-16 bg-orange rounded-xl flex items-center justify-center flex-shrink-0 z-10">
                            <span class="font-display font-bold text-white text-sm">{{ $step['num'] }}</span>
                        </div>
                        <div class="bg-dark-card border border-dark-border rounded-xl p-5 flex-1">
                            <h3 class="font-display font-bold text-white text-lg mb-1">{{ __("messages.competition.{$step['key']}.title") }}</h3>
                            <p class="text-gray-muted text-sm">{{ __("messages.competition.{$step['key']}.desc") }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Brief Competition Info --}}
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
                <h3 class="font-display font-bold text-xl text-white mb-3">{{ __('messages.competition.brief.title') }}</h3>
                <p class="text-gray-light text-sm leading-relaxed">{{ __('messages.competition.brief.desc') }}</p>
            </div>
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
                <h3 class="font-display font-bold text-xl text-white mb-3">{{ __('messages.competition.expectations.title') }}</h3>
                <ul class="text-gray-light text-sm space-y-2">
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>{{ __('messages.competition.expectations.1') }}</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>{{ __('messages.competition.expectations.2') }}</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>{{ __('messages.competition.expectations.3') }}</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>{{ __('messages.competition.expectations.4') }}</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <svg class="w-4 h-4 text-orange mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>{{ __('messages.competition.expectations.5') }}</span>
                    </li>
                </ul>
            </div>
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
                <h3 class="font-display font-bold text-xl text-white mb-3">{{ __('messages.competition.deliverable.title') }}</h3>
                <p class="text-gray-light text-sm leading-relaxed">{{ __('messages.competition.deliverable.desc') }}</p>
            </div>
        </div>

        {{-- Deliverables --}}
        <div class="bg-dark-card border border-dark-border rounded-3xl p-8 mb-12">
            <h2 class="font-display font-bold text-2xl text-white mb-6">{{ __('messages.competition.deliverables.title') }}</h2>
            <div class="grid md:grid-cols-3 gap-4">
                @php $deliverables = [1,2,3,4,5,6]; @endphp
                @foreach($deliverables as $d)
                <div class="flex items-center space-x-3 bg-dark rounded-xl p-4">
                    <div class="w-5 h-5 bg-orange rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    </div>
                    <span class="text-gray-light text-sm">{{ __("messages.competition.deliverable.{$d}") }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('candidature') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-10 py-4 rounded-xl transition-colors orange-glow text-lg inline-block">{{ __('messages.competition.participe') }} →</a>
        </div>
    </div>
</div>
@endsection