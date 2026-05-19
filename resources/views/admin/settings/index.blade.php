@extends('admin.layouts.layout')
@section('title', __('messages.admin.settings.title'))
@section('page-title', __('messages.admin.settings.title'))

@section('admin-content')
<div class="max-w-3xl">
    @if($errors->any())
    <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700/50 rounded-xl p-4 mb-6">
        @foreach($errors->all() as $error)<p class="text-red-700 dark:text-red-400 text-sm">• {{ $error }}</p>@endforeach
    </div>
    @endif

    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-8 shadow-sm">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.settings.form.whatsapp') }} <span class="text-orange">*</span></label>
                <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '') }}" placeholder="212668435244" class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-orange/50">
                <p class="text-gray-500 dark:text-gray-muted text-xs mt-2">{{ __('messages.admin.settings.form.whatsapp_help') }}</p>
            </div>

            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.settings.form.phone') }} <span class="text-orange">*</span></label>
                <input type="text" name="phone_number" value="{{ old('phone_number', $settings['phone_number'] ?? '') }}" placeholder="+212 668-435244" class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-orange/50">
                <p class="text-gray-500 dark:text-gray-muted text-xs mt-2">{{ __('messages.admin.settings.form.phone_help') }}</p>
            </div>

            <div class="flex items-center space-x-4 pt-2">
                <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3 rounded-xl transition-colors">{{ __('messages.general.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
