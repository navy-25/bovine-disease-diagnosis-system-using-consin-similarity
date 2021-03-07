<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $artikel = \App\Artikel::where('judul','LIKE','%'.$request->cari.'%')
            ->orWhere('sinopsis','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')
            ->paginate(600);
        } else{
            $artikel = \App\Artikel::orderBy('id', 'DESC')
            ->paginate(600);
        }
        //$data_penyakit = \App\Penyakit::orderBy('id','DESC')->paginate(5);
        return view('menu.artikel.artikel',compact('artikel'));
    }
    public function index2(Request $request){
        if($request->has('cari')){
            $artikel = \App\Artikel::where('judul','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')
            ->paginate(600);
        } else{
            $artikel = \App\Artikel::orderBy('id', 'DESC')
            ->paginate(600);
        }
        //$data_penyakit = \App\Penyakit::orderBy('id','DESC')->paginate(5);
        return view('menu.artikel.list_artikel',compact('artikel'));
    }
    public function tambah(){
        return view ('menu.artikel.tambah');
    }
    public function store(Request $request){    	
        $artikel = \App\Artikel::create($request->all());
        if ($request->hasFile('gambar')) {
          $request->file('gambar')->move('images/artikel/',$request->file('gambar')->getClientOriginalName());
          $artikel->gambar = $request->file('gambar')->getClientOriginalName();
          $artikel->save();
        }
        return redirect('/list_artikel')->with('sukses','Data Berhasil Ditambahkan');
    }
    public function hapus($id){
        $artikel = \App\Artikel::find($id);
        $artikel->delete($artikel);
        return redirect('/list_artikel')->with('sukses','Data Berhasil Dihapus');
    }   
    public function tampil($id){
        $artikel = \App\Artikel::find($id);
        return view('menu.artikel.tampil',compact('artikel'));
    }
    public function edit($id){
        $artikel = \App\Artikel::find($id);
        return view('menu.artikel.edit',compact('artikel'));
    }
    public function update(Request $request,$id){
    	$this->validate($request,[
    		'judul' => 'required',
    		'penulis' => 'required',            
            'sumber' => 'required',
            'sinopsis' => 'required',            
            'konten' => 'required',            
            'created_at' => ('d-m-Y'),    
            'updated_at' => ('d-m-Y'),    
    	]);
        $artikel = \App\Artikel::find($id);
        $artikel->update($request->all());
        return redirect('/list_artikel')->with('sukses','Data Berhasil Diperbarui');
    }
}