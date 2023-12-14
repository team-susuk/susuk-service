<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMemberGuideMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($guide = guide()) {
            $user = User::findByUuid($guide->uuid);
            $isMember = $user->is_member;
            if (Carbon::now() > $user->expired_member_at) $isMember = 0;

            $guide->is_member = $isMember;

            session()->put(config('services.session-guide-prefix'), (object) $guide);

            return $next($request);
        }
    }
}
