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

function resourse($router, $url, $model)
{
    $router->get($url, $model.'Controller@index');
    $router->get($url.'/{id}', $model.'Controller@show');
    $router->post($url, $model.'Controller@store');
    $router->put($url.'/{id}', $model.'Controller@update');
    $router->delete($url.'/{id}', $model.'Controller@destroy');
}


$router ->group(['middleware' => 'auth'], function() use($router){
    resourse($router, '/products', 'Product');    
    });