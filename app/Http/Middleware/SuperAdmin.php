<?php

namespace App\Http\Middleware;

use App\Enum\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        if ($userRole == UserRole::SUPER_ADMIN->value) {
            return $next($request);
        }
        if ($userRole == UserRole::ADMIN->value) {
            return redirect()->route('admin');
        }
        if ($userRole == UserRole::NORMAL_USER->value) {
            return redirect()->route('dashboard');
        }
    }
}
