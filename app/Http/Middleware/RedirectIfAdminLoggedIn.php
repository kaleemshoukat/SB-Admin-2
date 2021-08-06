<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAdminLoggedIn
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
        if (session()->has('admin')){
            return redirect()->route('admin.dashboard');
        }
        else{
            return $next($request);
        }
    }
}
