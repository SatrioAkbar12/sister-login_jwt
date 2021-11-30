<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->post('login', 'AuthController@login');

$router->group(['middleware' => 'auth'], function ($router) {
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->get('me', 'AuthController@me');

    $router->group(['prefix' => 'objek-pbb'], function($router) {
        $router->get('/', 'ObjekPbbController@index');
        $router->post('/store' , 'ObjekPbbController@store');
    });

    $router->group(['prefix' => 'data-pbb',], function($router) {
        $router->get('/', 'DataPbbController@index');
        $router->post('/store', 'DataPbbController@store');
    });
});
