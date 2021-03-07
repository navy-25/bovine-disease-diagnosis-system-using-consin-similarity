<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPakar extends Model
{
    protected $table = 'user_pakar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 
        'alamat',
        'bidang_keahlian', 
        'email',
        'telepon',
        'gambar',
        'created_at',
        'updated_at',
    ];    
    public function getDokumentasi(){
        if(!$this->gambar){
          return asset('images/default.png');
        }
        return asset('/images/pakar/'.$this->gambar);
    }
}
