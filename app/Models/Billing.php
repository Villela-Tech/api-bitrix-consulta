<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FieldsMap;

class Billing extends Model {

    /**
     * Nome da tabela.
     *
     * @var string
     */
    protected $table = 'billing';

    /**
     * Atributos mass assignable.
     */
    protected $fillable = [
        'domain',
        'amount_of_days',
        'is_permanent'
    ];
}
