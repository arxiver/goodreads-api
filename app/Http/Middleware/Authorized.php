<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Authorized
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
        if(auth()->user())
        {
            return response()->json(["errors" => "Alredy authorized"],405);
        }
        else
        {
            return $next($request)
            ->header("Access-Contorl-Allow-Origin" , "*")
            ->header("Access-Contorl-Allow-Methods" , "GET,POST , PUT , DELETE, OPTIONS")
            ->header("Access-Contorl-Allow-Headers" , "Content-Type, X-Auth-Token , Origin , Authorization , X-Requested-With");
        }
    }
}
