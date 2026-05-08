# Authentication & Admin Authorization System Setup Guide

## ✅ What Was Implemented

### 1. **Database Migration**
- File: `database/migrations/2026_05_06_000000_add_role_to_users_table.php`
- Added `role` enum column to `users` table with values: `user` (default) or `admin`

### 2. **Admin Middleware**
- File: `app/Http/Middleware/IsAdmin.php`
- Checks if user is authenticated AND has `role = 'admin'`
- Returns 403 Forbidden for non-admin users
- Returns 401 Unauthorized for unauthenticated users (via `auth` middleware)

### 3. **Middleware Registration**
- File: `bootstrap/app.php`
- Registered `IsAdmin` middleware as alias `admin`
- Clean, modern Laravel 12 middleware configuration

### 4. **Protected Admin Routes**
- File: `routes/web.php`
- All admin routes protected with `['auth', 'admin']` middleware
- Admin panel at `/admin` requires authentication + admin role
- Full resource routes for posts and podcasts with protection

### 5. **Admin User Seeder**
- File: `database/seeders/AdminUserSeeder.php`
- Creates default admin user: `admin@ennova.local` / `password`
- Uses `updateOrCreate` to prevent duplicates
- DatabaseSeeder calls AdminUserSeeder automatically

### 6. **User Model Update**
- Added `role` to fillable attributes
- Enables mass assignment for role field

---

## 🚀 Quick Setup Commands

### 1. Run Pending Migrations
```bash
php artisan migrate
```

### 2. Create Admin User (via Seeder)
```bash
php artisan db:seed --class=AdminUserSeeder
```

### 3. Or Create Admin User (via Tinker)
```bash
php artisan tinker

# Then run:
>>> $admin = \App\Models\User::create([
    'name' => 'Administrator',
    'email' => 'admin@example.com',
    'password' => bcrypt('secure-password-here'),
    'role' => 'admin',
    'email_verified_at' => now(),
]);
>>> exit
```

### 4. Change User Role to Admin
```bash
php artisan tinker

# Make user admin:
>>> $user = \App\Models\User::find(1);
>>> $user->update(['role' => 'admin']);

# Or find by email:
>>> $user = \App\Models\User::whereEmail('user@example.com')->first();
>>> $user->update(['role' => 'admin']);
>>> exit
```

---

## 📋 Implementation Details

### Protected Route Example
```php
// All routes inside this group require auth + admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('podcasts', PodcastController::class);
});
```

### Access Control
- **Guests**: Redirected to login (via `auth` middleware)
- **Regular Users**: 403 Forbidden (via `admin` middleware)
- **Admin Users**: Full access to admin panel

### AdminMiddleware Logic
```php
public function handle(Request $request, Closure $next): Response
{
    if (! auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized. Admin access required.');
    }
    return $next($request);
}
```

---

## 🔒 Security Features

✅ Role-based access control (RBAC)  
✅ Enum for role field (type-safe)  
✅ Built-in Laravel authentication  
✅ Middleware-based protection (DRY principle)  
✅ Proper HTTP status codes (401/403)  
✅ Clean, maintainable code structure  

---

## 📝 Additional Tinker Commands

### Check User Role
```bash
php artisan tinker
>>> \App\Models\User::where('email', 'admin@ennova.local')->first()->role
>>> exit
```

### List All Users with Roles
```bash
php artisan tinker
>>> \App\Models\User::select(['id', 'name', 'email', 'role'])->get()
>>> exit
```

### Create Regular User
```bash
php artisan tinker
>>> \App\Models\User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => bcrypt('password'),
    'role' => 'user',  // default, can be omitted
]);
>>> exit
```

---

## 🔐 Optional: Install Laravel Breeze (UI Scaffolding)

If you want pre-built authentication views and components:

```bash
# Install Breeze
composer require laravel/breeze --dev

# Publish Breeze scaffolding
php artisan breeze:install

# Choose which stack (blade, react, vue, api)
# Install npm dependencies
npm install

# Build frontend
npm run dev

# Run migrations (includes auth tables)
php artisan migrate
```

This will generate:
- Login/Register pages
- Password reset flow
- Email verification
- Dashboard layout
- Full authentication UI

---

## 🧪 Testing Admin Access

### 1. Test Guest Access (Should Fail)
```bash
# Try to access /admin without logging in
# Result: Redirected to login
```

### 2. Test Regular User Access (Should Fail)
```bash
# Create regular user, login, then access /admin
# Result: 403 Forbidden error
```

### 3. Test Admin Access (Should Work)
```bash
# Login with admin@ennova.local / password
# Access /admin
# Result: Dashboard loads successfully
```

---

## 📁 Files Created/Modified

**Created:**
- ✨ `database/migrations/2026_05_06_000000_add_role_to_users_table.php`
- ✨ `app/Http/Middleware/IsAdmin.php`
- ✨ `database/seeders/AdminUserSeeder.php`

**Modified:**
- 📝 `bootstrap/app.php` (middleware registration)
- 📝 `routes/web.php` (admin routes protection)
- 📝 `app/Models/User.php` (added `role` to fillable)
- 📝 `database/seeders/DatabaseSeeder.php` (calls AdminUserSeeder)

---

## 🎯 Next Steps

1. ✅ Run migrations: `php artisan migrate`
2. ✅ Seed admin user: `php artisan db:seed --class=AdminUserSeeder`
3. ✅ Test login at your admin login route
4. (Optional) Install Breeze for pre-built auth UI
5. (Optional) Customize login/registration views as needed

**Admin Credentials (Default):**
- Email: `admin@ennova.local`
- Password: `password`
- ⚠️ Change these immediately in production!

---

## 💡 Authorization Helpers (Optional)

You can add helper methods to User model for convenience:

```php
// app/Models/User.php

public function isAdmin(): bool
{
    return $this->role === 'admin';
}

public function makeAdmin(): void
{
    $this->update(['role' => 'admin']);
}

public function removeAdmin(): void
{
    $this->update(['role' => 'user']);
}
```

Then in routes or controllers:
```php
if (auth()->user()->isAdmin()) {
    // Do something
}
```

---

## 🔗 Resource Links

- [Laravel Authentication Docs](https://laravel.com/docs/authentication)
- [Laravel Authorization Docs](https://laravel.com/docs/authorization)
- [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze)
- [Laravel Middleware](https://laravel.com/docs/middleware)
