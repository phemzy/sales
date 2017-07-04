<?php

namespace App\Http\Middleware;

use Closure;

class CheckReferral
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
        if(!$request->session()->has('referral') && $request->query('ref'))
        {
            session(['referral' => $request->query('ref')]);
        }
        return $next($request);
    }
}
