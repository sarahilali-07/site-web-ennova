<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $permissions): Response
    {
        $user = auth()->user();

        if (! $user) {
            return redirect()->route('login');
        }

        foreach (explode('|', $permissions) as $permission) {
            if ($user->can($permission)) {
                return $next($request);
            }
        }

        return redirect()->route('admin.dashboard')
            ->with('error', __('messages.flash.unauthorized'));
    }
}
