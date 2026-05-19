@extends('admin.layouts.app')

@section('title', __('messages.admin.partners.show'))

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">{{ __('messages.admin.partners.show') }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-lg font-semibold mb-4">{{ __('messages.admin.partners.detail.information') }}</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">{{ __('messages.admin.partners.form.name') }}</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $partner->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">{{ __('messages.admin.partners.form.logo') }}</label>
                        @if($partner->logo)
                            <img src="{{ $partner->logo }}" alt="{{ $partner->name }}" class="mt-1 h-16 w-16 object-cover rounded">
                        @else
                            <p class="mt-1 text-sm text-gray-500">{{ __('messages.general.no_data') }}</p>
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">{{ __('messages.admin.partners.form.website') }}</label>
                        @if($partner->website)
                            <a href="{{ $partner->website }}" target="_blank" class="mt-1 text-sm text-blue-600 hover:text-blue-800">{{ $partner->website }}</a>
                        @else
                            <p class="mt-1 text-sm text-gray-500">{{ __('messages.general.no_data') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 flex space-x-4">
            <a href="{{ route('admin.partners.edit', $partner) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('messages.admin.partners.edit') }}
            </a>
            <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('messages.admin.partners.delete') }} ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('messages.admin.partners.delete') }}
                </button>
            </form>
            <a href="{{ route('admin.partners.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                {{ __('messages.admin.partners.back') }}
            </a>
        </div>
    </div>
</div>
@endsection