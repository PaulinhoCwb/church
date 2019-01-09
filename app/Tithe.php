<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tithe extends Model
{
    public $fillable = [
        'people_id','money_value','paid_at'
    ];

    public $timestamps = false;

    public function people()
    {
        return $this->belongsTo('App\Person','people_id');
    }
}
