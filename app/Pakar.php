<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pakar extends Model
{
    protected $table = 'pakar';
    protected $fillable = ['user_id', 'spesialis'];
    public $timestamps = false;

    public function user(){
      return $this->belongsTo("App\User");
    }
    public function chatFactory(){
      return $this->hasMany("App\ChatFactory", "pakar_id");
    }
}
