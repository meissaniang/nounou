<?php

namespace App\Http\Middleware;
use Sentinel;
use Closure;

class NannyMiddleware
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
        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='nanny'){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
