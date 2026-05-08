@extends('front.layouts.app')
@section('title', 'Contact')
@section('content')
<div class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-orange text-xs font-semibold uppercase tracking-widest">Nous rejoindre</span>
            <h1 class="font-display font-bold text-5xl text-gray-900 dark:text-white mt-3 mb-4">Contactez-nous</h1>
            <p class="text-gray-700 dark:text-gray-light text-lg">Une question, une suggestion ou un partenariat ? N'hésitez pas à nous écrire.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-10">
            {{-- Form --}}
            <div class="lg:col-span-2 bg-dark-card border border-dark-border rounded-3xl p-8">
                @if($errors->any())
                    <div class="bg-red-900/30 border border-red-700/50 rounded-xl p-4 mb-6">
                        @foreach($errors->all() as $error)
                            <p class="text-red-400 text-sm">• {{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-white text-sm font-medium mb-2">Nom <span class="text-orange">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Votre nom" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                        </div>
                        <div>
                            <label class="block text-white text-sm font-medium mb-2">Email <span class="text-orange">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="votre@email.com" required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Sujet</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Sujet de votre message" class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors">
                    </div>
                    <div>
                        <label class="block text-white text-sm font-medium mb-2">Message <span class="text-orange">*</span></label>
                        <textarea name="message" rows="6" placeholder="Votre message..." required class="w-full bg-dark border border-dark-border text-white text-sm px-4 py-3 rounded-xl placeholder-gray-muted focus:outline-none focus:border-orange/50 transition-colors resize-none">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="w-full bg-orange hover:bg-orange-dark text-white font-semibold py-4 rounded-xl transition-colors orange-glow">
                        Envoyer le message
                    </button>
                </form>
            </div>

            {{-- Contact Info --}}
            <div class="space-y-5">
                <div class="bg-dark-card border border-dark-border rounded-2xl p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-orange/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-orange" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        </div>
                        <div>
                            <p class="text-white font-semibold text-sm mb-1">Adresse</p>
                            <p class="text-gray-muted text-sm">casablanca, Maroc</p>
                        </div>
                    </div>
                </div>
                <div class="bg-dark-card border border-dark-border rounded-2xl p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-orange/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                        </div>
                        <div>
                            <p class="text-white font-semibold text-sm mb-1">Email</p>
                            <p class="text-gray-muted text-sm"><a href="mailto:ennova.contact@gmail.com" class="hover:text-orange transition-colors">ennova.contact@gmail.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="bg-dark-card border border-dark-border rounded-2xl p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-orange/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                        </div>
                        <div>
                            <p class="text-white font-semibold text-sm mb-1">Téléphone</p>
                            <p class="text-gray-muted text-sm"><a href="tel:+212668435244" class="hover:text-orange transition-colors">+212 668-435244</a></p>
                        </div>
                    </div>
                </div>
                <div class="bg-dark-card border border-dark-border rounded-2xl p-6">
                    <p class="text-white font-semibold text-sm mb-4">Suivez-nous</p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-9 h-9 rounded-lg bg-dark border border-dark-border flex items-center justify-center text-gray-muted hover:text-orange hover:border-orange transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-dark border border-dark-border flex items-center justify-center text-gray-muted hover:text-orange hover:border-orange transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-dark border border-dark-border flex items-center justify-center text-gray-muted hover:text-orange hover:border-orange transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-dark border border-dark-border flex items-center justify-center text-gray-muted hover:text-orange hover:border-orange transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection