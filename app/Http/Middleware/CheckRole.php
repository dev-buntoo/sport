<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $uhost = $request->server('REMOTE_ADDR');

        $uagent = $request->server('HTTP_USER_AGENT');
        $user = auth()->user();
//        dd(count($user->audits->where('user_agent','=',$uagent)->where('ip_address',$uhost)));
//        substr($audit->url, strrpos($audit->url, '/') + 1) == 'login'
//        && count($user->audits->where('user_agent','=',$uagent)->where('ip_address',$uhost)) == 0
        if(auth()->check() && $user->two_factor_code && $user->is_member == 0 )
        {
            if($user->two_factor_expires_at->lt(now()))
            {
                $user->resetTwoFactorCode();
                auth()->logout();

                return redirect()->route('login')->withMessage('The two factor code has expired. Please login again.');
            }

            if(!$request->is('verify*'))
            {
                return redirect()->route('verify.index');
            }
        }

        return $next($request);
    }
}
