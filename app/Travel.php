<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = [
        'cliente_id',
        'driver_id',
        'location_id',
        'moto_id',
        'state',
        'date',
        'time',
    ];
    public function cliente(){
        return $this->hasOne('App\User', 'id','cliente_id');
    }
    public function conductor(){
        return $this->hasOne('App\User', 'id', 'driver_id');
    }
    public function placa(){
        return $this->hasOne('App\Moto', 'id', 'moto_id' );
    }
    public function location(){
        return $this->hasOne('App\location', 'id', 'location_id');
    }
}
