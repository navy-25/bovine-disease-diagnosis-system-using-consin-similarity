<?php

use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index(){
        return view('menu.sipicow.index');
    }
    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/pengaturan');
        }
        return redirect('/')->with('gagal','Gagal Masuk !');
    }
    public function sukses(){
        return view('menu.sipicow.sukses');
    }
    public function login(){
        return view('menu.sipicow.login');
    }
    public function register(){
        return view('menu.sipicow.register');
    }
    public function postregister(Request $request){
        $this->validate($request, [
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],   
              'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);
  
        // save into table
        $user = \App\User::create([
            'name' => $request->name,
            'role' => 'user',
            'email' => $request->email,
            'password' => bcrypt($request->password),            
        ]);
            
        $useruser = \App\DataUser::create([
            'id' => $user->id,
            'nama' => $request->name,
            'email' => $request->email,
            'alamat' => "",
            'telepon' => "",
        ]);

        return redirect('/');
    }
}
