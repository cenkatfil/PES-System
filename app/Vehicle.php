<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'owner_id', 'plate_no', 'displacement', 'cylinders', 'fuel', 'or_no', 'cr_no', 'manufacturer', 'series', 'body_type'
    ];
}
