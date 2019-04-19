<?php

namespace App\Http\Middleware;

use Closure;

class Guest
{
    public function handle($request, Closure $next)
    {
        if(auth()->guest())
        {
            return $next($request);
        }
        else
        {
            return response()->json(["Priviling" => "User","error" => "You are already loged in"],405);
        }
    }
}
