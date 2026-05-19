@extends('admin.layouts.layout')
@section('title', __('messages.admin.podcasts.title'))
@section('page-title', __('messages.admin.podcasts.title'))

@section('admin-content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">{{ $podcasts->total() }} {{ __('messages.admin.podcasts.total') }}</p>
    <a href="{{ route('admin.podcasts.create') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-5 py-2.5 rounded-xl transition-colors flex items-center space-x-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        <span>{{ __('messages.admin.podcasts.create') }}</span>
    </a>
</div>
<div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl overflow-hidden shadow-sm">
    <table class="w-full">
        <thead><tr class="border-b border-light-border dark:border-dark-border">
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.podcasts.form.title') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.podcasts.column.guest') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.date') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.actions') }}</th>
        </tr></thead>
        <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
            @forelse($podcasts as $podcast)
            <tr class="hover:bg-gray-50 dark:hover:bg-dark/40 transition-colors">
                <td class="px-6 py-4 text-gray-900 dark:text-white text-sm font-medium max-w-xs truncate">{{ $podcast->title }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $podcast->guest ?? '—' }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $podcast->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.podcasts.edit', $podcast) }}" class="text-orange text-xs hover:text-orange-light font-medium">{{ __('messages.admin.podcasts.edit') }}</a>
                        <form method="POST" action="{{ route('admin.podcasts.destroy', $podcast) }}" onsubmit="return confirm('{{ __('messages.admin.podcasts.delete') }} ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 text-xs hover:text-red-400 font-medium">{{ __('messages.admin.podcasts.delete') }}</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-10 text-center text-gray-600">{{ __('messages.general.no_data') }}</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-light-border dark:border-dark-border">{{ $podcasts->links() }}</div>
</div>
@endsection