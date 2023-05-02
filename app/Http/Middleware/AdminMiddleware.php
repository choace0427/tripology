<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if($request->session()->has('role')) {
            return $next($request);    
        }        
        return redirect()->route('admin.login');
    }
}
