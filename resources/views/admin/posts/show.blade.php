@extends('admin.layouts.layout')

@section('title', $post->title)
@section('page-title', __('messages.admin.posts.title'))

@section('admin-content')

<div class="max-w-4xl">

    <!-- Back -->
    <a href="{{ route('admin.posts.index') }}"
       class="text-orange text-sm hover:text-orange-light mb-6 inline-flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
        </svg>
        <span>{{ __('messages.admin.posts.back') }}</span>
    </a>

    <!-- Card -->
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl overflow-hidden shadow-sm">

        <!-- Image -->
        @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}"
                 class="w-full h-80 object-cover">
        @endif

        <div class="p-8">

            <!-- Title -->
            <h1 class="text-gray-900 dark:text-white text-3xl font-bold mb-3">
                {{ $post->title }}
            </h1>

            <!-- Meta -->
            <div class="flex flex-wrap gap-4 text-sm text-gray-500 mb-6">
                <span>📂 {{ $post->category->name ?? __('messages.blog.category') }}</span>
                <span>📅 {{ $post->created_at->format('d/m/Y H:i') }}</span>
                <span>✍️ {{ __('messages.blog.title') }}</span>
            </div>

            <!-- Excerpt -->
            @if($post->excerpt)
                <p class="text-gray-600 dark:text-gray-400 italic mb-6">
                    {{ $post->excerpt }}
                </p>
            @endif

            <!-- Content -->
            <div class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                {{ $post->content }}
            </div>

            <!-- Actions -->
            <div class="flex space-x-3 mt-8">

                <a href="{{ route('admin.posts.edit', $post) }}"
                   class="bg-orange hover:bg-orange-dark text-white font-semibold px-5 py-2.5 rounded-xl">
                    {{ __('messages.admin.posts.edit') }}
                </a>

                <form method="POST"
                      action="{{ route('admin.posts.destroy', $post) }}"
                      onsubmit="return confirm('{{ __('messages.admin.posts.delete') }} ?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2.5 rounded-xl">
                        {{ __('messages.admin.posts.delete') }}
                    </button>
                </form>

            </div>

        </div>
    </div>

</div>

@endsection