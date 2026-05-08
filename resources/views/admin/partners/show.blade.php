@extends('admin.layouts.app')

@section('title', 'Voir Partenaire')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Détails du Partenaire</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-lg font-semibold mb-4">Informations</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nom</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $partner->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Logo</label>
                        @if($partner->logo)
                            <img src="{{ $partner->logo }}" alt="{{ $partner->name }}" class="mt-1 h-16 w-16 object-cover rounded">
                        @else
                            <p class="mt-1 text-sm text-gray-500">Aucun logo</p>
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Site Web</label>
                        @if($partner->website)
                            <a href="{{ $partner->website }}" target="_blank" class="mt-1 text-sm text-blue-600 hover:text-blue-800">{{ $partner->website }}</a>
                        @else
                            <p class="mt-1 text-sm text-gray-500">Aucun site web</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 flex space-x-4">
            <a href="{{ route('admin.partners.edit', $partner) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Modifier
            </a>
            <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('admin.partners.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection