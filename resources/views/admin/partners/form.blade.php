@extends('admin.layouts.layout')
@section('title', isset($partner) ? __('messages.admin.partners.edit') : __('messages.admin.partners.create'))
@section('page-title', isset($partner) ? __('messages.admin.partners.edit') : __('messages.admin.partners.create'))

@section('admin-content')
<div class="max-w-xl">
    <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-8 shadow-sm">
        <form method="POST" action="{{ isset($partner) ? route('admin.partners.update', $partner) : route('admin.partners.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($partner)) @method('PUT') @endif
            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.partners.form.name') }} *</label>
                <input type="text" name="name" value="{{ old('name', $partner->name ?? '') }}" required class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl focus:outline-none focus:border-orange/50">
            </div>
            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.partners.form.type') }}</label>
                <select name="type" class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 text-sm px-4 py-3 rounded-xl focus:outline-none">
                    <option value="">{{ __('messages.admin.partners.form.select') }}</option>
                    <option value="sponsor" {{ old('type', $partner->type ?? '') == 'sponsor' ? 'selected' : '' }}>Sponsor</option>
                    <option value="ecole" {{ old('type', $partner->type ?? '') == 'ecole' ? 'selected' : '' }}>{{ __('messages.admin.partners.form.type_ecole') }}</option>
                    <option value="association" {{ old('type', $partner->type ?? '') == 'association' ? 'selected' : '' }}>Association</option>
                    <option value="media" {{ old('type', $partner->type ?? '') == 'media' ? 'selected' : '' }}>{{ __('messages.admin.partners.form.type_media') }}</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.partners.form.status') }}</label>
                <select name="status" class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 text-sm px-4 py-3 rounded-xl focus:outline-none">
                    <option value="pending" {{ old('status', $partner->status ?? 'pending') == 'pending' ? 'selected' : '' }}>{{ __('messages.admin.partners.status.pending') }}</option>
                    <option value="approved" {{ old('status', $partner->status ?? '') == 'approved' ? 'selected' : '' }}>{{ __('messages.admin.partners.status.approved') }}</option>
                    <option value="rejected" {{ old('status', $partner->status ?? '') == 'rejected' ? 'selected' : '' }}>{{ __('messages.admin.partners.status.rejected') }}</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.partners.form.website') }}</label>
                <input type="url" name="website" value="{{ old('website', $partner->website ?? '') }}" placeholder="https://..." class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-900 dark:text-white text-sm px-4 py-3 rounded-xl placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none focus:border-orange/50">
            </div>
            <div>
                <label class="block text-gray-900 dark:text-white text-sm font-medium mb-2">{{ __('messages.admin.partners.form.logo') }}</label>
                <input type="file" name="logo" accept="image/*" class="w-full bg-white dark:bg-dark border border-light-border dark:border-dark-border text-gray-700 dark:text-gray-400 text-sm px-4 py-3 rounded-xl">
            </div>
            <div class="flex items-center space-x-4 pt-2">
                <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-8 py-3 rounded-xl transition-colors">
                    {{ isset($partner) ? __('messages.admin.partners.form.save') : __('messages.admin.partners.form.save') }}
                </button>
                <a href="{{ route('admin.partners.index') }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white text-sm">{{ __('messages.general.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection