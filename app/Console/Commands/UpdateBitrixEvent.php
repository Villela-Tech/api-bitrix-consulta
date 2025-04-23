<?php

namespace App\Console\Commands;

use App\Helpers\BitrixHelper;
use App\Models\Client;
use Bitrix24\Event\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateBitrixEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix:event-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Bitrix Events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $domain = $this->ask('Informe o portal (ex.: teste.bitrix24.com.br)');

        $bar = $this->output->createProgressBar(4);

        $bar->start();

        // $client = Client::where('domain', $this->argument('domain'))->first();
        $client = Client::where('domain', $domain)->first();

        $bar->advance();

        if (!$client) {
            $bar->finish();
            return;
        }

        $headers = ['Event Name', 'URL Handler', 'Title', 'Description'];

        $instance = BitrixHelper::getClient($client);
        $event_entity = new Event($instance);
        $events = $event_entity->get();
        $events = $events['result'];

//         dd($events);
        $this->info("\n####################");
        $this->info('### BEFORE UPDATE ###');
        $this->info('#####################');
        $this->table(
            $headers,
            $events
        );

        $bar->advance();

        if ($this->confirm('Do you wish to continue?') === false) {
            return;
        }
        foreach ($events as $event) {
            switch ($event['event']) {
                case 'ONCRMCOMPANYADD':
                case 'ONCRMCOMPANYUPDATE':
                    $event_entity->unbind($event['event'], $event['handler']);
                    sleep(1);
                    break;

                default:
                    # code...
                    break;
            }
        }

        $bar->advance();

        $handler_company_add = url('on_company_add');
        $handler_company_update = url('on_company_update');

        $event_entity->bind(
            'onCrmCompanyAdd',
            $handler_company_add,
            env('APP_NAME'),
            ''
        );

        $event_entity->bind(
            'onCrmCompanyUpdate',
            $handler_company_update,
            env('APP_NAME'),
            ''
        );

        $bar->advance();
        sleep(1);

        $events = $event_entity->get();
        $events = $events['result'];

        // dd($events);
        $this->info("\n####################");
        $this->info('### AFTER UPDATE ###');
        $this->info('####################');
        $this->table(
            $headers,
            $events
        );

        $bar->finish();
        $this->info('Done!');
    }
}
