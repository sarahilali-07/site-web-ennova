@extends('admin.layouts.layout')
@section('title', isset($post) ? 'Éditer l\'article' : 'Nouvel article')
@section('page-title', isset($post) ? 'Éditer l\'article' : 'Nouvel article')

@section('admin-content')
<div class="max-w-3xl">
    <a href="{{ route('admin.posts.index') }}" class="text-orange text-sm hover:text-orange-light mb-6 inline-flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        <span>Retour aux articles</span>
    </a>
    
    @if($errors->any())
    <div class="bg-red-900/30 border border-red-700/50 rounded-xl p-4 mb-6">
        @foreach($errors->all() as $error)<p class="text-red-400 text-sm">• {{ $error }}</p>@endforeach
    </div>
    @endif

    <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
        <form method="POST" action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($post)) @method('PUT') @endif
            
            <div>
                <label class="block text-white text-sm font-medium mb-2">Titre <span class="text-orange">*</span></label>
                <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-600 focus:outline-none focus:border-orange/50">
            </div>
            <div>
                <label class="block text-white text-sm font-medium mb-2">Extrait</label>
                <textarea name="excerpt" rows="2" class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-600 focus:outline-none focus:border-orange/50 resize-none">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            </div>
            <div>
                <label class="block text-white text-sm font-medium mb-2">Contenu <span class="text-orange">*</span></label>
                <textarea name="content" rows="10" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-600 focus:outline-none focus:border-orange/50 resize-none">{{ old('content', $post->content ?? '') }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-white text-sm font-medium mb-2">Catégorie</label>
                    <select name="category_id" class="w-full bg-dark border border-dark-border text-gray-400 text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
                        <option value="">Aucune</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $post->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-white text-sm font-medium mb-2">Image de couverture</label>
                    <input type="file" name="image" accept="image/*" class="w-full bg-dark border border-dark-border text-gray-400 text-sm px-4 py-3 rounded-xl focus:outline-none">
                </div>
            </div>
            <div class="flex items-center space-x-4 pt-2">
                <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3 rounded-xl transition-colors">
                    {{ isset($post) ? 'Mettre à jour' : 'Publier' }}
                </button>
                <a href="{{ route('admin.posts.index') }}" class="text-gray-500 hover:text-white text-sm transition-colors">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection