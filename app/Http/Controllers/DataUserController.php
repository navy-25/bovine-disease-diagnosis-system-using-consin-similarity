<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_user = \App\DataUser::where('nama','LIKE','%'.$request->cari.'%')
            ->orWhere('alamat','LIKE','%'.$request->cari.'%')
            ->orWhere('email','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')
            ->paginate(6);
        } else{
            $data_user = \App\DataUser::orderBy('id', 'DESC')
            ->paginate(6);
        }
        //$data_penyakit = \App\Penyakit::orderBy('id','DESC')->paginate(5);
        return view('menu.user.datauser',compact('data_user'));
    } 
    public function store(Request $request){
    	// $this->validate($request,[
    	// 	'nama' => 'required',
    	// 	'alamat' => 'required',            
        //     'email' => 'required',
        //     'telepon' => 'required',                         
        //     'gambar' => 'required',
        //     'created_at' => ('d-m-Y'),    
        //     'updated_at' => ('d-m-Y'),           
        // ]);
        //$data_user = \App\DataUser::create($request->all());
        
        $data_user = \App\DataUser::create($request->all());
        if ($request->hasFile('gambar')) {
          $request->file('gambar')->move('images/user/',$request->file('gambar')->getClientOriginalName());
          $data_user->gambar = $request->file('gambar')->getClientOriginalName();
          $data_user->save();
        }
        return redirect('/datauser')->with('sukses','Data Berhasil Ditambahkan');
    }
    public function update(Request $request,$id){        
    	$this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required',            
            'email' => 'required',            
            'telepon' => 'required',                                
            'created_at' => ('d-m-Y'),    
            'updated_at' => ('d-m-Y'),    
        ]);
        $data_user = \App\DataUser::find($id);
        $data_user->update($request->all());
        return redirect('/datauser')->with('sukses','Data Berhasil DiPerbarui');
    }
    public function tampil($id){
        $data_user = \App\DataUser::find($id);
        return view('menu.user.tampil',compact('data_user'));
    }
    public function hapus($id){
        $data_user = \App\DataUser::find($id);
        $data_user->delete($data_user);
        return redirect('/datauser')->with('sukses','Data Berhasil Dihapus');
    }   

    
}
