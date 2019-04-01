<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intention extends Model
{
    public $fillable = [
        'type','nome','contato','fone','intencao','data','hora','falecimento'
    ]; 
}
