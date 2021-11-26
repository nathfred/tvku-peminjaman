<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class DivisiMiddleware
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
        if (Auth::user()->role == 'divisi') {
            return $next($request);
        }
        return redirect(route('divisi-index'))->with('message', 'forbidden-divisi-access');
    }
}
