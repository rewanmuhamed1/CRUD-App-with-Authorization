<?php

namespace App\Http\Middleware;

use Closure;

class Update
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$superAdmin ,$student )
    {
        $user=$request->user();
        return ($user->hasRole($superAdmin)||$user->hasRole($student))? $next($request) :response(view('error'));

    }
}
