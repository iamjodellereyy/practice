<?php

namespace App\Http\Middleware;

use Closure;


class RoleMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {   
        //pangitaa asa ge kuha nga method ng userHasRole
        if(!$request->user()->userHasRole($role)){
            abort(403,'Oppppss You are not allowed in here');
        }
        return $next($request);
    }
}
