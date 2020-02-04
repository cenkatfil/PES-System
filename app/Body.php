<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
    protected $fillable = [
        'name', 'manu_id', 'series_id',
    ];
}
