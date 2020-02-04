<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'dname', 'manu_id', 'body_id',
    ];
}
