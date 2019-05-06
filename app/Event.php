<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event','description','day','hour','color','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
