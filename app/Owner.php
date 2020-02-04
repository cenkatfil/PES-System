<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'lastname', 'firstname', 'address', 'contact_no', 'license_no',
    ];
}
