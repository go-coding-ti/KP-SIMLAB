<?php

namespace App\Http\Middleware;

use Closure;

class PimpinanMiddleware
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
        if(!session('pimpinan')){
            return redirect()->back();
        }
        return $next($request);
    }
}
