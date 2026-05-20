@extends('admin.layouts.layout')
@section('title', 'Manage Admins')
@section('page-title', 'Manage Admins')

@section('admin-content')
<div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-2xl overflow-hidden shadow-sm">
    <div class="flex items-center justify-between px-6 py-4 border-b border-light-border dark:border-dark-border">
        <h2 class="font-display font-semibold text-gray-900 dark:text-white">Admins</h2>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.admins.roles') }}" class="bg-orange/10 text-orange text-sm px-4 py-2 rounded-lg hover:bg-orange/20 transition-colors">Manage Roles</a>
            <a href="{{ route('admin.admins.create') }}" class="bg-orange text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-dark transition-colors">+ New Admin</a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-light-border dark:border-dark-border">
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Name</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Email</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Roles</th>
                    <th class="text-left px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Date</th>
                    <th class="text-right px-6 py-3 text-gray-500 text-xs uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-dark-border">
                @forelse($users as $user)
                <tr class="hover:bg-gray-50 dark:hover:bg-dark/40 transition-colors">
                    <td class="px-6 py-4 text-gray-900 dark:text-white text-sm font-medium">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        @forelse($user->getRoleNames() as $role)
                            <span class="inline-block bg-orange/10 text-orange text-xs font-bold px-2.5 py-1 rounded-full">{{ $role }}</span>
                        @empty
                            <span class="text-gray-500 text-xs">—</span>
                        @endforelse
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('admin.admins.edit', $user) }}" class="text-orange text-xs hover:text-orange-light transition-colors font-medium">Edit</a>
                            @if($user->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.admins.destroy', $user) }}" onsubmit="return confirm('Delete this admin?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 text-xs hover:text-red-300 transition-colors font-medium">Delete</button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-10 text-center text-gray-600">No admins found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-light-border dark:border-dark-border">
        {{ $users->links() }}
    </div>
</div>
@endsection
