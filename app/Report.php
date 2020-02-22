<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'hc', 'co', 'oname', 'plate_no', 'status', 'name', 'sOfficerName'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
