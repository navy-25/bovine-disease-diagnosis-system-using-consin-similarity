<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'role',
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getDokumentasi(){
        if(!$this->gambar){
          return asset('images/default.png');
        }
        return asset('/images/users/'.$this->gambar);
    }
    public function pakar(){
      return $this->hasOne("App\Pakar");
    }
    public function chatFactory(){
      return $this->hasMany("App\ChatFactory");
    }
    public function chat(){
      return $this->hasMany("App\Chat");
    }
    public function penerimaNotifikasi(){
      return $this->hasMany("App\Notifikasi", "penerima_id");
    }
    public function pengirimNotifikasi(){
      return $this->hasMany("App\Notifikasi", "pengirim_id");
    }
    
}
