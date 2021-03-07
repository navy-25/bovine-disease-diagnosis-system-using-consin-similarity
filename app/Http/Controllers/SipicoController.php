<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SipicoController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $penyakit = \App\Penyakit::where('gejala','LIKE','%'.$request->cari.'%')
            ->orWhere('gejala','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')
            ->paginate(1);
        } else{
            $penyakit = \App\Penyakit::orderBy('id', 'DESC')
            ->paginate(1);
        }
        //dd($penyakit);
        return view('menu.sipicow.cari',compact('penyakit'));
    }
    public function home(Request $request){        
        if($request->has('cari')){
            $diagnosa = \App\Diagnosa::where('gejala','LIKE','%'.$request->cari.'%')
            //->orWhere('gejala','LIKE','%'.$request->cari.'')
            ->orderBy('id', 'DESC')
            ->paginate(200);
        } else{
            $diagnosa = \App\Diagnosa::orderBy('id', 'DESC')
            ->paginate(200);
        }
        return view('menu.beranda',compact('diagnosa'))->with('status','Selamat Datang Admin !');
    }
}
