<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Premium
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
        if(Auth::Check() && Auth::user()->premium ==1 ){
            return $next($request);
        }
        return redirect()->back();
    }
}
