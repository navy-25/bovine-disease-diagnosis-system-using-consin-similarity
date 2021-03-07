<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_penyakit = \App\Penyakit::where('nama','LIKE','%'.$request->cari.'%')
            ->orWhere('deskripsi','LIKE','%'.$request->cari.'%')
            ->orWhere('gejala','LIKE','%'.$request->cari.'%')
            ->orWhere('penanganan','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->paginate(6);
        }else{
            $data_penyakit = \App\Penyakit::orderBy('id', 'DESC')
            ->paginate(6);
        }        
        return view('menu.penyakit.datapenyakit',compact('data_penyakit'));
    }
    public function tambah(){
        return view ('menu.penyakit.tambah');
    }
    public function store(Request $request){
        $data_penyakit = \App\Penyakit::create($request->all());
        if ($request->hasFile('gambar')) {
          $request->file('gambar')->move('images/penyakit/',$request->file('gambar')->getClientOriginalName());
          $data_penyakit->gambar = $request->file('gambar')->getClientOriginalName();
          $data_penyakit->save();
        }
        return redirect('/datapenyakit')->with('sukses','Data Berhasil Ditambahkan');
    }
    public function update(Request $request,$id){
    	$this->validate($request,[
    		'nama' => 'required',
            'deskripsi' => 'required',            
    		'penularan' => 'required',            
            'gejala' => 'required',
            'penanganan' => 'required',            
            'created_at' => ('d-m-Y'),    
            'updated_at' => ('d-m-Y'),    
        ]);
        $data_penyakit = \App\Penyakit::find($id);
        $data_penyakit->update($request->all());
        return redirect('/datapenyakit')->with('sukses','Data Berhasil Diperbarui');
    }
    public function hapus($id){
        $data_penyakit = \App\Penyakit::find($id);
        $data_penyakit->delete($data_penyakit);
        return redirect('/datapenyakit')->with('sukses','Data Berhasil Dihapus');
    }   
    public function tampil($id){
        $data_penyakit = \App\Penyakit::find($id);
        return view('menu.penyakit.tampil',compact('data_penyakit'));
    }
    public function edit($id){
        $data_penyakit = \App\Penyakit::find($id);
        return view ('menu.penyakit.edit',compact('data_penyakit'));
    }
    
    public function penyakithp(Request $request){
        if($request->has('cari')){
            $data_penyakit = \App\Penyakit::where('nama','LIKE','%'.$request->cari.'%')
            ->orWhere('gejala','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->paginate(6);
        }else{
            $data_penyakit = \App\Penyakit::orderBy('id', 'DESC')
            ->paginate(6);
        }        
        return view('menu.penyakit.datapenyakithp',compact('data_penyakit'));
    }
}