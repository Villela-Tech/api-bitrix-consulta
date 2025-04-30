<?php

namespace App\Services;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use stdClass;

class BillingService
{
    private $client;
    private $billing;

    public function __construct()
    {
        $this->client = app('auth')->user()->client;
        
        // By default, do not permit access app
        $this->billing = new stdClass;
        $this->billing->productName = null;
        $this->billing->active = false;
        $this->billing->daysRemaining = 0;
        $this->billing->trial = false;
        $this->billing->trialDaysRemaining = 0;
        $this->billing->lifelong = false;
        $this->billing->subscripted = false;
    }

    /**
     * Get Billing Informations.
     *
     * @return obj
     */
    public function info()
    {
        $this->lifelongCheck();

        if ($this->billing->lifelong) {
            return $this->billing;
        }

        $this->trialCheck();
        $this->subscriptionCheck();

        // dd($this->billing);

        // Log::debug(app('auth')->user()->domain);
        // Log::debug(json_decode(json_encode($this->billing), true));

        return $this->billing;
    }

    private function lifelongCheck()
    {
        if (in_array($this->client->domain, explode('|', env('BILLING_FREE_PORTALS', ""))) || 
            ($this->client->billing && $this->client->billing->is_permanent)) {
            $this->billing->active = true;
            $this->billing->lifelong = true;
        }
    }

    private function trialCheck()
    {
        $daysAfterFromFirstInstall = Carbon::parse($this->client->billing->created_at)->diffInDays(Carbon::now());

        if ($daysAfterFromFirstInstall <= $this->client->billing->amount_of_days) {
            $this->billing->active = true;
            $this->billing->trial = true;
            $this->billing->trialDaysRemaining = $this->client->billing->amount_of_days - $daysAfterFromFirstInstall;
        }
    }

    private function subscriptionCheck()
    {
        $response = Curl::to('https://app2.br24.io/wp-json/br24/v1/order_by_domain')
            // ->withData(['domain' => 'bmit.bitrix24.com.br'])
            ->withData(['domain' => app('auth')->user()->domain])
            ->asJson()
            ->get();

        // dd($response);

        // A single portal can have multiple subscriptions for many br24 produtcs.
        // We are looking here for chat booster product and cheking if it is active.
        foreach ($response as $subscription) {

            if ($subscription->status != "active") {
                continue;
            }

            foreach ($subscription->items as $item) {

                if (in_array($item->product_id, config('billing.product_ids'))) {

                    $this->billing->productName = $item->name;
                    $this->billing->active = true;
                    $this->billing->subscripted = true;

                    break;
                }
            }

            if ($this->billing->subscripted) {
                // testa as chaves schedule_end e schedule_next_payment para obter a data de fim da subscrição
                $subscription_end = $subscription->schedule_end ? ($subscription->schedule_end->date) : ($subscription->schedule_next_payment->date);
                $this->billing->daysRemaining = Carbon::now()->diffInDays(Carbon::parse($subscription_end));
                break;
            }
        }
    }
}
