<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nome',
        'cpf',        
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    /**
     * Retorna uma coleção de objetos
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function medicos()
    {
        return $this->belongsToMany(Medico::class);
    }


}
