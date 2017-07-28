<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

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
        if (Auth::user() && DB::table('associations')->where('email', '=', Auth::user()->email)->first()) {
            return $next($request);
        }

        return redirect('/');
    }
}
