@extends('admin.layouts.layout')
@section('title', __('messages.admin.candidates.title'))
@section('page-title', __('messages.admin.candidates.title'))

@section('admin-content')
<div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl overflow-hidden shadow-sm">
    <div class="flex items-center justify-between px-6 py-4 border-b border-light-border dark:border-dark-border">
        <div class="flex items-center space-x-4">
            <h2 class="font-display font-semibold text-gray-900 dark:text-white">{{ __('messages.admin.candidates.title') }}</h2>
            <span class="bg-orange/10 text-orange text-xs font-bold px-2.5 py-1 rounded-full">{{ $candidates->total() }}</span>
        </div>
        <form method="GET" class="flex items-center space-x-2">
            <select name="status" class="bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 text-sm px-3 py-2 rounded-lg focus:outline-none">
                <option value="">{{ __('messages.admin.candidates.status') }}</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('messages.admin.candidates.pending') }}</option>
                <option value="review" {{ request('status') == 'review' ? 'selected' : '' }}>{{ __('messages.admin.candidates.review') }}</option>
                <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>{{ __('messages.admin.candidates.approved') }}</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>{{ __('messages.admin.candidates.rejected') }}</option>
            </select>
            <button type="submit" class="bg-orange text-white text-sm px-4 py-2 rounded-lg">{{ __('messages.general.filter') }}</button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-light-border dark:border-dark-border">
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.name') }}</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.email') }}</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.school') }}</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.date') }}</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.status') }}</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
                @forelse($candidates as $candidate)
                <tr class="hover:bg-gray-50 dark:hover:bg-dark/40 transition-colors">
                    <td class="px-6 py-4 text-gray-900 dark:text-white text-sm font-medium">{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->email }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->school ?? '—' }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">
                        <span class="status-badge status-{{ $candidate->status }}">
                            {{ __($candidate->status_translation_key) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.candidates.show', $candidate) }}" class="text-orange text-xs hover:text-orange-light transition-colors font-medium">{{ __('messages.admin.candidates.show') }}</a>
                            <form method="POST" action="{{ route('admin.candidates.updateStatus', $candidate) }}" class="inline">
                                @csrf @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 text-xs px-2 py-1 rounded focus:outline-none">
                                    <option value="pending" {{ $candidate->status == 'pending' ? 'selected' : '' }}>{{ __('messages.admin.candidates.pending') }}</option>
                                    <option value="review" {{ $candidate->status == 'review' ? 'selected' : '' }}>{{ __('messages.admin.candidates.review') }}</option>
                                    <option value="accepted" {{ $candidate->status == 'accepted' ? 'selected' : '' }}>{{ __('messages.admin.candidates.approve') }}</option>
                                    <option value="rejected" {{ $candidate->status == 'rejected' ? 'selected' : '' }}>{{ __('messages.admin.candidates.reject') }}</option>
                                </select>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-10 text-center text-gray-600">{{ __('messages.admin.candidates.no_candidates') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-light-border dark:border-dark-border">
        {{ $candidates->links() }}
    </div>
</div>
@endsection
