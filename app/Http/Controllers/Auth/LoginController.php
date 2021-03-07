<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = ('/sukses');

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return view('menu.sipicow.login');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function redirectTo()
    {
        $user = \Auth::user();
        if ($user) {
            if ($user->role == "admin") {
                return '/home';
            } elseif ($user->role == "user") {
                return '/dashboard';
            } elseif ($user->role == "pakar") {
                return '/expert';
            } else {
                return '/';
            }
        } else {
            return '/';
        }
    }
}
