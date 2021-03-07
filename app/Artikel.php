<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul', 
        'penulis',
        'sumber',
        'sinopsis',
        'konten',
        'gambar',
        'created_at',
        'updated_at',
    ];    
    public function getDokumentasi(){
        if(!$this->gambar){
          return asset('images/default.png');
        }
        return asset('images/artikel/'.$this->gambar);
    }
}
