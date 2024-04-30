<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAuthorization
{
    /**
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        $roles = str_contains($roles, ',') ? explode(',', $roles) : array($roles);

        if (!in_array(Auth::user()->role->name, $roles) || !$request->expectsJson()) {
            // abort(401);
        }

        return $next($request);
    }
}
