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
        'name', 'email', 'password','role', 
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

    public function travels(){
        if($this->role == 'C' )
        {
            return $this->hasMany(Travel::class, 'driver_id', 'id')->orderBy('created_at', 'desc');
        }
        else{
            return $this->hasMany(Travel::class, 'cliente_id', 'id')->orderBy('created_at', 'desc');            
        }       
    }
    public function confirmed(){
        return $this->hasMany(Travel::class, 'driver_id', 'id')
                    ->where('state', 'confirmado');
    }
}
