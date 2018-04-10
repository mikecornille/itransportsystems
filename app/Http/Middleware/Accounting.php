<?php

namespace App\Http\Middleware;

use Closure;

class Accounting
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
         if ($request->user()->accounting) {
            return $next($request);
        } else {
            throw new \Illuminate\Auth\AuthenticationException;
        }
    }
}
