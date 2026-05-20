@extends('admin.layouts.layout')
@section('title', isset($user) ? 'Edit Admin' : 'New Admin')
@section('page-title', isset($user) ? 'Edit Admin' : 'New Admin')

@section('admin-content')
<div class="max-w-lg">
    <a href="{{ route('admin.admins.index') }}" class="text-orange text-sm hover:text-orange-light mb-6 inline-flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
        <span>Back to Admins</span>
    </a>
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-8 shadow-sm">
        <form method="POST" action="{{ isset($user) ? route('admin.admins.update', $user) : route('admin.admins.store') }}">
            @csrf
            @if(isset($user)) @method('PUT') @endif

            <div class="space-y-5">
                <div>
                    <label class="text-gray-900 dark:text-white text-sm font-medium block mb-1.5">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required
                           class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-orange/50">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-gray-900 dark:text-white text-sm font-medium block mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required
                           class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-orange/50">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-gray-900 dark:text-white text-sm font-medium block mb-1.5">Password {{ isset($user) ? '(leave empty to keep current)' : '' }}</label>
                    <input type="password" name="password" {{ isset($user) ? '' : 'required' }}
                           class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-orange/50">
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-gray-900 dark:text-white text-sm font-medium block mb-1.5">Role</label>
                    <select name="role" required
                            class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-orange/50">
                        <option value="">Select a role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ old('role', isset($user) ? $user->getRoleNames()->first() : '') == $role->name ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6 flex items-center space-x-3">
                <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">
                    {{ isset($user) ? 'Update Admin' : 'Create Admin' }}
                </button>
                <a href="{{ route('admin.admins.index') }}" class="text-gray-500 dark:text-gray-400 text-sm hover:text-gray-700 dark:hover:text-gray-300 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
