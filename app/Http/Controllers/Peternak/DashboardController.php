<?php

namespace App\Http\Controllers\Peternak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$gejala = \App\Gejala::all();
    	return view('menu.peternak.dashboard', ['dt_gejala' => $gejala]);
    }
}
