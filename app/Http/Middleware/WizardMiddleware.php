<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Profil\Pemerintahan;

class WizardMiddleware
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
        $total = Pemerintahan::count();

        if($total == 0){
            return redirect('/pengaturan-website');
        }

        return $next($request);
    }
}
