<?php

namespace App\Http\Middleware;

use Closure;

class Create
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$superAdmin ,$techer)
    {
        $user=$request->user();
        return ($user->hasRole($superAdmin)||$user->hasRole($techer))?$next($request) :response(view("error"));


    }
}
