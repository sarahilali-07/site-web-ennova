@extends('admin.layouts.layout')
@section('title', __('messages.admin.dashboard'))
@section('page-title', __('messages.admin.dashboard'))

@section('admin-content')
{{-- Stats Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-5 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.stats.candidates') }}</p>
            <div class="w-8 h-8 bg-orange/10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07z"/></svg>
            </div>
        </div>
        <p class="font-display font-bold text-3xl text-gray-900 dark:text-white">{{ $stats['candidates'] }}</p>
        <p class="text-gray-600 text-xs mt-1">{{ __('messages.admin.stats.candidates') }}</p>
    </div>
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-5 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.stats.posts') }}</p>
            <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/></svg>
            </div>
        </div>
        <p class="font-display font-bold text-3xl text-gray-900 dark:text-white">{{ $stats['posts'] }}</p>
        <p class="text-gray-600 text-xs mt-1">{{ __('messages.admin.stats.posts') }}</p>
    </div>
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-5 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.stats.podcasts') }}</p>
            <div class="w-8 h-8 bg-purple-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-purple-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z" clip-rule="evenodd"/></svg>
            </div>
        </div>
        <p class="font-display font-bold text-3xl text-gray-900 dark:text-white">{{ $stats['podcasts'] }}</p>
        <p class="text-gray-600 text-xs mt-1">{{ __('messages.admin.stats.podcasts') }}</p>
    </div>
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-5 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.stats.partners') }}</p>
            <div class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>
        <p class="font-display font-bold text-3xl text-gray-900 dark:text-white">{{ $stats['partners'] }}</p>
        <p class="text-gray-600 text-xs mt-1">{{ __('messages.admin.stats.partners') }}</p>
    </div>
</div>

{{-- Recent Candidates --}}
<div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl overflow-hidden shadow-sm">
    <div class="flex items-center justify-between px-6 py-4 border-b border-light-border dark:border-dark-border">
        <h2 class="font-display font-semibold text-gray-900 dark:text-white">{{ __('messages.admin.candidates.title') }}</h2>
        <a href="{{ route('admin.candidates.index') }}" class="text-orange text-sm hover:text-orange-light transition-colors">{{ __('messages.general.view_all') }} →</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-light-border dark:border-dark-border">
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.name') }}</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.email') }}</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.date') }}</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.status') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
                @foreach($recentCandidates as $candidate)
                <tr class="hover:bg-gray-50 dark:hover:bg-dark/40 transition-colors">
                    <td class="px-6 py-4 text-gray-900 dark:text-white text-sm font-medium">{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->email }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">
                        <span class="status-badge status-{{ $candidate->status }}">
                            {{ __($candidate->status_translation_key) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
