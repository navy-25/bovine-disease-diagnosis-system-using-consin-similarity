<?php

namespace App\Http\Controllers\Pakar;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$me = Auth::user();
    	$chat = \App\ChatFactory::where('status', 1)->orWhere('pakar_id', $me->id)->orderBy('id', 'DESC')->get();
    	return view('menu.expert.dashboard', ['data'=>$me, 'chat'=>$chat]);
    }
}
