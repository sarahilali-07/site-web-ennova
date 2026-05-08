@extends('admin.layouts.layout')
@section('title', 'Partenaires')
@section('page-title', 'Partenaires')

@section('admin-content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">{{ $partners->total() }} partenaire(s)</p>
    <a href="{{ route('admin.partners.create') }}" class="bg-orange hover:bg-orange-dark text-white font-semibold px-5 py-2.5 rounded-xl transition-colors flex items-center space-x-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        <span>Nouveau partenaire</span>
    </a>
</div>
<div class="bg-dark-card border border-dark-border rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead><tr class="border-b border-dark-border">
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Nom</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Type</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Statut</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Site web</th>
            <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Actions</th>
        </tr></thead>
        <tbody class="divide-y divide-dark-border">
            @forelse($partners as $partner)
            <tr class="hover:bg-dark/40 transition-colors">
                <td class="px-6 py-4 text-white text-sm font-medium">{{ $partner->name }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $partner->type ?? '—' }}</td>
                <td class="px-6 py-4 text-sm">
                    @if($partner->status == 'approved')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Approuvé</span>
                    @elseif($partner->status == 'rejected')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/20 text-red-400">Rejeté</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">Pending</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $partner->website ? substr($partner->website, 0, 30).'...' : '—' }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.partners.edit', $partner) }}" class="text-orange text-xs hover:text-orange-light font-medium">Éditer</a>
                        @if($partner->status !== 'approved')
                            <form method="POST" action="{{ route('admin.partners.approve', $partner) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-green-400 text-xs hover:text-green-300 font-medium">Approuver</button>
                            </form>
                        @endif
                        @if($partner->status !== 'rejected')
                            <form method="POST" action="{{ route('admin.partners.reject', $partner) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-red-400 text-xs hover:text-red-300 font-medium">Rejeter</button>
                            </form>
                        @endif
                        <form method="POST" action="{{ route('admin.partners.destroy', $partner) }}" onsubmit="return confirm('Supprimer ?')" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 text-xs hover:text-red-400 font-medium">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-10 text-center text-gray-600">Aucun partenaire.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-dark-border">{{ $partners->links() }}</div>
</div>
@endsection