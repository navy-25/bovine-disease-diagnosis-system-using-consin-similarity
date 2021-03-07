<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatFactory extends Model
{
    protected $table = 'chat_factories';
    protected $fillable = ['kode', 'pertanyaan', 'user_id', 'status'];
    public function user(){
	  return $this->belongsTo("App\User");
	}
	public function pakar(){
	  return $this->belongsTo("App\Pakar", "pakar_id", "user_id");
	}
	public function chat(){
      return $this->hasMany("App\Chat", "chat_id");
    }
}
