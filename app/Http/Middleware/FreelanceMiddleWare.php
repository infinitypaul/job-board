<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class FreelanceMiddleWare
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
        if (Auth::user()->account_type) {
            return redirect('/home');
        }
        return $next($request);
    }
}
