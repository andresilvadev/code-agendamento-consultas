<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'nome',
        'crm',
        'especialidade_id',
        'rua',
        'numero',
        'cep',
        'bairro',
        'cidade',
        'estado',
        'pais',
        'telefone_fixo',
        'telefone_celular',
        'e_mail',
        'observacoes',
    ];

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }
}