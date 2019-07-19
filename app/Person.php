<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $fillable = [
        'name','dateofbirth','birthplace','zipcode',
        'address','number','email','tellphone','cellphone',
        'publicplace','father_id'
    ];
    
    public function dependents()
    {
        return $this->hasMany('App\Dependent','people_id');
    }

    public function tithes()
    {
        return $this->hasMany('App\Tithe','people_id');
    }

    public function father()
    {
        return $this->belongsTo('App\Person','father_id');
    }

    public function son() {
        return $this->hasMany('App\Person','father_id');
    }
}
