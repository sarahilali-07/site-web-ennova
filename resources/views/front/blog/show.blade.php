@extends('front.layouts.app')
@section('title', $post->title)

@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('blog.index') }}" class="text-orange text-sm hover:text-orange-light transition-colors flex items-center space-x-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                <span>Retour au blog</span>
            </a>
        </div>
        @if($post->category)
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">{{ $post->category->name }}</span>
        @endif
        <h1 class="font-display font-bold text-4xl lg:text-5xl text-gray-900 dark:text-white mt-3 mb-4">{{ $post->title }}</h1>
        <p class="text-gray-600 dark:text-gray-light text-sm mb-8">{{ $post->created_at->format('d M Y') }}</p>
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-72 object-cover rounded-2xl mb-10">
        @endif
        <div class="prose max-w-none text-gray-800 dark:text-gray-light leading-relaxed" style="font-size: 1.05rem; line-height: 1.85;">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
</div>
@endsection