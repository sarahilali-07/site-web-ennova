@extends('admin.layouts.layout')
@section('title', __('messages.admin.social.title'))
@section('page-title', __('messages.admin.social.title'))

@section('admin-content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">{{ $socialLinks->total() }} {{ __('messages.admin.social.total') }}</p>
    <a href="{{ route('admin.social-links.create') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-5 py-2.5 rounded-xl transition-colors flex items-center space-x-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        <span>{{ __('messages.admin.social.create') }}</span>
    </a>
</div>
<div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl overflow-hidden shadow-sm">
    <table class="w-full">
        <thead><tr class="border-b border-light-border dark:border-dark-border">
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.social.form.platform') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.social.form.url') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.actions') }}</th>
        </tr></thead>
        <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
            @forelse($socialLinks as $link)
            <tr class="hover:bg-gray-50 dark:hover:bg-dark/40 transition-colors">
                <td class="px-6 py-4 text-gray-900 dark:text-white text-sm font-medium">{{ $link->platform }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm max-w-xl truncate"><a href="{{ $link->url ?? '#' }}" target="_blank" class="hover:text-gray-900 dark:hover:text-white transition-colors">{{ $link->url ?? __('messages.general.no_data') }}</a></td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.social-links.edit', $link) }}" class="text-orange text-xs hover:text-orange-light font-medium">{{ __('messages.admin.social.edit') }}</a>
                        <form method="POST" action="{{ route('admin.social-links.destroy', $link) }}" onsubmit="return confirm('{{ __('messages.admin.social.delete') }} ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 text-xs hover:text-red-400 font-medium">{{ __('messages.admin.social.delete') }}</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="3" class="px-6 py-10 text-center text-gray-600">{{ __('messages.general.no_data') }}</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-light-border dark:border-dark-border">{{ $socialLinks->links() }}</div>
</div>
@endsection
