<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\FieldsMap;

use App\Helpers\BitrixHelper;
use Bitrix24\Im\Notify;
use Bitrix24\CRM\Company as B24Company;
use Bitrix24\User\User as B24User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class BitrixEventsController extends Controller
{
    /**
     * receive event "Application install"
     *
     * @return View
     */
    public function onCompanyAdd(Request $request){
        Log::debug('onCompanyAdd');
        Log::debug($request->all());

        $client = Client::where('domain', $request->input('auth.domain'))->first();
        $fields_map = FieldsMap::where('client_id',$client->id)->first();

        if(!empty($fields_map) && $fields_map->usar_controll_cnpj && $fields_map->usar_controll_cnpj == 'true'){
            $this->control_CNPJ($client, $fields_map, $request);
        }
    }

    public function onCompanyUpdate(Request $request){
        Log::debug('onCompanyUpdate');
        Log::debug($request->all());

        $client = Client::where('domain', $request->input('auth.domain'))->first();
        $fields_map = FieldsMap::where('client_id',$client->id)->first();

        if(!empty($fields_map) && $fields_map->usar_controll_cnpj && $fields_map->usar_controll_cnpj == 'true'){
            $this->control_CNPJ($client, $fields_map, $request);
        }

    }

    public function control_CNPJ($client, $fields_map, $request){
        $instance = BitrixHelper::getClient($client);
        $company = new B24Company($instance);
        $notify = new Notify($instance);

        $companyID = $request['data']['FIELDS']['ID'];
        $getCompany = $company->get($companyID);

        $CNPJ_field = $fields_map->cnpj_field;
        $cnpj = $getCompany['result'][$CNPJ_field];
        $cnpj_only_number = $this->onlyNumberCNPJ($getCompany['result'][$CNPJ_field]);

        $response['company'] = [];
        BitrixHelper::addBatchCall($instance, $response['company'], 'crm.company.list',["filter" => [], "select" => [$CNPJ_field]]);
        $instance->processBatchCalls();

        for($i = 0; $i < count($response['company']); $i++){
            if($response['company'][$i][$CNPJ_field] != NULL){
                $cnpj_Bitrix = $this->onlyNumberCNPJ($response['company'][$i][$CNPJ_field]);
                if($cnpj_only_number == $cnpj_Bitrix && $companyID!=$response['company'][$i]['ID']) {
                    $company->delete($companyID);
                    $userId = $getCompany['result']['CREATED_BY_ID'];
                    $message = "A empresa [b]" . $getCompany['result']['TITLE'] . "[/b], com CNPJ [b]" . $cnpj . "[/b], foi apagada por já existir outra empresa com este CNPJ cadastrado.\n \nRegra definida pelo aplicativo Pesquisa CNPJ.";
                    $notify->addSystem($userId, $message);
                    break;
                }
            }
        }
    }

    public function onlyNumberCNPJ($cnpj){
        $aux = [];
        for($i = 0; $i < strlen($cnpj); $i++) {
            $array_cnpj = str_split($cnpj);
            if ($array_cnpj[$i] !== '.' && $array_cnpj[$i] !== '-' && $array_cnpj[$i] !== '/') {
                $aux[$i] = $array_cnpj[$i];
            }
        }
        $cnpj = implode('',$aux);
        return $cnpj;
    }
}
