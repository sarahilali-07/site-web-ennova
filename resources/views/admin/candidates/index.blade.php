@extends('admin.layouts.layout')
@section('title', 'Candidatures')
@section('page-title', 'Candidatures')

@section('admin-content')
<div class="bg-dark-card border border-dark-border rounded-2xl overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-dark-border">
        <div class="flex items-center space-x-4">
            <h2 class="font-display font-semibold text-white">Toutes les candidatures</h2>
            <span class="bg-orange/10 text-orange text-xs font-bold px-2.5 py-1 rounded-full">{{ $candidates->total() }}</span>
        </div>
        <form method="GET" class="flex items-center space-x-2">
            <select name="status" class="bg-dark border border-dark-border text-gray-400 text-sm px-3 py-2 rounded-lg focus:outline-none">
                <option value="">Tous les statuts</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Accepté</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Refusé</option>
            </select>
            <button type="submit" class="bg-orange text-white text-sm px-4 py-2 rounded-lg">Filtrer</button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-dark-border">
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Nom</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Email</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">École</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Date</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Statut</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-dark-border">
                @forelse($candidates as $candidate)
                <tr class="hover:bg-dark/40 transition-colors">
                    <td class="px-6 py-4 text-white text-sm font-medium">{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->email }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->school ?? '—' }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">
                        <span class="status-badge status-{{ $candidate->status }}">
                            {{ $candidate->status === 'pending' ? 'En attente' : ($candidate->status === 'accepted' ? 'Accepté' : 'Refusé') }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.candidates.show', $candidate) }}" class="text-orange text-xs hover:text-orange-light transition-colors font-medium">Voir</a>
                            <form method="POST" action="{{ route('admin.candidates.updateStatus', $candidate) }}" class="inline">
                                @csrf @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="bg-dark border border-dark-border text-gray-400 text-xs px-2 py-1 rounded focus:outline-none">
                                    <option value="pending" {{ $candidate->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="accepted" {{ $candidate->status == 'accepted' ? 'selected' : '' }}>Accepter</option>
                                    <option value="rejected" {{ $candidate->status == 'rejected' ? 'selected' : '' }}>Refuser</option>
                                </select>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-10 text-center text-gray-600">Aucune candidature trouvée.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-dark-border">
        {{ $candidates->links() }}
    </div>
</div>
@endsection