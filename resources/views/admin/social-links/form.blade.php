@extends('admin.layouts.layout')
@section('title', isset($socialLink) ? 'Éditer le lien social' : 'Nouveau lien social')
@section('page-title', isset($socialLink) ? 'Éditer le lien social' : 'Nouveau lien social')

@section('admin-content')
<div class="max-w-3xl">
    <a href="{{ route('admin.social-links.index') }}" class="text-orange text-sm hover:text-orange-light mb-6 inline-flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        <span>Retour aux liens sociaux</span>
    </a>

    @if($errors->any())
    <div class="bg-red-900/30 border border-red-700/50 rounded-xl p-4 mb-6">
        @foreach($errors->all() as $error)<p class="text-red-400 text-sm">• {{ $error }}</p>@endforeach
    </div>
    @endif

    <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
        <form method="POST" action="{{ isset($socialLink) ? route('admin.social-links.update', $socialLink) : route('admin.social-links.store') }}" class="space-y-6">
            @csrf
            @if(isset($socialLink)) @method('PUT') @endif

            <div>
                <label class="block text-white text-sm font-medium mb-2">Plateforme <span class="text-orange">*</span></label>
                <select name="platform" required class="w-full bg-dark border border-dark-border text-gray-400 text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
                    <option value="">Sélectionner une plateforme</option>
                    @foreach($platforms as $platform)
                        <option value="{{ $platform }}" {{ old('platform', $socialLink->platform ?? '') === $platform ? 'selected' : '' }}>{{ $platform }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-white text-sm font-medium mb-2">URL</label>
                <input type="url" name="url" value="{{ old('url', $socialLink->url ?? '') }}" placeholder="https://..." class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-600 focus:outline-none focus:border-orange/50">
                <p class="text-gray-muted text-xs mt-2">Laisser vide pour masquer l'icône dans le pied de page.</p>
            </div>

            <div class="flex items-center space-x-4 pt-2">
                <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3 rounded-xl transition-colors">{{ isset($socialLink) ? 'Mettre à jour' : 'Créer' }}</button>
                <a href="{{ route('admin.social-links.index') }}" class="text-gray-500 hover:text-white text-sm transition-colors">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
