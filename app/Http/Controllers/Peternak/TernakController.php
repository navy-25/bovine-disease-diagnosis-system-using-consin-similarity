<?php

namespace App\Http\Controllers\Peternak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TernakController extends Controller
{
    public function index()
    {
    	$data = \App\Artikel::orderBy('id', 'DESC')->paginate(6);
    	return view('menu.peternak.ternak', compact('data'));
    }
    public function kategori($id)
    {
    	$ktg = \MyHpr::getListKategoriArtikel($id);
    	$data = \App\Artikel::where('kategori', $id)->orderBy('id', 'DESC')->paginate(6);
    	return view('menu.peternak.kelola-ternak', compact('data', 'ktg'));
    }
}
