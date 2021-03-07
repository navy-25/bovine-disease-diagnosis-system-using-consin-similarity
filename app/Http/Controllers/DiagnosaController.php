<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $diagnosa = \App\Diagnosa::where('nama','LIKE','%'.$request->cari.'%')
            ->orWhere('penyebab','LIKE','%'.$request->cari.'%')
            ->orWhere('gejala','LIKE','%'.$request->cari.'%')
            ->orWhere('pencegahan','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->paginate(6);
        }else{
            $diagnosa = \App\Diagnosa::orderBy('id', 'DESC')
            ->paginate(6);
        }        
        return view('menu.beranda',compact('diagnosa'));
    }
    public function tambahgejala(Request $request){
        if($request->has('cari')){
            $gejala = \App\Gejala::where('nama','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')
            ->paginate(200);
        } else{
            $gejala= \App\Gejala::orderBy('id', 'DESC')
            ->paginate(200);
        }                
        return view ('menu.tambahgejala',compact('gejala'));
    }
    public function store(Request $request){
        $gejala = new \App\Gejala;
        $gejala->nama = $request->nama;
        $gejala->terhubung = "";
        $gejala->save();
        return redirect('/tambahgejala')->with('sukses','Data Berhasil Ditambahkan');
    }    
    public function hapus($id){
        $gejala = \App\Gejala::find($id);
        $gejala->delete($gejala);
        return redirect('/tambahgejala')->with('sukses','Data Berhasil Dihapus');
    }   
    public function tambahlibary(){
        return view ('/menu.tambahlibary');
    }
    public function libarystore(Request $request){
        $diagnosa = new \App\Diagnosa;
        $diagnosa->nama = $request->nama;
        $diagnosa->penyebab = $request->penyebab;
        $diagnosa->penyebaran = $request->penyebaran;
        $diagnosa->pengobatan = $request->pengobatan;
        $diagnosa->pencegahan = $request->pencegahan;
        $diagnosa->gejala = "";
        $diagnosa->save();
        return redirect('/home')->with('sukses','Data Berhasil Ditambahkan');
    }
    public function tampil($id){
        $gejala = \App\Gejala::find($id);
        $penyakit = \App\Diagnosa::find($id);
        return view('menu.tampillibary',compact('penyakit','gejala'));
    }
    public function libaryhapus($id){
        $diagnosa = \App\Diagnosa::find($id);
        $diagnosa->delete($diagnosa);
        return redirect('/home')->with('sukses','Data Berhasil Dihapus');
    } 
}
