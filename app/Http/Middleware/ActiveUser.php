<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class ActiveUser
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
     if (@Auth::user()->status == 'A' ) 
        {
            
            return $next($request);
           
        }
        else
        {
             Auth::logout();
             return redirect()->route('login')->with('error','Your account is not active');
        }
    }
}
