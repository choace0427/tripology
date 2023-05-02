<?php

namespace App\Http\Middleware;

use Closure;

class TravellerMiddleware
{
    public function handle($request, Closure $next)
    {
        if($request->session()->has('traveller_id')) { // traveller_id is not a field in the travellers table. It is just used to avoid conflict with the admin id. 
            return $next($request);
        }        
        return redirect()->route('traveller.login');
    }
}
