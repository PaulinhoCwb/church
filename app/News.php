<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $fillable = [
        'tipo','body','titulo','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
