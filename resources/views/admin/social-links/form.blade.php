@extends('admin.layouts.layout')
@section('title', isset($socialLink) ? __('messages.admin.social.edit') : __('messages.admin.social.create'))
@section('page-title', isset($socialLink) ? __('messages.admin.social.edit') : __('messages.admin.social.create'))

@section('admin-content')
<div class="max-w-3xl">
    <a href="{{ route('admin.social-links.index') }}" class="text-orange text-sm hover:text-orange-light mb-6 inline-flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        <span>{{ __('messages.admin.social.back') }}</span>
    </a>

    @if($errors->any())
    <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700/50 rounded-xl p-4 mb-6">
        @foreach($errors->all() as $error)<p class="text-red-700 dark:text-red-400 text-sm">• {{ $error }}</p>@endforeach
    </div>
    @endif

    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-8 shadow-sm">
        <form method="POST" action="{{ isset($socialLink) ? route('admin.social-links.update', $socialLink) : route('admin.social-links.store') }}" class="space-y-6">
            @csrf
            @if(isset($socialLink)) @method('PUT') @endif

            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.social.form.platform') }} <span class="text-orange">*</span></label>
                <select name="platform" required class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
                    <option value="">{{ __('messages.admin.social.select_platform') }}</option>
                    @foreach($platforms as $platform)
                        <option value="{{ $platform }}" {{ old('platform', $socialLink->platform ?? '') === $platform ? 'selected' : '' }}>{{ $platform }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.social.form.url') }}</label>
                <input type="url" name="url" value="{{ old('url', $socialLink->url ?? '') }}" placeholder="https://..." class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-orange/50">
                <p class="text-gray-500 dark:text-gray-muted text-xs mt-2">{{ __('messages.admin.social.form.url_help') }}</p>
            </div>

            <div class="flex items-center space-x-4 pt-2">
                <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3 rounded-xl transition-colors">{{ isset($socialLink) ? __('messages.admin.social.form.update') : __('messages.admin.social.form.save') }}</button>
                <a href="{{ route('admin.social-links.index') }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white text-sm transition-colors">{{ __('messages.general.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
