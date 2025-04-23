<?php

namespace App\Models\ReceitaFederal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PessoaJuridica extends Model
{
    protected $table = 'pessoa_juridica';
    protected $connection = 'receita_federal';
    protected $fillable = [
        'data_situacao',
        'nome',
        'uf',
        'telefone',
        'email',
        'situacao',
        'bairro',
        'logradouro',
        'numero',
        'cep',
        'municipio',
        'porte',
        'abertura',
        'natureza_juridica',
        'fantasia',
        'cnpj',
        'ultima_atualizacao',
        'status',
        'tipo',
        'complemento',
        'efr',
        'motivo_situacao',
        'situacao_especial',
        'data_situacao_especial',
        'capital_social',
    ];

    /**
     * Carbon parse for all date fields - SET
     */
    public function setDataSituacaoAttribute($value)
    {
        $this->attributes['data_situacao'] = $value ? Carbon::createFromFormat('d/m/Y', $value) : null;
    }
    public function setAberturaAttribute($value)
    {
        $this->attributes['abertura'] = $value ? Carbon::createFromFormat('d/m/Y', $value) : null;
    }
    public function setUltimaAtualizacaoAttribute($value)
    {
        $this->attributes['ultima_atualizacao'] = $value ? Carbon::parse($value) : null;
    }
    public function setDataSituacaoEspecialAttribute($value)
    {
        $this->attributes['data_situacao_especial'] = $value ? Carbon::parse($value) : null;
    }

    /**
     * Carbon parse for all date fields - GET
     */
    public function getDataSituacaoAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
    public function getAberturaAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
    public function getUltimaAtualizacaoAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
    public function getDataSituacaoEspecialAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }

    public function atividades_principais()
    {
        return $this->belongsToMany(Cnae::class, 'pessoa_juridica_cnae', 'pessoa_juridica_id', 'cnae_id')
            ->withPivot('tipo_atividade')
            ->wherePivot('tipo_atividade', 'principal');
    }
    public function atividades_secundarias()
    {
        return $this->belongsToMany(Cnae::class, 'pessoa_juridica_cnae', 'pessoa_juridica_id', 'cnae_id')
            ->withPivot('tipo_atividade')
            ->wherePivot('tipo_atividade', 'secundaria');
    }
    public function qsa()
    {
        return $this->hasMany(Qsa::class, 'pessoa_juridica_id', 'id');
    }
}
