<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $fillable = ['pesan', 'user_id', 'chat_id'];
    public function user(){
	  return $this->belongsTo("App\User");
	}
    public function chatFactory(){
	  return $this->belongsTo("App\ChatFactory");
	}
}
