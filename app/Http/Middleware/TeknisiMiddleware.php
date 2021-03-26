<?php

namespace App\Http\Middleware;

use Closure;

class TeknisiMiddleware
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
        if(!session('teknisi')){
            return redirect()->back();
        }
        return $next($request);
    }
}
