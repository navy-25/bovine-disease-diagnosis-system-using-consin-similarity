<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPakarController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_pakar = \App\UserPakar::where('nama','LIKE','%'.$request->cari.'%')
            ->orWhere('alamat','LIKE','%'.$request->cari.'%')
            ->orWhere('bidang_keahlian','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')
            ->paginate(6);
        } else{
            $data_pakar = \App\UserPakar::orderBy('id', 'DESC')
            ->paginate(6);
        }
        return view('menu.pakar.datapakar',compact('data_pakar'));
    }
    public function store(Request $request){
    	// $this->validate($request,[
    	// 	'nama' => 'required',
        //     'alamat' => 'required',            
        //     'bidang_keahlian' => 'required',            
        //     'email' => 'required',
        //     'telepon' => 'required',                              
        //     'created_at' => ('d-m-Y'),    
        //     'updated_at' => ('d-m-Y'),      
        // ]);
        
        $data_pakar = \App\UserPakar::create($request->all());
        if ($request->hasFile('gambar')) {
          $request->file('gambar')->move('images/pakar/',$request->file('gambar')->getClientOriginalName());
          $data_pakar->gambar = $request->file('gambar')->getClientOriginalName();
          $data_pakar->save();
        }
        //$data_pakar = \App\UserPakar::create($request->all());
        return redirect('/datapakar')->with('sukses','Data Berhasil Ditambahkan');
    }
    public function update(Request $request,$id){        
    	$this->validate($request,[
    		'nama' => 'required',
            'alamat' => 'required',            
            'bidang_keahlian' => 'required',  
            'email' => 'required',
            'telepon' => 'required',                      
            'created_at' => ('d-m-Y'),    
            'updated_at' => ('d-m-Y'),              
        ]);
        $data_pakar = \App\UserPakar::find($id);
        $data_pakar->update($request->all());
        return redirect('/datapakar')->with('sukses','Data Berhasil DiPerbarui');
    }
    public function tampil($id){
        $data_pakar = \App\UserPakar::find($id);
        return view('menu.pakar.tampil',compact('data_pakar'));
      }
    public function hapus($id){
        $data_pakar = \App\UserPakar::find($id);
        $data_pakar->delete($data_pakar);
        return redirect('/datapakar')->with('sukses','Data Berhasil Dihapus');
    }   

}
