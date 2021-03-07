<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $table = 'diagnosa';
    protected $fillable = [
        'nama', 
        'penyebab',
        'penyebaran',
        'pengobatan',
        'pencegahan',
        'gejala',
        'created_at',
        'updated_at',
    ];    
    public function gejala(){
      return $this->belongsToMany("App\Gejala");
    }
}
