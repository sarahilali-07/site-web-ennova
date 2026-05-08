@extends('admin.layouts.layout')
@section('title', 'Candidature de '.$candidate->first_name)
@section('page-title', 'Détail candidature')

@section('admin-content')
<div class="max-w-2xl">
    <a href="{{ route('admin.candidates.index') }}" class="text-orange text-sm hover:text-orange-light mb-6 inline-flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        <span>Retour aux candidatures</span>
    </a>
    <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-display font-bold text-white text-2xl">{{ $candidate->first_name }} {{ $candidate->last_name }}</h2>
            <span class="status-badge status-{{ $candidate->status }}">{{ $candidate->status === 'pending' ? 'En attente' : ($candidate->status === 'accepted' ? 'Accepté' : 'Refusé') }}</span>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Email</p><p class="text-white">{{ $candidate->email }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Téléphone</p><p class="text-white">{{ $candidate->phone ?? '—' }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">École</p><p class="text-white">{{ $candidate->school ?? '—' }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Niveau</p><p class="text-white">{{ $candidate->level ?? '—' }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Spécialité</p><p class="text-white">{{ $candidate->specialty ?? '—' }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Date</p><p class="text-white">{{ $candidate->created_at->format('d/m/Y') }}</p></div>
        </div>
        <div class="border-t border-dark-border pt-6 mb-6">
            <p class="text-gray-500 text-xs uppercase tracking-wider mb-3">Motivation</p>
            <p class="text-gray-300 leading-relaxed whitespace-pre-wrap">{{ $candidate->motivation }}</p>
        </div>
        <form method="POST" action="{{ route('admin.candidates.updateStatus', $candidate) }}" class="flex items-center space-x-3">
            @csrf @method('PATCH')
            <select name="status" class="bg-dark border border-dark-border text-gray-400 text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:border-orange/50">
                <option value="pending" {{ $candidate->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="accepted" {{ $candidate->status == 'accepted' ? 'selected' : '' }}>Accepter</option>
                <option value="rejected" {{ $candidate->status == 'rejected' ? 'selected' : '' }}>Refuser</option>
            </select>
            <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection