<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;
    public function redirectTo()
    {
        $role = Auth::user()->role_id;
        if ($role == 1) {
            $this->redirectTo = '/admin/dashboard';
            return $this->redirectTo;
        } else if ($role == 2) {
            $this->redirectTo = '/seller/dashboard';
            return $this->redirectTo;
        } else if ($role == 3) {
            $this->redirectTo = '/dealer/browse-vehicles';
            return $this->redirectTo;
        }
        else if ($role == 4) {
        
            $this->redirectTo = '/agent/dashboard';
            return $this->redirectTo;
        }  
        else {
            $this->redirectTo = '/login';
            return $this->redirectTo;
        }
        // switch($role){

        //     case 1:
        //         $this->redirectTo = '/admin/dashboard';
        //         return $this->redirectTo;
        //         break;

        //      case 2:
        //          $this->redirectTo = '/seller/dashboard';
        //          return $this->redirectTo;
        //          break;
        //      case 3:
        //          $this->redirectTo = '/dealer/dashboard';
        //          return $this->redirectTo;
        //          break;
        //     default:
        //         $this->redirectTo = '/login';
        //         return $this->redirectTo;
        // }

        // return $next($request);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function logout()
    {
        auth()->logout();
        Session()->flush();

        return Redirect()->route('myLogin');
    }
}
