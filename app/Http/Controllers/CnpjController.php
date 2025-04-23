<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bitrix24\CRM\Company as B24Company;
use Bitrix24\User\User as B24User;
use App\Helpers\BitrixHelper;
use App\Models\FieldsMap;
use App\Services\ActiveCampaignService;
use App\Models\ReceitaFederal\Cnae;
use App\Models\ReceitaFederal\PessoaJuridica;
use App\Services\ReceitaFederal;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;

class CnpjController extends Controller
{
    public function index()
    {
        $client = app('auth')->user()->client;

        $instance = BitrixHelper::getClient($client);
        $company = new B24Company($instance);

        $result = $company->fields();

        $company_fields = $result['result'];

        $fields_map = $client->fields_map;

        // dd($fields_map->toArray());

        return view('dashboard.dashboard', compact(['fields_map', 'company_fields']));
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $fields = $request->input('fields');

        $client = app('auth')->user()->client;

        $fields_map = $client->fields_map;

        if (!$fields_map) {
            $fields_map = new FieldsMap;
        }

        $fields_map->client_id = $client->id;
        $fields_map->fill($fields);
        $fields_map->save();

        return response()->json('success');
    }

    public function getCompanyFromReceitaFederal(Request $request)
    {
        // dd($request->all());
        Log::debug(array('Pesquisa de CNPJ', $request->all()));
        // dd(app('auth')->user());

        $fields_map = app('auth')->user()->client->fields_map;

        $cnpj = $request->input('cnpj');

        $url = "https://www.receitaws.com.br/v1/cnpj/{$cnpj}";

        $curl = Curl::to($url)
            ->returnResponseObject()
            ->asJson();

        if ($fields_map && $fields_map->token_rws && $fields_map->token_rws != "" && $fields_map->token_rws != "-1") {
            $curl->withHeader("Authorization: Bearer {$fields_map->token_rws}");
        }

        $response = $curl->get();

        Log::debug((array) $response);

        if ($response->status != 200) {
            Log::error(array('Status do response', $response->status));
            $response->content = (object) null;
            $response->content->status = 'ERROR';
            if($response->status == 429){
                $response->content->message = 'O limite de requisições por minuto foi atingido, espere alguns segundos para realizar a próxima busca';
            }else{
                $response->content->message = 'Receita Federal Error. Try again later';
            }

            return response()->json($response->content);
        }

        if (property_exists($response->content, 'status') && $response->content->status == 'ERROR') {
            if ($response->content->message == "CNPJ inválido") {
                $response->content->message = "Invalid CNPJ";
            } else if ($response->content->message == "CNPJ rejeitado pela Receita Federal") {
                $response->content->message = "CNPJ rejected by Receita Federal";
            }
        } else {
            (new ActiveCampaignService)->consultaCnpjPrimeiraPesquisaRealizada();
            (new ReceitaFederal)->saveCompany($response->content);
        }

        return response()->json($response->content);
    }

    public function getCompanyFromBitrix(Request $request)
    {
        // dd($request->all());

        // dd(app('auth')->user()->client);

        $client = app('auth')->user()->client;

        $fields_map = $client->fields_map;

        $instance = BitrixHelper::getClient($client);
        $company = new B24Company($instance);

        $cnpj = $request->input('cnpj');

        if ($fields_map->cnpj_field == '-1') {
            return response()->json([
                'error' => trans('messages.validation.cnpj_required_1')
            ], 401);
        }

        $cnpj_digits_only = preg_replace('/\D/', '', $cnpj);

        $order = null;
        $filter = [
            $fields_map->cnpj_field => [
                $cnpj,
                $cnpj_digits_only,
            ],
        ];
        //$select = ['*', 'UF_*'];
        $select = ['TITLE', 'ID', 'ASSIGNED_BY_ID', $fields_map->cnpj_field];

        error_log( var_export($select, true));
        $result = $company->getList($order, $filter, $select);

        if (empty($result['result'])) {
            Log::debug("Nenhum registro encontrado no Bitrix");
        } else {
            Log::debug(json_encode($result['result']));
        }

        // dd($result);

        foreach ($result['result'] as $key => $company) {
            $user = new B24User($instance);
            $r = $user->get(null, null, ['ID' => $company['ASSIGNED_BY_ID']]);
            $r = $r['result'];
            // dd($r);
            if (count($r) > 0) {
                $r = $r[0];
                $result['result'][$key]['ASSIGNED_BY_NAME'] = $r['NAME'] . ' ' . $r['LAST_NAME'];
            }
        }

        return response()->json($result);
    }

    // public function createCompanyInBitrix(Request $request)
    // {
    //     // dd($request->all());

    //     $client = app('auth')->user()->client;

    //     $instance = BitrixHelper::getClient($client);
    //     $company = new B24Company($instance);

    //     $fields = $request->input('fields');

    //     $fields['ASSIGNED_BY_ID'] = app('auth')->user()->bitrix_id;
    //     $fields['CREATED_BY_ID'] = app('auth')->user()->bitrix_id; // não funciona

    //     // dd($fields);

    //     $result = $company->add($fields);

    //     return response()->json($result);
    // }

    // public function updateCompanyInBitrix(Request $request, $id)
    // {
    //     // dd($request->all());

    //     $client = app('auth')->user()->client;

    //     $instance = BitrixHelper::getClient($client);
    //     $company = new B24Company($instance);

    //     $fields = $request->input('fields');

    //     $result = $company->update($id, $fields);

    //     return response()->json($result);
    // }
}
