<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldsMap extends Model {

    /**
     * Nome da tabela.
     *
     * @var string
     */
    protected $table = 'fields_map';

    /**
     * Atributos mass assignable.
     */
    protected $fillable = [
        'cnpj_field',
        'usar_controll_cnpj',
        'atividade_principal',
        'data_situacao',
        'atividades_secundarias',
        'qsa',
        'situacao',
        'porte',
        'abertura',
        'natureza_juridica',
        'fantasia',
        'ultima_atualizacao',
        'status',
        'tipo',
        'complemento',
        'efr',
        'motivo_situacao',
        'situacao_especial',
        'data_situacao_especial',
        'capital_social',
        'usar_mascara_cnpj',
        'atividades_secundarias_codigo',
        'atividade_principal_codigo',
        'token_rws',
        'campos_adiconais',
    ];
}
