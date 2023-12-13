<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($role == 'merchant') {
            if (!$merchant = merchant()) {
                return to_route('merchant.login');
            }
            return $next($request);
        }

        if ($role == 'guide') {
            if (!$guide = guide()) {
                return to_route('guide.login');
            }
            return $next($request);
        }

    }
}
