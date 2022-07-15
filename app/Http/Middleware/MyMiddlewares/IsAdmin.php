<?php

namespace App\Http\Middleware\MyMiddlewares;

use Closure;
use Auth;

class IsAdmin
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
        if (Auth::user() &&  Auth::user()->roleId === 1) {
            return $next($request);
        }
        return response()->json(['status' => 'Forbidden'], 403);
    }
}
