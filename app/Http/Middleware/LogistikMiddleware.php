<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class LogistikMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 'logistik') {
            return $next($request);
        }
        return redirect(route('logistik-index'))->with('message', 'forbidden-logistik-access');
    }
}
