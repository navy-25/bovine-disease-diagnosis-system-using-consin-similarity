<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirectTo = ('/sukses');

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
public function showLoginForm()
    {
        return view('auth.adminLogin');
    }
    public function guard()
    {
        return auth()->guard('admin');
    }
    public function showRegisterPage()
    {
        return view('auth.adminregister');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed'
        ]);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('admin-login')->with('success','Registration Success');
    }
    public function login(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect()->route('adminpage');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function logout(){
        Auth::logout();
        return redirect('/masuk');
    }
    
}
