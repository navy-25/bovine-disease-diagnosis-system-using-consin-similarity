<?php

namespace App\Http\Controllers\Peternak;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
    	$chat = \App\ChatFactory::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
    	$varToView = [
    		'data'	=> $chat];
    	return view('menu.peternak.chatlist', $varToView);
    }
    public function newchat()
    {
    	return view('menu.peternak.newchat');
    }
    public function savenewchat(Request $request)
    {
    	$kode = 'CHT'.time().rand(11,99);
    	\App\ChatFactory::create([
    		'pertanyaan'=>$request->pertanyaan,
    		'kode'=>$kode,
    		'user_id'=>Auth::user()->id,
    		'status'=>1 //menunggu pakar
    	]);
    	return redirect('chat/'.$kode.'/room')->with('flashMsg', 'Pertanyaan berhasil dibuat');
    }
    public function room($kode)
    {
    	$chat = \App\ChatFactory::where(['user_id' => Auth::user()->id, 'kode'=>$kode])->first();
    	$varToView = [
    		'data'	=> $chat];
    	return view('menu.peternak.chatroom', $varToView);
    }
    public function savechat(Request $request, $kode)
    {
    	$chat = \App\ChatFactory::where(['user_id' => Auth::user()->id, 'kode'=>$kode])->first();
    	\App\Chat::create([
    		'pesan'=>$request->pesan,
    		'user_id'=>Auth::user()->id,
    		'chat_id'=>$chat->id
    	]);
        if(!empty($chat->pakar->user_id)){
            // cek notif sebelumnya jika ada
            $cek = \App\Notifikasi::where([
                'url'=>url('expert/chat/'.$kode.'/room'), 
                'pengirim_id'=>Auth::user()->id,
                'dibaca'=>0])->count();
            if($cek > 0){
                \App\Notifikasi::where([
                    'url'=>url('expert/chat/'.$kode.'/room'), 
                    'pengirim_id'=>Auth::user()->id])->update(['dibaca'=>1]);
            }
            \App\Notifikasi::create([
                'pesan'=>'membalas diskusi pada tiket #'.$kode,
                'url'=>url('expert/chat/'.$kode.'/room'),
                'dibaca'=>0,
                'pengirim_alias'=>Auth::user()->name,
                'pengirim_id'=>Auth::user()->id,
                'penerima_id'=>$chat->pakar->user_id
            ]);
        }
    	return redirect('chat/'.$kode.'/room')->with('flashMsg', 'Pesan berhasil dikirm');
    }
}
