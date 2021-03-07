<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';
    protected $fillable = ['pesan', 'url', 'pengirim_alias', 'dibaca', 'penerima_id', 'pengirim_id'];
    public function penerima(){
	  return $this->belongsTo("App\User", "penerima_id");
	}
	public function pengirim(){
	  return $this->belongsTo("App\User", "pengirim_id");
	}
}
