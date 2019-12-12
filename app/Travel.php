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
}
