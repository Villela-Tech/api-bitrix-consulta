<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FieldsMap;
use App\Models\Billing;
use App\Models\ActiveCampaign;

class Client extends Model {

    /**
     * Nome da tabela.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * Atributos mass assignable.
     */
    protected $fillable = [
        'access_token',
        'expires',
        'expires_in',
        'scope',
        'domain',
        'server_endpoint',
        'status',
        'client_endpoint',
        'member_id',
        'user_id',
        'refresh_token',
        'application_token',
    ];

    public function fields_map()
    {
        return $this->hasOne(FieldsMap::class, 'client_id', 'id');
    }

    public function billing()
    {
        return $this->hasOne(Billing::class, 'domain', 'domain');
    }

    public function active_campaign()
    {
        return $this->hasOne(ActiveCampaign::class, 'client_id', 'id');
    }
}
