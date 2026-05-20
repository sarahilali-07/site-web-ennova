@extends('admin.layouts.layout')
@section('title', 'Manage Roles & Permissions')
@section('page-title', 'Manage Roles & Permissions')

@section('admin-content')
<div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl p-6 shadow-sm">
    <div class="flex items-center justify-between mb-6">
        <h2 class="font-display font-semibold text-gray-900 dark:text-white">Role Permissions</h2>
        <a href="{{ route('admin.admins.index') }}" class="text-orange text-sm hover:text-orange-light transition-colors">← Back to Admins</a>
    </div>

    <form method="POST" action="{{ route('admin.admins.roles.update') }}">
        @csrf @method('PUT')

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-light-border dark:border-dark-border">
                        <th class="text-left px-4 py-3 text-gray-500 text-xs uppercase tracking-wider w-48">Permission</th>
                        @foreach($roles as $role)
                            <th class="text-center px-2 py-3 text-gray-500 text-xs uppercase tracking-wider min-w-[120px]">
                                <span class="text-orange font-bold">{{ $role->name }}</span>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
                    @php $currentGroup = null; @endphp
                    @foreach($permissions as $group => $groupPermissions)
                        @foreach($groupPermissions as $permission)
                        <tr class="hover:bg-gray-50 dark:hover:bg-dark/40 transition-colors">
                            @if($currentGroup !== $group)
                                @php $currentGroup = $group; @endphp
                                <td class="px-4 py-3 text-gray-900 dark:text-white text-sm border-r border-light-border dark:border-dark-border" colspan="1">
                                    <span class="font-semibold capitalize">{{ $group }}</span>
                                </td>
                            @else
                                <td class="px-4 py-3 text-gray-500 dark:text-gray-400 text-sm border-r border-light-border dark:border-dark-border"></td>
                            @endif
                            @foreach($roles as $role)
                                <td class="text-center px-2 py-3">
                                    @if($role->name === 'Super Admin')
                                        <span class="text-gray-400 text-xs">—</span>
                                    @else
                                        <input type="hidden" name="roles[{{ $role->id }}][name]" value="{{ $role->name }}">
                                        <input type="checkbox" name="roles[{{ $role->id }}][permissions][]" value="{{ $permission->name }}"
                                               class="rounded border-gray-300 text-orange focus:ring-orange/30"
                                               {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-right">
            <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">
                Save Permissions
            </button>
        </div>
    </form>
</div>
@endsection
