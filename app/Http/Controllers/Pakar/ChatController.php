<?php

namespace App\Http\Controllers\Pakar;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    
    public function room($kode)
    {
    	$chat = \App\ChatFactory::where(['kode'=>$kode])->first();
    	$varToView = [
    		'data'	=> $chat];
    	return view('menu.expert.chatroom', $varToView);
    }
    public function savechat(Request $request, $kode)
    {
    	$chat = \App\ChatFactory::where(['kode'=>$kode])->first();
    	\App\Chat::create([
    		'pesan'=>$request->pesan,
    		'user_id'=>Auth::user()->id,
    		'chat_id'=>$chat->id
    	]);
    	if (empty($chat->pakar_id)) {
    		\App\ChatFactory::where(['id'=> $chat->id])->update(['pakar_id'=>Auth::user()->id, 'status'=>2]);
    	} 

        // cek notif sebelumnya jika ada
        $cek = \App\Notifikasi::where([
            'url'=>url('chat/'.$kode.'/room'), 
            'pengirim_id'=>Auth::user()->id,
            'dibaca'=>0])->count();
        if($cek > 0){
            \App\Notifikasi::where([
                'url'=>url('chat/'.$kode.'/room'), 
                'pengirim_id'=>Auth::user()->id])->update(['dibaca'=>1]);
        }
        \App\Notifikasi::create([
            'pesan'=>'(pakar) membalas diskusi pada tiket #'.$kode,
            'url'=>url('chat/'.$kode.'/room'),
            'dibaca'=>0,
            'pengirim_alias'=>Auth::user()->name,
            'pengirim_id'=>Auth::user()->id,
            'penerima_id'=>$chat->user_id
        ]);
    	return redirect('expert/chat/'.$kode.'/room')->with('flashMsg', 'Pesan berhasil dikirm');
    }
}
