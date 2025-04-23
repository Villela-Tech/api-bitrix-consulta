<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// URL utilizada para monitoramento do app
$router->get('/', function () {
    response();
});

/*
|--------------------------------------------------------------------------
| Bitrix Routes
|--------------------------------------------------------------------------
|
| Rotas originadas do Bitrix.
|
*/

// install (GET) serve apenas para validação na criação de uma versão do app no Bitrix.
$router->get('install', function () {
    return response()->json('received');
});
$router->post('install', 'BitrixController@install');
$router->post('afterInstall', 'BitrixController@afterInstall');
$router->post('uninstall', 'BitrixController@uninstall');
$router->post('on_company_add', 'BitrixEventsController@onCompanyAdd');
$router->post('on_company_update', 'BitrixEventsController@onCompanyUpdate');
$router->post('/', 'BitrixController@openApp');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Rotas para autenticação no app.
|
*/

// $router->post('login', 'AuthController@login');

// $router->group(['middleware' => 'auth'], function () use ($router) {
$router->group(['prefix' => 'auth'], function () use ($router) {

    $router->post('login', 'AuthController@login');

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->post('logout', 'AuthController@logout');
        $router->post('refresh', 'AuthController@refresh');
        $router->get('me', 'AuthController@me');
    });
});


/*
|--------------------------------------------------------------------------
| App Routes
|--------------------------------------------------------------------------
|
| Rotas gerais do app.
|
*/

$router->get('dashboard', [
    'as' => 'dashboard', 'uses' => 'CnpjController@index'
]);

$router->post('config', [
    'as' => 'config.save', 'uses' => 'CnpjController@save'
]);

$router->get('rf/get_company', [
    'as' => 'rf.get_company', 'uses' => 'CnpjController@getCompanyFromReceitaFederal'
]);

$router->get('bitrix/get_company', [
    'as' => 'bitrix.get_company', 'uses' => 'CnpjController@getCompanyFromBitrix'
]);

$router->get('bitrix/get_lead_list', [
    'as' => 'bitrix.get_lead_list', 'uses' => 'CnpjController@getLeadFromBitrix'
]);

$router->post('bitrix/company', [
    'as' => 'bitrix.create_company', 'uses' => 'CnpjController@createCompanyInBitrix'
]);

$router->put('bitrix/company/{id}', [
    'as' => 'bitrix.update_company', 'uses' => 'CnpjController@updateCompanyInBitrix'
]);
