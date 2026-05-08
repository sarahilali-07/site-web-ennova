@extends('admin.layouts.layout')
@section('title', isset($partner) ? 'Éditer le partenaire' : 'Nouveau partenaire')
@section('page-title', isset($partner) ? 'Éditer le partenaire' : 'Nouveau partenaire')

@section('admin-content')
<div class="max-w-xl">
    <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
        <form method="POST" action="{{ isset($partner) ? route('admin.partners.update', $partner) : route('admin.partners.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($partner)) @method('PUT') @endif
            <div>
                <label class="block text-white text-sm font-medium mb-2">Nom *</label>
                <input type="text" name="name" value="{{ old('name', $partner->name ?? '') }}" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
            </div>
            <div>
                <label class="block text-white text-sm font-medium mb-2">Type</label>
                <select name="type" class="w-full bg-dark border border-dark-border text-gray-400 text-sm px-4 py-3 rounded-xl focus:outline-none">
                    <option value="">Sélectionner</option>
                    <option value="sponsor" {{ old('type', $partner->type ?? '') == 'sponsor' ? 'selected' : '' }}>Sponsor</option>
                    <option value="ecole" {{ old('type', $partner->type ?? '') == 'ecole' ? 'selected' : '' }}>École</option>
                    <option value="association" {{ old('type', $partner->type ?? '') == 'association' ? 'selected' : '' }}>Association</option>
                    <option value="media" {{ old('type', $partner->type ?? '') == 'media' ? 'selected' : '' }}>Média</option>
                </select>
            </div>
            <div>
                <label class="block text-white text-sm font-medium mb-2">Statut</label>
                <select name="status" class="w-full bg-dark border border-dark-border text-gray-400 text-sm px-4 py-3 rounded-xl focus:outline-none">
                    <option value="pending" {{ old('status', $partner->status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ old('status', $partner->status ?? '') == 'approved' ? 'selected' : '' }}>Approuvé</option>
                    <option value="rejected" {{ old('status', $partner->status ?? '') == 'rejected' ? 'selected' : '' }}>Rejeté</option>
                </select>
            </div>
            <div>
                <label class="block text-white text-sm font-medium mb-2">Site web</label>
                <input type="url" name="website" value="{{ old('website', $partner->website ?? '') }}" placeholder="https://..." class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-600 focus:outline-none focus:border-orange/50">
            </div>
            <div>
                <label class="block text-white text-sm font-medium mb-2">Logo</label>
                <input type="file" name="logo" accept="image/*" class="w-full bg-dark border border-dark-border text-gray-400 text-sm px-4 py-3 rounded-xl">
            </div>
            <div class="flex items-center space-x-4 pt-2">
                <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3 rounded-xl transition-colors">
                    {{ isset($partner) ? 'Mettre à jour' : 'Ajouter' }}
                </button>
                <a href="{{ route('admin.partners.index') }}" class="text-gray-500 hover:text-white text-sm">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection