@extends('admin.layouts.layout')
@section('title', __('messages.admin.messages.title'))
@section('page-title', __('messages.admin.messages.title'))

@section('admin-content')
<div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl overflow-hidden shadow-sm">
    <table class="w-full">
        <thead><tr class="border-b border-light-border dark:border-dark-border">
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.messages.from') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.messages.email') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.messages.subject') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.messages.date') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.messages.actions') }}</th>
        </tr></thead>
        <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
            @forelse($messages as $message)
            <tr class="hover:bg-gray-50 dark:hover:bg-dark/40 transition-colors {{ !$message->read_at ? 'bg-orange/3' : '' }}">
                <td class="px-6 py-4 text-gray-900 dark:text-white text-sm font-medium">
                    {{ $message->name }}
                    @if(!$message->read_at)<span class="ml-2 w-2 h-2 bg-orange rounded-full inline-block"></span>@endif
                </td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $message->email }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm max-w-xs truncate">{{ $message->subject ?? '—' }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $message->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.messages.show', $message) }}" class="text-orange text-xs hover:text-orange-light font-medium">{{ __('messages.admin.messages.show') }}</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-10 text-center text-gray-600">{{ __('messages.admin.messages.no_messages') }}</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-light-border dark:border-dark-border">{{ $messages->links() }}</div>
</div>
@endsection