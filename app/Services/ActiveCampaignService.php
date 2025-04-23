<?php

namespace App\Services;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use stdClass;

class ActiveCampaignService
{
    private $api_key;

    public function __construct()
    {
        $this->api_key = config('activecampaign.api_key_name') . ': ' . config('activecampaign.api_key_token');
    }

    public function trialConsultaCnpjIniciado($email, $name, $domain, $language)
    {
        $tag = config('activecampaign.trial_consulta_cnpj_iniciado');

        $response = $this->addTag($email, $name, $tag, $domain, $language);

        return $response;
    }


    public function consultaCnpjPrimeiraPesquisaRealizada()
    {
        $active_campaign = app('auth')->user()->client->active_campaign;

        // Somente adiciona tag no Active se for a primeira vez de uso do app (primeira busca por cnpj válido)
        if ($active_campaign && $active_campaign->first_use) {

            $domain = app('auth')->user()->domain;
            $email = app('auth')->user()->email;
            $name = app('auth')->user()->name;
            $lang = app('auth')->user()->lang;
            $tag = config('activecampaign.consulta_cnpj_primeira_pesquisa_realizada');

            $response = $this->addTag($email, $name, $tag, $domain, $lang);

            $active_campaign->first_use = false;
            $active_campaign->save();

            return $response;
        } else {
            return;
        }
    }

    /**
     * Create contact with List and Tag in Active Campaign.
     *
     * @return mix
     */
    private function addTag($email, $name, $tag, $domain, $language)
    {
        if (env('ACTIVE_CAMPAIGN', false)) {

            $contact_id = $this->createContact($email, $name);

            $response = null;

            if ($contact_id) {
                $this->setBitrixDomain($contact_id, $domain);
                $this->setBitrixLanguage($contact_id, $language);
                $this->updateContactList($contact_id);
                $response = $this->addTagToContact($contact_id, $tag);
            }

            return $response;
        }

        // Emulate success response
        return true;
    }

    /**
     * Get contact by email in Active Campaign.
     *
     * @return mixed
     */
    private function getContactByEmail($email)
    {
        $response = Curl::to(config('activecampaign.api_url') . 'contacts')
            ->withHeader($this->api_key)
            ->withData([
                'email' => $email,
            ])
            ->asJson()
            ->get();

        Log::debug('getContactByEmail');
        Log::debug((array) $response);

        return empty($response->contacts) ? null : $response->contacts[0];
    }

    /**
     * Create contact in Active Campaign.
     *
     * @return mixed
     */
    private function createContact($email, $name)
    {
        $contact = $this->getContactByEmail($email);

        if ($contact) {
            return $contact->id;
        }

        $response = Curl::to(config('activecampaign.api_url') . 'contacts')
            ->withHeader($this->api_key)
            ->withData([
                'contact' => [
                    'firstName' => $name,
                    'email' => $email,
                ]
            ])
            ->asJson()
            ->post();

        Log::debug('createContact');
        Log::debug((array) $response);

        return property_exists($response, 'errors') ? null : $response->contact->id;
    }

    /**
     * Update contact list in Active Campaign.
     *
     * @param  int  $contact_id
     * @return void
     */
    private function updateContactList($contact_id)
    {
        $response = Curl::to(config('activecampaign.api_url') . 'contactLists')
            ->withHeader($this->api_key)
            ->withData([
                'contactList' => [
                    'contact' => $contact_id,
                    'list' => config('activecampaign.list_squad2_id'),
                    'status' => 1,
                ]
            ])
            ->asJson()
            ->post();

        Log::debug('updateContactList');
        Log::debug((array) $response);
    }

    /**
     * Update contact list in Active Campaign.
     *
     * @param  int  $contact_id
     * @return void
     */
    private function setBitrixDomain($contact_id, $bitrix_domain)
    {
        $response = Curl::to(config('activecampaign.api_url') . 'fieldValues')
            ->withHeader($this->api_key)
            ->withData([
                'fieldValue' => [
                    'contact' => $contact_id,
                    'field' => config('activecampaign.bitrix_domain_field'),
                    'value' => $bitrix_domain,
                ]
            ])
            ->asJson()
            ->post();

        Log::debug('setBitrixDomain');
        Log::debug((array) $response);
    }

     /**
     * Update contact list in Active Campaign with the language.
     */
    private function setBitrixLanguage($contact_id, $language)
    {
        //Recebe as siglas da linguagem do Bitrix e virifica a linguagem correspondente
        if ($language == 'br' || $language == 'pt-br' ) {
            $lang = 'Português';
        } elseif ($language == 'es') {
            $lang = 'Espanhol';
        } elseif ($language == 'en') {
            $lang = 'Inglês';
        }else{
            $lang = 'Inglês';
        }
        
        //Envia a Linguagem do Bitrix do cliente para o Active Campaign 
        $response = Curl::to(config('activecampaign.api_url') . 'fieldValues')
            ->withHeader($this->api_key)
            ->withData([
                'fieldValue' => [
                    'contact' => $contact_id,
                    'field' => config('activecampaign.bitrix_language_field'),
                    'value' => $lang,
                ]
            ])
            ->asJson()
            ->post();

        Log::debug('setBitrixLanguage');
        Log::debug((array) $response);
    }

    /**
     * Add tag to contact in Active Campaign.
     *
     * @param  int  $contact_id
     * @return void
     */
    private function addTagToContact($contact_id, $tag)
    {
        $response = Curl::to(config('activecampaign.api_url') . 'contactTags')
            ->withHeader($this->api_key)
            ->withData([
                'contactTag' => [
                    'contact' => $contact_id,
                    'tag' => $tag,
                ]
            ])
            ->asJson()
            ->post();

        Log::debug('addTagToContact');
        Log::debug((array) $response);
    }
}

