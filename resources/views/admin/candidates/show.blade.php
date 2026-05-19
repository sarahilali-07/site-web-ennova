@extends('admin.layouts.layout')
@section('title', __('messages.admin.candidates.detail.title').' — '.$candidate->first_name)
@section('page-title', __('messages.admin.candidates.detail.title'))

@section('admin-content')
<div class="max-w-2xl">
    <a href="{{ route('admin.candidates.index') }}" class="text-orange text-sm hover:text-orange-light mb-6 inline-flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        <span>{{ __('messages.admin.candidates.detail.back') }}</span>
    </a>
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-8 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-display font-bold text-gray-900 dark:text-white text-2xl">{{ $candidate->first_name }} {{ $candidate->last_name }}</h2>
            <span class="status-badge status-{{ $candidate->status }}">{{ __($candidate->status_translation_key) }}</span>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.candidates.email') }}</p><p class="text-gray-900 dark:text-white">{{ $candidate->email }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.candidates.phone') }}</p><p class="text-gray-900 dark:text-white">{{ $candidate->phone ?? '—' }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.candidates.school') }}</p><p class="text-gray-900 dark:text-white">{{ $candidate->school ?? '—' }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.candidates.detail.level') }}</p><p class="text-gray-900 dark:text-white">{{ $candidate->level ?? '—' }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.candidates.detail.field') }}</p><p class="text-gray-900 dark:text-white">{{ $candidate->specialty ?? '—' }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.candidates.date') }}</p><p class="text-gray-900 dark:text-white">{{ $candidate->created_at->format('d/m/Y') }}</p></div>
        </div>
        <div class="border-t border-light-border dark:border-dark-border pt-6 mb-6">
            <p class="text-gray-500 text-xs uppercase tracking-wider mb-3">{{ __('messages.admin.candidates.detail.motivation') }}</p>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-wrap">{{ $candidate->motivation }}</p>
        </div>
        <form method="POST" action="{{ route('admin.candidates.updateStatus', $candidate) }}" class="flex items-center space-x-3">
            @csrf @method('PATCH')
            <select name="status" class="bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:border-orange/50">
                <option value="pending" {{ $candidate->status == 'pending' ? 'selected' : '' }}>{{ __('messages.admin.candidates.pending') }}</option>
                <option value="review" {{ $candidate->status == 'review' ? 'selected' : '' }}>{{ __('messages.admin.candidates.review') }}</option>
                <option value="accepted" {{ $candidate->status == 'accepted' ? 'selected' : '' }}>{{ __('messages.admin.candidates.approve') }}</option>
                <option value="rejected" {{ $candidate->status == 'rejected' ? 'selected' : '' }}>{{ __('messages.admin.candidates.reject') }}</option>
            </select>
            <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">{{ __('messages.admin.posts.form.update') }}</button>
        </form>
    </div>
</div>
@endsection
