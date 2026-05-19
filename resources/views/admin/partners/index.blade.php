@extends('admin.layouts.layout')
@section('title', __('messages.admin.partners.title'))
@section('page-title', __('messages.admin.partners.title'))

@section('admin-content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">{{ $partners->total() }} {{ __('messages.admin.partners.total') }}</p>
    <a href="{{ route('admin.partners.create') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-5 py-2.5 rounded-xl transition-colors flex items-center space-x-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        <span>{{ __('messages.admin.partners.create') }}</span>
    </a>
</div>
<div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl overflow-hidden shadow-sm">
    <table class="w-full">
        <thead><tr class="border-b border-light-border dark:border-dark-border">
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.partners.form.name') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.partners.form.type') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.partners.form.status') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.partners.form.website') }}</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">{{ __('messages.admin.candidates.actions') }}</th>
        </tr></thead>
        <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
            @forelse($partners as $partner)
            <tr class="hover:bg-gray-50 dark:hover:bg-dark/40 transition-colors">
                <td class="px-6 py-4 text-gray-900 dark:text-white text-sm font-medium">{{ $partner->name }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $partner->type ?? '—' }}</td>
                <td class="px-6 py-4 text-sm">
                    @if($partner->status == 'approved')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-600 dark:text-green-400">{{ __('messages.admin.partners.status.approved') }}</span>
                    @elseif($partner->status == 'rejected')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/20 text-red-600 dark:text-red-400">{{ __('messages.admin.partners.status.rejected') }}</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-600 dark:text-yellow-400">{{ __('messages.admin.partners.status.pending') }}</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $partner->website ? substr($partner->website, 0, 30).'...' : '—' }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.partners.edit', $partner) }}" class="text-orange text-xs hover:text-orange-light font-medium">{{ __('messages.admin.partners.edit') }}</a>
                        @if($partner->status !== 'approved')
                            <form method="POST" action="{{ route('admin.partners.approve', $partner) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-green-400 text-xs hover:text-green-300 font-medium">{{ __('messages.admin.partners.approve') }}</button>
                            </form>
                        @endif
                        @if($partner->status !== 'rejected')
                            <form method="POST" action="{{ route('admin.partners.reject', $partner) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-red-400 text-xs hover:text-red-300 font-medium">{{ __('messages.admin.partners.reject') }}</button>
                            </form>
                        @endif
                        <form method="POST" action="{{ route('admin.partners.destroy', $partner) }}" onsubmit="return confirm('{{ __('messages.admin.partners.delete') }} ?')" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 text-xs hover:text-red-400 font-medium">{{ __('messages.admin.partners.delete') }}</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-10 text-center text-gray-600">{{ __('messages.general.no_data') }}</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-light-border dark:border-dark-border">{{ $partners->links() }}</div>
</div>
@endsection