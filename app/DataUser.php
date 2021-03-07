<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    protected $table = 'data_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 
        'alamat',
        'email',
        'telepon',
        'gambar',
        'updated_at',
        'created_at',
    ];    
    public function getDokumentasi(){
        if(!$this->gambar){
          return asset('images/default.png');
        }
        return asset('/images/user/'.$this->gambar);
    }
}
