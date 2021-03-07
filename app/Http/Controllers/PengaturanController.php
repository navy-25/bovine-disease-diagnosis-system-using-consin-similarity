<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index(Request $request){
        $data_admin = \App\User::all();
        return view('menu.pengaturan.pengaturan',compact('data_admin'));
    }
}
