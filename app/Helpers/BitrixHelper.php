<?php

namespace App\Helpers;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Log;

use Bitrix24\Bitrix24;
use App\Models\Client;
use Bitrix24\User\User as B24User;

/**
 * Helper com várias funções úteis para o Bitrix.
 */
class BitrixHelper
{
    public static function refreshToken($instance)
    {
        Log::info('Bitrix token expired... renew');

        Log::debug($instance->getDomain());
        Log::debug($instance->getAccessToken());

        $client = Client::where('domain', $instance->getDomain())->where('access_token', $instance->getAccessToken())->first();

        $query = http_build_query([
            'grant_type' => "refresh_token",
            'client_id' => config('bitrix.marketplace_client_id'),
            'client_secret' => config('bitrix.marketplace_client_secret'),
            'refresh_token' => $client->refresh_token,
            'scope' => explode(',', $client->scope),
        ]);

        $auth = Curl::to(self::getEndpoint($client) . '/oauth/token?' . $query)->withOption('FOLLOWLOCATION', true)->get();
        $auth = json_decode($auth, true);

        $auth['scope'] = implode(',', $auth['scope']);

        $client->fill($auth);
        $client->save();

        $instance->setAccessToken($client->access_token);
        $instance->setRefreshToken($client->refresh_token);

        Log::info('Bitrix token renewed');

        return true;
    }

    public static function getClient($client)
    {
        $bitrix = config('bitrix');
        // dd($bitrix);

        if (array_key_exists($client->domain, $bitrix)) {
            Log::info("switch to {$client->domain} client marketplace");
            $marketplace_client_id = $bitrix[$client->domain]['marketplace_client_id'];
            $marketplace_client_secret = $bitrix[$client->domain]['marketplace_client_secret'];
        } else {
            $marketplace_client_id = $bitrix['marketplace_client_id'];
            $marketplace_client_secret = $bitrix['marketplace_client_secret'];
        }

        // dd($bitrix);

        $obB24App = new Bitrix24();
        $obB24App->setRedirectUri(env('APP_URL'));
        $obB24App->setApplicationScope(explode(',', $client->scope));
        $obB24App->setApplicationId($marketplace_client_id);
        $obB24App->setApplicationSecret($marketplace_client_secret);

        // set user-specific settings
        $obB24App->setDomain($client->domain);
        $obB24App->setMemberId($client->member_id);
        $obB24App->setAccessToken($client->access_token);
        $obB24App->setRefreshToken($client->refresh_token);
        $obB24App->setOnExpiredToken('App\Helpers\BitrixHelper::refreshToken');

        return $obB24App;
    }

    public static function getClientFromRequest($client)
    {
        $bitrix = config('bitrix');
        // dd($bitrix);

        if (array_key_exists($client->domain, $bitrix)) {
            Log::info("switch to {$client->domain} client marketplace");
            $marketplace_client_id = $bitrix[$client->domain]['marketplace_client_id'];
            $marketplace_client_secret = $bitrix[$client->domain]['marketplace_client_secret'];
        } else {
            $marketplace_client_id = $bitrix['marketplace_client_id'];
            $marketplace_client_secret = $bitrix['marketplace_client_secret'];
        }

        // dd($bitrix);

        $obB24App = new Bitrix24();
        $obB24App->setApplicationId($marketplace_client_id);
        $obB24App->setApplicationSecret($marketplace_client_secret);
        $obB24App->setDomain($client->domain);
        $obB24App->setMemberId($client->member_id);
        $obB24App->setAccessToken($client->access_token);
        $obB24App->setRefreshToken($client->refresh_token);

        return $obB24App;
    }

    public static function getEndpoint($client)
    {
        return substr($client->client_endpoint, 0, -6);
    }

    // public static function getAppInstallerUser()
    // {
    //     $me = auth()->user();

    //     return User::where('domain', $me->domain)->where('app_installer', true)->first();
    // }

    public static function isBitrixAdmin($obB24App)
    {
        $b24_model = new B24User($obB24App);
        $response = $b24_model->admin();

        return $response;
    }

    public static function addBatchCall(&$api, &$registries, $resource, $params = [])
    {
        $api->addBatchCall($resource, $params, function ($result) use ($api, $resource, $params, &$registries) {

            // se for um .get, por exemplo, retorna um único registro e não há necessidade de prosseguir
            if (is_null($result['total'])) {
                $registries = $result['result'];
                return;
            }

            // save first page
            foreach ($result['result'] as $registry) {
                // $registries[$registry['ID']] = $registry;
                array_push($registries, $registry);
            }

            if (is_null($result['next'])) {
                return;
            }

            // add calls for subsequent pages
            for ($i = $result['next']; $i < $result['total']; $i += $result['next']) {

                $params['start'] = $i;

                $api->addBatchCall($resource, $params, function ($result) use (&$registries) {
                    // save subsequent page
                    foreach ($result['result'] as $registry) {
                        // $registries[$registry['ID']] = $registry;
                        array_push($registries, $registry);
                    }
                });
            }
        });
    }
}
