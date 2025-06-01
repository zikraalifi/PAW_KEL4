<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Cek apakah role user termasuk role yang diizinkan
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Akses ditolak. Kamu tidak punya izin.');
        }

        return $next($request);
    }
}
