@extends('admin.layouts.layout')
@section('title', __('messages.admin.messages.detail.title').' - '.$message->name)
@section('page-title', __('messages.admin.messages.detail.title'))

@section('admin-content')
<div class="max-w-2xl">
    <a href="{{ route('admin.messages.index') }}" class="text-orange text-sm hover:text-orange-light mb-6 inline-flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        <span>{{ __('messages.admin.messages.back') }}</span>
    </a>
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-8 shadow-sm">
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.messages.from') }}</p><p class="text-gray-900 dark:text-white font-medium">{{ $message->name }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.messages.email') }}</p><p class="text-gray-900 dark:text-white">{{ $message->email }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.messages.subject') }}</p><p class="text-gray-900 dark:text-white">{{ $message->subject ?? '—' }}</p></div>
            <div><p class="text-gray-500 text-xs uppercase tracking-wider mb-1">{{ __('messages.admin.messages.date') }}</p><p class="text-gray-900 dark:text-white">{{ $message->created_at->format('d/m/Y H:i') }}</p></div>
        </div>
        <div class="border-t border-light-border dark:border-dark-border pt-6">
            <p class="text-gray-500 text-xs uppercase tracking-wider mb-3">{{ __('messages.admin.messages.detail.title') }}</p>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-wrap">{{ $message->message }}</p>
        </div>
        <div class="mt-6 flex space-x-3">
            <button onclick="toggleReplyForm()" class="bg-orange hover:bg-orange-dark text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">{{ __('messages.admin.messages.reply') }}</button>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('messages.admin.messages.delete') }} ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">{{ __('messages.admin.messages.delete') }}</button>
            </form>
        </div>

        <!-- Reply Form -->
        <div id="reply-form" class="mt-6 hidden">
            <form action="{{ route('admin.messages.reply', $message) }}" method="POST" class="bg-gray-50 dark:bg-dark/50 border border-light-border dark:border-dark-border rounded-xl p-6">
                @csrf
                <h3 class="text-gray-900 dark:text-white font-semibold mb-4">{{ __('messages.admin.messages.reply') }} {{ $message->name }}</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm mb-2">{{ __('messages.admin.messages.subject') }}</label>
                    <input type="text" name="subject" value="Re: {{ $message->subject ?? __('messages.admin.messages.subject') }}" required class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm mb-2">{{ __('messages.admin.messages.detail.title') }}</label>
                    <textarea name="body" rows="6" placeholder="{{ __('messages.admin.messages.reply_placeholder') }}" required class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50 resize-none"></textarea>
                </div>
                <div class="flex space-x-3">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">{{ __('messages.general.submit') }}</button>
                    <button type="button" onclick="toggleReplyForm()" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">{{ __('messages.general.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function toggleReplyForm() {
    const form = document.getElementById('reply-form');
    form.classList.toggle('hidden');
}
</script>
@endsection