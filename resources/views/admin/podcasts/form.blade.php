@extends('admin.layouts.layout')
@section('title', isset($podcast) ? __('messages.admin.podcasts.edit') : __('messages.admin.podcasts.create'))
@section('page-title', isset($podcast) ? __('messages.admin.podcasts.edit') : __('messages.admin.podcasts.create'))

@section('admin-content')
<div class="max-w-2xl">
    @if($errors->any())
    <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700/50 rounded-xl p-4 mb-6">
        @foreach($errors->all() as $error)<p class="text-red-700 dark:text-red-400 text-sm">• {{ $error }}</p>@endforeach
    </div>
    @endif
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-8 shadow-sm">
        <form method="POST" action="{{ isset($podcast) ? route('admin.podcasts.update', $podcast) : route('admin.podcasts.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($podcast)) @method('PUT') @endif
            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.podcasts.form.title') }} *</label>
                <input type="text" name="title" value="{{ old('title', $podcast->title ?? '') }}" required class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
            </div>
            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.podcasts.form.description') }}</label>
                <textarea name="description" rows="4" class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50 resize-none">{{ old('description', $podcast->description ?? '') }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.podcasts.form.guest') }}</label>
                    <input type="text" name="guest" value="{{ old('guest', $podcast->guest ?? '') }}" class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
                </div>
                <div>
                    <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.podcasts.form.duration') }}</label>
                    <input type="text" name="duration" value="{{ old('duration', $podcast->duration ?? '') }}" class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
                </div>
            </div>
            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.podcasts.form.link') }}</label>
                <input type="url" name="youtube_url" value="{{ old('youtube_url', $podcast->youtube_url ?? '') }}" placeholder="https://youtube.com/..." class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-orange/50">
            </div>
            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.podcasts.form.image') }}</label>
                <input type="file" name="thumbnail" accept="image/*" class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 text-sm px-4 py-3 rounded-xl">
            </div>
            <div class="flex items-center space-x-4 pt-2">
                <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3 rounded-xl transition-colors">
                    {{ isset($podcast) ? __('messages.admin.podcasts.form.save') : __('messages.admin.podcasts.form.save') }}
                </button>
                <a href="{{ route('admin.podcasts.index') }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white text-sm">{{ __('messages.general.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection