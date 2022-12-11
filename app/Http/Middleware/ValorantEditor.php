<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValorantEditor
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
        if (auth()->user()->editor == 'valorant' || auth()->user()->admin == true) {
            return $next($request);
        }

        abort(404);
    }
}
