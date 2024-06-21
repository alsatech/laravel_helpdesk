<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (! $request->user() || ! in_array($request->user()->role_id, $roles)) {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}


