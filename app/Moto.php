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
}
