@extends('admin.layouts.layout')
@section('title', 'Podcasts')
@section('page-title', 'Podcasts')

@section('admin-content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">{{ $podcasts->total() }} épisode(s)</p>
    <a href="{{ route('admin.podcasts.create') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-5 py-2.5 rounded-xl transition-colors flex items-center space-x-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        <span>Nouvel épisode</span>
    </a>
</div>
<div class="bg-dark-card border border-dark-border rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead><tr class="border-b border-dark-border">
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Titre</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Invité</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Date</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Actions</th>
        </tr></thead>
        <tbody class="divide-y divide-dark-border">
            @forelse($podcasts as $podcast)
            <tr class="hover:bg-dark/40 transition-colors">
                <td class="px-6 py-4 text-white text-sm font-medium max-w-xs truncate">{{ $podcast->title }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $podcast->guest ?? '—' }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $podcast->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.podcasts.edit', $podcast) }}" class="text-orange text-xs hover:text-orange-light font-medium">Éditer</a>
                        <form method="POST" action="{{ route('admin.podcasts.destroy', $podcast) }}" onsubmit="return confirm('Supprimer ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 text-xs hover:text-red-400 font-medium">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-10 text-center text-gray-600">Aucun épisode.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-dark-border">{{ $podcasts->links() }}</div>
</div>
@endsection