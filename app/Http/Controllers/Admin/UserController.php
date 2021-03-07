<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userlist()
    {
    	$user = \App\User::orderBy('id', 'DESC')->paginate(10);
    	return view('menu.admin.user.userlist', ['user' => $user]);
    }
    public function userexpert()
    {
    	$user = \App\User::where('role', 'pakar')->orderBy('id', 'DESC')->paginate(10);
    	return view('menu.admin.user.userexpert', ['user' => $user]);
    }
    public function detail($id)
    {
    	$user = \App\User::findOrFail($id);
    	return view('menu.admin.user.userdetail', ['user' => $user]);
    }
    public function make_expert(Request $request)
    {
    	\App\User::where('id', $request->user_id)->update(['role'=>'pakar']);
    	\App\Pakar::create(['user_id'=>$request->user_id, 'spesialis'=>$request->spesialis]);
    	return redirect('/user/list')->with('sukses','Pengguna berhasil dijadikan pakar');
    }
    public function unset_expert($id)
    {
    	\App\Pakar::where('user_id', $id)->delete();
    	\App\User::where('id',$id)->update(['role'=>'user']);
    	return redirect('/user/list')->with('sukses','Berhasil menghapus status pakar pada pengguna');
    }
}
