<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function getUnreadNotif()
    {
    	$dt = \App\Notifikasi::where(['penerima_id' => Auth::user()->id, 'dibaca'=>0])->orderBy('id', 'DESC')->get();
    	$arr = [];
    	foreach ($dt as $key => $d) {
    		$arr[] = [
    			'pengirim' => $d->pengirim->name,
    			'pesan'	=> $d->pesan,
    			'url'		=>	url('open-notif/'.$d->id),
    			'created_at' => \MyHpr::getTimeAgo($d->created_at),
    			'gambar'	=> $d->pengirim->getDokumentasi()
    		];
    	}
    	return json_encode(['count'=>count($arr), 'data'=>$arr], JSON_PRETTY_PRINT);
    }
    public function openNotif($id)
    {
    	$dt = \App\Notifikasi::findOrFail($id);
    	$dt->update(['dibaca'=>1]);
    	return redirect()->to($dt->url);
    }
}
