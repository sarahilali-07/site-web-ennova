<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // ---- Permissions ----
        $permissions = [
            // Dashboard
            'view dashboard',

            // Candidates
            'view candidates',
            'update candidates',

            // Posts
            'view posts',
            'create posts',
            'edit posts',
            'delete posts',

            // Podcasts
            'view podcasts',
            'create podcasts',
            'edit podcasts',
            'delete podcasts',

            // Partners
            'view partners',
            'create partners',
            'edit partners',
            'delete partners',
            'approve partners',

            // Messages
            'view messages',
            'reply messages',
            'delete messages',

            // Social Links
            'view social links',
            'create social links',
            'edit social links',
            'delete social links',

            // Settings
            'view settings',
            'update settings',

            // User & Role Management
            'view admins',
            'create admins',
            'edit admins',
            'delete admins',
            'manage roles',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // ---- Roles ----
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Message Admin
        $messageAdmin = Role::create(['name' => 'Message Admin']);
        $messageAdmin->givePermissionTo([
            'view dashboard',
            'view messages',
            'reply messages',
            'delete messages',
        ]);

        // HR Admin
        $hrAdmin = Role::create(['name' => 'HR Admin']);
        $hrAdmin->givePermissionTo([
            'view dashboard',
            'view candidates',
            'update candidates',
        ]);

        // Content Manager
        $contentManager = Role::create(['name' => 'Content Manager']);
        $contentManager->givePermissionTo([
            'view dashboard',
            'view posts',
            'create posts',
            'edit posts',
            'delete posts',
            'view podcasts',
            'create podcasts',
            'edit podcasts',
            'delete podcasts',
        ]);

        // Partner Manager
        $partnerManager = Role::create(['name' => 'Partner Manager']);
        $partnerManager->givePermissionTo([
            'view dashboard',
            'view partners',
            'create partners',
            'edit partners',
            'delete partners',
            'approve partners',
            'view messages',
            'reply messages',
        ]);

        // Social Media Manager
        $socialManager = Role::create(['name' => 'Social Media Manager']);
        $socialManager->givePermissionTo([
            'view dashboard',
            'view social links',
            'create social links',
            'edit social links',
            'delete social links',
        ]);

        // Settings Manager
        $settingsManager = Role::create(['name' => 'Settings Manager']);
        $settingsManager->givePermissionTo([
            'view dashboard',
            'view settings',
            'update settings',
        ]);
    }
}
