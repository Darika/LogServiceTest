<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $authToken = $request->header('X-Access-Token');

        if ($authToken !== config('app.token')) {
            abort('401', 'No such token. Request a new one.');
        }

        return $next($request);
    }
}
