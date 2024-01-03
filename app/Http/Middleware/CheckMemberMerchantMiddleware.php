<?php

namespace App\Http\Middleware;

use App\Models\User\Merchant;
use Closure;
use Carbon\Carbon;
use App\Models\User\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMemberMerchantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($merchant = merchant()) {
            $user = Merchant::whereId($merchant->id)->first();
            $isMember = $user->is_member;
            if (Carbon::now() > $user->expired_member_at) $isMember = 0;

            $merchant->is_member = $isMember;

            session()->put(config('services.session-merchant-prefix'), (object) $merchant);

            return $next($request);
        }
    }
}
