<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Admin
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
        if (!Auth::check()) {
            return redirect()->route('myLogin');
        }


        if (Auth::user()->role_id == 1) {
            return $next($request);
        }
        if (Auth::user()->role_id == 2) {
            return redirect()->route('seller');
        }
        if (Auth::user()->role_id == 3) {
            if(Auth::user()->role_id != 1){
                return back();
            }
            if(Auth::user()->role_id == 3 && Auth::user()->status == 0){
                return redirect()->route('dealer');
            }
            else{
                return back()->with('error',"waiting for approval");
            }
        }
    }
}
