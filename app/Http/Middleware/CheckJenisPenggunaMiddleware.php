<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckJenisPenggunaMiddleware
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
        if (Auth::guard('pengguna')->User()->jenis_pengguna != "Admin") {
            return redirect('404');
        }

        return $next($request);
    }
}
