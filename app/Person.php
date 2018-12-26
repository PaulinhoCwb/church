<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $fillable = [
        'name','dateofbirth','birthplace','zipcode',
        'address','number','email','tellphone','cellphone',
        'publicplace',
    ];
    
    public function dependents()
    {
        return $this->hasMany('App\Dependent','people_id');
    }
}
