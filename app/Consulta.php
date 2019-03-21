<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'title',
        'start',
        'end',
        'paciente_id',
        'medico_id',
    ];
}