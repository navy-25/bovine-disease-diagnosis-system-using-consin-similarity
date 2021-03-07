<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
    public function index()
    {
    	if(Auth::check()){
	    	$role = Auth::user()->role;
	        $res = '/';
	        if ($role=='user') {
	            $res = '/dashboard';
	        }elseif ($role=='pakar') {
	            $res = '/expert';
	        }elseif ($role=='admin') {
	        	$res = 'admin';
	        }
	        return redirect($res);
	    } else {
	    	return view('landing.index');
	    }
    }
}
