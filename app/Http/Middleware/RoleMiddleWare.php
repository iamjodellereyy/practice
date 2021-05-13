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

     //implementing this in the route
    public function handle($request, Closure $next,$role)
    {   
        //pangitaa asa ge kuha nga method ng userHasRole

        //this means if this user does not have this role name execute the code
        //this method is created in the user model
        if(!$request->user()->userHasRole($role)){
            abort(403,'Oppppss You are not allowed in here');
        }
        return $next($request);
    }
}
