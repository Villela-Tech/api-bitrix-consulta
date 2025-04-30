<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;

use App\User;
use App\Models\Client;
use App\Models\Billing;
use App\Models\ActiveCampaign;
use App\Helpers\BitrixHelper;
use Bitrix24\User\User as B24User;
use App\Services\ActiveCampaignService;

class BitrixController extends Controller
{
    /**
     * receive event "Application install"
     *
     * @return View
     */
    public function install(Request $request)
    {
        Log::debug('install app');
        Log::debug($request->all());
        // dd($request->all());

        Client::where('domain', $request->input('DOMAIN'))->delete();
        User::where('domain', $request->input('DOMAIN'))->delete();

        $handlerAfterInstallUrl = url('afterInstall');
        $uninstallUrl = url('uninstall');
        $handlerOnCompanyAdd = url('on_company_add');
        $handlerOnCompanyUpdate = url('on_company_update');

        $base_url = 'https://' . $request->input('DOMAIN') . '/rest';

        Curl::to("{$base_url}/event.bind")->withData([
            'auth' => $request->input('AUTH_ID'),
            'EVENT' => 'ONAPPINSTALL',
            'HANDLER' => $handlerAfterInstallUrl,
        ])->get();

        Curl::to("{$base_url}/event.bind")->withData([
            'auth' => $request->input('AUTH_ID'),
            'EVENT' => 'ONAPPUNINSTALL',
            'HANDLER' => $uninstallUrl,
        ])->get();

        Curl::to("{$base_url}/event.bind")->withData([
            'auth' => $request->input('AUTH_ID'),
            'EVENT' => 'onCrmCompanyAdd',
            'HANDLER' => $handlerOnCompanyAdd,
        ])->get();

        Curl::to("{$base_url}/event.bind")->withData([
            'auth' => $request->input('AUTH_ID'),
            'EVENT' => 'onCrmCompanyUpdate',
            'HANDLER' => $handlerOnCompanyUpdate,
        ])->get();

        return view('install/finish_install');
    }

    /**
     * receive event "Application install"
     *
     * @return View
     */
    public function afterInstall(Request $request)
    {
        Log::debug('afterInstall');


        // dd($request->all());
        $auth = $request->input('auth');

        // Save application auth for client
        $client = new Client();
        $client->fill($auth);
        $client->save();

        $billing = Billing::where('domain', $client->domain)->first();

        //Save the language from Bitrix
        $language = $request->data['LANGUAGE_ID'];

        if (!$billing) {
            $billing = new Billing();
            $billing->domain = $client->domain;
            $billing->is_permanent = true;
            $billing->save();
        }

        $active_campaign = new ActiveCampaign();
        $active_campaign->client_id = $client->id;
        $active_campaign->first_use = true;
        $active_campaign->save();

        $obB24App = BitrixHelper::getClient($client);
        $b24_user = new B24User($obB24App);
        $response = $b24_user->current();

        $result = $response['result'];


        (new ActiveCampaignService)->trialConsultaCnpjIniciado($result['EMAIL'], $result['NAME'], $client->domain, $language);
    }

    /**
     * receive event "Application install"
     *
     * @return View
     */
    public function onAppUpdate(Request $request)
    {
        Log::debug('OnAppUpdate');
    }

    /**
     * receive event "Application install"
     *
     * @return View
     */
    public function onAppUninstall(Request $request)
    {
        Log::debug('OnAppUninstall');

        $auth = $request->input('auth');

        Client::where('domain', $auth['domain'])->delete();
        User::where('domain', $auth['domain'])->delete();
    }

    public function openApp(Request $request)
    {
        Log::debug('openApp');
        Log::info($request->all());

        // No momento de instalação do app é possível que o registro na tabela 'client' ainda não esteja criado,
        // portanto realiza algumas tentativas de busca na esperança do evento ONAPPINSTALL inserir o registro o quanto antes.
        $retry = 5;

        do {
            $client = Client::where('domain', $request->input('DOMAIN'))->first();

            if (!$client) {
                Log::info('Waiting for client on appInstall event');
                sleep(5);
                $retry--;
            } else {
                $retry = 0;
            }
        } while ($retry > 0);

        if (!$client) {
            Log::error('Client not found');
            abort(500, 'Something went wrong');
        }

        $client_from_request = new Client;

        $client_from_request->fill([
            'domain' => $request->input('DOMAIN'),
            'member_id' => $request->input('member_id'),
            'access_token' => $request->input('AUTH_ID'),
            'refresh_token' => $request->input('REFRESH_ID'),
        ]);

        $obB24App = BitrixHelper::getClientFromRequest($client_from_request);
        $b24_user = new B24User($obB24App);
        $response = $b24_user->current();

        $result = $response['result'];

        $user = User::where('bitrix_id', $result['ID'])->where('domain', $client->domain)->first();

        if (!$user) {
            $user = new User();
            $user->fill([
                'bitrix_id' => $result['ID'],
                'email' => $result['EMAIL'] ?? null,
                'name' => $result['NAME'] ?? null,
                'last_name' => $result['LAST_NAME'] ?? null,
                'second_name' => isset($result['SECOND_NAME']) ? $result['SECOND_NAME'] : null,
                'domain' => $client['domain'],
                'client_id' => $client['id'],
            ]);
            $user->save();

            Log::info('User created');
        } else {
            Log::info('User already exists');
        }

        $user->is_bitrix_admin = BitrixHelper::isBitrixAdmin($obB24App);
        $user->lang = $request->input('LANG');
        $user->save();

        return view('authentication.login', ['redirect_url' => url('dashboard')]);
    }
}
