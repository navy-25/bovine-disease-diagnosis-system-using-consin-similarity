<?php

namespace App\Http\Controllers\Peternak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
    	$data = \App\Penyakit::orderBy('nama', 'ASC')->paginate(6);
    	return view('menu.peternak.penyakit', compact('data'));
    }
    public function detail($id)
    {
    	$data = \App\Penyakit::findOrFail($id);
    	return view('menu.peternak.penyakit', compact('data'));
    }
}
