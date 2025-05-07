<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        $access = match($role) {
            'admin' => $user->hasRole('admin'),
            'editor' => $user->hasRole('editor') || $user->hasRole('admin'),
            'user' => true, 
            default => false
        };

        if (!$access) {
            abort(403, 'Доступ запрещен');
        }

        return $next($request);
    }
}
