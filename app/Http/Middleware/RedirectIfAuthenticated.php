<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        // return $next($request);

        if (Auth::guard($guard)->check()) {
            //return redirect(RouteServiceProvider::HOME);
            $role = Auth::user()->role_id;
            switch ($role) {
                case '1':
                    return redirect('admin/dashboard');
                    break;
                case '2':
                    return redirect('user/dashboard');
                    break;
                case '3':
                    return redirect('vendor/dashboard');
                    break;
                case '4':
                    return redirect('admin/dashboard');
                    break;

                default:
                    return redirect('/home');
                    break;
            }
        }

        return $next($request);
    }
}
