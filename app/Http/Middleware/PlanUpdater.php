<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class PlanUpdater
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
        if(Auth::check())
        {
            if(!Auth::user()->isFlashSaleUser() && !Auth::user()->plans)
            {
                Auth::user()->updatePlan();
            }
        }


        return $next($request);
    }
}
