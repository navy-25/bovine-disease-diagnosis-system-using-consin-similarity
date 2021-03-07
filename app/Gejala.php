<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 
        'terhubung',        
        'created_at',
        'updated_at',
    ];    
    public function diagnosa(){
	  return $this->belongsToMany("App\Diagnosa");
	}
}
