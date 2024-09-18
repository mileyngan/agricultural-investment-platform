<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
{
    $user = $request->user();
    if (!$user || !$user->hasRole($roles[0])) {
        abort(403, 'Unauthorized action.');
    }

    return $next($request);
}
}