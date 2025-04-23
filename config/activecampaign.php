<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Active Campaign Settings
    |--------------------------------------------------------------------------
    |
    | https://developers.activecampaign.com/v3/reference
    |
    */

    'api_url' => "https://br24.api-us1.com/api/3/",
    'api_key_name' => "Api-Token",
    'api_key_token' => env('ACTIVE_CAMPAIGN_TOKEN', ''),

    // Lista Leads Squad2
    'list_squad2_id' => 2,

    // Tag trial-consulta-cnpj-iniciado
    'trial_consulta_cnpj_iniciado' => 302,

    // Tag consulta-cnpj-primeira-pesquisa-realizada
    'consulta_cnpj_primeira_pesquisa_realizada' => 303,

    // Contact field bitrix_domain (Domínio Bitrix24)
    'bitrix_domain_field' => 55,

    // Contact field language (Linguagem do Bitrix24)
    'bitrix_language_field' => 68,

];
