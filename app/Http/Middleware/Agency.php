<?php

namespace App\Http\Middleware;

use Closure;

class Agency
{
    public function handle($request, Closure $next)
    {
        if($request->session()->get('role') == 'agency') {
            return $next($request);    
        }        
        return redirect()->route('admin.login');
    }
}
