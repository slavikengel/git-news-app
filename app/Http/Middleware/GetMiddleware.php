<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class GetMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $roles = explode('|', $roles);
        $userRoles = Auth::user()->roles()->pluck('slug');
        if($userRoles->intersect($roles)->count() > 0){
            return $next($request);
        }
        //return redirect('news/show');
       return abort(403);


    }
}
