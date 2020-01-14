<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    protected $fillable = [
        'placa',
        'user_id',
        'color',
        'marc',
        'model',
    ];
    public function scopeIndex($buscar){
        return Moto::where('placa', 'LIKE', $buscar)
        ->orWhere('model', 'LIKE', '%'.$buscar.'%')->paginate(10);
    }
}
