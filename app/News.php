<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $fillable = [
        'tipo','body','titulo','user_id'
    ];
}
