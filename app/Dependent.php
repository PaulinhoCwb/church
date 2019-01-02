<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    public $fillable = [
        'name','dateofbirth','weddingdata','people_id','type',''
    ];
    
    public function people()
    {
        return $this->belongsTo('App\Person','people_id');
    }
}
