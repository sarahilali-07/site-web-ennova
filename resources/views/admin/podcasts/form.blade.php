@extends('admin.layouts.layout')
@section('title', isset($podcast) ? 'Éditer le podcast' : 'Nouvel épisode')
@section('page-title', isset($podcast) ? 'Éditer le podcast' : 'Nouvel épisode')

@section('admin-content')
<div class="max-w-2xl">
    @if($errors->any())
    <div class="bg-red-900/30 border border-red-700/50 rounded-xl p-4 mb-6">
        @foreach($errors->all() as $error)<p class="text-red-400 text-sm">• {{ $error }}</p>@endforeach
    </div>
    @endif
    <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
        <form method="POST" action="{{ isset($podcast) ? route('admin.podcasts.update', $podcast) : route('admin.podcasts.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($podcast)) @method('PUT') @endif
            <div>
                <label class="block text-white text-sm font-medium mb-2">Titre *</label>
                <input type="text" name="title" value="{{ old('title', $podcast->title ?? '') }}" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
            </div>
            <div>
                <label class="block text-white text-sm font-medium mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50 resize-none">{{ old('description', $podcast->description ?? '') }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-white text-sm font-medium mb-2">Invité</label>
                    <input type="text" name="guest" value="{{ old('guest', $podcast->guest ?? '') }}" class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
                </div>
                <div>
                    <label class="block text-white text-sm font-medium mb-2">Durée (ex: 45:30)</label>
                    <input type="text" name="duration" value="{{ old('duration', $podcast->duration ?? '') }}" class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
                </div>
            </div>
            <div>
                <label class="block text-white text-sm font-medium mb-2">Lien YouTube</label>
                <input type="url" name="youtube_url" value="{{ old('youtube_url', $podcast->youtube_url ?? '') }}" placeholder="https://youtube.com/..." class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-600 focus:outline-none focus:border-orange/50">
            </div>
            <div>
                <label class="block text-white text-sm font-medium mb-2">Miniature</label>
                <input type="file" name="thumbnail" accept="image/*" class="w-full bg-dark border border-dark-border text-gray-400 text-sm px-4 py-3 rounded-xl">
            </div>
            <div class="flex items-center space-x-4 pt-2">
                <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3 rounded-xl transition-colors">
                    {{ isset($podcast) ? 'Mettre à jour' : 'Publier' }}
                </button>
                <a href="{{ route('admin.podcasts.index') }}" class="text-gray-500 hover:text-white text-sm">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection