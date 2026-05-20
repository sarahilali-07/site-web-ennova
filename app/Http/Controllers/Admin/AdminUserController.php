<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.admins.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.admins.form', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
        ]);

        $user->assignRole($validated['role']);

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin created successfully.');
    }

    public function edit(User $admin)
    {
        $roles = Role::all();
        return view('admin.admins.form', ['user' => $admin, 'roles' => $roles]);
    }

    public function update(Request $request, User $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|exists:roles,name',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        if ($validated['password']) {
            $data['password'] = Hash::make($validated['password']);
        }

        $admin->update($data);
        $admin->syncRoles([$validated['role']]);

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin updated successfully.');
    }

    public function destroy(User $admin)
    {
        if ($admin->id === auth()->id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $admin->delete();

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin deleted successfully.');
    }

    // ---- Role & Permission Management ----

    public function roles()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all()->groupBy(function ($perm) {
            return explode(' ', $perm->name)[1] ?? 'other';
        });
        return view('admin.admins.roles', compact('roles', 'permissions'));
    }

    public function updateRoles(Request $request)
    {
        $validated = $request->validate([
            'roles' => 'required|array',
            'roles.*.name' => 'required|string|exists:roles,name',
            'roles.*.permissions' => 'array',
            'roles.*.permissions.*' => 'string|exists:permissions,name',
        ]);

        foreach ($validated['roles'] as $roleData) {
            $role = Role::findByName($roleData['name']);
            $permissions = $roleData['permissions'] ?? [];
            $role->syncPermissions($permissions);
        }

        return redirect()->route('admin.admins.roles')
            ->with('success', 'Permissions updated successfully.');
    }
}
