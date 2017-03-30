<?php

namespace App\Http\Middleware;

use Closure;

class RequireSuperUser
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

        if ($request->user() && $request->user()->isSuperUser()) {

            return $next($request);

        }

        abort(403);
    }
}
