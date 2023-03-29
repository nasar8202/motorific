<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check() || (Auth::check()  && Auth::user()->role_id == 2)){
            return $next($request);
        }
        if (Auth::check()  ) {
                if(Auth::check() && Auth::user()->role_id == 1){
                    return  redirect()->route('admin');
                  
            }
            elseif(Auth::check() && Auth::user()->role_id == 3){
                return  redirect()->route('dealer.newDashboard');
            }
            elseif(Auth::check() && Auth::user()->role_id == 4){
                return  redirect()->route('dashboard');
            }
            } else {
                return $next($request);
            }
        
    }
}
