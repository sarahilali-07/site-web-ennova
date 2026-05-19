@extends('front.layouts.app')
@section('title', __('messages.candidature.title'))

@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">{{ __('messages.candidature.badge') }}</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-4">{{ __('messages.candidature.title') }}</h1>
            <p class="text-gray-800 dark:text-gray-light text-lg">{{ __('messages.candidature.desc') }}</p>
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
                        <label class="block text-white text-sm font-medium mb-2">{{ __('messages.candidature.form.last_name') }} <span class="text-orange">*</span></label>
                        <input type="text" name="nom" value="{{ old('last_name') }}" placeholder="{{ __('messages.candidature.form.first_name') }}" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">{{ __('messages.candidature.form.first_name') }} <span class="text-orange">*</span></label>
                        <input type="text" name="prenom" value="{{ old('first_name') }}" placeholder="{{ __('messages.candidature.form.first_name') }}" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">{{ __('messages.candidature.form.email') }} <span class="text-orange">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('messages.candidature.form.email_placeholder') }}" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">{{ __('messages.candidature.form.phone') }} ({{ __('messages.general.optional') }})</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="{{ __('messages.candidature.form.phone_placeholder') }}" class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                </div>
                <div>
                        <label class="block text-white text-sm font-medium mb-2">{{ __('messages.candidature.form.school') }} <span class="text-orange">*</span></label>
                        <input type="text" name="school" value="{{ old('school') }}" placeholder="{{ __('messages.candidature.form.school_placeholder') }}" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">{{ __('messages.candidature.form.level') }}</label>
                        <select name="level" class="w-full bg-dark border border-dark-border text-gray-light text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50 transition-colors">
                            <option value="">{{ __('messages.candidature.form.level_select') }}</option>
                            <option value="Master 1">Master 1</option>
                            <option value="Master 2">Master 2</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">{{ __('messages.candidature.form.specialty') }}</label>
                        <input type="text" name="specialty" value="{{ old('specialty') }}" placeholder="{{ __('messages.candidature.form.specialty_placeholder') }}" class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                </div>

                {{-- Academic Profile Section --}}
                <div class="pt-6 border-t border-dark-border">
                    <h3 class="font-display font-bold text-white mb-4">{{ __('messages.candidature.form.academic_profile') }}</h3>
                    
                    <div class="mb-6">
                        <label class="block text-white text-sm font-medium mb-3">{{ __('messages.candidature.form.previous_competition_question') }} <span class="text-orange">*</span></label>
                        <div class="flex items-center space-x-6">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="previous_competition" value="yes" {{ old('previous_competition') === 'yes' ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm">{{ __('messages.candidature.form.yes') }}</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="previous_competition" value="no" {{ old('previous_competition') === 'no' ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm">{{ __('messages.candidature.form.no') }}</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-white text-sm font-medium mb-3">{{ __('messages.candidature.form.skills') }} <span class="text-orange">*</span></label>
                        <div class="space-y-3">
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Stratégie" {{ in_array('Stratégie', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">{{ __('messages.candidature.skill.strategy') }}</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Marketing digital" {{ in_array('Marketing digital', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">{{ __('messages.candidature.skill.digital') }}</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Création de contenu" {{ in_array('Création de contenu', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">{{ __('messages.candidature.skill.content') }}</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Analyse de données" {{ in_array('Analyse de données', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">{{ __('messages.candidature.skill.analysis') }}</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="checkbox" name="skills[]" value="Autre" {{ in_array('Autre', old('skills', [])) ? 'checked' : '' }} class="w-4 h-4 accent-orange">
                                <span class="text-gray-light text-sm group-hover:text-white transition-colors">{{ __('messages.general.other') }}</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <input type="text" name="other_skills" value="{{ old('other_skills') }}" placeholder="{{ __('messages.candidature.form.other_skills_placeholder') }}" class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors mt-3">
                    </div>
                </div>
                
                <div>
                    <label class="block text-white text-sm font-medium mb-2">{{ __('messages.candidature.form.motivation') }} <span class="text-orange">*</span></label>
                    <textarea name="motivation" rows="5" placeholder="{{ __('messages.candidature.form.motivation_placeholder') }}" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors resize-none">{{ old('motivation') }}</textarea>
                </div>
                <div class="flex items-start space-x-3">
                    <input type="checkbox" name="agree" id="agree" required class="mt-1 w-4 h-4 accent-orange">
                    <label for="agree" class="text-gray-light text-sm">{{ __('messages.candidature.form.agree') }} <span class="text-orange">*</span></label>
                </div>
                <button type="submit" class="w-full bg-orange hover:bg-orange-dark text-white font-semibold py-4 rounded-xl transition-colors orange-glow text-base">
                    {{ __('messages.candidature.form.submit') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection