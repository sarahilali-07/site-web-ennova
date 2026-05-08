@extends('admin.layouts.layout')
@section('title', 'Dashboard')
@section('page-title', 'Tableau de bord')

@section('admin-content')
{{-- Stats Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-dark-card border border-dark-border rounded-2xl p-5">
        <div class="flex items-center justify-between mb-3">
            <p class="text-gray-500 text-xs uppercase tracking-wider">Candidatures</p>
            <div class="w-8 h-8 bg-orange/10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07z"/></svg>
            </div>
        </div>
        <p class="font-display font-bold text-3xl text-white">{{ $stats['candidates'] }}</p>
        <p class="text-gray-600 text-xs mt-1">Total reçues</p>
    </div>
    <div class="bg-dark-card border border-dark-border rounded-2xl p-5">
        <div class="flex items-center justify-between mb-3">
            <p class="text-gray-500 text-xs uppercase tracking-wider">Articles</p>
            <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/></svg>
            </div>
        </div>
        <p class="font-display font-bold text-3xl text-white">{{ $stats['posts'] }}</p>
        <p class="text-gray-600 text-xs mt-1">Total publiés</p>
    </div>
    <div class="bg-dark-card border border-dark-border rounded-2xl p-5">
        <div class="flex items-center justify-between mb-3">
            <p class="text-gray-500 text-xs uppercase tracking-wider">Podcasts</p>
            <div class="w-8 h-8 bg-purple-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-purple-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z" clip-rule="evenodd"/></svg>
            </div>
        </div>
        <p class="font-display font-bold text-3xl text-white">{{ $stats['podcasts'] }}</p>
        <p class="text-gray-600 text-xs mt-1">Total publiés</p>
    </div>
    <div class="bg-dark-card border border-dark-border rounded-2xl p-5">
        <div class="flex items-center justify-between mb-3">
            <p class="text-gray-500 text-xs uppercase tracking-wider">Partenaires</p>
            <div class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>
        <p class="font-display font-bold text-3xl text-white">{{ $stats['partners'] }}</p>
        <p class="text-gray-600 text-xs mt-1">Total actifs</p>
    </div>
</div>

{{-- Recent Candidates --}}
<div class="bg-dark-card border border-dark-border rounded-2xl overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-dark-border">
        <h2 class="font-display font-semibold text-white">Candidatures récentes</h2>
        <a href="{{ route('admin.candidates.index') }}" class="text-orange text-sm hover:text-orange-light transition-colors">Voir toutes →</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-dark-border">
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Candidat</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Email</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Date</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Statut</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-dark-border">
                @foreach($recentCandidates as $candidate)
                <tr class="hover:bg-dark/40 transition-colors">
                    <td class="px-6 py-4 text-white text-sm font-medium">{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->email }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $candidate->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">
                        <span class="status-badge status-{{ $candidate->status }}">
                            {{ $candidate->status === 'pending' ? 'En attente' : ($candidate->status === 'accepted' ? 'Accepté' : 'Refusé') }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection