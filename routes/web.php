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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/biodata','BiodataController@create');
$router->get('/biodata','BiodataController@read');
$router->post('/biodata/{id}','BiodataController@update');
$router->delete('/biodata/{id}','BiodataController@delete');
$router->get('biodata/{id}','BiodataController@detail');


$router->post('/akpol','AkpolController@create');
$router->get('/akpol','AkpolController@read');
$router->post('/akpol/{id}','AkpolController@update');
$router->delete('/akpol/{id}','AkpolController@delete');
$router->get('akpol/{id}','AkpolController@detail');
