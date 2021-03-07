<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = 'penyakit';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 
        'penularan',
        'gejala',
        'penanganan',
        'deskripsi', 
        'gambar',
        'created_at',
        'updated_at',
    ];
    public function getDokumentasi(){
        if(!$this->gambar){
          return asset('images/default.png');
        }
        return asset('images/penyakit/'.$this->gambar);
    }
}
