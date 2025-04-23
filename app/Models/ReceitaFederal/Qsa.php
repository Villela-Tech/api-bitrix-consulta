<?php

namespace App\Models\ReceitaFederal;

use Illuminate\Database\Eloquent\Model;

class Qsa extends Model
{
    protected $table = 'qsa';
    protected $connection = 'receita_federal';
    public $timestamps = false;
    protected $fillable = [
        'qual',
        'nome',
        'pais_origem',
        'nome_rep_legal',
        'qual_rep_legal',
    ];
}
