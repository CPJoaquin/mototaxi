<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Location extends Model
{
    protected $fillable = [
        'primary',
        'secondary',
        'travel_id',
        'description',
    ];
    public function scopePrimary(){
        return DB::table('locations')->pluck('primary', 'id');
    }
}
