<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compromisso extends Model
{    
    protected $fillable = [
        'title',
        'start',
        'end',
    ];
}
